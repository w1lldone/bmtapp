<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('nasabahs')->insert([
        	'id' => 11,
        	'name' => 'patpat',
        	'username' => 'patpat',
        	'password' => bcrypt('patpat'),
        	'no_rekening' => '1.201.011864',
        	'nasabah_id' => '1.1995.00242',
        	'kontak' => '081230622288',
        	'alamat' => 'Lumajang',
        	'cabang' => 'godean',
        	'foto' => '/storage/11/default.png',
    	]);

        DB::table('lapaks')->insert([
        	'id' => 1,
        	'name' => 'Toko patpat',
        	'nasabah_id' => 11,
        	'alamat' => 'Lumajang',
        	'foto' => '/storage/11/tokoDefault.jpg',
    	]);

        DB::table('users')->insert([
        	'id' => 1,
        	'name' => 'wildan',
        	'username' => 'wildan',
        	'password' => bcrypt('wildan'),
    	]);

        DB::table('kategori_produks')->insert([
            'name' => 'makanan',
        ],[
            'name' => 'minuman',
        ]);

    }
}
