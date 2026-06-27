@extends('admin.layout')

@section('content')

<h1>Reviews</h1>

<table border="1" width="100%" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Booking ID</th>
        <th>Rating</th>
        <th>Review</th>
    </tr>

    @forelse($reviews as $review)
    <tr>
        <td>{{ $review->id }}</td>
        <td>{{ $review->user->name ?? 'N/A' }}</td>
        <td>{{ $review->booking_id }}</td>
        <td>{{ $review->rating }}</td>
        <td>{{ $review->review }}</td>
    </tr>
    @empty
    <tr>
        <td colspan="5">No Reviews Found</td>
    </tr>
    @endforelse
</table>

@endsection