<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MODELS\SPAREPART;

class SparepartController extends Controller
{
    public function index(){
        $spareparts = SPAREPART::all();

        return response()->json($spareparts,200);
    }

    public function store(Request $request){

        $search = SPAREPART::where('NAMA_SPAREPART',$request['NAMA_SPAREPART'])->first();
        if (!is_null($search)) {
            return response()->json("Conflict", 409);
        }

        $sparepart = new SPAREPART;
        $sparepart['KODE_BARANG'] = $request['KODE_BARANG'];
        $sparepart['TIPE_SPAREPART'] = $request['TIPE_SPAREPART'];
        $sparepart['NAMA_SPAREPART'] = $request['NAMA_SPAREPART'];
        $sparepart['HARGA_JUAL'] = $request['HARGA_JUAL'];
        $sparepart['HARGA_BELI'] = $request['HARGA_BELI'];
        $sparepart['MERK_SPAREPART'] = $request['MERK_SPAREPART'];
        $sparepart['KODE_PELETAKAN'] = $request['KODE_PELETAKAN'];
        $sparepart['JUMLAH_STOK'] = $request['JUMLAH_STOK'];
        $sparepart['GAMBAR'] = $request['GAMBAR'];
        $success = $sparepart->save();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function show($id){
        $sparepart = SPAREPART::find($id);

        if(is_null($sparepart))
            return response()->json("Not Found", 404);
        else
            return response()->json($sparepart, 200);
    }

    public function getMin($numberOf){
        $sparepart = SPAREPART::where('JUMLAH_STOK','<=',$numberOf)->get();

        if(is_null($sparepart))
            return response()->json("Not Found", 404);
        else
            return response()->json($sparepart, 200);
    }

    public function update(Request $request, $id){
        $sparepart = SPAREPART::find($id);

        if(is_null($sparepart))
            return response()->json("Not Found", 404);
        else{
            if(!is_null($request['HARGA_JUAL']))
                $sparepart['HARGA_JUAL'] = $request['HARGA_JUAL'];
            if(!is_null($request['HARGA_BELI']))
                $sparepart['HARGA_BELI'] = $request['HARGA_BELI'];
            if(!is_null($request['KODE_PELETAKAN']))
                $sparepart['KODE_PELETAKAN'] = $request['KODE_PELETAKAN'];

            $success = $sparepart->save();
            if(!$success)
                return response()->json("Failed", 500);
            else
                return response()->json("Success", 200);
                
        }
    }

    public function destroy($id){
        $sparepart = SPAREPART::find($id);

        if(is_null($sparepart))
            return response()->json("Not Found", 404);

        $success = $sparepart->delete();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function uploader(Request $request){
        $image = $request->file('image');
        $input['imagename'] = $request['name'] . '.jpg';
        $destinationPath = public_path('/Pictures');
        $image->move($destinationPath, $input['imagename']);
    }
}
