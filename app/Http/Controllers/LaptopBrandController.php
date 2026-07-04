<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaptopBrand;

class LaptopBrandController extends Controller
{
    public function index()
    {
        $brands = LaptopBrand::latest()->get();

        return view(
            'admin.laptop_brands.index',
            compact('brands')
        );
    }

    public function create()
    {
        return view(
            'admin.laptop_brands.create'
        );
    }

    public function store(Request $request)
    {
        LaptopBrand::create([

            'brand_name' => $request->brand_name,

            'description' => $request->description,

            'status' => $request->status

        ]);

        return redirect('/admin/laptop-brands')
            ->with('success', 'Brand Added Successfully');
    }

    public function edit($id)
{
    $brand = LaptopBrand::findOrFail($id);

    return view(
        'admin.laptop_brands.edit',
        compact('brand')
    );
}

public function update(Request $request, $id)
{
    $brand = LaptopBrand::findOrFail($id);

    $brand->update([
        'brand_name' => $request->brand_name,
        'description' => $request->description,
        'status' => $request->status,
    ]);

    return redirect('/admin/laptop-brands')
            ->with('success', 'Brand Updated Successfully');
}

public function delete($id)
{
    LaptopBrand::findOrFail($id)->delete();

    return redirect('/admin/laptop-brands')
            ->with('success', 'Brand Deleted Successfully');
}
}