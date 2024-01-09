<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Worker_Controller extends Controller
{
    public function GetChargers()
    {
        try {
            $chargers = DB::table('ladowarki')->get();
            //return view('ladowarki1', ['chargers' => $chargers]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

}
