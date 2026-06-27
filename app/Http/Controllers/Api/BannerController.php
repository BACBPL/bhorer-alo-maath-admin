<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    public function newNoteworthyBanners()
{
    $banners = Banner::where('type', 'new_noteworthy_banner')
        ->where('status', 'Active')
        ->get();

    return response()->json([
        'success' => true,
        'data' => $banners
    ]);
}

public function mostBookedBanners()
{
    $banners = Banner::where('type', 'most_booked_banner')
        ->where('status', 'Active')
        ->get();

    return response()->json([
        'success' => true,
        'data' => $banners
    ]);
}
}