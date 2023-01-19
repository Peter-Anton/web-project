<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Offer;
class CrudController extends Controller
{
public  function __construct()
{
}
public function getOffers()
{
    $offers=Offer::select('id','name','price','details')->get();
    return view('offers.Offerview',compact('offers'));
}

}
