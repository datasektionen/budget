<?php namespace App\Database\Seeds;

use Illuminate\Database\Seeder;

class AddCommittees extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('committees')->delete();
        
        Committee::create(['name' => 'Centralt']);
        Committee::create(['name' => 'DKM']);
        Committee::create(['name' => 'Informationsorganet']);
        Committee::create(['name' => 'Prylmånglaren']);
        Committee::create(['name' => 'Mottagningen']);
    }
}
