<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //explicit when laravel mixup plurals in table names
    public $table = "category";

    protected $fillable = [
        'name',
        'description',

    ];

    protected function subCatR()
    {
        return $this->hasMany('App\SubCat');
    }

    protected function itemR()
    {
        return $this->hasMany('App\Item');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
