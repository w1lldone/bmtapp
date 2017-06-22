<?php

use Illuminate\Database\Seeder;
use App\Nasabah;

class NasabahTableSeeder extends Seeder
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
        	'foto' => '/storage/tokoDefault.jpg',

    	]);
    }
}
