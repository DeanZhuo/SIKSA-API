<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MODELS\HISTORY_BARANG_MASUK;

class HBMasukController extends Controller
{
    public function index(){
        $hbmasuks = HISTORY_BARANG_MASUK::all();

        return response()->json($hbmasuks,200);
    }

    public function store(Request $request){
        $hbmasuk = new HISTORY_BARANG_MASUK;
        $hbmasuk['KODE_PENGADAAN'] = $request['KODE_PENGADAAN'];
        $hbmasuk['KODE_SPAREPART'] = $request['KODE_SPAREPART'];
        $hbmasuk['TANGGAL_MASUK'] = $request['TANGGAL_MASUK'];
        $hbmasuk['STOK_BARANG_MASUK'] = $request['STOK_BARANG_MASUK'];
        $hbmasuk['HARGA_BARANG_MASUK'] = $request['HARGA_BARANG_MASUK'];
        $success = $hbmasuk->save();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function show($id){
        $hbmasuk = HISTORY_BARANG_MASUK::where('KODE_PENGADAAN',$id)->first();

        if(is_null($hbmasuk))
            return response()->json("Not Found", 404);
        else
            return response()->json($hbmasuk, 200);
    }

    public function destroy($id){
        $hbmasuk = HISTORY_BARANG_MASUK::where('KODE_PENGADAAN',$id);

        if(is_null($hbmasuk))
            return response()->json("Not Found", 404);

            $success = $hbmasuk->delete();
            if(!$success)
                return response()->json("Failed", 500);
            else
                return response()->json("Success", 200);
    }
}
