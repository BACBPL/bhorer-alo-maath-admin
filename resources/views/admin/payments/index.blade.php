@extends('admin.layout')

@section('content')

<h1>Payments</h1>

<table border="1" width="100%" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Booking ID</th>
        <th>Transaction ID</th>
        <th>Amount</th>
        <th>Method</th>
        <th>Status</th>
    </tr>

    @forelse($payments as $payment)
    <tr>
        <td>{{ $payment->id }}</td>
        <td>{{ $payment->booking_id }}</td>
        <td>{{ $payment->transaction_id }}</td>
        <td>{{ $payment->amount }}</td>
        <td>{{ $payment->payment_method }}</td>
        <td>{{ $payment->payment_status }}</td>
    </tr>
    @empty
    <tr>
        <td colspan="6">No Payments Found</td>
    </tr>
    @endforelse

</table>

@endsection