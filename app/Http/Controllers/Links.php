<?php

namespace App\Http\Controllers;

use App\Navigation;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use DateTime;

class Links extends Controller
{

    public function links() {
        isset($_GET['limit'])? $limit = $_GET['limit'] : $limit = null;
        isset($_GET['offset'])? $offset = $_GET['offset'] : $offset = null;
        isset($_GET['id'])? $id = $_GET['id'] : $id = null;

        if($id == null) {
            if($limit == null) {
                $data = Navigation::all();
            } else {
                $data = DB::table('navigation')->skip($offset)->take($limit)->get();
            }
        } else {
            $data = Navigation::find($id);
        }
        return $data;
    }


    public function destroy($id) {
        $link = Navigation::find($id);
        $link->delete();
        return "Link record successfully deleted " . $id;
    }

    public function update(Request $request, $id) {
        $link = Navigation::find($id);
        $link->name = $request->input('name');
        $link->link = $request->input('link');
        $link->save();
        return "Success";
    }

    public function insert(Request $request) {
        $link = new Navigation;
        $link->name = $request->input('name');
        $link->link = $request->input('link');
        $link->save();
        return "Success";

    }
}
