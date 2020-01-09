<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MODELS\STATUS_SERVICE;

class StatusController extends Controller
{
    public function index(){
        $statuss = STATUS_SERVICE::all();

        return response()->json($statuss,200);
    }

    public function show($id){
        $status = STATUS_SERVICE::find($id);

        if(is_null($status))
            return response()->json("Not Found", 404);
        else
            return response()->json($status, 200);
    }
}
