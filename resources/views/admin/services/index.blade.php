@extends('admin.layout')

@section('content')

<div class="card border-0 shadow-lg rounded-4">

    <div class="card-header bg-white border-0 p-4">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h2 class="fw-bold mb-1">Services</h2>
                <p class="text-muted mb-0">
                    Manage all services
                </p>
            </div>

            <a href="/admin/services/create"
               class="btn btn-primary px-4 py-2 rounded-3">
                Add Service
            </a>

        </div>

    </div>

    <div class="card-body p-4">

        @if(session('success'))

            <div class="alert alert-success rounded-3">
                {{ session('success') }}
            </div>

        @endif

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr class="table-light">

                        <th>SL.No</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Service Name</th>
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

                        <td class="fw-bold">
                            {{ $service->subCategory->sub_category_name ?? '-' }}
                        </td>

                        <td class="fw-bold">
                            {{ $service->service_name }}
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