<!doctype html>  
<html lang="en">  
  
<head>  
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Web Moms Laundry</title>  
    <link rel="shortcut icon" type="image/png" href="/modern/src/assets/images/logos/favicon.png" />  
    <link rel="stylesheet" href="/modern/src/assets/css/styles.min.css" />  
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">  
</head>  
  
<body>  
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"  
        data-sidebar-position="fixed" data-header-position="fixed">  
  
        <!-- Sidebar -->  
        <aside class="left-sidebar">  
            <div>  
                <div class="brand-logo d-flex align-items-center justify-content-between">  
                    <a href="{{ route('pengguna.dashboard') }}" class="text-nowrap">  
                        <h4 class="text-black">MomsLaundry</h4> <!-- Teks MomsLaundry dengan warna hitam -->  
                    </a>  
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">  
                        <i class="ti ti-x fs-8"></i>  
                    </div>  
                </div>  
                <nav class="sidebar-nav scroll-sidebar" data-simplebar>  
                    <ul id="sidebarnav">  
                        <li class="nav-small-cap">  
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>  
                            <span class="hide-menu">Menu</span>  
                        </li>  
                        @php  
                            use Illuminate\Support\Facades\Auth;  
                        @endphp  
                        @if(Auth::check()) 
                            <li class="sidebar-item">  
                                <a class="sidebar-link {{ request()->is('pengguna/feedback/create') ? 'active' : '' }}"  
                                    href="{{ route('pengguna.feedback.create') }}">  
                                    <span>  
                                        <i class="ti ti-message"></i>  
                                    </span>  
                                    <span class="hide-menu">Feedback</span>  
                                </a>  
                            </li>  
                            <li class="sidebar-item">  
                                <a class="sidebar-link {{ request()->is('pengguna/profil') ? 'active' : '' }}"  
                                    href="{{ route('pengguna.profil') }}">  
                                    <span>  
                                        <i class="ti ti-user"></i>  
                                    </span>  
                                    <span class="hide-menu">Profil</span>  
                                </a>  
                            </li>  
                            <li class="sidebar-item">  
                                <a class="sidebar-link {{ request()->is('pengguna/paket') ? 'active' : '' }}"  
                                    href="{{ route('pengguna.paket') }}">  
                                    <span>  
                                        <i class="ti ti-package"></i>  
                                    </span>  
                                    <span class="hide-menu">Paket Layanan</span>  
                                </a>  
                            </li>  
                            <li class="sidebar-item">  
                                <a class="sidebar-link {{ request()->is('pengguna/order') ? 'active' : '' }}"  
                                    href="{{ route('pengguna.order') }}">  
                                    <span>  
                                        <i class="ti ti-shopping-cart"></i>  
                                    </span>  
                                    <span class="hide-menu">Pesanan</span>  
                                </a>  
                            </li>  
                        @else  
                            <li class="sidebar-item">  
                                <a class="sidebar-link" href="{{ route('login') }}">  
                                    <span>  
                                        <i class="ti ti-lock"></i>  
                                    </span>  
                                    <span class="hide-menu">Login</span>  
                                </a>  
                            </li>  
                        @endif  
                    </ul>  
                </nav>  
            </div>  
        </aside>  
  
        <!-- Main Content -->  
        <div class="body-wrapper">  
            <header class="app-header">  
                <nav class="navbar navbar-expand-lg navbar-light bg-light">  
                    <div class="container-fluid">  
                        <a class="navbar-brand" href="#">Web Moms Laundry</a>  
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  
                            aria-expanded="false" aria-label="Toggle navigation">  
                            <span class="navbar-toggler-icon"></span>  
                        </button>  
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">  
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">  
                                @if(Auth::check())  
                                    <li class="nav-item dropdown">  
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"  
                                            data-bs-toggle="dropdown" aria-expanded="false">  
                                            {{ auth()->user()->nama }}  
                                        </a>  
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">  
                                            <li>  
                                                <a class="dropdown-item" href="{{ route('pengguna.profil') }}">Lihat Profil</a>  
                                            </li>  
                                            <li>  
                                                <a class="dropdown-item" href="#"  
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>  
                                            </li>  
                                        </ul>  
                                    </li>  
                                @endif  
                            </ul>  
                        </div>  
                    </div>  
                </nav>  
            </header>  
            <div class="container-fluid">  
                @yield('content')  
            </div>  
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">  
                @csrf  
            </form>  
        </div>  
    </div>  
  
    <!-- Scripts -->  
    <script src="/modern/src/assets/libs/jquery/dist/jquery.min.js"></script>  
    <script src="/modern/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>  
    <script src="/modern/src/assets/js/scripts.min.js"></script>  
</body>  
  
</html>  
