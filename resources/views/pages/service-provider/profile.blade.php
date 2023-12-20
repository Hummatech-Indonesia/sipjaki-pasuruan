@extends('layouts.app')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <div class="d-flex">
            <a class="nav-link active rounded-start" style="border: solid 1px #1B3061;" id="badan-usaha-tab"
                data-bs-toggle="pill" href="#badan-usaha" role="tab" aria-controls="badan-usaha" aria-selected="true">
                <div class="fw-bold">Badan Usaha</div>
            </a>
            <a class="nav-link" style="border: solid 1px #1B3061;" id="kualifikasi-klasifikasi-tab" data-bs-toggle="pill"
                href="#kualifikasi-klasifikasi" role="tab" aria-controls="kualifikasi-klasifikasi"
                aria-selected="false">
                <div class="fw-bold">Kualifikasi dan Klasifikasi</div>
            </a>
            <a class="nav-link" style="border: solid 1px #1B3061;" id="administrasi-tab" data-bs-toggle="pill"
                href="#administrasi" role="tab" aria-controls="administrasi" aria-selected="false">
                <div class="fw-bold">Administrasi</div>
            </a>
            <a class="nav-link" style="border: solid 1px #1B3061;" id="pengurus-tab" data-bs-toggle="pill" href="#pengurus"
                role="tab" aria-controls="pengurus" aria-selected="false">
                <div class="fw-bold">Pengurus</div>
            </a>
            <a class="nav-link" style="border: solid 1px #1B3061;" id="tenaga-kerja-tab" data-bs-toggle="pill"
                href="#tenaga-kerja" role="tab" aria-controls="tenaga-kerja" aria-selected="false">
                <div class="fw-bold">Tenaga Kerja</div>
            </a>
            <a class="nav-link rounded-end" style="border: solid 1px #1B3061;" id="pengalaman-tab" data-bs-toggle="pill"
                href="#pengalaman" role="tab" aria-controls="pengalaman" aria-selected="false">
                <div class="fw-bold">Pengalaman</div>
            </a>
        </div>
    </div>

    <div class="tab-content mt-4" id="v-pills-tabContent">
        <div class="tab-pane fade active show" id="badan-usaha" role="tabpanel" aria-labelledby="badan-usaha-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2 d-flex justify-content-between">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    Data Badan Usaha
                                </div>
                                <button data-bs-toggle="modal" data-bs-target="#modal-update-badan-usaha"
                                    style="background-color: #E4ECFF;"
                                    class="text-dark btn px-4 fw-bold btn-edit-badan-usaha"
                                    id="btn-edit-badan-usaha-{{ $serviceProvider->id }}"
                                    data-address="{{ $serviceProvider->address }}"
                                    data-email="{{ $serviceProvider->user->email }}"
                                    data-city="{{ $serviceProvider->city }}"
                                    data-postal_code="{{ $serviceProvider->postal_code }}"
                                    data-phone_number="{{ $serviceProvider->user->phone_number }}"
                                    data-website="{{ $serviceProvider->website }}"
                                    data-form_of_business_entity="{{ $serviceProvider->form_of_business_entity }}"
                                    data-type_of_business_entity="{{ $serviceProvider->type_of_business_entity }}">Edit</button>
                            </div>
                            <p class="fw-bolder fs-4">{{ $serviceProvider->user->name }}</p>
                            <table cellpadding="5" style="border-collapse: collapse; width: 50%;" class="fs-6 fw-normal">
                                <tbody>
                                    <tr>
                                        <td>Alamat Badan Usaha</td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->address ? $serviceProvider->address : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kabupaten</td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->city ? $serviceProvider->city : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Provinsi</td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->province ? $serviceProvider->province : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Pos</td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->postal_code ? $serviceProvider->postal_code : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->user->phone_number ? $serviceProvider->user->phone_number : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fax</td>
                                        <td>:</td>
                                        <td>0411 - 3584897987</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->user->email ? $serviceProvider->user->email : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Website</td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->website ? $serviceProvider->website : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bentuk Badan Usaha</td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->form_of_business_entity ? ($serviceProvider->form_of_business_entity == 'pt' ? 'PT' : 'CV') : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Badan Usaha</td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->type_of_business_entity ? ($serviceProvider->type_of_business_entity == 'consultant' ? 'Konsultan' : 'Penyelrnggara') : '-' }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="kualifikasi-klasifikasi" role="tabpanel"
            aria-labelledby="kualifikasi-klasifikasi-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    Data Kualifikasi / Klasifikasi Badan Usaha
                                </div>
                                <p class="fw-bolder fs-4">{{ $serviceProvider->user->name }}</p>
                            </div>
                            <table cellpadding="5" style="border-collapse: collapse; width: 40%;" class="fs-6 fw-normal">
                                <tbody>
                                    <tr>
                                        <td>Alamat Badan Usaha</td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->address ? $serviceProvider->address : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->user->phone_number }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mb-2">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-qualification"
                    style="background-color: #1B3061; border-radius: 10px"><i class="fas fa-plus"
                        style="margin-right:10px"></i>Tambah</button>
            </div>
            <div class="table-responsive rounded-4">
                <table class="table table-bordered" border="1">
                    <thead>
                        <tr align="center">
                            <th style="background-color: #1B3061;color:#ffffff; vertical-align: middle" rowspan="2">No
                            </th>
                            <th style="background-color: #1B3061;color:#ffffff; vertical-align: middle" colspan="1"
                                rowspan="2">Sub Bidang Klasifikasi/Layanan</th>
                            <th style="background-color: #1B3061;color:#ffffff; vertical-align: middle" colspan="1"
                                rowspan="2">Nomor Kode</th>
                            <th style="background-color: #1B3061;color:#ffffff; vertical-align: middle" colspan="1"
                                rowspan="2">Kualifikasi</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle;width:150px;"
                                rowspan="2" colspan="1">Tahun</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle" rowspan="2"
                                colspan="1">
                                Asosiasi</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle;width:150px;"
                                rowspan="2" colspan="1">Tanggal Permohonan</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle;width:150px;"
                                rowspan="2" colspan="1">Status</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle;width:150px;"
                                rowspan="2" colspan="1">Aksi</th>
                        </tr>

                    </thead>
                    <tbody>
                        @forelse ($serviceProviderQualifications as $serviceProviderQualification)
                            <tr align="center">
                                <td colspan="1">{{ $loop->iteration }}</td>
                                <td colspan="1">{{ $serviceProviderQualification->subClassification->name }}</td>
                                <td colspan="1">{{ $serviceProviderQualification->subClassification->code }}</td>
                                <td colspan="1">{{ $serviceProviderQualification->qualification->name }}</td>
                                <td colspan="1">{{ $serviceProviderQualification->year }}</td>
                                <td colspan="1">{{ $serviceProviderQualification->serviceProvider->association->name }}
                                </td>
                                <td colspan="1">
                                    {{ Carbon::parse($serviceProviderQualification->created_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                </td>
                                <td colspan="1">
                                    @if ($serviceProviderQualification->status == 'pending')
                                        <span class="badge text-bg-warning fs-6">Pending</span>
                                    @elseif ($serviceProviderQualification->status == 'reject')
                                        <span class="badge text-bg-danger fs-6">Reject</span>
                                    @else
                                        <span class="badge text-bg-success fs-6">Active</span>
                                    @endif
                                </td>
                                <td colspan="1">
                                    @if ($serviceProviderQualification->status == 'pending')
                                        <div class="d-flex justify-content-center gap-3">
                                            <div>
                                                <button style="min-width: 90px;width:100%;background-color: #1B3061"
                                                    class="btn text-white modal-detail-qualification "
                                                    id="btn-detail-{{ $serviceProviderQualification->id }}"
                                                    data-update-list-classifications="{{ $serviceProviderQualification->subClassification->name }}"
                                                    data-code="{{ $serviceProviderQualification->subClassification->code }}"
                                                    data-Kualifikasi="{{ $serviceProviderQualification->qualification->name }}"
                                                    data-tahun="{{ $serviceProviderQualification->year }}"
                                                    data-Asosiasi="{{ $serviceProviderQualification->serviceProvider->association->name }}"
                                                    data-Tanggal_Permohonan=" {{ $serviceProviderQualification->first_print? Carbon::parse($serviceProviderQualification->first_print)->locale('id_ID')->isoFormat('DD MMMM Y'): '-' }}"
                                                    data-Tanggal_Cetak_Pertama=" {{ $serviceProviderQualification->first_print? Carbon::parse($serviceProviderQualification->first_print)->locale('id_ID')->isoFormat('DD MMMM Y'): '-' }}"
                                                    data-Tanggal_Cetak_Perubahan_Terakhir=" {{ $serviceProviderQualification->last_print? Carbon::parse($serviceProviderQualification->last_print)->locale('id_ID')->isoFormat('DD MMMM Y'): '-' }}">Detail</button>
                                            </div>
                                            <div>
                                                <button type="button"
                                                    id="btn-edit-{{ $serviceProviderQualification->id }}"
                                                    data-qualification_id="{{ $serviceProviderQualification->qualification_id }}"
                                                    data-id="{{ $serviceProviderQualification->id }}"
                                                    data-sub_classification_id="{{ $serviceProviderQualification->sub_classification_id }}"
                                                    data-year="{{ $serviceProviderQualification->year }}"
                                                    data-classification_id="{{ $serviceProviderQualification->subClassification->classification->id }}"
                                                    class="btn waves-effect waves-light modal-edit-qualification d-flex btn-edit flex-row gap-1 justify-content-evenly"
                                                    style="width: 90px; background-color: #FFC928; color: white"><i
                                                        class="bx bx-bx bxs-edit fs-4"></i>
                                                    <span>Edit</span></button>
                                            </div>
                                            <div>
                                                <button type="button" data-id="{{ $serviceProviderQualification->id }}"
                                                    class="btn waves-effect waves-light btn-delete-qualification d-flex flex-row gap-1 justify-content-between"
                                                    style="width: 90px; background-color: #E05C39; color: white"
                                                    data-bs-toggle="modal" data-bs-target="#modal-delete"><i
                                                        class="bx bx-bx bxs-trash fs-4"></i>
                                                    Hapus
                                                </button>
                                            </div>
                                        </div>
                                    @elseif ($serviceProviderQualification->status == 'active')
                                        <div class="d-flex justify-content-center gap-3">
                                            <div>
                                                <button style="min-width: 90px;width:100%;background-color: #1B3061"
                                                    class="btn text-white modal-detail-qualification "
                                                    id="btn-detail-{{ $serviceProviderQualification->id }}"
                                                    data-update-list-classifications="{{ $serviceProviderQualification->subClassification->name }}"
                                                    data-code="{{ $serviceProviderQualification->subClassification->code }}"
                                                    data-Kualifikasi="{{ $serviceProviderQualification->qualification->name }}"
                                                    data-tahun="{{ $serviceProviderQualification->year }}"
                                                    data-Asosiasi="{{ $serviceProviderQualification->serviceProvider->association->name }}"
                                                    data-Tanggal_Permohonan=" {{ $serviceProviderQualification->first_print? Carbon::parse($serviceProviderQualification->first_print)->locale('id_ID')->isoFormat('DD MMMM Y'): '-' }}"
                                                    data-Tanggal_Cetak_Pertama=" {{ $serviceProviderQualification->first_print? Carbon::parse($serviceProviderQualification->first_print)->locale('id_ID')->isoFormat('DD MMMM Y'): '-' }}"
                                                    data-Tanggal_Cetak_Perubahan_Terakhir=" {{ $serviceProviderQualification->last_print? Carbon::parse($serviceProviderQualification->last_print)->locale('id_ID')->isoFormat('DD MMMM Y'): '-' }}">Detail</button>
                                            </div>
                                            <div>
                                                <button type="button"
                                                    id="btn-edit-{{ $serviceProviderQualification->id }}"
                                                    data-qualification_id="{{ $serviceProviderQualification->qualification_id }}"
                                                    data-id="{{ $serviceProviderQualification->id }}"
                                                    data-sub_classification_id="{{ $serviceProviderQualification->sub_classification_id }}"
                                                    data-year="{{ $serviceProviderQualification->year }}"
                                                    data-classification_id="{{ $serviceProviderQualification->subClassification->classification->id }}"
                                                    class="btn waves-effect waves-light modal-edit-qualification d-flex btn-edit flex-row gap-1 justify-content-evenly"
                                                    style="width: 90px; background-color: #FFC928; color: white"><i
                                                        class="bx bx-bx bxs-edit fs-4"></i>
                                                    <span>Edit</span></button>
                                            </div>
                                        </div>
                                    @elseif ($serviceProviderQualification->status == 'reject')
                                        <div class="d-flex justify-content-center gap-3">
                                            <div>
                                                <button style="min-width: 90px;width:100%;background-color: #1B3061"
                                                    class="btn text-white modal-detail-qualification "
                                                    id="btn-detail-{{ $serviceProviderQualification->id }}"
                                                    data-update-list-classifications="{{ $serviceProviderQualification->subClassification->name }}"
                                                    data-code="{{ $serviceProviderQualification->subClassification->code }}"
                                                    data-Kualifikasi="{{ $serviceProviderQualification->qualification->name }}"
                                                    data-tahun="{{ $serviceProviderQualification->year }}"
                                                    data-reject="{{ $serviceProviderQualification->resend }}"
                                                    data-Asosiasi="{{ $serviceProviderQualification->serviceProvider->association->name }}"
                                                    data-Tanggal_Permohonan=" {{ $serviceProviderQualification->first_print? Carbon::parse($serviceProviderQualification->first_print)->locale('id_ID')->isoFormat('DD MMMM Y'): '-' }}"
                                                    data-Tanggal_Cetak_Pertama=" {{ $serviceProviderQualification->first_print? Carbon::parse($serviceProviderQualification->first_print)->locale('id_ID')->isoFormat('DD MMMM Y'): '-' }}"
                                                    data-Tanggal_Cetak_Perubahan_Terakhir=" {{ $serviceProviderQualification->last_print? Carbon::parse($serviceProviderQualification->last_print)->locale('id_ID')->isoFormat('DD MMMM Y'): '-' }}">Detail</button>
                                            </div>
                                            <div>
                                                <button type="button"
                                                    id="btn-edit-{{ $serviceProviderQualification->id }}"
                                                    data-qualification_id="{{ $serviceProviderQualification->qualification_id }}"
                                                    data-id="{{ $serviceProviderQualification->id }}"
                                                    data-sub_classification_id="{{ $serviceProviderQualification->sub_classification_id }}"
                                                    data-year="{{ $serviceProviderQualification->year }}"
                                                    data-classification_id="{{ $serviceProviderQualification->subClassification->classification->id }}"
                                                    class="btn waves-effect waves-light modal-edit-qualification d-flex btn-edit flex-row gap-1 justify-content-evenly"
                                                    style="width: 90px; background-color: #FFC928; color: white"><i
                                                        class="bx bx-bx bxs-edit fs-4"></i>
                                                    <span>Edit</span></button>
                                            </div>
                                            <div>
                                                <button type="button"
                                                    class="btn waves-effect waves-light btn-delete-qualification d-flex flex-row gap-1 justify-content-between"
                                                    style="width: 90px; background-color: #E05C39; color: white"
                                                    data-bs-toggle="modal" data-bs-target="#modal-delete"><i
                                                        class="bx bx-bx bxs-trash fs-4"></i>
                                                    Hapus
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center">
                                    <div class="d-flex justify-content-center" style="min-height:19rem">
                                        <div class="my-auto">
                                            <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                            <h4 class="text-center mt-4">Kualifikasi dan Klasifikasi kosong!!</h4>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="administrasi" role="tabpanel" aria-labelledby="administrasi-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    Data Administrasi
                                </div>
                                <p class="fw-bolder fs-4">MITRA BAHAGIA UTAMA BUMIAJI</p>
                            </div>
                            <table cellpadding="5" style="border-collapse: collapse; width: 40%;" class="fs-6 fw-normal">
                                <tbody>
                                    <tr>
                                        <td>Alamat Badan Usaha</td>
                                        <td>:</td>
                                        <td>Jl. G. Lokon No. 59</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td>0411 - 3584897987</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="mt-3 mb-3 fw-bold">Akte Pendiri</h4>
            <div class="card rounded-bottom-4" style="border: 1px solid black;border-radius: 20px 20px 20px 20px;">
                <h5 class="card-header text-center border-bottom text-uppercase rounded-top-4 p-3"
                    style="background-color: #1B3061;color:white;">Akte Pendiri</h5>
                <div class="card-body">
                    <table cellpadding="5" style="border-collapse: collapse; width: 40%;" class="fs-6 fw-normal">
                        <tbody>
                            <tr>
                                <td>No</td>
                                <td>:</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>Nama Notaris</td>
                                <td>:</td>
                                <td>Taufiq Arifin. SH</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>JL Haji Puniti</td>
                            </tr>
                            <tr>
                                <td>Kota / Kabupaten</td>
                                <td>:</td>
                                <td>Kota Malang</td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>:</td>
                                <td>Jawa Timur</td>
                            </tr>
                            <tr>
                                <td>Tanggal Akte</td>
                                <td>:</td>
                                <td>08 Januari</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h4 class="mt-3 mb-3 fw-bold">Pengesahan</h4>
                    <div class="card rounded-bottom-4"
                        style="border: 1px solid black;border-radius: 20px 20px 20px 20px;">
                        <h5 class="card-header text-center border-bottom text-uppercase rounded-top-4 p-3"
                            style="background-color: #1B3061;color:white;">Pengesahan</h5>
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <div class="">
                                    <button data-bs-toggle="modal" data-bs-target="#modal-pengesahan"
                                        style="background-color: #E4ECFF;"
                                        class="text-dark btn px-4 fw-bold">Edit</button>
                                </div>
                            </div>

                            <table cellpadding="5" style="border-collapse: collapse; width: 60%;" class="fs-6 fw-normal">
                                <tbody>
                                    <tr>
                                        <td colspan="5">
                                            <h5 class="text-dark" style="font-weight: 700">
                                                Materi Kehakiman dan HAM
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nomor</td>
                                        <td>:</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>:</td>
                                        <td>01 januari 2023</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <h5 class="text-dark mt-4" style="font-weight: 700">
                                                Pengadilan Negeri
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nomor</td>
                                        <td>:</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>:</td>
                                        <td>22 Maret 2023</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <h5 class="text-dark  mt-4" style="font-weight: 700">
                                                Lembar Negara
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nomor</td>
                                        <td>:</td>
                                        <td>Jawa Timur</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>:</td>
                                        <td>08 Januari</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h4 class="mt-3 mb-3 fw-bold">Akte Perubahan</h4>
                    <div class="card rounded-bottom-4"
                        style="border: 1px solid black;border-radius: 20px 20px 20px 20px;">
                        <h5 class="card-header text-center border-bottom text-uppercase rounded-top-4 p-3"
                            style="background-color: #1B3061;color:white;">Akte Perubahan</h5>
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <div class="">
                                    <button data-bs-toggle="modal" data-bs-target="#modal-akte"
                                        style="background-color: #E4ECFF;"
                                        class="text-dark btn px-4 fw-bold">Edit</button>
                                </div>
                            </div>
                            <table cellpadding="5" style="border-collapse: collapse; width: 60%;" class="fs-6 fw-normal">
                                <tbody>
                                    <tr>
                                        <td>No Akte</td>
                                        <td>:</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Notaris</td>
                                        <td>:</td>
                                        <td>Taufiq Arifin. SH</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>JL Haji Puniti</td>
                                    </tr>
                                    <tr>
                                        <td>Kota / Kabupaten</td>
                                        <td>:</td>
                                        <td>Kota Malang</td>
                                    </tr>
                                    <tr>
                                        <td>Provinsi</td>
                                        <td>:</td>
                                        <td>Jawa Timur</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pengurus" role="tabpanel" aria-labelledby="pengurus-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    Data Pengurus Badan Usaha
                                </div>
                                <p class="fw-bolder fs-4">{{ $serviceProvider->user->name }}</p>
                            </div>
                            <table cellpadding="5" style="border-collapse: collapse; width: 40%;" class="fs-6 fw-normal">
                                <tbody>
                                    <tr>
                                        <td>Alamat Badan Usaha</td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->address ? $serviceProvider->address : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->user->phone_number }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive rounded-4 mt-4">
                <table class="table table-bordered" border="1">
                    <thead>
                        <tr>
                            <th class="text-white" style="background-color: #1B3061">
                                No
                            </th>
                            <th class="text-white" style="background-color: #1B3061">
                                Nama
                            </th>
                            <th class="text-white" style="background-color: #1B3061">
                                Tanggal Lahir
                            </th>
                            <th class="text-white" style="background-color: #1B3061">
                                Alamat
                            </th>
                            <th class="text-white" style="background-color: #1B3061">
                                Jabatan
                            </th>
                            <th class="text-white" style="background-color: #1B3061">
                                Pendidikan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($officers as $index => $officer)
                            <tr>
                                <td class="fs-6">{{ $index + 1 }}</td>
                                <td class="fs-6">{{ $officer->name }}</td>
                                <td class="fs-6">
                                    {{ Carbon::parse($officer->birth_date)->locale('id_ID')->isoFormat('DD MMMM Y') }}</td>
                                <td class="fs-6">{{ $officer->address }}</td>
                                <td class="fs-6">{{ $officer->position }}</td>
                                <td class="fs-6">{{ $officer->education }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <div class="d-flex justify-content-center" style="min-height:16rem">
                                        <div class="my-auto">
                                            <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                            <h4 class="text-center mt-4">Tidak Ada Pengurus!!</h4>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="tenaga-kerja" role="tabpanel" aria-labelledby="tenaga-kerja-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    Data Tenaga Kerja Badan Usaha
                                </div>
                                <p class="fw-bolder fs-4">{{ $serviceProvider->user->name }}</p>
                            </div>
                            <table cellpadding="5" style="border-collapse: collapse; width: 40%;" class="fs-6 fw-normal">
                                <tbody>
                                    <tr>
                                        <td>Alamat Badan Usaha</td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->user->phone_number }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive rounded-4">
                        <table class="table table-bordered" border="1">
                            <thead>
                                <tr>
                                    <th class="text-white" style="background-color: #1B3061">
                                        No
                                    </th>
                                    <th class="text-white" style="background-color: #1B3061">
                                        Nama
                                    </th>
                                    <th class="text-white" style="background-color: #1B3061">
                                        Tanggal Lahir
                                    </th>
                                    <th class="text-white" style="background-color: #1B3061">
                                        Pendidikan
                                    </th>
                                    <th class="text-white" style="background-color: #1B3061">
                                        No Registrasi
                                    </th>
                                    <th class="text-white" style="background-color: #1B3061">
                                        Jenis Sertifikat
                                    </th>
                                    <th class="text-white" style="background-color: #1B3061">
                                        Detail
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($workers as $worker)
                                    <tr>
                                        <td class="fs-6">{{ $loop->iteration }}</td>
                                        <td class="fs-6">{{ $worker->name }}</td>
                                        <td class="fs-6">
                                            {{ \Carbon\Carbon::parse($worker->birth_date)->translatedFormat('d F Y') }}
                                        </td>
                                        <td class="fs-6">{{ $worker->education }}</td>
                                        <td class="fs-6">{{ $worker->registration_number }}</td>
                                        <td>{{ $worker->cerificate }}</td>
                                        <td>
                                            <div class="d-flex justify-content-header gap-3">
                                                <div class="">
                                                    <button id="btn-edit-{{ $worker->id }}"
                                                        data-id="{{ $worker->id }}" data-name="{{ $worker->name }}"
                                                        data-birth_date="{{ \Carbon\Carbon::parse($worker->birth_date)->translatedFormat('d F Y') }}"
                                                        data-cerificate="{{ $worker->cerificate }}"
                                                        data-education="{{ $worker->education }}"
                                                        data-registration_number="{{ $worker->registration_number }}"
                                                        type="button" data-bs-target="#modal-detail"
                                                        data-bs-toggle="modal"
                                                        class="btn btn-detail waves-effect waves-light text-white btn waves-effect d-flex flex-row gap-1 justify-content-evenly"
                                                        style="background-color: #1B3061">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19"
                                                            height="19" viewBox="0 0 24 24" fill="none">
                                                            <path d="M4.5 12.5C7.5 6 16.5 6 19.5 12.5" stroke="white"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M12 16C10.8954 16 10 15.1046 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg> Detail
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            <div class="d-flex justify-content-center" style="min-height:19rem">
                                                <div class="my-auto">
                                                    <img src="{{ asset('no-data.png') }}" width="300"
                                                        height="300" />
                                                    <h4 class="text-center mt-4">Tidak Ada Tenaga Kerja!!</h4>
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
        <div class="modal fade" id="modal-detail-qualification" tabindex="-1" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="exampleModalLabel1">
                                Detail Kualifikasi dan Klasifikasi
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mt-3 fs-5 text-dark mb-2" style="font-weight: 700">
                                        <span id="detail-name"></span>
                                    </p>
                                    <div class="">
                                        <div class="row mb-1">
                                            <div class="col-md-5">
                                                <p class="mb-2 text-dark">Nomor Kode :</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                        id="detail-code"></span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-5">
                                                <p class="mb-2 text-dark">Kualifikasi :</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                        id="detail-kualifikasi"></span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-5">
                                                <p class="mb-2 text-dark">Tahun :</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                        id="detail-tahun"></span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-5">
                                                <p class="mb-2 text-dark">Asosiasi :</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                        id="detail-asosiasi"></span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-5">
                                                <p class="mb-2 text-dark">Tanggal Permohonan :</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                        id="detail-tanggal_permohonan"></span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-5">
                                                <p class="mb-2 text-dark">Mulai :</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                        id="detail-tanggal_cetak_pertama"></span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-5">
                                                <p class="mb-2 text-dark">Tanggal Cetak Perubahan Terakhir :</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                        id="detail-tanggal_cetak_perubahan_terakhir"></span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-5">
                                                <p class="mb-2 text-dark">Alasan Penolakan :</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                        id="detail-reject"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                                data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pengalaman" role="tabpanel" aria-labelledby="pengalaman-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    Data Pengalaman Badan Usaha
                                </div>
                                <p class="fw-bolder fs-4">{{$serviceProvider->user->name}}</p>
                            </div>
                            <table cellpadding="5" style="border-collapse: collapse; width: 40%;" class="fs-6 fw-normal">
                                <tbody>
                                    <tr>
                                        <td>Alamat Badan Usaha</td>
                                        <td>:</td>
                                        <td>{{$serviceProvider->address ? $serviceProvider->address : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td>{{$serviceProvider->user->phone_number ? $serviceProvider->user->phone_number : '-'}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="mt-3 mb-3 fw-bold">Pengalaman</h4>
            <div class="table-responsive rounded-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="text-white" style="background-color: #1B3061">
                                    No
                                </td>
                                <td class="text-white" style="background-color: #1B3061">
                                    Nama
                                </td>
                                <td class="text-white" style="background-color: #1B3061">
                                    Tahun
                                </td>
                                <td class="text-white" style="background-color: #1B3061">
                                    Nilai Project
                                </td>
                                <td class="text-white" style="background-color: #1B3061">
                                    Pemberi Tugas
                                </td>
                                <td class="text-white" style="background-color: #1B3061">
                                    Kontrak
                                </td>
                                <td class="text-white" style="background-color: #1B3061">
                                    Mulai
                                </td>
                                <td class="text-white" style="background-color: #1B3061">
                                    Selesai
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($serviceProvider->projects()->where('end_date','<',now()) as $project)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$project->name}}</td>
                                <td>{{$project->year}}</td>
                                <td>{{$project->project_value}}</td>
                                <td>{{$project->dinas->user->name}}</td>
                                <td>{{$project->contractCategory->name}}</td>
                                <td>{{Carbon::parse($project->start_date)->locale('id_ID')->isoFormat('DD MMMM Y')}}</td>
                                <td>{{Carbon::parse($project->end_date)->locale('id_ID')->isoFormat('DD MMMM Y')}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    <div class="d-flex justify-content-center" style="min-height:19rem">
                                        <div class="my-auto">
                                            <img src="{{ asset('no-data.png') }}" width="300"
                                                height="300" />
                                            <h4 class="text-center mt-4">Belum Ada Pengalaman!!</h4>
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

    {{-- modal badan usaha --}}

    <div class="modal fade" id="modal-update-badan-usaha" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header d-flex align-items-center text-white" style="background-color: #1B3061">
                    <h4 class="modal-title" id="exampleModalLabel1">
                        Edit Data Badan Usaha
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: white;"></button>
                </div>
                <div class="modal-body">
                    <form action="profile-service-providers" id="form-update-badan-usaha" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Nama</label>
                                    <input name="name" type="name" value="{{ $serviceProvider->user->name }}"
                                        class="form-control" id="update-name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Email</label>
                                    <input name="email" type="email" value="{{ $serviceProvider->user->email }}"
                                        class="form-control" id="update-email">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Bentuk Badan
                                        Usaha</label>
                                    <select name="form_of_business_entity" class="form-select" id="">
                                        @if ($serviceProvider->form_of_business_entity == 'pt')
                                            <option value="pt" selected>PT</option>
                                            <option value="cv">CV</option>
                                        @elseif ($serviceProvider->form_of_business_entity == 'cv')
                                            <option value="pt">PT</option>
                                            <option value="cv" selected>CV</option>
                                        @else
                                            <option value="" selected disabled>Pilih Bentuk Badan Usaha</option>
                                            <option value="pt">PT</option>
                                            <option value="cv">CV</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Jenis Badan
                                        Usaha</label>
                                    <select name="type_of_business_entity" class="form-select" id="">
                                        @if ($serviceProvider->type_of_business_entity == 'consultant')
                                            <option value="consultant" selected>Konsultan</option>
                                            <option value="executor">Penyelenggara</option>
                                        @elseif ($serviceProvider->type_of_business_entity == 'executor')
                                            <option value="consultant">Konsultan</option>
                                            <option value="executor" selected>Penyelenggara</option>
                                        @else
                                            <option value="" selected disabled>Pilih Jenis Badan Usaha</option>
                                            <option value="consultant">Konsultan</option>
                                            <option value="executor">Penyelenggara</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="city" for="recipient-name"
                                        class="control-label mb-2">Kabupaten</label>
                                    <input name="city" value="{{ $serviceProvider->city ?? old('city') }}" type="text"
                                        class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="city" for="recipient-name"
                                        class="control-label mb-2">Provinsi</label>
                                    <input name="province" value="{{ $serviceProvider->province ?? old('province') }}" type="text"
                                        class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Kode
                                        Pos</label>
                                    <input name="postal_code" type="number" class="form-control"
                                        value="{{ $serviceProvider->postal_code ?? old('postal_code') }}" id="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Telepon</label>
                                    <input name="phone_number" value="{{ $serviceProvider->user->phone_number }}"
                                        type="number" class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Fax</label>
                                    <input name="fax" type="number" value="{{ $serviceProvider->fax ?? old('fax') }}"
                                        class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Website</label>
                                    <input name="website" type="text" value="{{ $serviceProvider->website ?? old('website') }}"
                                        class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Alamat Badan Usaha</label>
                            <textarea name="address" id="update-address" class="form-control" cols="15" rows="5">{{ $serviceProvider->address ?? old('address') }}</textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                        data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" style="background-color: #1B3061" class="btn text-white btn-create">
                        Edit
                    </button>
                </div>
                </form>
            </div>
        </div>

    </div>

    {{-- end --}}

    {{-- modal pengesahan administrasi  --}}
    <div class="modal fade" id="modal-pengesahan" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header d-flex align-items-center text-white" style="background-color: #1B3061">
                    <h4 class="modal-title" id="exampleModalLabel1">
                        Edit Pengesahan
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: white;"></button>
                </div>
                <div class="modal-body">
                    <form action="#" id="form-update-badan-usaha" method="POST">
                        @method('PUT')
                        @csrf
                        <p class="fs-5 text-dark mb-1" style="font-weight: 700">
                            Materi Kehakiman dan HAM
                        </p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <input type="number" class="form-control" placeholder="Masukkan Nomor">
                            </div>
                            <div class="col-6">
                                <input type="date" class="form-control" placeholder="Masukkan Nomor">
                            </div>
                        </div>
                        <p class="fs-5 text-dark mb-1" style="font-weight: 700">
                            Pengadilan Negeri
                        </p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <input type="number" class="form-control" placeholder="Masukkan Nomor">
                            </div>
                            <div class="col-6">
                                <input type="date" class="form-control" placeholder="Masukkan Nomor">
                            </div>
                        </div>
                        <p class="fs-5 text-dark mb-0" style="font-weight: 700">
                            Lembar Negara
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <input type="number" class="form-control" placeholder="Masukkan Nomor">
                            </div>
                            <div class="col-6">
                                <input type="date" class="form-control" placeholder="Masukkan Nomor">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                        data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" style="background-color: #1B3061" class="btn text-white btn-create">
                        Edit
                    </button>
                </div>
                </form>
            </div>
        </div>

    </div>
    {{-- end modal  --}}
    {{-- modal  akte  --}}

    <div class="modal fade" id="modal-akte" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header d-flex align-items-center text-white" style="background-color: #1B3061">
                    <h4 class="modal-title" id="exampleModalLabel1">
                        Edit Akte Pengesahan
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: white;"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('amendment-deed.store') }}" id="form-update-badan-usaha" method="POST">
                        @method('POST')
                        @csrf
                        <div class="row mb-3">
                            <div class="col-6">
                                <p class="mb-0 text-dark fs-6">
                                    No Akte
                                </p>
                                <input type="number" name="deed_number" class="form-control" placeholder="Masukkan Nomor">
                            </div>
                            <div class="col-6">
                                <p class="mb-0 text-dark fs-6">
                                    Nama Notaris
                                </p>
                                <input type="text" name="notary_name" class="form-control" placeholder="Masukkan Nama Notaris">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <p class="mb-0 text-dark fs-6">
                                    Kota / Kabupaten
                                </p>
                                <input type="text" name="city" class="form-control" placeholder="Masukkan Nomor">
                            </div>
                            <div class="col-6">
                                <p class="mb-0 text-dark fs-6">
                                    Provinsi
                                </p>
                                <input name="province" type="text" class="form-control" placeholder="Masukkan Nomor">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="mb-0 text-dark fs-6">
                                    Alamat
                                </p>
                                <textarea name="address" id="" class="form-control"></textarea>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                        data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" style="background-color: #1B3061" class="btn text-white btn-create">
                        Edit
                    </button>
                </div>
                </form>
            </div>
        </div>

    </div>
    {{-- end modal  --}}
    {{-- modal kualifikasi dan Klasifikasi --}}
    <div class="modal fade" id="modal-create-qualification" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-create" action="{{ route('service.provider.qualifications.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Tambah Kualifikasi dan Klasifikasi
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="basicpill-email-input">Klasifikasi</label>
                            <select class="form-select list-classifications select2-create" style="width:100%"
                                id="list-classifications">
                                <option value="">Pilih Klalifikasi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="basicpill-email-input">Sub Klasifikasi</label>
                            <select name="sub_classification_id" class="form-select sub-classifications select2-create"
                                style="width:100%" id="list-sub-classifications">
                            </select>
                            @error('sub_classification_id')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="basicpill-phoneno-input">Kualifikasi</label>
                            <select name="qualification_id" class="form-select list-qualifications select2-create"
                                style="width:100%" id="list-qualifications">
                                <option value="">Pilih Kualifikasi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                Tahun</label>
                            <input type="text" class="form-control" id="create-year" class="form-control"
                                name="year" aria-describedby="name" placeholder="Masukkan Tahun" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" style="background-color: #1B3061" class="btn text-white btn-create">
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-edit-qualification" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-edit-qualification" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Edit Kualifikasi dan Klasifikasi
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="basicpill-email-input">Klasifikasi</label>
                            <select class="form-select list-classifications select2-update" name="classification"
                                style="width:100%" id="update-list-classifications">
                                <option value="">Pilih Klalifikasi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="basicpill-email-input">Sub Klasifikasi</label>
                            <select name="sub_classification_id" class="form-select sub-classifications select2-update"
                                style="width:100%" id="update-list-sub-classifications">
                            </select>
                            @error('sub_classification_id')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="basicpill-phoneno-input">Kualifikasi</label>
                            <select name="qualification_id" class="form-select list-qualifications select2-update"
                                style="width:100%" id="update-list-qualifications">
                                <option value="">Pilih Kualifikasi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                Tahun</label>
                            <input type="text" class="form-control" id="create-year" class="form-control"
                                name="year" aria-describedby="name" placeholder="Masukkan Tahun" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" style="background-color: #1B3061" class="btn text-white btn-create">
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-delete-modal-component />
    {{-- end --}}
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
        $(document).ready(function() {
            $(".select2-create").select2({
                dropdownParent: $("#modal-create-qualification")
            });
            $(".select2-update").select2({
                dropdownParent: $("#modal-edit-qualification")
            });
        });

        qualifications()

        function qualifications() {
            $.ajax({
                url: "{{ route('list-qualifications') }}",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#list-qualifications').append(option);
                        $('#update-list-qualifications').append(option);
                    });
                }
            });
        }

        get();

        function get() {
            $.ajax({
                url: "{{ route('list-classifications') }}",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#update-list-classifications').append(option);
                        $('#list-classifications').append(option);
                    });
                    $('#list-classifications').change(function() {
                        var selectedClassificationId = $(this).val();
                        if (selectedClassificationId !== '') {
                            subclassifications(
                                selectedClassificationId
                            );
                        }
                    });
                    $('#update-list-classifications').change(function() {
                        var selectedClassificationId = $(this).val();
                        if (selectedClassificationId !== '') {
                            subclassifications(
                                selectedClassificationId
                            );
                        }
                    });
                }
            });
        }

        function subclassifications(classificationId) {
            $.ajax({
                url: "list-sub-classifications/" + classificationId,
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#list-sub-classifications').append(option);
                        $('#update-list-sub-classifications').append(option);
                    });
                }
            });
        }

        $('.modal-detail-qualification').click(function() {
            const data = getDataAttributes($(this).attr('id'))
            handleDetail(data)
            console.log(data);
            $('#modal-detail-qualification').modal('show')
        })
        $('.modal-edit-qualification').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `service.provider.qualifications.update/${formData['id']}`;
            $('#form-edit-qualification').attr('action', actionUrl);

            setFormValues('form-edit-qualification', formData)
            $('#form-edit-qualification').data('id', formData['id'])
            $('#form-edit-qualification').attr('action', );
            $('#modal-edit-qualification').modal('show')
        })
        $('.btn-delete-qualification').click(function() {
            id = $(this).data('id')
            var actionUrl = `service-provider-qualifications/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })

    </script>
@endsection
