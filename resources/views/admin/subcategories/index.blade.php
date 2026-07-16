@extends('admin.layout')

@section('content')

<div class="card border-0 shadow-lg rounded-4">

    <div class="card-header bg-white border-0 p-4">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h2 class="fw-bold mb-1">Sub Categories</h2>
                <p class="text-muted mb-0">
                    Manage all sub categories
                </p>
            </div>

            <a href="/admin/subcategories/create"
               class="btn btn-primary px-4 py-2 rounded-3">
                Add Sub Category
            </a>

        </div>

    </div>

    <div class="card-body p-4">

        @if(session('success'))

            <div class="alert alert-success rounded-3">
                {{ session('success') }}
            </div>

        @endif

        <!-- Search & Filter -->
        <form method="GET" action="/admin/subcategories" class="mb-4">

            <div class="row g-3">

                <div class="col-md-6">
                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search Sub Category..."
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-4">
                    <select
                        name="category_id"
                        class="form-select"
                        onchange="this.form.submit()">

                        <option value="">All Categories</option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>

                                {{ $category->category_name }}

                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="col-md-2 d-grid">
                    <button class="btn btn-primary">
                        Search
                    </button>
                </div>

            </div>

        </form>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr class="table-light">
                        <th>ID</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Status</th>
                        <th width="180">Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($subCategories as $subCategory)

                    <tr>

                        <td>
                            <strong>{{ $loop->iteration }}</strong>
                        </td>

                        <td>
                            <strong>
                                {{ $subCategory->category->category_name ?? '-' }}
                            </strong>
                        </td>

                        <td>
                            <strong>
                                {{ $subCategory->sub_category_name }}
                            </strong>
                        </td>

                        <td>

                            @if($subCategory->status == 'Active')

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

                            <a href="/admin/subcategories/edit/{{ $subCategory->id }}"
                               class="btn btn-warning btn-sm rounded-3">
                                Edit
                            </a>

                            <a href="/admin/subcategories/delete/{{ $subCategory->id }}"
                               class="btn btn-danger btn-sm rounded-3"
                               onclick="return confirm('Are you sure?')">
                                Delete
                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="5" class="text-center py-4">
                            No Sub Categories Found.
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection