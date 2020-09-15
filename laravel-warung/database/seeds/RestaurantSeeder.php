<?php

use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $random_code = [];

        for($i=0;$i<10;$i++) {
            $random_code[$i] = substr(str_shuffle(str_repeat($chars, ceil(4/strlen($chars)))), 0, 4);
        }

        

        DB::table('restaurants')->insert([
            'id' => 1,
            'email' => "maximilian@warung.com",
            'name' => 'MAXIMILIAN RESTAURANT',
            'password' => Hash::make(123456),
            'address' => 'JL. Melati Wetan No. 42 Raintree Boutique Villa & Gallery, Yogyakarta ',
            'description' =>'Restaurant dengan atmosfer yang romantis dengan menyediakan makanan khas Eropa dan Indonesia', 
            'pricerate' => 3,
            'opendate' => '2020-02-12',
            'timeservice' => '12/22',
            'code' => $random_code[0],
        ]);

        DB::table('restaurants')->insert([
            'id' => 2,
            'email' => "watercastle@warung.com",
            'name' => 'WATER CASTLE RESTAURANT',
            'password' => Hash::make(123456),
            'address' => 'JL. Polowijan, Patehan, Yogyakarta ',
            'description' => 'Restaurant yang terletak dekat dengan tempat wisata Taman Sari Yogyakarta yang memiliki konsep klasik dan vegetarian friendly',
            'pricerate' => 4,
            'opendate' => '1973-02-12',
            'timeservice' => '9/22',
            'code' => $random_code[1],
        ]);

        DB::table('restaurants')->insert([
            'id' => 3,
            'email' => "kopiklotok@warung.com",
            'name' => 'WARUNG KOPI KLOTOK',
            'password' => Hash::make(123456),
            'address' => 'JL. Kaliurang Km 16 Pakem Binangun Sleman ',
            'description' => 'Restaurant dengan suasana rumah jogja dan areal sawah.  Menyediakan Beragam menu rumahan yang lezat.',
            'pricerate' => 1,
            'opendate' => '2010-02-12',
            'timeservice' => '8/22',
            'code' => $random_code[2],
        ]);

        DB::table('restaurants')->insert([
            'id' => 4,
            'email' => "bakmimbahgito@warung.com",
            'name' => 'BAKMI JOWO MBAH GITO',
            'password' => Hash::make(123456),
            'address' => 'JL. Nyi Agengnis No9 Rejowinangun Kotagede Yogyakarta 55171 ',
            'description' => 'Restaurant dengan suasana interior unik klasik khas jogja yang sangat nyaman untuk menyantap hidangan bakmi lezat.',
            'pricerate' => 2,
            'opendate' => '1970-02-12',
            'timeservice' => '12/21',
            'code' => $random_code[3],
        ]);

        DB::table('restaurants')->insert([
            'id' => 5,
            'email' => "satepodomoro@warung.com",
            'name' => 'SATE AYAM PODOMORO',
            'password' => Hash::make(123456),
            'address' => 'JL. Mataram No 11 Yogyakarta 55213',
            'description' => 'Warung makan sate ayam legendaris khas Jogja.',
            'pricerate' => 2,
            'opendate' => '1980-02-12',
            'timeservice' => '12/21',
            'code' => $random_code[4],
        ]);

        DB::table('restaurants')->insert([
            'id' => 6,
            'email' => "yudjumgudeg@warung.com",
            'name' => 'GUDEG YU DJUM',
            'password' => Hash::make(123456),
            'address' => 'JL. WijilanNo.167 Panembahan, Kraton, Yogyakarta 55131',
            'description' => 'Warung makan gudeg khas Jogja yang sangat legendaris.',
            'pricerate' => 3,
            'opendate' => '1970-02-12',
            'timeservice' => '9/21',
            'code' => $random_code[5],
        ]);

        DB::table('restaurants')->insert([
            'id' => 7,
            'email' => "garengpetruk@warung.com",
            'name' => 'ANGKRINGAN GERENG PETRUK',
            'password' => Hash::make(123456),
            'address' => 'JL. Margo Utomo No.30 Yogyakarta 52281  ',
            'description' => 'Warung angkringan di malam hari yang sangat tepat untuk menikmati suasana khas Jogja.',
            'pricerate' => 1,
            'opendate' => '1996-02-12',
            'timeservice' => '18/1',
            'code' => $random_code[6],
        ]);

        DB::table('restaurants')->insert([
            'id' => 8,
            'email' => "soppakmin@warung.com",
            'name' => 'SOP AYAM PAK MIN KLATEN',
            'password' => Hash::make(123456),
            'address' => 'JL. Monjali Yogyakarta 52281',
            'description' => 'Warung aneka sop yang lezat dengan harga terjangkau.',
            'pricerate' => 1,
            'opendate' => '2004-02-12',
            'timeservice' => '6/21',
            'code' => $random_code[7],
        ]);

        DB::table('restaurants')->insert([
            'id' => 9,
            'email' => "miebutumini@warung.com",
            'name' => 'MIE AYAM BU TUMINI ',
            'password' => Hash::make(123456),
            'address' => 'JL. Imogori Timur No.187 Giwangan, Umbulharjo, Yogyakarta 55163',
            'description' => 'Warung mie ayam yang memiliki cita rasa yang khas dan sangat terkenal di Yogyaarta.',
            'pricerate' => 2,
            'opendate' => '1978-02-12',
            'timeservice' => '9/20',
            'code' => $random_code[8],
        ]);

        DB::table('restaurants')->insert([
            'id' => 10,
            'email' => "westlake@warung.com",
            'name' => 'WESTLAKE RESTO',
            'password' => Hash::make(123456),
            'address' => 'JL. Ring Road Barat Bedhog, Trihanggo, Sleman Yogyakarta',
            'description' => 'Restaurant sea food yang memiliki view yang indah sehingga cocok dijadikan pilihan yang tepat untuk mengajak keluarga.',
            'pricerate' => 3,
            'opendate' => '2009-02-12',
            'timeservice' => '9/21',
            'code' => $random_code[9],
        ]);
        
    }
}
