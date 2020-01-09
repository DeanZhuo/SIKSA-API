<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MODELS\PEGAWAI;

class AuthController extends Controller
{
    public function Login(Request $request){

        $uname= $request->USERNAME;
        $pass= $request->PASSWORD;
    
        $pegawai = PEGAWAI::where('USERNAME', $uname)->where('PASSWORD', $pass)->first();
    
        if(!is_null($pegawai)){
            return response()->json($pegawai, 200);
        } else {            
            return response()->json("Not Found", 404);
        }
    }



    public function PasswordChange($id, Request $request){ 
        $uname= $request->USERNAME;
        $pass= $request->PASSWORD;
    
        $pegawai = PEGAWAI::where('USERNAME', $uname)->where('PASSWORD', $pass)->first();
        
        if(!is_null($pegawai)){
            $pegawai['PASSWORD'] = $request['NEW_PASS'];
            $success = $pegawai->save();
            if(!$success)
                return response()->json("Failed", 500);
            else
                return response()->json("Success", 200);
        }else{
            return response()->json("Not Found", 404);
        }
    }
}
