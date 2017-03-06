<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Furnishment extends Model
{
    /*
     * @var string
     */
    protected $table = 'furnishment';
        protected $fillable = ['type'];

    public $timestamps = false;
}
