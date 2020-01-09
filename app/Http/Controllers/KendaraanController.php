<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MODELS\KENDARAAN;

class KendaraanController extends Controller
{
    public function index(){
        $kendaraans = KENDARAAN::all();

        return response()->json($kendaraans,200);
    }

    public function store(Request $request){
        $kendaraan = new KENDARAAN;
        $kendaraan['PLAT_KENDARAAN'] = $request['PLAT_KENDARAAN'];
        $kendaraan['MERK_KENDARAAN'] = $request['MERK_KENDARAAN'];
        $kendaraan['TIPE_KENDARAAN'] = $request['TIPE_KENDARAAN'];
        $success = $kendaraan->save();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function show($id){
        $kendaraan = KENDARAAN::find($id);

        if(is_null($kendaraan))
            return response()->json("Not Found", 404);
        else
            return response()->json($kendaraan, 200);
    }

    public function getByPlat(Request $request){
        $plat = $request['PLAT'];
        $kendaraan = KENDARAAN::where('PLAT_KENDARAAN',$plat)->first();

        if(is_null($kendaraan))
            return response()->json("Not Found", 404);
        else
            return response()->json($kendaraan, 200);
    }
    
}
