<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with([
            'category',
            'subCategory'
        ])->get();

        return response()->json([
            'success' => true,
            'data' => $services
        ]);
    }

    public function show($id)
    {
        $service = Service::with([
            'category',
            'subCategory'
        ])->find($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $service
        ]);
    }

    public function featuredServices()
    {
        $services = Service::where('is_featured', 1)
            ->where('status', 'Active')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $services
        ]);
    }

    public function mostBookedServices()
    {
        $services = Service::where('is_most_booked', 1)
            ->where('status', 'Active')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $services
        ]);
    }
}