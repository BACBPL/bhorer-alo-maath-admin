@extends('admin.layout')

@section('content')

<div class="container-fluid">

    <div class="page-card p-4">

        <h2 class="page-title">Edit Laptop Service</h2>

        <p class="page-subtitle mb-4">
            Update Laptop Service Details
        </p>

        <form action="/admin/laptop-services/update/{{ $service->id }}"
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

                        @foreach($laptopServiceCategories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ $service->laptop_service_category_id == $category->id ? 'selected' : '' }}>

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
                        value="{{ $service->service_name }}"
                        required>

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Description
                </label>

                <textarea
                    name="description"
                    class="form-control premium-textarea"
                    rows="4">{{ $service->description }}</textarea>

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
                        value="{{ $service->price }}"
                        required>

                </div>

                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Image
                    </label>

                    <input
                        type="file"
                        name="image"
                        class="form-control premium-input">

                    @if($service->image)

                        <img src="{{ asset($service->image) }}"
                             width="80"
                             class="mt-2 rounded">

                    @endif

                </div>

                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-control premium-input">

                        <option value="Active"
                            {{ $service->status=='Active' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="Inactive"
                            {{ $service->status=='Inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>

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
                    {{ $service->is_featured ? 'checked' : '' }}>

                <label
                    class="form-check-label"
                    for="featured">

                    Featured Service

                </label>

            </div>

            <button
                class="btn btn-premium"
                type="submit">

                Update Laptop Service

            </button>

        </form>

    </div>

</div>

@endsection