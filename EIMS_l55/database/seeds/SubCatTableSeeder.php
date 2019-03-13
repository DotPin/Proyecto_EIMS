<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\SubCat;

class SubCatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $subcat = new SubCat();

        $subcat->name                 = 'Pies';
        $subcat->detail               = 'Calzado utilizado por trabajadores';
        $subcat->cat_id            = 1;
            
        $subcat->save();

        $subcat = new SubCat();
        
        $subcat->name                 = 'Cabeza';
        $subcat->detail               = 'Elementos de proteccion seccion superior de trabajadores';
        $subcat->cat_id            = 1;
            
        $subcat->save();

        $subcat = new SubCat();
        
        $subcat->name                 = 'Vestimenta';
        $subcat->detail               = 'Vestuario que se entrega a trabajadores';
        $subcat->cat_id            = 1;
            
        $subcat->save();

        $subcat = new SubCat();

        $subcat->name                 = 'Oficina';
        $subcat->detail               = 'Variados elementos de oficina';
        $subcat->cat_id            = 2;
            
        $subcat->save();

        $subcat = new SubCat();

        $subcat->name                 = 'Baño';
        $subcat->detail               = 'Elementos de higiene';
        $subcat->cat_id            = 2;
            
        $subcat->save();

        $subcat = new SubCat();

        $subcat->name                 = 'Obra';
        $subcat->detail               = 'Suministros para obra';
        $subcat->cat_id            = 2;
            
        $subcat->save();

        $subcat = new SubCat();

        $subcat->name                 = 'Electrico';
        $subcat->detail               = 'Herramientas electricas';
        $subcat->cat_id            = 3;
            
        $subcat->save();

        $subcat = new SubCat();

        $subcat->name                 = 'Mecánico';
        $subcat->detail               = 'Herramientas Mecánicas';
        $subcat->cat_id            = 3;
            
        $subcat->save();

        $subcat = new SubCat();

        $subcat->name                 = 'Aire Acondicionado';
        $subcat->detail               = 'Herramientas de aire acondicionado';
        $subcat->cat_id            = 3;
            
        $subcat->save();

    }
}
