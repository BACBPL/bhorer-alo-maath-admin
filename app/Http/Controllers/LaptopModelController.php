<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaptopModel;
use App\Models\LaptopBrand;
use App\Models\LaptopServiceCategory;

class LaptopModelController extends Controller
{
    public function index()
{
    $models = LaptopModel::with([
        'category',
        'brand'
    ])->latest()->get();

    return view(
        'admin.laptop_models.index',
        compact('models')
    );
}

public function create()
{
    $categories = LaptopServiceCategory::where('status', 'Active')->get();

    $brands = LaptopBrand::where('status', 'Active')->get();

    return view(
        'admin.laptop_models.create',
        compact(
            'categories',
            'brands'
        )
    );
}

   public function store(Request $request)
{
    LaptopModel::create([

        'laptop_service_category_id' => $request->laptop_service_category_id,

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

public function edit($id)
{
    $model = LaptopModel::findOrFail($id);

    $categories = LaptopServiceCategory::where(
        'status',
        'Active'
    )->get();

    $brands = LaptopBrand::where(
        'status',
        'Active'
    )->get();

    return view(
        'admin.laptop_models.edit',
        compact(
            'model',
            'categories',
            'brands'
        )
    );
}

public function update(Request $request, $id)
{
    $model = LaptopModel::findOrFail($id);

    $model->update([

        'laptop_service_category_id' => $request->laptop_service_category_id,

        'laptop_brand_id' => $request->laptop_brand_id,

        'model_name' => $request->model_name,

        'description' => $request->description,

        'status' => $request->status

    ]);

    return redirect('/admin/laptop-models')
            ->with(
                'success',
                'Laptop Model Updated Successfully'
            );
}

public function delete($id)
{
    LaptopModel::findOrFail($id)->delete();

    return redirect('/admin/laptop-models')
            ->with(
                'success',
                'Laptop Model Deleted Successfully'
            );
}

}