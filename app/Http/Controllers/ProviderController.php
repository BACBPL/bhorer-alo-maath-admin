<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Models\Skill;
use App\Models\PincodeMaster;
use Illuminate\Support\Facades\DB;

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

    return view('admin.providers.create', compact(
        'skills',
        'states'
    ));
}

public function storeProvider(Request $request)
{
    $lastId = ServiceProvider::max('id') + 1;

$employeeCode = 'ENG' . str_pad($lastId, 4, '0', STR_PAD_LEFT);

   $provider = ServiceProvider::create([

    'branch_id' => $request->branch_id,

    'engineer_code' => $employeeCode,

    'name' => $request->name,

    'email' => $request->email,

    'mobile' => $request->mobile,

    'password' => $request->password,

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

    'pan_number' => $request->pan_number,

    'driving_license_number' => $request->driving_license_number,

    'bank_name' => $request->bank_name,

    'account_holder_name' => $request->account_holder_name,

    'account_number' => $request->account_number,

    'ifsc_code' => $request->ifsc_code,

    'status' => $request->status

]);

if ($request->has('skills')) {

    $provider->skills()->sync($request->skills);

}

    return redirect('/admin/providers');
}


public function editProvider($id)
{
    $provider = ServiceProvider::findOrFail($id);

    $skills = Skill::where('status', 'Active')->get();

    return view('admin.providers.edit', compact(
        'provider',
        'skills'
    ));
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

    return redirect('/admin/providers')
            ->with('success','Provider Updated Successfully');
}

public function deleteProvider($id)
{
    ServiceProvider::findOrFail($id)->delete();

    return redirect('/admin/providers')
        ->with('success', 'Provider Deleted Successfully');
}

}
