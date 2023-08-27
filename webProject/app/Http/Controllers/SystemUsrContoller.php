<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class SystemUsrContoller extends Controller
{
    public function create(){
        return view('systemUser.create');
    }
    public function store(Request $request){
        $admin=Admin::query()->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        if ($admin) {
            return response()->json([
                'status' => true,
                'msg' => 'the admin added successfully',
            ]);
        }
        else
            return response()->json([
                'status'=>false,
                'msg'=>'the admin can not be added'
            ]);

    }



}
