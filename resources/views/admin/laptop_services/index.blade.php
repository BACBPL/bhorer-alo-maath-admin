@extends('admin.layout')

@section('content')

<div class="container-fluid">

    <div class="page-card p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="page-title">Laptop Services</h2>
                <p class="page-subtitle">
                    Manage Laptop Rent, AMC and Repair Services
                </p>
            </div>

            <a href="/admin/laptop-services/create" class="btn btn-premium">
                Add Laptop Service
            </a>

        </div>

        <table class="table table-hover">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Type</th>

                    <th>Service Name</th>

                    <th>Price</th>

                    <th>Status</th>

                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

            @forelse($laptopServices as $service)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{$service->laptopServiceCategory->category_name ?? '-' }}</td>

                    <td>{{ $service->service_name }}</td>

                    <td>₹ {{ $service->price }}</td>

                    <td>{{ $service->status }}</td>

                    <td>

                        <a href="/admin/laptop-services/edit/{{ $service->id }}"
                        class="btn btn-sm btn-primary">
                            Edit
                        </a>

                        
                        <a href="/admin/laptop-services/delete/{{ $service->id }}"
                        class="btn btn-sm btn-danger"
                        onclick="return confirm('Delete this service?')">
                            Delete
                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center">

                        No Laptop Services Found

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>
</div>

@endsection