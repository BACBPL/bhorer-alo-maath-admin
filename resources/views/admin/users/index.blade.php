@extends('admin.layout')

@section('content')

<h2>Users</h2>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>

    @forelse($users as $user)

        <tr>

            <td>{{ $user->id }}</td>

            <td>{{ $user->name }}</td>

            <td>{{ $user->email }}</td>

            <td>{{ $user->mobile }}</td>

            <td>{{ $user->status }}</td>

        </tr>

    @empty

        <tr>
            <td colspan="5" class="text-center">
                No Users Found
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

@endsection