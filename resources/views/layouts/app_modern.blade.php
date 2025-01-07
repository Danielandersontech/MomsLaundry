<!doctype html>    
<html lang="en">    
    
<head>    
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Platform Layanan Laundry</title>    
    <link rel="shortcut icon" type="image/png" href="/modern/src/assets/images/logos/favicon.png" />    
    <link rel="stylesheet" href="/modern/src/assets/css/styles.min.css" />    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">    
    <style>    
        .btn {    
            display: inline-flex;    
            align-items: center;    
            justify-content: center;    
        }    
    </style>    
</head>    
    
<body>    
    <!-- Body Wrapper -->    
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"    
        data-sidebar-position="fixed" data-header-position="fixed">    
        <!-- Sidebar Start -->    
        <aside class="left-sidebar">    
            <!-- Sidebar scroll-->    
            <div>    
                <div class="brand-logo d-flex align-items-center justify-content-between">    
                    <a href="./index.html" class="text-nowrap logo-img">    
                        <img src="/modern/src/assets/images/logos/dark-logo.svg" width="180" alt="" />    
                    </a>    
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">    
                        <i class="ti ti-x fs-8"></i>    
                    </div>    
                </div>    
                <!-- Sidebar navigation-->    
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">    
                    <ul id="sidebarnav">    
                        <li class="nav-small-cap">    
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>    
                            <span class="hide-menu">Dashboard</span>    
                        </li>    
                        <li class="sidebar-item">    
                            <a class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard"    
                                aria-expanded="false">    
                                <span>    
                                    <i class="ti ti-layout-grid"></i>    
                                </span>    
                                <span class="hide-menu">Dashboard</span>    
                            </a>    
                        </li>    
    
                        {{-- USERS --}}    
                        <li class="sidebar-item">    
                            <a class="sidebar-link {{ request()->is('admin/pengguna') ? 'active' : '' }}" href="/admin/pengguna"    
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">    
                                <span>    
                                    <i class="ti ti-users"></i>    
                                </span>    
                                <span class="dropdown-item" href="/admin/pengguna">Data Pengguna</span>    
                            </a>    
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">    
                                <li>    
                                    <a class="dropdown-item" href="/admin/pengguna">Lihat Data Pengguna</a>    
                                </li>    
                                <li>    
                                    <a class="dropdown-item" href="/admin/pengguna/create">Tambah Pengguna</a>    
                                </li>    
                            </ul>    
                        </li>    
    
                        <li class="sidebar-item">    
                            <a class="sidebar-link {{ request()->is('admin/laporan-pengguna') ? 'active' : '' }}"    
                                href="/admin/laporan-pengguna/create" aria-expanded="false">    
                                <span>    
                                    <i class="ti ti-receipt"></i>    
                                </span>    
                                <span class="hide-menu">Laporan Data Pengguna</span>    
                            </a>    
                        </li>    
    
                        {{-- PACKAGES --}}    
                        <li class="sidebar-item">    
                            <a class="sidebar-link {{ request()->is('admin/package') ? 'active' : '' }}" href="/admin/package"    
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">    
                                <span>    
                                    <i class="ti ti-package"></i>    
                                </span>    
                                <span class="dropdown-item" href="/admin/package">Data Paket Layanan</span>    
                            </a>    
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">    
                                <li>    
                                    <a class="dropdown-item" href="/admin/package">Lihat Data Paket Layanan</a>    
                                </li>    
                                <li>    
                                    <a class="dropdown-item" href="/admin/package/create">Tambah Paket Layanan</a>    
                                </li>    
                            </ul>    
                        </li>    
    
                        {{-- ORDERS --}}    
                        <li class="sidebar-item">    
                            <a class="sidebar-link {{ request()->is('admin/order') ? 'active' : '' }}" href="/admin/order"    
                                aria-expanded="false">    
                                <span>    
                                    <i class="ti ti-shopping-cart"></i>    
                                </span>    
                                <span class="hide-menu">Data Pesanan</span>    
                            </a>    
                        </li>    
    
                        <li class="sidebar-item">    
                            <a class="sidebar-link {{ request()->is('admin/laporan-order') ? 'active' : '' }}"    
                                href="/admin/laporan-order/create" aria-expanded="false">    
                                <span>    
                                    <i class="ti ti-receipt"></i>    
                                </span>    
                                <span class="hide-menu">Laporan Data Pesanan</span>    
                            </a>    
                        </li>    
    
                        {{-- PAYMENTS --}}    
                        <li class="sidebar-item">    
                            <a class="sidebar-link {{ request()->is('admin/payment') ? 'active' : '' }}" href="/admin/payment"    
                                aria-expanded="false">    
                                <span>    
                                    <i class="ti ti-credit-card"></i>    
                                </span>    
                                <span class="hide-menu">Data Pembayaran</span>    
                            </a>    
                        </li>    
    
                        {{-- FEEDBACK --}}    
                        <li class="sidebar-item">    
                            <a class="sidebar-link {{ request()->is('admin/feedback') ? 'active' : '' }}" href="/admin/feedback"    
                                aria-expanded="false">    
                                <span>    
                                    <i class="ti ti-comments"></i>    
                                </span>    
                                <span class="hide-menu">Umpan Balik Pelanggan</span>    
                            </a>    
                        </li>    
                    </ul>    
                </nav>    
            </div>    
            <!-- End Sidebar scroll-->    
        </aside>    
        <!-- Sidebar End -->    
    
        <!-- Main wrapper -->    
        <div class="body-wrapper">    
            <!-- Header Start -->    
            <header class="app-header">    
                <nav class="navbar navbar-expand-lg navbar-light">    
                    <ul class="navbar-nav">    
                        <li class="nav-item d-block d-xl-none">    
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"    
                                href="javascript:void(0)">    
                                <i class="ti ti-menu-2"></i>    
                            </a>    
                        </li>    
                        <li class="nav-item">    
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">    
                                <i class="ti ti-bell-ringing"></i>    
                                <div class="notification bg-primary rounded-circle"></div>    
                            </a>    
                        </li>    
                    </ul>    
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">    
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">    
                            <li class="nav-item dropdown">    
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"    
                                    data-bs-toggle="dropdown" aria-expanded="false">    
                                    <img src="/modern/src/assets/images/profile/user-1.jpg" alt=""    
                                        width="35" height="35" class="rounded-circle">    
                                </a>    
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"    
                                    aria-labelledby="drop2">    
                                    <div class="message-body">    
                                        <a href="javascript:void(0)"    
                                            class="d-flex align-items-center gap-2 dropdown-item">    
                                            <i class="ti ti-user fs-6"></i>    
                                            <p class="mb-0 fs-3">{{ auth()->check() ? auth()->user()->nama : 'Guest' }}</p>    
                                        </a>    
                                        <a href="#"    
                                            onclick="event.preventDefault();    
                                                document.getElementById('logout-form').submit();"    
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>    
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"    
                                            class="d-none">    
                                            @csrf    
                                        </form>    
                                    </div>    
                                </div>    
                            </li>    
                        </ul>    
                    </div>    
                </nav>    
            </header>    
            <!-- Header End -->    
    
            <div class="container-fluid">    
                @include('flash::message')    
                @yield('content')    
            </div>    
        </div>    
    </div>    
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>    
    <script src="/modern/src/assets/libs/jquery/dist/jquery.min.js"></script>    
    <script src="/modern/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>    
    <script src="/modern/src/assets/js/sidebarmenu.js"></script>    
    <script src="/modern/src/assets/js/app.min.js"></script>    
    <script src="/modern/src/assets/libs/simplebar/dist/simplebar.js"></script>    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>    
    <script>    
        $(document).ready(function() {    
            $('.select2').select2({    
                placeholder: function() {    
                    $(this).data('placeholder'); // Mengembalikan nilai placeholder yang sesuai    
                },    
                allowClear: true,    
                width: 'resolve'    
            });    
        });    
    </script>    
</body>    
    
</html>    
