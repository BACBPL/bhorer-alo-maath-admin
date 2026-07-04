@extends('admin.layout')

@section('content')

<div class="page-card p-4">

    <h2 class="page-title">
        Edit Laptop Model
    </h2>

    <p class="page-subtitle mb-4">
        Update Laptop Model
    </p>

    <form action="/admin/laptop-models/update/{{ $model->id }}"
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

                    <option
                        value="{{ $category->id }}"
                        {{ $model->laptop_service_category_id == $category->id ? 'selected' : '' }}>

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

                    <option
                        value="{{ $brand->id }}"
                        {{ $model->laptop_brand_id == $brand->id ? 'selected' : '' }}>

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
                value="{{ $model->model_name }}"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Description
            </label>

            <textarea
                name="description"
                rows="4"
                class="form-control premium-textarea">{{ $model->description }}</textarea>

        </div>

        <div class="mb-4">

            <label class="form-label">
                Status
            </label>

            <select
                name="status"
                class="form-control premium-input">

                <option
                    value="Active"
                    {{ $model->status == 'Active' ? 'selected' : '' }}>
                    Active
                </option>

                <option
                    value="Inactive"
                    {{ $model->status == 'Inactive' ? 'selected' : '' }}>
                    Inactive
                </option>

            </select>

        </div>

        <button
            class="btn btn-premium">

            Update Model

        </button>

        <a href="/admin/laptop-models"
           class="btn btn-secondary">

            Cancel

        </a>

    </form>

</div>

@endsection