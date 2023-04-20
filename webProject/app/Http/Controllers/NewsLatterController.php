<?php

namespace App\Http\Controllers;

use App\Api_Service\NewsLatter;
use Exception;
use Illuminate\Validation\ValidationException;

class NewsLatterController extends Controller
{
    public function __invoke(NewsLatter $newsLatter)
    {
        request()->validate([
            'email' => 'required|email'
        ]);
        try {
            $newsLatter->subscriber(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'this email could not be added to our newslatter'
            ]);
        }

        return redirect('/')->with('success', 'you are subscribed successfully');
    }
}
