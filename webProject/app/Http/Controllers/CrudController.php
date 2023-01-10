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
    return Offer::select('id', 'name','details')->get();
}

}
