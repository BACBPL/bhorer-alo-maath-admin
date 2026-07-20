@extends('admin.layout')

@section('content')

<div class="card border-0 shadow-lg rounded-4">

    <div class="card-header bg-white border-0 p-4">
        <h2 class="fw-bold mb-1">Add Item</h2>
        <p class="text-muted mb-0">
            Create a new item
        </p>
    </div>

    <div class="card-body p-4">

        <form action="/admin/items/store" method="POST">

            @csrf

            <div class="row">

                <!-- Category -->
                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Category
                    </label>

                    <select name="category_id"
                            id="category_id"
                            class="form-select"
                            required>

                        <option value="">Select Category</option>

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}">
                                {{ $category->category_name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- Item Name -->
                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Item Name
                    </label>

                    <input type="text"
                           name="item_name"
                           class="form-control"
                           placeholder="Enter Item Name"
                           required>

                </div>

                <!-- Status -->
                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select name="status"
                            class="form-select">

                        <option value="Active">
                            Active
                        </option>

                        <option value="Inactive">
                            Inactive
                        </option>

                    </select>

                </div>

            </div>

            <div class="mt-4">

                <button class="btn btn-primary px-4">
                    Save Item
                </button>

                <a href="/admin/items"
                   class="btn btn-secondary px-4">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection