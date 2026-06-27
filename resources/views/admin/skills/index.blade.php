@extends('admin.layout')

@section('content')

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
color:#1f2937;
}

.page-subtitle{
color:#6b7280;
font-size:15px;
}

.add-btn{
background:linear-gradient(135deg,#2563eb,#1d4ed8);
color:#fff;
padding:12px 26px;
border-radius:12px;
text-decoration:none;
font-weight:600;
box-shadow:0 10px 25px rgba(37,99,235,.25);
transition:.3s;
}

.add-btn:hover{
color:#fff;
transform:translateY(-2px);
}

.stats-card{
background:#fff;
border-radius:18px;
padding:22px;
box-shadow:0 10px 25px rgba(0,0,0,.08);
margin-bottom:25px;
}

.stats-title{
font-size:14px;
color:#64748b;
}

.stats-value{
font-size:30px;
font-weight:700;
margin-top:8px;
}

.table-card{
background:#fff;
border-radius:18px;
overflow:hidden;
box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.table-header{
background:#0f172a;
padding:20px;
color:#fff;
font-size:20px;
font-weight:600;
}

.table thead th{
background:#f8fafc;
padding:18px;
font-weight:700;
}

.table tbody td{
padding:18px;
vertical-align:middle;
}

.status-active{
background:#dcfce7;
color:#166534;
padding:6px 16px;
border-radius:30px;
font-size:13px;
font-weight:600;
}

.status-inactive{
background:#fee2e2;
color:#991b1b;
padding:6px 16px;
border-radius:30px;
font-size:13px;
font-weight:600;
}

</style>

<div class="page-header">

<div>

<div class="page-title">
Skills
</div>

<div class="page-subtitle">
Manage all engineer skills
</div>

</div>

<a href="{{ url('/admin/skills/create') }}"
class="add-btn">

Add Skill

</a>

</div>

<div class="row">

<div class="col-md-4">

<div class="stats-card">

<div class="stats-title">
Total Skills
</div>

<div class="stats-value">
{{ $skills->count() }}
</div>

</div>

</div>

</div>

<div class="table-card">

<div class="table-header">

Skills List

</div>

<div class="table-responsive">

<table class="table mb-0">

<thead>

<tr>

<th>S.No</th>

<th>Skill Name</th>

<th>Status</th>

<th width="180">
Action
</th>

</tr>

</thead>

<tbody>

@if($skills->count())

@foreach($skills as $key => $skill)

<tr>

    <td>

        <strong>{{ $key + 1 }}</strong>

    </td>

    <td>

        <div class="fw-bold">

            {{ $skill->skill_name }}

        </div>

    </td>

    <td>

        @if($skill->status == 'Active')

            <span class="status-active">

                Active

            </span>

        @else

            <span class="status-inactive">

                Inactive

            </span>

        @endif

    </td>

    <td>

        <a href="{{ url('/admin/skills/edit/'.$skill->id) }}"
           class="btn btn-warning btn-sm">

            <i class="fa fa-edit"></i>

            Edit

        </a>

        <a href="{{ url('/admin/skills/delete/'.$skill->id) }}"
           class="btn btn-danger btn-sm"
           onclick="return confirm('Delete this skill?')">

            <i class="fa fa-trash"></i>

            Delete

        </a>

    </td>

</tr>

@endforeach

@else

<tr>

    <td colspan="4" class="text-center py-5">

        <h5 class="text-muted">

            No Skills Found

        </h5>

        <p class="text-muted">

            Click <b>Add Skill</b> to create your first skill.

        </p>

    </td>

</tr>

@endif

            </tbody>

        </table>

    </div>

</div>

@endsection