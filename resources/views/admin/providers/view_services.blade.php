@extends('admin.layout')

@section('content')

<div class="container-fluid py-4">

    <div class="card">

        <div class="card-header">
            <h3>Engineer Services</h3>
        </div>

        <div class="card-body">

            <h5>
                Engineer Name :
                <strong>{{ $provider->name }}</strong>
            </h5>

            <hr>

            <h4>Laptop Services</h4>

            @if($provider->laptopServices && $provider->laptopServices->count())

                <ul>

                    @foreach($provider->laptopServices as $service)

                        <li>{{ $service->service_name }}</li>

                    @endforeach

                </ul>

            @else

                <p>No Laptop Services Assigned</p>

            @endif

        </div>

    </div>

</div>

@endsection