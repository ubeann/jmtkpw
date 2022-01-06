<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/auth.css') }}" rel="stylesheet" />
</head>
<body>
    <div id="main-wrapper" class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                    </div>

                                    <h6 class="h5 mb-0">Welcome back!</h6>
                                    <p class="text-muted mt-2 mb-4">Please enter your email address and password</p>

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

                                    <form method="POST">
                                        @csrf
                                        <div class="form-group my-2">
                                            <label for="name">Name</label>
                                            <input name="name" type="text" class="form-control" id="name" value="{{ old('name') ?? $user->name }}" autofocus>
                                        </div>
                                        <div class="form-group my-2">
                                            <label for="email">Email address</label>
                                            <input name="email" type="email" class="form-control" id="email" value="{{ old('email') ?? $user->email }}">
                                        </div>
                                        <div class="form-group my-2">
                                            <label for="password">Password</label>
                                            <input name="password" type="password" class="form-control" id="password">
                                        </div>
                                        <div class="form-group my-2">
                                            <label for="confirm">Confirm</label>
                                            <input name="confirm" type="password" class="form-control" id="confirm">
                                        </div>
                                        <div class="form-group my-2">
                                            <label for="address">Address</label>
                                            <textarea name="address" type="text" class="form-control" id="address">{{ old('address') ?? $user->address }}</textarea>
                                        </div>
                                        <div class="form-group my-2">
                                            <label for="phone">Phone</label>
                                            <input name="phone" type="number" class="form-control" id="phone" value="{{ old('phone') ?? $user->phone }}">
                                        </div>
                                        <button name="cancel" type="submit" class="btn btn-theme">Cancel</button>
                                        <button type="submit" class="btn btn-theme">Save</button>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block rounded-right">
                                    <div class="overlay rounded-right"></div>
                                    <div class="account-testimonial">
                                        <h4 class="text-white mb-4">Tokem</h4>
                                        <p class="lead text-white">Selling a variety of flowers that you like as gifts for loved ones!</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <p class="text-muted text-center mt-3 mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-primary ml-1">register</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

