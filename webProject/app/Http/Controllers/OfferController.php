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
    public function delete(Offer $offer)
    {
        $offer->delete();
    return redirect()->back()->with(['success'=>'the offer deleted successfully']);
    }
    public function edit(Offer $offer){
        $brief=Brief::query()->where('offer_id',$offer->id)->first();
        return view("offers.edit",compact('offer','brief'));
    }
    public function update(Offer $offer){
    $offer->update([
            'name'=>request()->name,
            'price'=>request()->price,
            'description'=>request()->description,
            'category_id'=>request()->category_id,
            'company_id'=>request()->company_id,
        ]);
        $brief=Brief::query()->where('offer_id',$offer->id)->first();
        $brief->update([
            'slug'=>request()->name,
            'title'=>request()->name,
            'excerpt'=>request()->excrept,
            'body'=>request()->description,
        ]);
            return response()->json([
                'status' => true,
                'msg' => 'the offer updated successfully',
            ]);


}
    public function getAlloffers()
    {
        $offers = Offer::all();
        return view('offers.Offerview', compact('offers'));
    }
}
