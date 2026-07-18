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

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">
                        Item Name <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="item_name"
                           class="form-control"
                           placeholder="Enter Item Name"
                           required>
                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Status <span class="text-danger">*</span>
                    </label>

                    <select name="status"
                            class="form-select"
                            required>

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

                <button type="submit"
                        class="btn btn-primary px-4">

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