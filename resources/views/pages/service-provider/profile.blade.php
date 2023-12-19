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
                                        <td>{{ $serviceProvider->form_of_business_entity ? $serviceProvider->form_of_business_entity == "pt" ? "PT" : "CV" : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Badan Usaha</td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->type_of_business_entity ? $serviceProvider->type_of_business_entity == 'consultant' ? "Konsultan" : "Penyelrnggara" : '-' }}
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
                            <th colspan="1" style="background-color: #1B3061;color:#ffffff;">Kemampuan Dasar</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle" rowspan="2"
                                colspan="1">
                                Asosiasi</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle;width:150px;"
                                rowspan="2" colspan="1">Tanggal Permohonan</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle;width:150px;"
                                rowspan="2" colspan="1">Tanggal Cetak Pertama</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle;width:150px;"
                                rowspan="2" colspan="1">Tanggal Cetak Perubahan Terakhir</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle;width:150px;"
                                rowspan="2" colspan="1">Aksi</th>
                        </tr>
                        <tr align="center">
                            <th style="background-color: #1B3061;color:#ffffff;">Tahun</th>
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
                                    {{ Carbon::parse($project->first_print)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                </td>
                                <td colspan="1">
                                    {{ Carbon::parse($project->last_print)->locale('id_ID')->isoFormat('DD MMMM Y') }}</td>
                                <td colspan="1"></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">
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
                            <table cellpadding="5" style="border-collapse: collapse; width: 40%;" class="fs-6 fw-normal">
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
                            <table cellpadding="5" style="border-collapse: collapse; width: 40%;" class="fs-6 fw-normal">
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
                                            <h4 class="text-center mt-4">Type Kosong!!</h4>
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
                                    Data Pengurus Badan Usaha
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
                                                    <h4 class="text-center mt-4">Tenaga kerja kosong!!</h4>
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
        <div class="tab-pane fade" id="pengalaman" role="tabpanel" aria-labelledby="pengalaman-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    Data Pengurus Badan Usaha
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
            <h4 class="mt-3 mb-3 fw-bold">Pengesahan</h4>
            <div class="table-responsive rounded-4">
                <table class="table table-bordered">
                    <thead>
                        <tr align="center">
                            <th style="background-color: #1B3061; color: #ffffff; vertical-align: middle" colspan="1"
                                rowspan="2">No</th>
                            <th colspan="3" style="background-color: #1B3061; color: #ffffff;">Proyek</th>
                            <th style="background-color: #1B3061; color: #ffffff; vertical-align: middle" colspan="1"
                                rowspan="2">Pemberi Tugas</th>
                            <th style="background-color: #1B3061; color: #ffffff; vertical-align: middle" colspan="1"
                                rowspan="2">Sub Bidang Kualifikasi</th>
                            <th colspan="3" style="background-color: #1B3061; color: #ffffff;">Nomor</th>
                            <th colspan="4" style="background-color: #1B3061; color: #ffffff;">Tanggal</th>
                        </tr>
                        <tr align="center">
                            <th style="background-color: #1B3061; color: #ffffff;">Tahun</th>
                            <th style="background-color: #1B3061; color: #ffffff;">Nama</th>
                            <th style="background-color: #1B3061; color: #ffffff;">Nama Rupiah (dalam Ribuan)</th>
                            <th style="background-color: #1B3061; color: #ffffff;">Kontrak</th>
                            <th style="background-color: #1B3061; color: #ffffff;">NKPK</th>
                            <th style="background-color: #1B3061; color: #ffffff;">Berita Acara Serah Terima</th>
                            <th style="background-color: #1B3061; color: #ffffff;">Berita Acara Serah Terima</th>
                            <th style="background-color: #1B3061; color: #ffffff;">Kontrak</th>
                            <th style="background-color: #1B3061; color: #ffffff;">Mulai</th>
                            <th style="background-color: #1B3061; color: #ffffff;">Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="center">
                            <td colspan="1">1</td>
                            <td colspan="1">2023</td>
                            <td colspan="1">Peningkatan Jalan Laston Paket VI Kab. Bulukumba</td>
                            <td colspan="1">123132456478</td>
                            <td colspan="1">S1</td>
                            <td colspan="1">SI0084</td>
                            <td colspan="1">1</td>
                            <td colspan="1">06/SPK/Laston/PPK/DBM/III/2015</td>
                            <td colspan="1">02/PHO/Laston-Dau/DBM/IX/2015</td>
                            <td colspan="1">02/PHO/Laston-Dau/DBM/IX/2015</td>
                            <td colspan="1">25 Juni 2023</td>
                            <td colspan="1">25 Juni 2023</td>
                            <td colspan="1">25 Juni 2023</td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>

    {{-- modal --}}

    <div class="modal fade" id="modal-update-badan-usaha" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header d-flex align-items-center text-white" style="background-color: #1B3061">
                    <h4 class="modal-title" id="exampleModalLabel1">
                        Edit Sub Klasifikasi
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
                                    <input name="city" value="{{ $serviceProvider->city }}" type="text"
                                        class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="city" for="recipient-name"
                                        class="control-label mb-2">Provinsi</label>
                                    <input name="province" value="{{ $serviceProvider->province }}" type="text"
                                        class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Kode
                                        Pos</label>
                                    <input name="postal_code" type="number" class="form-control"
                                        value="{{ $serviceProvider->postal_code }}" id="">
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
                                    <input name="fax" type="number" value="{{ $serviceProvider->fax }}"
                                        class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Website</label>
                                    <input name="website" type="text" value="{{ $serviceProvider->website }}"
                                        class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Alamat Badan Usaha</label>
                            <textarea name="address" id="update-address" class="form-control" cols="15" rows="5">{{ $serviceProvider->address }}</textarea>
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
@endsection
@section('script')
    <script></script>
@endsection
