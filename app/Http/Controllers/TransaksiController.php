<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MODELS\TRANSAKSI;
use App\MODELS\PEGAWAI;

class TransaksiController extends Controller
{
    public function index(){
        $transaksis = TRANSAKSI::all();

        return response()->json($transaksis,200);
    }

    public function store(Request $request){
        $transaksi = new TRANSAKSI;
        $transaksi['KODE_CUST'] = $request['KODE_CUST'];
        $transaksi['KODE_STATUS'] = $request['KODE_STATUS'];
        $transaksi['KODE_CABANG'] = $request['KODE_CABANG'];
        $transaksi['KODE_KENDARAAN'] = $request['KODE_KENDARAAN'];
        $transaksi['CS'] = $request['CS'];
        $transaksi['TANGGAL_TRANSAKSI'] = $request['TANGGAL_TRANSAKSI'];
        $transaksi['KODE_LUNAS'] = $request['KODE_LUNAS'];
        $transaksi['KODE_PENJUALAN'] = $request['KODE_PENJUALAN'];
        $transaksi['DISKON'] = $request['DISKON'];

        $success = $transaksi->save();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function show($id){
        $transaksi = TRANSAKSI::find($id);

        if(is_null($transaksi))
            return response()->json("Not Found", 404);
        else
            return response()->json($transaksi, 200);
    }

    public function getTransaksiByLunas($lunas){
        $transaksis = TRANSAKSI::where('KODE_LUNAS',$lunas)->get();

        if(is_null($transaksis))
            return response()->json("Not Found", 404);
        else
            return response()->json($transaksis, 200);
    }

    public function getTransaksiByCustomer($id){
        $transaksis = TRANSAKSI::where('KODE_CUST',$id)->get();

        if(is_null($transaksis))
            return response()->json("Not Found", 404);
        else
            return response()->json($transaksis, 200);
    }

    public function getHistory(Request $request){
        $idCust = $request['KODE_CUST'];
        $idKendaraan = $request['KODE_KENDARAAN'];
        $transaksis = TRANSAKSI::where('KODE_CUST',$idCust)->where('KODE_KENDARAAN',$idKendaraan)->get();

        if(is_null($transaksis))
            return response()->json("Not Found", 404);
        else
            return response()->json($transaksis, 200);
    }


    public function update(Request $request, $id){
        $transaksi = TRANSAKSI::find($id);

        if(is_null($transaksi))
            return response()->json("Not Found", 404);
        else{
            if(!is_null($request['KODE_PENJUALAN']))
                $transaksi['KODE_PENJUALAN'] = $request['KODE_PENJUALAN'];
            if(!is_null($request['KODE_STATUS']))
                $transaksi['KODE_STATUS'] = $request['KODE_STATUS'];

            $success = $transaksi->save();
            if(!$success)
                return response()->json("Failed", 500);
            else
                return response()->json("Success", 200);
        }
    }

    public function destroy($id){
        $transaksi = TRANSAKSI::find($id);

        if(is_null($transaksi))
            return response()->json("Not Found", 404);

        $success = $transaksi->delete();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }

    public function getMaxId(){
        $id = TRANSAKSI::max('KODE_TRANSAKSI');
        return $id;
    }
}
