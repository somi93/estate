<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Estate;

class EstateFunctions extends Controller
{
    public function estates(){
        isset($_GET['id']) ? $id = $_GET['id'] : $id = null;
        if($id === null) {
            $data = Estate::with('street')->get();
        } else {
            $data = Estate::with('street')->find($id);
        }
        return $data;
    }

    public function insert(Request $request){
        $estateData = $request->input('estate');
        $estateData = json_decode($estateData);
        isset($estateData->elevator) && $estateData->elevator == 'true' ? $elevator = 1 : $elevator = 0;
        isset($estateData->internet) && $estateData->internet == 'true' ? $internet = 1 : $internet = 0;
        isset($estateData->intercom) && $estateData->intercom == 'true' ? $intercom = 1 : $intercom = 0;
        isset($estateData->cameras) && $estateData->cameras == 'true' ? $cameras = 1 : $cameras = 0;
        isset($estateData->climate) && $estateData->climate == 'true' ? $climate = 1 : $climate = 0;
        isset($estateData->fridge) && $estateData->fridge == 'true' ? $fridge = 1 : $fridge = 0;
        isset($estateData->tv) && $estateData->tv == 'true' ? $tv = 1 : $tv = 0;
        isset($estateData->garage) && $estateData->garage == 'true' ? $garage = 1 : $garage = 0;
        isset($estateData->parking) && $estateData->parking == 'true' ? $parking = 1 : $parking = 0;
        isset($estateData->central) && $estateData->central == 'true' ? $central_heating = 1 : $central_heating = 0;
        isset($estateData->ta) && $estateData->ta == 'true' ? $ta = 1 : $ta = 0;
        isset($estateData->etage) && $estateData->etage == 'true' ? $etag_heating = 1 : $etag_heating = 0;
        isset($estateData->floor) && $estateData->floor == 'true' ? $floor_heating = 1 : $floor_heating = 0;
        isset($estateData->current) && $estateData->current == 'true' ? $current_heating = 1 : $current_heating = 0;
        $estate = new Estate();
        $estate->title = $estateData->title;
        $estate->description = $estateData->description;
        $estate->price = $estateData->price;
        $estate->area = $estateData->area;
        $estate->latitude = $request->input('lat');
        $estate->longitude = $request->input('lng');
        $estate->street_id = $estateData->street_id;
        $estate->elevator = $elevator;
        $estate->internet = $internet;
        $estate->intercom = $intercom;
        $estate->cameras = $cameras;
        $estate->climate = $climate;
        $estate->fridge = $fridge;
        $estate->tv = $tv;
        $estate->garage = $garage;
        $estate->parking = $parking;
        $estate->central_heating = $central_heating;
        $estate->ta = $ta;
        $estate->etag_heating = $etag_heating;
        $estate->floor_heating = $floor_heating;
        $estate->current_heating = $current_heating;
        $estate->save();
        return 'success';
    }
}
