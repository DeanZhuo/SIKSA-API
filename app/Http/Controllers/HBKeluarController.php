<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MODELS\HISTORY_BARANG_KELUAR;

class HBKeluarController extends Controller
{
    public function index(){
        $hbkeluars = HISTORY_BARANG_KELUAR::all();

        return response()->json($hbkeluars,200);
    }

    public function store(Request $request){
        $hbkeluar = new HISTORY_BARANG_KELUAR;
        $hbkeluar['KODE_DETAIL_TRANSAKSI'] = $request['KODE_DETAIL_TRANSAKSI'];
        $hbkeluar['KODE_SPAREPART'] = $request['KODE_SPAREPART'];
        $hbkeluar['TANGGAL_KELUAR'] = $request['TANGGAL_KELUAR'];
        $hbkeluar['STOK_BARANG_KELUAR'] = $request['STOK_BARANG_KELUAR'];
        $hbkeluar['HARGA_BARANG_KELUAR'] = $request['HARGA_BARANG_KELUAR'];
        $success = $hbkeluar->save();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function show($id){
        $hbkeluar = HISTORY_BARANG_KELUAR::where('KODE_DETAIL_TRANSAKSI',$id)->get();

        if(is_null($hbkeluar))
            return response()->json("Not Found", 404);
        else
            return response()->json($hbkeluar, 200);
    }

    public function destroy($id){
        $hbkeluar = HISTORY_BARANG_KELUAR::where('KODE_DETAIL_TRANSAKSI',$id);

        if(is_null($hbkeluar))
            return response()->json("Not Found", 404);

            $success = $hbkeluar->delete();
            if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }
}
