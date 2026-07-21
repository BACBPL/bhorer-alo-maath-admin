@extends('admin.layout')

@section('content')

<div class="premium-card">

    <div class="premium-header">
    <h2 class="mb-2">
     Edit Service
    </h2>

    <p>
        Update service information professionally
    </p>
</div>

    <div class="card-body p-4">

        <form action="/admin/services/update/{{ $service->id }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="col-md-6 mb-4">

                <label class="form-label fw-semibold">
                    Category
                </label>

                <select
                    name="category_id"
                    id="category_id"
                    class="form-select premium-input">

                    <option value="">Select Category</option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ $service->category_id == $category->id ? 'selected' : '' }}>

                            {{ $category->category_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-6 mb-4">

                <label class="form-label fw-semibold">
                    Sub Category
                </label>

                <select
                    name="sub_category_id"
                    id="sub_category_id"
                    class="form-select premium-input">

                    <option value="">Select Sub Category</option>

                    @foreach($subCategories as $subCategory)

                        <option
                            value="{{ $subCategory->id }}"
                            data-category="{{ $subCategory->category_id }}"
                            {{ $service->sub_category_id == $subCategory->id ? 'selected' : '' }}>

                            {{ $subCategory->sub_category_name }}

                        </option>

                    @endforeach

                </select>

            </div>
            
            <div class="col-md-6 mb-4">

                <label class="form-label fw-semibold">
                    Item
                </label>

                <select
                    name="item_id"
                    id="item_id"
                    class="form-select premium-input">

                    <option value="">Select Item</option>

                    @foreach($items as $item)

                        <option
                            value="{{ $item->id }}"
                            data-subcategory="{{ $item->sub_category_id }}"
                            {{ $service->item_id == $item->id ? 'selected' : '' }}>

                            {{ $item->item_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    Service Type
                </label>

                <select
                    name="service_type"
                    class="form-select premium-input"
                    required
                >
                    <option value="">Select Service Type</option>

                    <option value="Rent"
                        {{ $service->service_type == 'Rent' ? 'selected' : '' }}>
                        Rent
                    </option>

                    <option value="Repair"
                        {{ $service->service_type == 'Repair' ? 'selected' : '' }}>
                        Repair
                    </option>

                    <option value="AMC"
                        {{ $service->service_type == 'AMC' ? 'selected' : '' }}>
                        AMC
                    </option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="form-control premium-input"
                >{{ $service->description }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    Charges
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="price"
                    class="form-control premium-input"
                    value="{{ $service->price }}"
                >
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    Status
                </label>

                <select
                    name="status"
                    class="form-select premium-input"
                >
                    <option
                        value="Active"
                        {{ $service->status == 'Active' ? 'selected' : '' }}
                    >
                        Active
                    </option>

                    <option
                        value="Inactive"
                        {{ $service->status == 'Inactive' ? 'selected' : '' }}
                    >
                        Inactive
                    </option>

                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    Featured Service
                </label>

                <select name="is_featured" class="form-select premium-input">
                    <option value="0"
                        {{ $service->is_featured == 0 ? 'selected' : '' }}>
                        No
                    </option>

                    <option value="1"
                        {{ $service->is_featured == 1 ? 'selected' : '' }}>
                        Yes
                    </option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    Most Booked Service
                </label>

                <select name="is_most_booked" class="form-select premium-input">
                    <option value="0"
                        {{ $service->is_most_booked == 0 ? 'selected' : '' }}>
                        No
                    </option>

                    <option value="1"
                        {{ $service->is_most_booked == 1 ? 'selected' : '' }}>
                        Yes
                    </option>
                </select>
            </div>

            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Service Image
                </label>

                <input
                    type="file"
                    name="image"
                    class="form-control premium-input"
                >

                @if($service->image)

                <div class="mt-3">
                    <img
                        src="{{ asset('uploads/services/' . $service->image) }}"
                        width="120"
                        class="rounded shadow-sm border"
                    >
                </div>

                @endif

            </div>

            <div class="d-flex gap-2">

                <button
                    type="submit"
                    class="btn btn-primary px-4 py-2"
                >
                    Update Service
                </button>

                <a
                    href="/admin/services"
                    class="btn btn-light border px-4 py-2"
                >
                    Back
                </a>

            </div>

        </form>

    </div>

</div>

<style>
        .premium-card{
    background:#fff;
    border-radius:24px;
    overflow:hidden;
    box-shadow:
    0 10px 40px rgba(0,0,0,.08);
}

.premium-header{
    padding:35px;
    background:linear-gradient(
        135deg,
        #2563eb,
        #1e40af
    );
    color:white;
}

.premium-header h2{
    font-size:34px;
    font-weight:700;
}

.premium-header p{
    margin:0;
    opacity:.9;
}

.card-body{
    padding:40px !important;
}

.form-label{
    font-weight:600;
    margin-bottom:8px;
    color:#111827;
}

.premium-input{
    height:52px;
    border-radius:14px;
    border:1px solid #dbe2ea;
    transition:.3s;
}

textarea.premium-input{
    min-height:130px;
}

.premium-input:focus{
    border-color:#2563eb;
    box-shadow:
    0 0 0 4px rgba(37,99,235,.15);
}

.preview-image{
    width:160px;
    border-radius:16px;
    box-shadow:
    0 10px 25px rgba(0,0,0,.1);
}

.btn-update{
    background:#2563eb;
    color:white;
    border:none;
    border-radius:12px;
    padding:12px 28px;
    font-weight:600;
}

.btn-update:hover{
    background:#1d4ed8;
}

.btn-back{
    border-radius:12px;
    padding:12px 28px;
}

.section-divider{
    height:1px;
    background:#e5e7eb;
    margin:25px 0;
}
</style>

@endsection

