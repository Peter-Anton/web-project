<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferCategory extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function offers_link()
    {
        return $this->hasMany(Offer::class, 'offer_category_id');

    }
}
