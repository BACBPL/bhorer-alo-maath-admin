@extends('admin.layout')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Engineers</h2>
            <p class="text-muted mb-0">Manage all engineers from one place.</p>
        </div>

        <a href="{{ url('/admin/providers/create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-circle"></i> Add Engineer
        </a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <small class="text-muted">Total Engineers</small>
                    <h2 class="fw-bold mt-2">{{ $providers->count() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <small class="text-muted">Active</small>
                    <h2 class="fw-bold text-success mt-2">{{ $providers->where('status','Active')->count() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <small class="text-muted">Internal</small>
                    <h2 class="fw-bold text-primary mt-2">{{ $providers->where('provider_type','Internal')->count() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <small class="text-muted">External</small>
                    <h2 class="fw-bold text-warning mt-2">{{ $providers->where('provider_type','External')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow rounded-4">
        <div class="card-header bg-white border-0 py-3">
            <div class="row">
                <div class="col-md-4 ms-auto">
                    <input type="text" id="searchInput" class="form-control rounded-pill" placeholder="Search engineer...">
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="engineerTable">
                <thead class="table-light">
                    <tr>
                        <th width="70">S.No</th>
                        <th>Engineer</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Experience</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th width="170">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($providers as $provider)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary text-white fw-bold d-flex justify-content-center align-items-center me-3"
                                     style="width:45px;height:45px;">
                                    {{ strtoupper(substr($provider->name,0,1)) }}
                                </div>
                                <strong>{{ $provider->name }}</strong>
                            </div>
                        </td>

                        <td>{{ $provider->email }}</td>

                        <td>{{ $provider->mobile }}</td>

                        <td>{{ $provider->experience }}</td>

                        <td>
                            @if($provider->provider_type=='Internal')
                                <span class="badge bg-primary px-3 py-2">Internal</span>
                            @else
                                <span class="badge bg-info px-3 py-2">External</span>
                            @endif
                        </td>

                        <td>
                            @if($provider->status=='Active')
                                <span class="badge bg-success px-3 py-2">Active</span>
                            @else
                                <span class="badge bg-danger px-3 py-2">Inactive</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ url('/admin/providers/edit/'.$provider->id) }}" class="btn btn-sm btn-warning rounded-pill px-3">
                                Edit
                            </a>

                            <a href="{{ url('/admin/providers/delete/'.$provider->id) }}"
                               onclick="return confirm('Delete this engineer?')"
                               class="btn btn-sm btn-danger rounded-pill px-3">
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

<script>
document.getElementById('searchInput').addEventListener('keyup', function () {
    let value=this.value.toLowerCase();
    document.querySelectorAll('#engineerTable tbody tr').forEach(function(row){
        row.style.display=row.innerText.toLowerCase().includes(value)?'':'none';
    });
});
</script>

@endsection
