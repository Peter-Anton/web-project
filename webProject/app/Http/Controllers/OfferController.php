<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;
use App\Models\Offer;
class OfferController extends Controller
{
    use OfferTrait;
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
            'category_id' => $request->category_id,
            'company_id' =>$request->company_id,
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
    public function delete(Request $request)
    {
        $offer = Offer::query()->find($request->id);
        if (!$offer)
            return redirect()->back(['error'=>'the offer doesnt exist']);
        $offer->delete();
        return response()->json([
            'status' => true,
            'msg' => 'the offer deleted successfully',
            'id'=>$offer->id,
        ]);

    }
    public function getAlloffers()
    {
        $offers = Offer::query()->select('id',
            'name',
            'price',
            'description',
            'photo'
        )->get();
        return view('offers.Offerview', compact('offers'));
    }
}
