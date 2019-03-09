<?php

use Illuminate\Database\Seeder;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use Faker\Factory as Faker;
use App\Item;
use App\SubCat;
use Illuminate\Support\Facades\Storage;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $sc1 = 0;
        $sc2 = 0;
        $sc3 = 0;
        $sc4 = 0;
        $sc5 = 0;
        $sc6 = 0;
        $sc7 = 0;
        $sc8 = 0;
        $sc8 = 0;
        $sc9 = 0;
        $count = 0;

        for($i = 0; $i < 3; $i++)
        {
            for($j = 0; $j < 160; $j++){

        //rndm between subcats
        $rndm = $faker->randomElement([1+(3*$i),2+(3*$i),3+(3*$i)]);

        //because of massive array input, we need to manualy increment our subcat index
        if($rndm == 1){
            $sc1 = $sc1 + 1;
            $count = $sc1;
        }
        elseif($rndm == 2){
            $sc2 = $sc2 + 1;
            $count = $sc2;
        }
        elseif($rndm == 3){
            $sc3 = $sc3+ 1;
            $count = $sc3;
        }
        elseif($rndm == 4){
            $sc4 = $sc4 + 1;
            $count = $sc4;
        }
        elseif($rndm == 5){
            $sc5 = $sc5 + 1;
            $count = $sc5;
        }
        elseif($rndm == 6){
            $sc6 = $sc6 + 1;
            $count = $sc6;
        }
        elseif($rndm == 7){
            $sc7 = $sc7 + 1;
            $count = $sc7;        
        }
        elseif($rndm == 8){
            $sc8 = $sc8 + 1;
            $count = $sc8;    
        }
        elseif($rndm == 9){
            $sc9 = $sc9 + 1;
            $count = $sc9;
        }


        //retrieve subcatname and generate item code for barcode
        $subc = SubCat::where('id',$rndm)->first();
        $s = strtoupper(str_limit($subc->name, 2, $end = ''));
        $c = strtoupper(str_limit($subc->catR->name, 2, $end = ''));

        $cod = $c.$s.$count;

        //barcode
        $barcode = new BarcodeGenerator();
        $barcode->setText($cod);
        $barcode->setType(BarcodeGenerator::Code128);
        $barcode->setScale(2);
        $barcode->setThickness(25);
        $barcode->setFontSize(10);
        $code = $barcode->generate();

        $code = base64_decode($code);

        Storage::put('public/barcode/'.$cod.'.png', $code);


        $samples_temp[] = [  
            'name'         => $faker->text($maxNbChars = 20),
            'description'  => $faker->text($maxNbChars = 100),
            'cat_id'       => $i+1,
            'itemImg'      => '/img/icons/no-img.jpeg',
            'IBC'          => 'barcode/'.$cod.'.png',
            'subCat_id'    => $rndm,
            ];

            }

        }

        Item::insert($samples_temp);

              /*  for($j = 0; $j < 160; $j++)
        {

        $sampless_temp[] = [  
            'name'         => $faker->text($maxNbChars = 20),
            'description'  => $faker->text($maxNbChars = 100),
            'cat_id'       => 2,
            'subCat_id'    => $faker->randomElement([4,5,6]),
            ];

        }

        Item::insert($sampless_temp);

                for($k = 0; $k < 160; $k++)
        {

        $samplesss_temp[] = [  
            'name'         => $faker->text($maxNbChars = 20),
            'description'  => $faker->text($maxNbChars = 100),
            'cat_id'       => 3,
            'subCat_id'    => $faker->randomElement([7,8,9]),
            ];

        }

        Item::insert($samplesss_temp);*/

    }
}
