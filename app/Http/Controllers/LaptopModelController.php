<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaptopModel;
use App\Models\LaptopBrand;

class LaptopModelController extends Controller
{
    public function index()
    {
        $models = LaptopModel::with('brand')
                    ->latest()
                    ->get();

        return view(
            'admin.laptop_models.index',
            compact('models')
        );
    }

    public function create()
    {
        $brands = LaptopBrand::where(
            'status',
            'Active'
        )->get();

        return view(
            'admin.laptop_models.create',
            compact('brands')
        );
    }

    public function store(Request $request)
    {
        LaptopModel::create([

            'laptop_brand_id' => $request->laptop_brand_id,

            'model_name' => $request->model_name,

            'description' => $request->description,

            'status' => $request->status

        ]);

        return redirect('/admin/laptop-models')
                ->with(
                    'success',
                    'Laptop Model Added Successfully'
                );
    }
}