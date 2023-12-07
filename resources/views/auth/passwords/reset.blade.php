@extends('layouts.auth-app')

@section('content')
    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-9">
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                            <div class="p-4">
                                <div class="row justify-content-center">
                                    <img src="{{ asset('assets/images/icon-kontruksi.png') }}" alt="" srcset="">
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
                                        <h5 style="color: #1B3061; font-weight: bold">Reset Password</h5>
                                        <p style="color: #1B3061">Masukkan Email Anda dan instruksi akan dikirimkan kepada
                                            Anda!</p>
                                    </div>

                                    <div class="mt-4">
                                        <form method="POST" action="{{ route('password.update') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="email" class="form-label"
                                                    style="font-weight: bold">{{ __('Alamat Email') }}</label>
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ $email ?? old('email') }}" required autocomplete="email"
                                                    autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label"
                                                    style="font-weight: bold">{{ __('Password') }}</label>
                                                    <div class="">
                                                        <input id="password" type="password"
                                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                                            required autocomplete="new-password">
                        
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label"
                                                    style="font-weight: bold">{{ __('Konfirmasi password') }}</label>
                                                    <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                            <div class="mt-3 d-grid">
                                                <button style="background-color: #1B3061"
                                                    class="btn text-white waves-effect waves-light"
                                                    type="submit">kirim</button>
                                            </div>

                                        </form>
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
@endsection

