<?php

use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incomes')->insert([
            'resto_id' => 1,
            'added_on' => "2020-07=07",
            'income' => 1000000,
            'transactions' => 10
        ]);

        DB::table('incomes')->insert([
            'resto_id' => 1,
            'added_on' => "2020-07=08",
            'income' => 995000,
            'transactions' => 8
        ]);

        DB::table('incomes')->insert([
            'resto_id' => 1,
            'added_on' => "2020-07=09",
            'income' => 1120000,
            'transactions' => 11
        ]);

        DB::table('incomes')->insert([
            'resto_id' => 1,
            'added_on' => "2020-07=10",
            'income' => 850000,
            'transactions' => 8
        ]);

        DB::table('incomes')->insert([
            'resto_id' => 1,
            'added_on' => "2020-07=11",
            'income' => 1430000,
            'transactions' => 12
        ]);

        DB::table('incomes')->insert([
            'resto_id' => 1,
            'added_on' => "2020-07=12",
            'income' => 960000,
            'transactions' => 7
        ]);

        DB::table('incomes')->insert([
            'resto_id' => 1,
            'added_on' => "2020-07=13",
            'income' => 1420000,
            'transactions' => 13
        ]);

        DB::table('incomes')->insert([
            'resto_id' => 1,
            'added_on' => "2020-07=14",
            'income' => 2730000,
            'transactions' => 25
        ]);

    }
}
