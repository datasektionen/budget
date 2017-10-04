<?php

namespace App\Helpers;

use Smalot\PdfParser\Parser;
use Carbon\Carbon;

class SpeedledgerParser {

	var $text;
	var $res;
	var $pages;

	public function parseFile($path) {
		$parser = new Parser();
		$pdf = $parser->parseFile($path);
		$pages = $pdf->getPages();
		$this->pages = [];
		foreach ($pages as $page) {
			$this->pages[] = $page;
		}
		array_reverse($this->pages);
		$collection = [];
		while (count($this->pages) !== 0) {
		    $collect = $this->parsePage(end($this->pages));
		    if ($collect !== false) {
		    	$collection[] = $collect;
		    }
		    array_pop($this->pages);
		}
		return $collection;
	}

	public function parsePage($page) {
		$this->res = [];
		$this->text = array_reverse(explode("\n", $page->getText()));

		$this->parsePageNumber();
		if ($this->res["page"]["number"] > 1) {
			return false;
		}
		$this->res["budget_line"]["speedledger_id"] = null;
		$this->res["budget_line"]["committee"] = null;
		$this->res["budget_line"]["cost_centre"] = null;
		$this->res["budget_line"]["budget_line"] = null;
		$this->parsePrinted();
		$this->parseOrganisation();
		$this->parsePeriod();
		$this->parseFinancialPeriod();
		$this->parseDocuments();
		$this->parseCostCentre();
		$this->parseReport();

		if (strpos($this->res["budget_line"]["speedledger_id"], "MKM") === 0) {
			return false;
		}
		return $this->res;
	}

	public function parsePageNumber() {
		if (strpos(end($this->text), 'Sida') !== 0) {
			return;
		}
		preg_match("/Sida (\d+)  \((\d+)\)/", end($this->text), $matches);
		if (count($matches) === 3) {
			$this->res["page"]["number"] = $matches[1];
			$this->res["page"]["total"]  = $matches[2];
		}
		array_pop($this->text);
	}

	public function parsePrinted() {
		if (strpos(end($this->text), 'Utskriven') !== 0) {
			return;
		}
		preg_match("/Utskriven: (\d+)-(\d+)-(\d+) (\d+):(\d+):(\d+)/", end($this->text), $m);
		if (count($m) === 7) {
			$this->res["printed"] = Carbon::create($m[1], $m[2], $m[3], $m[4], $m[5], $m[6], "Europe/Stockholm");
			array_pop($this->text);
		}
	}

	public function parseOrganisation() {
		preg_match("/^(.*)\s(\d{6}-\d{4})/", end($this->text), $matches);
		if (count($matches) === 3) {
			$this->res["organisation"]["name"] = $matches[1];
			$this->res["organisation"]["number"] = $matches[2];
			array_pop($this->text);
		}
	}

	public function parsePeriod() {
		preg_match("/Vald period: (.*)/", end($this->text), $m);
		if (count($m) === 2) {
			$this->res["period"] = $m[1];
			array_pop($this->text);
		}
	}

	public function parseFinancialPeriod() {
		preg_match("/Räkenskapsår: (\d+)-(\d+)-(\d+) - (\d+)-(\d+)-(\d+)/", end($this->text), $m);
		if (count($m) === 7) {
			$this->res["financial_year"]["from"] = Carbon::createFromDate($m[1], $m[2], $m[3]);
			$this->res["financial_year"]["to"]   = Carbon::createFromDate($m[4], $m[5], $m[6]);
			array_pop($this->text);
		}
	}

	public function parseDocuments() {
		preg_match("/Senaste ver.nr: ((.*),\s)*(.*)\tUrval av Sekundär resultatgrupp \(Ur budget\):/", end($this->text), $m);
		if (count($m) === 1) {
			array_pop($this->text);
		}
		if (count($m) === 2 || count($m) === 3) {
			$this->res["lastest_documents"] = explode(", ", $m[1]);
			array_pop($this->text);
		}
		if (count($m) === 4) {
			$this->res["lastest_documents"] = explode(", ", $m[2]);
			$this->res["lastest_documents"][] = $m[3];
			array_pop($this->text);
		}
	}

	public function parseCostCentre() {
		$m = explode(" - ", end($this->text));
		if (count($m) > 3) {
			$this->res["budget_line"]["speedledger_id"] = trim($m[0]);
			$this->res["budget_line"]["committee"] = trim($m[1]);
			unset($m[0]);
			unset($m[1]);
			$this->res["budget_line"]["cost_centre"] = trim(implode(" - ", $m));
			array_pop($this->text);
			while (trim(end($this->text)) != "Resultatrapport") {
				$this->res["budget_line"]["cost_centre"] .= " " . trim(end($this->text));
				array_pop($this->text);
			}
		} else if (count($m) === 3) {
			$this->res["budget_line"]["speedledger_id"] = trim($m[0]);
			$this->res["budget_line"]["committee"] = trim($m[1]);
			$this->res["budget_line"]["cost_centre"] = trim($m[2]);
			array_pop($this->text);
			while (trim(end($this->text)) != "Resultatrapport") {
				$this->res["budget_line"]["cost_centre"] .= " " . trim(end($this->text));
				array_pop($this->text);
			}
		} else if (count($m) === 2) {
			$this->res["budget_line"]["speedledger_id"] = trim($m[0]);
			$this->res["budget_line"]["committee"] = trim($m[1]);
			array_pop($this->text);
			while (trim(end($this->text)) != "Resultatrapport") {
				$this->res["budget_line"]["committee"] .= " " . trim(end($this->text));
				array_pop($this->text);
			}
		} else {
			throw new \Exception("Syntax error in PDF: " . end($this->text));
		}
	}

	public function parseReport() {
		// Resultatrapport
		array_pop($this->text);
		// Perioden
		array_pop($this->text);

		$this->res["spec"] = [];
		while (strpos(end($this->text), "Rörelseresultat") === false) {
			$this->parseLine();
			array_pop($this->text);

			if (count($this->text) === 0) {
				$this->text = array_merge($this->text, explode("\n", array_pop($this->pages)->getText()));
				while (strpos(end($this->text), "Perioden") === false) {
					array_pop($this->text);
				}
				array_pop($this->text);
			}
		}
	}

	public function parseLine() {
		$parts = explode("\t", trim(end($this->text)));
		if (count($parts) !== 3) {
			return;
		}
		$this->res["spec"][$parts[1]]["account"] = $parts[1];
		$this->res["spec"][$parts[1]]["name"]    = $parts[2];
		$this->res["spec"][$parts[1]]["amount"]  = (isset($this->res["spec"][$parts[1]]["amount"]) ? $this->res["spec"][$parts[1]]["amount"] : 0) + intval(preg_replace("/[^-\d]/", "", $parts[0])) / 100;
	}
}






