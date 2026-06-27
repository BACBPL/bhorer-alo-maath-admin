@extends('admin.layout')

@section('content')

<div class="card border-0 shadow-lg rounded-4">

    <div class="card-header bg-white border-0 p-4">
        <h2 class="fw-bold mb-1">Add Category</h2>
        <p class="text-muted mb-0">
            Create a new service category
        </p>
    </div>

    <div class="card-body p-4">

        <form action="/admin/categories/store" method="POST">

            @csrf

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    Category Name
                </label>

                <input
                    type="text"
                    name="category_name"
                    class="form-control premium-input"
                    placeholder="Enter category name"
                    required
                >
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    Status
                </label>

                <select
                    name="status"
                    class="form-select premium-input"
                >
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>

            <div class="d-flex gap-2">

                <button
                    type="submit"
                    class="btn btn-primary px-4 py-2"
                >
                    Save Category
                </button>

                <a
                    href="/admin/categories"
                    class="btn btn-light border px-4 py-2"
                >
                    Back
                </a>

            </div>

        </form>

    </div>

</div>

@endsection