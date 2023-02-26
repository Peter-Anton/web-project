<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferCategory extends Model
{
    protected $guarded=[];
    public function offers_link()
    {
        return $this->hasMany('App\Models\Offer', 'offer_id', 'id');

    }
}