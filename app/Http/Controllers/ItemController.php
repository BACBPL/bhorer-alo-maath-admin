<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::latest()->get();

        return view('admin.items.index', compact('items'));
    }

    public function create()
    {
        return view('admin.items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'status'    => 'required',
        ]);

        Item::create([
            'item_name' => $request->item_name,
            'status'    => $request->status,
        ]);

        return redirect('/admin/items')
            ->with('success', 'Item Added Successfully');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);

        return view('admin.items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'status'    => 'required',
        ]);

        $item = Item::findOrFail($id);

        $item->update([
            'item_name' => $request->item_name,
            'status'    => $request->status,
        ]);

        return redirect('/admin/items')
            ->with('success', 'Item Updated Successfully');
    }

    public function destroy($id)
    {
        Item::findOrFail($id)->delete();

        return redirect('/admin/items')
            ->with('success', 'Item Deleted Successfully');
    }
}