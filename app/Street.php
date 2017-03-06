<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    /*
    * @var string
    */
    protected $table='street';
    protected $fillable = ['name', 'area_id'];

    public $timestamps = false;

    public function area()
    {
        return $this->belongsTo('App\Area');
    }
}
