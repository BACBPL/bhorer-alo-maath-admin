@extends('admin.layout')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">
            <h4>Edit Laptop Service Category</h4>
        </div>

        <div class="card-body">

            <form action="{{ url('/admin/laptop-service-categories/update/'.$category->id) }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label>Category Name</label>

                    <select
                        name="category_name"
                        class="form-control"
                        required>

                        @foreach($categories as $cat)

                            <option
                                value="{{ $cat->category_name }}"
                                {{ $category->category_name == $cat->category_name ? 'selected' : '' }}>

                                {{ $cat->category_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label>Description</label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="4">{{ $category->description }}</textarea>

                </div>

                <div class="mb-3">

                    <label>Status</label>

                    <select
                        name="status"
                        class="form-control">

                        <option value="Active"
                            {{ $category->status=='Active' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="Inactive"
                            {{ $category->status=='Inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                </div>

                <button class="btn btn-primary">
                    Update Category
                </button>

                <a href="{{ url('/admin/laptop-service-categories') }}"
                   class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection