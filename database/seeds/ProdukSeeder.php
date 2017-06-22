<?php

use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	factory(App\Produk::class, 8)->create()->each(function ($u) {
	        $u->review()->save(factory(App\Review::class)->make());
	    });
    }
}
