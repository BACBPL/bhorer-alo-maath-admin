@extends('admin.layout')

@section('content')

<div class="page-card p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h1 class="page-title">
                Laptop Brands
            </h1>

            <p class="page-subtitle">
                Manage Laptop Brands
            </p>

        </div>

        <a href="/admin/laptop-brands/create" class="btn btn-premium">
            Add Brand
        </a>

    </div>

    <table class="table">

        <thead>

            <tr>

                <th>ID</th>

                <th>Brand Name</th>

                <th>Description</th>

                <th>Status</th>

                <th>Action</th>

            </tr>

        </thead>

        <tbody>

        @forelse($brands as $brand)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $brand->brand_name }}</td>

                <td>{{ $brand->description }}</td>

                <td>{{ $brand->status }}</td>

                <td>

                    <a href="{{ url('/admin/laptop-brands/edit/'.$brand->id) }}"
                    class="btn btn-sm btn-primary">
                        Edit
                    </a>

                    <a href="{{ url('/admin/laptop-brands/delete/'.$brand->id) }}"
                    class="btn btn-sm btn-danger"
                    onclick="return confirm('Delete this brand?')">
                        Delete
                    </a>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5" class="text-center">

                    No Brands Found

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection