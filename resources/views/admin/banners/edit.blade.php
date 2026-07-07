@extends('admin.layout')

@section('content')

<div class="container-fluid py-4">

<div class="card border-0 shadow-lg rounded-4">
    
    <div class="card-header bg-white border-0 py-4 px-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold mb-1">Edit Banner</h2>
                <p class="text-muted mb-0">
                    Update banner information and image
                </p>
            </div>

            <a href="{{ url('/admin/banners') }}"
               class="btn btn-outline-secondary rounded-pill px-4">
                Back
            </a>
        </div>
    </div>

    <div class="card-body p-4">

        <form action="{{ url('/admin/banners/update/'.$banner->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-semibold">
                        Banner Name
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control form-control-lg rounded-3"
                           value="{{ old('name', $banner->name) }}"
                           required>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-semibold">
                        Location
                    </label>

                    <input type="text"
                           name="location"
                           class="form-control form-control-lg rounded-3"
                           value="{{ $banner->location }}"
                           required>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-semibold">
                        Banner Type
                    </label>

                    <select name="type"
                            class="form-select form-select-lg rounded-3">

                        <option value="hero_banner"
                            {{ $banner->type == 'hero_banner' ? 'selected' : '' }}>
                            Hero Banner
                        </option>

                        <option value="offer_banner"
                            {{ $banner->type == 'offer_banner' ? 'selected' : '' }}>
                            Offer Banner
                        </option>

                        <option value="service_banner">Service Banner</option>

                        <option value="most_booked_banner"
                            {{ $banner->type == 'most_booked_banner' ? 'selected' : '' }}>
                            Most Booked Banner
                        </option>

                    </select>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select name="status"
                            class="form-select form-select-lg rounded-3">

                        <option value="Active"
                            {{ $banner->status == 'Active' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="Inactive"
                            {{ $banner->status == 'Inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>
                </div>

                <div class="mb-3">
                    <label>Redirect URL</label>

                    <input
                        type="text"
                        name="redirect_url"
                        class="form-control"
                        value="{{ $banner->redirect_url }}"
                        placeholder="/hardware"
                    >
                </div>

                <div class="col-12 mb-4">

                    <label class="form-label fw-semibold">
                        Current Banner Image
                    </label>

                    @if($banner->file_url)

                    <div class="mb-3">
                        <img src="{{ $banner->file_url }}"
                             class="img-fluid rounded-4 shadow-sm border"
                             style="
                                max-width: 500px;
                                max-height: 250px;
                                object-fit: cover;
                             ">
                    </div>

                    @endif

                    <input type="file"
                           name="image"
                           class="form-control form-control-lg rounded-3">

                    <small class="text-muted">
                        Upload a new image only if you want to replace the current banner.
                    </small>

                </div>

            </div>

            <hr class="my-4">

            <div class="d-flex gap-3">

                <button type="submit"
                        class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm">
                    Update Banner
                </button>

                <a href="{{ url('/admin/banners') }}"
                   class="btn btn-light border btn-lg px-5 rounded-pill">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</div>

@endsection
