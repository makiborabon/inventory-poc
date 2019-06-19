<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory = Inventory::all()->toArray();
        return view('inventory.index', compact('inventory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->image);
        $this->validate($request, [
            'barcode'     => 'required',
            'sku'         => 'required',
            'title'       => 'required',
            'description' => 'required',
            'price'       => 'required',
            'image'       => 'required'
        ]);
        
        $imageName = time().".".request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        $inventory = new Inventory([
            'barcode'         =>  $request->get('barcode'),
            'sku'             =>  $request->get('sku'),
            'title'           =>  $request->get('title'),
            'description'     =>  $request->get('description'),
            'price'           =>  $request->get('price'),
            'image'           =>  $imageName
        ]);
        $inventory->save();
        return redirect()->route('inventory.index')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = Inventory::find($id);
        return view('inventory.edit', compact('inventory', 'id'));
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
        $this->validate($request, [
            'barcode'     => 'required',
            'sku'         => 'required',
            'title'       => 'required',
            'description' => 'required',
            'price'       => 'required',
            'image'       => 'required'
        ]);
        $inventory = Inventory::find($id);
        $inventory->barcode = $request->get('barcode');
        $inventory->sku = $request->get('sku');
        $inventory->title = $request->get('title');
        $inventory->description = $request->get('description');
        $inventory->price = $request->get('price');
        $inventory->image = $request->get('image');
        $inventory->save();
        return redirect()->route('inventory.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect()->route('inventory.index')->with('success', 'Data Deleted');
    }
}
