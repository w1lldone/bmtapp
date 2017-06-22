<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('nasabahs')->insert([
        	'id' => 1,
        	'name' => 'Makanan',
        	'foto' => null,
    	],[
        	'id' => 2,
        	'name' => 'Minuman',
        	'foto' => null
    	],[
        	'id' => 3,
        	'name' => 'Fashion',
        	'foto' => null
    	],[
        	'id' => 4,
        	'name' => 'Aksesoris',
        	'foto' => null
    	],[
        	'id' => 5,
        	'name' => 'Elektronik',
        	'foto' => null
    	],);
    }
}
