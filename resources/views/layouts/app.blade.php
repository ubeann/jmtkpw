<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tokem</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}">

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
        @yield('head')
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand fw-bold" href="{{ route('landing') }}">Tokem</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        @guest
                            <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('products') }}">Products</a></li>
                            <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('about-us') }}">About Us</a></li>
                        @endguest
                        @auth
                            @if (Auth::user()->role == 'admin')
                                {{-- UDAH LOGIN ADMIN --}}
                                <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('about-us') }}">About Us</a></li>
                                <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('products') }}">Manage Products</a></li>
                                <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('admin.add_category') }}">Add Category</a></li>
                            @elseif (Auth::user()->role == 'member')
                                {{-- UDAH LOGIN MEMBER --}}
                                <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('products') }}">Products</a></li>
                                <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('about-us') }}">About Us</a></li>
                                <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('member.transaction') }}">My Transaction</a></li>
                            @endif
                        @endauth
                    </ul>

                    @guest
                        {{-- BELUM LOGIN --}}
                        <a href="{{ route('register') }}" class="btn btn-gray rounded-pill px-3 mb-2 mb-lg-0">
                            <span class="d-flex align-items-center">
                                <span class="small">Sign Up</span>
                            </span>
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0">
                            <span class="d-flex align-items-center">
                                <i class="bi bi-box-arrow-in-right me-2"></i>
                                <span class="small">Sign In</span>
                            </span>
                        </a>
                    @endguest

                    @auth
                        @if (Auth::user()->role == 'admin')
                            {{-- UDAH LOGIN ADMIN --}}
                            <a href="{{ route('profile.index') }}" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0">
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-person me-2"></i>
                                    <span class="small">{{ Auth::user()->name }}</span>
                                </span>
                            </a>
                        @elseif (Auth::user()->role == 'member')
                            {{-- UDAH LOGIN MEMBER --}}
                            <a href="{{ route('member.cart') }}" class="btn btn-gray rounded-pill px-3 mb-2 mb-lg-0">
                                <span class="d-flex align-items-center">
                                    <span class="small">My Cart</span>
                                </span>
                            </a>
                            <a href="{{ route('profile.index') }}" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0">
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-person me-2"></i>
                                    <span class="small">{{ Auth::user()->name }}</span>
                                </span>
                            </a>
                        @endif
                    @endauth

                </div>
            </div>
        </nav>
        <div class="mt-5 pt-3">
            <div class="mt-5"></div>
            @if (Session::has('success'))
                {{-- SUCCESS --}}
                <div class="alert alert-success alert-dismissible fade show container mt-4" role="alert">
                    {{Session::get('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (Session::has('error'))
                {{-- ERROR --}}
                <div class="alert alert-danger alert-dismissible fade show container mt-4" role="alert">
                    {{Session::get('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                {{-- ERROR --}}
                <div class="alert alert-danger alert-dismissible fade show container mt-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @yield('content')
        </div>

        <!-- Feedback Modal-->
        <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-primary-to-secondary p-4">
                        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Account</h5>
                        <a href="{{ route('profile.index') }}">Profile</a>
                        <a href="{{ route('logout') }}">Logout</a>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
