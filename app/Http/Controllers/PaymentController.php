<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function payments()
    {
        $payments = Payment::with('booking')->get();

        return view('admin.payments.index', compact('payments'));
    }
}
