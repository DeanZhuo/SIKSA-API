<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MODELS\MOTOR;

class MotorController extends Controller
{
    public function index(){
        $motors = MOTOR::all();

        return response()->json($motors,200);
    }

    public function store(Request $request){
        $motor = new MOTOR;
        $motor['MERK_MOTOR'] = $request['MERK_MOTOR'];
        $motor['TIPE_MOTOR'] = $request['TIPE_MOTOR'];
        $success = $motor->save();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function show($id){
        $motor = MOTOR::find($id);

        if(is_null($motor))
            return response()->json("Not Found", 404);
        else
            return response()->json($motor, 200);
    }
}
