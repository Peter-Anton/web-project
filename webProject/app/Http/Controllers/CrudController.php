<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use App\Models\Company;
use App\Models\offer;
use App\Models\Category;

class CrudController extends Controller
{
    public function getGridView(){

        return view('grid',[
         'offers' => Offer::query()
             ->with(["category", "company"])
             ->latest()
             ->filter(request(['search', 'category','company']))
             ->paginate(3)
            ->withQueryString()
        ]);
    }
   public function getCategory(Category $category){
        return view('grid',[
            'offers'=>$category->offers_link
        ]);
    }

    public function getCompany(Company $company){
        return view('grid',[
            'offers'=>$company->offers
        ]);
    }
    public function getBrief(Brief $brief){
        return view('components.offer-brief',[
            'offers'=>$brief->offer(),
            'brief'=>$brief
        ]);
    }
}
