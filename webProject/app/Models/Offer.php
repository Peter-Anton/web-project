<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Offer extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = [
        'name',
        'price',
        'details',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
