<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

    <style>

        body{
    margin:0;
    background:#f8fafc;
    font-family:'Inter',sans-serif;
}

.page-card{
    background:#fff;
    border-radius:20px;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    border:none;
}

.page-title{
    font-size:32px;
    font-weight:700;
    color:#111827;
}

.page-subtitle{
    color:#6b7280;
    font-size:15px;
}

.premium-input{
    height:56px;
    border-radius:14px;
    border:1px solid #dbe3ef;
}

.premium-input:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 4px rgba(37,99,235,.12);
}

.premium-textarea{
    border-radius:14px;
    border:1px solid #dbe3ef;
}

.btn-premium{
    background:#2563eb;
    color:white;
    border:none;
    border-radius:12px;
    padding:12px 30px;
    font-weight:600;
}

.btn-premium:hover{
    background:#1d4ed8;
}

.section-divider{
    height:1px;
    background:#eef2f7;
    margin:25px 0;
}

.form-label{
    color:#374151;
    font-size:15px;
    margin-bottom:8px;
}

.sidebar{
    width:260px;
    height:100vh;
    position:fixed;
    left:0;
    top:0;
    background:#111827;
    display:flex;
    flex-direction:column;
    z-index:1000;
}

.sidebar-logo{
    background:#ffffe0;
    padding:1px 10px;
    text-align:center;
}

.sidebar-brand-logo{
    width:180px;
    height:auto;
}

.sidebar-title{
    font-size:24px;
    font-weight:700;
    color:#111827;
    line-height:0.2;
}

.sidebar-logo h3{
    color:black;
    margin:0;
    font-size:28px;
    font-weight:700;
}

.menu{
    flex:1;
    overflow-y:auto;
    padding:15px 0;
}

.sidebar a{
    display:block;
    color:#d1d5db;
    text-decoration:none;
    padding:14px 20px;
    margin:4px 12px;
    border-radius:12px;
    transition:.3s;
    font-size:15px;
    font-weight:500;
}

.sidebar a:hover{
    background:#1f2937;
    color:white;
}

.sidebar a.active{
    background:#2563eb;
    color:white;
}

.sidebar-dropdown{
    display:flex;
    justify-content:space-between;
    align-items:center;
    color:#d1d5db;
    text-decoration:none;
    padding:14px 20px;
    margin:4px 12px;
    border-radius:12px;
    transition:.3s;
    font-size:15px;
    font-weight:500;
}

.sidebar-dropdown:hover{
    background:#1f2937;
    color:#fff;
}

.sidebar-dropdown i:last-child{
    font-size:12px;
}

.logout{
    margin-top:auto;
    padding:15px;
    border-top:1px solid rgba(255,255,255,.08);
}

.logout a{
    background:#dc2626;
    color:white !important;
}

.logout a:hover{
    background:#b91c1c;
}

.content{
    margin-left:260px;
    min-height:100vh;
}

.topbar{
    height:70px;
    background:white;
    box-shadow:0 2px 10px rgba(0,0,0,.05);
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 30px;
}

.admin-info{
    font-weight:600;
    color:#374151;
}

.page-content{
    padding:30px;
}

.dashboard-wrapper{
    max-width:1400px;
    margin:0 auto;
}

.live-header{
    background:linear-gradient(
        135deg,
        #0f172a 0%,
        #1e3a8a 100%
    );
    border-radius:24px;
    padding:35px;
    color:white;
    margin-bottom:40px;
    box-shadow:0 15px 40px rgba(15,23,42,.20);
}

.live-time{
    font-size:32px;
    font-weight:700;
    margin-bottom:5px;
}

.live-date{
    opacity:.8;
    font-size:15px;
}

.section-title{
    font-size:28px;
    font-weight:700;
    color:#111827;
    margin-bottom:20px;
}

.metric-card{
    background:#ffffff;
    border-radius:18px;
    padding:24px;
    text-align:center;
    box-shadow:0 4px 20px rgba(0,0,0,.05);
    border:1px solid #eef2f7;
    transition:.3s;
}

.metric-card:hover{
    transform:translateY(-4px);
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.metric-label{
    color:#6b7280;
    font-size:14px;
    font-weight:600;
    margin-bottom:12px;
}

.metric-value{
    font-size:22px;
    font-weight:700;
    padding-top:12px;
    border-top:1px solid #edf2f7;
}

.overview-card{
    background:#fff;
    border-radius:18px;
    padding:24px;
    text-align:center;
    box-shadow:0 6px 20px rgba(0,0,0,.05);
    border:1px solid #eef2f7;
    height:100%;
    position:relative;
    overflow:hidden;
    transition:.3s;
}

.overview-card:hover{
    transform:translateY(-5px);
}

.overview-card h6{
    color:#6b7280;
    font-size:14px;
    font-weight:600;
    margin-bottom:10px;
}

.overview-card h2{
    font-size:22px;
    font-weight:700;
    margin:0;
    color:#111827;
}

.dashboard-section{
    margin-bottom:45px;
}

.card{
    border-radius:20px;
}

.table{
    margin-bottom:0;
}

.table thead th{
    font-size:18px;
    font-weight:700;
    color:#374151;
    padding:20px 16px;
}

.table tbody td{
    font-size:14px;
    font-weight:500;
    padding:18px 16px;
    vertical-align:middle;
}

.table tbody tr{
    transition:all .3s ease;
}

.table tbody tr:hover{
    background:#f8fafc;
    transform:scale(1.002);
}

.badge{
    font-size:13px;
    font-weight:600;
}

.btn{
    border-radius:10px;
}

.shadow-lg{
    box-shadow:0 12px 35px rgba(0,0,0,.08)!important;
}

.premium-input{
    height:55px;
    border-radius:12px;
}

.premium-textarea{
    border-radius:12px;
}

.premium-input:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 4px rgba(37,99,235,.12);
}

.card-header{
    border-bottom:1px solid #eef2f7;
}

.btn-primary{
    border-radius:10px;
    font-weight:600;
}

.btn-light{
    border-radius:10px;
}

.shadow-lg{
    box-shadow:0 12px 35px rgba(0,0,0,.08)!important;
}

.select2-container .select2-selection--multiple{

    min-height:55px;

    border-radius:12px;

    border:1px solid #dbe3ef;

    padding:6px;

}

.select2-container--default
.select2-selection--multiple
.select2-selection__choice{

    background:#0d6efd;

    color:#fff;

    border:none;

    border-radius:20px;

    padding:4px 12px;

}

.select2-container--default
.select2-selection--multiple
.select2-selection__choice__remove{

    color:white;

    margin-right:6px;

}

.menu-heading{
    color:#94a3b8;
    font-size:11px;
    font-weight:700;
    text-transform:uppercase;
    letter-spacing:1px;
    padding:18px 22px 8px;
}

/* Laptop Management */

.laptop-submenu{
    margin-left:18px;
    border-left:2px solid rgba(255,255,255,.12);
    padding-left:8px;
    margin-top:6px;
}

.laptop-submenu a{
    display:flex;
    align-items:center;
    gap:10px;
    padding:10px 14px;
    margin:4px 0;
    color:#cfd6e4;
    text-decoration:none;
    border-radius:8px;
    transition:.25s;
    font-size:14px;
}

.laptop-submenu a:hover{
    background:#2563eb;
    color:#fff;
    padding-left:18px;
}

.laptop-submenu a i{
    width:18px;
    text-align:center;
}

.menu-arrow{
    transition:transform .3s ease;
    font-size:12px;
}

.sidebar-dropdown[aria-expanded="true"] .menu-arrow{
    transform:rotate(180deg);
}
    </style>

</head>

<body>

<div class="sidebar">

    <div class="sidebar-logo">
        <img src="/images/bacbpl-logo.png" class="sidebar-brand-logo">
    </div>

    <div class="menu">

        <div class="menu-heading">MAIN</div>

        <a href="/admin/dashboard"
            class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-fill me-2"></i>
            Dashboard
        </a>

        <div class="menu-heading">BUSINESS</div>

        <a href="/admin/categories"
            class="{{ request()->is('admin/categories*') ? 'active' : '' }}">
            <i class="bi bi-folder2-open me-2"></i>
            Categories
        </a>

        <a href="/admin/subcategories"
            class="{{ request()->is('admin/subcategories*') ? 'active' : '' }}">
            <i class="bi bi-diagram-3 me-2"></i>
            Sub Categories
        </a>

        <a href="/admin/services"
            class="{{ request()->is('admin/services*') ? 'active' : '' }}">
            <i class="bi bi-tools me-2"></i>
            Services
        </a>

        <p class="menu-heading mt-4">
    LAPTOP MANAGEMENT
</p>

    <a
        class="d-flex justify-content-between align-items-center sidebar-dropdown"
        data-bs-toggle="collapse"
        href="#laptopMenu"
        role="button"
        aria-expanded="{{ request()->is('admin/laptop-*') ? 'true' : 'false' }}">

    <span>
        <i class="bi bi-laptop"></i>
        Laptop Management
    </span>

    <i class="bi bi-chevron-down menu-arrow"></i>

</a>

    <div class="collapse {{ request()->is('admin/laptop-*') ? 'show' : '' }} laptop-submenu"
     id="laptopMenu">

        <a href="/admin/laptop-service-categories"
        class="ps-5">

            <i class="bi bi-tags me-2"></i>
            Laptop Service Categories

        </a>

        <a href="/admin/laptop-brands"
        class="ps-5">

            <i class="bi bi-pc-display me-2"></i>
            Laptop Brands

        </a>

        <a href="/admin/laptop-models"
        class="ps-5">

            <i class="bi bi-laptop me-2"></i>
            Laptop Models

        </a>

        <a href="/admin/laptop-services"
        class="ps-5">

            <i class="bi bi-tools me-2"></i>
            Laptop Services

        </a>

    </div>

        <a href="/admin/skills"
            class="{{ request()->is('admin/skills*') ? 'active' : '' }}">
            <i class="bi bi-award me-2"></i>
            Skills
        </a>

        <div class="menu-heading">ENGINEERS</div>

        <a href="/admin/providers"
            class="{{ request()->is('admin/providers*') ? 'active' : '' }}">
            <i class="bi bi-person-workspace me-2"></i>
            Engineers
        </a>

        <a href="/admin/provider-services"
            class="{{ request()->is('admin/provider-services*') ? 'active' : '' }}">
            <i class="bi bi-link-45deg me-2"></i>
            Engineer Services
        </a>

        <div class="menu-heading">OPERATIONS</div>

        <a href="/admin/bookings"
            class="{{ request()->is('admin/bookings*') ? 'active' : '' }}">
            <i class="bi bi-calendar-check me-2"></i>
            Bookings
        </a>

        <a href="/admin/users"
            class="{{ request()->is('admin/users*') ? 'active' : '' }}">
            <i class="bi bi-people me-2"></i>
            Users
        </a>

        <a href="/admin/reviews"
            class="{{ request()->is('admin/reviews*') ? 'active' : '' }}">
            <i class="bi bi-star me-2"></i>
            Reviews
        </a>

        <a href="/admin/payments">
            <i class="bi bi-credit-card me-2"></i>
            Payments
        </a>

        <div class="menu-heading">CMS</div>

        <a href="/admin/banners"
            class="{{ request()->is('admin/banners*') ? 'active' : '' }}">
            <i class="bi bi-images me-2"></i>
            Banners
        </a>

    </div>
        <div class="logout">
            <a href="/admin/logout">Logout</a>
        </div>

    </div>

<div class="content">

    <div class="page-content">

        @yield('content')

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function () {

    $('.multi-service').select2({
        placeholder:'-- Select Services --',
        width:'100%'
    });

    $('.multi-skills').select2({
        placeholder:'Select Skills',
        width:'100%',
        closeOnSelect:false
    });

    // Current Pincode
$('#current_pincode').select2({
    placeholder: 'Search Current Pincode',
    allowClear: true,
    ajax: {
        url: '/admin/pincode/search',
        dataType: 'json',
        delay: 250,
        data: function(params) {
            return {
                search: params.term
            };
        },
        processResults: function(data) {
            return {
                results: $.map(data, function(item) {
                    return {
                        id: item.pincode,
                        text: item.pincode + ' - ' + item.branch_city
                    };
                })
            };
        }
    }
});

// Serviceable Pincodes
$('#serviceable_pincodes').select2({
    placeholder: 'Search Serviceable Pincodes',
    width: '100%',
    closeOnSelect: false,
    ajax: {
        url: '/admin/pincode/search',
        dataType: 'json',
        delay: 250,
        data: function(params) {
            return {
                search: params.term
            };
        },
        processResults: function(data) {
            return {
                results: $.map(data, function(item) {
                    return {
                        id: item.pincode,
                        text: item.pincode + ' - ' + item.branch_city
                    };
                })
            };
        }
    }
});

});
</script>

</body>
</html>