<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon;

use App\Models\Item;
use App\Models\StoreStock;
use App\Models\BarStock;
use App\Models\StockPurchase;

class BarStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("barStocks.manage", ['stocks'=> BarStock::all(), 'items'=>Item::all()]);
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
        //    
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
        // 
    }
}
