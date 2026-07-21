@extends('admin.layout')

@section('content')

<div class="card border-0 shadow-lg rounded-4">

    <div class="card-header bg-white border-0 p-4">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h2 class="fw-bold mb-1">Services</h2>
                <p class="text-muted mb-0">
                    Manage all services type
                </p>
            </div>

            <a href="/admin/services/create"
               class="btn btn-primary px-4 py-2 rounded-3">
                Add Type
            </a>

        </div>

    </div>

    <div class="card-body p-4">

        @if(session('success'))

            <div class="alert alert-success rounded-3">
                {{ session('success') }}
            </div>

        @endif


        <form action="/admin/services" method="GET" class="row mb-4">

            <div class="col-md-4">

                <input type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search Service Type..."
                    value="{{ request('search') }}">

            </div>

            <div class="col-md-3">

                <select name="category_id"
                        class="form-select">

                    <option value="">All Categories</option>

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}"
                            {{ request('category_id')==$category->id ? 'selected':'' }}>

                            {{ $category->category_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-3">

                <select name="status"
                        class="form-select">

                    <option value="">All Status</option>

                    <option value="Active"
                    {{ request('status')=='Active'?'selected':'' }}>
                        Active
                    </option>

                    <option value="Inactive"
                    {{ request('status')=='Inactive'?'selected':'' }}>
                        Inactive
                    </option>

                </select>

            </div>

            <div class="col-md-2">

                <button class="btn btn-primary w-100">
                    Search
                </button>

            </div>

        </form>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr class="table-light">

                        <th>SL.No</th>
                        <th>Category</th>
                        <th>Item</th>
                        <th>Sub Category</th>
                        <th>Service Type</th>
                        <th>Charges</th>
                        <th>Status</th>
                        <th width="180">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($services as $service)

                    <tr>

                        <td>
                            <strong>{{ $loop->iteration }}</strong>
                        </td>

                        <td class="fw-bold">
                            {{ $service->category->category_name ?? '-' }}
                        </td>

                        <td>{{ $service->item->item_name ?? '-' }}</td>

                        <td class="fw-bold">
                            {{ $service->subCategory->sub_category_name ?? '-' }}
                        </td>

                        <td class="fw-bold">
                            {{ $service->service_type }}
                        </td>

                        <td>
                            <span class="badge bg-info px-3 py-2">
                                ₹ {{ number_format($service->price) }}
                            </span>
                        </td>

                        <td>

                            @if($service->status == 'Active')

                                <span class="badge bg-success px-3 py-2">
                                    Active
                                </span>

                            @else

                                <span class="badge bg-danger px-3 py-2">
                                    Inactive
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="/admin/services/edit/{{ $service->id }}"
                               class="btn btn-warning btn-sm rounded-3">
                                Edit
                            </a>

                            <a href="/admin/services/delete/{{ $service->id }}"
                               class="btn btn-danger btn-sm rounded-3"
                               onclick="return confirm('Are you sure?')">
                                Delete
                            </a>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection