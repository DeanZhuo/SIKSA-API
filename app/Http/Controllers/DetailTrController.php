<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MODELS\DETAIL_TRANSAKSI;

class DetailTrController extends Controller
{
    public function index(){
        $detTrs = DETAIL_TRANSAKSI::all();

        return response()->json($detTrs,200);
    }

    public function store(Request $request){
        $detTr = new DETAIL_TRANSAKSI;
        $detTr['KODE_TRANSAKSI'] = $request['KODE_TRANSAKSI'];
        $detTr['TOTAL_BAYAR'] = $request['TOTAL_BAYAR'];
        $success = $detTr->save();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function show($id){
        $detTr = DETAIL_TRANSAKSI::find($id);

        if(is_null($detTr))
            return response()->json("Not Found", 404);
        else
            return response()->json($detTr, 200);
    }

    public function getByTransaksi($id){
        $detTrs = DETAIL_TRANSAKSI::where('KODE_TRANSAKSI',$id)->get();

        if(is_null($detTrs))
            return response()->json("Not Found", 404);
        else
            return response()->json($detTrs, 200);
    }

    public function update(Request $request, $id){
        $detTr = DETAIL_TRANSAKSI::find($id);

        if(is_null($detTr))
            return response()->json("Not Found", 404);
        else{
            if(!is_null($request['TOTAL_BAYAR']))
                $detTr['TOTAL_BAYAR'] = $request['TOTAL_BAYAR'];

            $success = $detTr->save();
            if(!$success)
                return response()->json("Failed", 500);
            else
                return response()->json("Success", 200);
        }
    }

    public function destroy($id){
        $detTr = DETAIL_TRANSAKSI::where('KODE_DETAIL_TRANSAKSI',$id);

        if(is_null($detTr))
            return response()->json("Not Found", 404);

        $success = $detTr->delete();
        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function getMaxId(){
        $id = DETAIL_TRANSAKSI::max('KODE_DETAIL_TRANSAKSI');
        return $id;
    }
}
