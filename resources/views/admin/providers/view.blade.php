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
                        Engineer Details
                    </h2>

                    <p class="mb-0 opacity-75">
                        View Complete Engineer Information
                    </p>

                </div>

                <span class="badge bg-light text-dark fs-6 px-3 py-2">

                    {{ $provider->engineer_code }}

                </span>

            </div>

        </div>

        <div class="card-body">

            <!-- ========================= -->
            <!-- PERSONAL DETAILS -->
            <!-- ========================= -->

            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header bg-primary text-white">

                    <h5 class="mb-0">
                        Personal Details
                    </h5>

                </div>

                <div class="card-body">

                    <div class="row g-4">

                        <div class="col-md-3 text-center">

                            @if($provider->profile_photo)

                                <img
                                    src="{{ asset('uploads/providers/'.$provider->profile_photo) }}"
                                    class="img-fluid rounded-circle border shadow"
                                    style="width:180px;height:180px;object-fit:cover;">

                            @else

                                <img
                                    src="{{ asset('images/no-image.png') }}"
                                    class="img-fluid rounded-circle border shadow"
                                    style="width:180px;height:180px;object-fit:cover;">

                            @endif

                        </div>

                        <div class="col-md-9">

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="fw-bold text-secondary">
                                        Engineer Code
                                    </label>

                                    <div class="form-control bg-light">

                                        {{ $provider->engineer_code }}

                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="fw-bold text-secondary">
                                        Branch ID
                                    </label>

                                    <div class="form-control bg-light">

                                        {{ $provider->branch_id }}

                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="fw-bold text-secondary">
                                        Engineer Name
                                    </label>

                                    <div class="form-control bg-light">

                                        {{ $provider->name }}

                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="fw-bold text-secondary">
                                        Email
                                    </label>

                                    <div class="form-control bg-light">

                                        {{ $provider->email }}

                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="fw-bold text-secondary">
                                        Mobile
                                    </label>

                                    <div class="form-control bg-light">

                                        {{ $provider->mobile }}

                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="fw-bold text-secondary">
                                        Age
                                    </label>

                                    <div class="form-control bg-light">

                                        {{ $provider->age }}

                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="fw-bold text-secondary">
                                        Engineer Type
                                    </label>

                                    <div class="form-control bg-light">

                                        {{ $provider->provider_type }}

                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="fw-bold text-secondary">
                                        Experience
                                    </label>

                                    <div class="form-control bg-light">

                                        {{ $provider->experience }}

                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="fw-bold text-secondary">
                                        Status
                                    </label>

                                    <div class="form-control bg-light">

                                        @if($provider->status=='Active')

                                            <span class="badge bg-success">
                                                Active
                                            </span>

                                        @else

                                            <span class="badge bg-danger">
                                                Inactive
                                            </span>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

                        <!-- ========================= -->
            <!-- LOCATION DETAILS -->
            <!-- ========================= -->

            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header bg-success text-white">

                    <h5 class="mb-0">
                        Location Details
                    </h5>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="fw-bold text-secondary">
                                Current Pincode
                            </label>

                            <div class="form-control bg-light">

                                {{ $provider->current_pincode }}

                            </div>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="fw-bold text-secondary">
                                State
                            </label>

                            <div class="form-control bg-light">

                                {{ $provider->state }}

                            </div>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="fw-bold text-secondary">
                                City
                            </label>

                            <div class="form-control bg-light">

                                {{ $provider->city }}

                            </div>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="fw-bold text-secondary">
                                Service Radius
                            </label>

                            <div class="form-control bg-light">

                                {{ $provider->service_radius }} KM

                            </div>

                        </div>

                        <div class="col-md-12 mb-3">

                            <label class="fw-bold text-secondary">
                                Complete Address
                            </label>

                            <div class="form-control bg-light"
                                 style="min-height:90px;">

                                {{ $provider->address }}

                            </div>

                        </div>

                        <div class="col-md-12">

                            <label class="fw-bold text-secondary">
                                Serviceable Pincodes
                            </label>

                            <div class="form-control bg-light"
                                 style="min-height:70px;">

                                @if($provider->serviceable_pincodes)

                                    @foreach(explode(',', $provider->serviceable_pincodes) as $pin)

                                        <span class="badge bg-primary m-1 p-2">

                                            {{ trim($pin) }}

                                        </span>

                                    @endforeach

                                @else

                                    <span class="text-muted">

                                        No Serviceable Pincodes

                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- ========================= -->
            <!-- ASSIGNED SERVICES -->
            <!-- ========================= -->

            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header bg-warning">

                    <h5 class="mb-0">
                        Assigned Services
                    </h5>

                </div>

                <div class="card-body">

                    @if($provider->laptopServices->count())

                        <div class="row">

                            @foreach($provider->laptopServices as $service)

                                <div class="col-md-4 mb-3">

                                    <div class="card border-success h-100">

                                        <div class="card-body text-center">

                                            <i class="fas fa-tools
                                                      text-success
                                                      fa-2x
                                                      mb-3"></i>

                                            <h6 class="fw-bold">

                                                {{ $service->service_name }}

                                            </h6>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="alert alert-warning mb-0">

                            No Services Assigned

                        </div>

                    @endif

                </div>

            </div>

                        <!-- ========================= -->
            <!-- DOCUMENTS -->
            <!-- ========================= -->

            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header bg-danger text-white">

                    <h5 class="mb-0">
                        Documents & Bank Details
                    </h5>

                </div>

                <div class="card-body">

                    <div class="row">

                        <!-- Aadhaar -->

                        <div class="col-md-6 mb-4">

                            <label class="fw-bold text-secondary">
                                Aadhaar Number
                            </label>

                            <div class="form-control bg-light">

                                {{ $provider->aadhaar_number }}

                            </div>

                        </div>

                        <div class="col-md-6 mb-4">

                            <label class="fw-bold text-secondary">
                                Aadhaar Card
                            </label>

                            <br>

                            @if($provider->aadhaar_card)

                            <span class="no-print">

                            <a href="{{ asset('uploads/providers/'.$provider->aadhaar_card) }}"
                            target="_blank"
                            class="btn btn-outline-primary">

                            View Aadhaar

                            </a>

                            </span>

                            @endif

                        </div>

                        <!-- PAN -->

                        <div class="col-md-6 mb-4">

                            <label class="fw-bold text-secondary">
                                PAN Number
                            </label>

                            <div class="form-control bg-light">

                                {{ $provider->pan_number }}

                            </div>

                        </div>

                        <div class="col-md-6 mb-4">

                            <label class="fw-bold text-secondary">
                                PAN Card
                            </label>

                            <br>

                            @if($provider->pan_card)

                                <a
                                    href="{{ asset('uploads/providers/'.$provider->pan_card) }}"
                                    target="_blank"
                                    class="btn btn-outline-primary">

                                    <i class="fas fa-eye"></i>

                                    View PAN

                                </a>

                            @else

                                <span class="text-danger">

                                    Not Uploaded

                                </span>

                            @endif

                        </div>

                        <!-- Driving Licence -->

                        <div class="col-md-6 mb-4">

                            <label class="fw-bold text-secondary">
                                Driving Licence Number
                            </label>

                            <div class="form-control bg-light">

                                {{ $provider->driving_license_number }}

                            </div>

                        </div>

                        <div class="col-md-6 mb-4">

                            <label class="fw-bold text-secondary">
                                Driving Licence
                            </label>

                            <br>

                            @if($provider->driving_license)

                                <a
                                    href="{{ asset('uploads/providers/'.$provider->driving_license) }}"
                                    target="_blank"
                                    class="btn btn-outline-primary">

                                    <i class="fas fa-eye"></i>

                                    View Licence

                                </a>

                            @else

                                <span class="text-danger">

                                    Not Uploaded

                                </span>

                            @endif

                        </div>

                        <hr class="my-4">

                        <!-- Bank Details -->

                        <div class="col-md-4 mb-3">

                            <label class="fw-bold text-secondary">
                                Account Holder
                            </label>

                            <div class="form-control bg-light">

                                {{ $provider->account_holder_name }}

                            </div>

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="fw-bold text-secondary">
                                Account Number
                            </label>

                            <div class="form-control bg-light">

                                {{ $provider->account_number }}

                            </div>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="fw-bold text-secondary">
                                IFSC Code
                            </label>

                            <div class="form-control bg-light">

                                {{ $provider->ifsc_code }}

                            </div>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="fw-bold text-secondary">
                                Bank Document
                            </label>

                            <br>

                            @if($provider->bank_document)

                                <a
                                    href="{{ asset('uploads/providers/'.$provider->bank_document) }}"
                                    target="_blank"
                                    class="btn btn-outline-success">

                                    <i class="fas fa-eye"></i>

                                    View Bank Document

                                </a>

                            @else

                                <span class="text-danger">

                                    Not Uploaded

                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

                        <!-- ========================= -->
            <!-- ACTION BUTTONS -->
            <!-- ========================= -->

            <div class="d-flex justify-content-between mt-5 no-print">
                <a href="{{ url('/admin/providers') }}"
                   class="btn btn-secondary btn-lg px-5">

                    <i class="fas fa-arrow-left me-2"></i>

                    Back

                </a>

                <button
                    type="button"
                    onclick="window.print()"
                    class="btn btn-primary btn-lg px-5">

                    <i class="fas fa-print me-2"></i>

                    Print

                </button>

            </div>

        </div>

    </div>

</div>

<style>

.card{

    border-radius:18px;

}

.card-header{

    font-weight:600;

}

.form-control{

    background:#f8f9fa !important;

    font-weight:500;

}

.badge{

    font-size:14px;

}

.btn{

    border-radius:10px;

}

img{

    border:4px solid #fff;

}

@media print{

    body{

        background:#fff !important;

    }

    .btn{

        display:none !important;

    }

    .navbar,
    .sidebar,
    .main-header,
    .page-header,
    footer{

        display:none !important;

    }

    .container-fluid{

        width:100% !important;

        margin:0;

        padding:0;

    }

    .card{

        border:none !important;

        box-shadow:none !important;

    }

    .card-header{

        color:#000 !important;

        background:#fff !important;

        border-bottom:2px solid #000;

    }

}

@media print {

body{
    background:#fff !important;
}

.sidebar,
.main-sidebar,
.navbar,
.main-header,
footer,
.btn,
.card-header,
.no-print{
    display:none !important;
}

.container-fluid,
.content-wrapper,
.card,
.card-body{
    margin:0 !important;
    padding:0 !important;
    width:100% !important;
    box-shadow:none !important;
    border:none !important;
    background:#fff !important;
}

.form-control{
    border:none !important;
    background:#fff !important;
    padding:0 !important;
    font-weight:bold;
    color:#000 !important;
}

.badge{
    border:1px solid #000;
    color:#000 !important;
    background:#fff !important;
}

a{
    color:#000 !important;
    text-decoration:none !important;
}

}

</style>

@endsection