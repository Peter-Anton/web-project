<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Brief;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;
use App\Models\Offer;
use Symfony\Component\HttpFoundation\Response;


class OfferController extends Controller
{
    use OfferTrait;
    public function create()
    {

        return view('offers.create');
    }
    public function store(OfferRequest $request)
    {
//        $file_name = $this->saveImage($request->photo, 'images/offers');
        $path=request()->file('photo')->store('public/images');
        $offer=Offer::query()->create([
            'photo' => $path,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'company_id' =>$request->company_id,
        ]);
        $brief=Brief::query()->create([
            'slug'=>$request->name,
            'title'=>$request->name,
            'excerpt'=>$request->excrept,
            'body'=>$request->description,
            'offer_id'=>$offer->id
        ]);
        if ($offer && $brief) {
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
    public function edit(OfferRequest $offer){
        return view("offers.edit",compact('offer'));

    }
    public function getAlloffers()
    {
        $offers = Offer::all();
        return view('offers.Offerview', compact('offers'));
    }
}
