<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon;

use App\Models\ItemType;
use App\Models\Item;
use App\Models\BarStock;
use App\Models\StoreStock;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("items.manage", ['items'=> Item::all(), 'itemTypes'=>ItemType::all()]);
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
            'itemType' => 'required',
            'item' => 'required',
            'price' => 'required'
        ]);

        // Create the item
        $item = Item::create([
            'name' => $request->item,
            'item_type_id' => $request->itemType,
            'price' => $request->price
        ]);

        // Get the ID of the created item
        $itemId = $item->id;

        // Create the store stock record with the item ID
        $stockStore = StoreStock::create([
            'item_id' => $itemId,
        ]);

        // Create the bar stock record with the item ID
        $barStore = BarStock::create([
            'item_id' => $itemId,
        ]);

        if (!$item || !$stockStore || !$barStore) {
            return redirect()->back()->with('fail', 'Something went wrong');
        }

        return redirect()->back()->with('success', 'Item created successfully');
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
        return view("items.edit", [
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
        $item = Item::find($id);
    
        if (!$item) {
            return redirect()->back()->with('fail', "Item not found on the table record!");
        }

        $deleteItem = $item->delete();

        if (!$deleteItem) {
            return redirect('/items/manage')->with('fail', 'Something went wrong');
        }

        return redirect('/items/manage')->with('success', 'Item Deleted successfully');
    }
}
