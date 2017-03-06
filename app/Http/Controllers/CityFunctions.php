<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Area;
use DB;

class CityFunctions extends Controller
{
    public function cities(){
        isset($_GET['limit'])? $limit = $_GET['limit'] : $limit = null;
        isset($_GET['offset'])? $offset = $_GET['offset'] : $offset = null;
        isset($_GET['id'])? $id = $_GET['id'] : $id = null;

        if($id == null) {
            if($limit == null){
                $data = City::all();
            } else {
                $data = DB::table('city')->skip($offset)->take($limit)->get();
            }
        } else {
            $data = City::find($id);
        }
        return $data;
    }

    public function insert(Request $request){
        $city = new City;
        $city->name = $request->input('name');
        $city->save();
        return 'Success';
    }

    public function update(Request $request, $id){
        $city = City::find($id);
        $city->name = $request->input('name');
        $city->save();
        return 'Success';
    }

    public function delete($id) {
        $city = City::find($id);
        $city->delete();
        return 'Success';
    }

    public function areas($id) {
        $data = Area::where('city_id', $id)->get();
        return $data;
    }
}
