<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use App\Http\Requests\ItemsRequest;
use App\Http\Resources\ItemsResource;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Items::all();
        return ItemsResource::collection(Items::paginate(5)); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text' => ['required','max:255'],
            'body' => ['required'],
        ]);

        $postData = new Items;
        $postData->text = $request->text;
        $postData->body = $request->body;
        $postData->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Items::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'text' => ['required','max:255'],
            'body' => ['required'],
        ]);

        $postData = Items::find($id);
        $postData->text = $request->text;
        $postData->body = $request->body;
        $postData->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postData = Items::find($id);
        $postData->delete();
    }
}
