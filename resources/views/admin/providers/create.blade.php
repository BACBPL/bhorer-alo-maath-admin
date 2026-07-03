@extends('admin.layout')

@section('content')

<div class="container-fluid py-4">

    <div class="card border-0 shadow-lg rounded-4">

        <!-- Header -->
        <div class="card-header border-0 text-white py-4 rounded-top-4"
            style="background: linear-gradient(135deg, #0d6efd, #4f8dfd);">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h2 class="fw-bold mb-1">
                        Add Engineer
                    </h2>

                    <p class="mb-0 opacity-75">
                        Create New Engineer Profile
                    </p>
                </div>

                <a href="{{ url('/admin/providers') }}"
                    class="btn btn-light rounded-pill px-4">
                    ← Back

                </a>

            </div>

        </div>

        <div class="card-body">

            <form action="{{ url('/admin/providers/store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <!-- ========================= -->
                <!-- Navigation Tabs -->
                <!-- ========================= -->

                <ul class="nav nav-pills mb-4">

                    <li class="nav-item me-2">

                        <button type="button"
                            class="nav-link active"
                            id="personal-tab"
                            onclick="showTab('personal')">

                            Personal Details

                        </button>

                    </li>
                    
                    <li class="nav-item me-2">

                        <button type="button"
                            class="nav-link"
                            id="location-tab"
                            onclick="showTab('location')">

                            Engineer Location

                        </button>

                    </li>

                    <li class="nav-item me-2">

                        <button type="button"
                            class="nav-link"
                            id="documents-tab"
                            onclick="showTab('documents')">

                            Important Documents

                        </button>

                    </li>

                </ul>

                <!-- ================================================= -->
                <!-- PERSONAL DETAILS TAB START -->
                <!-- ================================================= -->

                <div id="personal" class="tab-section">

                    <div class="row g-4">
                                                <!-- Branch ID -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Branch ID
                            </label>

                            <input
                                type="number"
                                name="branch_id"
                                class="form-control form-control-lg rounded-3"
                                placeholder="Enter Branch ID"
                                value="{{ old('branch_id') }}"
                                required>

                        </div>

                        <!-- Engineer Name -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Engineer Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control form-control-lg rounded-3"
                                placeholder="Enter Engineer Name"
                                value="{{ old('name') }}"
                                required>

                        </div>

                        <!-- Email -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control form-control-lg rounded-3"
                                placeholder="example@email.com"
                                value="{{ old('email') }}"
                                required>

                        </div>

                        <!-- Mobile -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Mobile Number
                            </label>

                            <input
                                type="text"
                                name="mobile"
                                class="form-control form-control-lg rounded-3"
                                placeholder="Enter Mobile Number"
                                value="{{ old('mobile') }}"
                                required>

                        </div>

                        <!-- Password -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control form-control-lg rounded-3"
                                placeholder="Enter Password"
                                required>

                        </div>

                        <!-- Age -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Age
                            </label>

                            <input
                                type="number"
                                name="age"
                                class="form-control form-control-lg rounded-3"
                                placeholder="Enter Age"
                                value="{{ old('age') }}">

                        </div>

                        <!-- Engineer Type -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Engineer Type
                            </label>

                            <select
                                name="provider_type"
                                class="form-select form-select-lg rounded-3">

                                <option value="">
                                    -- Select Engineer Type --
                                </option>

                                <option value="Internal">
                                    Internal
                                </option>

                                <option value="External">
                                    External
                                </option>

                            </select>

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
                                placeholder="Example: 5 Years"
                                value="{{ old('experience') }}">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select form-select-lg rounded-3">

                            <option value="Active" selected>
                                Active
                            </option>

                            <option value="Inactive">
                                Inactive
                            </option>

                        </select>

                    </div>

                    <!-- ============================================= -->
<!-- Laptop Services -->
<!-- ============================================= -->

<hr class="my-5">

<div class="col-12">

    <label class="form-label fw-semibold">
        Assign Services
    </label>

    <select
        name="laptop_services[]"
        class="form-control multi-laptop-services"
        multiple>

        @foreach($laptopServices as $service)
            <option value="{{ $service->id }}">
                {{ $service->service_name }}
            </option>
        @endforeach

    </select>

</div>

    <div class="alert alert-info mt-4">

        <strong>Note:</strong>

        All uploaded documents will be verified by the admin before engineer approval.

    </div>

                    <!-- Next Button -->

                    <div class="mt-5 text-end">

                        <button
                            type="button"
                            class="btn btn-primary px-5 rounded-pill"
                            onclick="showTab('location')">

                            Next →

                        </button>

                    </div>

                </div>

<!-- ================================================= -->
<!-- ENGINEER LOCATION TAB -->
<!-- ================================================= -->

<div id="location" class="tab-section" style="display:none;">

    <div class="row g-4">

    <!-- Current Pincode -->
        <div class="col-md-6">

            <label class="form-label fw-semibold">
                Current Pincode
            </label>

            <input
                type="text"
                name="current_pincode"
                class="form-control form-control-lg rounded-3"
                placeholder="Enter Current Pincode"
                value="{{ old('current_pincode') }}">

        </div>

    <div class="col-md-6 mb-3">

    <label class="form-label fw-semibold">
        State
    </label>

    <select
        name="state"
        class="form-control form-control-lg rounded-3"
        required>

        <option value="">Select State</option>

        @foreach($states as $state)
            <option value="{{ $state }}">
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
                placeholder="Enter City"
                value="{{ old('city') }}">

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
                placeholder="Example: 10"
                value="{{ old('service_radius') }}">

        </div>

        <!-- Full Address -->
        <div class="col-12">

            <label class="form-label fw-semibold">
                Complete Address
            </label>

            <textarea
                name="address"
                rows="5"
                class="form-control rounded-3"
                placeholder="Enter Complete Address">{{ old('address') }}</textarea>

        </div>

        <hr class="my-5">

    <h4 class="fw-bold mb-4 text-primary">
        Serviceable Area
    </h4>

    <!-- Serviceable State -->
    <div class="col-md-6">

        <label class="form-label fw-semibold">
            Serviceable State
        </label>

        <select
            id="serviceable_state"
            class="form-select form-select-lg rounded-3">

            <option value="">
                Select State
            </option>

            @foreach($states as $state)
                <option value="{{ $state }}">
                    {{ $state }}
                </option>
            @endforeach

        </select>

    </div>

    <!-- Serviceable Pincode -->
    <div class="col-md-6">

        <label class="form-label fw-semibold">
            Serviceable Pincodes
        </label>

        <select
            id="serviceable_pincodes"
            name="serviceable_pincodes[]"
            class="form-control multi-pincode"
            multiple>

        </select>

        <small class="text-muted">
            Search and select multiple pincodes.
        </small>

    </div>

    </div>

    
    <!-- Navigation Buttons -->

    <div class="d-flex justify-content-between mt-5">

        <button
            type="button"
            class="btn btn-outline-secondary rounded-pill px-5"
            onclick="showTab('personal')">

            ← Previous

        </button>

        <button
            type="button"
            class="btn btn-primary rounded-pill px-5"
            onclick="showTab('documents')">

            Next →

        </button>

    </div>

</div>

<!-- ================================================= -->
<!-- IMPORTANT DOCUMENTS TAB -->
<!-- ================================================= -->

<div id="documents" class="tab-section" style="display:none;">

    <div class="row g-4">

        <div class="col-12 mb-2">
            <h4 class="fw-bold text-primary">
                Upload Important Documents
            </h4>

            <p class="text-muted">
                Upload all required engineer documents. Supported formats:
                JPG, JPEG, PNG and PDF (Max: 2 MB each).
            </p>
        </div>

        <!-- Aadhaar Card -->

        <div class="col-md-6">

            <label class="form-label fw-semibold">
                Aadhaar Number <span class="text-danger">*</span>
            </label>

            <input
                type="text"
                name="aadhaar_number"
                class="form-control form-control-lg rounded-3"
                placeholder="XXXX XXXX XXXX">

        </div>

        <div class="col-md-6">

            <label class="form-label fw-semibold">
                Aadhaar Card <span class="text-danger">*</span>
            </label>

            <input
                type="file"
                name="aadhaar_card"
                class="form-control form-control-lg rounded-3"
                accept=".jpg,.jpeg,.png,.pdf">

        </div>

        <!-- PAN Card -->
         <div class="col-md-6">

            <label class="form-label fw-semibold">
                PAN Number <span class="text-danger">*</span>
            </label>

            <input
                type="text"
                name="pan_number"
                class="form-control form-control-lg rounded-3"
                placeholder="ABCDE1234F">

        </div>

        <div class="col-md-6">

            <label class="form-label fw-semibold">
                PAN Card <span class="text-danger">*</span>
            </label>

            <input
                type="file"
                name="pan_card"
                class="form-control form-control-lg rounded-3"
                accept=".jpg,.jpeg,.png,.pdf">

        </div>

        <!-- Driving License -->
         <div class="col-md-6">

            <label class="form-label fw-semibold">
                Driving License Number
            </label>

            <input
                type="text"
                name="driving_license_number"
                class="form-control form-control-lg rounded-3"
                placeholder="Enter DL Number">

        </div>

        <div class="col-md-6">

            <label class="form-label fw-semibold">
                Driving License
            </label>

            <input
                type="file"
                name="driving_license"
                class="form-control form-control-lg rounded-3"
                accept=".jpg,.jpeg,.png,.pdf">

        </div>

        <!-- Profile Photo -->
        <div class="col-md-6">

            <label class="form-label fw-semibold">
                Profile Photo <span class="text-danger">*</span>
            </label>

            <input
                type="file"
                name="profile_photo"
                class="form-control form-control-lg rounded-3"
                accept=".jpg,.jpeg,.png">

        </div>

        <!-- Bank Passbook / Cancelled Cheque -->

        <div class="col-md-6">

            <label class="form-label fw-semibold">
                Bank Account Number
            </label>

            <input
                type="text"
                name="account_number"
                class="form-control form-control-lg rounded-3">

        </div>

        <div class="col-md-6">

            <label class="form-label fw-semibold">
                IFSC Code
            </label>

            <input
                type="text"
                name="ifsc_code"
                class="form-control form-control-lg rounded-3">

        </div>

        <div class="col-md-6">

            <label class="form-label fw-semibold">
                Account Holder Name
            </label>

            <input
                type="text"
                name="account_holder_name"
                class="form-control form-control-lg rounded-3">

        </div>

        <div class="col-md-6">

            <label class="form-label fw-semibold">
                Bank Passbook / Cancelled Cheque
            </label>

            <input
                type="file"
                name="bank_document"
                class="form-control form-control-lg rounded-3"
                accept=".jpg,.jpeg,.png,.pdf">

        </div>

    </div>

    <!-- Navigation -->

    <div class="d-flex justify-content-between mt-5">

        <button
            type="button"
            class="btn btn-outline-secondary rounded-pill px-5"
            onclick="showTab('location')">

            ← Previous

        </button>

        <button
            type="submit"
            class="btn btn-success rounded-pill px-5">

            Save Engineer

        </button>

    </div>

</div>

<script>

    function showTab(tabName) {

        // Hide all tab sections
        document.querySelectorAll('.tab-section').forEach(function (tab) {
            tab.style.display = 'none';
        });

        // Remove active class from all tabs
        document.querySelectorAll('.nav-link').forEach(function (button) {
            button.classList.remove('active');
        });

        // Show selected tab
        document.getElementById(tabName).style.display = 'block';

        // Activate selected tab button
        document.getElementById(tabName + '-tab').classList.add('active');

    }

    $(document).ready(function () {

        // Show first tab by default
        showTab('personal');

        // Select2 Skills Dropdown
        $('.multi-skills').select2({

            placeholder: 'Select Skills',
            allowClear: true,
            width: '100%'

        });

        $('.multi-laptop-services').select2({

            placeholder: 'Select Laptop Services',
            allowClear: true,
            width: '100%'
        });

        // Current Pincode
$('#current_pincode').select2({
    placeholder: 'Search Current Pincode',
    width: '100%',
    ajax: {
        url: '/admin/pincode/search',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                search: params.term
            };
        },
        processResults: function (data) {
            return {
                results: $.map(data, function(item) {
                    return {
                        id: item.pincode,
                        text: item.pincode + ' - ' + item.branch_city
                    };
                })
            };
        },
        cache: true
    },
    minimumInputLength: 1
});

// Serviceable Pincodes
$('#serviceable_pincodes').select2({
    placeholder: 'Search Serviceable Pincodes',
    width: '100%',
    multiple: true,
    ajax: {
        url: '/admin/pincode/search',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                search: params.term
            };
        },
        processResults: function (data) {
            return {
                results: $.map(data, function(item) {
                    return {
                        id: item.pincode,
                        text: item.pincode + ' - ' + item.branch_city
                    };
                })
            };
        },
        cache: true
    },
    minimumInputLength: 1
});


    });

</script>

<style>

    /* ==========================================
       Wizard Navigation Tabs
    ========================================== */

    .nav-pills .nav-link {

        border-radius: 12px;

        padding: 12px 20px;

        font-weight: 600;

        color: #374151;

        background: #f1f5f9;

        transition: .3s;

        margin-right: 10px;

    }

    .nav-pills .nav-link:hover {

        background: #dbeafe;

    }

    .nav-pills .nav-link.active {

        background: #2563eb;

        color: #ffffff;

    }

    /* ==========================================
       Select2 Multiple Dropdown
    ========================================== */

    .select2-container {

        width: 100% !important;

    }

    .select2-container--default .select2-selection--multiple {

        min-height: 58px;

        border: 1px solid #ced4da;

        border-radius: 12px;

        padding: 8px;

    }

    .select2-container--default
    .select2-selection--multiple
    .select2-selection__choice {

        background: #2563eb !important;

        color: #ffffff !important;

        border: none !important;

        border-radius: 20px !important;

        padding: 6px 12px !important;

    }

    .select2-container--default
    .select2-selection--multiple
    .select2-selection__choice__remove {

        color: #ffffff !important;

        margin-right: 8px;

    }

    .service-card{
        transition:.25s ease;
        cursor:pointer;
    }

    .service-card:hover{
        border-color:#2563eb !important;
        box-shadow:0 8px 20px rgba(37,99,235,.15);
        transform:translateY(-2px);
    }

</style>

@endsection