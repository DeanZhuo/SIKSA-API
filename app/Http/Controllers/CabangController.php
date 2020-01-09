<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MODELS\CABANG;

class CabangController extends Controller
{
    public function index(){
        $cabangs = CABANG::all();

        return response()->json($cabangs,200);
    }

    public function store(Request $request){
        $cabang = new CABANG;
        $cabang['NAMA_CABANG'] = $request['NAMA_CABANG'];
        $cabang['ALAMAT_CABANG'] = $request['ALAMAT_CABANG'];
        $cabang['NO_TELP_CABANG'] = $request['NO_TELP_CABANG'];
        $success = $cabang->save();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function show($id){
        $cabang = CABANG::find($id);

        if(is_null($cabang))
        return response()->json("Not Found", 404);
        else
            return response()->json($cabang, 200);
    }

    public function update(Request $request, $id){
        $cabang = CABANG::find($id);

        if(is_null($cabang))
            return response()->json("Not Found", 404);
        else{
            if(!is_null($request['NAMA_CABANG']))
                $cabang['NAMA_CABANG'] = $request['NAMA_CABANG'];
            if(!is_null($request['ALAMAT_CABANG']))
                $cabang['ALAMAT_CABANG'] = $request['ALAMAT_CABANG'];
            if(!is_null($request['NO_TELP_CABANG']))
                $cabang['NO_TELP_CABANG'] = $request['NO_TELP_CABANG'];
    
            $success = $cabang->save();
            if(!$success)
                return response()->json("Failed", 500);
            else
                return response()->json("Success", 200);
        }
    }

    public function destroy($id){
        $cabang = CABANG::find($id);

        if(is_null($cabang))
            return response()->json("Not Found", 404);

        $success = $cabang->delete();
        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }
}
