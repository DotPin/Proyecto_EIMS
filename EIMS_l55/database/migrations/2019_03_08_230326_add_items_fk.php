<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemsFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table  ->foreign('subCat_id','items_subCat_id_foreign')
                    ->references('id')
                    ->on('subcategory')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');
            $table  ->foreign('cat_id','items_cat_id_foreign')
                    ->references('id')
                    ->on('category')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign('items_subCat_id_foreign');
            $table->dropForeign('items_cat_id_foreign');
        });
    }
}
