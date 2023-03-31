<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Registercontroller extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(){
       $att=request()->validate([
            'name'=>'required|max:100|min:3|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|max:100|min:6',
        ]);
           $user=User::create($att);
           auth()->login($user);
        return redirect()->route('home')->with('success','you are registered successfully');
    }
}
