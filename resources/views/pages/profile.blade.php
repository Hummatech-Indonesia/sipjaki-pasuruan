@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card rounded-3">
                <h5 class="card-header rounded-top-3 border-bottom text-uppercase text-center h-20"
                    style="background-color: #1B3061;color:white;">Profil Saya</h5>
                <div class="card-body">
                    <form action="{{ route('update.profile') }}" method="post" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-lg-2 d-flex flex-column align-items-center">
                                <img id="preview"
                                    src="{{ asset(auth()->user()->profile == null ? 'Default.png' : 'storage/' . auth()->user()->profile) }}"
                                    class="rounded-circle avatar-xl" width="90%" style="object-fit: cover"
                                    alt="">
                                <div class="btn btn-sm mt-3 btn-upload rounded-3" id="btn-upload"
                                    style="background-color: #1B3061; color: white; padding-left: 50px; padding-right: 50px;">
                                    UPLOAD</div>
                                <input type="file" style="display: none" name="profile" id="photo">
                            </div>

                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="form-label">Nama.*</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ auth()->user()->name }}" id="">
                                            @error('name')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">Email.*</label>
                                        <input type="text" value="{{ auth()->user()->email }}" class="form-control"
                                            name="email" id="">
                                            @error('email')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="" class="form-label">No Telepon.*</label>
                                        <input type="number" value="{{ auth()->user()->phone_number }}"
                                            class="form-control" name="phone_number" id="">
                                            @error('phone_number')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">Sk (Opsional)</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->decree }}"
                                            name="decree" id="">
                                            @error('decree')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                    </div>
                                </div>
                                <div class="d-flex mt-4 justify-content-end">
                                    <div>
                                        
                                        <button type="submit" class="btn btn-md rounded-3"
                                            style="background-color: #1B3061;color:white;">
                                            Simpan
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card rounded-3">
                <h5 class="card-header rounded-top-3 border-bottom text-uppercase text-center h-20"
                    style="background-color: #1B3061;color:white;">Ganti Password</h5>
                <div class="card-body">
                    <form action="{{ route('update.password') }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-lg-3 d-flex flex-column align-items-center">
                                <img width="90%" src="{{ asset('assets/images/Password 1.png') }}" alt="">
                            </div>

                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" class="form-label">Password Sekarang</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" name="current_password" class="form-control"
                                                placeholder="Masukkan password" aria-label="Password"
                                                aria-describedby="password-addon2">
                                            <button class="btn btn-light " type="button" id="password-addon2"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="" class="form-label">Password Baru</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Masukkan password Baru" aria-label="Password"
                                                aria-describedby="password-addon3">
                                            <button class="btn btn-light " type="button" id="password-addon3"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">Konfirmasi Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" name="password_confirmation" class="form-control"
                                                placeholder="Konfirmasi password" aria-label="Password"
                                                aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex mt-4 justify-content-end">
                                    <div>
                                        
                                        <button type="submit" class="btn btn-md rounded-3"
                                            style="background-color: #1B3061;color:white;">
                                            Ganti Password
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    <script>
        document.getElementById('btn-upload').addEventListener('click', function() {
            document.getElementById('photo').click();
        });

        document.getElementById('photo').addEventListener('change', function() {
            displayImage(this);
        });

        function displayImage(input) {
            var file = input.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
