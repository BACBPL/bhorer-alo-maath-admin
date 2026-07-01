<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaptopServiceCategory;

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
        return view(
            'admin.laptop_service_categories.create'
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
}