@extends('admin.layout')

@section('content')

<div class="premium-card">

    <div class="card-header bg-white border-0 p-4">
        <h2 class="fw-bold mb-1">Add Service</h2>
        <p class="text-muted mb-0">
            Create a new service
        </p>
    </div>

    <div class="card-body p-4">

        <form action="/admin/services/store"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-semibold">Category</label>

                    <select name="category_id"
                            class="form-select premium-input"
                            required>

                        <option value="">Select Category</option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->category_name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-semibold">Sub Category</label>

                    <select name="sub_category_id"
                            class="form-select premium-input"
                            required>

                        <option value="">Select Sub Category</option>

                        @foreach($subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}">
                                {{ $subCategory->sub_category_name }}
                            </option>
                        @endforeach

                    </select>
                </div>

            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Service Type</label>

                <select name="service_type" class="form-select premium-input" required>
                    <option value="">Select Service Type</option>
                    <option value="Rent">Rent</option>
                    <option value="Repair">Repair</option>
                    <option value="AMC">AMC</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Description</label>

                <textarea name="description"
                          rows="5"
                          class="form-control premium-textarea"
                          placeholder="Enter service description"></textarea>
            </div>

            <div class="row">

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-semibold">Charges (₹)</label>

                    <input type="number"
                           name="price"
                           class="form-control premium-input"
                           placeholder="Enter charges"
                           required>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-semibold">Status</label>

                    <select name="status"
                            class="form-select premium-input">

                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>

                    </select>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label fw-semibold">
                        Featured Service
                    </label>

                    <select name="is_featured"
                            class="form-select premium-input">

                        <option value="0">No</option>
                        <option value="1">Yes</option>

                    </select>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label fw-semibold">
                        Most Booked Service
                    </label>

                    <select name="is_most_booked"
                            class="form-select premium-input">

                        <option value="0">No</option>
                        <option value="1">Yes</option>

                    </select>

                </div>

            </div>

            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Service Image
                </label>

                <input type="file"
                       name="image"
                       class="form-control premium-input">

            </div>

            <div class="d-flex gap-2 mt-4">

                <button type="submit"
                        class="btn btn-primary px-4 py-2 rounded-3">
                    Save Service
                </button>

                <a href="/admin/services"
                   class="btn btn-light border px-4 py-2 rounded-3">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection