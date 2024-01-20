<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon;

use App\Models\ItemType;
use App\Models\Item;
use App\Models\BarStock;
use App\Models\StoreStock;
use App\Models\StockPurchase;
use App\Models\Sale;
use App\Models\Requisition;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("items.manage", [
            'page' => 'manageItems',
            'items'=> Item::all(), 
            'itemTypes'=>ItemType::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'typeId' => 'required|exists:item_types,id',
            'name' => 'required|string|unique:items,name',
            'price' => 'required|numeric'
        ]);

        // Create the item
        $item = Item::create([
            'name' => ucwords($validated['name']),
            'item_type_id' => $validated['typeId'],
            'price' => $validated['price']
        ]);

        // Create the store stock record with the item ID
        $stockStore = StoreStock::create([
            'item_id' => $item->id,
            'qty' => 0
        ]);

        // Create the bar stock record with the item ID
        $barStore = BarStock::create([
            'item_id' => $item->id,
            'qty' => 0
        ]);

        if (!$item || !$stockStore || !$barStore) {
            return redirect()->back()->with(['alert' => 'danger', 'msg' => 'Something went wrong']);
        }

        return redirect()->back()->with(['alert' => 'success', 'msg' => 'New Item ( ' . $item->name . ' ) was successfully created ']);
    }
   
    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:items,id',
            'typeId' => 'required|exists:item_types,id',
            'name' => 'required|string|unique:items,name',
            'price' => 'required|numeric'
        ]);

        try {

            $item = Item::find($request->typeId);

            $item->update([ 
                'item_type_id'=>$validated['typeId'],
                'name'=> ucwords($validated['name']),
                'price'=> $validated['price']
            ]);

            return redirect()->back()->with(['alert' => 'success', 'msg' => 'Item ( ' . $item->name . ') Updated successfully']);

        } catch (\Exception $e) {
            return redirect()->back()->with(['alert' => 'danger', 'msg' => 'Something went wrong ...' . $e->getMessage()]);
        }
        
       
    }

    public function destroy(Request $request)
    {       
        $item = Item::findOrFail($request->id);

        $itemAssignedToStoreStock = StoreStock::where('item_id', $item->id)->where('qty', '>', 0)->exists();
        $itemAssignedToBarStock = BarSTock::where('item_id', $item->id)->where('qty', '>', 0)->exists();
        $itemAssignedToSales = Sale::where('item_id', $item->id)->exists();
        $itemAssignedToRequisitions = Requisition::where('item_id', $item->id)->exists();
    
        if ($itemAssignedToStoreStock || $itemAssignedToSales || $itemAssignedToRequisitions || $itemAssignedToBarStock) {
            return redirect()->back()->with(['alert' => 'danger', 'msg' => 'Item could not be deleted. Item is attached to an object.']);
        }
    
        if (!$item) {
            return redirect()->back()->with('fail', "Item not found on the table record!");
        }

        $deleteItem = $item->delete();

        if (!$deleteItem) {
            return redirect()->back()->with(['alert' => 'danger', 'msg' => 'Something went wrong']);
        }

        return redirect()->back()->with(['alert' => 'success', 'msg' => 'New Item ( ' . $item->name . ' ) was successfully deleted ']);
    }
}
