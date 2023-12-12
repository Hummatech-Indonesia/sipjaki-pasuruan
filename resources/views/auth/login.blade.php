<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Sipjaki Kabupaten Pasuruan</title>
    <link rel="shortcut icon" type="{{ asset('image/png') }}" href="{{ asset('assets/sipjaki.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <link rel="stylesheet" href="{{ asset('assets/libs/owl.carousel/assets/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/libs/owl.carousel/assets/owl.theme.default.min.css') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/plugin.js') }}"></script>

</head>

<body class="auth-body-bg">
    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-9">
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                            <div class="p-4">
                                <div class="row justify-content-center">
                                    <img src="{{ asset('assets/images/icon-kontruksi.png') }}" alt=""
                                        srcset="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 d-flex justify-content-center mb-md-5">
                                    <a href="javascript:void(0)" class="d-block card-logo">
                                        <img src="{{ asset('logo.png') }}" alt="" height="40"
                                            class="card-logo-dark">
                                    </a>
                                </div>
                                <div class="my-auto">

                                    <div>
                                        <h5 style="color: #1B3061; font-weight: bold">SELAMAT DATANG KEMBALI</h5>
                                        <p style="color: #1B3061">Login untuk melanjutkan</p>
                                    </div>


                                    <div class="mt-4">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="email" class="form-label"
                                                    style="font-weight: bold">{{ __('Email Address') }}</label>
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" placeholder="Masukan Email"
                                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                                    style="border-radius: 8px">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <div class="float-end">
                                                    <a href="{{ route('send.email') }}" style="color: #457DFF">Forgot
                                                        password?</a>
                                                </div>
                                                <label class="form-label" style="font-weight: bold">Password</label>
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password"
                                                        class="form-control  @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="current-password"
                                                        placeholder="Masukakn Password" aria-label="Password"
                                                        aria-describedby="password-addon"
                                                        style="border-radius: 8px 0 0 8px;">
                                                    <button class="btn btn-light " type="button" id="password-addon"><i
                                                            class="mdi mdi-eye-outline"></i></button>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mt-3 d-grid">
                                                <button style="background-color: #1B3061"
                                                    class="btn text-white waves-effect waves-light" type="submit">Log
                                                    In</button>
                                            </div>

                                        </form>
                                        <div class="mt-5 text-center">
                                            <p>Belum punya akun? <span style="color: #457DFF"><a
                                                        href="{{ route('register') }}">Register</a></span></a> </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">©
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script> Powered By Hummatech
                                    </p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- owl.carousel js -->
    <script src="{{ asset('assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>

    <!-- auth-2-carousel init -->
    <script src="{{ asset('assets/js/pages/auth-2-carousel.init.js') }}"></script>

    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ asset('assets/js/pages/sweet-alerts.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            html: `@foreach ($errors->all() as $error){{ $error }}<br>@endforeach`,
            showConfirmButton: true,
            confirmButtonText: 'OK',
        });
    </script>
@endif

</body>

</html>
