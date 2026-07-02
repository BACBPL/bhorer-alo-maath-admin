@extends('admin.layout')

@section('content')

<div class="container-fluid py-4">

    <div class="card border-0 shadow-lg rounded-4">

        <!-- Header -->

        <div class="card-header border-0 text-white py-4 rounded-top-4"
            style="background:linear-gradient(135deg,#0d6efd,#4f8dfd);">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h2 class="fw-bold mb-1">
                        Edit Engineer
                    </h2>

                    <p class="mb-0 opacity-75">
                        Update Engineer Information
                    </p>

                </div>

                <a href="{{ url('/admin/providers') }}"
                    class="btn btn-light rounded-pill px-4">

                    ← Back

                </a>

            </div>

        </div>

        <div class="card-body">

<form action="{{ url('/admin/providers/update/'.$provider->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

<div class="row g-4">

    <!-- Branch -->

    <div class="col-md-6">

        <label class="form-label fw-semibold">
            Branch ID
        </label>

        <input
            type="number"
            name="branch_id"
            class="form-control form-control-lg rounded-3"
            value="{{ old('branch_id',$provider->branch_id) }}"
            required>

    </div>

    <!-- Engineer Code -->

    <div class="col-md-6">

        <label class="form-label fw-semibold">

            Engineer Code

        </label>

        <input
            type="text"
            class="form-control form-control-lg rounded-3"
            value="{{ $provider->engineer_code }}"
            readonly>

    </div>

    <!-- Name -->

    <div class="col-md-6">

        <label class="form-label fw-semibold">

            Engineer Name

        </label>

        <input
            type="text"
            name="name"
            class="form-control form-control-lg rounded-3"
            value="{{ old('name',$provider->name) }}"
            required>

    </div>

    <!-- Email -->

    <div class="col-md-6">

        <label class="form-label fw-semibold">

            Email

        </label>

        <input
            type="email"
            name="email"
            class="form-control form-control-lg rounded-3"
            value="{{ old('email',$provider->email) }}"
            required>

    </div>

    <!-- Mobile -->

    <div class="col-md-6">

        <label class="form-label fw-semibold">

            Mobile

        </label>

        <input
            type="text"
            name="mobile"
            class="form-control form-control-lg rounded-3"
            value="{{ old('mobile',$provider->mobile) }}"
            required>

    </div>

    <!-- Password -->

    <div class="col-md-6">

        <label class="form-label fw-semibold">

            Password

        </label>

        <input
            type="text"
            name="password"
            class="form-control form-control-lg rounded-3"
            value="{{ old('password',$provider->password) }}">

    </div>

    <!-- Age -->

    <div class="col-md-4">

        <label class="form-label fw-semibold">

            Age

        </label>

        <input
            type="number"
            name="age"
            class="form-control form-control-lg rounded-3"
            value="{{ old('age',$provider->age) }}">

    </div>

    <!-- Current Pincode -->

    <div class="col-md-4">

        <label class="form-label fw-semibold">

            Current Pincode

        </label>

        <input
            type="text"
            name="current_pincode"
            class="form-control form-control-lg rounded-3"
            value="{{ old('current_pincode',$provider->current_pincode) }}">

    </div>

    <!-- State -->

    <div class="col-md-4">

        <label class="form-label fw-semibold">

            State

        </label>

        <select
            name="state"
            class="form-select form-select-lg rounded-3">

            @foreach($states as $state)

                <option
                    value="{{ $state }}"
                    {{ $provider->state==$state ? 'selected' : '' }}>

                    {{ $state }}

                </option>

            @endforeach

        </select>

    </div>

    <!-- City -->

    <div class="col-md-6">

        <label class="form-label fw-semibold">

            City

        </label>

        <input
            type="text"
            name="city"
            class="form-control form-control-lg rounded-3"
            value="{{ old('city',$provider->city) }}">

    </div>

    <!-- Experience -->

    <div class="col-md-6">

        <label class="form-label fw-semibold">

            Experience

        </label>

        <input
            type="text"
            name="experience"
            class="form-control form-control-lg rounded-3"
            value="{{ old('experience',$provider->experience) }}">

    </div>

    <!-- Engineer Type -->

    <div class="col-md-6">

        <label class="form-label fw-semibold">

            Engineer Type

        </label>

        <select
            name="provider_type"
            class="form-select form-select-lg rounded-3">

            <option value="Internal"
                {{ $provider->provider_type=='Internal'?'selected':'' }}>

                Internal

            </option>

            <option value="External"
                {{ $provider->provider_type=='External'?'selected':'' }}>

                External

            </option>

        </select>

    </div>

    <!-- Service Radius -->

    <div class="col-md-6">

        <label class="form-label fw-semibold">

            Service Radius (KM)

        </label>

        <input
            type="number"
            name="service_radius"
            class="form-control form-control-lg rounded-3"
            value="{{ old('service_radius',$provider->service_radius) }}">

    </div>

    <!-- Address -->

    <div class="col-12">

        <label class="form-label fw-semibold">

            Address

        </label>

        <textarea
            name="address"
            rows="4"
            class="form-control rounded-3">{{ old('address',$provider->address) }}</textarea>

    </div>

        <!-- ================= Skills ================= -->

    <div class="col-12">

        <hr class="my-4">

        <h4 class="fw-bold text-primary mb-4">

            Skills

        </h4>

    </div>

    <div class="col-12">

        <label class="form-label fw-semibold">

            Select Skills

        </label>

        <select
            name="skills[]"
            class="form-control multi-skills"
            multiple>

            @foreach($skills as $skill)

                <option
                    value="{{ $skill->id }}"
                    {{ $provider->skills->contains('id', $skill->id) ? 'selected' : '' }}>

                    {{ $skill->skill_name }}

                </option>

            @endforeach

        </select>

    </div>

    <!-- ================= Laptop Services ================= -->

    <div class="col-12">

        <hr class="my-4">

        <h4 class="fw-bold text-primary mb-4">

            Laptop Services

        </h4>

    </div>

    @php
        $assignedLaptopServices = $provider->laptopServices
            ? $provider->laptopServices->pluck('id')->toArray()
            : [];
    @endphp

    @foreach($laptopServices as $service)

    <div class="col-md-6">

        <div class="card border service-card">

            <div class="card-body">

                <div class="form-check">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="laptop_services[]"
                        value="{{ $service->id }}"
                        id="service{{ $service->id }}"

                        {{ in_array($service->id,$assignedLaptopServices) ? 'checked' : '' }}>

                    <label
                        class="form-check-label w-100"
                        for="service{{ $service->id }}">

                        <h6 class="mb-1">

                            {{ $service->service_name }}

                        </h6>

                        <small class="text-muted d-block">

                            {{ $service->laptopServiceCategory->category_name ?? '' }}

                        </small>

                        @if($service->laptopBrand)

                        <small class="d-block">

                            Brand :
                            {{ $service->laptopBrand->brand_name }}

                        </small>

                        @endif

                        @if($service->laptopModel)

                        <small class="d-block">

                            Model :
                            {{ $service->laptopModel->model_name }}

                        </small>

                        @endif

                        <strong class="text-success">

                            ₹{{ number_format($service->price,2) }}

                        </strong>

                    </label>

                </div>

            </div>

        </div>

    </div>

    @endforeach


    <!-- ================= Documents ================= -->

    <div class="col-12">

        <hr class="my-4">

        <h4 class="fw-bold text-primary">

            Documents

        </h4>

    </div>

    <!-- Profile -->

    <div class="col-md-6">

        <label class="form-label">

            Profile Photo

        </label>

        <input
            type="file"
            name="profile_photo"
            class="form-control">

        @if($provider->profile_photo)

            <img
                src="{{ asset('uploads/providers/'.$provider->profile_photo) }}"
                class="img-thumbnail mt-2"
                width="120">

        @endif

    </div>

    <!-- Aadhaar -->

    <div class="col-md-6">

        <label class="form-label">

            Aadhaar Number

        </label>

        <input
            type="text"
            name="aadhaar_number"
            class="form-control"
            value="{{ old('aadhaar_number',$provider->aadhaar_number) }}">

    </div>

    <div class="col-md-6">

        <label class="form-label">

            Aadhaar Card

        </label>

        <input
            type="file"
            name="aadhaar_card"
            class="form-control">

    </div>

    <!-- PAN -->

    <div class="col-md-6">

        <label class="form-label">

            PAN Number

        </label>

        <input
            type="text"
            name="pan_number"
            class="form-control"
            value="{{ old('pan_number',$provider->pan_number) }}">

    </div>

    <div class="col-md-6">

        <label class="form-label">

            PAN Card

        </label>

        <input
            type="file"
            name="pan_card"
            class="form-control">

    </div>

    <!-- Driving -->

    <div class="col-md-6">

        <label class="form-label">

            Driving License Number

        </label>

        <input
            type="text"
            name="driving_license_number"
            class="form-control"
            value="{{ old('driving_license_number',$provider->driving_license_number) }}">

    </div>

    <div class="col-md-6">

        <label class="form-label">

            Driving License

        </label>

        <input
            type="file"
            name="driving_license"
            class="form-control">

    </div>

    <!-- Bank -->

    <div class="col-md-6">

        <label class="form-label">

            Bank Name

        </label>

        <input
            type="text"
            name="bank_name"
            class="form-control"
            value="{{ old('bank_name',$provider->bank_name) }}">

    </div>

    <div class="col-md-6">

        <label class="form-label">

            Account Holder Name

        </label>

        <input
            type="text"
            name="account_holder_name"
            class="form-control"
            value="{{ old('account_holder_name',$provider->account_holder_name) }}">

    </div>

    <div class="col-md-6">

        <label class="form-label">

            Account Number

        </label>

        <input
            type="text"
            name="account_number"
            class="form-control"
            value="{{ old('account_number',$provider->account_number) }}">

    </div>

    <div class="col-md-6">

        <label class="form-label">

            IFSC Code

        </label>

        <input
            type="text"
            name="ifsc_code"
            class="form-control"
            value="{{ old('ifsc_code',$provider->ifsc_code) }}">

    </div>

    <div class="col-md-6">

        <label class="form-label">

            Bank Document

        </label>

        <input
            type="file"
            name="bank_document"
            class="form-control">

    </div>

        <!-- ================= Status ================= -->

    <div class="col-md-6">

        <label class="form-label fw-semibold">
            Status
        </label>

        <select
            name="status"
            class="form-select form-select-lg rounded-3">

            <option
                value="Active"
                {{ $provider->status=='Active' ? 'selected' : '' }}>

                Active

            </option>

            <option
                value="Inactive"
                {{ $provider->status=='Inactive' ? 'selected' : '' }}>

                Inactive

            </option>

        </select>

    </div>

</div>

<hr class="my-5">

<div class="d-flex justify-content-between">

    <a href="{{ url('/admin/providers') }}"
       class="btn btn-outline-secondary px-5 rounded-pill">

        Cancel

    </a>

    <button
        type="submit"
        class="btn btn-primary px-5 rounded-pill">

        Update Engineer

    </button>

</div>

</form>

</div>

</div>

<style>

.form-control,
.form-select{

    min-height:52px;

}

.form-label{

    font-weight:600;

}

.card{

    border-radius:20px;

}

.service-card{

    transition:.25s ease;

    cursor:pointer;

}

.service-card:hover{

    transform:translateY(-3px);

    border-color:#0d6efd;

    box-shadow:0 10px 25px rgba(13,110,253,.15);

}

.service-card .card-body{

    padding:18px;

}

.form-check-input{

    width:20px;

    height:20px;

}

.select2-container{

    width:100%!important;

}

.select2-container--default .select2-selection--multiple{

    border-radius:10px;

    min-height:52px;

    border:1px solid #ced4da;

    padding:6px;

}

</style>

<script>

$(document).ready(function(){

    $('.multi-skills').select2({

        placeholder:'Select Skills',

        allowClear:true,

        width:'100%'

    });

});

</script>

@endsection