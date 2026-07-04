<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaptopServiceCategory;
use App\Models\LaptopService;

class LaptopServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = LaptopServiceCategory::latest()->get();

        return view(
            'admin.laptop_service_categories.index',
            compact('categories')
        );
    }

    public function create()
{
    $categories = LaptopServiceCategory::where('status', 'Active')->get();

    return view(
        'admin.laptop_service_categories.create',
        compact('categories')
    );
}

    public function store(Request $request)
    {
        LaptopServiceCategory::create([

            'category_name' => $request->category_name,

            'description' => $request->description,

            'status' => $request->status

        ]);

        return redirect('/admin/laptop-service-categories')
            ->with('success','Category Added Successfully');
    }

  public function edit($id)
{
    $category = LaptopServiceCategory::findOrFail($id);

    $categories = LaptopServiceCategory::where('status', 'Active')->get();

    return view(
        'admin.laptop_service_categories.edit',
        compact('category', 'categories')
    );
}

public function update(Request $request, $id)
{
    $category = LaptopServiceCategory::findOrFail($id);

    $category->update([
        'category_name' => $request->category_name,
        'description'   => $request->description,
        'status'        => $request->status,
    ]);

    return redirect('/admin/laptop-service-categories')
            ->with('success','Category Updated Successfully');
}

public function delete($id)
{
    LaptopServiceCategory::findOrFail($id)->delete();

    return redirect('/admin/laptop-service-categories')
            ->with('success', 'Category Deleted Successfully');
}
}