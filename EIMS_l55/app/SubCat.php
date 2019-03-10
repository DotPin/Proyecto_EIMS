<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class SubCat extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //explicit when laravel mixup plurals in table names
    public $table = "subcategory";

    protected $fillable = [
        'name',
        'detail',
        'cat_id',
        'alertLimit',

    ];


    protected function catR()
    {
        return $this->belongsTo('App\Category', 'cat_id'); 
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
