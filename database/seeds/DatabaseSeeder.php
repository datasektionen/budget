<?php

use Illuminate\Database\Seeder;

use App\Models\CostCentre;
use App\Models\Committee;
use App\Models\BudgetLine;
use App\Models\Account;
use App\Models\Suggestion;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
		$committees = [];
		$costCentres = [];
		DB::table('committees')->delete();
		DB::table('cost_centres')->delete();
		DB::table('budget_lines')->delete();
		
		// Centralt
		$committees[0] = Committee::create(['name' => 'Centralt', 'type' => 'committee']);
		  $costCentres[0] = CostCentre::create(['name' => 'Allmänt', 'committee_id' => $committees[0]->id]);
		    $budgetLine[0] = BudgetLine::create([
		        'name' => 'Bankavgifter', 
		        'income' => 0, 
		        'expenses' => 1170000, 
		        'cost_centre_id' => $costCentres[0]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6570')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6570']);
		      $budgetLine[0]->accounts()->attach($account->id);
		    $budgetLine[1] = BudgetLine::create([
		        'name' => 'Sektionsavgift', 
		        'income' => 4000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[0]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3061')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3061']);
		      $budgetLine[1]->accounts()->attach($account->id);
		      $account = Account::where('number', '3062')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3062']);
		      $budgetLine[1]->accounts()->attach($account->id);
		    $budgetLine[2] = BudgetLine::create([
		        'name' => 'iZettle-avgifter', 
		        'income' => 0, 
		        'expenses' => 2500000, 
		        'cost_centre_id' => $costCentres[0]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6061')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6061']);
		      $budgetLine[2]->accounts()->attach($account->id);
		    $budgetLine[3] = BudgetLine::create([
		        'name' => 'Tillsynsavgifter Myndigheter', 
		        'income' => 0, 
		        'expenses' => 1300000, 
		        'cost_centre_id' => $costCentres[0]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6950')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6950']);
		      $budgetLine[3]->accounts()->attach($account->id);
		    $budgetLine[4] = BudgetLine::create([
		        'name' => 'Ordenstecken och medaljer', 
		        'income' => 0, 
		        'expenses' => 1200000, 
		        'cost_centre_id' => $costCentres[0]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7630')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7630']);
		      $budgetLine[4]->accounts()->attach($account->id);
		    $budgetLine[5] = BudgetLine::create([
		        'name' => 'Teambuilding D-funk', 
		        'income' => 0, 
		        'expenses' => 1500000, 
		        'cost_centre_id' => $costCentres[0]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[5]->accounts()->attach($account->id);
		    $budgetLine[6] = BudgetLine::create([
		        'name' => 'Förbandslåda', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[0]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7620')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7620']);
		      $budgetLine[6]->accounts()->attach($account->id);
		    $budgetLine[7] = BudgetLine::create([
		        'name' => 'Speedledger', 
		        'income' => 0, 
		        'expenses' => 624000, 
		        'cost_centre_id' => $costCentres[0]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5420')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5420']);
		      $budgetLine[7]->accounts()->attach($account->id);
		    $budgetLine[8] = BudgetLine::create([
		        'name' => 'Kontorsmaterial', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[0]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6110')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6110']);
		      $budgetLine[8]->accounts()->attach($account->id);
		    $budgetLine[9] = BudgetLine::create([
		        'name' => 'Förrådshyra', 
		        'income' => 0, 
		        'expenses' => 1100000, 
		        'cost_centre_id' => $costCentres[0]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[9]->accounts()->attach($account->id);
		    $budgetLine[10] = BudgetLine::create([
		        'name' => 'Återanvändbara festatteraljer', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[0]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4036')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4036']);
		      $budgetLine[10]->accounts()->attach($account->id);
		      $account = Account::where('number', '4044')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4044']);
		      $budgetLine[10]->accounts()->attach($account->id);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[10]->accounts()->attach($account->id);
		    $budgetLine[11] = BudgetLine::create([
		        'name' => 'Bokföringsmorot', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[0]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[11]->accounts()->attach($account->id);
		  $costCentres[1] = CostCentre::create(['name' => 'Sektionsmöte', 'committee_id' => $committees[0]->id]);
		    $budgetLine[12] = BudgetLine::create([
		        'name' => 'Mat, dricka och fika', 
		        'income' => 0, 
		        'expenses' => 3000000, 
		        'cost_centre_id' => $costCentres[1]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[12]->accounts()->attach($account->id);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[12]->accounts()->attach($account->id);
		      $account = Account::where('number', '4045')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4045']);
		      $budgetLine[12]->accounts()->attach($account->id);
		    $budgetLine[13] = BudgetLine::create([
		        'name' => 'Märken', 
		        'income' => 0, 
		        'expenses' => 110000, 
		        'cost_centre_id' => $costCentres[1]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7630')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7630']);
		      $budgetLine[13]->accounts()->attach($account->id);
		  $costCentres[2] = CostCentre::create(['name' => 'Utbildning', 'committee_id' => $committees[0]->id]);
		    $budgetLine[14] = BudgetLine::create([
		        'name' => 'Mat, dricka och fika', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[2]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[14]->accounts()->attach($account->id);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[14]->accounts()->attach($account->id);
		      $account = Account::where('number', '4045')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4045']);
		      $budgetLine[14]->accounts()->attach($account->id);
		  $costCentres[3] = CostCentre::create(['name' => 'Bil', 'committee_id' => $committees[0]->id]);
		    $budgetLine[15] = BudgetLine::create([
		        'name' => 'Underhåll', 
		        'income' => 0, 
		        'expenses' => 530000, 
		        'cost_centre_id' => $costCentres[3]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5613')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5613']);
		      $budgetLine[15]->accounts()->attach($account->id);
		    $budgetLine[16] = BudgetLine::create([
		        'name' => 'Drivmedel', 
		        'income' => 0, 
		        'expenses' => 400000, 
		        'cost_centre_id' => $costCentres[3]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5611')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5611']);
		      $budgetLine[16]->accounts()->attach($account->id);
		    $budgetLine[17] = BudgetLine::create([
		        'name' => 'Skatt och Försäkring', 
		        'income' => 0, 
		        'expenses' => 2070000, 
		        'cost_centre_id' => $costCentres[3]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5612')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5612']);
		      $budgetLine[17]->accounts()->attach($account->id);
		    $budgetLine[18] = BudgetLine::create([
		        'name' => 'Crashmedaljer', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[3]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[18]->accounts()->attach($account->id);
		    $budgetLine[19] = BudgetLine::create([
		        'name' => 'Parkering', 
		        'income' => 0, 
		        'expenses' => 948000, 
		        'cost_centre_id' => $costCentres[3]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5617')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5617']);
		      $budgetLine[19]->accounts()->attach($account->id);
		  $costCentres[4] = CostCentre::create(['name' => 'Fanbärare', 'committee_id' => $committees[0]->id]);
		    $budgetLine[20] = BudgetLine::create([
		        'name' => 'Fanborgsavgift', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[4]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6072')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6072']);
		      $budgetLine[20]->accounts()->attach($account->id);
		    $budgetLine[21] = BudgetLine::create([
		        'name' => 'Teambuilding', 
		        'income' => 0, 
		        'expenses' => 75000, 
		        'cost_centre_id' => $costCentres[4]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[21]->accounts()->attach($account->id);
		      $account = Account::where('number', '7693')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7693']);
		      $budgetLine[21]->accounts()->attach($account->id);
		    $budgetLine[22] = BudgetLine::create([
		        'name' => 'Fika till fanborgen på THS', 
		        'income' => 0, 
		        'expenses' => 75000, 
		        'cost_centre_id' => $costCentres[4]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4045')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4045']);
		      $budgetLine[22]->accounts()->attach($account->id);
		  $costCentres[5] = CostCentre::create(['name' => 'Internationell studentkoordinator', 'committee_id' => $committees[0]->id]);
		    $budgetLine[23] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 30000, 
		        'cost_centre_id' => $costCentres[5]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[23]->accounts()->attach($account->id);
		    $budgetLine[24] = BudgetLine::create([
		        'name' => 'Event', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[5]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[24]->accounts()->attach($account->id);
		  $costCentres[6] = CostCentre::create(['name' => 'LOL', 'committee_id' => $committees[0]->id]);
		    $budgetLine[25] = BudgetLine::create([
		        'name' => 'Ljud och ljus', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[6]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4037')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4037']);
		      $budgetLine[25]->accounts()->attach($account->id);
		  $costCentres[7] = CostCentre::create(['name' => 'Nyårsskiftes', 'committee_id' => $committees[0]->id]);
		    $budgetLine[26] = BudgetLine::create([
		        'name' => 'Alkoholbiljetter', 
		        'income' => 200000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[7]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[26]->accounts()->attach($account->id);
		    $budgetLine[27] = BudgetLine::create([
		        'name' => 'Försäljning Dryck', 
		        'income' => 400000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[7]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[27]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[27]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[27]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[27]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[27]->accounts()->attach($account->id);
		    $budgetLine[28] = BudgetLine::create([
		        'name' => 'Inköp Dryck', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[7]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[28]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[28]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[28]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[28]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[28]->accounts()->attach($account->id);
		    $budgetLine[29] = BudgetLine::create([
		        'name' => 'Inköp Mat', 
		        'income' => 0, 
		        'expenses' => 400000, 
		        'cost_centre_id' => $costCentres[7]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[29]->accounts()->attach($account->id);
		    $budgetLine[30] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[7]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[30]->accounts()->attach($account->id);
		  $costCentres[8] = CostCentre::create(['name' => 'Skiftes', 'committee_id' => $committees[0]->id]);
		    $budgetLine[31] = BudgetLine::create([
		        'name' => 'Alkoholbiljetter', 
		        'income' => 200000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[8]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[31]->accounts()->attach($account->id);
		    $budgetLine[32] = BudgetLine::create([
		        'name' => 'Försäljning Dryck', 
		        'income' => 400000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[8]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[32]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[32]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[32]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[32]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[32]->accounts()->attach($account->id);
		    $budgetLine[33] = BudgetLine::create([
		        'name' => 'Inköp Dryck', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[8]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[33]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[33]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[33]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[33]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[33]->accounts()->attach($account->id);
		    $budgetLine[34] = BudgetLine::create([
		        'name' => 'Inköp Mat', 
		        'income' => 0, 
		        'expenses' => 400000, 
		        'cost_centre_id' => $costCentres[8]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[34]->accounts()->attach($account->id);
		    $budgetLine[35] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[8]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[35]->accounts()->attach($account->id);
		  $costCentres[9] = CostCentre::create(['name' => 'd-råd', 'committee_id' => $committees[0]->id]);
		    $budgetLine[36] = BudgetLine::create([
		        'name' => 'Mat & fika', 
		        'income' => 0, 
		        'expenses' => 1200000, 
		        'cost_centre_id' => $costCentres[9]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[36]->accounts()->attach($account->id);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[36]->accounts()->attach($account->id);
		  $costCentres[10] = CostCentre::create(['name' => 'KF-ledamöter', 'committee_id' => $committees[0]->id]);
		    $budgetLine[37] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[10]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[37]->accounts()->attach($account->id);
		
		// Demon
		$committees[1] = Committee::create(['name' => 'Demon', 'type' => 'committee']);
		  $costCentres[11] = CostCentre::create(['name' => 'Allmänt (inget)', 'committee_id' => $committees[1]->id]);
		    $budgetLine[38] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[11]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[38]->accounts()->attach($account->id);
		    $budgetLine[39] = BudgetLine::create([
		        'name' => 'Replokalskostnader', 
		        'income' => 0, 
		        'expenses' => 2040000, 
		        'cost_centre_id' => $costCentres[11]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[39]->accounts()->attach($account->id);
		    $budgetLine[40] = BudgetLine::create([
		        'name' => 'Inköp teknik', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[11]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4037')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4037']);
		      $budgetLine[40]->accounts()->attach($account->id);
		
		// DESC
		$committees[2] = Committee::create(['name' => 'DESC', 'type' => 'committee']);
		  $costCentres[12] = CostCentre::create(['name' => 'Allmänt', 'committee_id' => $committees[2]->id]);
		    $budgetLine[41] = BudgetLine::create([
		        'name' => 'Fika & teambuilding', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[12]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[41]->accounts()->attach($account->id);
		    $budgetLine[42] = BudgetLine::create([
		        'name' => 'Partykonto (steam)', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[12]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[42]->accounts()->attach($account->id);
		  $costCentres[13] = CostCentre::create(['name' => 'Event', 'committee_id' => $committees[2]->id]);
		    $budgetLine[43] = BudgetLine::create([
		        'name' => 'Priser', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[13]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[43]->accounts()->attach($account->id);
		    $budgetLine[44] = BudgetLine::create([
		        'name' => 'Material', 
		        'income' => 0, 
		        'expenses' => 250000, 
		        'cost_centre_id' => $costCentres[13]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[44]->accounts()->attach($account->id);
		  $costCentres[14] = CostCentre::create(['name' => 'Dreamhack', 'committee_id' => $committees[2]->id]);
		    $budgetLine[45] = BudgetLine::create([
		        'name' => 'Transport', 
		        'income' => 0, 
		        'expenses' => 400000, 
		        'cost_centre_id' => $costCentres[14]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[45]->accounts()->attach($account->id);
		
		// Drektoratet
		$committees[3] = Committee::create(['name' => 'Drektoratet', 'type' => 'committee']);
		  $costCentres[15] = CostCentre::create(['name' => 'Allmänt', 'committee_id' => $committees[3]->id]);
		    $budgetLine[46] = BudgetLine::create([
		        'name' => 'Dispositionsfond', 
		        'income' => 0, 
		        'expenses' => 5000000, 
		        'cost_centre_id' => $costCentres[15]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[46]->accounts()->attach($account->id);
		    $budgetLine[47] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 400000, 
		        'cost_centre_id' => $costCentres[15]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[47]->accounts()->attach($account->id);
		    $budgetLine[48] = BudgetLine::create([
		        'name' => 'MUTA', 
		        'income' => 0, 
		        'expenses' => 2500000, 
		        'cost_centre_id' => $costCentres[15]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[48]->accounts()->attach($account->id);
		    $budgetLine[49] = BudgetLine::create([
		        'name' => 'Representation', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[15]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6072')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6072']);
		      $budgetLine[49]->accounts()->attach($account->id);
		    $budgetLine[50] = BudgetLine::create([
		        'name' => 'Tryckkostnad', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[15]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6150')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6150']);
		      $budgetLine[50]->accounts()->attach($account->id);
		    $budgetLine[51] = BudgetLine::create([
		        'name' => 'Profilmaterial', 
		        'income' => 0, 
		        'expenses' => 250000, 
		        'cost_centre_id' => $costCentres[15]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[51]->accounts()->attach($account->id);
		  $costCentres[16] = CostCentre::create(['name' => 'Styrelsemiddag', 'committee_id' => $committees[3]->id]);
		    $budgetLine[52] = BudgetLine::create([
		        'name' => 'Teambuilding', 
		        'income' => 0, 
		        'expenses' => 400000, 
		        'cost_centre_id' => $costCentres[16]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[52]->accounts()->attach($account->id);
		  $costCentres[17] = CostCentre::create(['name' => 'Överlämning', 'committee_id' => $committees[3]->id]);
		    $budgetLine[53] = BudgetLine::create([
		        'name' => 'Mat och aktivitet', 
		        'income' => 0, 
		        'expenses' => 450000, 
		        'cost_centre_id' => $costCentres[17]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[53]->accounts()->attach($account->id);
		  $costCentres[18] = CostCentre::create(['name' => 'D-wreckmiddag', 'committee_id' => $committees[3]->id]);
		    $budgetLine[54] = BudgetLine::create([
		        'name' => 'Biljettintäkter', 
		        'income' => 200000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[18]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[54]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[54]->accounts()->attach($account->id);
		    $budgetLine[55] = BudgetLine::create([
		        'name' => 'Inköp mat, dekoration, mm.', 
		        'income' => 0, 
		        'expenses' => 450000, 
		        'cost_centre_id' => $costCentres[18]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[55]->accounts()->attach($account->id);
		
		// Idrottsnämnden
		$committees[4] = Committee::create(['name' => 'Idrottsnämnden', 'type' => 'committee']);
		  $costCentres[19] = CostCentre::create(['name' => 'Allmänt (inget)', 'committee_id' => $committees[4]->id]);
		    $budgetLine[56] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[19]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[56]->accounts()->attach($account->id);
		    $budgetLine[57] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 3000000, 
		        'cost_centre_id' => $costCentres[19]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[57]->accounts()->attach($account->id);
		    $budgetLine[58] = BudgetLine::create([
		        'name' => 'Friskvårdsbidrag', 
		        'income' => 2000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[19]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3989')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3989']);
		      $budgetLine[58]->accounts()->attach($account->id);
		    $budgetLine[59] = BudgetLine::create([
		        'name' => 'Hockeyevent', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[19]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4620')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4620']);
		      $budgetLine[59]->accounts()->attach($account->id);
		    $budgetLine[60] = BudgetLine::create([
		        'name' => 'Utrustning', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[19]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[60]->accounts()->attach($account->id);
		    $budgetLine[61] = BudgetLine::create([
		        'name' => 'Fotbollsevent', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[19]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[61]->accounts()->attach($account->id);
		
		// Informationsorganet
		$committees[5] = Committee::create(['name' => 'Informationsorganet', 'type' => 'committee']);
		  $costCentres[20] = CostCentre::create(['name' => 'Crash & Bränn', 'committee_id' => $committees[5]->id]);
		    $budgetLine[62] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[20]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[62]->accounts()->attach($account->id);
		    $budgetLine[63] = BudgetLine::create([
		        'name' => 'Mjuk- och hårdvarukostnader', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[20]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6541')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6541']);
		      $budgetLine[63]->accounts()->attach($account->id);
		      $account = Account::where('number', '4037')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4037']);
		      $budgetLine[63]->accounts()->attach($account->id);
		    $budgetLine[64] = BudgetLine::create([
		        'name' => 'MUTA, när allt crashar & brinner', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[20]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[64]->accounts()->attach($account->id);
		  $costCentres[21] = CostCentre::create(['name' => 'Tag Monkeys', 'committee_id' => $committees[5]->id]);
		    $budgetLine[65] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 240000, 
		        'cost_centre_id' => $costCentres[21]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[65]->accounts()->attach($account->id);
		    $budgetLine[66] = BudgetLine::create([
		        'name' => 'Grafisk utveckling', 
		        'income' => 0, 
		        'expenses' => 700000, 
		        'cost_centre_id' => $costCentres[21]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4030')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4030']);
		      $budgetLine[66]->accounts()->attach($account->id);
		    $budgetLine[67] = BudgetLine::create([
		        'name' => 'Coola grejer till META', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[21]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[67]->accounts()->attach($account->id);
		    $budgetLine[68] = BudgetLine::create([
		        'name' => 'Kameratillbehör', 
		        'income' => 0, 
		        'expenses' => 450000, 
		        'cost_centre_id' => $costCentres[21]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[68]->accounts()->attach($account->id);
		  $costCentres[22] = CostCentre::create(['name' => 'Redaqtionen', 'committee_id' => $committees[5]->id]);
		    $budgetLine[69] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[22]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[69]->accounts()->attach($account->id);
		    $budgetLine[70] = BudgetLine::create([
		        'name' => 'Tryckkostnad', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[22]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6150')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6150']);
		      $budgetLine[70]->accounts()->attach($account->id);
		    $budgetLine[71] = BudgetLine::create([
		        'name' => 'Webbdomän', 
		        'income' => 0, 
		        'expenses' => 55000, 
		        'cost_centre_id' => $costCentres[22]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6541')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6541']);
		      $budgetLine[71]->accounts()->attach($account->id);
		    $budgetLine[72] = BudgetLine::create([
		        'name' => 'Profilmaterial', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[22]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5931')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5931']);
		      $budgetLine[72]->accounts()->attach($account->id);
		    $budgetLine[73] = BudgetLine::create([
		        'name' => 'Journalistiska kostnader', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[22]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6950')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6950']);
		      $budgetLine[73]->accounts()->attach($account->id);
		
		// Jämlikhetsnämnden
		$committees[6] = Committee::create(['name' => 'Jämlikhetsnämnden', 'type' => 'committee']);
		  $costCentres[23] = CostCentre::create(['name' => 'Allmänt', 'committee_id' => $committees[6]->id]);
		    $budgetLine[74] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[23]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[74]->accounts()->attach($account->id);
		
		// Konglig Östrogennämnden
		$committees[7] = Committee::create(['name' => 'Konglig Östrogennämnden', 'type' => 'committee']);
		  $costCentres[24] = CostCentre::create(['name' => 'Allmänt', 'committee_id' => $committees[7]->id]);
		    $budgetLine[75] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[24]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[75]->accounts()->attach($account->id);
		  $costCentres[25] = CostCentre::create(['name' => 'Vårevent', 'committee_id' => $committees[7]->id]);
		    $budgetLine[76] = BudgetLine::create([
		        'name' => 'Event', 
		        'income' => 300000, 
		        'expenses' => 400000, 
		        'cost_centre_id' => $costCentres[25]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[76]->accounts()->attach($account->id);
		  $costCentres[26] = CostCentre::create(['name' => 'Höstevent', 'committee_id' => $committees[7]->id]);
		    $budgetLine[77] = BudgetLine::create([
		        'name' => 'Event', 
		        'income' => 300000, 
		        'expenses' => 400000, 
		        'cost_centre_id' => $costCentres[26]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[77]->accounts()->attach($account->id);
		
		// Näringslivsgruppen
		$committees[8] = Committee::create(['name' => 'Näringslivsgruppen', 'type' => 'committee']);
		  $costCentres[27] = CostCentre::create(['name' => 'Allmänt', 'committee_id' => $committees[8]->id]);
		    $budgetLine[78] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[27]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[78]->accounts()->attach($account->id);
		    $budgetLine[79] = BudgetLine::create([
		        'name' => 'Teambuilding', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[27]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[79]->accounts()->attach($account->id);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[79]->accounts()->attach($account->id);
		      $account = Account::where('number', '7693')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7693']);
		      $budgetLine[79]->accounts()->attach($account->id);
		    $budgetLine[80] = BudgetLine::create([
		        'name' => 'Domänkostnader', 
		        'income' => 0, 
		        'expenses' => 40000, 
		        'cost_centre_id' => $costCentres[27]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6541')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6541']);
		      $budgetLine[80]->accounts()->attach($account->id);
		    $budgetLine[81] = BudgetLine::create([
		        'name' => 'Profilkläder', 
		        'income' => 0, 
		        'expenses' => 550000, 
		        'cost_centre_id' => $costCentres[27]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[81]->accounts()->attach($account->id);
		  $costCentres[28] = CostCentre::create(['name' => 'Annonsering ', 'committee_id' => $committees[8]->id]);
		    $budgetLine[82] = BudgetLine::create([
		        'name' => 'Affischer', 
		        'income' => 800000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[28]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3051')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3051']);
		      $budgetLine[82]->accounts()->attach($account->id);
		    $budgetLine[83] = BudgetLine::create([
		        'name' => 'Digital marknadsföring', 
		        'income' => 1700000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[28]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3053')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3053']);
		      $budgetLine[83]->accounts()->attach($account->id);
		    $budgetLine[84] = BudgetLine::create([
		        'name' => 'Tryckkostnader', 
		        'income' => 0, 
		        'expenses' => 80000, 
		        'cost_centre_id' => $costCentres[28]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6150')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6150']);
		      $budgetLine[84]->accounts()->attach($account->id);
		  $costCentres[29] = CostCentre::create(['name' => 'Besök i sektionslokal', 'committee_id' => $committees[8]->id]);
		    $budgetLine[85] = BudgetLine::create([
		        'name' => 'Baspaket', 
		        'income' => 1400000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[29]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[85]->accounts()->attach($account->id);
		  $costCentres[30] = CostCentre::create(['name' => 'Lunchföreläsningar', 'committee_id' => $committees[8]->id]);
		    $budgetLine[86] = BudgetLine::create([
		        'name' => 'Baspaket', 
		        'income' => 3000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[30]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[86]->accounts()->attach($account->id);
		    $budgetLine[87] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[30]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[87]->accounts()->attach($account->id);
		    $budgetLine[88] = BudgetLine::create([
		        'name' => 'Matkostnad', 
		        'income' => 3000000, 
		        'expenses' => 2300000, 
		        'cost_centre_id' => $costCentres[30]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3029']);
		      $budgetLine[88]->accounts()->attach($account->id);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[88]->accounts()->attach($account->id);
		  $costCentres[31] = CostCentre::create(['name' => 'Företagspub', 'committee_id' => $committees[8]->id]);
		    $budgetLine[89] = BudgetLine::create([
		        'name' => 'Baspaket', 
		        'income' => 3000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[31]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[89]->accounts()->attach($account->id);
		    $budgetLine[90] = BudgetLine::create([
		        'name' => 'Vinst från barbongar', 
		        'income' => 450000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[31]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3693')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3693']);
		      $budgetLine[90]->accounts()->attach($account->id);
		    $budgetLine[91] = BudgetLine::create([
		        'name' => 'Tryckkostnader', 
		        'income' => 0, 
		        'expenses' => 120000, 
		        'cost_centre_id' => $costCentres[31]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[91]->accounts()->attach($account->id);
		  $costCentres[32] = CostCentre::create(['name' => 'D-Dagen - Allmänt', 'committee_id' => $committees[8]->id]);
		    $budgetLine[92] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[32]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[92]->accounts()->attach($account->id);
		    $budgetLine[93] = BudgetLine::create([
		        'name' => 'Flugor', 
		        'income' => 0, 
		        'expenses' => 700000, 
		        'cost_centre_id' => $costCentres[32]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7630')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7630']);
		      $budgetLine[93]->accounts()->attach($account->id);
		    $budgetLine[94] = BudgetLine::create([
		        'name' => 'Tackfest, Ej alkohol', 
		        'income' => 0, 
		        'expenses' => 1400000, 
		        'cost_centre_id' => $costCentres[32]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[94]->accounts()->attach($account->id);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[94]->accounts()->attach($account->id);
		    $budgetLine[95] = BudgetLine::create([
		        'name' => 'Teambuilding', 
		        'income' => 0, 
		        'expenses' => 650000, 
		        'cost_centre_id' => $costCentres[32]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7630')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7630']);
		      $budgetLine[95]->accounts()->attach($account->id);
		    $budgetLine[96] = BudgetLine::create([
		        'name' => 'Profilkläder', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[32]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4044')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4044']);
		      $budgetLine[96]->accounts()->attach($account->id);
		    $budgetLine[97] = BudgetLine::create([
		        'name' => 'Taskforce-tröjor', 
		        'income' => 0, 
		        'expenses' => 350000, 
		        'cost_centre_id' => $costCentres[32]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4044')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4044']);
		      $budgetLine[97]->accounts()->attach($account->id);
		  $costCentres[33] = CostCentre::create(['name' => 'D-Dagen - Mässan', 'committee_id' => $committees[8]->id]);
		    $budgetLine[98] = BudgetLine::create([
		        'name' => 'Baspaket', 
		        'income' => 137460000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[33]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[98]->accounts()->attach($account->id);
		    $budgetLine[99] = BudgetLine::create([
		        'name' => 'Extrabeställningar', 
		        'income' => 5000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[33]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[99]->accounts()->attach($account->id);
		    $budgetLine[100] = BudgetLine::create([
		        'name' => 'Goodiebags', 
		        'income' => 750000, 
		        'expenses' => 2800000, 
		        'cost_centre_id' => $costCentres[33]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3051')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3051']);
		      $budgetLine[100]->accounts()->attach($account->id);
		      $account = Account::where('number', '5930')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5930']);
		      $budgetLine[100]->accounts()->attach($account->id);
		    $budgetLine[101] = BudgetLine::create([
		        'name' => 'Tryck- & marknadsföringskostnader', 
		        'income' => 0, 
		        'expenses' => 12000000, 
		        'cost_centre_id' => $costCentres[33]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6150')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6150']);
		      $budgetLine[101]->accounts()->attach($account->id);
		    $budgetLine[102] = BudgetLine::create([
		        'name' => 'Mat - dag (personal och företagsrep.)', 
		        'income' => 0, 
		        'expenses' => 2700000, 
		        'cost_centre_id' => $costCentres[33]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[102]->accounts()->attach($account->id);
		    $budgetLine[103] = BudgetLine::create([
		        'name' => 'Mat - kväll (personal)', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[33]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[103]->accounts()->attach($account->id);
		    $budgetLine[104] = BudgetLine::create([
		        'name' => 'Mat förberedelsekvällen', 
		        'income' => 0, 
		        'expenses' => 580000, 
		        'cost_centre_id' => $costCentres[33]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[104]->accounts()->attach($account->id);
		    $budgetLine[105] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[33]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4045')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4045']);
		      $budgetLine[105]->accounts()->attach($account->id);
		    $budgetLine[106] = BudgetLine::create([
		        'name' => 'Hyra - Bord', 
		        'income' => 0, 
		        'expenses' => 1500000, 
		        'cost_centre_id' => $costCentres[33]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5220')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5220']);
		      $budgetLine[106]->accounts()->attach($account->id);
		    $budgetLine[107] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 9500000, 
		        'cost_centre_id' => $costCentres[33]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[107]->accounts()->attach($account->id);
		    $budgetLine[108] = BudgetLine::create([
		        'name' => 'Bilkostnader', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[33]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5611')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5611']);
		      $budgetLine[108]->accounts()->attach($account->id);
		    $budgetLine[109] = BudgetLine::create([
		        'name' => 'Dekorationer', 
		        'income' => 0, 
		        'expenses' => 800000, 
		        'cost_centre_id' => $costCentres[33]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[109]->accounts()->attach($account->id);
		    $budgetLine[110] = BudgetLine::create([
		        'name' => 'Företagsrabatter', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[33]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3730')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3730']);
		      $budgetLine[110]->accounts()->attach($account->id);
		    $budgetLine[111] = BudgetLine::create([
		        'name' => 'Mattor', 
		        'income' => 0, 
		        'expenses' => 2500000, 
		        'cost_centre_id' => $costCentres[33]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5930')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5930']);
		      $budgetLine[111]->accounts()->attach($account->id);
		    $budgetLine[112] = BudgetLine::create([
		        'name' => 'Vatten', 
		        'income' => 0, 
		        'expenses' => 800000, 
		        'cost_centre_id' => $costCentres[33]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5930')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5930']);
		      $budgetLine[112]->accounts()->attach($account->id);
		    $budgetLine[113] = BudgetLine::create([
		        'name' => 'Sopor', 
		        'income' => 0, 
		        'expenses' => 40000, 
		        'cost_centre_id' => $costCentres[33]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5060')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5060']);
		      $budgetLine[113]->accounts()->attach($account->id);
		  $costCentres[34] = CostCentre::create(['name' => 'D-Dagen - Event', 'committee_id' => $committees[8]->id]);
		    $budgetLine[114] = BudgetLine::create([
		        'name' => 'Företagspengar', 
		        'income' => 3000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[34]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[114]->accounts()->attach($account->id);
		    $budgetLine[115] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 2100000, 
		        'cost_centre_id' => $costCentres[34]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[115]->accounts()->attach($account->id);
		    $budgetLine[116] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 350000, 
		        'cost_centre_id' => $costCentres[34]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[116]->accounts()->attach($account->id);
		  $costCentres[35] = CostCentre::create(['name' => 'D-Dagen - Sittningen', 'committee_id' => $committees[8]->id]);
		    $budgetLine[117] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 7260000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[35]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[117]->accounts()->attach($account->id);
		    $budgetLine[118] = BudgetLine::create([
		        'name' => 'Sittning', 
		        'income' => 0, 
		        'expenses' => 13560000, 
		        'cost_centre_id' => $costCentres[35]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[118]->accounts()->attach($account->id);
		    $budgetLine[119] = BudgetLine::create([
		        'name' => 'Personalkostnader efterkör', 
		        'income' => 0, 
		        'expenses' => 1020000, 
		        'cost_centre_id' => $costCentres[35]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[119]->accounts()->attach($account->id);
		  $costCentres[36] = CostCentre::create(['name' => 'D-Dagen - Efterkör', 'committee_id' => $committees[8]->id]);
		    $budgetLine[120] = BudgetLine::create([
		        'name' => 'Vinst från barbongar', 
		        'income' => 122500, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[36]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3693')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3693']);
		      $budgetLine[120]->accounts()->attach($account->id);
		    $budgetLine[121] = BudgetLine::create([
		        'name' => 'Försäljning Dryck', 
		        'income' => 1000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[36]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[121]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[121]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[121]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[121]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[121]->accounts()->attach($account->id);
		    $budgetLine[122] = BudgetLine::create([
		        'name' => 'Inköp Dryck', 
		        'income' => 0, 
		        'expenses' => 850000, 
		        'cost_centre_id' => $costCentres[36]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[122]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[122]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[122]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[122]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[122]->accounts()->attach($account->id);
		
		// Prylmångleriet
		$committees[9] = Committee::create(['name' => 'Prylmångleriet', 'type' => 'committee']);
		  $costCentres[37] = CostCentre::create(['name' => 'Allmänt (inget)', 'committee_id' => $committees[9]->id]);
		    $budgetLine[123] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[37]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[123]->accounts()->attach($account->id);
		    $budgetLine[124] = BudgetLine::create([
		        'name' => 'Försäljning Overaller', 
		        'income' => 7000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[37]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3028')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3028']);
		      $budgetLine[124]->accounts()->attach($account->id);
		    $budgetLine[125] = BudgetLine::create([
		        'name' => 'Försäljning Prylis', 
		        'income' => 5000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[37]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3027')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3027']);
		      $budgetLine[125]->accounts()->attach($account->id);
		    $budgetLine[126] = BudgetLine::create([
		        'name' => 'Inköp Overaller', 
		        'income' => 0, 
		        'expenses' => 7000000, 
		        'cost_centre_id' => $costCentres[37]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4028')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4028']);
		      $budgetLine[126]->accounts()->attach($account->id);
		    $budgetLine[127] = BudgetLine::create([
		        'name' => 'Inköp Prylis', 
		        'income' => 0, 
		        'expenses' => 4800000, 
		        'cost_centre_id' => $costCentres[37]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4027')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4027']);
		      $budgetLine[127]->accounts()->attach($account->id);
		
		// Qulturnämnden
		$committees[10] = Committee::create(['name' => 'Qulturnämnden', 'type' => 'committee']);
		  $costCentres[38] = CostCentre::create(['name' => 'Allmänt (inget)', 'committee_id' => $committees[10]->id]);
		    $budgetLine[128] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[38]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[128]->accounts()->attach($account->id);
		    $budgetLine[129] = BudgetLine::create([
		        'name' => 'Inköp av Qultur', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[38]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4030')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4030']);
		      $budgetLine[129]->accounts()->attach($account->id);
		    $budgetLine[130] = BudgetLine::create([
		        'name' => 'Tackmiddag', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[38]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[130]->accounts()->attach($account->id);
		      $account = Account::where('number', '7693')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7693']);
		      $budgetLine[130]->accounts()->attach($account->id);
		    $budgetLine[131] = BudgetLine::create([
		        'name' => 'Qulturella event', 
		        'income' => 0, 
		        'expenses' => 350000, 
		        'cost_centre_id' => $costCentres[38]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[131]->accounts()->attach($account->id);
		    $budgetLine[132] = BudgetLine::create([
		        'name' => 'Ny QN-hylla', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[38]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[132]->accounts()->attach($account->id);
		
		// Sektionslokalsgruppen
		$committees[11] = Committee::create(['name' => 'Sektionslokalsgruppen', 'type' => 'committee']);
		  $costCentres[39] = CostCentre::create(['name' => 'Allmänt', 'committee_id' => $committees[11]->id]);
		    $budgetLine[133] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[39]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[133]->accounts()->attach($account->id);
		    $budgetLine[134] = BudgetLine::create([
		        'name' => 'Inköp te/kaffe', 
		        'income' => 0, 
		        'expenses' => 900000, 
		        'cost_centre_id' => $costCentres[39]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[134]->accounts()->attach($account->id);
		    $budgetLine[135] = BudgetLine::create([
		        'name' => 'Inköp förbrukningsvaror', 
		        'income' => 0, 
		        'expenses' => 600000, 
		        'cost_centre_id' => $costCentres[39]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5460')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5460']);
		      $budgetLine[135]->accounts()->attach($account->id);
		    $budgetLine[136] = BudgetLine::create([
		        'name' => 'Inköp och underhåll av inventarier', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[39]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5410')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5410']);
		      $budgetLine[136]->accounts()->attach($account->id);
		      $account = Account::where('number', '5510')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5510']);
		      $budgetLine[136]->accounts()->attach($account->id);
		    $budgetLine[137] = BudgetLine::create([
		        'name' => 'Städmaterial', 
		        'income' => 0, 
		        'expenses' => 400000, 
		        'cost_centre_id' => $costCentres[39]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5464')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5464']);
		      $budgetLine[137]->accounts()->attach($account->id);
		    $budgetLine[138] = BudgetLine::create([
		        'name' => 'Underhåll läskkyl', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[39]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[138]->accounts()->attach($account->id);
		      $account = Account::where('number', '4026')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4026']);
		      $budgetLine[138]->accounts()->attach($account->id);
		      $account = Account::where('number', '4045')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4045']);
		      $budgetLine[138]->accounts()->attach($account->id);
		    $budgetLine[139] = BudgetLine::create([
		        'name' => 'Underhåll META-TV', 
		        'income' => 0, 
		        'expenses' => 80000, 
		        'cost_centre_id' => $costCentres[39]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4037')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4037']);
		      $budgetLine[139]->accounts()->attach($account->id);
		    $budgetLine[140] = BudgetLine::create([
		        'name' => 'Teambuilding', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[39]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[140]->accounts()->attach($account->id);
		      $account = Account::where('number', '7693')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7693']);
		      $budgetLine[140]->accounts()->attach($account->id);
		    $budgetLine[141] = BudgetLine::create([
		        'name' => 'Städfirma', 
		        'income' => 0, 
		        'expenses' => 1500000, 
		        'cost_centre_id' => $costCentres[39]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5060')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5060']);
		      $budgetLine[141]->accounts()->attach($account->id);
		    $budgetLine[142] = BudgetLine::create([
		        'name' => 'Städ-MUTA', 
		        'income' => 0, 
		        'expenses' => 400000, 
		        'cost_centre_id' => $costCentres[39]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[142]->accounts()->attach($account->id);
		    $budgetLine[143] = BudgetLine::create([
		        'name' => 'Tackmaterial', 
		        'income' => 0, 
		        'expenses' => 250000, 
		        'cost_centre_id' => $costCentres[39]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7630')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7630']);
		      $budgetLine[143]->accounts()->attach($account->id);
		    $budgetLine[144] = BudgetLine::create([
		        'name' => 'Profilkläder', 
		        'income' => 0, 
		        'expenses' => 250000, 
		        'cost_centre_id' => $costCentres[39]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[144]->accounts()->attach($account->id);
		  $costCentres[40] = CostCentre::create(['name' => 'Måndagsstädsfest', 'committee_id' => $committees[11]->id]);
		    $budgetLine[145] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 100000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[40]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[145]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[145]->accounts()->attach($account->id);
		    $budgetLine[146] = BudgetLine::create([
		        'name' => 'Försäljning Dryck', 
		        'income' => 300000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[40]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[146]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[146]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[146]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[146]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[146]->accounts()->attach($account->id);
		    $budgetLine[147] = BudgetLine::create([
		        'name' => 'Inköp Mat', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[40]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[147]->accounts()->attach($account->id);
		    $budgetLine[148] = BudgetLine::create([
		        'name' => 'Inköp Dryck', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[40]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[148]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[148]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[148]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[148]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[148]->accounts()->attach($account->id);
		    $budgetLine[149] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[40]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[149]->accounts()->attach($account->id);
		  $costCentres[41] = CostCentre::create(['name' => 'EasyTappen / dJulstäd', 'committee_id' => $committees[11]->id]);
		    $budgetLine[150] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 100000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[41]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[150]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[150]->accounts()->attach($account->id);
		    $budgetLine[151] = BudgetLine::create([
		        'name' => 'Försäljning Dryck', 
		        'income' => 300000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[41]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[151]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[151]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[151]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[151]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[151]->accounts()->attach($account->id);
		    $budgetLine[152] = BudgetLine::create([
		        'name' => 'Inköp Mat', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[41]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[152]->accounts()->attach($account->id);
		    $budgetLine[153] = BudgetLine::create([
		        'name' => 'Inköp Dryck', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[41]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[153]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[153]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[153]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[153]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[153]->accounts()->attach($account->id);
		    $budgetLine[154] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[41]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[154]->accounts()->attach($account->id);
		  $costCentres[42] = CostCentre::create(['name' => 'X-scapomiddag', 'committee_id' => $committees[11]->id]);
		    $budgetLine[155] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 400000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[42]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[155]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[155]->accounts()->attach($account->id);
		    $budgetLine[156] = BudgetLine::create([
		        'name' => 'Försäljning Dryck', 
		        'income' => 300000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[42]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[156]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[156]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[156]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[156]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[156]->accounts()->attach($account->id);
		    $budgetLine[157] = BudgetLine::create([
		        'name' => 'Inköp Mat', 
		        'income' => 0, 
		        'expenses' => 250000, 
		        'cost_centre_id' => $costCentres[42]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[157]->accounts()->attach($account->id);
		    $budgetLine[158] = BudgetLine::create([
		        'name' => 'Inköp Dryck', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[42]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[158]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[158]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[158]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[158]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[158]->accounts()->attach($account->id);
		    $budgetLine[159] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[42]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[159]->accounts()->attach($account->id);
		
		// Studienämnden
		$committees[12] = Committee::create(['name' => 'Studienämnden', 'type' => 'committee']);
		  $costCentres[43] = CostCentre::create(['name' => 'Allmänt (inget)', 'committee_id' => $committees[12]->id]);
		    $budgetLine[160] = BudgetLine::create([
		        'name' => 'Fika/mat till studienämndsmöten (extern)', 
		        'income' => 0, 
		        'expenses' => 600000, 
		        'cost_centre_id' => $costCentres[43]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[160]->accounts()->attach($account->id);
		    $budgetLine[161] = BudgetLine::create([
		        'name' => 'Arrangemang', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[43]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[161]->accounts()->attach($account->id);
		    $budgetLine[162] = BudgetLine::create([
		        'name' => 'Teambuilding', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[43]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[162]->accounts()->attach($account->id);
		    $budgetLine[163] = BudgetLine::create([
		        'name' => 'Fika (intern)', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[43]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[163]->accounts()->attach($account->id);
		
		// Valberedningen
		$committees[13] = Committee::create(['name' => 'Valberedningen', 'type' => 'committee']);
		  $costCentres[44] = CostCentre::create(['name' => 'Allmänt (inget)', 'committee_id' => $committees[13]->id]);
		    $budgetLine[164] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[44]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[164]->accounts()->attach($account->id);
		    $budgetLine[165] = BudgetLine::create([
		        'name' => 'Kandidatutfrågning mat', 
		        'income' => 0, 
		        'expenses' => 550000, 
		        'cost_centre_id' => $costCentres[44]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[165]->accounts()->attach($account->id);
		    $budgetLine[166] = BudgetLine::create([
		        'name' => 'Rosor', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[44]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4030')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4030']);
		      $budgetLine[166]->accounts()->attach($account->id);
		    $budgetLine[167] = BudgetLine::create([
		        'name' => 'Teambuilding', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[44]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[167]->accounts()->attach($account->id);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[167]->accounts()->attach($account->id);
		    $budgetLine[168] = BudgetLine::create([
		        'name' => 'Profilkläder', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[44]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[168]->accounts()->attach($account->id);
		
		// Baknämnden
		$committees[14] = Committee::create(['name' => 'Baknämnden', 'type' => 'committee']);
		  $costCentres[45] = CostCentre::create(['name' => 'Allmänt', 'committee_id' => $committees[14]->id]);
		    $budgetLine[169] = BudgetLine::create([
		        'name' => 'Maskiner och redskap', 
		        'income' => 0, 
		        'expenses' => 309600, 
		        'cost_centre_id' => $costCentres[45]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4037')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4037']);
		      $budgetLine[169]->accounts()->attach($account->id);
		    $budgetLine[170] = BudgetLine::create([
		        'name' => 'Basingredienser', 
		        'income' => 0, 
		        'expenses' => 90400, 
		        'cost_centre_id' => $costCentres[45]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5460')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5460']);
		      $budgetLine[170]->accounts()->attach($account->id);
		    $budgetLine[171] = BudgetLine::create([
		        'name' => 'Teambuilding', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[45]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[171]->accounts()->attach($account->id);
		    $budgetLine[172] = BudgetLine::create([
		        'name' => 'Hemsida', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[45]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6541')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6541']);
		      $budgetLine[172]->accounts()->attach($account->id);
		
		// 
		$committees[15] = Committee::create(['name' => 'Mottagningen', 'type' => 'committee']);
		  $costCentres[46] = CostCentre::create(['name' => 'MOT-Allmänt', 'committee_id' => $committees[15]->id]);
		    $budgetLine[173] = BudgetLine::create([
		        'name' => 'Kontorsmaterial', 
		        'income' => 0, 
		        'expenses' => 290000, 
		        'cost_centre_id' => $costCentres[46]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6110')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6110']);
		      $budgetLine[173]->accounts()->attach($account->id);
		    $budgetLine[174] = BudgetLine::create([
		        'name' => 'Medaljer', 
		        'income' => 0, 
		        'expenses' => 440000, 
		        'cost_centre_id' => $costCentres[46]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7630')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7630']);
		      $budgetLine[174]->accounts()->attach($account->id);
		    $budgetLine[175] = BudgetLine::create([
		        'name' => 'Diverse teknik', 
		        'income' => 0, 
		        'expenses' => 900000, 
		        'cost_centre_id' => $costCentres[46]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4037')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4037']);
		      $budgetLine[175]->accounts()->attach($account->id);
		    $budgetLine[176] = BudgetLine::create([
		        'name' => 'Förbrukningsinventarier', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[46]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5410')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5410']);
		      $budgetLine[176]->accounts()->attach($account->id);
		    $budgetLine[177] = BudgetLine::create([
		        'name' => 'Förbrukningsmateriel', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[46]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5460')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5460']);
		      $budgetLine[177]->accounts()->attach($account->id);
		    $budgetLine[178] = BudgetLine::create([
		        'name' => 'Tryck', 
		        'income' => 0, 
		        'expenses' => 1600000, 
		        'cost_centre_id' => $costCentres[46]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6150')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6150']);
		      $budgetLine[178]->accounts()->attach($account->id);
		    $budgetLine[179] = BudgetLine::create([
		        'name' => 'Mörkläggning', 
		        'income' => 0, 
		        'expenses' => 680000, 
		        'cost_centre_id' => $costCentres[46]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5461')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5461']);
		      $budgetLine[179]->accounts()->attach($account->id);
		    $budgetLine[180] = BudgetLine::create([
		        'name' => 'Sjuk & hälsovård', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[46]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7620')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7620']);
		      $budgetLine[180]->accounts()->attach($account->id);
		    $budgetLine[181] = BudgetLine::create([
		        'name' => 'Gåvor', 
		        'income' => 0, 
		        'expenses' => 270000, 
		        'cost_centre_id' => $costCentres[46]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6072')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6072']);
		      $budgetLine[181]->accounts()->attach($account->id);
		    $budgetLine[182] = BudgetLine::create([
		        'name' => 'Tygmärken', 
		        'income' => 0, 
		        'expenses' => 1400000, 
		        'cost_centre_id' => $costCentres[46]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4027')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4027']);
		      $budgetLine[182]->accounts()->attach($account->id);
		    $budgetLine[183] = BudgetLine::create([
		        'name' => 'Stickers', 
		        'income' => 0, 
		        'expenses' => 37000, 
		        'cost_centre_id' => $costCentres[46]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3027')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3027']);
		      $budgetLine[183]->accounts()->attach($account->id);
		      $account = Account::where('number', '4027')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4027']);
		      $budgetLine[183]->accounts()->attach($account->id);
		    $budgetLine[184] = BudgetLine::create([
		        'name' => 'Bil- och släphyra', 
		        'income' => 0, 
		        'expenses' => 350000, 
		        'cost_centre_id' => $costCentres[46]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5820')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5820']);
		      $budgetLine[184]->accounts()->attach($account->id);
		    $budgetLine[185] = BudgetLine::create([
		        'name' => 'Slack', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[46]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5420')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5420']);
		      $budgetLine[185]->accounts()->attach($account->id);
		    $budgetLine[186] = BudgetLine::create([
		        'name' => 'Örådsrestaurering', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[46]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5510')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5510']);
		      $budgetLine[186]->accounts()->attach($account->id);
		    $budgetLine[187] = BudgetLine::create([
		        'name' => 'Bankkostnader', 
		        'income' => 0, 
		        'expenses' => 10000, 
		        'cost_centre_id' => $costCentres[46]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6570')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6570']);
		      $budgetLine[187]->accounts()->attach($account->id);
		    $budgetLine[188] = BudgetLine::create([
		        'name' => 'Intervjufika', 
		        'income' => 0, 
		        'expenses' => 75000, 
		        'cost_centre_id' => $costCentres[46]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[188]->accounts()->attach($account->id);
		  $costCentres[47] = CostCentre::create(['name' => 'Titel', 'committee_id' => $committees[15]->id]);
		    $budgetLine[189] = BudgetLine::create([
		        'name' => 'Titelfika', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[47]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[189]->accounts()->attach($account->id);
		    $budgetLine[190] = BudgetLine::create([
		        'name' => 'Titelbastu', 
		        'income' => 0, 
		        'expenses' => 70000, 
		        'cost_centre_id' => $costCentres[47]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[190]->accounts()->attach($account->id);
		    $budgetLine[191] = BudgetLine::create([
		        'name' => 'Titel MUTA', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[47]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[191]->accounts()->attach($account->id);
		    $budgetLine[192] = BudgetLine::create([
		        'name' => 'Teambuilding', 
		        'income' => 0, 
		        'expenses' => 405000, 
		        'cost_centre_id' => $costCentres[47]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[192]->accounts()->attach($account->id);
		    $budgetLine[193] = BudgetLine::create([
		        'name' => 'Titeltillbehör', 
		        'income' => 0, 
		        'expenses' => 45000, 
		        'cost_centre_id' => $costCentres[47]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5486')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5486']);
		      $budgetLine[193]->accounts()->attach($account->id);
		  $costCentres[48] = CostCentre::create(['name' => 'Mörka sidan', 'committee_id' => $committees[15]->id]);
		    $budgetLine[194] = BudgetLine::create([
		        'name' => 'Drifvartillbehör', 
		        'income' => 0, 
		        'expenses' => 1100000, 
		        'cost_centre_id' => $costCentres[48]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5410')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5410']);
		      $budgetLine[194]->accounts()->attach($account->id);
		      $account = Account::where('number', '5481')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5481']);
		      $budgetLine[194]->accounts()->attach($account->id);
		    $budgetLine[195] = BudgetLine::create([
		        'name' => 'Entr&eacute;prylar', 
		        'income' => 0, 
		        'expenses' => 1400000, 
		        'cost_centre_id' => $costCentres[48]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4036')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4036']);
		      $budgetLine[195]->accounts()->attach($account->id);
		    $budgetLine[196] = BudgetLine::create([
		        'name' => 'Entr&eacute;polos', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[48]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[196]->accounts()->attach($account->id);
		    $budgetLine[197] = BudgetLine::create([
		        'name' => 'Bax-hyra', 
		        'income' => 0, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[48]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[197]->accounts()->attach($account->id);
		    $budgetLine[198] = BudgetLine::create([
		        'name' => 'Drifvarbastu', 
		        'income' => 0, 
		        'expenses' => 70000, 
		        'cost_centre_id' => $costCentres[48]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[198]->accounts()->attach($account->id);
		    $budgetLine[199] = BudgetLine::create([
		        'name' => 'Pärmar & sångböcker', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[48]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4030')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4030']);
		      $budgetLine[199]->accounts()->attach($account->id);
		    $budgetLine[200] = BudgetLine::create([
		        'name' => 'Fika drifvarträningar', 
		        'income' => 0, 
		        'expenses' => 90000, 
		        'cost_centre_id' => $costCentres[48]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[200]->accounts()->attach($account->id);
		    $budgetLine[201] = BudgetLine::create([
		        'name' => 'Drifvarflipper', 
		        'income' => 0, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[48]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5510')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5510']);
		      $budgetLine[201]->accounts()->attach($account->id);
		    $budgetLine[202] = BudgetLine::create([
		        'name' => 'Utklädnad GOD', 
		        'income' => 0, 
		        'expenses' => 10000, 
		        'cost_centre_id' => $costCentres[48]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4036')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4036']);
		      $budgetLine[202]->accounts()->attach($account->id);
		    $budgetLine[203] = BudgetLine::create([
		        'name' => 'Mat första entr&eacute;n', 
		        'income' => 0, 
		        'expenses' => 140000, 
		        'cost_centre_id' => $costCentres[48]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[203]->accounts()->attach($account->id);
		  $costCentres[49] = CostCentre::create(['name' => 'Ljusa sidan', 'committee_id' => $committees[15]->id]);
		    $budgetLine[204] = BudgetLine::create([
		        'name' => 'Daddebyxor och mammeristshorts', 
		        'income' => 0, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[49]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4044')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4044']);
		      $budgetLine[204]->accounts()->attach($account->id);
		    $budgetLine[205] = BudgetLine::create([
		        'name' => 'Daddetillbehör', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[49]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5482')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5482']);
		      $budgetLine[205]->accounts()->attach($account->id);
		    $budgetLine[206] = BudgetLine::create([
		        'name' => 'Doquistillbehör', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[49]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5483')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5483']);
		      $budgetLine[206]->accounts()->attach($account->id);
		    $budgetLine[207] = BudgetLine::create([
		        'name' => 'Mammeristtillbehör', 
		        'income' => 0, 
		        'expenses' => 120000, 
		        'cost_centre_id' => $costCentres[49]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5484')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5484']);
		      $budgetLine[207]->accounts()->attach($account->id);
		    $budgetLine[208] = BudgetLine::create([
		        'name' => 'Ekonomeristtillbehör', 
		        'income' => 0, 
		        'expenses' => 80000, 
		        'cost_centre_id' => $costCentres[49]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5485')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5485']);
		      $budgetLine[208]->accounts()->attach($account->id);
		    $budgetLine[209] = BudgetLine::create([
		        'name' => 'Snuttefiltar', 
		        'income' => 0, 
		        'expenses' => 40000, 
		        'cost_centre_id' => $costCentres[49]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5480')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5480']);
		      $budgetLine[209]->accounts()->attach($account->id);
		    $budgetLine[210] = BudgetLine::create([
		        'name' => 'Snuttefilt and chill', 
		        'income' => 0, 
		        'expenses' => 92000, 
		        'cost_centre_id' => $costCentres[49]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5410')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5410']);
		      $budgetLine[210]->accounts()->attach($account->id);
		    $budgetLine[211] = BudgetLine::create([
		        'name' => 'Förbrukningsmaterial', 
		        'income' => 0, 
		        'expenses' => 10000, 
		        'cost_centre_id' => $costCentres[49]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5460')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5460']);
		      $budgetLine[211]->accounts()->attach($account->id);
		    $budgetLine[212] = BudgetLine::create([
		        'name' => 'Förbrukningsinventarier', 
		        'income' => 0, 
		        'expenses' => 30000, 
		        'cost_centre_id' => $costCentres[49]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5410')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5410']);
		      $budgetLine[212]->accounts()->attach($account->id);
		    $budgetLine[213] = BudgetLine::create([
		        'name' => 'Tjockumenteristlunch', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[49]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[213]->accounts()->attach($account->id);
		    $budgetLine[214] = BudgetLine::create([
		        'name' => 'Ekonomeristfika', 
		        'income' => 0, 
		        'expenses' => 250000, 
		        'cost_centre_id' => $costCentres[49]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[214]->accounts()->attach($account->id);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[214]->accounts()->attach($account->id);
		  $costCentres[50] = CostCentre::create(['name' => 'Personalvård', 'committee_id' => $committees[15]->id]);
		    $budgetLine[215] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 700000, 
		        'cost_centre_id' => $costCentres[50]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[215]->accounts()->attach($account->id);
		      $account = Account::where('number', '4026')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4026']);
		      $budgetLine[215]->accounts()->attach($account->id);
		      $account = Account::where('number', '4045')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4045']);
		      $budgetLine[215]->accounts()->attach($account->id);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[215]->accounts()->attach($account->id);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[215]->accounts()->attach($account->id);
		  $costCentres[51] = CostCentre::create(['name' => 'MOT-Bil', 'committee_id' => $committees[15]->id]);
		    $budgetLine[216] = BudgetLine::create([
		        'name' => 'Drivmedel', 
		        'income' => 0, 
		        'expenses' => 430000, 
		        'cost_centre_id' => $costCentres[51]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5611')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5611']);
		      $budgetLine[216]->accounts()->attach($account->id);
		    $budgetLine[217] = BudgetLine::create([
		        'name' => 'Övriga personbilskostnader', 
		        'income' => 0, 
		        'expenses' => 140000, 
		        'cost_centre_id' => $costCentres[51]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5613')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5613']);
		      $budgetLine[217]->accounts()->attach($account->id);
		      $account = Account::where('number', '5617')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5617']);
		      $budgetLine[217]->accounts()->attach($account->id);
		      $account = Account::where('number', '5618')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5618']);
		      $budgetLine[217]->accounts()->attach($account->id);
		      $account = Account::where('number', '5820')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5820']);
		      $budgetLine[217]->accounts()->attach($account->id);
		  $costCentres[52] = CostCentre::create(['name' => 'MOT-Tröjor ', 'committee_id' => $committees[15]->id]);
		    $budgetLine[218] = BudgetLine::create([
		        'name' => 'Kläder', 
		        'income' => 1500000, 
		        'expenses' => 5000000, 
		        'cost_centre_id' => $costCentres[52]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3044')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3044']);
		      $budgetLine[218]->accounts()->attach($account->id);
		      $account = Account::where('number', '4044')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4044']);
		      $budgetLine[218]->accounts()->attach($account->id);
		    $budgetLine[219] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 2500000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[52]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3051')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3051']);
		      $budgetLine[219]->accounts()->attach($account->id);
		  $costCentres[53] = CostCentre::create(['name' => 'Jourveckan', 'committee_id' => $committees[15]->id]);
		    $budgetLine[220] = BudgetLine::create([
		        'name' => 'Lunch', 
		        'income' => 0, 
		        'expenses' => 700000, 
		        'cost_centre_id' => $costCentres[53]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[220]->accounts()->attach($account->id);
		    $budgetLine[221] = BudgetLine::create([
		        'name' => 'Frukost', 
		        'income' => 0, 
		        'expenses' => 1100000, 
		        'cost_centre_id' => $costCentres[53]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[221]->accounts()->attach($account->id);
		    $budgetLine[222] = BudgetLine::create([
		        'name' => 'Byggmaterial', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[53]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5462')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5462']);
		      $budgetLine[222]->accounts()->attach($account->id);
		    $budgetLine[223] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 700000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[53]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[223]->accounts()->attach($account->id);
		  $costCentres[54] = CostCentre::create(['name' => 'Jourveckoevent', 'committee_id' => $committees[15]->id]);
		    $budgetLine[224] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[54]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[224]->accounts()->attach($account->id);
		    $budgetLine[225] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 700000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[54]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[225]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[225]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[225]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[225]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[225]->accounts()->attach($account->id);
		    $budgetLine[226] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 450000, 
		        'cost_centre_id' => $costCentres[54]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[226]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[226]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[226]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[226]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[226]->accounts()->attach($account->id);
		  $costCentres[55] = CostCentre::create(['name' => 'TTG-lab', 'committee_id' => $committees[15]->id]);
		    $budgetLine[227] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 1005000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[55]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[227]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[227]->accounts()->attach($account->id);
		    $budgetLine[228] = BudgetLine::create([
		        'name' => 'Mat sittning', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[55]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[228]->accounts()->attach($account->id);
		    $budgetLine[229] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 800000, 
		        'cost_centre_id' => $costCentres[55]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[229]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[229]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[229]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[229]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[229]->accounts()->attach($account->id);
		    $budgetLine[230] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 300000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[55]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[230]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[230]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[230]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[230]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[230]->accounts()->attach($account->id);
		    $budgetLine[231] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[55]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[231]->accounts()->attach($account->id);
		    $budgetLine[232] = BudgetLine::create([
		        'name' => 'Avgift', 
		        'income' => 0, 
		        'expenses' => 2100000, 
		        'cost_centre_id' => $costCentres[55]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[232]->accounts()->attach($account->id);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[232]->accounts()->attach($account->id);
		    $budgetLine[233] = BudgetLine::create([
		        'name' => 'Serveringstillstånd', 
		        'income' => 0, 
		        'expenses' => 110000, 
		        'cost_centre_id' => $costCentres[55]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6950')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6950']);
		      $budgetLine[233]->accounts()->attach($account->id);
		  $costCentres[56] = CostCentre::create(['name' => 'TTG-efterkör', 'committee_id' => $committees[15]->id]);
		    $budgetLine[234] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[56]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[234]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[234]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[234]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[234]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[234]->accounts()->attach($account->id);
		    $budgetLine[235] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 800000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[56]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[235]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[235]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[235]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[235]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[235]->accounts()->attach($account->id);
		  $costCentres[57] = CostCentre::create(['name' => 'Sektionsgasque', 'committee_id' => $committees[15]->id]);
		    $budgetLine[236] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 1035000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[57]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[236]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[236]->accounts()->attach($account->id);
		    $budgetLine[237] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[57]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[237]->accounts()->attach($account->id);
		    $budgetLine[238] = BudgetLine::create([
		        'name' => 'Dryck sittning ', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[57]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[238]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[238]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[238]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[238]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[238]->accounts()->attach($account->id);
		    $budgetLine[239] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[57]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[239]->accounts()->attach($account->id);
		  $costCentres[58] = CostCentre::create(['name' => 'Sektionsgasque efterkör', 'committee_id' => $committees[15]->id]);
		    $budgetLine[240] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[58]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[240]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[240]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[240]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[240]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[240]->accounts()->attach($account->id);
		    $budgetLine[241] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 800000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[58]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[241]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[241]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[241]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[241]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[241]->accounts()->attach($account->id);
		  $costCentres[59] = CostCentre::create(['name' => 'Kultmiddag', 'committee_id' => $committees[15]->id]);
		    $budgetLine[242] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 1400000, 
		        'cost_centre_id' => $costCentres[59]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[242]->accounts()->attach($account->id);
		    $budgetLine[243] = BudgetLine::create([
		        'name' => 'Resekostnader', 
		        'income' => 0, 
		        'expenses' => 75000, 
		        'cost_centre_id' => $costCentres[59]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5800')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5800']);
		      $budgetLine[243]->accounts()->attach($account->id);
		  $costCentres[60] = CostCentre::create(['name' => 'Tjejfika', 'committee_id' => $committees[15]->id]);
		    $budgetLine[244] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[60]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4045')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4045']);
		      $budgetLine[244]->accounts()->attach($account->id);
		  $costCentres[61] = CostCentre::create(['name' => 'Inaug', 'committee_id' => $committees[15]->id]);
		    $budgetLine[245] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[61]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[245]->accounts()->attach($account->id);
		  $costCentres[62] = CostCentre::create(['name' => 'INDA', 'committee_id' => $committees[15]->id]);
		    $budgetLine[246] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 176000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[62]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[246]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[246]->accounts()->attach($account->id);
		    $budgetLine[247] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 250000, 
		        'cost_centre_id' => $costCentres[62]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[247]->accounts()->attach($account->id);
		    $budgetLine[248] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 60000, 
		        'cost_centre_id' => $costCentres[62]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[248]->accounts()->attach($account->id);
		    $budgetLine[249] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[62]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[249]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[249]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[249]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[249]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[249]->accounts()->attach($account->id);
		    $budgetLine[250] = BudgetLine::create([
		        'name' => 'Barkit', 
		        'income' => 0, 
		        'expenses' => 30000, 
		        'cost_centre_id' => $costCentres[62]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4031')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4031']);
		      $budgetLine[250]->accounts()->attach($account->id);
		  $costCentres[63] = CostCentre::create(['name' => 'INDA efterkör', 'committee_id' => $committees[15]->id]);
		    $budgetLine[251] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[63]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[251]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[251]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[251]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[251]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[251]->accounts()->attach($account->id);
		    $budgetLine[252] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 450000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[63]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[252]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[252]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[252]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[252]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[252]->accounts()->attach($account->id);
		  $costCentres[64] = CostCentre::create(['name' => 'INDO', 'committee_id' => $committees[15]->id]);
		    $budgetLine[253] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[64]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[253]->accounts()->attach($account->id);
		  $costCentres[65] = CostCentre::create(['name' => 'INMA', 'committee_id' => $committees[15]->id]);
		    $budgetLine[254] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[65]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[254]->accounts()->attach($account->id);
		  $costCentres[66] = CostCentre::create(['name' => 'INEK', 'committee_id' => $committees[15]->id]);
		    $budgetLine[255] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[66]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[255]->accounts()->attach($account->id);
		  $costCentres[67] = CostCentre::create(['name' => 'Kräftis', 'committee_id' => $committees[15]->id]);
		    $budgetLine[256] = BudgetLine::create([
		        'name' => 'Frukost', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[67]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[256]->accounts()->attach($account->id);
		    $budgetLine[257] = BudgetLine::create([
		        'name' => 'Hyra bord & stolar', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[67]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5220')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5220']);
		      $budgetLine[257]->accounts()->attach($account->id);
		    $budgetLine[258] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 120000, 
		        'cost_centre_id' => $costCentres[67]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[258]->accounts()->attach($account->id);
		    $budgetLine[259] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 120000, 
		        'cost_centre_id' => $costCentres[67]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[259]->accounts()->attach($account->id);
		    $budgetLine[260] = BudgetLine::create([
		        'name' => 'Tackgåva', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[67]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[260]->accounts()->attach($account->id);
		    $budgetLine[261] = BudgetLine::create([
		        'name' => 'Partytält', 
		        'income' => 0, 
		        'expenses' => 80000, 
		        'cost_centre_id' => $costCentres[67]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5410')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5410']);
		      $budgetLine[261]->accounts()->attach($account->id);
		  $costCentres[68] = CostCentre::create(['name' => 'TTG-föreläsning', 'committee_id' => $committees[15]->id]);
		    $budgetLine[262] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 60000, 
		        'cost_centre_id' => $costCentres[68]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[262]->accounts()->attach($account->id);
		    $budgetLine[263] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 27000, 
		        'cost_centre_id' => $costCentres[68]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[263]->accounts()->attach($account->id);
		    $budgetLine[264] = BudgetLine::create([
		        'name' => 'Förbrukningsmaterial', 
		        'income' => 0, 
		        'expenses' => 25000, 
		        'cost_centre_id' => $costCentres[68]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5460')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5460']);
		      $budgetLine[264]->accounts()->attach($account->id);
		  $costCentres[69] = CostCentre::create(['name' => 'Sångarafton', 'committee_id' => $committees[15]->id]);
		    $budgetLine[265] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 150000, 
		        'expenses' => 110000, 
		        'cost_centre_id' => $costCentres[69]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[265]->accounts()->attach($account->id);
		  $costCentres[70] = CostCentre::create(['name' => 'Storasyskonmiddag', 'committee_id' => $committees[15]->id]);
		    $budgetLine[266] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 120000, 
		        'cost_centre_id' => $costCentres[70]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[266]->accounts()->attach($account->id);
		    $budgetLine[267] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[70]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[267]->accounts()->attach($account->id);
		    $budgetLine[268] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 30000, 
		        'cost_centre_id' => $costCentres[70]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[268]->accounts()->attach($account->id);
		    $budgetLine[269] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 40000, 
		        'cost_centre_id' => $costCentres[70]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[269]->accounts()->attach($account->id);
		  $costCentres[71] = CostCentre::create(['name' => 'Favvodaddemiddag', 'committee_id' => $committees[15]->id]);
		    $budgetLine[270] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 720000, 
		        'cost_centre_id' => $costCentres[71]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[270]->accounts()->attach($account->id);
		    $budgetLine[271] = BudgetLine::create([
		        'name' => 'Resekostnader', 
		        'income' => 0, 
		        'expenses' => 130000, 
		        'cost_centre_id' => $costCentres[71]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5800')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5800']);
		      $budgetLine[271]->accounts()->attach($account->id);
		  $costCentres[72] = CostCentre::create(['name' => 'FOO', 'committee_id' => $committees[15]->id]);
		    $budgetLine[272] = BudgetLine::create([
		        'name' => 'Småsyskonfika', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[72]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4045')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4045']);
		      $budgetLine[272]->accounts()->attach($account->id);
		    $budgetLine[273] = BudgetLine::create([
		        'name' => 'Lunch', 
		        'income' => 0, 
		        'expenses' => 600000, 
		        'cost_centre_id' => $costCentres[72]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[273]->accounts()->attach($account->id);
		    $budgetLine[274] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[72]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[274]->accounts()->attach($account->id);
		  $costCentres[73] = CostCentre::create(['name' => 'Champagnefrukost', 'committee_id' => $committees[15]->id]);
		    $budgetLine[275] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 80000, 
		        'cost_centre_id' => $costCentres[73]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[275]->accounts()->attach($account->id);
		    $budgetLine[276] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 30000, 
		        'cost_centre_id' => $costCentres[73]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[276]->accounts()->attach($account->id);
		    $budgetLine[277] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 40000, 
		        'cost_centre_id' => $costCentres[73]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[277]->accounts()->attach($account->id);
		  $costCentres[74] = CostCentre::create(['name' => 'Champagnecroquet', 'committee_id' => $committees[15]->id]);
		    $budgetLine[278] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 80000, 
		        'cost_centre_id' => $costCentres[74]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[278]->accounts()->attach($account->id);
		    $budgetLine[279] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 30000, 
		        'cost_centre_id' => $costCentres[74]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[279]->accounts()->attach($account->id);
		    $budgetLine[280] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 40000, 
		        'cost_centre_id' => $costCentres[74]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[280]->accounts()->attach($account->id);
		  $costCentres[75] = CostCentre::create(['name' => 'Nattorientering', 'committee_id' => $committees[15]->id]);
		    $budgetLine[281] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 80000, 
		        'cost_centre_id' => $costCentres[75]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4045')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4045']);
		      $budgetLine[281]->accounts()->attach($account->id);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[281]->accounts()->attach($account->id);
		    $budgetLine[282] = BudgetLine::create([
		        'name' => 'Varma mackor', 
		        'income' => 80000, 
		        'expenses' => 70000, 
		        'cost_centre_id' => $costCentres[75]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3029']);
		      $budgetLine[282]->accounts()->attach($account->id);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[282]->accounts()->attach($account->id);
		    $budgetLine[283] = BudgetLine::create([
		        'name' => 'Korv', 
		        'income' => 0, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[75]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[283]->accounts()->attach($account->id);
		    $budgetLine[284] = BudgetLine::create([
		        'name' => 'Sponsrad station', 
		        'income' => 700000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[75]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[284]->accounts()->attach($account->id);
		      $account = Account::where('number', '3029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3029']);
		      $budgetLine[284]->accounts()->attach($account->id);
		    $budgetLine[285] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 250000, 
		        'cost_centre_id' => $costCentres[75]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[285]->accounts()->attach($account->id);
		    $budgetLine[286] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[75]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[286]->accounts()->attach($account->id);
		    $budgetLine[287] = BudgetLine::create([
		        'name' => 'Förbrukningsmaterial', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[75]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5460')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5460']);
		      $budgetLine[287]->accounts()->attach($account->id);
		    $budgetLine[288] = BudgetLine::create([
		        'name' => 'Middag ', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[75]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[288]->accounts()->attach($account->id);
		    $budgetLine[289] = BudgetLine::create([
		        'name' => 'Spons middag', 
		        'income' => 700000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[75]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[289]->accounts()->attach($account->id);
		      $account = Account::where('number', '3029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3029']);
		      $budgetLine[289]->accounts()->attach($account->id);
		  $costCentres[76] = CostCentre::create(['name' => 'Laserkrig', 'committee_id' => $committees[15]->id]);
		    $budgetLine[290] = BudgetLine::create([
		        'name' => 'Biljetter ', 
		        'income' => 700000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[76]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[290]->accounts()->attach($account->id);
		    $budgetLine[291] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 1600000, 
		        'cost_centre_id' => $costCentres[76]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[291]->accounts()->attach($account->id);
		    $budgetLine[292] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 350000, 
		        'cost_centre_id' => $costCentres[76]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[292]->accounts()->attach($account->id);
		    $budgetLine[293] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 20000, 
		        'cost_centre_id' => $costCentres[76]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[293]->accounts()->attach($account->id);
		    $budgetLine[294] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 55000, 
		        'cost_centre_id' => $costCentres[76]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[294]->accounts()->attach($account->id);
		  $costCentres[77] = CostCentre::create(['name' => 'Pusharpub', 'committee_id' => $committees[15]->id]);
		    $budgetLine[295] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 210000, 
		        'expenses' => 210000, 
		        'cost_centre_id' => $costCentres[77]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[295]->accounts()->attach($account->id);
		    $budgetLine[296] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 20000, 
		        'cost_centre_id' => $costCentres[77]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[296]->accounts()->attach($account->id);
		    $budgetLine[297] = BudgetLine::create([
		        'name' => 'Barkit', 
		        'income' => 0, 
		        'expenses' => 30000, 
		        'cost_centre_id' => $costCentres[77]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4031')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4031']);
		      $budgetLine[297]->accounts()->attach($account->id);
		    $budgetLine[298] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[77]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[298]->accounts()->attach($account->id);
		    $budgetLine[299] = BudgetLine::create([
		        'name' => 'Inköp dryck ', 
		        'income' => 0, 
		        'expenses' => 1300000, 
		        'cost_centre_id' => $costCentres[77]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[299]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[299]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[299]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[299]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[299]->accounts()->attach($account->id);
		    $budgetLine[300] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 2000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[77]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[300]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[300]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[300]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[300]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[300]->accounts()->attach($account->id);
		    $budgetLine[301] = BudgetLine::create([
		        'name' => 'Skrivarkvot', 
		        'income' => 0, 
		        'expenses' => 20000, 
		        'cost_centre_id' => $costCentres[77]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[301]->accounts()->attach($account->id);
		  $costCentres[78] = CostCentre::create(['name' => 'nØllegasque - utan efterkör', 'committee_id' => $committees[15]->id]);
		    $budgetLine[302] = BudgetLine::create([
		        'name' => 'Biljetter sittning', 
		        'income' => 5940000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[302]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[302]->accounts()->attach($account->id);
		    $budgetLine[303] = BudgetLine::create([
		        'name' => 'Biljetter efterkör', 
		        'income' => 400000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[303]->accounts()->attach($account->id);
		    $budgetLine[304] = BudgetLine::create([
		        'name' => 'Mackor', 
		        'income' => 0, 
		        'expenses' => 750000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[304]->accounts()->attach($account->id);
		    $budgetLine[305] = BudgetLine::create([
		        'name' => 'Hyra maskiner', 
		        'income' => 0, 
		        'expenses' => 2800000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5210')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5210']);
		      $budgetLine[305]->accounts()->attach($account->id);
		    $budgetLine[306] = BudgetLine::create([
		        'name' => 'Live-underhållning', 
		        'income' => 0, 
		        'expenses' => 280000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6800')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6800']);
		      $budgetLine[306]->accounts()->attach($account->id);
		    $budgetLine[307] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 400000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[307]->accounts()->attach($account->id);
		    $budgetLine[308] = BudgetLine::create([
		        'name' => 'Ordningsvakter', 
		        'income' => 0, 
		        'expenses' => 1237000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6800')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6800']);
		      $budgetLine[308]->accounts()->attach($account->id);
		    $budgetLine[309] = BudgetLine::create([
		        'name' => 'MF personal', 
		        'income' => 0, 
		        'expenses' => 560000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6800')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6800']);
		      $budgetLine[309]->accounts()->attach($account->id);
		    $budgetLine[310] = BudgetLine::create([
		        'name' => 'Städavgift', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5060')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5060']);
		      $budgetLine[310]->accounts()->attach($account->id);
		    $budgetLine[311] = BudgetLine::create([
		        'name' => 'Personalmat', 
		        'income' => 0, 
		        'expenses' => 450000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[311]->accounts()->attach($account->id);
		    $budgetLine[312] = BudgetLine::create([
		        'name' => 'Sittningsmat', 
		        'income' => 0, 
		        'expenses' => 6000000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[312]->accounts()->attach($account->id);
		    $budgetLine[313] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 2500000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[313]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[313]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[313]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[313]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[313]->accounts()->attach($account->id);
		    $budgetLine[314] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[314]->accounts()->attach($account->id);
		    $budgetLine[315] = BudgetLine::create([
		        'name' => 'Bastu', 
		        'income' => 0, 
		        'expenses' => 70000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[315]->accounts()->attach($account->id);
		    $budgetLine[316] = BudgetLine::create([
		        'name' => 'Förbrukningsinventarier', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5410')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5410']);
		      $budgetLine[316]->accounts()->attach($account->id);
		    $budgetLine[317] = BudgetLine::create([
		        'name' => 'Utklädnad', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4036')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4036']);
		      $budgetLine[317]->accounts()->attach($account->id);
		    $budgetLine[318] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 2200000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[318]->accounts()->attach($account->id);
		    $budgetLine[319] = BudgetLine::create([
		        'name' => 'Bussar', 
		        'income' => 0, 
		        'expenses' => 1400000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[319]->accounts()->attach($account->id);
		    $budgetLine[320] = BudgetLine::create([
		        'name' => 'Serveringstillstånd', 
		        'income' => 0, 
		        'expenses' => 60000, 
		        'cost_centre_id' => $costCentres[78]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[320]->accounts()->attach($account->id);
		  $costCentres[79] = CostCentre::create(['name' => 'nØllegasque - efterkör i META', 'committee_id' => $committees[15]->id]);
		    $budgetLine[321] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 315000, 
		        'cost_centre_id' => $costCentres[79]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[321]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[321]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[321]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[321]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[321]->accounts()->attach($account->id);
		    $budgetLine[322] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 500000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[79]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[322]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[322]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[322]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[322]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[322]->accounts()->attach($account->id);
		    $budgetLine[323] = BudgetLine::create([
		        'name' => 'Utökat tillstånd', 
		        'income' => 0, 
		        'expenses' => 60000, 
		        'cost_centre_id' => $costCentres[79]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6950')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6950']);
		      $budgetLine[323]->accounts()->attach($account->id);
		    $budgetLine[324] = BudgetLine::create([
		        'name' => 'Korv ', 
		        'income' => 200000, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[79]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3029']);
		      $budgetLine[324]->accounts()->attach($account->id);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[324]->accounts()->attach($account->id);
		  $costCentres[80] = CostCentre::create(['name' => 'nØllebanquette', 'committee_id' => $committees[15]->id]);
		    $budgetLine[325] = BudgetLine::create([
		        'name' => 'Biljetter ', 
		        'income' => 1330000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[80]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[325]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[325]->accounts()->attach($account->id);
		    $budgetLine[326] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 3500000, 
		        'cost_centre_id' => $costCentres[80]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[326]->accounts()->attach($account->id);
		    $budgetLine[327] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 1500000, 
		        'cost_centre_id' => $costCentres[80]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[327]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[327]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[327]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[327]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[327]->accounts()->attach($account->id);
		    $budgetLine[328] = BudgetLine::create([
		        'name' => 'Städavgift', 
		        'income' => 0, 
		        'expenses' => 20000, 
		        'cost_centre_id' => $costCentres[80]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5060')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5060']);
		      $budgetLine[328]->accounts()->attach($account->id);
		    $budgetLine[329] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[80]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[329]->accounts()->attach($account->id);
		    $budgetLine[330] = BudgetLine::create([
		        'name' => 'Live-underhållning', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[80]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6800')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6800']);
		      $budgetLine[330]->accounts()->attach($account->id);
		    $budgetLine[331] = BudgetLine::create([
		        'name' => 'Hyra porslin', 
		        'income' => 0, 
		        'expenses' => 700000, 
		        'cost_centre_id' => $costCentres[80]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5220')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5220']);
		      $budgetLine[331]->accounts()->attach($account->id);
		    $budgetLine[332] = BudgetLine::create([
		        'name' => 'Personal RN', 
		        'income' => 0, 
		        'expenses' => 225000, 
		        'cost_centre_id' => $costCentres[80]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6800')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6800']);
		      $budgetLine[332]->accounts()->attach($account->id);
		      $account = Account::where('number', '5210')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5210']);
		      $budgetLine[332]->accounts()->attach($account->id);
		    $budgetLine[333] = BudgetLine::create([
		        'name' => 'Nymble personal', 
		        'income' => 0, 
		        'expenses' => 225000, 
		        'cost_centre_id' => $costCentres[80]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6800')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6800']);
		      $budgetLine[333]->accounts()->attach($account->id);
		    $budgetLine[334] = BudgetLine::create([
		        'name' => 'Garderob', 
		        'income' => 0, 
		        'expenses' => 70000, 
		        'cost_centre_id' => $costCentres[80]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5220')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5220']);
		      $budgetLine[334]->accounts()->attach($account->id);
		    $budgetLine[335] = BudgetLine::create([
		        'name' => 'Resultatjustering', 
		        'income' => 4426700, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[80]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[335]->accounts()->attach($account->id);
		  $costCentres[81] = CostCentre::create(['name' => 'nØllan games', 'committee_id' => $committees[15]->id]);
		    $budgetLine[336] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 60000, 
		        'cost_centre_id' => $costCentres[81]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[336]->accounts()->attach($account->id);
		    $budgetLine[337] = BudgetLine::create([
		        'name' => 'Förbrukningsmaterial', 
		        'income' => 0, 
		        'expenses' => 20000, 
		        'cost_centre_id' => $costCentres[81]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5460')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5460']);
		      $budgetLine[337]->accounts()->attach($account->id);
		  $costCentres[82] = CostCentre::create(['name' => 'Genrepspub', 'committee_id' => $committees[15]->id]);
		    $budgetLine[338] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 33000, 
		        'cost_centre_id' => $costCentres[82]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[338]->accounts()->attach($account->id);
		    $budgetLine[339] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 333300, 
		        'cost_centre_id' => $costCentres[82]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[339]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[339]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[339]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[339]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[339]->accounts()->attach($account->id);
		    $budgetLine[340] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 500000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[82]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[340]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[340]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[340]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[340]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[340]->accounts()->attach($account->id);
		    $budgetLine[341] = BudgetLine::create([
		        'name' => 'Korv ', 
		        'income' => 150000, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[82]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3029']);
		      $budgetLine[341]->accounts()->attach($account->id);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[341]->accounts()->attach($account->id);
		  $costCentres[83] = CostCentre::create(['name' => 'Hurry Scurry ', 'committee_id' => $committees[15]->id]);
		    $budgetLine[342] = BudgetLine::create([
		        'name' => 'Utklädnader', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[83]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4036')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4036']);
		      $budgetLine[342]->accounts()->attach($account->id);
		    $budgetLine[343] = BudgetLine::create([
		        'name' => 'Förbrukningsmateriel', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[83]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5460')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5460']);
		      $budgetLine[343]->accounts()->attach($account->id);
		  $costCentres[84] = CostCentre::create(['name' => 'Tenta Recovery', 'committee_id' => $committees[15]->id]);
		    $budgetLine[344] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[84]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[344]->accounts()->attach($account->id);
		    $budgetLine[345] = BudgetLine::create([
		        'name' => 'Hyra inventarier & verktyg', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[84]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5220')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5220']);
		      $budgetLine[345]->accounts()->attach($account->id);
		    $budgetLine[346] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 1150000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[84]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[346]->accounts()->attach($account->id);
		      $account = Account::where('number', '3029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3029']);
		      $budgetLine[346]->accounts()->attach($account->id);
		    $budgetLine[347] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[84]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[347]->accounts()->attach($account->id);
		  $costCentres[85] = CostCentre::create(['name' => 'LQ', 'committee_id' => $committees[15]->id]);
		    $budgetLine[348] = BudgetLine::create([
		        'name' => 'Byggmaterial ', 
		        'income' => 0, 
		        'expenses' => 250000, 
		        'cost_centre_id' => $costCentres[85]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5462')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5462']);
		      $budgetLine[348]->accounts()->attach($account->id);
		    $budgetLine[349] = BudgetLine::create([
		        'name' => 'Förbrukningsmateriel', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[85]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5460')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5460']);
		      $budgetLine[349]->accounts()->attach($account->id);
		    $budgetLine[350] = BudgetLine::create([
		        'name' => 'Verktyg', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[85]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5412')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5412']);
		      $budgetLine[350]->accounts()->attach($account->id);
		    $budgetLine[351] = BudgetLine::create([
		        'name' => 'Sjukvård', 
		        'income' => 0, 
		        'expenses' => 10000, 
		        'cost_centre_id' => $costCentres[85]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7620')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7620']);
		      $budgetLine[351]->accounts()->attach($account->id);
		    $budgetLine[352] = BudgetLine::create([
		        'name' => 'Korv ', 
		        'income' => 300000, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[85]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3029']);
		      $budgetLine[352]->accounts()->attach($account->id);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[352]->accounts()->attach($account->id);
		    $budgetLine[353] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 700000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[85]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[353]->accounts()->attach($account->id);
		    $budgetLine[354] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 5000, 
		        'cost_centre_id' => $costCentres[85]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[354]->accounts()->attach($account->id);
		  $costCentres[86] = CostCentre::create(['name' => 'NBF', 'committee_id' => $committees[15]->id]);
		    $budgetLine[355] = BudgetLine::create([
		        'name' => 'Biljetter ', 
		        'income' => 860000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[86]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[355]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[355]->accounts()->attach($account->id);
		    $budgetLine[356] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[86]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[356]->accounts()->attach($account->id);
		    $budgetLine[357] = BudgetLine::create([
		        'name' => 'Dryck ', 
		        'income' => 0, 
		        'expenses' => 430000, 
		        'cost_centre_id' => $costCentres[86]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[357]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[357]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[357]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[357]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[357]->accounts()->attach($account->id);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[357]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[357]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[357]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[357]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[357]->accounts()->attach($account->id);
		    $budgetLine[358] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[86]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[358]->accounts()->attach($account->id);
		    $budgetLine[359] = BudgetLine::create([
		        'name' => 'Utklädnader', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[86]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4036')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4036']);
		      $budgetLine[359]->accounts()->attach($account->id);
		    $budgetLine[360] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 70000, 
		        'cost_centre_id' => $costCentres[86]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[360]->accounts()->attach($account->id);
		    $budgetLine[361] = BudgetLine::create([
		        'name' => 'Förbrukningsinventarier', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[86]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5410')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5410']);
		      $budgetLine[361]->accounts()->attach($account->id);
		  $costCentres[87] = CostCentre::create(['name' => 'NBE', 'committee_id' => $committees[15]->id]);
		    $budgetLine[362] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 550000, 
		        'cost_centre_id' => $costCentres[87]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[362]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[362]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[362]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[362]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[362]->accounts()->attach($account->id);
		    $budgetLine[363] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 1000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[87]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[363]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[363]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[363]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[363]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[363]->accounts()->attach($account->id);
		  $costCentres[88] = CostCentre::create(['name' => 'DATA - nØllepubrunda', 'committee_id' => $committees[15]->id]);
		    $budgetLine[364] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 2400000, 
		        'cost_centre_id' => $costCentres[88]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[364]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[364]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[364]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[364]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[364]->accounts()->attach($account->id);
		    $budgetLine[365] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 4000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[88]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[365]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[365]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[365]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[365]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[365]->accounts()->attach($account->id);
		    $budgetLine[366] = BudgetLine::create([
		        'name' => 'Serveringstillstånd', 
		        'income' => 0, 
		        'expenses' => 60000, 
		        'cost_centre_id' => $costCentres[88]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6950')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6950']);
		      $budgetLine[366]->accounts()->attach($account->id);
		    $budgetLine[367] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[88]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[367]->accounts()->attach($account->id);
		    $budgetLine[368] = BudgetLine::create([
		        'name' => 'Märken', 
		        'income' => 2000000, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[88]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3027')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3027']);
		      $budgetLine[368]->accounts()->attach($account->id);
		      $account = Account::where('number', '4027')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4027']);
		      $budgetLine[368]->accounts()->attach($account->id);
		    $budgetLine[369] = BudgetLine::create([
		        'name' => 'Resultatjustering', 
		        'income' => 0, 
		        'expenses' => 1470000, 
		        'cost_centre_id' => $costCentres[88]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[369]->accounts()->attach($account->id);
		  $costCentres[89] = CostCentre::create(['name' => 'nØlleOsqvik', 'committee_id' => $committees[15]->id]);
		    $budgetLine[370] = BudgetLine::create([
		        'name' => 'Biljetter ', 
		        'income' => 540000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[89]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[370]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[370]->accounts()->attach($account->id);
		    $budgetLine[371] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 600000, 
		        'cost_centre_id' => $costCentres[89]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[371]->accounts()->attach($account->id);
		    $budgetLine[372] = BudgetLine::create([
		        'name' => 'Mackor', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[89]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[372]->accounts()->attach($account->id);
		    $budgetLine[373] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 150000, 
		        'expenses' => 600000, 
		        'cost_centre_id' => $costCentres[89]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[373]->accounts()->attach($account->id);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[373]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[373]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[373]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[373]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[373]->accounts()->attach($account->id);
		    $budgetLine[374] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[89]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[374]->accounts()->attach($account->id);
		    $budgetLine[375] = BudgetLine::create([
		        'name' => 'Förbrukningsmateriel', 
		        'income' => 0, 
		        'expenses' => 75000, 
		        'cost_centre_id' => $costCentres[89]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5460')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5460']);
		      $budgetLine[375]->accounts()->attach($account->id);
		    $budgetLine[376] = BudgetLine::create([
		        'name' => 'Ved', 
		        'income' => 0, 
		        'expenses' => 20000, 
		        'cost_centre_id' => $costCentres[89]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5350')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5350']);
		      $budgetLine[376]->accounts()->attach($account->id);
		    $budgetLine[377] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 175000, 
		        'cost_centre_id' => $costCentres[89]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[377]->accounts()->attach($account->id);
		    $budgetLine[378] = BudgetLine::create([
		        'name' => 'Milersättning', 
		        'income' => 0, 
		        'expenses' => 60000, 
		        'cost_centre_id' => $costCentres[89]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5890')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5890']);
		      $budgetLine[378]->accounts()->attach($account->id);
		    $budgetLine[379] = BudgetLine::create([
		        'name' => 'Hyra teknik', 
		        'income' => 0, 
		        'expenses' => 160000, 
		        'cost_centre_id' => $costCentres[89]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5210')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5210']);
		      $budgetLine[379]->accounts()->attach($account->id);
		    $budgetLine[380] = BudgetLine::create([
		        'name' => 'Dekor', 
		        'income' => 0, 
		        'expenses' => 60000, 
		        'cost_centre_id' => $costCentres[89]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[380]->accounts()->attach($account->id);
		    $budgetLine[381] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 1700000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[89]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[381]->accounts()->attach($account->id);
		  $costCentres[90] = CostCentre::create(['name' => 'Mitch och Butch', 'committee_id' => $committees[15]->id]);
		  $costCentres[91] = CostCentre::create(['name' => 'Ny', 'committee_id' => $committees[15]->id]);
		    $budgetLine[382] = BudgetLine::create([
		        'name' => 'Kokosolja', 
		        'income' => 0, 
		        'expenses' => 40000, 
		        'cost_centre_id' => $costCentres[91]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[382]->accounts()->attach($account->id);
		  $costCentres[92] = CostCentre::create(['name' => 'MOT - Internfest', 'committee_id' => $committees[15]->id]);
		    $budgetLine[383] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 400000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[92]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[383]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[383]->accounts()->attach($account->id);
		    $budgetLine[384] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[92]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[384]->accounts()->attach($account->id);
		    $budgetLine[385] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 650000, 
		        'cost_centre_id' => $costCentres[92]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[385]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[385]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[385]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[385]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[385]->accounts()->attach($account->id);
		    $budgetLine[386] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[92]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[386]->accounts()->attach($account->id);
		    $budgetLine[387] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[92]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[387]->accounts()->attach($account->id);
		    $budgetLine[388] = BudgetLine::create([
		        'name' => 'Utkädnader', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[92]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4036')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4036']);
		      $budgetLine[388]->accounts()->attach($account->id);
		    $budgetLine[389] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[92]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[389]->accounts()->attach($account->id);
		  $costCentres[93] = CostCentre::create(['name' => 'MOT-Internfest efterkör', 'committee_id' => $committees[15]->id]);
		    $budgetLine[390] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[93]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[390]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[390]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[390]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[390]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[390]->accounts()->attach($account->id);
		    $budgetLine[391] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 120000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[93]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[391]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[391]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[391]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[391]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[391]->accounts()->attach($account->id);
		  $costCentres[94] = CostCentre::create(['name' => 'Garpen', 'committee_id' => $committees[15]->id]);
		    $budgetLine[392] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 0, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[94]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[392]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[392]->accounts()->attach($account->id);
		    $budgetLine[393] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[94]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[393]->accounts()->attach($account->id);
		    $budgetLine[394] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[94]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[394]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[394]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[394]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[394]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[394]->accounts()->attach($account->id);
		    $budgetLine[395] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 1500000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[94]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[395]->accounts()->attach($account->id);
		  $costCentres[95] = CostCentre::create(['name' => 'plOsqvik', 'committee_id' => $committees[15]->id]);
		    $budgetLine[396] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 496000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[95]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[396]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[396]->accounts()->attach($account->id);
		    $budgetLine[397] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 550000, 
		        'cost_centre_id' => $costCentres[95]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[397]->accounts()->attach($account->id);
		    $budgetLine[398] = BudgetLine::create([
		        'name' => 'Ved', 
		        'income' => 0, 
		        'expenses' => 20000, 
		        'cost_centre_id' => $costCentres[95]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5350')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5350']);
		      $budgetLine[398]->accounts()->attach($account->id);
		    $budgetLine[399] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 350000, 
		        'cost_centre_id' => $costCentres[95]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[399]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[399]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[399]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[399]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[399]->accounts()->attach($account->id);
		    $budgetLine[400] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 60000, 
		        'cost_centre_id' => $costCentres[95]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[400]->accounts()->attach($account->id);
		    $budgetLine[401] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 175000, 
		        'cost_centre_id' => $costCentres[95]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[401]->accounts()->attach($account->id);
		    $budgetLine[402] = BudgetLine::create([
		        'name' => 'Milersättning', 
		        'income' => 0, 
		        'expenses' => 60000, 
		        'cost_centre_id' => $costCentres[95]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5890')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5890']);
		      $budgetLine[402]->accounts()->attach($account->id);
		    $budgetLine[403] = BudgetLine::create([
		        'name' => 'Teknik', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[95]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4037')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4037']);
		      $budgetLine[403]->accounts()->attach($account->id);
		    $budgetLine[404] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[95]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[404]->accounts()->attach($account->id);
		  $costCentres[96] = CostCentre::create(['name' => 'Titelöverlämning', 'committee_id' => $committees[15]->id]);
		    $budgetLine[405] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 120000, 
		        'cost_centre_id' => $costCentres[96]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[405]->accounts()->attach($account->id);
		    $budgetLine[406] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 45000, 
		        'cost_centre_id' => $costCentres[96]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[406]->accounts()->attach($account->id);
		      $account = Account::where('number', '7693')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7693']);
		      $budgetLine[406]->accounts()->attach($account->id);
		  $costCentres[97] = CostCentre::create(['name' => 'Bärbaren', 'committee_id' => $committees[15]->id]);
		    $budgetLine[407] = BudgetLine::create([
		        'name' => 'Läsk ', 
		        'income' => 750000, 
		        'expenses' => 700000, 
		        'cost_centre_id' => $costCentres[97]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[407]->accounts()->attach($account->id);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[407]->accounts()->attach($account->id);
		    $budgetLine[408] = BudgetLine::create([
		        'name' => 'Kiosk', 
		        'income' => 350000, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[97]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3026')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3026']);
		      $budgetLine[408]->accounts()->attach($account->id);
		      $account = Account::where('number', '4026')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4026']);
		      $budgetLine[408]->accounts()->attach($account->id);
		    $budgetLine[409] = BudgetLine::create([
		        'name' => 'Bärbarsrestaurering', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[97]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5510')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5510']);
		      $budgetLine[409]->accounts()->attach($account->id);
		    $budgetLine[410] = BudgetLine::create([
		        'name' => 'Diff', 
		        'income' => 0, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[97]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3790')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3790']);
		      $budgetLine[410]->accounts()->attach($account->id);
		  $costCentres[98] = CostCentre::create(['name' => 'nØllekit', 'committee_id' => $committees[15]->id]);
		    $budgetLine[411] = BudgetLine::create([
		        'name' => 'nØllans guide till mottagningen', 
		        'income' => 0, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[98]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6150')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6150']);
		      $budgetLine[411]->accounts()->attach($account->id);
		    $budgetLine[412] = BudgetLine::create([
		        'name' => 'Schlemhäfte', 
		        'income' => 0, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[98]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6150')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6150']);
		      $budgetLine[412]->accounts()->attach($account->id);
		    $budgetLine[413] = BudgetLine::create([
		        'name' => 'Sånghäften', 
		        'income' => 0, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[98]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6150')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6150']);
		      $budgetLine[413]->accounts()->attach($account->id);
		    $budgetLine[414] = BudgetLine::create([
		        'name' => 'Pennor', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[98]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6110')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6110']);
		      $budgetLine[414]->accounts()->attach($account->id);
		  $costCentres[99] = CostCentre::create(['name' => 'Xning', 'committee_id' => $committees[15]->id]);
		    $budgetLine[415] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 1300000, 
		        'expenses' => 1500000, 
		        'cost_centre_id' => $costCentres[99]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '1610')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '1610']);
		      $budgetLine[415]->accounts()->attach($account->id);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[415]->accounts()->attach($account->id);
		  $costCentres[100] = CostCentre::create(['name' => 'Phösargasque', 'committee_id' => $committees[15]->id]);
		    $budgetLine[416] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 1900000, 
		        'expenses' => 1900000, 
		        'cost_centre_id' => $costCentres[100]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '1610')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '1610']);
		      $budgetLine[416]->accounts()->attach($account->id);
		    $budgetLine[417] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 300000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[100]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[417]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[417]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[417]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[417]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[417]->accounts()->attach($account->id);
		    $budgetLine[418] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[100]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[418]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[418]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[418]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[418]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[418]->accounts()->attach($account->id);
		  $costCentres[101] = CostCentre::create(['name' => 'Hjälpfesten', 'committee_id' => $committees[15]->id]);
		    $budgetLine[419] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 60000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[101]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[419]->accounts()->attach($account->id);
		    $budgetLine[420] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[101]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[420]->accounts()->attach($account->id);
		    $budgetLine[421] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 200000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[101]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[421]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[421]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[421]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[421]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[421]->accounts()->attach($account->id);
		    $budgetLine[422] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[101]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[422]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[422]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[422]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[422]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[422]->accounts()->attach($account->id);
		    $budgetLine[423] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 120000, 
		        'cost_centre_id' => $costCentres[101]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[423]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[423]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[423]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[423]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[423]->accounts()->attach($account->id);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[423]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[423]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[423]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[423]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[423]->accounts()->attach($account->id);
		    $budgetLine[424] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 30000, 
		        'cost_centre_id' => $costCentres[101]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[424]->accounts()->attach($account->id);
		  $costCentres[102] = CostCentre::create(['name' => 'TGT-middag', 'committee_id' => $committees[15]->id]);
		    $budgetLine[425] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 605000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[102]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[425]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[425]->accounts()->attach($account->id);
		    $budgetLine[426] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 320000, 
		        'cost_centre_id' => $costCentres[102]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[426]->accounts()->attach($account->id);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[426]->accounts()->attach($account->id);
		    $budgetLine[427] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[102]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[427]->accounts()->attach($account->id);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[427]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[427]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[427]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[427]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[427]->accounts()->attach($account->id);
		    $budgetLine[428] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[102]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[428]->accounts()->attach($account->id);
		    $budgetLine[429] = BudgetLine::create([
		        'name' => 'Bastu', 
		        'income' => 0, 
		        'expenses' => 70000, 
		        'cost_centre_id' => $costCentres[102]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[429]->accounts()->attach($account->id);
		    $budgetLine[430] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[102]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[430]->accounts()->attach($account->id);
		    $budgetLine[431] = BudgetLine::create([
		        'name' => 'Barkit', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[102]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4031')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4031']);
		      $budgetLine[431]->accounts()->attach($account->id);
		  $costCentres[103] = CostCentre::create(['name' => 'Konferenspub', 'committee_id' => $committees[15]->id]);
		    $budgetLine[432] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 300000, 
		        'expenses' => 350000, 
		        'cost_centre_id' => $costCentres[103]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3029']);
		      $budgetLine[432]->accounts()->attach($account->id);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[432]->accounts()->attach($account->id);
		    $budgetLine[433] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[103]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[433]->accounts()->attach($account->id);
		    $budgetLine[434] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 20000, 
		        'cost_centre_id' => $costCentres[103]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[434]->accounts()->attach($account->id);
		    $budgetLine[435] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 350000, 
		        'cost_centre_id' => $costCentres[103]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[435]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[435]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[435]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[435]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[435]->accounts()->attach($account->id);
		    $budgetLine[436] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 500000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[103]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[436]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[436]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[436]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[436]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[436]->accounts()->attach($account->id);
		    $budgetLine[437] = BudgetLine::create([
		        'name' => 'Resultatjustering', 
		        'income' => 35000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[103]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[437]->accounts()->attach($account->id);
		  $costCentres[104] = CostCentre::create(['name' => 'Opengasque', 'committee_id' => $committees[15]->id]);
		    $budgetLine[438] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 580000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[104]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[438]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[438]->accounts()->attach($account->id);
		    $budgetLine[439] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 600000, 
		        'cost_centre_id' => $costCentres[104]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[439]->accounts()->attach($account->id);
		    $budgetLine[440] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 390000, 
		        'cost_centre_id' => $costCentres[104]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[440]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[440]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[440]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[440]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[440]->accounts()->attach($account->id);
		    $budgetLine[441] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[104]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[441]->accounts()->attach($account->id);
		    $budgetLine[442] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 70000, 
		        'cost_centre_id' => $costCentres[104]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[442]->accounts()->attach($account->id);
		    $budgetLine[443] = BudgetLine::create([
		        'name' => 'Resultatjustering', 
		        'income' => 580000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[104]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[443]->accounts()->attach($account->id);
		  $costCentres[105] = CostCentre::create(['name' => 'Opengasque efterkör', 'committee_id' => $committees[15]->id]);
		    $budgetLine[444] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 700000, 
		        'cost_centre_id' => $costCentres[105]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[444]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[444]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[444]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[444]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[444]->accounts()->attach($account->id);
		    $budgetLine[445] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 1200000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[105]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[445]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[445]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[445]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[445]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[445]->accounts()->attach($account->id);
		    $budgetLine[446] = BudgetLine::create([
		        'name' => 'Resultatjustering', 
		        'income' => 0, 
		        'expenses' => 250000, 
		        'cost_centre_id' => $costCentres[105]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[446]->accounts()->attach($account->id);
		  $costCentres[106] = CostCentre::create(['name' => 'META-fest', 'committee_id' => $committees[15]->id]);
		    $budgetLine[447] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 530000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[106]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[447]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[447]->accounts()->attach($account->id);
		    $budgetLine[448] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 550000, 
		        'cost_centre_id' => $costCentres[106]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[448]->accounts()->attach($account->id);
		    $budgetLine[449] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 390000, 
		        'cost_centre_id' => $costCentres[106]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[449]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[449]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[449]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[449]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[449]->accounts()->attach($account->id);
		    $budgetLine[450] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[106]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[450]->accounts()->attach($account->id);
		    $budgetLine[451] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 70000, 
		        'cost_centre_id' => $costCentres[106]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[451]->accounts()->attach($account->id);
		    $budgetLine[452] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 1500000, 
		        'cost_centre_id' => $costCentres[106]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[452]->accounts()->attach($account->id);
		    $budgetLine[453] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 2000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[106]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[453]->accounts()->attach($account->id);
		    $budgetLine[454] = BudgetLine::create([
		        'name' => 'Barkit', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[106]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[454]->accounts()->attach($account->id);
		    $budgetLine[455] = BudgetLine::create([
		        'name' => 'Resultatjustering', 
		        'income' => 65000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[106]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[455]->accounts()->attach($account->id);
		  $costCentres[107] = CostCentre::create(['name' => 'nØlLan', 'committee_id' => $committees[15]->id]);
		    $budgetLine[456] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 350000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[107]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[456]->accounts()->attach($account->id);
		      $account = Account::where('number', '4620')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4620']);
		      $budgetLine[456]->accounts()->attach($account->id);
		    $budgetLine[457] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 60000, 
		        'cost_centre_id' => $costCentres[107]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3029']);
		      $budgetLine[457]->accounts()->attach($account->id);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[457]->accounts()->attach($account->id);
		  $costCentres[108] = CostCentre::create(['name' => 'MOT-Efterkör & Pub', 'committee_id' => $committees[15]->id]);
		    $budgetLine[458] = BudgetLine::create([
		        'name' => 'Barkit', 
		        'income' => 0, 
		        'expenses' => 570000, 
		        'cost_centre_id' => $costCentres[108]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4031')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4031']);
		      $budgetLine[458]->accounts()->attach($account->id);
		    $budgetLine[459] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[108]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[459]->accounts()->attach($account->id);
		    $budgetLine[460] = BudgetLine::create([
		        'name' => 'Maskinhyra', 
		        'income' => 0, 
		        'expenses' => 70000, 
		        'cost_centre_id' => $costCentres[108]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5210')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5210']);
		      $budgetLine[460]->accounts()->attach($account->id);
		    $budgetLine[461] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[108]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[461]->accounts()->attach($account->id);
		    $budgetLine[462] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 20000, 
		        'cost_centre_id' => $costCentres[108]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[462]->accounts()->attach($account->id);
		    $budgetLine[463] = BudgetLine::create([
		        'name' => 'Förbrukningsmaterial', 
		        'income' => 0, 
		        'expenses' => 70000, 
		        'cost_centre_id' => $costCentres[108]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5460')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5460']);
		      $budgetLine[463]->accounts()->attach($account->id);
		  $costCentres[109] = CostCentre::create(['name' => 'Domedagen', 'committee_id' => $committees[15]->id]);
		    $budgetLine[464] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 250000, 
		        'cost_centre_id' => $costCentres[109]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[464]->accounts()->attach($account->id);
		    $budgetLine[465] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[109]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[465]->accounts()->attach($account->id);
		      $account = Account::where('number', '7693')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7693']);
		      $budgetLine[465]->accounts()->attach($account->id);
		    $budgetLine[466] = BudgetLine::create([
		        'name' => 'Teambuilding', 
		        'income' => 0, 
		        'expenses' => 250000, 
		        'cost_centre_id' => $costCentres[109]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[466]->accounts()->attach($account->id);
		  $costCentres[110] = CostCentre::create(['name' => 'Mottagningstack', 'committee_id' => $committees[15]->id]);
		    $budgetLine[467] = BudgetLine::create([
		        'name' => 'Biljetter sittning', 
		        'income' => 304000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[110]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[467]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[467]->accounts()->attach($account->id);
		    $budgetLine[468] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[110]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[468]->accounts()->attach($account->id);
		    $budgetLine[469] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[110]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[469]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[469]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[469]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[469]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[469]->accounts()->attach($account->id);
		    $budgetLine[470] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[110]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[470]->accounts()->attach($account->id);
		    $budgetLine[471] = BudgetLine::create([
		        'name' => 'Märken', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[110]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4027')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4027']);
		      $budgetLine[471]->accounts()->attach($account->id);
		    $budgetLine[472] = BudgetLine::create([
		        'name' => 'Barkit', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[110]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4031')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4031']);
		      $budgetLine[472]->accounts()->attach($account->id);
		  $costCentres[111] = CostCentre::create(['name' => 'Mottagningstack efterkör', 'committee_id' => $committees[15]->id]);
		    $budgetLine[473] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[111]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[473]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[473]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[473]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[473]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[473]->accounts()->attach($account->id);
		    $budgetLine[474] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 1500000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[111]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[474]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[474]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[474]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[474]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[474]->accounts()->attach($account->id);
		    $budgetLine[475] = BudgetLine::create([
		        'name' => 'Biljetter efterkör', 
		        'income' => 120000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[111]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[475]->accounts()->attach($account->id);
		  $costCentres[112] = CostCentre::create(['name' => 'Ettans fest', 'committee_id' => $committees[15]->id]);
		    $budgetLine[476] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 3102000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[112]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[476]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[476]->accounts()->attach($account->id);
		    $budgetLine[477] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 1220000, 
		        'cost_centre_id' => $costCentres[112]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[477]->accounts()->attach($account->id);
		    $budgetLine[478] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 550000, 
		        'cost_centre_id' => $costCentres[112]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[478]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[478]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[478]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[478]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[478]->accounts()->attach($account->id);
		    $budgetLine[479] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 3000000, 
		        'cost_centre_id' => $costCentres[112]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[479]->accounts()->attach($account->id);
		    $budgetLine[480] = BudgetLine::create([
		        'name' => 'Liveframträdanden', 
		        'income' => 0, 
		        'expenses' => 400000, 
		        'cost_centre_id' => $costCentres[112]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6800')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6800']);
		      $budgetLine[480]->accounts()->attach($account->id);
		    $budgetLine[481] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[112]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[481]->accounts()->attach($account->id);
		    $budgetLine[482] = BudgetLine::create([
		        'name' => 'Märken', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[112]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4027')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4027']);
		      $budgetLine[482]->accounts()->attach($account->id);
		    $budgetLine[483] = BudgetLine::create([
		        'name' => 'Tillstånd', 
		        'income' => 0, 
		        'expenses' => 110000, 
		        'cost_centre_id' => $costCentres[112]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6950')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6950']);
		      $budgetLine[483]->accounts()->attach($account->id);
		  $costCentres[113] = CostCentre::create(['name' => 'Ettans fest efterkör', 'committee_id' => $committees[15]->id]);
		    $budgetLine[484] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 230000, 
		        'cost_centre_id' => $costCentres[113]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[484]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[484]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[484]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[484]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[484]->accounts()->attach($account->id);
		    $budgetLine[485] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 400000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[113]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[485]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[485]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[485]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[485]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[485]->accounts()->attach($account->id);
		  $costCentres[114] = CostCentre::create(['name' => 'KDE', 'committee_id' => $committees[15]->id]);
		    $budgetLine[486] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 1800000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[114]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[486]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[486]->accounts()->attach($account->id);
		    $budgetLine[487] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 810000, 
		        'cost_centre_id' => $costCentres[114]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[487]->accounts()->attach($account->id);
		    $budgetLine[488] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 550000, 
		        'cost_centre_id' => $costCentres[114]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[488]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[488]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[488]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[488]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[488]->accounts()->attach($account->id);
		    $budgetLine[489] = BudgetLine::create([
		        'name' => 'Aktivitet', 
		        'income' => 0, 
		        'expenses' => 160000, 
		        'cost_centre_id' => $costCentres[114]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[489]->accounts()->attach($account->id);
		    $budgetLine[490] = BudgetLine::create([
		        'name' => 'Bastu', 
		        'income' => 0, 
		        'expenses' => 70000, 
		        'cost_centre_id' => $costCentres[114]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[490]->accounts()->attach($account->id);
		    $budgetLine[491] = BudgetLine::create([
		        'name' => 'Inbjudningar', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[114]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6110')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6110']);
		      $budgetLine[491]->accounts()->attach($account->id);
		      $account = Account::where('number', '6150')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6150']);
		      $budgetLine[491]->accounts()->attach($account->id);
		      $account = Account::where('number', '6250')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6250']);
		      $budgetLine[491]->accounts()->attach($account->id);
		    $budgetLine[492] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[114]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[492]->accounts()->attach($account->id);
		    $budgetLine[493] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 60000, 
		        'cost_centre_id' => $costCentres[114]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[493]->accounts()->attach($account->id);
		  $costCentres[115] = CostCentre::create(['name' => 'MOT-Övriga inkomster', 'committee_id' => $committees[15]->id]);
		    $budgetLine[494] = BudgetLine::create([
		        'name' => 'Äskade pengar CSC', 
		        'income' => 6540000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[115]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3989')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3989']);
		      $budgetLine[494]->accounts()->attach($account->id);
		    $budgetLine[495] = BudgetLine::create([
		        'name' => 'Datorintroduktionssatsning', 
		        'income' => 4160000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[115]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3040')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3040']);
		      $budgetLine[495]->accounts()->attach($account->id);
		    $budgetLine[496] = BudgetLine::create([
		        'name' => 'Daddestudier', 
		        'income' => 1500000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[115]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3040')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3040']);
		      $budgetLine[496]->accounts()->attach($account->id);
		  $costCentres[116] = CostCentre::create(['name' => 'Lunchrejv', 'committee_id' => $committees[15]->id]);
		    $budgetLine[497] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 600000, 
		        'cost_centre_id' => $costCentres[116]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[497]->accounts()->attach($account->id);
		    $budgetLine[498] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[116]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[498]->accounts()->attach($account->id);
		    $budgetLine[499] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 1150000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[116]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[499]->accounts()->attach($account->id);
		    $budgetLine[500] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 350000, 
		        'cost_centre_id' => $costCentres[116]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[500]->accounts()->attach($account->id);
		    $budgetLine[501] = BudgetLine::create([
		        'name' => 'Hyra maskin & teknik', 
		        'income' => 0, 
		        'expenses' => 160000, 
		        'cost_centre_id' => $costCentres[116]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5210')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5210']);
		      $budgetLine[501]->accounts()->attach($account->id);
		  $costCentres[117] = CostCentre::create(['name' => 'Titelspex', 'committee_id' => $committees[15]->id]);
		    $budgetLine[502] = BudgetLine::create([
		        'name' => 'Utklädnader', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[117]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4036')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4036']);
		      $budgetLine[502]->accounts()->attach($account->id);
		    $budgetLine[503] = BudgetLine::create([
		        'name' => 'Förbrukningsmateriel', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[117]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5460')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5460']);
		      $budgetLine[503]->accounts()->attach($account->id);
		  $costCentres[118] = CostCentre::create(['name' => 'Cliffpub', 'committee_id' => $committees[15]->id]);
		    $budgetLine[504] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 1400000, 
		        'cost_centre_id' => $costCentres[118]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[504]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[504]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[504]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[504]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[504]->accounts()->attach($account->id);
		    $budgetLine[505] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 2000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[118]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[505]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[505]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[505]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[505]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[505]->accounts()->attach($account->id);
		    $budgetLine[506] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 220000, 
		        'expenses' => 220000, 
		        'cost_centre_id' => $costCentres[118]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[506]->accounts()->attach($account->id);
		    $budgetLine[507] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 20000, 
		        'cost_centre_id' => $costCentres[118]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5463')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5463']);
		      $budgetLine[507]->accounts()->attach($account->id);
		    $budgetLine[508] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[118]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[508]->accounts()->attach($account->id);
		  $costCentres[119] = CostCentre::create(['name' => 'MOT-Personalpub', 'committee_id' => $committees[15]->id]);
		    $budgetLine[509] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 600000, 
		        'cost_centre_id' => $costCentres[119]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[509]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[509]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[509]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[509]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[509]->accounts()->attach($account->id);
		    $budgetLine[510] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 1000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[119]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[510]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[510]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[510]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[510]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[510]->accounts()->attach($account->id);
		    $budgetLine[511] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 120000, 
		        'cost_centre_id' => $costCentres[119]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[511]->accounts()->attach($account->id);
		    $budgetLine[512] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 600000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[119]->id, 
		        'type' => 'internal', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[512]->accounts()->attach($account->id);
		  $costCentres[120] = CostCentre::create(['name' => 'Karaokepub', 'committee_id' => $committees[15]->id]);
		    $budgetLine[513] = BudgetLine::create([
		        'name' => 'Städ', 
		        'income' => 0, 
		        'expenses' => 120000, 
		        'cost_centre_id' => $costCentres[120]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5060')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5060']);
		      $budgetLine[513]->accounts()->attach($account->id);
		    $budgetLine[514] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[120]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[514]->accounts()->attach($account->id);
		    $budgetLine[515] = BudgetLine::create([
		        'name' => 'Teknik', 
		        'income' => 0, 
		        'expenses' => 35000, 
		        'cost_centre_id' => $costCentres[120]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5210')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5210']);
		      $budgetLine[515]->accounts()->attach($account->id);
		    $budgetLine[516] = BudgetLine::create([
		        'name' => 'Personal RN', 
		        'income' => 0, 
		        'expenses' => 12000, 
		        'cost_centre_id' => $costCentres[120]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6800')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6800']);
		      $budgetLine[516]->accounts()->attach($account->id);
		  $costCentres[121] = CostCentre::create(['name' => 'Kårspex', 'committee_id' => $committees[15]->id]);
		    $budgetLine[517] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 250000, 
		        'expenses' => 250000, 
		        'cost_centre_id' => $costCentres[121]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[517]->accounts()->attach($account->id);
		  $costCentres[122] = CostCentre::create(['name' => 'Djäfvulsgrottan', 'committee_id' => $committees[15]->id]);
		    $budgetLine[518] = BudgetLine::create([
		        'name' => 'Förbrukningsmateriel', 
		        'income' => 0, 
		        'expenses' => 10000, 
		        'cost_centre_id' => $costCentres[122]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[518]->accounts()->attach($account->id);
		    $budgetLine[519] = BudgetLine::create([
		        'name' => 'Dekor', 
		        'income' => 0, 
		        'expenses' => 40000, 
		        'cost_centre_id' => $costCentres[122]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[519]->accounts()->attach($account->id);
		    $budgetLine[520] = BudgetLine::create([
		        'name' => 'Förbrukningsinventarier', 
		        'income' => 0, 
		        'expenses' => 5000, 
		        'cost_centre_id' => $costCentres[122]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[520]->accounts()->attach($account->id);
		  $costCentres[123] = CostCentre::create(['name' => 'Väskor', 'committee_id' => $committees[15]->id]);
		    $budgetLine[521] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 4000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[123]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3051')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3051']);
		      $budgetLine[521]->accounts()->attach($account->id);
		  $costCentres[124] = CostCentre::create(['name' => 'Lunchföreläsning', 'committee_id' => $committees[15]->id]);
		    $budgetLine[522] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 600000, 
		        'cost_centre_id' => $costCentres[124]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[522]->accounts()->attach($account->id);
		    $budgetLine[523] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 1500000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[124]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[523]->accounts()->attach($account->id);
		  $costCentres[125] = CostCentre::create(['name' => 'Möte med näringslivet', 'committee_id' => $committees[15]->id]);
		    $budgetLine[524] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 2500000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[125]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[524]->accounts()->attach($account->id);
		  $costCentres[126] = CostCentre::create(['name' => 'Jämställdhetsevent', 'committee_id' => $committees[15]->id]);
		    $budgetLine[525] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 1500000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[126]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[525]->accounts()->attach($account->id);
		  $costCentres[127] = CostCentre::create(['name' => 'Giveaway', 'committee_id' => $committees[15]->id]);
		    $budgetLine[526] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 1000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[127]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3051')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3051']);
		      $budgetLine[526]->accounts()->attach($account->id);
		  $costCentres[128] = CostCentre::create(['name' => 'Huvudspons', 'committee_id' => $committees[15]->id]);
		    $budgetLine[527] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 0, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[128]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3051')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3051']);
		      $budgetLine[527]->accounts()->attach($account->id);
		  $costCentres[129] = CostCentre::create(['name' => 'BLB', 'committee_id' => $committees[15]->id]);
		    $budgetLine[528] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 450000, 
		        'cost_centre_id' => $costCentres[129]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[528]->accounts()->attach($account->id);
		    $budgetLine[529] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 250000, 
		        'cost_centre_id' => $costCentres[129]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[529]->accounts()->attach($account->id);
		    $budgetLine[530] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 700000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[129]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[530]->accounts()->attach($account->id);
		  $costCentres[130] = CostCentre::create(['name' => 'Mörkerpub', 'committee_id' => $committees[15]->id]);
		    $budgetLine[531] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 1550000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[130]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[531]->accounts()->attach($account->id);
		    $budgetLine[532] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 1050000, 
		        'cost_centre_id' => $costCentres[130]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[532]->accounts()->attach($account->id);
		    $budgetLine[533] = BudgetLine::create([
		        'name' => 'Barkit', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[130]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[533]->accounts()->attach($account->id);
		
		// 
		$committees[16] = Committee::create(['name' => 'DKM', 'type' => 'committee']);
		  $costCentres[131] = CostCentre::create(['name' => 'Allmänt', 'committee_id' => $committees[16]->id]);
		    $budgetLine[534] = BudgetLine::create([
		        'name' => 'Utbildning', 
		        'income' => 0, 
		        'expenses' => 800000, 
		        'cost_centre_id' => $costCentres[131]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7610')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7610']);
		      $budgetLine[534]->accounts()->attach($account->id);
		    $budgetLine[535] = BudgetLine::create([
		        'name' => 'Övriga resekostnader', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[131]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5890')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5890']);
		      $budgetLine[535]->accounts()->attach($account->id);
		    $budgetLine[536] = BudgetLine::create([
		        'name' => 'Profilkläder', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[131]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4044')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4044']);
		      $budgetLine[536]->accounts()->attach($account->id);
		    $budgetLine[537] = BudgetLine::create([
		        'name' => 'Mat intern grupp', 
		        'income' => 0, 
		        'expenses' => 1500000, 
		        'cost_centre_id' => $costCentres[131]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[537]->accounts()->attach($account->id);
		    $budgetLine[538] = BudgetLine::create([
		        'name' => 'Underhåll', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[131]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5510')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5510']);
		      $budgetLine[538]->accounts()->attach($account->id);
		    $budgetLine[539] = BudgetLine::create([
		        'name' => 'Kök/barutrustning', 
		        'income' => 0, 
		        'expenses' => 1500000, 
		        'cost_centre_id' => $costCentres[131]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5410')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5410']);
		      $budgetLine[539]->accounts()->attach($account->id);
		    $budgetLine[540] = BudgetLine::create([
		        'name' => 'Tackgåvor', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[131]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7630')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7630']);
		      $budgetLine[540]->accounts()->attach($account->id);
		    $budgetLine[541] = BudgetLine::create([
		        'name' => 'Inköp övrigt', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[131]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4030')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4030']);
		      $budgetLine[541]->accounts()->attach($account->id);
		    $budgetLine[542] = BudgetLine::create([
		        'name' => 'Inköp inventarier', 
		        'income' => 0, 
		        'expenses' => 750000, 
		        'cost_centre_id' => $costCentres[131]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '1221')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '1221']);
		      $budgetLine[542]->accounts()->attach($account->id);
		    $budgetLine[543] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[131]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[543]->accounts()->attach($account->id);
		  $costCentres[132] = CostCentre::create(['name' => 'Teambuilding', 'committee_id' => $committees[16]->id]);
		    $budgetLine[544] = BudgetLine::create([
		        'name' => 'Teambuilding', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[132]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[544]->accounts()->attach($account->id);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[544]->accounts()->attach($account->id);
		      $account = Account::where('number', '7693')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7693']);
		      $budgetLine[544]->accounts()->attach($account->id);
		  $costCentres[133] = CostCentre::create(['name' => 'Onsdagspubar', 'committee_id' => $committees[16]->id]);
		    $budgetLine[545] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 1000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[133]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[545]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[545]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[545]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[545]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[545]->accounts()->attach($account->id);
		    $budgetLine[546] = BudgetLine::create([
		        'name' => 'Försäljning mat', 
		        'income' => 200000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[133]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3029']);
		      $budgetLine[546]->accounts()->attach($account->id);
		    $budgetLine[547] = BudgetLine::create([
		        'name' => 'Åtgång dryck', 
		        'income' => 0, 
		        'expenses' => 560000, 
		        'cost_centre_id' => $costCentres[133]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[547]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[547]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[547]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[547]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[547]->accounts()->attach($account->id);
		    $budgetLine[548] = BudgetLine::create([
		        'name' => 'Inköp mat', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[133]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[548]->accounts()->attach($account->id);
		    $budgetLine[549] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[133]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[549]->accounts()->attach($account->id);
		    $budgetLine[550] = BudgetLine::create([
		        'name' => 'Barkit', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[133]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4031')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4031']);
		      $budgetLine[550]->accounts()->attach($account->id);
		    $budgetLine[551] = BudgetLine::create([
		        'name' => 'Förbrukningsmaterial', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[133]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5460')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5460']);
		      $budgetLine[551]->accounts()->attach($account->id);
		  $costCentres[133]->repetitions = 33; $costCentres[133]->save();
		  $costCentres[134] = CostCentre::create(['name' => 'Tentapub VT1', 'committee_id' => $committees[16]->id]);
		    $budgetLine[552] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 2500000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[134]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[552]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[552]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[552]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[552]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[552]->accounts()->attach($account->id);
		    $budgetLine[553] = BudgetLine::create([
		        'name' => 'Åtgång dryck', 
		        'income' => 0, 
		        'expenses' => 1825000, 
		        'cost_centre_id' => $costCentres[134]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[553]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[553]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[553]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[553]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[553]->accounts()->attach($account->id);
		    $budgetLine[554] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[134]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[554]->accounts()->attach($account->id);
		    $budgetLine[555] = BudgetLine::create([
		        'name' => 'Barkit', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[134]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4031')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4031']);
		      $budgetLine[555]->accounts()->attach($account->id);
		  $costCentres[135] = CostCentre::create(['name' => 'Tentapub HT2', 'committee_id' => $committees[16]->id]);
		    $budgetLine[556] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 2500000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[135]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[556]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[556]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[556]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[556]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[556]->accounts()->attach($account->id);
		    $budgetLine[557] = BudgetLine::create([
		        'name' => 'Åtgång dryck', 
		        'income' => 0, 
		        'expenses' => 1825000, 
		        'cost_centre_id' => $costCentres[135]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[557]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[557]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[557]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[557]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[557]->accounts()->attach($account->id);
		    $budgetLine[558] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[135]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[558]->accounts()->attach($account->id);
		    $budgetLine[559] = BudgetLine::create([
		        'name' => 'Barkit', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[135]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4031')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4031']);
		      $budgetLine[559]->accounts()->attach($account->id);
		  $costCentres[136] = CostCentre::create(['name' => 'Plums', 'committee_id' => $committees[16]->id]);
		    $budgetLine[560] = BudgetLine::create([
		        'name' => 'Biljetter och bongar', 
		        'income' => 12500000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[560]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[560]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[560]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[560]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[560]->accounts()->attach($account->id);
		      $account = Account::where('number', '2891')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '2891']);
		      $budgetLine[560]->accounts()->attach($account->id);
		    $budgetLine[561] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 2575000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[561]->accounts()->attach($account->id);
		    $budgetLine[562] = BudgetLine::create([
		        'name' => 'Inköp mat', 
		        'income' => 0, 
		        'expenses' => 350000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[562]->accounts()->attach($account->id);
		    $budgetLine[563] = BudgetLine::create([
		        'name' => 'Åtgång dryck', 
		        'income' => 0, 
		        'expenses' => 2500000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[563]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[563]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[563]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[563]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[563]->accounts()->attach($account->id);
		    $budgetLine[564] = BudgetLine::create([
		        'name' => 'Barkit', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4031')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4031']);
		      $budgetLine[564]->accounts()->attach($account->id);
		    $budgetLine[565] = BudgetLine::create([
		        'name' => 'Is', 
		        'income' => 0, 
		        'expenses' => 180000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4031')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4031']);
		      $budgetLine[565]->accounts()->attach($account->id);
		    $budgetLine[566] = BudgetLine::create([
		        'name' => 'Bröd', 
		        'income' => 0, 
		        'expenses' => 270000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[566]->accounts()->attach($account->id);
		    $budgetLine[567] = BudgetLine::create([
		        'name' => 'Barkit drinkar', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4031')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4031']);
		      $budgetLine[567]->accounts()->attach($account->id);
		    $budgetLine[568] = BudgetLine::create([
		        'name' => 'Väktare', 
		        'income' => 0, 
		        'expenses' => 1100000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6800')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6800']);
		      $budgetLine[568]->accounts()->attach($account->id);
		    $budgetLine[569] = BudgetLine::create([
		        'name' => 'DJ', 
		        'income' => 0, 
		        'expenses' => 400000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6800')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6800']);
		      $budgetLine[569]->accounts()->attach($account->id);
		    $budgetLine[570] = BudgetLine::create([
		        'name' => 'Tryckkostnader', 
		        'income' => 0, 
		        'expenses' => 350000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6150')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6150']);
		      $budgetLine[570]->accounts()->attach($account->id);
		    $budgetLine[571] = BudgetLine::create([
		        'name' => 'Glas', 
		        'income' => 0, 
		        'expenses' => 720000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5460')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5460']);
		      $budgetLine[571]->accounts()->attach($account->id);
		    $budgetLine[572] = BudgetLine::create([
		        'name' => 'Förbrukningsmaterial', 
		        'income' => 0, 
		        'expenses' => 150000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5460')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5460']);
		      $budgetLine[572]->accounts()->attach($account->id);
		    $budgetLine[573] = BudgetLine::create([
		        'name' => 'Märken', 
		        'income' => 0, 
		        'expenses' => 380000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4027')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4027']);
		      $budgetLine[573]->accounts()->attach($account->id);
		    $budgetLine[574] = BudgetLine::create([
		        'name' => 'Tillstånd', 
		        'income' => 0, 
		        'expenses' => 250000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6950')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6950']);
		      $budgetLine[574]->accounts()->attach($account->id);
		    $budgetLine[575] = BudgetLine::create([
		        'name' => 'Bensin', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5611')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5611']);
		      $budgetLine[575]->accounts()->attach($account->id);
		    $budgetLine[576] = BudgetLine::create([
		        'name' => 'Parkeringsbiljetter', 
		        'income' => 0, 
		        'expenses' => 20000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5617')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5617']);
		      $budgetLine[576]->accounts()->attach($account->id);
		    $budgetLine[577] = BudgetLine::create([
		        'name' => 'Hyrbil', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5820')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5820']);
		      $budgetLine[577]->accounts()->attach($account->id);
		    $budgetLine[578] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5220')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5220']);
		      $budgetLine[578]->accounts()->attach($account->id);
		    $budgetLine[579] = BudgetLine::create([
		        'name' => 'Försäljningsplattform', 
		        'income' => 0, 
		        'expenses' => 700000, 
		        'cost_centre_id' => $costCentres[136]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6062')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6062']);
		      $budgetLine[579]->accounts()->attach($account->id);
		  $costCentres[137] = CostCentre::create(['name' => 'Reclaim', 'committee_id' => $committees[16]->id]);
		    $budgetLine[580] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 1000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[137]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[580]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[580]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[580]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[580]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[580]->accounts()->attach($account->id);
		    $budgetLine[581] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 1275000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[137]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[581]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[581]->accounts()->attach($account->id);
		    $budgetLine[582] = BudgetLine::create([
		        'name' => 'Åtgång dryck', 
		        'income' => 0, 
		        'expenses' => 560000, 
		        'cost_centre_id' => $costCentres[137]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[582]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[582]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[582]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[582]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[582]->accounts()->attach($account->id);
		    $budgetLine[583] = BudgetLine::create([
		        'name' => 'Inköp mat', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[137]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[583]->accounts()->attach($account->id);
		    $budgetLine[584] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[137]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[584]->accounts()->attach($account->id);
		    $budgetLine[585] = BudgetLine::create([
		        'name' => 'Barkit', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[137]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4031')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4031']);
		      $budgetLine[585]->accounts()->attach($account->id);
		    $budgetLine[586] = BudgetLine::create([
		        'name' => 'Märken', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[137]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4027')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4027']);
		      $budgetLine[586]->accounts()->attach($account->id);
		  $costCentres[138] = CostCentre::create(['name' => 'Djulmiddag', 'committee_id' => $committees[16]->id]);
		    $budgetLine[587] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 350000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[138]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[587]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[587]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[587]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[587]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[587]->accounts()->attach($account->id);
		    $budgetLine[588] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 1290000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[138]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[588]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[588]->accounts()->attach($account->id);
		    $budgetLine[589] = BudgetLine::create([
		        'name' => 'Åtgång dryck', 
		        'income' => 0, 
		        'expenses' => 225000, 
		        'cost_centre_id' => $costCentres[138]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[589]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[589]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[589]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[589]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[589]->accounts()->attach($account->id);
		    $budgetLine[590] = BudgetLine::create([
		        'name' => 'Inköp mat', 
		        'income' => 0, 
		        'expenses' => 2500000, 
		        'cost_centre_id' => $costCentres[138]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[590]->accounts()->attach($account->id);
		    $budgetLine[591] = BudgetLine::create([
		        'name' => 'Lokalhyra prepp', 
		        'income' => 0, 
		        'expenses' => 120000, 
		        'cost_centre_id' => $costCentres[138]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[591]->accounts()->attach($account->id);
		    $budgetLine[592] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[138]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[592]->accounts()->attach($account->id);
		    $budgetLine[593] = BudgetLine::create([
		        'name' => 'Djulgran', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[138]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4030')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4030']);
		      $budgetLine[593]->accounts()->attach($account->id);
		    $budgetLine[594] = BudgetLine::create([
		        'name' => 'Barkit', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[138]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4031')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4031']);
		      $budgetLine[594]->accounts()->attach($account->id);
		    $budgetLine[595] = BudgetLine::create([
		        'name' => 'Märken', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[138]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4027')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4027']);
		      $budgetLine[595]->accounts()->attach($account->id);
		    $budgetLine[596] = BudgetLine::create([
		        'name' => 'Engångsartiklar', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[138]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5410')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5410']);
		      $budgetLine[596]->accounts()->attach($account->id);
		  $costCentres[139] = CostCentre::create(['name' => 'Mästeristsittning', 'committee_id' => $committees[16]->id]);
		    $budgetLine[597] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 1000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[139]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[597]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[597]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[597]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[597]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[597]->accounts()->attach($account->id);
		    $budgetLine[598] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 700000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[139]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[598]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[598]->accounts()->attach($account->id);
		    $budgetLine[599] = BudgetLine::create([
		        'name' => 'Inköp mat', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[139]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[599]->accounts()->attach($account->id);
		    $budgetLine[600] = BudgetLine::create([
		        'name' => 'Åtgång Dryck', 
		        'income' => 0, 
		        'expenses' => 660000, 
		        'cost_centre_id' => $costCentres[139]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[600]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[600]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[600]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[600]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[600]->accounts()->attach($account->id);
		    $budgetLine[601] = BudgetLine::create([
		        'name' => 'Märken', 
		        'income' => 0, 
		        'expenses' => 350000, 
		        'cost_centre_id' => $costCentres[139]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4027')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4027']);
		      $budgetLine[601]->accounts()->attach($account->id);
		    $budgetLine[602] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 125000, 
		        'cost_centre_id' => $costCentres[139]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[602]->accounts()->attach($account->id);
		    $budgetLine[603] = BudgetLine::create([
		        'name' => 'Barkit', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[139]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4031')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4031']);
		      $budgetLine[603]->accounts()->attach($account->id);
		  $costCentres[140] = CostCentre::create(['name' => 'Klubbmästarmiddag', 'committee_id' => $committees[16]->id]);
		    $budgetLine[604] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 200000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[140]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[604]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[604]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[604]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[604]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[604]->accounts()->attach($account->id);
		    $budgetLine[605] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 300000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[140]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[605]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[605]->accounts()->attach($account->id);
		    $budgetLine[606] = BudgetLine::create([
		        'name' => 'Cigarrer', 
		        'income' => 0, 
		        'expenses' => 40000, 
		        'cost_centre_id' => $costCentres[140]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7630')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7630']);
		      $budgetLine[606]->accounts()->attach($account->id);
		    $budgetLine[607] = BudgetLine::create([
		        'name' => 'Åtgång dryck', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[140]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[607]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[607]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[607]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[607]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[607]->accounts()->attach($account->id);
		    $budgetLine[608] = BudgetLine::create([
		        'name' => 'Inköp mat', 
		        'income' => 0, 
		        'expenses' => 460000, 
		        'cost_centre_id' => $costCentres[140]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[608]->accounts()->attach($account->id);
		  $costCentres[141] = CostCentre::create(['name' => 'Cliffmiddag', 'committee_id' => $committees[16]->id]);
		    $budgetLine[609] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 300000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[141]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[609]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[609]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[609]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[609]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[609]->accounts()->attach($account->id);
		    $budgetLine[610] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 350000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[141]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[610]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[610]->accounts()->attach($account->id);
		    $budgetLine[611] = BudgetLine::create([
		        'name' => 'Åtgång dryck', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[141]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[611]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[611]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[611]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[611]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[611]->accounts()->attach($account->id);
		    $budgetLine[612] = BudgetLine::create([
		        'name' => 'Inköp mat', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[141]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[612]->accounts()->attach($account->id);
		  $costCentres[142] = CostCentre::create(['name' => 'Sommarosqvik', 'committee_id' => $committees[16]->id]);
		    $budgetLine[613] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 0, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[142]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[613]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[613]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[613]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[613]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[613]->accounts()->attach($account->id);
		    $budgetLine[614] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 700000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[142]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[614]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[614]->accounts()->attach($account->id);
		    $budgetLine[615] = BudgetLine::create([
		        'name' => 'Inköp mat', 
		        'income' => 0, 
		        'expenses' => 700000, 
		        'cost_centre_id' => $costCentres[142]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[615]->accounts()->attach($account->id);
		    $budgetLine[616] = BudgetLine::create([
		        'name' => 'Åtgång dryck', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[142]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[616]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[616]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[616]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[616]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[616]->accounts()->attach($account->id);
		    $budgetLine[617] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 175000, 
		        'cost_centre_id' => $costCentres[142]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[617]->accounts()->attach($account->id);
		    $budgetLine[618] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[142]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[618]->accounts()->attach($account->id);
		    $budgetLine[619] = BudgetLine::create([
		        'name' => 'Barkit', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[142]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4031')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4031']);
		      $budgetLine[619]->accounts()->attach($account->id);
		    $budgetLine[620] = BudgetLine::create([
		        'name' => 'Milersättning', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[142]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5890')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5890']);
		      $budgetLine[620]->accounts()->attach($account->id);
		
		// Bröllopet
		$committees[17] = Committee::create(['name' => 'Bröllopet', 'type' => 'project']);
		    $budgetLine[621] = BudgetLine::create([
		        'name' => 'Beskrivning', 
		        'income' => 0, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[142]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[621]->accounts()->attach($account->id);
		  $costCentres[143] = CostCentre::create(['name' => 'Bröllop', 'committee_id' => $committees[17]->id]);
		    $budgetLine[622] = BudgetLine::create([
		        'name' => 'Dryckesförsäljning', 
		        'income' => 700000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[143]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[622]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[622]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[622]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[622]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[622]->accounts()->attach($account->id);
		    $budgetLine[623] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 4500000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[143]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[623]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[623]->accounts()->attach($account->id);
		    $budgetLine[624] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 1200000, 
		        'cost_centre_id' => $costCentres[143]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[624]->accounts()->attach($account->id);
		    $budgetLine[625] = BudgetLine::create([
		        'name' => 'Catering/mat', 
		        'income' => 0, 
		        'expenses' => 2400000, 
		        'cost_centre_id' => $costCentres[143]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[625]->accounts()->attach($account->id);
		    $budgetLine[626] = BudgetLine::create([
		        'name' => 'Åtgång dryck sittning', 
		        'income' => 0, 
		        'expenses' => 700000, 
		        'cost_centre_id' => $costCentres[143]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[626]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[626]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[626]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[626]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[626]->accounts()->attach($account->id);
		    $budgetLine[627] = BudgetLine::create([
		        'name' => 'Porslinshyra', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[143]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[627]->accounts()->attach($account->id);
		    $budgetLine[628] = BudgetLine::create([
		        'name' => 'Åtgång dryck efterkör', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[143]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[628]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[628]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[628]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[628]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[628]->accounts()->attach($account->id);
		    $budgetLine[629] = BudgetLine::create([
		        'name' => 'Dekorationer', 
		        'income' => 0, 
		        'expenses' => 1440000, 
		        'cost_centre_id' => $costCentres[143]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[629]->accounts()->attach($account->id);
		  $costCentres[144] = CostCentre::create(['name' => 'Svensexa/Möhippa', 'committee_id' => $committees[17]->id]);
		    $budgetLine[630] = BudgetLine::create([
		        'name' => 'Dryckesförsäljning', 
		        'income' => 450000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[144]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[630]->accounts()->attach($account->id);
		    $budgetLine[631] = BudgetLine::create([
		        'name' => 'Åtgång dryck', 
		        'income' => 0, 
		        'expenses' => 380000, 
		        'cost_centre_id' => $costCentres[144]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[631]->accounts()->attach($account->id);
		    $budgetLine[632] = BudgetLine::create([
		        'name' => 'Dekor', 
		        'income' => 0, 
		        'expenses' => 130000, 
		        'cost_centre_id' => $costCentres[144]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[632]->accounts()->attach($account->id);
		  $costCentres[145] = CostCentre::create(['name' => 'Bröllopsresan', 'committee_id' => $committees[17]->id]);
		    $budgetLine[633] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 2240000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[145]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[633]->accounts()->attach($account->id);
		    $budgetLine[634] = BudgetLine::create([
		        'name' => 'Flygbiljetter', 
		        'income' => 0, 
		        'expenses' => 2900000, 
		        'cost_centre_id' => $costCentres[145]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[634]->accounts()->attach($account->id);
		    $budgetLine[635] = BudgetLine::create([
		        'name' => 'Boende', 
		        'income' => 0, 
		        'expenses' => 2400000, 
		        'cost_centre_id' => $costCentres[145]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[635]->accounts()->attach($account->id);
		    $budgetLine[636] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 500000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[145]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[636]->accounts()->attach($account->id);
		
		// Sångboksgruppen
		$committees[18] = Committee::create(['name' => 'Sångboksgruppen', 'type' => 'project']);
		  $costCentres[146] = CostCentre::create(['name' => 'Allmänt', 'committee_id' => $committees[18]->id]);
		    $budgetLine[637] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[146]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[637]->accounts()->attach($account->id);
		
		// STUDS 2017
		$committees[19] = Committee::create(['name' => 'STUDS 2017', 'type' => 'project']);
		  $costCentres[147] = CostCentre::create(['name' => 'Företagsevent', 'committee_id' => $committees[19]->id]);
		    $budgetLine[638] = BudgetLine::create([
		        'name' => 'Företagsevent', 
		        'income' => 86000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[147]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[638]->accounts()->attach($account->id);
		    $budgetLine[639] = BudgetLine::create([
		        'name' => 'Presenter etc', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[147]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6072')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6072']);
		      $budgetLine[639]->accounts()->attach($account->id);
		  $costCentres[148] = CostCentre::create(['name' => 'Allmänt', 'committee_id' => $committees[19]->id]);
		    $budgetLine[640] = BudgetLine::create([
		        'name' => 'Teambuilding', 
		        'income' => 0, 
		        'expenses' => 8600000, 
		        'cost_centre_id' => $costCentres[148]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[640]->accounts()->attach($account->id);
		      $account = Account::where('number', '7693')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7693']);
		      $budgetLine[640]->accounts()->attach($account->id);
		    $budgetLine[641] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 3020000, 
		        'cost_centre_id' => $costCentres[148]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[641]->accounts()->attach($account->id);
		    $budgetLine[642] = BudgetLine::create([
		        'name' => 'Licenser', 
		        'income' => 0, 
		        'expenses' => 80000, 
		        'cost_centre_id' => $costCentres[148]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5420')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5420']);
		      $budgetLine[642]->accounts()->attach($account->id);
		    $budgetLine[643] = BudgetLine::create([
		        'name' => 'Tryck', 
		        'income' => 0, 
		        'expenses' => 2000000, 
		        'cost_centre_id' => $costCentres[148]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6150')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6150']);
		      $budgetLine[643]->accounts()->attach($account->id);
		    $budgetLine[644] = BudgetLine::create([
		        'name' => 'Kontokortsavgifter', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[148]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6040')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6040']);
		      $budgetLine[644]->accounts()->attach($account->id);
		    $budgetLine[645] = BudgetLine::create([
		        'name' => 'Webbavgifter', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[148]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6541')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6541']);
		      $budgetLine[645]->accounts()->attach($account->id);
		    $budgetLine[646] = BudgetLine::create([
		        'name' => 'Bidrag KTH', 
		        'income' => 14000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[148]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3989')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3989']);
		      $budgetLine[646]->accounts()->attach($account->id);
		  $costCentres[149] = CostCentre::create(['name' => 'Resa', 'committee_id' => $committees[19]->id]);
		    $budgetLine[647] = BudgetLine::create([
		        'name' => 'Resekostnader', 
		        'income' => 0, 
		        'expenses' => 67500000, 
		        'cost_centre_id' => $costCentres[149]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3701')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3701']);
		      $budgetLine[647]->accounts()->attach($account->id);
		    $budgetLine[648] = BudgetLine::create([
		        'name' => 'Telefoni', 
		        'income' => 0, 
		        'expenses' => 1500000, 
		        'cost_centre_id' => $costCentres[149]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6212')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6212']);
		      $budgetLine[648]->accounts()->attach($account->id);
		    $budgetLine[649] = BudgetLine::create([
		        'name' => 'Event under resan', 
		        'income' => 0, 
		        'expenses' => 16500000, 
		        'cost_centre_id' => $costCentres[149]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[649]->accounts()->attach($account->id);
		
		// dÅre 2017
		$committees[20] = Committee::create(['name' => 'dÅre 2017', 'type' => 'project']);
		  $costCentres[150] = CostCentre::create(['name' => 'Allmänt', 'committee_id' => $committees[20]->id]);
		    $budgetLine[650] = BudgetLine::create([
		        'name' => 'Möten och Teambuilding', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[150]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[650]->accounts()->attach($account->id);
		    $budgetLine[651] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 500000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[150]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3051')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3051']);
		      $budgetLine[651]->accounts()->attach($account->id);
		    $budgetLine[652] = BudgetLine::create([
		        'name' => 'Tackmiddag', 
		        'income' => 0, 
		        'expenses' => 120000, 
		        'cost_centre_id' => $costCentres[150]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7692')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7692']);
		      $budgetLine[652]->accounts()->attach($account->id);
		      $account = Account::where('number', '7693')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7693']);
		      $budgetLine[652]->accounts()->attach($account->id);
		  $costCentres[151] = CostCentre::create(['name' => 'Resan', 'committee_id' => $committees[20]->id]);
		    $budgetLine[653] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 12480000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[151]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[653]->accounts()->attach($account->id);
		    $budgetLine[654] = BudgetLine::create([
		        'name' => 'Boende, Liftkort', 
		        'income' => 0, 
		        'expenses' => 8947000, 
		        'cost_centre_id' => $costCentres[151]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4041']);
		      $budgetLine[654]->accounts()->attach($account->id);
		    $budgetLine[655] = BudgetLine::create([
		        'name' => 'Bussresa', 
		        'income' => 0, 
		        'expenses' => 2500000, 
		        'cost_centre_id' => $costCentres[151]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5800')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5800']);
		      $budgetLine[655]->accounts()->attach($account->id);
		    $budgetLine[656] = BudgetLine::create([
		        'name' => 'Tygmärken', 
		        'income' => 0, 
		        'expenses' => 120000, 
		        'cost_centre_id' => $costCentres[151]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4027')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4027']);
		      $budgetLine[656]->accounts()->attach($account->id);
		    $budgetLine[657] = BudgetLine::create([
		        'name' => 'Mössor', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[151]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4044')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4044']);
		      $budgetLine[657]->accounts()->attach($account->id);
		    $budgetLine[658] = BudgetLine::create([
		        'name' => 'Event i Åre', 
		        'income' => 0, 
		        'expenses' => 360000, 
		        'cost_centre_id' => $costCentres[151]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[658]->accounts()->attach($account->id);
		
		// METAspexet 2017
		$committees[21] = Committee::create(['name' => 'METAspexet 2017', 'type' => 'project']);
		  $costCentres[152] = CostCentre::create(['name' => 'Allmänt', 'committee_id' => $committees[21]->id]);
		    $budgetLine[659] = BudgetLine::create([
		        'name' => 'Företagsspons', 
		        'income' => 3000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[152]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3051')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3051']);
		      $budgetLine[659]->accounts()->attach($account->id);
		      $account = Account::where('number', '3052')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3052']);
		      $budgetLine[659]->accounts()->attach($account->id);
		      $account = Account::where('number', '3053')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3053']);
		      $budgetLine[659]->accounts()->attach($account->id);
		    $budgetLine[660] = BudgetLine::create([
		        'name' => 'IT-kostnader', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[152]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6541')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6541']);
		      $budgetLine[660]->accounts()->attach($account->id);
		    $budgetLine[661] = BudgetLine::create([
		        'name' => 'Teambuilding', 
		        'income' => 0, 
		        'expenses' => 792000, 
		        'cost_centre_id' => $costCentres[152]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[661]->accounts()->attach($account->id);
		    $budgetLine[662] = BudgetLine::create([
		        'name' => 'Fika', 
		        'income' => 0, 
		        'expenses' => 636000, 
		        'cost_centre_id' => $costCentres[152]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7691')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7691']);
		      $budgetLine[662]->accounts()->attach($account->id);
		    $budgetLine[663] = BudgetLine::create([
		        'name' => 'Inköp förbrukningsinv.', 
		        'income' => 0, 
		        'expenses' => 85000, 
		        'cost_centre_id' => $costCentres[152]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5410')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5410']);
		      $budgetLine[663]->accounts()->attach($account->id);
		    $budgetLine[664] = BudgetLine::create([
		        'name' => 'Tryckkostnader', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[152]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5930')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5930']);
		      $budgetLine[664]->accounts()->attach($account->id);
		    $budgetLine[665] = BudgetLine::create([
		        'name' => 'Tröjor', 
		        'income' => 1300000, 
		        'expenses' => 1300000, 
		        'cost_centre_id' => $costCentres[152]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3044')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3044']);
		      $budgetLine[665]->accounts()->attach($account->id);
		      $account = Account::where('number', '4044')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4044']);
		      $budgetLine[665]->accounts()->attach($account->id);
		  $costCentres[153] = CostCentre::create(['name' => 'Föreställning', 'committee_id' => $committees[21]->id]);
		    $budgetLine[666] = BudgetLine::create([
		        'name' => 'Lokalkostnader', 
		        'income' => 0, 
		        'expenses' => 2000000, 
		        'cost_centre_id' => $costCentres[153]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[666]->accounts()->attach($account->id);
		    $budgetLine[667] = BudgetLine::create([
		        'name' => 'Inhyrd personal teater', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[153]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '6800')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '6800']);
		      $budgetLine[667]->accounts()->attach($account->id);
		    $budgetLine[668] = BudgetLine::create([
		        'name' => 'Teknik', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[153]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4037')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4037']);
		      $budgetLine[668]->accounts()->attach($account->id);
		    $budgetLine[669] = BudgetLine::create([
		        'name' => 'Transport', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[153]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5611')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5611']);
		      $budgetLine[669]->accounts()->attach($account->id);
		    $budgetLine[670] = BudgetLine::create([
		        'name' => 'Biljettförsäljning', 
		        'income' => 3280000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[153]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[670]->accounts()->attach($account->id);
		    $budgetLine[671] = BudgetLine::create([
		        'name' => 'Märken', 
		        'income' => 250000, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[153]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3027')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3027']);
		      $budgetLine[671]->accounts()->attach($account->id);
		      $account = Account::where('number', '4027')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4027']);
		      $budgetLine[671]->accounts()->attach($account->id);
		    $budgetLine[672] = BudgetLine::create([
		        'name' => 'Virke, färg & material', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[153]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5462')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5462']);
		      $budgetLine[672]->accounts()->attach($account->id);
		    $budgetLine[673] = BudgetLine::create([
		        'name' => 'Rekvisita, smink & hår', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[153]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4036')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4036']);
		      $budgetLine[673]->accounts()->attach($account->id);
		    $budgetLine[674] = BudgetLine::create([
		        'name' => 'Kläder & accessoarer', 
		        'income' => 0, 
		        'expenses' => 500000, 
		        'cost_centre_id' => $costCentres[153]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4044')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4044']);
		      $budgetLine[674]->accounts()->attach($account->id);
		  $costCentres[154] = CostCentre::create(['name' => 'Fester', 'committee_id' => $committees[21]->id]);
		    $budgetLine[675] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 2300000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[154]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[675]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[675]->accounts()->attach($account->id);
		    $budgetLine[676] = BudgetLine::create([
		        'name' => 'Fsljn dryck', 
		        'income' => 1000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[154]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[676]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[676]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[676]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[676]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[676]->accounts()->attach($account->id);
		    $budgetLine[677] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 2100000, 
		        'cost_centre_id' => $costCentres[154]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[677]->accounts()->attach($account->id);
		    $budgetLine[678] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[154]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[678]->accounts()->attach($account->id);
		    $budgetLine[679] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[154]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[679]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[679]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[679]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[679]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[679]->accounts()->attach($account->id);
		  $costCentres[155] = CostCentre::create(['name' => 'N&empty;llespex', 'committee_id' => $committees[21]->id]);
		    $budgetLine[680] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 1130000, 
		        'cost_centre_id' => $costCentres[155]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[680]->accounts()->attach($account->id);
		    $budgetLine[681] = BudgetLine::create([
		        'name' => 'Teknik', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[155]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4037')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4037']);
		      $budgetLine[681]->accounts()->attach($account->id);
		    $budgetLine[682] = BudgetLine::create([
		        'name' => 'Dekor & smink', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[155]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4036')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4036']);
		      $budgetLine[682]->accounts()->attach($account->id);
		    $budgetLine[683] = BudgetLine::create([
		        'name' => 'PR', 
		        'income' => 0, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[155]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[683]->accounts()->attach($account->id);
		    $budgetLine[684] = BudgetLine::create([
		        'name' => 'Transport', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[155]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5611')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5611']);
		      $budgetLine[684]->accounts()->attach($account->id);
		    $budgetLine[685] = BudgetLine::create([
		        'name' => 'Märkesförsäljning', 
		        'income' => 0, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[155]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[685]->accounts()->attach($account->id);
		    $budgetLine[686] = BudgetLine::create([
		        'name' => 'Biljettförsäljning', 
		        'income' => 0, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[155]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[686]->accounts()->attach($account->id);
		
		// Vårbalen 2017
		$committees[22] = Committee::create(['name' => 'Vårbalen 2017', 'type' => 'project']);
		  $costCentres[156] = CostCentre::create(['name' => 'Allmänt', 'committee_id' => $committees[22]->id]);
		    $budgetLine[687] = BudgetLine::create([
		        'name' => 'Tryck', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[156]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[687]->accounts()->attach($account->id);
		    $budgetLine[688] = BudgetLine::create([
		        'name' => 'Dekoration', 
		        'income' => 0, 
		        'expenses' => 300000, 
		        'cost_centre_id' => $costCentres[156]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[688]->accounts()->attach($account->id);
		    $budgetLine[689] = BudgetLine::create([
		        'name' => 'Tillstånd', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[156]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[689]->accounts()->attach($account->id);
		  $costCentres[157] = CostCentre::create(['name' => 'Sittning', 'committee_id' => $committees[22]->id]);
		    $budgetLine[690] = BudgetLine::create([
		        'name' => 'Biljetter', 
		        'income' => 5150000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[157]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[690]->accounts()->attach($account->id);
		    $budgetLine[691] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 5000000, 
		        'cost_centre_id' => $costCentres[157]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[691]->accounts()->attach($account->id);
		    $budgetLine[692] = BudgetLine::create([
		        'name' => 'Mat', 
		        'income' => 0, 
		        'expenses' => 2500000, 
		        'cost_centre_id' => $costCentres[157]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[692]->accounts()->attach($account->id);
		    $budgetLine[693] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[157]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[693]->accounts()->attach($account->id);
		  $costCentres[158] = CostCentre::create(['name' => 'Efterkör', 'committee_id' => $committees[22]->id]);
		    $budgetLine[694] = BudgetLine::create([
		        'name' => 'Dryck', 
		        'income' => 2000000, 
		        'expenses' => 1500000, 
		        'cost_centre_id' => $costCentres[158]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[694]->accounts()->attach($account->id);
		    $budgetLine[695] = BudgetLine::create([
		        'name' => 'Tilltugg', 
		        'income' => 0, 
		        'expenses' => 200000, 
		        'cost_centre_id' => $costCentres[158]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[695]->accounts()->attach($account->id);
		    $budgetLine[696] = BudgetLine::create([
		        'name' => 'Liveunderhållning', 
		        'income' => 0, 
		        'expenses' => 800000, 
		        'cost_centre_id' => $costCentres[158]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[696]->accounts()->attach($account->id);
		  $costCentres[159] = CostCentre::create(['name' => 'Teambuilding', 'committee_id' => $committees[22]->id]);
		    $budgetLine[697] = BudgetLine::create([
		        'name' => 'Fika ledningsgruppen', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[159]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[697]->accounts()->attach($account->id);
		    $budgetLine[698] = BudgetLine::create([
		        'name' => 'Fika projektgruppen', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[159]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[698]->accounts()->attach($account->id);
		    $budgetLine[699] = BudgetLine::create([
		        'name' => 'Middag ledningsgruppen', 
		        'income' => 0, 
		        'expenses' => 50000, 
		        'cost_centre_id' => $costCentres[159]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[699]->accounts()->attach($account->id);
		    $budgetLine[700] = BudgetLine::create([
		        'name' => 'Aktivitet projektgruppen', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[159]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[700]->accounts()->attach($account->id);
		  $costCentres[160] = CostCentre::create(['name' => 'Övrigt', 'committee_id' => $committees[22]->id]);
		    $budgetLine[701] = BudgetLine::create([
		        'name' => 'Spons', 
		        'income' => 1000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[160]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[701]->accounts()->attach($account->id);
		    $budgetLine[702] = BudgetLine::create([
		        'name' => 'Drivmedel bil', 
		        'income' => 0, 
		        'expenses' => 100000, 
		        'cost_centre_id' => $costCentres[160]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[702]->accounts()->attach($account->id);
		
		// Jubileum 2018
		$committees[23] = Committee::create(['name' => 'Jubileum 2018', 'type' => 'project']);
		  $costCentres[161] = CostCentre::create(['name' => 'Allmänt', 'committee_id' => $committees[23]->id]);
		    $budgetLine[703] = BudgetLine::create([
		        'name' => 'Jubileumsfond', 
		        'income' => 22400000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[161]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '0')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '0']);
		      $budgetLine[703]->accounts()->attach($account->id);
		    $budgetLine[704] = BudgetLine::create([
		        'name' => 'Teambuilding', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[161]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '7631')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '7631']);
		      $budgetLine[704]->accounts()->attach($account->id);
		    $budgetLine[705] = BudgetLine::create([
		        'name' => 'Hyra av fordon', 
		        'income' => 0, 
		        'expenses' => 1025000, 
		        'cost_centre_id' => $costCentres[161]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5210')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5210']);
		      $budgetLine[705]->accounts()->attach($account->id);
		    $budgetLine[706] = BudgetLine::create([
		        'name' => 'Drivmedel', 
		        'income' => 0, 
		        'expenses' => 2000000, 
		        'cost_centre_id' => $costCentres[161]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5611')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5611']);
		      $budgetLine[706]->accounts()->attach($account->id);
		  $costCentres[162] = CostCentre::create(['name' => 'Bankett', 'committee_id' => $committees[23]->id]);
		    $budgetLine[707] = BudgetLine::create([
		        'name' => 'Biljettförsäljning', 
		        'income' => 14000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[162]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[707]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[707]->accounts()->attach($account->id);
		    $budgetLine[708] = BudgetLine::create([
		        'name' => 'Inköp mat', 
		        'income' => 0, 
		        'expenses' => 14000000, 
		        'cost_centre_id' => $costCentres[162]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[708]->accounts()->attach($account->id);
		    $budgetLine[709] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 7000000, 
		        'cost_centre_id' => $costCentres[162]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[709]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[709]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[709]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[709]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[709]->accounts()->attach($account->id);
		    $budgetLine[710] = BudgetLine::create([
		        'name' => 'Lokalhyra', 
		        'income' => 0, 
		        'expenses' => 3000000, 
		        'cost_centre_id' => $costCentres[162]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5010')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5010']);
		      $budgetLine[710]->accounts()->attach($account->id);
		    $budgetLine[711] = BudgetLine::create([
		        'name' => 'Dekor', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[162]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[711]->accounts()->attach($account->id);
		  $costCentres[163] = CostCentre::create(['name' => 'Efterkör', 'committee_id' => $committees[23]->id]);
		    $budgetLine[712] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 2500000, 
		        'cost_centre_id' => $costCentres[163]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[712]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[712]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[712]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[712]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[712]->accounts()->attach($account->id);
		    $budgetLine[713] = BudgetLine::create([
		        'name' => 'Försäljning dryck', 
		        'income' => 3125000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[163]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3021']);
		      $budgetLine[713]->accounts()->attach($account->id);
		      $account = Account::where('number', '3022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3022']);
		      $budgetLine[713]->accounts()->attach($account->id);
		      $account = Account::where('number', '3023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3023']);
		      $budgetLine[713]->accounts()->attach($account->id);
		      $account = Account::where('number', '3024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3024']);
		      $budgetLine[713]->accounts()->attach($account->id);
		      $account = Account::where('number', '3025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3025']);
		      $budgetLine[713]->accounts()->attach($account->id);
		  $costCentres[164] = CostCentre::create(['name' => 'Slutfest', 'committee_id' => $committees[23]->id]);
		    $budgetLine[714] = BudgetLine::create([
		        'name' => 'Biljettförsäljning', 
		        'income' => 35000000, 
		        'expenses' => 0, 
		        'cost_centre_id' => $costCentres[164]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '3041')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3041']);
		      $budgetLine[714]->accounts()->attach($account->id);
		      $account = Account::where('number', '3042')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '3042']);
		      $budgetLine[714]->accounts()->attach($account->id);
		    $budgetLine[715] = BudgetLine::create([
		        'name' => 'Inköp mat', 
		        'income' => 0, 
		        'expenses' => 28000000, 
		        'cost_centre_id' => $costCentres[164]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4029')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4029']);
		      $budgetLine[715]->accounts()->attach($account->id);
		    $budgetLine[716] = BudgetLine::create([
		        'name' => 'Inköp dryck', 
		        'income' => 0, 
		        'expenses' => 14000000, 
		        'cost_centre_id' => $costCentres[164]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '4021')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4021']);
		      $budgetLine[716]->accounts()->attach($account->id);
		      $account = Account::where('number', '4022')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4022']);
		      $budgetLine[716]->accounts()->attach($account->id);
		      $account = Account::where('number', '4023')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4023']);
		      $budgetLine[716]->accounts()->attach($account->id);
		      $account = Account::where('number', '4024')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4024']);
		      $budgetLine[716]->accounts()->attach($account->id);
		      $account = Account::where('number', '4025')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '4025']);
		      $budgetLine[716]->accounts()->attach($account->id);
		    $budgetLine[717] = BudgetLine::create([
		        'name' => 'Dekor', 
		        'income' => 0, 
		        'expenses' => 1000000, 
		        'cost_centre_id' => $costCentres[164]->id, 
		        'type' => 'external', 
		        'valid_from' => '2017-01-01 00:00:00', 
		        'valid_to' => '2017-12-31 23:59:59', 
		        'suggestion_id' => 1
		    ]);
		      $account = Account::where('number', '5411')->first();
		      if ($account === null) $account = Account::create(['name' => '', 'description' => '', 'number' => '5411']);
		      $budgetLine[717]->accounts()->attach($account->id);
		  $costCentres[165] = CostCentre::create(['name' => 'Totalt', 'committee_id' => $committees[23]->id]);
		
		$user = User::create(['ugkthid' => '', 'kth_username' => '', 'first_name' => 'Importerat från', 'last_name' => 'Spreadsheet', 'email' => 'jonas@jdahl.se']);
		$suggestion = Suggestion::create(['name' => 'Import från Spreadsheet', 'description' => 'Import från Google Drive', 'valid_from' => '2017-01-01 00:00:00', 'valid_to' => '2017-12-31 23:59:00', 'created_by' => $user->id, 'implemented_at' => \Carbon\Carbon::now(), 'implemented_by' => $user->id]);
		$user->suggestions()->attach($suggestion->id);
    }
}
