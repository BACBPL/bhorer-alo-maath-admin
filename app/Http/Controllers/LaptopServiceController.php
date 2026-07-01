<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaptopService;
use App\Models\LaptopServiceCategory;

class LaptopServiceController extends Controller
{
    public function index()
    {
        $laptopServices = LaptopService::with([
                            'laptopServiceCategory',
                            'laptopBrand',
                            'laptopModel'
                        ])
                    ->latest()
                    ->get();

        return view(
            'admin.laptop_services.index',
            compact('laptopServices')
        );
    }

    public function create()
    {
        $categories = LaptopServiceCategory::where(
            'status',
            'Active'
        )->get();

        return view(
            'admin.laptop_services.create',
            compact('categories')
        );
    }

    public function store(Request $request)
    {
        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time().'_'.$request->image->getClientOriginalName();

            $request->image->move(
                public_path('uploads/laptop_services'),
                $imageName
            );
        }

        LaptopService::create([

            'laptop_service_category_id' => $request->laptop_service_category_id,

            'service_name' => $request->service_name,

            'description' => $request->description,

            'price' => $request->price,

            'image' => $imageName,

            'status' => $request->status,

            'is_featured' => $request->has('is_featured') ? 1 : 0,

        ]);

        return redirect('/admin/laptop-services')
            ->with('success', 'Laptop Service Added Successfully');
    }
}