<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    /*
    * @var string
    */
    protected $table='estate';
    protected $fillable = ['title', 'description', 'street_id', 'price', 'area', 'elevator', 'internet', 'intercom', 'cameras', 'climate', 'fridge', 'tv', 'garage', 'parking', 'central_heating', 'ta', 'etag_heating', 'floor_heating', 'current_heating'];

    public $timestamps = false;

    public function street()
    {
        return $this->belongsTo('App\Street');
    }
}
