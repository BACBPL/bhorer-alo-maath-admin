@extends('admin.layout')

@section('content')

<div class="dashboard-wrapper">

    <div class="live-header">

        <h2 class="fw-bold mb-3">
            Welcome Back
        </h2>

        <div id="liveTime" class="live-time"></div>

        <div id="liveDate" class="live-date"></div>

    </div>

    <!-- TODAY -->

    <div class="dashboard-section">

        <h3 class="section-title">Today's Performance</h3>

        <div class="row g-4">

            <div class="col-md">
                <div class="metric-card">
                    <div class="metric-label">Total Orders</div>
                    <div class="metric-value text-primary">{{ $todayOrders }}</div>
                </div>
            </div>

            <div class="col-md">
                <div class="metric-card">
                    <div class="metric-label">Assigned</div>
                    <div class="metric-value text-info">{{ $todayAssigned }}</div>
                </div>
            </div>

            <div class="col-md">
                <div class="metric-card">
                    <div class="metric-label">Pending</div>
                    <div class="metric-value text-warning">{{ $todayPending }}</div>
                </div>
            </div>

            <div class="col-md">
                <div class="metric-card">
                    <div class="metric-label">Cancelled</div>
                    <div class="metric-value text-danger">{{ $todayCancelled }}</div>
                </div>
            </div>

            <div class="col-md">
                <div class="metric-card">
                    <div class="metric-label">Completed</div>
                    <div class="metric-value text-success">{{ $todayCompleted }}</div>
                </div>
            </div>

        </div>

    </div>

    <!-- YESTERDAY -->

    <div class="dashboard-section">

        <h3 class="section-title">Yesterday's Performance</h3>

        <div class="row g-4">

            <div class="col-md">
                <div class="metric-card">
                    <div class="metric-label">Total Orders</div>
                    <div class="metric-value text-primary">{{ $yesterdayOrders }}</div>
                </div>
            </div>

            <div class="col-md">
                <div class="metric-card">
                    <div class="metric-label">Assigned</div>
                    <div class="metric-value text-info">{{ $yesterdayAssigned }}</div>
                </div>
            </div>

            <div class="col-md">
                <div class="metric-card">
                    <div class="metric-label">Pending</div>
                    <div class="metric-value text-warning">{{ $yesterdayPending }}</div>
                </div>
            </div>

            <div class="col-md">
                <div class="metric-card">
                    <div class="metric-label">Cancelled</div>
                    <div class="metric-value text-danger">{{ $yesterdayCancelled }}</div>
                </div>
            </div>

            <div class="col-md">
                <div class="metric-card">
                    <div class="metric-label">Completed</div>
                    <div class="metric-value text-success">{{ $yesterdayCompleted }}</div>
                </div>
            </div>

        </div>

    </div>

    <!-- OVERVIEW -->

    <div class="dashboard-section">

        <h3 class="section-title">Business Overview</h3>

        <div class="row g-4">

            <div class="col-md-3">
                <div class="overview-card blue">
                    <h6>Total Categories</h6>
                    <h2>{{ $totalCategories }}</h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="overview-card green">
                    <h6>Total Services</h6>
                    <h2>{{ $totalServices }}</h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="overview-card orange">
                    <h6>Total Engineers</h6>
                    <h2>{{ $totalProviders }}</h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="overview-card red">
                    <h6>Total Bookings</h6>
                    <h2>{{ $totalBookings }}</h2>
                </div>
            </div>

        </div>

    </div>

</div>

<script>
    function updateClock() {

    const now = new Date();

    document.getElementById('liveTime').innerHTML =
        now.toLocaleTimeString('en-IN', {
            hour:'2-digit',
            minute:'2-digit',
            second:'2-digit'
        });

    document.getElementById('liveDate').innerHTML =
        now.toLocaleDateString('en-US', {
            weekday:'long',
            year:'numeric',
            month:'long',
            day:'numeric'
        });
}

updateClock();
setInterval(updateClock,1000);
</script>

@endsection