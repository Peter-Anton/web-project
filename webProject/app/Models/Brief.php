<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
