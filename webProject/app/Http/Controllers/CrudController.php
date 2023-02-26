<?php

namespace App\Http\Controllers;

use App\Models\offer;
use App\Models\offerCategory;

class CrudController extends Controller
{
    public function getGridView(){
        $categories= OfferCategory::all();
        $offers = Offer::query()->select('id',
            'name',
            'price',
            'description',
            'photo',
    'created_at'
        )->get();
        return view('grid',compact('offers','categories'));
    }
    public function getCategories(OfferCategory $category){
        $offers = $category->offers_link();
        $categories= OfferCategory::all();
        $current_category = $category;
        return view('grid',compact('offers','categories','current_category'));
    }
}
