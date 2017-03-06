<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Street;

class StreetFunctions extends Controller
{
    public function streets() {
        isset($_GET['id']) ? $id = $_GET['id'] : $id = null;
        if($id === null) {
            $data = street::with('area')->get();
        } else {
            $data = street::with('area')->find($id);
        }
        return $data;
    }

    public function insert(Request $request) {
        $street = new Street();
        $street->name = $request->input('name');
        $street->area_id = $request->input('area');
        $street->save();
        return 'Success';
    }

    public function update(Request $request, $id) {
        $street = Street::find($id);
        $street->name = $request->input('name');
        $street->area_id = $request->input('area');
        $street->save();
        return 'Success';
    }

    public function delete($id) {
        $area = Street::find($id);
        $area->delete();
        return 'Success';
    }
}
