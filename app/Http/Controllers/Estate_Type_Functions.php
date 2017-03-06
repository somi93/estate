<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Estate_type;

class Estate_Type_Functions extends Controller
{
    public function estate_type($id=null){
        isset($_GET['limit'])? $limit = $_GET['limit'] : $limit = null;
        isset($_GET['offset'])? $offset = $_GET['offset'] : $offset = null;
        if($id == null) {
            if($limit == null){
               $data = Estate_type::all();
            } else {
                $data = DB::table('estate_type')->skip($offset)->take($limit)->get();
            }
        } else {
            $data = Estate_type::find($id);
        }
        return $data;
    }
}
