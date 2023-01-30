<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Offer;
class CrudController extends Controller
{
    public function __construct()
    {
    }

    public function getOffers()
    {
        $offers = Offer::select('id', 'name', 'price', 'details')->get();
        return view('offers.Offerview', compact('offers'));
    }


    public function deleteOffer(Request $request)
    {
        $offer = Offer::find($request->id)->delete();
        if ($offer) {
            return response()->json([
                'status' => true,
                'msg' => 'the offer deleted successfully',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'no offer with this id',
            ]);
        }
    }
}
