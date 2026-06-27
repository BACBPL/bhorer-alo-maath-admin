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
    opacity:.85;
}

.form-body{
    padding:35px;
}

.form-label{
    font-weight:600;
    color:#334155;
    margin-bottom:10px;
}

.premium-select{

    height:56px;

    border-radius:14px;

    border:1px solid #dbe4ee;

    transition:.3s;

    box-shadow:none;

}

.premium-select:focus{

    border-color:#2563eb;

    box-shadow:0 0 0 .2rem rgba(37,99,235,.15);

}

.premium-multi{

    min-height:240px;

    border-radius:16px;

    border:1px solid #dbe4ee;

    padding:15px;

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

.update-btn{

    background:linear-gradient(135deg,#2563eb,#1d4ed8);

    color:#fff;

    border:none;

    padding:14px 34px;

    border-radius:14px;

    font-weight:600;

    transition:.3s;

    box-shadow:0 12px 30px rgba(37,99,235,.25);

}

.update-btn:hover{

    color:#fff;

    transform:translateY(-2px);

}

.cancel-btn{

    margin-left:10px;

    padding:14px 34px;

    border-radius:14px;

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

    margin-bottom:18px;

}

.summary-item{

    color:#64748b;

    margin-bottom:10px;

}

</style>

<div class="assign-card">

<div class="assign-header">

<h2>

Edit Engineer Service

</h2>

<p>

Update assigned services for the selected engineer.

</p>

</div>

<div class="form-body">

<form

action="{{ url('/admin/provider-services/update/'.$providerService->id) }}"

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

                @foreach($providers as $provider)

                    <option
                        value="{{ $provider->id }}"
                        {{ $provider->id == $providerService->provider_id ? 'selected' : '' }}
                    >

                        {{ $provider->name }}
                        ({{ $provider->provider_type }})

                    </option>

                @endforeach

            </select>

        </div>

        <!-- Services -->

        <div class="mb-4">

            <label class="form-label">

                Assigned Services

            </label>

            <div class="premium-multi">

                @foreach($services as $service)

                    <div class="service-box">

                        <div class="form-check">

                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="service{{ $service->id }}"
                                name="service_ids[]"
                                value="{{ $service->id }}"

                                {{ in_array($service->id,$selectedServices) ? 'checked' : '' }}

                            >

                            <label
                                class="form-check-label w-100"
                                for="service{{ $service->id }}"
                            >

                                <strong>

                                    {{ $service->service_name }}

                                </strong>

                                <br>

                                <small class="text-muted">

                                    ₹{{ number_format($service->price,2) }}

                                </small>

                            </label>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

<div class="d-flex align-items-center mt-4">

    <button
        type="submit"
        class="update-btn"
    >

        <i class="fa fa-save me-2"></i>

        Update Services

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

        function updateCard(){

            let card = box.closest(".service-box");

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

<style>

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.page-title{
    font-size:34px;
    font-weight:700;
    color:#111827;
}

.page-subtitle{
    color:#6b7280;
    font-size:15px;
}

.premium-card{
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 15px 45px rgba(0,0,0,.08);
}

.card-header-premium{
    background:linear-gradient(135deg,#0f172a,#1e293b);
    color:#fff;
    padding:24px 30px;
}

.card-header-premium h4{
    margin:0;
    font-size:24px;
    font-weight:700;
}

.card-header-premium p{
    margin-top:5px;
    opacity:.85;
}

.premium-body{
    padding:35px;
}

.info-card{
    background:#f8fafc;
    border-radius:16px;
    padding:20px;
    border:1px solid #e5e7eb;
    margin-bottom:25px;
}

.info-title{
    font-size:14px;
    color:#6b7280;
}

.info-value{
    font-size:20px;
    font-weight:700;
    color:#111827;
}

.service-box{
    border:2px solid #e5e7eb;
    border-radius:18px;
    padding:20px;
    cursor:pointer;
    transition:.35s;
    height:100%;
}

.service-box:hover{
    transform:translateY(-6px);
    box-shadow:0 15px 35px rgba(37,99,235,.15);
}

.service-title{
    font-size:17px;
    font-weight:700;
    color:#1e293b;
}

.service-price{
    margin-top:8px;
    color:#2563eb;
    font-size:20px;
    font-weight:700;
}

.service-desc{
    margin-top:10px;
    color:#64748b;
    font-size:14px;
}

.update-btn{
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
    color:#fff;
    border:none;
    padding:13px 32px;
    border-radius:12px;
    font-weight:700;
    transition:.3s;
    box-shadow:0 12px 30px rgba(37,99,235,.25);
}

.update-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 18px 35px rgba(37,99,235,.35);
}

.cancel-btn{
    margin-left:12px;
    border-radius:12px;
    padding:13px 26px;
}

.form-check-input{
    width:22px;
    height:22px;
}

.form-check-input:checked{
    background-color:#2563eb;
    border-color:#2563eb;
}

</style>

<!-- Responsive Design -->
<style>

@media (max-width:991px){

    .premium-body{
        padding:25px;
    }

    .page-header{
        flex-direction:column;
        align-items:flex-start;
        gap:15px;
    }

    .page-title{
        font-size:28px;
    }

}

@media (max-width:768px){

    .premium-body{
        padding:20px;
    }

    .info-card{
        margin-bottom:18px;
    }

    .service-box{
        margin-bottom:15px;
    }

    .update-btn,
    .cancel-btn{
        width:100%;
        margin:0;
        margin-top:12px;
    }

}

</style>

@endsection