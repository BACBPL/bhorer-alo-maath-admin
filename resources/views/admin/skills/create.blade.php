@extends('admin.layout')

@section('content')

<div class="container-fluid">

    <div class="card shadow-lg border-0 rounded-4">

        <div class="card-header bg-primary text-white py-4">

            <h2 class="mb-1 fw-bold">
                Add Skill
            </h2>

            <p class="mb-0">
                Create a new engineer skill.
            </p>

        </div>

        <div class="card-body p-4">

            <form action="{{ url('/admin/skills/store') }}" method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label fw-bold">
                        Skill Name
                    </label>

                    <input
                        type="text"
                        name="skill_name"
                        class="form-control form-control-lg"
                        placeholder="Enter Skill Name"
                        required>

                </div>

                <div class="mb-4">

                    <label class="form-label fw-bold">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select form-select-lg">

                        <option value="Active">
                            Active
                        </option>

                        <option value="Inactive">
                            Inactive
                        </option>

                    </select>

                </div>

                <button class="btn btn-primary px-5">

                    Save Skill

                </button>

                <a href="{{ url('/admin/skills') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

@endsection