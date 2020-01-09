<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MODELS\ROLE;

class RoleController extends Controller
{
    public function index(){
        $roles = ROLE::all();

        return response()->json($roles,200);
    }

    public function store(Request $request){
        $role = new ROLE;
        $role['JENIS_ROLE'] = $request['JENIS_ROLE'];
        $success = $role->save();

        if($success)
            return response()->json("Success", 200);
        else
            return response()->json("Failed", 500);
    }

    public function show($id){
        $role = ROLE::find($id);

        if(is_null($role))
            return response()->json("Not Found", 404);
        else
            return response()->json($role, 200);
    }

    public function destroy($id){
        $role = ROLE::find($id);

        if(is_null($role))
            return response()->json("Not Found", 404);

        $success = $role->delete();

        if(!$success)
            return response()->json("Failed", 500);
        else
            return response()->json("Success", 200);
    }
}
