<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estate_type extends Model
{
    /*
     *  @var string
     */
    protected $table = 'estate_type';
        protected $fillable = ['name'];

    public $timestamps = false;
}
