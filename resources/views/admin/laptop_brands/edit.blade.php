@extends('admin.layout')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">
            <h4>Edit Laptop Brand</h4>
        </div>

        <div class="card-body">

            <form action="{{ url('/admin/laptop-brands/update/'.$brand->id) }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label>Brand Name</label>

                    <input
                        type="text"
                        name="brand_name"
                        class="form-control"
                        value="{{ $brand->brand_name }}"
                        required>

                </div>

                <div class="mb-3">

                    <label>Description</label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="4">{{ $brand->description }}</textarea>

                </div>

                <div class="mb-3">

                    <label>Status</label>

                    <select
                        name="status"
                        class="form-control">

                        <option value="Active"
                            {{ $brand->status=='Active' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="Inactive"
                            {{ $brand->status=='Inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                </div>

                <button class="btn btn-primary">
                    Update Brand
                </button>

                <a href="{{ url('/admin/laptop-brands') }}"
                   class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection