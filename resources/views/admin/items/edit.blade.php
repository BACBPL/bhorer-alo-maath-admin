@extends('admin.layout')

@section('content')

<div class="card border-0 shadow-lg rounded-4">

    <div class="card-header bg-white border-0 p-4">
        <h2 class="fw-bold mb-1">Edit Item</h2>
        <p class="text-muted mb-0">
            Update item details
        </p>
    </div>

    <div class="card-body p-4">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/admin/items/update/{{ $item->id }}" method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">Category</label>

                <select name="category_id" class="form-control" required>

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}"
                            {{ $item->category_id == $category->id ? 'selected' : '' }}>

                            {{ $category->category_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">Item Name</label>

                <input
                    type="text"
                    name="item_name"
                    class="form-control"
                    value="{{ $item->item_name }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">Status</label>

                <select name="status" class="form-control">

                    <option value="Active"
                        {{ $item->status=='Active' ? 'selected':'' }}>
                        Active
                    </option>

                    <option value="Inactive"
                        {{ $item->status=='Inactive' ? 'selected':'' }}>
                        Inactive
                    </option>

                </select>

            </div>

            <button type="submit" class="btn btn-primary">
                Update Item
            </button>

            <a href="/admin/items" class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>

@endsection