@extends('admin.layout')

@section('content')

<div class="page-card p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h1 class="page-title">
                Laptop Models
            </h1>

            <p class="page-subtitle">
                Manage Laptop Models
            </p>

        </div>

        <a href="/admin/laptop-models/create"
           class="btn btn-premium">

            Add Model

        </a>

    </div>

    <table class="table">

        <thead>

        <tr>

            <th>ID</th>

            <th>Brand</th>

            <th>Model</th>

            <th>Description</th>

            <th>Status</th>

            <th>Action</th>

        </tr>

        </thead>

        <tbody>

        @forelse($models as $model)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $model->brand->brand_name }}</td>

            <td>{{ $model->model_name }}</td>

            <td>{{ $model->description }}</td>

            <td>{{ $model->status }}</td>

            <td>

                <a href="/admin/laptop-models/edit/{{ $model->id }}"
                class="btn btn-sm btn-primary">
                    Edit
                </a>
               
                <a href="/admin/laptop-models/delete/{{ $model->id }}"
                    class="btn btn-sm btn-danger"
                    onclick="return confirm('Delete this model?')">
                    Delete
                </a>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="6" class="text-center">

                No Laptop Models Found

            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection