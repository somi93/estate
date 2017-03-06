<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /*
    * @var string
    */
    protected $table='area';
    protected $fillable = ['name', 'city_id'];

    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
