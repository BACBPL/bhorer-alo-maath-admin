<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Models\Skill;
use App\Models\PincodeMaster;
use Illuminate\Support\Facades\DB;
use App\Models\LaptopService;
use Illuminate\Support\Facades\Hash;

class ProviderController extends Controller
{
    public function providers()
{
    $providers = ServiceProvider::all();

    return view('admin.providers.index', compact('providers'));
}

public function createProvider()
{
    $skills = Skill::where('status', 'Active')->get();

    $states = PincodeMaster::select('state')
        ->whereNotNull('state')
        ->where('state', '!=', '')
        ->distinct()
        ->orderBy('state')
        ->pluck('state');

    $laptopServices = LaptopService::where('status', 'Active')->get();

    return view('admin.providers.create', compact(
        'skills',
        'states',
        'laptopServices'
    ));
}

public function storeProvider(Request $request)
{
    $lastId = (ServiceProvider::max('id') ?? 0) + 1;

    $employeeCode = 'ENG' . str_pad($lastId, 4, '0', STR_PAD_LEFT);

    // Upload Folder
    $uploadPath = public_path('uploads/providers');

    if (!file_exists($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    // Upload Function
    $uploadFile = function ($field) use ($request, $uploadPath) {

        if ($request->hasFile($field)) {

            $file = $request->file($field);

            $fileName = time() . '_' . $field . '.' . $file->getClientOriginalExtension();

            $file->move($uploadPath, $fileName);

            return $fileName;
        }

        return null;
    };

    $provider = ServiceProvider::create([

        'branch_id' => $request->branch_id,
        'engineer_code' => $employeeCode,
        'name' => $request->name,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'password' => Hash::make($request->password),
        'age' => $request->age,
        'state' => $request->state,
        'city' => $request->city,
        'current_pincode' => $request->current_pincode,
        'service_radius' => $request->service_radius,

        'serviceable_pincodes' => !empty($request->serviceable_pincodes)
            ? implode(',', $request->serviceable_pincodes)
            : null,

        'provider_type' => $request->provider_type,
        'experience' => $request->experience,
        'address' => $request->address,
        'aadhaar_number' => $request->aadhaar_number,
        'aadhaar_card' => $uploadFile('aadhaar_card'),
        'pan_number' => $request->pan_number,
        'pan_card' => $uploadFile('pan_card'),
        'driving_license_number' => $request->driving_license_number,
        'driving_license' => $uploadFile('driving_license'),
        'profile_photo' => $uploadFile('profile_photo'),
        'bank_name' => $request->bank_name,
        'account_holder_name' => $request->account_holder_name,
        'account_number' => $request->account_number,
        'ifsc_code' => $request->ifsc_code,
        'bank_document' => $uploadFile('bank_document'),       
        'status' => $request->status ?? 'Active'

    ]);

   if (!empty($request->skills)) {
        $provider->skills()->sync($request->skills);
    }

    if (!empty($request->laptop_services)) {
        $provider->laptopServices()->sync($request->laptop_services);
    }

    return redirect('/admin/providers')
            ->with('success', 'Engineer Added Successfully');
}

public function editProvider($id)
{
    $provider = ServiceProvider::with([
        'skills',
        'laptopServices'
    ])->findOrFail($id);

    $skills = Skill::where('status', 'Active')->get();

    $states = PincodeMaster::select('state')
        ->whereNotNull('state')
        ->where('state', '!=', '')
        ->distinct()
        ->orderBy('state')
        ->pluck('state');

    $laptopServices = LaptopService::with([
        'laptopServiceCategory',
        'laptopBrand',
        'laptopModel'
    ])
    ->where('status', 'Active')
    ->get();

    return view(
        'admin.providers.edit',
        compact(
            'provider',
            'skills',
            'states',
            'laptopServices'
        )
    );
}

public function viewProvider($id)
{
    $provider = ServiceProvider::with('laptopServices')->findOrFail($id);

    return view('admin.providers.view', compact('provider'));
}

public function searchPincode(Request $request)
{
    $search = $request->search;

    $pincodes = PincodeMaster::where('pincode', 'LIKE', "%{$search}%")
        ->orWhere('branch_city', 'LIKE', "%{$search}%")
        ->get();

    return response()->json($pincodes);
}

public function getPincodeDetails(Request $request)
{
    $pincode = PincodeMaster::where('pincode', $request->pincode)->first();

    if (!$pincode) {
        return response()->json([
            'success' => false
        ]);
    }

    return response()->json([
        'success' => true,
        'state' => $pincode->state,
        'city' => $pincode->branch_city
    ]);
}

public function updateProvider(Request $request, $id)
{
    $provider = ServiceProvider::findOrFail($id);

    $provider->update([

    'branch_id' => $request->branch_id,

'engineer_code' => $provider->engineer_code,
    
    'name' => $request->name,
        'email' => $request->email,

        'mobile' => $request->mobile,
        'password' => $request->password,

        'age' => $request->age,
        'city' => $request->city,

'current_pincode' => $request->current_pincode,
'service_radius' => $request->service_radius,

'serviceable_pincodes' => !empty($request->serviceable_pincodes)
    ? implode(',', $request->serviceable_pincodes)
    : null,

        'provider_type' => $request->provider_type,

        'experience' => $request->experience,
        'address' => $request->address,

        'status' => $request->status,

    ]);

        // Update Skills
    if ($request->has('skills')) {

        $provider->skills()->sync($request->skills);

    } else {

        $provider->skills()->detach();

    }

    // Update Laptop Services
    if ($request->has('laptop_services')) {

        $provider->laptopServices()->sync($request->laptop_services);

    } else {

        $provider->laptopServices()->detach();

    }

    return redirect('/admin/providers')
            ->with('success','Provider Updated Successfully');
}

public function deleteProvider($id)
{
    ServiceProvider::findOrFail($id)->delete();

    return redirect('/admin/providers')
        ->with('success', 'Provider Deleted Successfully');
}

public function viewServices($id)
{
    $provider = ServiceProvider::with([
        'laptopServices'
    ])->findOrFail($id);

    return view(
        'admin.providers.view_services',
        compact('provider')
    );
}
}
