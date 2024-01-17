<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon;

use App\Models\ItemType;
use App\Models\Item;
use App\Models\StockPurchase;
use App\Models\StoreStock;

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
        

        $storeStock = StoreStock::where('id', $request->item)->first();
        $quantity = $storeStock->qty + $request->quantity;
 
        $updateStoreStock = StoreStock::where('item_id', $request->item)->update([
            'qty'=>$quantity
        ]);

        if (!$stockPurchase || !$updateStoreStock) {
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
        return view("stockPurchase.edit", ['stockPurchase'=>StockPurchase::find($id), 'stockPurchases'=> StockPurchase::all(), 'items'=>Item::all(), 'itemTypes'=>ItemType::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 
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

        $storeStock = StoreStock::where('id', $stockPurchase->item_id)->first();
        $quantity = $storeStock->qty - $stockPurchase->qty;

        $deleteStockPurchase = $stockPurchase->delete();

        if ($deleteStockPurchase) {
            StoreStock::where('item_id', $stockPurchase->item_id)->update([
                'qty'=>$quantity
            ]);
        }
        

        if (!$deleteStockPurchase) {
            return redirect('/stock/purchase/manage')->with('fail', 'Something went wrong');
        }

        return redirect('/stock/purchase/manage')->with('success', 'Stock Item Deleted successfully');
    }
}
