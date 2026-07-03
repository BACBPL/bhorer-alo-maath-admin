<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Models\Service;
use App\Models\ProviderService;
use App\Models\LaptopService;
use App\Models\ProviderLaptopService;

class ProviderServiceController extends Controller
{
    public function providerServices()
{
    $providers = ServiceProvider::with('laptopServices')
    ->where('status', 'Active')
    ->get();

    $laptopServices = LaptopService::where('status', 'Active')
        ->orderBy('service_name')
        ->get();

    return view(
        'admin.provider_services.index',
        compact(
            'providers',
            'laptopServices'
        )
    );
}

public function createProviderService()
{
    $providers = ServiceProvider::where('status', 'Active')->get();

    $laptopServices = LaptopService::with([
        'laptopServiceCategory',
        'laptopBrand',
        'laptopModel'
    ])
    ->where('status', 'Active')
    ->get();

    return view(
        'admin.provider_services.create',
        compact(
            'providers',
            'laptopServices'
        )
    );
}

public function storeProviderService(Request $request)
{
    $request->validate([
        'provider_id'      => 'required',
        'laptop_services'  => 'required|array|min:1',
    ]);

    foreach ($request->laptop_services as $serviceId)
    {
        ProviderLaptopService::firstOrCreate([
            'provider_id' => $request->provider_id,
            'laptop_service_id' => $serviceId
        ]);
    }

    return redirect('/admin/provider-services')
            ->with('success','Services Assigned Successfully');
}

public function editProviderService($id)
{
    $providerService = ProviderService::findOrFail($id);

    $providers = ServiceProvider::all();

    $services = Service::all();

    $selectedServices = ProviderService::where(
        'provider_id',
        $providerService->provider_id
    )->pluck('service_id')->toArray();

    return view(
        'admin.provider_services.edit',
        compact(
            'providerService',
            'providers',
            'services',
            'selectedServices'
        )
    );
}

public function updateProviderService(Request $request, $id)
{
    $providerService = ProviderService::findOrFail($id);

    ProviderService::where(
        'provider_id',
        $providerService->provider_id
    )->delete();

    foreach ($request->service_ids as $serviceId)
    {
        ProviderService::create([
            'provider_id' => $request->provider_id,
            'service_id'  => $serviceId
        ]);
    }

    return redirect('/admin/provider-services')
            ->with('success','Services Updated Successfully');
}

public function deleteProviderService($id)
{
    ProviderService::findOrFail($id)->delete();

    return redirect('/admin/provider-services');
}
}
