<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function login(Request $request){
                $remember_me= $request->has('remember_me');

        if (auth()->guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$remember_me)){
            return redirect()->route('admins.dashboard');
        }
        return redirect()->back()->with('error','there is a problem in your data');
    }

    public function loginView()
    {

        return view('admins.Login');
    }
}
