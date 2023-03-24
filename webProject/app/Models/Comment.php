<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function brief(){
        return $this->belongsTo(Brief::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
