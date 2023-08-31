<?php

namespace App\Http\Controllers;


use App\Models\User;

class SystemUsrContoller extends Controller
{
    public function getAllUser()
    {

        $users = User::all();
        return view('SystemUser.UserView', compact('users'));
    }
    public function makeAdmin(User $user){
        $user->update([
            'role'=>'admin'
        ]);
        return redirect()->back()->with(['success'=>'the user is now admin']);
    }
    public function delete(User $user){
        $user->delete();
        return redirect()->back()->with(['success'=>'the user is now deleted']);
    }


}
