<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Furnishment;

class FurnishmentFunctions extends Controller
{
    public function furnishment(){
        isset($_GET['id']) ? $id = $_GET['id'] : $id = null;
        if($id === null) {
            $data = Furnishment::all();
        } else {
            $data = Furnishment::find($id);
        }
        return $data;
    }
}
