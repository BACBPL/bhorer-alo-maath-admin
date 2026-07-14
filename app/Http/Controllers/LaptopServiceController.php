<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaptopService;
use App\Models\LaptopServiceCategory;
use Illuminate\Support\Facades\Storage;

class LaptopServiceController extends Controller
{
    public function index()
    {
        $laptopServices = LaptopService::with([
            'laptopServiceCategory',
            'laptopBrand',
            'laptopModel'
        ])->latest()->get();

        return view(
            'admin.laptop_services.index',
            compact('laptopServices')
        );
    }

   public function create()
{
    $laptopServiceCategories = LaptopServiceCategory::where(
        'status',
        'Active'
    )->get();

    return view(
        'admin.laptop_services.create',
        compact('laptopServiceCategories')
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

public function edit($id)
{
    $service = LaptopService::findOrFail($id);

    $laptopServiceCategories = LaptopServiceCategory::where('status','Active')->get();

    return view(
        'admin.laptop_services.edit',
        compact(
            'service',
            'laptopServiceCategories'
        )
    );
}

public function update(Request $request, $id)
{
    $service = LaptopService::findOrFail($id);

    $imagePath = $service->image;

    if ($request->hasFile('image')) {

        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $imagePath = $request->file('image')->store(
            'laptop_service_banners',
            'public'
        );
    }

    $service->update([

        'laptop_service_category_id' => $request->laptop_service_category_id,

        'service_name' => $request->service_name,

        'description' => $request->description,

        'price' => $request->price,

        'image' => $imagePath,

        'status' => $request->status,

        'is_featured' => $request->has('is_featured') ? 1 : 0,

    ]);

    return redirect('/admin/laptop-services')
        ->with('success', 'Laptop Service Updated Successfully');
}

public function delete($id)
{
    $service = LaptopService::findOrFail($id);

    if (
        $service->image &&
        file_exists(public_path('uploads/laptop_services/'.$service->image))
    ) {
        unlink(public_path('uploads/laptop_services/'.$service->image));
    }

    $service->delete();

    return redirect('/admin/laptop-services')
            ->with('success', 'Laptop Service Deleted Successfully');
}

}