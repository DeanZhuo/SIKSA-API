<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MODELS\DETAIL_PENGADAAN;

class DetailPdaController extends Controller
{
    public function index(){
        $detPdas = DETAIL_PENGADAAN::all();

        return response()->json($detPdas,200);
    }

    public function store(Request $request){
        $detPda = new DETAIL_PENGADAAN;
        $detPda['KODE_PENGADAAN'] = $request['KODE_PENGADAAN'];
        $detPda['NAMA_BARANG'] = $request['NAMA_BARANG'];
        $detPda['JUMLAH_PESANAN'] = $request['JUMLAH_PESANAN'];
        $detPda['HARGA_SATUAN'] = $request['HARGA_SATUAN'];
        $success = $detPda->save();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function show($id){
        $detPda = DETAIL_PENGADAAN::find($id);

        if(is_null($detPda))
            return response()->json("Not Found", 404);
        else
            return response()->json($detPda, 200);
    }

    public function getByPengadaan($id){
        $detPda = DETAIL_PENGADAAN::where('KODE_PENGADAAN',$id)->get();

        if(is_null($detPda))
            return response()->json("Not Found", 404);
        else
            return response()->json($detPda, 200);
    }

    public function update(Request $request, $id){
        $detPda = DETAIL_PENGADAAN::find($id);

        if(is_null($detPda))
            return response()->json("Not Found", 404);
        else{
            if(!is_null($request['NAMA_BARANG']))
                $detPda['NAMA_BARANG'] = $request['NAMA_BARANG'];
            if(!is_null($request['JUMLAH_PESANAN']))
                $detPda['JUMLAH_PESANAN'] = $request['JUMLAH_PESANAN'];
            if(!is_null($request['HARGA_SATUAN']))
                $detPda['HARGA_SATUAN'] = $request['HARGA_SATUAN'];

            $success = $detPda->save();
            if(!$success)
                return response()->json("Failed", 500);
            else
                return response()->json("Success", 200);
                
        }
    }

    public function destroy($id){
        $detPda = DETAIL_PENGADAAN::find($id);

        if(is_null($detPda))
            return response()->json("Not Found", 404);

        $success = $detPda->delete();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }
}
