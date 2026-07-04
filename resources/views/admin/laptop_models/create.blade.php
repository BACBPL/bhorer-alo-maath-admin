@extends('admin.layout')

@section('content')

<div class="page-card p-4">

    <h2 class="page-title">
        Add Laptop Model
    </h2>

    <p class="page-subtitle mb-4">
        Create New Laptop Model
    </p>

    <form action="/admin/laptop-models/store"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Laptop Service Category
            </label>

            <select
                name="laptop_service_category_id"
                class="form-control premium-input"
                required>

                <option value="">
                    Select Category
                </option>

                @foreach($categories as $category)

                    <option value="{{ $category->id }}">
                        {{ $category->category_name }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Laptop Brand
            </label>

            <select
                name="laptop_brand_id"
                class="form-control premium-input"
                required>

                <option value="">
                    Select Brand
                </option>

                @foreach($brands as $brand)

                    <option value="{{ $brand->id }}">
                        {{ $brand->brand_name }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Model Name
            </label>

            <input
                type="text"
                name="model_name"
                class="form-control premium-input"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Description
            </label>

            <textarea
                name="description"
                rows="4"
                class="form-control premium-textarea"></textarea>

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

        <button
            class="btn btn-premium">

            Save Model

        </button>

    </form>

</div>

@endsection
