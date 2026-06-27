<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Models\Service;
use App\Models\ProviderService;

class ProviderServiceController extends Controller
{
        public function providerServices()
{
    $providerServices = ProviderService::with([
        'provider',
        'service'
    ])->get()
      ->groupBy('provider_id');

    return view(
        'admin.provider_services.index',
        compact('providerServices')
    );
}

public function createProviderService()
{
    $providers = ServiceProvider::all();

    $services = Service::all();

    return view(
        'admin.provider_services.create',
        compact(
            'providers',
            'services'
        )
    );
}

public function storeProviderService(Request $request)
{

    foreach ($request->service_ids as $serviceId)
    {
        ProviderService::firstOrCreate([
            'provider_id' => $request->provider_id,
            'service_id'  => $serviceId
        ]);
    }

    return redirect('/admin/provider-services');
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
