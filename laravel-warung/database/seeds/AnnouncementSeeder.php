<?php

use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('announcements')->insert([
            'id' => 1,
            'belong' => 2,
            'content' => 'Waspada! Rata-rata penghasilan restoran menurun',
        ]);

        DB::table('announcements')->insert([
            'id' => 2,
            'belong' => 3,
            'content' => 'Waspada! Penghasilan restoran menurun',
        ]);
    }
}
