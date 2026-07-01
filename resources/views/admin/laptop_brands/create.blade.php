@extends('admin.layout')

@section('content')

<div class="page-card p-4">

    <h2 class="page-title">Add Laptop Brand</h2>

    <p class="page-subtitle mb-4">
        Create New Laptop Brand
    </p>

    <form action="/admin/laptop-brands/store"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Brand Name
            </label>

            <input
                type="text"
                name="brand_name"
                class="form-control premium-input"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Description
            </label>

            <textarea
                name="description"
                class="form-control premium-textarea"
                rows="4"></textarea>

        </div>

        <div class="mb-4">

            <label class="form-label">
                Status
            </label>

            <select
                name="status"
                class="form-control premium-input">

                <option value="Active">
                    Active
                </option>

                <option value="Inactive">
                    Inactive
                </option>

            </select>

        </div>

        <button class="btn btn-premium">

            Save Brand

        </button>

    </form>

</div>

@endsection