<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class BookingController extends Controller
{
    public function bookings()
    {
        $bookings = Booking::with([
            'user',
            'service',
            'provider'
        ])->get();

        return view(
            'admin.bookings.index',
            compact('bookings')
        );
    }
}