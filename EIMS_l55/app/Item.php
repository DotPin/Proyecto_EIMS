<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //explicit when laravel mixup plurals in table names
    public $table = "items";

    protected $fillable = [
        'name',
        'description',
        'IBC',
        'cat_id',
        'subCat_id',

    ];


    public function categoryR()
    {
        return $this->belongsTo('App\Category','cat_id'); 

    }

    public function subcatR()
    {
        return $this->belongsTo('App\SubCat','subCat_id'); 

    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}