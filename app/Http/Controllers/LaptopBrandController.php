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
}