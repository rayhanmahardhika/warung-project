<?php

use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            'id' => 1,
            'resto_id' => 1,
            'picture' => "maximilian.1.jpg",
            'status' => 1,
        ]);

        DB::table('restaurants')->insert([
            'id' => 2,
            'resto_id' => 2,
            'picture' => "watercastle.1.jpg",
            'status' => 1,
        ]);

        DB::table('restaurants')->insert([
            'id' => 3,
            'resto_id' => 3,
            'picture' => "warungkopikloto.1.jpg",
            'status' => 1,
        ]);

        DB::table('restaurants')->insert([
            'id' => 4,
            'resto_id' => 4,
            'picture' => "mbahgito.1.jpg",
            'status' => 1,
        ]);

        DB::table('restaurants')->insert([
            'id' => 5,
            'resto_id' => 5,
            'picture' => "maximilian.1",
            'status' => 1,
        ]);

        DB::table('restaurants')->insert([
            'id' => 6,
            'resto_id' => 6,
            'picture' => "maximilian.1",
            'status' => 1,
        ]);

        DB::table('restaurants')->insert([
            'id' => 7,
            'resto_id' => 7,
            'picture' => "maximilian.1",
            'status' => 1,
        ]);

        DB::table('restaurants')->insert([
            'id' => 8,
            'resto_id' => 8,
            'picture' => "maximilian.1",
            'status' => 1,
        ]);

        DB::table('restaurants')->insert([
            'id' => 9,
            'resto_id' => 9,
            'picture' => "maximilian.1",
            'status' => 1,
        ]);

        DB::table('restaurants')->insert([
            'id' => 10,
            'resto_id' => 10,
            'picture' => "maximilian.1",
            'status' => 1,
        ]);

        

        
    }
}
