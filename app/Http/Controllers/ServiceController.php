<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Service;
use App\Models\LaptopService;
use App\Models\LaptopServiceCategory;

class ServiceController extends Controller
{
    public function services(Request $request)
    {
        $query = Service::with(['category','subCategory']);

        if($request->filled('search'))
        {
            $query->where('service_type','LIKE','%'.$request->search.'%');
        }

        if($request->filled('category_id'))
        {
            $query->where('category_id',$request->category_id);
        }

        if($request->filled('status'))
        {
            $query->where('status',$request->status);
        }

        $services = $query->latest()->get();

        $categories = Category::where('status','Active')->get();

        return view(
            'admin.services.index',
            compact('services','categories')
        );
    }

    public function createService()
    {
        $categories = Category::where('status', 'Active')->get();

        $subCategories = SubCategory::where('status', 'Active')->get();

        return view('admin.services.create', compact(
            'categories',
            'subCategories'
        ));
    }

    public function storeService(Request $request)
    {
        $imageName = null;

        if($request->hasFile('image'))
        {
            $imageName = time().'_'.$request->image->getClientOriginalName();

            $request->image->move(
                public_path('uploads/services'),
                $imageName
            );
        }

        Service::create([
            'category_id'     => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'service_type'    => $request->service_type,
            'description'     => $request->description,
            'price'           => $request->price,
            'image'           => $imageName,
            'status'          => $request->status,
            'is_featured'     => $request->is_featured,
            'is_most_booked'  => $request->is_most_booked,
        ]);

        return redirect('/admin/services')
                ->with('success', 'Service Added Successfully');
    }

    public function editService($id)
    {
        $service = Service::findOrFail($id);

        $categories = Category::where('status', 'Active')->get();

        $subCategories = SubCategory::where('status', 'Active')->get();

        return view('admin.services.edit', compact(
            'service',
            'categories',
            'subCategories'
        ));
    }

    public function updateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $data = [
        'category_id'     => $request->category_id,
        'sub_category_id' => $request->sub_category_id,
        'service_type'    => $request->service_type,
        'description'     => $request->description,
        'price'           => $request->price,
        'status'          => $request->status,
        'is_featured'     => $request->is_featured ?? 1,
        'is_most_booked'  => $request->is_most_booked,
    ];

    if ($request->hasFile('image'))
    {
        if (
            !empty($service->image) &&
            file_exists(public_path('uploads/services/' . $service->image))
        ) {
            unlink(public_path('uploads/services/' . $service->image));
        }

        $file = $request->file('image');

        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        $file->move(
            public_path('uploads/services'),
            $filename
        );

        $data['image'] = $filename;
    }

        $service->update($data);

        return redirect('/admin/services')
                ->with('success', 'Service Updated Successfully');
    }

    public function deleteService($id)
    {
        Service::findOrFail($id)->delete();

        return redirect('/admin/services')
            ->with('success', 'Service Deleted Successfully');
    }

    public function laptopServices()
    {
        $laptopServices = \App\Models\LaptopService::latest()->get();

        return view('admin.laptop_services.index', compact('laptopServices'));
    }

    public function createLaptopService()
    {
        return view('admin.laptop_services.create');
    }

    public function storeLaptopService(Request $request)
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

            'service_type' => $request->service_type,

            'description' => $request->description,

            'price' => $request->price,

            'image' => $imageName,

            'status' => $request->status,

            'is_featured' => $request->has('is_featured') ? 1 : 0,

        ]);

        return redirect('/admin/laptop-services')
                ->with('success', 'Laptop Service Added Successfully');
    }

    public function getServices($subcategory)
    {
        $services = Service::where(
            'sub_category_id',
            $subcategory
        )
        ->where('status','Active')
        ->get();

        return response()->json($services);
    }

    public function laptopServiceCategories()
    {
        $categories = LaptopServiceCategory::latest()->get();

        return view(
            'admin.laptop_service_categories.index',
            compact('categories')
        );
    }

}
