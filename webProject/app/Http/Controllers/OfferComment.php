<?php

namespace App\Http\Controllers;

use App\Models\Brief;
class OfferComment extends Controller
{
    public function store(Brief $brief){
     request()->validate([
            'comment'=>'required'
        ]);
     auth()->id();

        $brief->comments()->create([
            'company_id'=>$brief->offer->company_id,
            'comment'=>request('comment')
        ]);
        return back();

    }
}
