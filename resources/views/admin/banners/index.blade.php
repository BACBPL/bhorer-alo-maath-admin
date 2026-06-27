@extends('admin.layout')

@section('content')

<div class="premium-banner-card">

    <div class="premium-header mb-4">

        <div>
            <h2 class="page-title">
             Banner Management
            </h2>

        </div>

        <a href="/admin/banners/create" class="btn-add-banner">
            Add Banner
        </a>

    </div>

    <div class="filter-card mb-4">

        <form method="GET">

            <div class="row">

                <div class="col-md-4">

                    <label class="filter-label">
                        Banner Location
                    </label>

                    <select
                        name="location"
                        onchange="this.form.submit()"
                        class="form-select premium-input"
                    >

                        <option value="">
                            Select Location
                        </option>

                        @foreach($locations as $location)

                            <option
                                value="{{ $location }}"
                                {{ request('location') == $location ? 'selected' : '' }}
                            >
                                {{ ucwords(str_replace('_',' ',$location)) }}
                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

        </form>

    </div>

    @if(request('location'))

    <div class="table-responsive">

        <table class="table premium-table align-middle">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th width="180">Action</th>
                </tr>

            </thead>

            <tbody>

                @forelse($banners as $index => $banner)

                <tr>

                    <td>
                        {{ $index + 1 }}
                    </td>

                    <td>
                        {{ $banner->name }}
                    </td>

                    <td>
                        {{ $banner->type }}
                    </td>

                    <td>
                        {{ $banner->location }}
                    </td>

                    <td>
                        <span class="status-active">
                            {{ $banner->status }}
                        </span>
                    </td>

                    <td>

                        <a
                            href="/admin/banners/edit/{{ $banner->id }}"
                            class="btn-edit"
                        >
                            Edit
                        </a>

                        <a
                            href="/admin/banners/delete/{{ $banner->id }}"
                            class="btn-delete"
                            onclick="return confirm('Delete this banner?')"
                        >
                            Delete
                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center py-4">
                        No banners found
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @endif

</div>

<style>

body{
    background:#f5f7fb;
}

.premium-banner-card{
    background:#fff;
    border-radius:24px;
    padding:30px;
    box-shadow:0 10px 35px rgba(0,0,0,.08);
}

.premium-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.page-title{
    font-size:34px;
    font-weight:700;
    margin-bottom:4px;
}

.page-subtitle{
    color:#6b7280;
    margin:0;
}

.btn-add-banner{
    background:#2563eb;
    color:#fff;
    text-decoration:none;
    padding:12px 22px;
    border-radius:12px;
    font-weight:600;
}

.btn-add-banner:hover{
    background:#1d4ed8;
    color:#fff;
}

.filter-card{
    background:#f8fafc;
    padding:20px;
    border-radius:16px;
}

.filter-label{
    font-weight:600;
    margin-bottom:8px;
    display:block;
}

.premium-input{
    height:50px;
    border-radius:12px;
}

.premium-table{
    border-radius:16px;
    overflow:hidden;
}

.premium-table thead{
    background:#111827;
    color:#fff;
}

.premium-table th{
    padding:16px;
}

.premium-table td{
    padding:18px 16px;
}

.premium-table tbody tr:hover{
    background:#f9fafb;
}

.status-active{
    background:#dcfce7;
    color:#166534;
    padding:6px 14px;
    border-radius:50px;
    font-size:13px;
    font-weight:600;
}

.btn-edit{
    background:#2563eb;
    color:#fff;
    padding:8px 14px;
    border-radius:10px;
    text-decoration:none;
    margin-right:5px;
}

.btn-delete{
    background:#ef4444;
    color:#fff;
    padding:8px 14px;
    border-radius:10px;
    text-decoration:none;
}

.btn-edit:hover,
.btn-delete:hover{
    color:#fff;
}

</style>

@endsection