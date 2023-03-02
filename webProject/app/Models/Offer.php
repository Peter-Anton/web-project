<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Offer extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function(Offer $offer) {
            Storage::delete("images/offers/".$offer->photo);
        });
    }
    public function scopeFilter($query,array $filter){
        $query->when($filter['search']?? false,fn($query,$search)=>$query->where('name','like','%'.$search.'%'));
        $query->when($filter['category']?? false,fn($query,$category)=>
        $query->whereHas('category',fn($query)=> $query->where('slug',$category))
           //this is the same thing as whereHas
//            ->whereExists(fn($query)=>
//            $query
//                ->from('categories')
//                ->whereColumn('OfferCategory.id','offer.offer_category_id')
//                ->where('OfferCategory',$category)
            );
    }


    public function category()
    {
        return $this->belongsTo(OfferCategory::class,'offer_category_id');
    }
}

