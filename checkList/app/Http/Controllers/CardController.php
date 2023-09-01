<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Check;
class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $array = [];
        $card = Card::all('id','title');
        foreach ($card as $i){
            $product = Card::find($i['id'],['id','title']);
            $product->check;
            $array[] = $product;
        }
        
        return json_encode($array);

    }
    
    /**
     * All card to items
     */
    public function allIndex()
    {
        $cards_items = Card::with(['check' => 
        function ($query) {
            $query->select('id', 'title');
        }])->select('id', 'title')->get();

        return $cards_items->toJson();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $card = new Card();
        $card->title = $request->title;
        $card->status = 1;
        $card->save();

        return json_encode($card);

    }

    /**
     * Display the specified resource.
     * @param  int  $id
     */
    public function show(Request $request)
    {
        $product = Card::find($request->id);
        $product->check;
        // return $product;
        return json_encode($product);
    
    }

    /**
     * Update the specified resource in storage.
     * @param  int  $id
     */
    public function update(Request $request)
    {
        $card = Card::findOrFail($request->id);
        $card->title = $request->title;
        $card->status = $request->status;
        $card->save();
        return $card;
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     */
    public function destroy(Request $request)
    {
       $card = Card::destroy($request->id);
       return $card;
    }
}
