<?php

namespace App\Helpers;

use App\Models\Suggestion;
use App\Models\Committee;
use App\Models\User;

/**
 * Parses CSV file into array of committees.
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-30
 */
class CsvParser {
	private $filePath;

	private $fileContent;

	private $committees = [];

	private $idx = [];

	public function getFileAsArray($filePath, $startAt) {
		$content = array_map('str_getcsv', file($filePath));
		array_splice($content, 0, $startAt);
		$this->fileContent = $content;
		return $this->fileContent;
	}

	public function initIdx($options) {
		$this->idx['accounts']           = intval($options['accounts-col']) - 1;
		$this->idx['committee']          = intval($options['committee-col']) - 1;
		$this->idx['costCentre']         = intval($options['cost-centre-col']) - 1;
		$this->idx['budgetLine']         = intval($options['budget-line-col']) - 1;
		$this->idx['budgetLineIncome']   = intval($options['budget-line-income-col']) - 1;
		$this->idx['budgetLineExpenses'] = intval($options['budget-line-expenses-col']) - 1;
		$this->idx['speedledgerId'] = intval($options['speedledger-id-col']) - 1;
	}

	public function washMoney($in) {
		$in = preg_replace("/[^\d,\.]/", "", $in);
		if (!preg_match("/(\d+)((\.|,)(\d{2}))?/", $in, $matches)) {
			return 0;
		}
		if (count($matches) === 5) {
			return intval($matches[1]) + intval($matches[4]) / 100;
		}
		return intval($matches[1]);
	}

	public function ignore($row) {
		foreach ($row as $col) {
			if (preg_match("/total/i", $col)) {
				return true;
			}
		}
		return false;
	}

	public function findCostCentreModel($name, $committee) {
		if ($committee === null) {
			return null;
		} 
		return $committee->costCentres()->where('name', $name)->first();
	}

	public function findBudgetLineModel($name, $costCentre) {
		if ($costCentre === null) {
			return null;
		} 
		return $costCentre->budgetLines()->where('name', $name)->first();
	}

	public function parseAccounts($row) {
		$accounts = [];
		if ($row[$this->idx['accounts']] <= 0) {
			return [];
		}

		$parts = explode(",", $row[$this->idx['accounts']]);
		foreach ($parts as $part) {
			$interval = explode("-", trim($part));
			for ($i = intval(trim($interval[0])); $i <= intval(trim($interval[count($interval) - 1])); $i++) {
				if ($i !== 0) {
					$accounts[] = $i;
				}
			}
		}
		return $accounts;
	}

	public function precalculateSum() {
		foreach ($this->committees as &$committee) {
			$sumC['income'] = 0;
			$sumC['expenses'] = 0;
			foreach ($committee['costCentres'] as &$costCentre) {
				$sum['income'] = 0;
				$sum['expenses'] = 0;
				foreach ($costCentre['budgetLines'] as &$budgetLine) {
					$sum['income'] += $budgetLine['income'];
					$sum['expenses'] += $budgetLine['expenses'];
				}	
				$costCentre['income'] = $sum['income'];
				$costCentre['expenses'] = $sum['expenses'];
				$sumC['income'] += $costCentre['income'];
				$sumC['expenses'] += $costCentre['expenses'];
			}
			$committee['income'] = $sumC['income'];
			$committee['expenses'] = $sumC['expenses'];
		}
	}

	public function parse($filePath, $options) {
		$this->filePath = $filePath;
		$this->getFileAsArray($filePath, intval($options['start-at']) - 1);
		$this->initIdx($options);

		// Loop through each line, and as we find new committee, add to list.
		// Always add budget lines and cost centres to the last cost centres committees
		foreach ($this->fileContent as $row) {
			if ($this->ignore($row)) {
				continue;
			}

			if (!empty($row[$this->idx['committee']])) {
				$this->committees[] = [
					'name' => $row[$this->idx['committee']],
					'model' => Committee::where('name', $row[$this->idx['committee']])->first(),
					'costCentres' => []
				];
			}

			if (count($this->committees) <= 0) {
				continue;
			} 

			if (!empty($row[$this->idx['costCentre']])) {
				$this->committees[count($this->committees) - 1]['costCentres'][] = [
					'name' => $row[$this->idx['costCentre']],
					'model' => $this->findCostCentreModel($row[$this->idx['costCentre']], $this->committees[count($this->committees) - 1]['model']),
					'budgetLines' => []
				];
			}

			if (count($this->committees[count($this->committees) - 1]['costCentres']) <= 0) {
				continue;
			} 

			if (!empty($row[$this->idx['budgetLine']])) {
				$this->committees[count($this->committees)-1]['costCentres'][count($this->committees[count($this->committees)-1]['costCentres'])-1]['budgetLines'][] = 
				[
					'name' => $row[$this->idx['budgetLine']],
					'income' => $this->washMoney($row[$this->idx['budgetLineIncome']]),
					'expenses' => $this->washMoney($row[$this->idx['budgetLineExpenses']]),
					'model' => $this->findBudgetLineModel($row[$this->idx['budgetLine']], $this->committees[count($this->committees)-1]['costCentres'][count($this->committees[count($this->committees)-1]['costCentres'])-1]['model']),
					'accounts' => $this->parseAccounts($row)
				];
			}
		}

		$this->precalculateSum();
		return $this->committees;
	}
}