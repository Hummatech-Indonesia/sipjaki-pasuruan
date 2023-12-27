@extends('layouts.app-landing-page')
@section('content')
<style>
    .search-container {
    display: flex;
    align-items: center;
    position: relative;
}

.search-icon {
    margin-left: 10px;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}

</style>
<link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <div class="tabs-wrapper">
        <div class="section-title text-center">
            <h2 style="border-radius: 16px;
        background: var(--Kuning, #FFC928);" class="title p-1">Detail Asosiasi
            </h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="d-flex justify-content-end mb-3">
            <div class="">
                <a href="/asosiasi" class="text-white btn" style="background-color: #1B3061">
                    Kembali
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0" border="1">
                            <thead class="table-light">
                                <tr>
                                <tr>
                                    <td class="text-white" style="background-color: #1B3061">
                                        No
                                    </td>
                                    <td class="text-white" style="background-color: #1B3061">
                                        Nama Jasa
                                    </td>
                                    <td class="text-white" style="background-color: #1B3061">
                                        Asosiasi
                                    </td>
                                    <td class="text-white" style="background-color: #1B3061">
                                        Nama Direktur
                                    </td>
                                    <td class="text-white" style="background-color: #1B3061">
                                        No Telp
                                    </td>
                                    {{-- <td class="text-white" style="background-color: #1B3061">
                                                Aksi
                                            </td> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($serviceProviders as $index=>$serviceProvider)
                                    <tr>
                                        <td>
                                            {{ $index + 1 }}
                                        </td>
                                        <td>
                                            {{ $serviceProvider->user->name }}
                                        </td>
                                        <td>
                                            {{ $serviceProvider->association->name }}
                                        </td>
                                        <td>
                                            {{ $serviceProvider->directur ? $serviceProvider->directur : '-' }}
                                        </td>
                                        <td>
                                            {{ $serviceProvider->user->phone_number }}

                                        </td>
                                        {{-- <td>
                                                <button class="btn text-white btn-detail" id="{{ $serviceProvider->id }}"
                                                    data-id="{{ $serviceProvider->id }}" style="background-color: #1B3061">
                                                    Detail
                                                </button>
                                            </td> --}}
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <div class="d-flex justify-content-center" style="min-height:16rem">
                                                <div class="my-auto">
                                                    <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                                    <h4 class="text-center mt-4">Belum Ada Asosiasi Ditambahkan!!</h4>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="modal fade bs-example-modal-md" id="modal-detail" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Detail Penyedia Jasa</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="bg-info col-3 rounded">
                        <div class="badge bg-info">
                            <p class="mb-0 px-3 py-1 fs-6">
                                <span id="">Profil Penyedia Jasa</span>
                            </p>
                        </div>
                    </div>
                    <h5 class="mt-3 name mb-3">

                    </h5>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Alamat :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-birth_date"
                                    class="">JL. Harga Buah no 3</span></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Kota/Kab :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-birth_date"
                                    class="">Malang</span></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Provinsi :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-birth_date"
                                    class="">Jawa Timur</span></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Kode Pos :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-birth_date"
                                    class="">045641</span></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Telepon :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="phone_number"
                                    class=""></span></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Email :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="email"
                                    class=""></span></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Website :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-birth_date"
                                    class="">www.badanusaha.com</span></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Bentuk Badan Usaha :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-birth_date"
                                    class="">CV. Badan Usaha</span></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Jenis Badan Usaha :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-birth_date"
                                    class="">Pelaksana Kegiatan Kerja</span></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-end">
                        <div class="">
                            <button class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@section('script')
    <script>
        $('.btn-detail').click(function() {
            id = $(this).data('id')
            get()
            $('#modal-detail').modal('show');

            function get() {
                $.ajax({
                    url: "service-provider-detail/" + id,
                    type: 'GET',
                    dataType: "JSON",
                    success: function(response) {
                        var name = response.data.user.name;
                        var email = response.data.user.email;
                        var phone_number = response.data.user.phone_number;
                        $('#phone_number').text(phone_number)
                        $('#email').text(email)
                        $('.name').text(name)
                    }
                });
            }
        })
    </script>
@endsection
