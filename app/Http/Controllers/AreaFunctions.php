<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Area;
use App\Street;

class AreaFunctions extends Controller
{
    public function areas(){
        isset($_GET['id']) ? $id = $_GET['id'] : $id = null;
        if($id === null) {
            $data = Area::with('city')->get();
        } else {
            $data = Area::with('city')->find($id);
        }
        return $data;
    }

    public function insert(Request $request){
        $area = new Area();
        $area->name = $request->input('name');
        $area->city_id = $request->input('city');
        $area->save();
        return 'Success';
    }

    public function update(Request $request, $id){
        $area = Area::find($id);
        $area->name = $request->input('name');
        $area->city_id = $request->input('city');
        $area->save();
        return 'Success';
    }

    public function delete($id) {
        $area = Area::find($id);
        $area->delete();
        return 'Success';
    }

    public function streets($id) {
        $data = Street::where('area_id', $id)->get();
        return $data;
    }
}
