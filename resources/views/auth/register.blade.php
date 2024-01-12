<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Sipjaki Kabupaten Pasuruan</title>
    <link rel="shortcut icon" type="{{ asset('image/png') }}" href="{{ asset('assets/sipjaki.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <style>
        @media only screen and (max-width: 1440) {
            body {
                overflow: hidden;
            }
        }
    </style>


<link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/plugin.js') }}"></script>
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/libs/summernote/summernote.css') }}">
</head>

<body class="auth-body-bg">
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xl-7">
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
                <div class="col-xl-5">
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
                                        <h5 style="color: #1B3061; font-weight: bold">Daftar Sekarang</h5>
                                        <p style="color: #1B3061">Daftar untuk membuat akun baru</p>
                                    </div>
                                    <div class="mt-4">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="mb-3 col-md-12 col-12">
                                                    <label for="username" class="form-label"
                                                        style="font-weight: bold">{{ __('Badan Usaha') }}</label>
                                                    <input id="username" type="text"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        name="name" placeholder="Masukan Badan Usaha"
                                                        value="{{ old('name') }}" autocomplete="email" autofocus
                                                        style="border-radius: 8px">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-6 col-12">
                                                    <label for="email" class="form-label"
                                                        style="font-weight: bold">{{ __('Email') }}</label>
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" placeholder="Masukan Email"
                                                        value="{{ old('email') }}" autocomplete="email" autofocus
                                                        style="border-radius: 8px">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-6 col-12">
                                                    <label for="phone" class="form-label"
                                                        style="font-weight: bold">{{ __('No telephone') }}</label>
                                                    <input id="phone" type="number"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        name="phone_number" placeholder="Masukan phone"
                                                        value="{{ old('phone_number') }}" autocomplete="phone"
                                                        autofocus style="border-radius: 8px">
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-6 col-12">
                                                    <label for="email" class="form-label"
                                                        style="font-weight: bold">{{ __('Asosiasi') }}</label>
                                                    <select name="association_id" class="form-select select2-create" id="">
                                                        <option value="consultant">Pilih Asosiasi</option>
                                                        @foreach ($associations as $association)
                                                            <option value="{{ $association->id }}"
                                                                {{ $association->id == old('association_id') ? 'selected' : '' }}>
                                                                {{ $association->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('association_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-6 col-12">
                                                    <label for="phone" class="form-label"
                                                        style="font-weight: bold">{{ __('Tipe') }}</label>
                                                    <select name="type_of_business_entity" class="form-select"
                                                        id="">
                                                        <option value="consultant"
                                                            {{ 'consultant' == old('type_of_business_entity') ? 'selected' : '' }}>
                                                            Konsultan</option>
                                                        <option value="executor"
                                                            {{ 'executor' == old('type_of_business_entity') ? 'selected' : '' }}>
                                                            Penyelenggara</option>
                                                    </select>
                                                    @error('type_of_business_entity')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-6 col-12">
                                                    <label class="form-label"
                                                        style="font-weight: bold">Password</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password"
                                                            class="form-control  @error('password') is-invalid @enderror"
                                                            name="password" autocomplete="current-password"
                                                            placeholder="Masukan Password" aria-label="Password"
                                                            aria-describedby="password-addon"
                                                            style="border-radius: 8px 0 0 8px;">
                                                        <button class="btn btn-light " type="button"
                                                            id="password-addon2"><i
                                                                class="mdi mdi-eye-outline"></i></button>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6 col-12">
                                                    <label class="form-label" style="font-weight: bold">Konfimasi
                                                        Password</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password"
                                                            class="form-control  @error('password_confirmation') is-invalid @enderror"
                                                            name="password_confirmation"
                                                            autocomplete="current-password_confirmation"
                                                            placeholder="Masukan Ulang Password"
                                                            aria-label="Password Konfirmasi"
                                                            aria-describedby="password_confirmation-addon"
                                                            style="border-radius: 8px 0 0 8px;">
                                                        <button class="btn btn-light " type="button"
                                                            id="password-addon"><i
                                                                class="mdi mdi-eye-outline"></i></button>
                                                        @error('password_confirmation')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>






                                            <div class="mt-3 d-grid">
                                                <button style="background-color: #1B3061;"
                                                    class="btn text-white waves-effect waves-light"
                                                    type="submit">Daftar Sekarang</button>
                                            </div>

                                        </form>
                                        <div class="mt-3 text-center">
                                            <p>sudah punya akun? <span style="color: #457DFF"><a
                                                        href="{{ route('login') }}">Login</a></span></a> </p>
                                        </div>
                                    </div>
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
    <script>
        $(document).ready(function() {
            $(".select2-create").select2({
            });
            $(".select2-update").select2({
            });
        });
    </script>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ asset('assets/libs/summernote/summernote.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>

    <!-- form wizard init -->
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ asset('assets/js/pages/sweet-alerts.init.js') }}"></script>

</body>

</html>
