<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon;

use App\Models\ItemType;
use App\Models\Item;

class ItemTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        return view("itemTypes.manage", ['getAllItemTypes'=> ItemType::all()]);
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
            'itemType'=>'required'
        ]);
        
        $itemType = ItemType::create([
            'name'=>$request->itemType
        ]);

        if (!$itemType) {
            return redirect('/item_type/manage')->with('fail', 'Something went wrong');
        }
        return redirect()->back()->with('success', 'Item Type created successfully');
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
        return view("itemTypes.edit", [
            'item'=> ItemType::find($id),
            'getAllItemTypes'=> ItemType::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['itemType'=>'required']);

        $updateItemType = ItemType::find($id)->update([ 
            'name'=>$request->itemType,
            'updated_at'=>\Carbon\Carbon::now()
        ]);

        if (!$updateItemType) {
            return redirect('/item_type/manage')->with('fail', 'Something went wrong');
        }
        return redirect('/item_type/manage')->with('success', 'Item Type Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        $checkIfItemAssingment = Item::where('item_type_id', $id)->exists();
        $itemType = ItemType::find($id);
    
        if ($checkIfItemAssingment) {
            return redirect()->back()->with('fail', "Can't delete! Item is attached to the Item type");
        }

        if (!$itemType) {
            return redirect()->back()->with('fail', "Item not found on the table record!");
        }

        $deleteItemType = $itemType->delete();

        if (!$deleteItemType) {
            return redirect('/item_type/manage')->with('fail', 'Something went wrong');
        }

        return redirect('/item_type/manage')->with('success', 'Item Type Deleted successfully');
    }
}
