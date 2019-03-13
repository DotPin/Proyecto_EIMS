<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //explicit when laravel mixup plurals in table names
    public $table = "loans";

    protected $fillable = [
        'startL',
        'endL',
        'user_id',
        'item_id',

    ];


    public function userR()
    {
        return $this->hasOne('App\User', 'id', 'user_id'); 

    }

    public function itemR()
    {
        return $this->hasOne('App\Item','id','item_id'); 

    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}