<?php

namespace App\Http\Controllers;

use App\Models\offer;
use App\Models\Category;

class CrudController extends Controller
{
    public function getGridView(){
        $categories= Category::all();

        return view('grid',[
         'offers' => Offer::query()->latest()->filter(request(['search', 'category']))->get() ,
        ]);
    }

    public function getCategories(Category $category) {
        $offers = $category->offers_link()->select('id',
            'name',
            'price',
            'description',
            'photo',
            'created_at')->get();
        $categories= Category::all();
        $current_category = $category;
        return view('grid', compact('offers','categories','current_category'));
    }
}
