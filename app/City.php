<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /*
     * @var string
     */
    protected $table='city';
        protected $fillable = ['name'];

    public $timestamps = false;
}
