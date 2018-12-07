<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "supplier";
    
    protected $fillable = [
        'name',
        'company',
        'address',
        'email',
        'phone',

    ];
    
    protected $hidden = 'remember_token';
}
