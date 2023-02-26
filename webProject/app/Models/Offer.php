<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\OfferCategory', 'offer_category_id', 'id');
    }
}

