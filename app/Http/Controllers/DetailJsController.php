<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MODELS\DETAIL_JASA;

class DetailJsController extends Controller
{
    public function index(){
        $detJss = DETAIL_JASA::all();

        return response()->json($detJss,200);
    }

    public function store(Request $request){
        $detJs = new DETAIL_JASA;
        $detJs['KODE_DETAIL_TRANSAKSI'] = $request['KODE_DETAIL_TRANSAKSI'];
        $detJs['KODE_SERVICE'] = $request['KODE_SERVICE'];
        $success = $detJs->save();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function show($id){
        $detJs = DETAIL_JASA::where('KODE_DETAIL_TRANSAKSI',$id)->get();

        if(is_null($detJs))
            return response()->json("Not Found", 404);
        else
            return response()->json($detJs, 200);
    }

    public function destroy($id){
        $detJs = DETAIL_JASA::where('KODE_DETAIL_TRANSAKSI',$id);

        if(is_null($detJs))
            return response()->json("Not Found", 404);

        $success = $detJs->delete();
        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }
}
