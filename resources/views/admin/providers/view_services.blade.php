@extends('admin.layout')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h3>

                Engineer Services

            </h3>

        </div>

        <div class="card-body">

            <h4>{{ $provider->name }}</h4>

            <p>

                <strong>Engineer Code :</strong>

                {{ $provider->engineer_code }}

            </p>

            <hr>

            <h5 class="text-primary">

                Skills

            </h5>

            @if($provider->skills->count())

                <ul>

                    @foreach($provider->skills as $skill)

                        <li>{{ $skill->skill_name }}</li>

                    @endforeach

                </ul>

            @else

                <p>No Skills Assigned</p>

            @endif

            <hr>

            <h5 class="text-primary">

                Laptop Services

            </h5>

            @if($provider->laptopServices->count())

                <table class="table table-bordered">

                    <thead>

                        <tr>

                            <th>Service</th>

                            <th>Category</th>

                            <th>Brand</th>

                            <th>Model</th>

                            <th>Price</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($provider->laptopServices as $service)

                        <tr>

                            <td>{{ $service->service_name }}</td>

                            <td>{{ $service->laptopServiceCategory->category_name ?? '-' }}</td>

                            <td>{{ $service->laptopBrand->brand_name ?? '-' }}</td>

                            <td>{{ $service->laptopModel->model_name ?? '-' }}</td>

                            <td>₹{{ $service->price }}</td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <p>No Laptop Services Assigned</p>

            @endif

        </div>

    </div>

</div>

@endsection