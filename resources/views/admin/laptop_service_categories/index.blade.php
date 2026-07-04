@extends('admin.layout')

@section('content')

<div class="container-fluid">

    <div class="page-card p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="page-title">Laptop Service Categories</h2>
                <p class="page-subtitle">
                    Manage Laptop Service Categories
                </p>
            </div>

            <a href="/admin/laptop-service-categories/create"
                class="btn btn-premium">
                Add Category
            </a>

        </div>

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

            @forelse($categories as $category)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $category->category_name }}</td>

                    <td>{{ $category->description }}</td>

                    <td>{{ $category->status }}</td>

                    <td>

                        <a href="{{ url('/admin/laptop-service-categories/edit/'.$category->id) }}"
                        class="btn btn-sm btn-primary">
                            Edit
                        </a>

                        <a href="{{ url('/admin/laptop-service-categories/delete/'.$category->id) }}"
                        class="btn btn-sm btn-danger"
                        onclick="return confirm('Delete this category?')">
                            Delete
                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">
                        No Categories Found
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection