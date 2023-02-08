<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;
use App\Models\Offer;
class CrudController extends Controller
{
    use OfferTrait;
    public function __construct()
    {
    }

    public function getOffers()
    {
        $offers = Offer::select('id', 'name', 'price', 'details')->get();
        return view('offers.Offerview', compact('offers'));
    }
    public function create()
    {
        return view('offers.create');
    }
    public function store(OfferRequest $request)
    {
        $file_name = $this->saveImage($request->photo, 'images/offers');
        $offer=Offer::query()->create([
            'photo' => $file_name,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        if ($offer) {
            return response()->json([
                'status' => true,
                'msg' => 'the offer added successfully',
            ]);
        }
        else
            return response()->json([
                'status'=>false,
                'msg'=>'the offer can not be added'
            ]);

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
