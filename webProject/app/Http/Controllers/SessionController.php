<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function store_login(){
        $attributes=request()->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:6|'
        ]);
        if (auth()->attempt($attributes)){
           session()->regenerate();
            return redirect()->route('home')->with('success','you are logged in successfully');
        }
        throw ValidationException::withMessages([
            'email'=>'your provided credential could not be verified'
        ]);


//        return back()
//            ->withInput() //let the input still valid
//            ->withErrors(['email'=>'your provided credential could not be verified']);
    }



    public function login(){
        return view('auth.login');
    }

    public function destroy(){
        auth()->logout();
        return redirect()->route('home')->with('success','see you soon');
    }
}
