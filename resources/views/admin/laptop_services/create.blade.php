@extends('admin.layout')

@section('content')

<div class="container-fluid">

    <div class="page-card p-4">

        <h2 class="page-title">Add Laptop Service</h2>

        <p class="page-subtitle mb-4">
            Add Rent, AMC or Repair Service
        </p>

        <form action="/admin/laptop-services/store"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Service Type
                    </label>

                    <select
                        name="laptop_service_category_id"
                        class="form-control premium-input"
                        required>

                        <option value="">
                            Select Category
                        </option>

                        @foreach($laptopServiceCategories as $category)

                            <option value="{{ $category->id }}">

                                {{ $category->category_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Service Name
                    </label>

                    <input
                        type="text"
                        name="service_name"
                        class="form-control premium-input"
                        required
                    >

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Description
                </label>

                <textarea
                    name="description"
                    class="form-control premium-textarea"
                    rows="4"
                ></textarea>

            </div>

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Price
                    </label>

                    <input
                        type="number"
                        name="price"
                        class="form-control premium-input"
                        required
                    >

                </div>

                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Image
                    </label>

                    <input
                        type="file"
                        name="image"
                        class="form-control premium-input"
                    >

                </div>

                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-control premium-input">

                        <option>Active</option>

                        <option>Inactive</option>

                    </select>

                </div>

            </div>

            <div class="form-check mb-4">

                <input
                    class="form-check-input"
                    type="checkbox"
                    id="featured"
                    name="is_featured"
                    value="1"
                >

                <label
                    class="form-check-label"
                    for="featured"
                >

                    Featured Service

                </label>

            </div>

            <button
                class="btn btn-premium"
                type="submit"
            >

                Save Laptop Service

            </button>

        </form>

    </div>

</div>

@endsection