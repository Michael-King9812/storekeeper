<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\StoreStock;

class StoreStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("stocks.manage", ['stocks'=> StoreStock::all(), 'items'=>Item::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item'=>'required',
            'quantity'=>'required'
        ]);
        
        $item = StoreStock::create([
            'item_id'=>$request->item,
            'qty'=>$request->quantity
        ]);

        if (!$item) {
            return redirect()->back()->with('fail', 'Something went wrong');
        }
        return redirect()->back()->with('success', 'Stock Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("stocks.edit", ['stock'=>StoreStock::find($id),'stocks'=> StoreStock::all(), 'items'=>Item::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'quantity'=>'required'
        ]);
        
        $updateItem = StoreStock::find($id)->update([ 
            'qty'=>$request->quantity,
            'updated_at'=>\Carbon\Carbon::now()
        ]);

        if (!$updateItem) {
            return redirect('/stocks/manage')->with('fail', 'Something went wrong');
        }
        return redirect('/stocks/manage')->with('success', 'Stock Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {       
        $stock = StoreStock::find($id);
    
        if (!$stock) {
            return redirect()->back()->with('fail', "Stock not found on the table record!");
        }

        $deleteStock = $stock->delete();

        if (!$deleteStock) {
            return redirect('/stocks/manage')->with('fail', 'Something went wrong');
        }

        return redirect('/stocks/manage')->with('success', 'Stock Deleted successfully');
    }
}
