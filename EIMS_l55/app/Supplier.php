<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //explicit when laravel mixup plurals in table names
    public $table = "suppliers";

    protected $fillable = [
        'rut',
        'bn',
        'contactName',
        'address',
        'phone',
        'email',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}