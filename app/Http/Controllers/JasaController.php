<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MODELS\JASA_SERVICE;

class JasaController extends Controller
{
    public function index(){
        $jasas = JASA_SERVICE::all();

        return response()->json($jasas,200);
    }

    public function store(Request $request){
        $jasa = new JASA_SERVICE;
        $jasa['NAMA_SERVICE'] = $request['NAMA_SERVICE'];
        $jasa['HARGA_SERVICE'] = $request['HARGA_SERVICE'];
        $success = $jasa->save();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function show($id){
        $jasa = JASA_SERVICE::find($id);

        if(is_null($jasa))
            return response()->json("Not Found", 404);
        else
            return response()->json($jasa, 200);
    }
}
