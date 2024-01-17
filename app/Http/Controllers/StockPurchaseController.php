<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon;

use App\Models\ItemType;
use App\Models\Item;
use App\Models\StockPurchase;

class StockPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("stockPurchase.manage", ['stockPurchase'=> StockPurchase::all(), 'items'=>Item::all(), 'itemTypes'=>ItemType::all()]);
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
            'item' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'purchaser' => 'required'
        ]);
        
        // Create the Stock Purchase
        $stockPurchase = StockPurchase::create([
            'item_id' => $request->item,
            'price' => $request->price,
            'qty' => $request->quantity,
            'purchased_by' => $request->purchaser,
        ]);

        if (!$stockPurchase) {
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
        return view("stockPurchase.edit", [
            'item'=> Item::find($id), 'items'=>Item::all(), 'itemTypes'=>ItemType::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'itemType'=>'required',
            'item'=>'required',
            'price'=>'required'
        ]);
        
        $updateItem = Item::find($id)->update([ 
            'item_type_id'=>$request->itemType,
            'name'=>$request->item,
            'price'=>$request->price,
            'updated_at'=>\Carbon\Carbon::now()
        ]);

        if (!$updateItem) {
            return redirect('/items/manage')->with('fail', 'Something went wrong');
        }
        return redirect('/items/manage')->with('success', 'Item Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {       
        $stockPurchase = StockPurchase::find($id);
    
        if (!$stockPurchase) {
            return redirect()->back()->with('fail', "Stock Item not found on the table record!");
        }

        $deleteStockPurchase = $stockPurchase->delete();

        if (!$deleteStockPurchase) {
            return redirect('/stock/purchase/manage')->with('fail', 'Something went wrong');
        }

        return redirect('/stock/purchase/manage')->with('success', 'Stock Item Deleted successfully');
    }
}
