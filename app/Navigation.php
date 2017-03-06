<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'navigation';
        protected $fillable = ['name', 'link'];

    public $timestamps = false;

}
