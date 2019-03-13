<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description', 200);
            $table->string('itemImg')->default("/img/icons/no-img.jpeg");
            //Image route for BarCode
            $table->string('IBC');
            //Barcode for filtering
            $table->string('BC');
            //Status showing if is in loan or not
            $table->enum('disp',['loan','available']);
            $table->timestamps();

            //fk category  
            $table->integer('cat_id')->unsigned();
            //fk sub-category  
            $table->integer('subCat_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
