@extends('layouts.app')
@section('content')
    <h4 style="font-weight:800" class="text-dark mb-4">
        Penyedia Jasa
    </h4>
    <div class="card">
        <div class="card-body">
            <p class="fs-5 " style="font-weight: 600">
                Berikut daftar Penyedia Jasa
            </p>
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-header gap-3">
                    <div class="">
                        <div class="input-group">
                            <input name="name" type="text" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn text-white"
                                    style="background-color: #1B3061; border-radius: 0 5px 5px 0;" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <button class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            Export
                        </button>
                    </div>
                </div>
            </div>
            <div class="table-responsive mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <td class="text-white" style="background-color: #1B3061">
                                No
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Nama Jasa
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Email
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Asosiasi
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                No Telp
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Aksi
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($association->serviceProviders as $index=>$serviceProvider)
                            <tr>
                                <td>
                                    {{ $index + 1 }}
                                </td>
                                <td>
                                    {{ $serviceProvider->user->name }}
                                </td>
                                <td>
                                    {{ $serviceProvider->user->email }}
                                </td>
                                <td>
                                    {{ $serviceProvider->association->name }}
                                </td>
                                <td>
                                    {{ $serviceProvider->user->phone_number }}
                                </td>
                                <td>
                                    <button class="btn text-white btn-detail" id="{{ $serviceProvider->id }}"
                                        data-id="{{ $serviceProvider->id }}" data-name="{{ $serviceProvider->user->name }}" data-address="{{ $serviceProvider->user->address ? $serviceProvider->user->address : "-"}}" data-phone_number="{{ $serviceProvider->user->phone_number }}" data-email="{{ $serviceProvider->user->email }}" style="background-color: #1B3061">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                            @empty
                            tr
                            @endforelse
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-md" id="modal-detail" tabindex="-1" role="dialog"
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
                                <span id="detail-name">Profil Penyedia Jasa</span>
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
    </div>
@endsection
@section('script')
    <script>
         $('.btn-detail').click(function() {
            const data = getDataAttributes($(this).attr('id'))
            handleDetail(data)
            console.log(data);
            $('#modal-detail').modal('show')
        })
    </script>
@endsection
