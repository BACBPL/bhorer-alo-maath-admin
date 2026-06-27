@extends('admin.layout')

@section('content')

<h2>Bookings</h2>

<table class="table table-bordered">

    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Service</th>
        <th>Engineer</th>
        <th>Date</th>
        <th>Status</th>
    </tr>

    @php
        $id = 1;
    @endphp
        
    @forelse($bookings as $booking)

    <tr>

        <td>{{ $id++ }}</td>

        <td>{{ $booking->user->name ?? 'N/A' }}</td>

        <td>{{ $booking->service->service_name ?? 'N/A' }}</td>

        <td>{{ $booking->provider->name ?? 'Not Assigned' }}</td>

        <td>{{ $booking->booking_date }}</td>

        <td>{{ $booking->status }}</td>

    </tr>

    @empty

    <tr>
        <td colspan="6" class="text-center">
            No Bookings Found
        </td>
    </tr>

    @endforelse

</table>

@endsection