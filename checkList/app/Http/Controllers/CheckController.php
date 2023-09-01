<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Check;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $check = Check::all();
        return json_encode($check);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $check = new Check();
        $check->title = $request->title;
        $check->status = $request->status;
        $check->card_id = $request->card_id;
        $check->save();
        return json_encode($check);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request)
    {
        $check = Check::findOrFail($request->id);
        $check->title = $request->title;//ultimo 
        $check->status = $request->status;
        $check->save();
        return $check;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $check = Check::destroy($request->id);
        return $check;
    }
}
