@extends('admin.layout')

@section('content')

<style>

.assign-card{
    background:#fff;
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 15px 45px rgba(0,0,0,.08);
}

.assign-header{
    background:linear-gradient(135deg,#0f172a,#1e293b);
    color:#fff;
    padding:30px;
}

.assign-header h2{
    margin:0;
    font-size:32px;
    font-weight:700;
}

.assign-header p{
    margin-top:8px;
    opacity:.8;
}

.form-body{
    padding:35px;
}

.form-label{
    font-weight:600;
    color:#334155;
    margin-bottom:10px;
}

.premium-input,
.premium-select{
    height:56px;
    border-radius:14px;
    border:1px solid #dbe4ee;
    transition:.3s;
    box-shadow:none;
}

.premium-input:focus,
.premium-select:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 .2rem rgba(37,99,235,.15);
}

.premium-multi{
    min-height:220px;
    border-radius:16px;
    border:1px solid #dbe4ee;
    padding:15px;
}

.save-btn{
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
    color:#fff;
    border:none;
    padding:14px 35px;
    border-radius:14px;
    font-weight:600;
    transition:.3s;
    box-shadow:0 12px 30px rgba(37,99,235,.25);
}

.save-btn:hover{
    color:#fff;
    transform:translateY(-2px);
}

.cancel-btn{
    margin-left:10px;
    padding:14px 35px;
    border-radius:14px;
}

.service-box{
    border:1px solid #e5e7eb;
    border-radius:12px;
    padding:12px 16px;
    margin-bottom:12px;
    transition:.3s;
    cursor:pointer;
}

.service-box:hover{
    background:#eff6ff;
    border-color:#2563eb;
}

.summary-card{
    background:#f8fafc;
    border-radius:16px;
    padding:25px;
    border:1px solid #e5e7eb;
}

.summary-title{
    font-size:18px;
    font-weight:700;
    margin-bottom:15px;
}

.summary-item{
    color:#64748b;
    margin-bottom:10px
}

</style>

<div class="assign-card">
<div class="assign-header">

<h2>
Assign Service To Engineer
</h2>

<p>
Assign multiple services to a specific engineer.
</p>

</div>
<div class="form-body">

<form
action="{{ url('/admin/provider-services/store') }}"
method="POST"
>

@csrf

<div class="row">

    <div class="col-lg-8">

        <!-- Engineer -->

        <div class="mb-4">

            <label class="form-label">
                Engineer
            </label>

            <select
                name="provider_id"
                class="form-select premium-select"
                required
            >

                <option value="">
                    -- Select Engineer --
                </option>

                @foreach($providers as $provider)

                    <option value="{{ $provider->id }}">
                        {{ $provider->name }}
                        ({{ $provider->provider_type }})
                    </option>

                @endforeach

            </select>
        </div>

        <!-- Services -->

        <div class="mb-4">
            <label class="form-label">
                Select Services
            </label>

            <div class="premium-multi">

                @foreach($laptopServices as $service)

                <div class="service-box">

                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="service_ids[]"
                            value="{{ $service->id }}"
                            id="service{{ $service->id }}">

                        <label class="form-check-label w-100"
                            for="service{{ $service->id }}">

                            <h6 class="mb-1">
                                {{ $service->service_name }}
                            </h6>

                            <small class="text-muted d-block">

                        {{ $service->laptopServiceCategory->category_name ?? 'Laptop Service' }}

                    </small>

                    @if($service->laptopBrand)

                    <small class="text-secondary d-block">

                        Brand :
                        {{ $service->laptopBrand->brand_name }}

                    </small>

                    @endif

                    @if($service->laptopModel)

                    <small class="text-secondary d-block">

                        Model :
                        {{ $service->laptopModel->model_name }}

                    </small>

                    @endif

                    <span class="text-success fw-bold">

                        ₹{{ number_format($service->price,2) }}

                    </span>

                        </label>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="summary-card">

            <div class="summary-item">

                <strong>Total Engineers:</strong>

                {{ $providers->count() }}

            </div>

            <div class="summary-item">

                <strong>Total Services:</strong>

                {{ $laptopServices->count() }}

            </div>

        </div>

    </div>

</div>

<div class="d-flex align-items-center mt-4">

    <button
        type="submit"
        class="save-btn"
    >

        <i class="fa fa-save me-2"></i>

        Assign Service

    </button>

    <a
        href="{{ url('/admin/provider-services') }}"
        class="btn btn-light border cancel-btn"
    >

        <i class="fa fa-arrow-left me-2"></i>
        Cancel
    </a>

</div>

</form>

</div>

</div>

<script>

document.addEventListener("DOMContentLoaded", function(){

    const checkboxes = document.querySelectorAll(
        'input[name="service_ids[]"]'
    );

    checkboxes.forEach(function(box){

        box.addEventListener("change",function(){

            if(this.checked){

                this.closest(".service-box").style.background="#eff6ff";
                this.closest(".service-box").style.borderColor="#2563eb";

            }else{

                this.closest(".service-box").style.background="#fff";
                this.closest(".service-box").style.borderColor="#e5e7eb";

            }

        });

    });

});

</script>

<style>

.assign-card{
    animation:fadeIn .5s ease;
}

.service-box{
    transition:all .25s ease;
}

.service-box:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 25px rgba(37,99,235,.08);
}

.form-select:hover,
.form-control:hover{
    border-color:#2563eb;
}

.save-btn{
    transition:.3s;

}

.save-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 18px 35px rgba(37,99,235,.35);
}

.cancel-btn{
    transition:.3s;
}

.cancel-btn:hover{
    transform:translateY(-2px);
}

.summary-card{
    transition:.3s;
}

.summary-card:hover{
    transform:translateY(-3px);
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

.form-check-input{
    width:20px;
    height:20px;
    cursor:pointer;
}

.form-check-label{
    cursor:pointer;
    margin-left:8px;
}

::-webkit-scrollbar{
    width:8px;
}

::-webkit-scrollbar-thumb{
    background:#2563eb;
    border-radius:10px;
}

@keyframes fadeIn{

from{
opacity:0;
transform:translateY(20px);
}

to{
opacity:1;
transform:translateY(0);
}

}

@media(max-width:992px){

.assign-header h2{
font-size:28px;
}

.form-body{
padding:25px;
}

.summary-card{
margin-top:25px;
}

}

@media(max-width:768px){

.assign-header{
padding:22px;
}

.assign-header h2{
font-size:24px;
}

.save-btn,
.cancel-btn{
width:100%;
margin-bottom:12px;
}

.d-flex{

flex-direction:column;
align-items:stretch!important;
}

}

</style>

<script>

document.addEventListener("DOMContentLoaded", function(){

    const checkboxes = document.querySelectorAll(
        'input[name="service_ids[]"]'
    );

    checkboxes.forEach(function(box){

        function updateCard(){

            const card = box.closest(".service-box");

            if(box.checked){

                card.style.background = "#eff6ff";
                card.style.borderColor = "#2563eb";
                card.style.boxShadow = "0 10px 25px rgba(37,99,235,.12)";

            }else{

                card.style.background = "#ffffff";
                card.style.borderColor = "#e5e7eb";
                card.style.boxShadow = "none";

            }

        }

        updateCard();

        box.addEventListener("change", updateCard);

    });

});

</script>

@endsection