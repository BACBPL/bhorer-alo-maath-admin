<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaptopBrand;

class LaptopBrandController extends Controller
{
    public function index()
    {
        $brands = LaptopBrand::latest()->get();

        return view('admin.laptop_brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.laptop_brands.create');
    }

    public function store(Request $request)
    {
        // We'll add this later
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}