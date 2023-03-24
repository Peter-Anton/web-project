<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Offer extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Offer $offer) {
            Storage::delete("images/offers/" . $offer->photo);
        });
    }

    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false, fn($query, $search) => $query->where(fn($query) => $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
        )
        );

        $query->when($filter['category'] ?? false, fn($query, $category) => $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );

        $query->when($filter['company'] ?? false, fn($query, $company) => $query->whereHas('company', fn($query) => $query->where('name', $company))
        );
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }


    public function brief()
    {
        return $this->hasOne(Brief::class, 'offer_id');
    }

}




#################################################################COMMENTS#################################################################
//this is the same thing as whereHas
//            ->whereExists(fn($query)=>
//            $query
//                ->from('categories')
//                ->whereColumn('Category.id','offer.offer_category_id')
//                ->where('Category',$category)
