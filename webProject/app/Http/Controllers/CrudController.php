<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class CrudController extends Controller
{
  public function setUserData(Request $request)
  {
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->save();
  }
  public function getUserData()
  {
    $user = User::query()->select('name', 'email','mobile')->get();
    return $user;
  }
}
