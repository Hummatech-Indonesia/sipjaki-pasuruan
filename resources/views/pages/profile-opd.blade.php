@extends('layouts.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
                @if (session('success'))
                <x-alert-success-component :success="session('success')" />
            @endif
                    <form method="POST" action="{{ route('dinas.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <h4 class="mb-3">
                                Profil OPD
                            </h4>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Nama OPD</label>
                                    <input type="text" name="name_opd" value="{{ old('name_opd', $dinas->name_opd ? $dinas->name_opd : '' ) }}" class="form-control" placeholder="Masukkan Nama">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">No Telephone OPD</label>
                                    <input type="number" name="phone_number_opd" value="{{ old('phone_number_opd', $dinas->phone_number_opd ? $dinas->phone_number_opd : '' ) }}" class="form-control" placeholder="Masukkan No Telephone">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Email OPD</label>
                                    <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" placeholder="Masukkan Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <div>
                                        <textarea rows="4" name="address" class="form-control" rows="3" placeholder="Masukkan Alamat">{{ old('address') }}{{ $dinas->address ? $dinas->address : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-3">
                            Penanggung Jawab
                        </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <div>
                                        <input type="name" name="person_responsible"
                                            class="form-control" value="{{ auth()->user()->dinas->person_responsible }}" placeholder="Masukkan nama" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No HP</label>
                                    <div>
                                        <input type="number" name="phone_number"
                                            class="form-control" value="{{ auth()->user()->phone_number}}" placeholder="Masukkan no Hp" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">NIP</label>
                                    <div>
                                        <input type="number" value="{{ old('civil_servant_identity_number', $dinas->civil_servant_identity_number ? $dinas->civil_servant_identity_number : '' ) }}" name="civil_servant_identity_number"
                                            class="form-control" placeholder="Masukkan NIP" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Jabatan</label>
                                    <div>
                                        <input type="text" value="{{ old('position', $dinas->position ? $dinas->position : '' ) }}" name="position" class="form-control" placeholder="Masukkan Jabatan" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success w-md mx-1 text-white rounded-3">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
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
                                    <label for="" class="form-label">Password Saat Ini</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" name="current_password"  class="form-control" placeholder="Masukkan password" aria-label="Password" aria-describedby="password-addon2" >
                                        <button class="btn btn-light " type="button" id="password-addon2"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="" class="form-label">Password Baru</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" name="password"  class="form-control" placeholder="Masukkan password Baru" aria-label="Password" aria-describedby="password-addon3" >
                                        <button class="btn btn-light " type="button" id="password-addon3"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Konfirmasi Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" name="password_confirmation"  class="form-control" placeholder="Konfirmasi password" aria-label="Password" aria-describedby="password-addon" >
                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex mt-4 justify-content-end">
                                <div>
                                    <div class="btn btn-outline-danger waves-effect waves-light rounded-3 me-1">
                                        Batal
                                    </div>
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
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
@endsection
