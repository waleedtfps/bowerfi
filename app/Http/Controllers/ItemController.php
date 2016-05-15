<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items=Item::all()->paginate(15);
        return view('user.items',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('user.addItem');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
            'itemname' => 'required',
            'quantity' => 'required',
            'barcode'=>'required',
        ]);

        if ($validator->fails()) {
            return redirect('user/items')
                        ->withErrors($validator)
                        ->withInput();
        }
        else {
            $item= new Item;
            $item->itemname=$request->itemname;
            $item->quantity=$request->quantity;
            $item->barcode=$request->barcode;
            $item->save();
            return redirect('user/items')->with('message','Sucessfully added!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
       
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
         $item= Item::find($id);
         return view('user.item.edit',compact('item'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $item=Item::find($id);
        $validator = Validator::make($request->all(), [
            'itemname' => 'required',
            'quantity' => 'required',
            'barcode'=>'required',
        ]);

        if ($validator->fails()) {
            return redirect('user/items/edit/'.$item->id)
                        ->withErrors($validator)
                        ->withInput();
        }
        else {
         
        $item->itemname=$request->itemname;
            $item->quantity=$request->quantity;
            $item->barcode=$request->barcode;
            $item->save();
                
           return redirect('user/items')->with('message','Updated Sucessfully.');
                        
     
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $item=Item::find($id);
        $item->delete();
        return redirect('user/items')->with('message','Deleted Sucessfully.');
        
    }
}
