<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{

    public function heroBanners()
    {
        $banners = Banner::where('type', 'hero_banner')
            ->where('status', 'Active')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $banners
        ]);
    }

     public function offerBanners()
    {
        $banners = Banner::where('type', 'offer_banner')
            ->where('status', 'Active')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $banners
        ]);
    }
    

    public function index(Request $request)
{
    $location = $request->location;

    $locations = Banner::select('location')
                    ->distinct()
                    ->pluck('location');

    $banners = collect();

    if (!empty($location))
    {
        $banners = Banner::where('location', $location)->get();
    }

    return view(
        'admin.banners.index',
        compact('banners', 'locations', 'location')
    );
}

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
{
    $banner = new Banner();

    $banner->name = $request->name;
    $banner->location = $request->location;
    $banner->type = $request->type;
    $banner->status = $request->status;
    $banner->redirect_url = $request->redirect_url;

    if($request->hasFile('image'))
    {
        $file = $request->file('image');
        /*
        $filename = time().'_'.$file->getClientOriginalName();

        $file->move(public_path('uploads/banners'), $filename);

        $banner->file_url = asset('uploads/banners/'.$filename);
        $banner->file_path = 'uploads/banners/'.$filename;
        */
        // Custom file name
        $filename = time() . '_' . preg_replace('/\s+/', '_', $banner->name) . '.' . $file->getClientOriginalExtension();

        // storage/app/public/banners
        $path = $file->storeAs('banners', $filename, 'public');

        $banner->file_path = $path;

        $banner->file_url = asset('storage/' . $path);
    }

    $banner->save();

    return redirect('/admin/banners')
           ->with('success','Banner Added Successfully');
}

public function edit($id)
{
    $banner = Banner::findOrFail($id);

    return view('admin.banners.edit', compact('banner'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'type' => 'required',
        'status' => 'required'
    ]);

    $banner = Banner::findOrFail($id);

    $banner->name = $request->name;
    $banner->location = $request->location;
    $banner->type = $request->type;
    $banner->status = $request->status;

    if ($request->hasFile('image')) {

        $file = $request->file('image');

        $filename = time().'_'.$file->getClientOriginalName();

        $path = $file->storeAs(
            'banners',
            $filename,
            'public'
        );

        $banner->file_path = $path;
        $banner->file_url = asset('storage/'.$path);
    }

    $banner->save();

    return redirect('/admin/banners')
        ->with('success', 'Banner Updated Successfully');
}

public function delete($id)
{
    Banner::findOrFail($id)->delete();

    return redirect('/admin/banners')
           ->with('success','Banner Deleted Successfully');
}
}