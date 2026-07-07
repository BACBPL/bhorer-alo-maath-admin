@extends('admin.layout')

@section('content')

<div class="premium-card">

```
<div class="premium-header">
    <h2> Add Banner</h2>
</div>

<div class="card-body p-4">

    <form
        action="/admin/banners/store"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        <div class="mb-4">
            <label class="form-label">
                Banner Name
            </label>

            <input
                type="text"
                name="name"
                class="form-control premium-input"
                placeholder="Enter banner name"
                required
            >
        </div>

        <div class="mb-4">
            <label class="form-label">
                Location
            </label>

            <input
                type="text"
                name="location"
                class="form-control premium-input"
                placeholder="e.g. right-banner, offers_and_discounts"
                required
            >
        </div>

        <div class="mb-4">
            <label class="form-label">
                Banner Type
            </label>

            <select
                name="type"
                class="form-select premium-input"
                required
            >
                <option value="hero_banner">
                    Hero Banner
                </option>

                <option value="offer_banner">
                    Offer Banner
                </option>

                <option value="new_noteworthy_banner">
                   Service Banner
                </option>

                <option value="most_booked_banner">
                    Most Booked Banner
                </option>
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label">
                Banner Image
            </label>

            <input
                type="file"
                name="image"
                class="form-control premium-input"
                accept="image/*"
            >

            <div class="preview-box" id="previewBox">
                <img id="previewImage">
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label">
                Status
            </label>

            <select
                name="status"
                class="form-select premium-input"
            >
                <option value="Active">
                    Active
                </option>

                <option value="Inactive">
                    Inactive
                </option>
            </select>
        </div>

        <button
            type="submit"
            class="btn-save"
        >
            Save Banner
        </button>

    </form>

</div>
```

</div>

<style>

body{
    background:#f4f7fb;
}

.premium-card{
    background:#fff;
    border-radius:24px;
    overflow:hidden;
    box-shadow:0 12px 40px rgba(0,0,0,.08);
}

.premium-header{
    background:linear-gradient(
        135deg,
        #2563eb,
        #1d4ed8
    );
    padding:30px 40px;
    color:white;
}

.premium-header h2{
    margin:0;
    font-size:34px;
    font-weight:700;
}

.premium-header p{
    margin-top:8px;
    opacity:.9;
    margin-bottom:0;
}

.card-body{
    padding:40px !important;
}

.form-label{
    font-weight:600;
    color:#111827;
    margin-bottom:8px;
}

.premium-input{
    height:52px;
    border-radius:14px;
    border:1px solid #dbe2ea;
    transition:.3s;
}

.premium-input:focus{
    border-color:#2563eb;
    box-shadow:
    0 0 0 4px rgba(37,99,235,.15);
}

input[type="file"]{
    padding:12px;
}

.btn-save{
    background:#2563eb;
    border:none;
    color:white;
    padding:12px 30px;
    border-radius:12px;
    font-weight:600;
    transition:.3s;
}

.btn-save:hover{
    background:#1d4ed8;
    transform:translateY(-2px);
}

.preview-box{
    display:none;
    margin-top:15px;
}

.preview-box img{
    width:220px;
    border-radius:16px;
    box-shadow:
    0 10px 25px rgba(0,0,0,.12);
}

</style>

<script>

document.addEventListener('DOMContentLoaded', function(){

    const imageInput =
        document.querySelector('input[name="image"]');

    if(imageInput){

        imageInput.addEventListener('change', function(e){

            const file = e.target.files[0];

            if(file){

                document.getElementById('previewBox')
                    .style.display = 'block';

                document.getElementById('previewImage')
                    .src = URL.createObjectURL(file);

            }

        });

    }

});

</script>

@endsection
