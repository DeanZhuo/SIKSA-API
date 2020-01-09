<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MODELS\CUSTOMER;

class CustomerController extends Controller
{
    public function index(){
        $customers = CUSTOMER::all();

        return response()->json($customers,200);
    }

    public function store(Request $request){
        $customer = new CUSTOMER;
        $customer['NAMA_CUST'] = $request['NAMA_CUST'];
        $customer['NO_TELP_CUST'] = $request['NO_TELP_CUST'];
        $success = $customer->save();

        if(!$success)
                return response()->json("Failed", 500);
            else
                return response()->json("Success", 200);
    }

    public function show($id){
        $customer = CUSTOMER::find($id);

        if(is_null($customer)){
            return response()->json("Not Found", 404);
        }else{
            return response()->json($customer, 200);
        }
    }

    public function getByNo($number){
        $customer = CUSTOMER::where('NO_TELP_CUST',$number)->first();
        if(is_null($customer)){
            return response()->json("Not Found", 404);
        }else{
            return response()->json($customer, 200);
        }
    }
}
