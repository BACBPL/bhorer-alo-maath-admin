@extends('admin.layout')

@section('content')

<style>

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}

.page-title{
    font-size:34px;
    font-weight:700;
    color:#1e293b;
}

.page-subtitle{
    color:#64748b;
    font-size:15px;
    margin-top:4px;
}

.assign-btn{
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
    color:#fff;
    padding:13px 28px;
    border-radius:14px;
    text-decoration:none;
    font-weight:600;
    box-shadow:0 12px 30px rgba(37,99,235,.25);
    transition:.35s;
}

.assign-btn:hover{
    color:#fff;
    transform:translateY(-3px);
    box-shadow:0 18px 40px rgba(37,99,235,.35);
}

.premium-card{
    background:#fff;
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 15px 45px rgba(0,0,0,.08);
}

.table-header{
    background:linear-gradient(135deg,#0f172a,#1e293b);
    padding:22px 30px;
    color:#fff;
}

.table-header h4{
    margin:0;
    font-weight:700;
}

.table{
    margin-bottom:0;
}

.table thead th{
    background:#f8fafc;
    border:none;
    padding:18px;
    font-size:15px;
    font-weight:700;
    color:#334155;
}

.table tbody td{
    padding:22px 18px;
    vertical-align:middle;
    border-top:1px solid #eef2f7;
}

.table tbody tr{
    transition:.3s;
}

.table tbody tr:hover{
    background:#f8fbff;
}

.serial-box{
    width:42px;
    height:42px;
    border-radius:12px;
    background:#2563eb;
    display:flex;
    justify-content:center;
    align-items:center;
    color:#fff;
    font-weight:700;
}

.engineer-box{
    display:flex;
    align-items:center;
    gap:15px;
}

.avatar{
    width:50px;
    height:50px;
    border-radius:50%;
    background:linear-gradient(135deg,#2563eb,#60a5fa);
    display:flex;
    justify-content:center;
    align-items:center;
    color:#fff;
    font-size:18px;
    font-weight:700;
}

.engineer-name{
    font-size:16px;
    font-weight:700;
    color:#1e293b;
}

.engineer-email{
    font-size:13px;
    color:#64748b;
    margin-top:2px;
}

.service-badge{
    display:inline-block;
    padding:8px 16px;
    margin:4px;
    border-radius:30px;
    background:#eff6ff;
    color:#2563eb;
    font-weight:600;
    font-size:13px;
}

.action-buttons{
    display:flex;
    gap:10px;
}

.edit-btn{
    background:#facc15;
    color:#000;
    padding:8px 18px;
    border-radius:10px;
    text-decoration:none;
    font-weight:600;
    transition:.3s;
}

.edit-btn:hover{
    background:#eab308;
    color:#000;
}

.delete-btn{
    background:#ef4444;
    color:#fff;
    padding:8px 18px;
    border-radius:10px;
    text-decoration:none;
    transition:.3s;
}

.delete-btn:hover{
    background:#dc2626;
    color:#fff;
}

.empty-box{
    text-align:center;
    padding:80px 20px;
}

.empty-box img{
    width:120px;
    margin-bottom:20px;
}

.empty-box h3{
    color:#334155;
    margin-bottom:10px;
}

.empty-box p{
    color:#64748b;
}

@media(max-width:768px){

.page-header{
    flex-direction:column;
    align-items:flex-start;
    gap:18px;
}

.table{
    min-width:900px;
}

}

</style>

<div class="page-header">

    <div>

        <div class="page-title">
            Engineer Services
        </div>

        <div class="page-subtitle">
            Manage all assigned services for engineers
        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-md-4">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body">

                <small class="text-muted">
                    Total Engineers
                </small>

                <h2 class="fw-bold mt-2">

                    {{ $providers->count() }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body">

                <small class="text-muted">
                    Total Assigned Services
                </small>

                <h2 class="fw-bold text-primary mt-2">

                    {{
                        $providers->sum(function($provider){
                            return $provider->laptopServices->count();
                        })
                    }}

                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body">

                <small class="text-muted">
                    Average Services / Engineer
                </small>

                <h2 class="fw-bold text-success mt-2">

                    {{
                        $providers->count()
                        ? round(
                            $providers->sum(function($provider){
                                return $provider->laptopServices->count();
                            }) / $providers->count(),
                            1
                        )
                        : 0
                    }}

                </h2>

            </div>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-6">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body">

                <h5 class="fw-bold mb-3">
                    Quick Search
                </h5>

                <input
                    type="text"
                    id="searchInput"
                    class="form-control form-control-lg rounded-3"
                    placeholder="Search engineer or service..."
                >

            </div>

        </div>

    </div>

</div>

<div class="card border-0 shadow-sm rounded-4 mt-4">

    <div class="card-header bg-primary text-white">

        <h5 class="mb-0">

            Assign Laptop Services

        </h5>

    </div>

    <div class="card-body">

        <form action="{{ url('/admin/provider-services/store') }}" method="POST">

            @csrf

            <div class="row">

                <div class="col-md-4">

                    <label class="form-label">

                        Engineer

                    </label>

                    <select
                        name="provider_id"
                        class="form-select"
                        required>

                        <option value="">

                            Select Engineer

                        </option>

                        @foreach($providers as $provider)

                            <option value="{{ $provider->id }}">

                                {{ $provider->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-6">

                    <label class="form-label">

                        Laptop Services

                    </label>

                    <select
                        class="form-select multi-laptop-services"
                        name="service_ids[]"
                        multiple
                        required>

                        @foreach($laptopServices as $service)

                            <option value="{{ $service->id }}">

                                {{ $service->service_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-2 d-flex align-items-end">

                    <button
                        class="btn btn-primary w-100"
                        type="submit">

                        Assign

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<div class="premium-card">

<div class="table-header">

<h4>
Assigned Engineer Services
</h4>

</div>

<div class="table-responsive">

<table class="table">

<thead>

<tr>

<th width="90">
S.No
</th>

<th>
Engineer
</th>

<th>
Assigned Services
</th>

<th width="190">
Action
</th>

</tr>

</thead>

<tbody>

@if($providers->count())

@foreach($providers as $provider)

<tr>

    <td>

        <div class="serial-box">
            {{ $loop->iteration }}
        </div>

    </td>

    <td>

        <div class="engineer-box">

            <div class="avatar">

                {{ strtoupper(substr($provider->name,0,1)) }}

            </div>

            <div>

                <div class="engineer-name">

                    {{ $provider->name }}

                </div>

                <div class="engineer-email">

                    {{ $provider->email }}

                </div>

            </div>

        </div>

    </td>

    <td>

        @if($provider->laptopServices->count())

            @foreach($provider->laptopServices as $service)

                <span class="service-badge">

                    {{ $service->service_name }}

                </span>

            @endforeach

        @else

            <span class="text-danger">

                No Service Assigned

            </span>

        @endif

    </td>

    <td>

        <div class="action-buttons">

            <a
                href="{{ url('/admin/providers/view/'.$provider->id) }}"
                class="edit-btn">

                <i class="fa fa-eye me-1"></i>

                View

            </a>

        </div>

    </td>

</tr>

@endforeach

@else

<tr>

    <td colspan="4">

        <div class="empty-box">

            <img
                src="https://cdn-icons-png.flaticon.com/512/6134/6134065.png"
                alt="No Data"
            >

            <h3>

                No Engineer Services Found

            </h3>

            <p>

                No services have been assigned to any engineer yet.

            </p>

        </div>

    </td>

</tr>

@endif

</tbody>

        </table>

    </div>

</div>


<script>

document.addEventListener("DOMContentLoaded", function () {

    const searchInput = document.getElementById("searchInput");

    searchInput.addEventListener("keyup", function () {

        let value = this.value.toLowerCase();

        document.querySelectorAll("tbody tr").forEach(function(row){

            if(row.innerText.toLowerCase().includes(value))
            {
                row.style.display="";
            }
            else
            {
                row.style.display="none";
            }

        });

    });

    $('.multi-laptop-services').select2({

        placeholder: 'Select Laptop Services',

        allowClear: true,

        width: '100%'

    });

});

</script>

<style>

.table tbody tr{
    transition:all .25s ease;
}

.table tbody tr:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 25px rgba(0,0,0,.05);
}

.service-badge{
    transition:.3s;
}

.service-badge:hover{
    background:#2563eb;
    color:#fff;
    transform:scale(1.05);
}

.serial-box{
    transition:.3s;
}

.serial-box:hover{
    transform:rotate(-8deg) scale(1.08);
}

.edit-btn,
.delete-btn,
.assign-btn{
    transition:.25s;
}

.edit-btn:hover,
.delete-btn:hover,
.assign-btn:hover{
    transform:translateY(-2px);
}

.card{
    transition:.3s;
}

.card:hover{
    transform:translateY(-3px);
    box-shadow:0 18px 40px rgba(0,0,0,.08);
}

.page-title{
    letter-spacing:.5px;
}

.table-responsive{
    border-radius:20px;
}

</style>

@endsection