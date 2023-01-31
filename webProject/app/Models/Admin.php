<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticate
{
    use HasFactory,Notifiable;
    protected $guarded=[];
    public $timestamps = true;
}
