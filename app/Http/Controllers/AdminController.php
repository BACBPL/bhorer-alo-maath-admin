<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Service;
use App\Models\ServiceProvider;
use App\Models\Booking;
use App\Models\ProviderService;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginSubmit(Request $request)
    {
        $admin = Admin::where('email', $request->email)
                      ->where('password', $request->password)
                      ->first();

        if ($admin)
        {
            session([
                'admin_id'   => $admin->id,
                'admin_name' => $admin->name
            ]);

            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Invalid Email or Password');
    }

    public function dashboard()
    {
        $totalCategories = Category::count();
        $totalServices = Service::count();
        $totalProviders = ServiceProvider::count();
        $totalBookings = Booking::count();

        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        // Today
        $todayOrders = Booking::whereDate('created_at', $today)->count();

        $todayAssigned = Booking::whereDate('created_at', $today)
                                ->where('status', 'Assigned')
                                ->count();

        $todayPending = Booking::whereDate('created_at', $today)
                               ->where('status', 'Pending')
                               ->count();

        $todayCancelled = Booking::whereDate('created_at', $today)
                                 ->where('status', 'Cancelled')
                                 ->count();

        $todayCompleted = Booking::whereDate('created_at', $today)
                                 ->where('status', 'Completed')
                                 ->count();

        // Yesterday
        $yesterdayOrders = Booking::whereDate('created_at', $yesterday)->count();

        $yesterdayAssigned = Booking::whereDate('created_at', $yesterday)
                                    ->where('status', 'Assigned')
                                    ->count();

        $yesterdayPending = Booking::whereDate('created_at', $yesterday)
                                   ->where('status', 'Pending')
                                   ->count();

        $yesterdayCancelled = Booking::whereDate('created_at', $yesterday)
                                     ->where('status', 'Cancelled')
                                     ->count();

        $yesterdayCompleted = Booking::whereDate('created_at', $yesterday)
                                     ->where('status', 'Completed')
                                     ->count();

        $recentBookings = Booking::latest()
                                 ->take(10)
                                 ->get();

        return view('admin.dashboard', compact(
            'totalCategories',
            'totalServices',
            'totalProviders',
            'totalBookings',

            'todayOrders',
            'todayAssigned',
            'todayPending',
            'todayCancelled',
            'todayCompleted',

            'yesterdayOrders',
            'yesterdayAssigned',
            'yesterdayPending',
            'yesterdayCancelled',
            'yesterdayCompleted',

            'recentBookings'
        ));
    }

    public function logout()
    {
        session()->flush();

        return redirect('/admin/login');
    }
}