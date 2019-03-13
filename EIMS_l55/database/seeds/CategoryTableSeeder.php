<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cat = new Category();

        $cat->name                 = 'EPP';
        $cat->description          = 'Elementos de protección personal';
            
        $cat->save();


        $cat = new Category();

        $cat->name                 = 'supplies';
        $cat->description          = 'Suministros (obra, oficina, otros)';
            
        $cat->save();


        $cat = new Category();

        $cat->name                 = 'tool';
        $cat->description          = 'Herramientas (electricas, mecánicas, otros)';
            
        $cat->save();

    }
}
