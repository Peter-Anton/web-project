<?php

namespace App\Http\Controllers;

use App\Models\offer;
use App\Models\offerCategory;
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
    public function getCategories(OfferCategory $category){
        $offers = $category->offers_link();
        return view('grid',[
            'offers'=>$offers,
           'current_category'=>$category,
            'categories'=>OfferCategory::all(),
        ]);
    }
}
