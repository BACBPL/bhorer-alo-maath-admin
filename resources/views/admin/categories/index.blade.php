@extends('admin.layout')

@section('content')

<div class="card border-0 shadow-lg rounded-4">

    <div class="card-header bg-white border-0 p-4">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h2 class="fw-bold mb-1">Categories</h2>
                <p class="text-muted mb-0">
                    Manage all categories
                </p>
            </div>

                </p>
            <a href="/admin/categories/create" class="btn btn-primary px-4 py-2 rounded-3">
                Add Category
            </a>
            

        </div>

    </div>

    <div class="card-body p-4">

        @if(session('success'))

            <div class="alert alert-success rounded-3">
                {{ session('success') }}
            </div>

        @endif

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr class="table-light">
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th width="180">Action</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($categories as $category)

                    <tr>

                        <td>
                            <strong>{{ $loop->iteration }}</strong>
                        </td>

                        <td>
                            <strong>{{ $category->category_name }}</strong>
                        </td>

                        <td>

                            @if($category->status == 'Active')

                                <span class="badge bg-success px-3 py-2">
                                    Active
                                </span>

                            @else

                                <span class="badge bg-danger px-3 py-2">
                                    Inactive
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="/admin/categories/edit/{{ $category->id }}"
                               class="btn btn-warning btn-sm rounded-3">
                                Edit
                            </a>

                            <a href="/admin/categories/delete/{{ $category->id }}"
                               class="btn btn-danger btn-sm rounded-3"
                               onclick="return confirm('Are you sure?')">
                                Delete
                            </a>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection