<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Service;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with([
            'category',
            'subCategory',
            'service'
        ])->orderBy('id')->get();

        return view('admin.items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::where('status','Active')->get();

        $subCategories = SubCategory::where('status','Active')->get();

        $services = Service::where('status','Active')->get();

        $items = Item::with('subCategory')
                    ->where('status','Active')
                    ->get();

        return view('admin.items.create', compact(
            'categories',
            'subCategories',
            'services',
            'items'
        ));
    }

    public function store(Request $request)
    {
        Item::create([

            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'item_name'=>$request->item_name,
            'status'=>$request->status,

        ]);

        return redirect('/admin/items')
            ->with('success', 'Item Added Successfully');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);

        $categories = Category::where('status', 'Active')->get();

        $subCategories = SubCategory::where('status', 'Active')->get();

        $services = Service::where('status', 'Active')->get();

        return view('admin.items.edit', compact(
            'item',
            'categories',
            'subCategories',
            'services'
        ));
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $item->update([

        'category_id'=>$request->category_id,

        'sub_category_id'=>$request->sub_category_id,

        'item_name'=>$request->item_name,

        'status'=>$request->status,

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