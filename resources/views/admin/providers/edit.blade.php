@extends('admin.layout')

@section('content')

<div class="container-fluid py-4">

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header border-0 text-white py-4 rounded-top-4"
             style="background:linear-gradient(135deg,#0d6efd,#4f8dfd);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold mb-1">Edit Engineer</h2>
                    <p class="mb-0 opacity-75">Update engineer information.</p>
                </div>

                <a href="{{ url('/admin/providers') }}" class="btn btn-light rounded-pill px-4">
                    ← Back
                </a>
            </div>
        </div>

        <div class="card-body p-4">

            @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/admin/providers/update/'.$provider->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                <div class="col-md-6 mb-4">

<label class="form-label fw-semibold">
Branch ID
</label>

<input
type="number"
name="branch_id"
class="form-control premium-input"
value="{{ $provider->branch_id }}">

</div>

<div class="col-md-6 mb-4">

<label class="form-label fw-semibold">
Engineer Code
</label>

<input
type="text"
name="engineer_code"
class="form-control premium-input"
value="{{ $provider->engineer_code }}">

</div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Engineer Name</label>
                        <input type="text" name="name" class="form-control form-control-lg rounded-3"
                               value="{{ old('name',$provider->name) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email Address</label>
                        <input type="email" name="email" class="form-control form-control-lg rounded-3"
                               value="{{ old('email',$provider->email) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Mobile Number</label>
                        <input type="text" name="mobile" class="form-control form-control-lg rounded-3"
                               value="{{ old('mobile',$provider->mobile) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="text" name="password" class="form-control form-control-lg rounded-3"
                               value="{{ old('password',$provider->password) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Age</label>
                        <input type="number" name="age" class="form-control form-control-lg rounded-3"
                               value="{{ old('age',$provider->age) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">City</label>
                        <input type="text" name="city" class="form-control form-control-lg rounded-3"
                               value="{{ old('city',$provider->city) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Pincode</label>
                        <input type="text" name="pincode" class="form-control form-control-lg rounded-3"
                               value="{{ old('pincode',$provider->pincode) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Engineer Type</label>
                        <select name="provider_type" class="form-select form-select-lg rounded-3">
                            <option value="Internal" {{ $provider->provider_type=='Internal'?'selected':'' }}>Internal</option>
                            <option value="External" {{ $provider->provider_type=='External'?'selected':'' }}>External</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Experience</label>
                        <input type="text" name="experience" class="form-control form-control-lg rounded-3"
                               value="{{ old('experience',$provider->experience) }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Address</label>
                        <textarea name="address" rows="4" class="form-control rounded-3">{{ old('address',$provider->address) }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select form-select-lg rounded-3">
                            <option value="Active" {{ $provider->status=='Active'?'selected':'' }}>Active</option>
                            <option value="Inactive" {{ $provider->status=='Inactive'?'selected':'' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Profile Image</label>

                        @if(!empty($provider->logo_url))
                            <div class="mb-2">
                                <img src="{{ $provider->logo_url }}" class="img-thumbnail rounded-3" width="120">
                            </div>
                        @endif

                        <input type="file" name="image" class="form-control form-control-lg rounded-3">
                    </div>

                </div>

                <hr class="my-5">

                <div class="d-flex gap-3">
                    <button class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm">
                        Update Engineer
                    </button>

                    <a href="{{ url('/admin/providers') }}"
                       class="btn btn-outline-secondary btn-lg rounded-pill px-5">
                        Cancel
                    </a>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection
