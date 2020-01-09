<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MODELS\PENGADAAN_STOK;

class PengadaanController extends Controller
{
    public function index(){
        $pengadaans = PENGADAAN_STOK::all();

        return response()->json($pengadaans,200);
    }

    public function store(Request $request){
        $pengadaan = new PENGADAAN_STOK;
        $pengadaan['KODE_PEGAWAI'] = 1;
        $pengadaan['KODE_SUPPLIER'] = $request['KODE_SUPPLIER'];
        $pengadaan['TANGGAL_PENGADAAN'] = $request['TANGGAL_PENGADAAN'];
        $pengadaan['PEMBAYARAN_PEMESANAN'] = $request['PEMBAYARAN_PEMESANAN'];
        $success = $pengadaan->save();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function show($id){
        $pengadaan = PENGADAAN_STOK::find($id);

        if(is_null($pengadaan))
            return response()->json("Not Found", 404);
        else
            return response()->json($pengadaan, 200);
    }

    public function getBySup($id){
        $pengadaan = PENGADAAN_STOK::where('KODE_SUPPLIER',$id)->get();

        if(is_null($pengadaan))
            return response()->json("Not Found", 404);
        else
            return response()->json($pengadaan, 200);
    }

    public function getMaxId(){
        $id = PENGADAAN_STOK::max('KODE_PENGADAAN');
        return $id;
    }

    public function update(Request $request, $id){
        $pengadaan = PENGADAAN_STOK::find($id);

        if(is_null($pengadaan))
            return response()->json("Not Found", 404);
        else{
            if(!is_null($request['TANGGAL_PENGADAAN']))
                $pengadaan['TANGGAL_PENGADAAN'] = $request['TANGGAL_PENGADAAN'];
            if(!is_null($request['PEMBAYARAN_PEMESANAN']))
                $pengadaan['PEMBAYARAN_PEMESANAN'] = $request['PEMBAYARAN_PEMESANAN'];

            $success = $pengadaan->save();
            if(!$success)
                return response()->json("Failed", 500);
            else
                return response()->json("Success", 200);
        }
    }

    public function destroy($id){
        $pengadaan = PENGADAAN_STOK::find($id);

        if(is_null($pengadaan))
            return response()->json("Not Found", 404);

        $success = $pengadaan->delete();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }
}
