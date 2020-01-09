<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MODELS\PEGAWAI;

class PegawaiController extends Controller
{
    public function index(){
        $pegawais = PEGAWAI::all();

        return response()->json($pegawais,200);
    }

    public function store(Request $request){
        $pegawai = new PEGAWAI;
        $pegawai['KODE_ROLE'] = $request['KODE_ROLE'];
        $pegawai['NAMA_PEGAWAI'] = $request['NAMA_PEGAWAI'];
        $pegawai['USERNAME'] = $request['USERNAME'];
        $pegawai['ALAMAT_PEGAWAI'] = $request['ALAMAT_PEGAWAI'];
        $pegawai['NO_TELP_PEGAWAI'] = $request['NO_TELP_PEGAWAI'];
        $pegawai['GAJI_PER_MINGGU'] = $request['GAJI_PER_MINGGU'];
        $success = $pegawai->save();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function show($id){
        $pegawai = PEGAWAI::find($id);

        if(is_null($pegawai))
            return response()->json("Not Found", 404);
        else
            return response()->json($pegawai, 200);
    }

    public function pegawaiByRole($id){
        $pegawais = PEGAWAI::where('KODE_ROLE',$id)->get();

        if(is_null($pegawais))
            return response()->json("Not Found", 404);
        else
            return response()->json($pegawais, 200);
    }

    public function update(Request $request, $id){
        $pegawai = PEGAWAI::find($id);

        if(is_null($pegawai))
            return response()->json("Not Found", 404);
        else{
            if(!is_null($request['KODE_ROLE']))
                $pegawai['KODE_ROLE'] = $request['KODE_ROLE'];
            if(!is_null($request['NAMA_PEGAWAI']))
                $pegawai['NAMA_PEGAWAI'] = $request['NAMA_PEGAWAI'];
            if(!is_null($request['USERNAME']))
                $pegawai['USERNAME'] = $request['USERNAME'];
            if(!is_null($request['ALAMAT_PEGAWAI']))
                $pegawai['ALAMAT_PEGAWAI'] = $request['ALAMAT_PEGAWAI'];
            if(!is_null($request['NO_TELP_PEGAWAI']))
                $pegawai['NO_TELP_PEGAWAI'] = $request['NO_TELP_PEGAWAI'];
            if(!is_null($request['GAJI_PER_MINGGU']))
                $pegawai['GAJI_PER_MINGGU'] = $request['GAJI_PER_MINGGU'];

            $success = $pegawai->save();
            if(!$success)
                return response()->json("Failed", 500);
            else
                return response()->json("Success", 200);
                
        }
    }

    public function destroy($id){
        $pegawai = PEGAWAI::find($id);

        if(is_null($pegawai))
            return response()->json("Not Found", 404);

        $success = $pegawai->delete();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }
}
