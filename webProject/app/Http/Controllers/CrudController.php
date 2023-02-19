<?php

namespace App\Http\Controllers;

use App\Models\offer;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function getGridView(){
$offers = Offer::query()->select('id',
            'name',
            'price',
            'description',
            'photo',
    'created_at'
        )->get();
        return view('grid',compact('offers'));
    }
}
