<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MODELS\SUPPLIER;
use App\MODELS\PENGADAAN_STOK;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = SUPPLIER::all();

        return response()->json($suppliers,200);
    }

    public function store(Request $request){
        
        $supplier = new SUPPLIER;
        $supplier['NAMA_SUPPLIER'] = $request['NAMA_SUPPLIER'];
        $supplier['ALAMAT_SUPPLIER'] = $request['ALAMAT_SUPPLIER'];
        $supplier['NAMA_SALES'] = $request['NAMA_SALES'];
        $supplier['NO_TELP_SALES'] = $request['NO_TELP_SALES'];
        $success = $supplier->save();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function show($id){
        $supplier = SUPPLIER::find($id);

        if(is_null($supplier))
            return response()->json("Not Found", 404);
        else
            return response()->json($supplier, 200);
    }

    public function update(Request $request, $id){
        $supplier = SUPPLIER::find($id);

        if(is_null($supplier))
            return response()->json("Not Found", 404);
        else{
            if(!is_null($request->NAMA_SUPPLIER))
                $supplier->NAMA_SUPPLIER = $request->NAMA_SUPPLIER;
            if(!is_null($request->ALAMAT_SUPPLIER))
                $supplier->ALAMAT_SUPPLIER = $request->ALAMAT_SUPPLIER;
            if(!is_null($request->NAMA_SALES))
                $supplier->NAMA_SALES = $request->NAMA_SALES;
            if(!is_null($request->NO_TELP_SALES))
                $supplier->NO_TELP_SALES = $request->NO_TELP_SALES;

            $success = $supplier->save();
            if(!$success)
                return response()->json("Failed", 500);
            else
                return response()->json("Success", 200);
        }
    }

    public function destroy($id){
        $supplier = SUPPLIER::find($id);

        if(is_null($supplier))
            return response()->json("Not Found", 404);   

        $success = $supplier->delete();
        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function getByPengadaan($id){
        $pengadaan = PENGADAAN_STOK::find($id);

        if(is_null($pengadaan))
            return response()->json("Not Found", 404);
        else{
            $supplier = SUPPLIER::find($pengadaan['KODE_SUPPLIER']);

            if(is_null($supplier))
                return response()->json("Not Found", 404);
            else
                return response()->json($supplier, 200);
        }
    }
}
