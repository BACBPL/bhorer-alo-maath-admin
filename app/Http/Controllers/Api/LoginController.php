<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;

class LoginController extends Controller
{
    //
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|string'
        ]); 

        // dd($request);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $user = Customer::where('mobile', $request->mobile)->first();
        

        $newRegister = false;
        $otp = random_int(1000, 9999);

        if (!$user) {

            $newRegister = true;
            
            $user = Customer::create([
                'mobile' => $request->mobile,
                'otp' => $otp,
                "account_status" => "ACCOUNT_REG_PENDING"
            ]);

            return response()->json([
                'status' => true,
                'notRegistered' => true,
                'message' => 'OTP sent successfully.',
                'otp' => $otp // REMOVE IN PRODUCTION
            ]);
        }
        $user->update([
            'otp' => $otp
        ]);

        // $response = Http::get('https://enterprise.smsgupshup.com/GatewayAPI/rest', [
        //     "method"   => config("services.gupshup.method"),
        //     "send_to"  => "91" . $request->mobile,
        //     "msg"      => $this->otpFormatted($otp),
        //     "msg_type" => config('services.gupshup.msg_type'),
        //     "userid"   => config('services.gupshup.user_id'),
        //     "password" => config('services.gupshup.password'),
        //     "v"        => "1.1",
        //     "mask"     => config('services.gupshup.mask'),
        //     "temp_id" => config('services.gupshup.temp_id')
        // ]);

        return response()->json([
            'status' => true,
            'notRegistered' => false,
            'message' => 'OTP sent successfully.',
            'otp' => $otp // REMOVE IN PRODUCTION
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
        $token = '12344324';
        // Clear OTP after login
        $user->update([
            'otp' => null
        ]);

        date_default_timezone_set('Asia/Kolkata');


        return response()->json([
            'status' => true,
            'message' => 'Login successful.',
            'token' => $token,
            'token_type' => 'Bearer',
            'user' => [
                'id' => $user->id,
                'name' => $user->firstname,
                'mobile' => $user->mobile,
                'email' => $user->email,
            ]
        ]);

    }
}
