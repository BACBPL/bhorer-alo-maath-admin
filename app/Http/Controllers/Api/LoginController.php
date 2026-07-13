<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Customer;
use App\Models\PersonalAccessToken;

class LoginController extends Controller
{
    //
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|digits:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        // Check customer exists
        $customer = Customer::where('mobile', $request->mobile)->first();

        // Generate OTP
        $otp = random_int(1000, 9999);

        // New Customer
        if (!$customer) {

            $customer = Customer::create([
                'mobile' => $request->mobile,
                'otp' => $otp,
                'account_status' => 'ACCOUNT_REG_PENDING',
                'status' => 1
            ]);

            $newRegister = true;

        } else {

            // Existing Customer
            $customer->update([
                'otp' => $otp
            ]);

            $newRegister = false;
        }

        // SMS API পরে লাগাবো
        // এখন testing এর জন্য OTP return করছি

        return response()->json([
            'success' => true,
            'message' => 'OTP Sent Successfully',
            'otp' => $otp,
            'notRegistered' => $newRegister
        ]);
    }

    /**
     * STEP 2: Verify OTP & Login
     */
    public function verifyOtp(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|string',
            'otp'    => 'required|digits:4'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $user = Customer::where('mobile', $request->mobile)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found.',
            ], 404);
        }

        if($request->otp != $user['otp']){

            
            return response()->json([
                'status' => false,
                'message' => 'Invalid or expired OTP.',
            ]);    
        }
        
        // Create Sanctum token
        // $token = $user->createToken('iptv_token')->plainTextToken;
        // $token = $user->createToken('customer_token')->plainTextToken;
        // $token = $user->createToken('customer_token')->plainTextToken;
        $token = $user->createToken('auth_token')->plainTextToken;
        // Clear OTP after login
        $user->update([
            'otp' => null
        ]);

        date_default_timezone_set('Asia/Kolkata');


        return response()->json([
            'status' => true,
            'message' => 'Login Successful',

            'token' => $token,

            'isNewUser' => empty($user->firstname),

            'user' => [
                'id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'email' => $user->email,
                'mobile' => $user->mobile,
                'city' => $user->city,
                'state' => $user->state,
            ]
        ]);

    }

    public function completeProfile(Request $request)
    {
        $customer = $request->user();

        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->alternative_mobile = $request->alternative_mobile;
        $customer->street_name = $request->street_name;
        $customer->house_no = $request->house_no;
        $customer->address = $request->address;
        $customer->pincode = $request->pincode;
        $customer->city = $request->city;
        $customer->state = $request->state;

        $customer->account_status = "ACCOUNT_ACTIVE";

        $customer->save();
        $customer->refresh();

        return response()->json([
            "status" => true,
            "message" => "Profile Updated",
            "customer" => $customer
        ]);
    }

    public function getCustomer(Request $request)
    {
        $customer = $request->user();

        return response()->json([
            "status" => true,
            "customer" => $customer
        ]);
    }

    public function uploadProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $customer = $request->user();

        if (!$customer) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        if ($request->hasFile('profile_image')) {

            // Delete old image if it exists
            if (
                $customer->profile_image &&
                file_exists(storage_path('app/public/' . $customer->profile_image))
            ) {
                unlink(storage_path('app/public/' . $customer->profile_image));
            }

            $path = $request->file('profile_image')->store(
                'profile_images',
                'public'
            );

            $customer->profile_image = $path;
            $customer->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Profile image uploaded successfully.',
            'customer' => $customer,
        ]);
    }
}
