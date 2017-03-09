<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Estate;

class EstateFunctions extends Controller
{
    public function estates(){
        isset($_GET['id']) ? $id = $_GET['id'] : $id = null;
        isset($_GET['minPrice']) ? $minPrice = $_GET['minPrice'] : $minPrice = null;
        isset($_GET['maxPrice']) ? $maxPrice = $_GET['maxPrice'] : $maxPrice = null;
        isset($_GET['minSize']) ? $minSize = $_GET['minSize'] : $minSize = null;
        isset($_GET['maxSize']) ? $maxSize = $_GET['maxSize'] : $maxSize = null;
        if($id === null) {
            $data = DB::table('estate AS e')
                ->join('street AS s', 'e.street_id', '=', 's.id')
                ->join('area AS a', 's.area_id', '=', 'a.id')
                ->join('city AS c', 'a.city_id', '=', 'c.id')
                ->select('e.*', 's.name AS street', 'a.name AS area', 'c.name AS city');
            if($minPrice) {
                $data = $data->where('price', '>', $minPrice);
            }
            if($maxPrice) {
                $data = $data->where('price', '<', $maxPrice);
            }
            if($minSize) {
                $data = $data->where('area', '>', $minSize);
            }
            if($maxSize) {
                $data = $data->where('area', '<', $maxSize);
            }
            $data->where(function ($query) {
                isset($_GET['central_heating']) ? $central_heating = 1 : $central_heating = null;
                isset($_GET['ta']) ? $ta = 1 : $ta = null;
                isset($_GET['etag_heating']) ? $etag_heating = 1 : $etag_heating = null;
                isset($_GET['floor_heating']) ? $floor_heating = 1 : $floor_heating = null;
                isset($_GET['current_heating']) ? $current_heating = 1 : $current_heating = null;
                if($central_heating) {
                     $query->where('central_heating', '=', 1);
                }
                if($ta) {
                    $query->orWhere('ta', '=', 1);
                }
                if($etag_heating) {
                    $query->orWhere('etag_heating', '=', 1);
                }
                if($floor_heating) {
                    $query->orWhere('floor_heating', '=', 1);
                }
                if($current_heating) {
                    $query->orWhere('current_heating', '=', 1);
                }
            });
            $data->where(function ($query) {
                isset($_GET['furnished']) ? $furnished = 1 : $furnished = null;
                isset($_GET['unfurnished']) ? $unfurnished = 1 : $unfurnished = null;
                isset($_GET['halffurnished']) ? $halffurnished = 1 : $halffurnished = null;
                if($furnished) {
                    $query->where('furnishment_id', '=', 3);
                }
                if($halffurnished) {
                    $query->orWhere('furnishment_id', '=', 2);
                }
                if($unfurnished) {
                    $query->orWhere('furnishment_id', '=', 1);
                }
            });
            $data->where(function ($query) {
                isset($_GET['elevator']) ? $elevator = 1 : $elevator = null;
                isset($_GET['garage']) ? $garage = 1 : $garage = null;
                isset($_GET['parking']) ? $parking = 1 : $parking = null;
                isset($_GET['fridge']) ? $fridge = 1 : $fridge = null;
                isset($_GET['tv']) ? $tv = 1 : $tv = null;
                isset($_GET['cameras']) ? $cameras = 1 : $cameras = null;
                isset($_GET['internet']) ? $internet = 1 : $internet = null;
                isset($_GET['intercom']) ? $intercom = 1 : $intercom = null;
                isset($_GET['climate']) ? $climate = 1 : $climate = null;
                if($elevator) {
                    $query->where('elevator', '=', 1);
                }
                if($garage) {
                    $query->orWhere('garage', '=', 1);
                }
                if($parking) {
                    $query->orWhere('parking', '=', 1);
                }
                if($fridge) {
                    $query->orWhere('fridge', '=', 1);
                }
                if($tv) {
                    $query->orWhere('tv', '=', 1);
                }
                if($cameras) {
                    $query->orWhere('cameras', '=', 1);
                }
                if($internet) {
                    $query->orWhere('internet', '=', 1);
                }
                if($intercom) {
                    $query->orWhere('intercom', '=', 1);
                }
                if($climate) {
                    $query->orWhere('climate', '=', 1);
                }
            });
            $data = $data->get();
        } else {
            $data = Estate::with('street')->find($id);
        }
        json_decode($data);
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
        $estate->furnishment_id = $estateData->furnishment;
        $estate->save();
        return 'success';
    }
}
