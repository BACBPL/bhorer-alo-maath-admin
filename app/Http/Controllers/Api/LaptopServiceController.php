<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LaptopService;

class LaptopServiceController extends Controller
{
    public function index()
    {
        $services = LaptopService::where('status', 'Active')
            ->orderBy('id')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $services
        ]);
    }

    public function show($id)
    {
        $service = LaptopService::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $service
        ]);
    }
}