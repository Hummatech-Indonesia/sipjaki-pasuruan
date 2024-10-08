@extends('layouts.app')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <div class="d-flex">
            <a class="nav-link rounded-start" style="border: solid 1px #1B3061;" onclick="tab('badan-usaha-tab')"
                id="badan-usaha-tab" data-bs-toggle="pill" href="#badan-usaha" role="tab" aria-controls="badan-usaha"
                aria-selected="false">
                <div class="fw-bold">Badan Usaha</div>
            </a>
            <a class="nav-link" style="border: solid 1px #1B3061;" onclick="tab('kualifikasi-klasifikasi-tab')"
                id="kualifikasi-klasifikasi-tab" data-bs-toggle="pill" href="#kualifikasi-klasifikasi" role="tab"
                aria-controls="kualifikasi-klasifikasi" aria-selected="false">
                <div class="fw-bold">Kualifikasi dan Klasifikasi</div>
            </a>
            <a class="nav-link" style="border: solid 1px #1B3061;" onclick="tab('administrasi-tab')" id="administrasi-tab"
                data-bs-toggle="pill" href="#administrasi" role="tab" aria-controls="administrasi"
                aria-selected="false">
                <div class="fw-bold">Administrasi</div>
            </a>
            <a class="nav-link rounded-end" style="border: solid 1px #1B3061;" onclick="tab('pengalaman-tab')"
                id="pengalaman-tab" data-bs-toggle="pill" href="#pengalaman" role="tab" aria-controls="pengalaman"
                aria-selected="false">
                <div class="fw-bold">Pengalaman</div>
            </a>
        </div>
    </div>
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
    <div class="tab-content mt-4" id="v-pills-tabContent">
        <div class="tab-pane fade-out" id="badan-usaha" role="tabpanel" aria-labelledby="badan-usaha-tab">
            <div class="card rounded-4">
                <div class="card-body">

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
                                        <td>
                                            Direktur
                                        </td>
                                        <td>:</td>
                                        <td>{{ $serviceProvider->directur ? $serviceProvider->directur : '-' }}</td>
                                    </tr>
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
                                        <td>{{ $serviceProvider->fax ? $serviceProvider->fax : '-' }}</td>
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
                                        <td>{{ $serviceProvider->type_of_business_entity ? ($serviceProvider->type_of_business_entity == 'consultant' ? 'Konsultan' : 'Pelaksana') : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Profile Perusahaan</td>
                                        <td>:</td>
                                        <td>
                                            @if ($serviceProvider->file)
                                                <a href="{{ asset('storage/' . $serviceProvider->file) }}" download>
                                                    <button type="submit" class="btn text-white fw-normal"
                                                        style="background-color:#2CA67A;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="14"
                                                            width="14" fill="white" transform="rotate(90)"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                                                        </svg>
                                                        <span class="ms-2">Download</span>
                                                    </button></a>
                                            @else
                                                -
                                            @endif

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade-out" id="kualifikasi-klasifikasi" role="tabpanel"
            aria-labelledby="kualifikasi-klasifikasi-tab">
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
                                rowspan="2">Klasifikasi</th>
                            <th style="background-color: #1B3061;color:#ffffff; vertical-align: middle" colspan="1"
                                rowspan="2">Sub Bidang Klasifikasi/Layanan</th>
                            <th style="background-color: #1B3061;color:#ffffff; vertical-align: middle" colspan="1"
                                rowspan="2">Nomor Kode</th>
                            <th style="background-color: #1B3061;color:#ffffff; vertical-align: middle" colspan="1"
                                rowspan="2">Kualifikasi</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle;width:150px;"
                                rowspan="2" colspan="1">Tahun Terbit</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle" rowspan="2"
                                colspan="1">
                                Asosiasi</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle" rowspan="2"
                                colspan="1">
                                File</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle;width:150px;"
                                rowspan="2" colspan="1">Tanggal Permohonan</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle;width:150px;"
                                rowspan="2" colspan="1">Tanggal Kadaluarsa</th>
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
                                <td colspan="1">{{ $serviceProviderQualification->subClassification->classification->name }}</td>
                                <td colspan="1">{{ $serviceProviderQualification->subClassification->name }}</td>
                                <td colspan="1">{{ $serviceProviderQualification->subClassification->code }}</td>
                                <td colspan="1">{{ $serviceProviderQualification->qualification->name }}</td>
                                <td colspan="1">{{ $serviceProviderQualification->year }}</td>
                                <td colspan="1">{{ $serviceProviderQualification->serviceProvider->association->name }}
                                </td>
                                <td>
                                    <a href="detail-service-provider-qualification/{{ $serviceProviderQualification->id }}"
                                        class="btn text-white" style="background-color: #1B3061">Lihat</a>
                                </td>
                                <td colspan="1">
                                    {{ Carbon::parse($serviceProviderQualification->created_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                </td>
                                <td colspan="1">
                                    {{ Carbon::parse($serviceProviderQualification->expired_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                </td>
                                <td colspan="1">

                                    @if ($serviceProviderQualification->status == 'pending')
                                        <span class="badge text-bg-warning fs-6">Pending</span>
                                    @elseif ($serviceProviderQualification->status == 'reject')
                                    <span class="badge text-bg-danger fs-6">Ditolak</span>
                                    @elseif ($serviceProviderQualification->status == 'active')
                                    <span class="badge text-bg-success fs-6">Aktif</span>
                                    @elseif (Carbon::now() > $serviceProviderQualification->expired_at )
                                    <span class="badge text-bg-danger fs-6">Kadaluarsa</span>
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
                                                    data-Tanggal_Cetak_Perubahan_Terakhir=" {{ $serviceProviderQualification->last_print? Carbon::parse($serviceProviderQualification->last_print)->locale('id_ID')->isoFormat('DD MMMM Y'): '-' }}"
                                                    data-reject="{{ $serviceProviderQualification->resend ? $serviceProviderQualification->resend : '-' }}">Detail</button>
                                            </div>
                                            <div>
                                                <button type="button"
                                                    id="btn-edit-{{ $serviceProviderQualification->id }}"
                                                    data-qualification_id="{{ $serviceProviderQualification->qualification_id }}"
                                                    data-id="{{ $serviceProviderQualification->id }}"
                                                    data-sub_classification_id="{{ $serviceProviderQualification->sub_classification_id }}"
                                                    data-classification="{{ $serviceProviderQualification->subClassification->classification_id }}"
                                                    data-year="{{ $serviceProviderQualification->year }}"
                                                    data-expired_at="{{ $serviceProviderQualification->expired_at }}"
                                                    class="btn waves-effect waves-light btn-edit-qualification d-flex flex-row gap-1 justify-content-evenly"
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
                                                    data-classification="{{ $serviceProviderQualification->subClassification->classification_id }}"
                                                    data-year="{{ $serviceProviderQualification->year }}"
                                                    data-expired_at="{{ $serviceProviderQualification->expired_at }}"
                                                    class="btn waves-effect waves-light btn-edit-qualification d-flex btn-edit flex-row gap-1 justify-content-evenly"
                                                    style="width: 90px; background-color: #FFC928; color: white"><i
                                                        class="bx bx-bx bxs-edit fs-4"></i>
                                                    <span>Edit</span></button>
                                            </div>
                                            <div>
                                                <button class="btn btn-danger btn-delete-serviceProviderQualification"
                                                    data-id="{{ $serviceProviderQualification->id }}"
                                                    id="{{ $serviceProviderQualification->id }}">
                                                    Hapus
                                                </button>
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
                                                    data-Tanggal_Cetak_Perubahan_Terakhir=" {{ $serviceProviderQualification->last_print? Carbon::parse($serviceProviderQualification->last_print)->locale('id_ID')->isoFormat('DD MMMM Y'): '-' }}"
                                                    data-reject="{{ $serviceProviderQualification->resend ? $serviceProviderQualification->resend : '-' }}">Detail</button>
                                            </div>
                                            <div>
                                                <button type="button"
                                                    id="btn-edit-{{ $serviceProviderQualification->id }}"
                                                    data-qualification_id="{{ $serviceProviderQualification->qualification_id }}"
                                                    data-id="{{ $serviceProviderQualification->id }}"
                                                    data-sub_classification_id="{{ $serviceProviderQualification->sub_classification_id }}"
                                                    data-classification="{{ $serviceProviderQualification->subClassification->classification_id }}"
                                                    data-year="{{ $serviceProviderQualification->year }}"
                                                    class="btn waves-effect waves-light btn-edit-qualification d-flex btn-edit flex-row gap-1 justify-content-evenly"
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

        <div class="tab-pane fade-out" id="administrasi" role="tabpanel" aria-labelledby="administrasi-tab">

            <h4 class="mt-3 mb-3 fw-bold">Akte Pendiri</h4>
            <div class="card rounded-bottom-4" style="border: 1px solid black;border-radius: 20px 20px 20px 20px;">
                <h5 class="card-header text-center border-bottom text-uppercase rounded-top-4 p-3"
                    style="background-color: #1B3061;color:white;">Akte Pendiri</h5>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <div class="">
                            <button data-bs-toggle="modal" data-bs-target="#modal-akte-pendiri"
                                style="background-color: #E4ECFF;" class="text-dark btn px-4 fw-bold">Edit</button>
                        </div>
                    </div>
                    <table cellpadding="5" style="border-collapse: collapse; width: 40%;" class="fs-6 fw-normal">
                        <tbody>
                            <tr>
                                <td>No Akte</td>
                                <td>:</td>
                                <td>{{ $foundingDeeps->deed_number ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Nama Notaris</td>
                                <td>:</td>
                                <td>{{ $foundingDeeps->notary_name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $foundingDeeps->address ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Kota / Kabupaten</td>
                                <td>:</td>
                                <td>{{ $foundingDeeps->city ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>:</td>
                                <td>{{ $foundingDeeps->province ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Akte</td>
                                <td>:</td>
                                <td>
                                    @if ($foundingDeeps && $foundingDeeps->deed_date)
                                        {{ Carbon::parse($foundingDeeps->deed_date)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                    @else
                                        -
                                    @endif
                                </td>
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
                                @if ($verifications)
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
                                            <td>{{ $verifications->judiciary_number ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td>{{ $verifications->judiciary_date? Carbon::parse($verifications->judiciary_date)->locale('id_ID')->isoFormat('DD MMMM Y'): '-' }}
                                            </td>
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
                                            <td>{{ $verifications->district_court_number ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td>{{ $verifications->district_court_date? Carbon::parse($verifications->district_court_date)->locale('id_ID')->isoFormat('DD MMMM Y'): '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <h5 class="text-dark mt-4" style="font-weight: 700">
                                                    Lembar Negara
                                                </h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nomor</td>
                                            <td>:</td>
                                            <td>{{ $verifications->state_institution_number ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td>{{ $verifications->state_institution_date? Carbon::parse($verifications->state_institution_date)->locale('id_ID')->isoFormat('DD MMMM Y'): '-' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                @else
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
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td>-
                                            </td>
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
                                            <td>-
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <h5 class="text-dark mt-4" style="font-weight: 700">
                                                    Lembar Negara
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
                                            <td>-
                                            </td>
                                        </tr>
                                    </tbody>
                                @endif


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
                                    @if ($amendmentDeeps)
                                        <tr>
                                            <td>No Akte</td>
                                            <td>:</td>
                                            <td>{{ $amendmentDeeps->deed_number ? $amendmentDeeps->deed_number : '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Notaris</td>
                                            <td>:</td>
                                            <td>{{ $amendmentDeeps->notary_name ? $amendmentDeeps->notary_name : '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td>{{ $amendmentDeeps->address ? $amendmentDeeps->address : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kota / Kabupaten</td>
                                            <td>:</td>
                                            <td>{{ $amendmentDeeps->city ? $amendmentDeeps->city : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Provinsi</td>
                                            <td>:</td>
                                            <td>{{ $amendmentDeeps->province ? $amendmentDeeps->province : '-' }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>No Akte</td>
                                            <td>:</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Notaris</td>
                                            <td>:</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Kota / Kabupaten</td>
                                            <td>:</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Provinsi</td>
                                            <td>:</td>
                                            <td>-</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-akte-pendiri" tabindex="-1" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content ">
                    <div class="modal-header d-flex align-items-center text-white" style="background-color: #1B3061">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Edit AKTE PENDIRI
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="color: white;"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('founding-deed.store') }}" id="form-update-badan-usaha" method="POST">
                            @method('POST')
                            @csrf
                            @if ($foundingDeeps)
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="mb-0 text-dark fs-6 form-label">
                                            No Akte
                                        </p>
                                        <input type="number" name="deed_number" class="form-control"
                                            placeholder="Masukan Nomor Akte" value="{{ $foundingDeeps->deed_number }}">
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0 text-dark fs-6 form-label">
                                            Nama Notaris
                                        </p>
                                        <input type="text" name="notary_name" class="form-control"
                                            placeholder="Masukan Nama Notaris"
                                            value="{{ $foundingDeeps->notary_name }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="mb-0 text-dark fs-6 form-label">
                                            Kota / Kabupaten
                                        </p>
                                        <input type="text" name="city" class="form-control"
                                            placeholder="Masukan Kota/Kabupaten" value="{{ $foundingDeeps->city }}">
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0 text-dark fs-6 form-label">
                                            Provinsi
                                        </p>
                                        <input name="province" type="text" class="form-control"
                                            placeholder="Masukan Provinsi" value="{{ $foundingDeeps->province }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tanggal Akte</label>
                                        <input type="date" name="deed_date" class="form-control" id=""
                                            value="{{ $foundingDeeps->deed_date }}">
                                    </div>
                                    <div class="col">
                                        <p class="mb-0 text-dark fs-6 form-label">
                                            Alamat
                                        </p>
                                        <textarea name="address" id="" class="form-control">{{ $foundingDeeps->address }}</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="mb-0 text-dark fs-6 form-label">
                                            No Akte
                                        </p>
                                        <input type="number" name="deed_number" class="form-control"
                                            placeholder="Masukan Nomor Akte">
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0 text-dark fs-6 form-label">
                                            Nama Notaris
                                        </p>
                                        <input type="text" name="notary_name" class="form-control"
                                            placeholder="Masukan Nama Notaris">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="mb-0 text-dark fs-6 form-label">
                                            Kota / Kabupaten
                                        </p>
                                        <input type="text" name="city" class="form-control"
                                            placeholder="Masukan Nama Kota/Kabupaten">
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0 text-dark fs-6 form-label">
                                            Provinsi
                                        </p>
                                        <input name="province" type="text" class="form-control"
                                            placeholder="Masukan Nama Provinsi">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tanggal Akte</label>
                                        <input type="date" name="deed_date" class="form-control" id="">
                                    </div>
                                    <div class="col">
                                        <p class="mb-0 text-dark fs-6 form-label">
                                            Alamat
                                        </p>
                                        <textarea name="address" id="" placeholder="Masukan Alamat" class="form-control"></textarea>
                                    </div>
                                </div>
                            @endif
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
        <div class="tab-pane fade-out" id="pengurus" role="tabpanel" aria-labelledby="pengurus-tab">
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
                                    {{ Carbon::parse($officer->birth_date)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                </td>
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

        <div class="modal fade" id="modal-detail-qualification" tabindex="-1" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Detail Kualifikasi dan Klasifikasi
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
        <div class="tab-pane fade-out" id="pengalaman" role="tabpanel" aria-labelledby="pengalaman-tab">
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
                                    Status
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
                            @if (auth()->user()->serviceProvider->type_of_business_entity == 'consultant')
                                @forelse ($consultantProjects as $project)
                                    <tr>
                                        <td class="fs-5">{{ $loop->iteration }}</td>
                                        <td class="fs-5">{{ $project->name }}</td>
                                        <td class="fs-5">{{ $project->fiscalYear->name }}</td>
                                        <td class="fs-5">Rp.{{ number_format($project->project_value, 0, ',', '.') }}
                                        </td>
                                        <td class="fs-5">{{ $project->dinas->user->name }}</td>
                                        <td class="fs-5">
                                            @php
                                                switch ($project->status) {
                                                    case 'canceled':
                                                        $color = '#FF0000';
                                                        $text = 'Dibatalkan';
                                                        break;
                                                    case 'nonactive':
                                                        $color = '#FFF700';
                                                        $text = 'Non Aktif';
                                                        break;
                                                    default:
                                                        $color = '#1B3061';
                                                        $text = 'Aktif';
                                                }
                                            @endphp
                                            <span class="fs-6 badge px-4 py-2"
                                                style="background-color: {{ $color }}; color: #FFFFFF">
                                                {{ $text }}
                                            </span>
                                        </td>
                                        <td class="fs-5">
                                            {{ Carbon::parse($project->start_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                        </td>
                                        <td class="fs-5">
                                            {{ Carbon::parse($project->end_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                        </td>
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
                            @else
                                @forelse ($executorProjects as $project)
                                    <tr>
                                        <td class="fs-5">{{ $loop->iteration }}</td>
                                        <td class="fs-5">{{ $project->name }}</td>
                                        <td class="fs-5">{{ $project->fiscalYear->name }}</td>
                                        <td class="fs-5">Rp.{{ number_format($project->project_value, 0, ',', '.') }}
                                        </td>
                                        <td class="fs-5">{{ $project->consultantProject->dinas->user->name }}</td>
                                        <td class="fs-5">
                                            @php
                                                switch ($project->status) {
                                                    case 'canceled':
                                                        $color = '#FF0000';
                                                        $text = 'Dibatalkan';
                                                        break;
                                                    case 'nonactive':
                                                        $color = '#FFF700';
                                                        $text = 'Non Aktif';
                                                        break;
                                                    default:
                                                        $color = '#1B3061';
                                                        $text = 'Aktif';
                                                }
                                            @endphp
                                            <span class="fs-6 badge px-4 py-2"
                                                style="background-color: {{ $color }}; color: #FFFFFF">
                                                {{ $text }}
                                            </span>
                                        </td>
                                        <td class="fs-5">
                                            {{ Carbon::parse($project->start_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                        </td>
                                        <td class="fs-5">
                                            {{ Carbon::parse($project->end_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                        </td>
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
                            @endif
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
                    <form action="profile-service-providers/{{ $serviceProvider->user->id }}"
                        enctype="multipart/form-data" id="form-update-badan-usaha" method="POST">
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
                                    <label id="name" for="recipient-name"
                                        class="control-label mb-2">Direktur</label>
                                    <input name="directur" type="name" value="{{ $serviceProvider->directur }}"
                                        class="form-control" id="update-directur">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Profile
                                        Perusahaan</label>
                                    <input name="file" type="file" value="{{ $serviceProvider->file }}"
                                        class="form-control" id="update-file">
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
                                            <option value="executor">Pelaksana</option>
                                        @elseif ($serviceProvider->type_of_business_entity == 'executor')
                                            <option value="consultant">Konsultan</option>
                                            <option value="executor" selected>Pelaksana</option>
                                        @else
                                            <option value="" selected disabled>Pilih Jenis Badan Usaha</option>
                                            <option value="consultant">Konsultan</option>
                                            <option value="executor">Pelaksana</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="city" for="recipient-name"
                                        class="control-label mb-2">Kabupaten</label>
                                    <input name="city" value="{{ $serviceProvider->city ?? old('city') }}"
                                        type="text" class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="city" for="recipient-name"
                                        class="control-label mb-2">Provinsi</label>
                                    <input name="province" value="{{ $serviceProvider->province ?? old('province') }}"
                                        type="text" class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Kode
                                        Pos</label>
                                    <input name="postal_code" type="number" class="form-control"
                                        value="{{ $serviceProvider->postal_code ?? old('postal_code') }}"
                                        id="">
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
                                    <input name="fax" type="number"
                                        value="{{ $serviceProvider->fax ?? old('fax') }}" class="form-control"
                                        id="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Website</label>
                                    <input name="website" type="text"
                                        value="{{ $serviceProvider->website ?? old('website') }}" class="form-control"
                                        id="">
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
                    <form action="{{ route('verification-service-provider.store') }}" id="form-update-badan-usaha"
                        method="POST">
                        @method('POST')
                        @csrf
                        @if ($verifications)
                            <p class="fs-5 text-dark mb-1" style="font-weight: 700">
                                Materi Kehakiman dan HAM
                            </p>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <input type="number"
                                        value="{{ $verifications->judiciary_number ? $verifications->judiciary_number : '-' }}"
                                        name="judiciary_number" class="form-control"
                                        placeholder="Masukan Nomor Materi Kehakiman Dan HAM">
                                </div>
                                <div class="col-6">
                                    <input type="date" name="judiciary_date" class="form-control"
                                        value="{{ $verifications->judiciary_date ? $verifications->judiciary_date : '-' }}"
                                        placeholder="Masukan Tanggal">
                                </div>
                            </div>
                            <p class="fs-5 text-dark mb-1" style="font-weight: 700">
                                Pengadilan Negeri
                            </p>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <input
                                        type="number"value="{{ $verifications->district_court_number ? $verifications->district_court_number : '-' }}"
                                        name="district_court_number" class="form-control"
                                        placeholder="Masukan Nomor Pengadilan Negeri">
                                </div>
                                <div class="col-6">
                                    <input
                                        type="date"value="{{ $verifications->district_court_date ? $verifications->district_court_date : '-' }}"
                                        name="district_court_date" class="form-control"
                                        placeholder="Masukan Nomor Pengadilan Negeri">
                                </div>
                            </div>
                            <p class="fs-5 text-dark mb-0" style="font-weight: 700">
                                Lembar Negara
                            </p>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text"
                                        value="{{ $verifications->state_institution_number ? $verifications->state_institution_number : '-' }}"
                                        name="state_institution_number" class="form-control"
                                        placeholder="Masukan Lembar Negara">
                                </div>
                                <div class="col-6">
                                    <input type="date"
                                        value="{{ $verifications->state_institution_date ? $verifications->state_institution_date : '-' }}"
                                        name="state_institution_date" class="form-control" placeholder="Masukan Nomor">
                                </div>
                            </div>
                        @else
                            <p class="fs-5 text-dark mb-1" style="font-weight: 700">
                                Materi Kehakiman dan HAM
                            </p>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <input type="number" value="" name="judiciary_number" class="form-control"
                                        placeholder="Masukan Nomor Materi Kehakiman Dan HAM">
                                </div>
                                <div class="col-6">
                                    <input type="date" name="judiciary_date" class="form-control" value=""
                                        placeholder="Masukan Nomor Materi Kehakiman Dan HAM">
                                </div>
                            </div>
                            <p class="fs-5 text-dark mb-1" style="font-weight: 700">
                                Pengadilan Negeri
                            </p>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <input type="number" value="" name="district_court_number"
                                        class="form-control" placeholder="Masukan Nomor Pengesahan Pengadilan Negeri">
                                </div>
                                <div class="col-6">
                                    <input type="date" value="" name="district_court_date" class="form-control"
                                        placeholder="Masukan Nomor Pengesahan Pengadilan Negeri">
                                </div>
                            </div>
                            <p class="fs-5 text-dark mb-0" style="font-weight: 700">
                                Lembar Negara
                            </p>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" value="" name="state_institution_number"
                                        class="form-control" placeholder="Masukan Nomor Lembaga Negara">
                                </div>
                                <div class="col-6">
                                    <input type="date" value="" name="state_institution_date"
                                        class="form-control" placeholder="Masukan Nomor Lembar Negara">
                                </div>
                            </div>
                        @endif
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
                        @if ($amendmentDeeps)
                            <div class="row mb-3">
                                <div class="col-6">
                                    <p class="mb-0 text-dark fs-6 form-label">
                                        No Akte
                                    </p>
                                    <input type="number"
                                        value="{{ $amendmentDeeps->deed_number ? $amendmentDeeps->deed_number : '' }}"
                                        name="deed_number" class="form-control" placeholder="Masukan Nomor Akte">
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 text-dark fs-6 form-label">
                                        Nama Notaris
                                    </p>
                                    <input type="text"
                                        value="{{ $amendmentDeeps->notary_name ? $amendmentDeeps->notary_name : '-' }}"
                                        name="notary_name" class="form-control" placeholder="Masukan Nama Notaris">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <p class="mb-0 text-dark fs-6 form-label">
                                        Kota / Kabupaten
                                    </p>
                                    <input type="text"
                                        name="{{ $amendmentDeeps->city ? $amendmentDeeps->city : '-' }}" name="city"
                                        class="form-control" placeholder="Masukan Nama Kota Kabupaten">
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 text-dark fs-6 form-label">
                                        Provinsi
                                    </p>
                                    <input name="province" type="text"
                                        value="{{ $amendmentDeeps->province ? $amendmentDeeps->province : '-' }}"
                                        class="form-control" placeholder="Masukan Nama Provinsi">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="mb-0 text-dark fs-6 form-label">
                                        Alamat
                                    </p>
                                    <textarea name="address" id="" placeholder="Masukan Alamat" class="form-control">{{ $amendmentDeeps->address ? $amendmentDeeps->address : '-' }}</textarea>
                                </div>
                            </div>
                        @else
                            <div class="row mb-3">
                                <div class="col-6">
                                    <p class="mb-0 text-dark fs-6 form-label">
                                        No Akte
                                    </p>
                                    <input type="number" name="deed_number" class="form-control"
                                        placeholder="Masukan Nomor">
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 text-dark fs-6 form-label">
                                        Nama Notaris
                                    </p>
                                    <input type="text" name="notary_name" class="form-control"
                                        placeholder="Masukan Nama Notaris">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <p class="mb-0 text-dark fs-6 form-label">
                                        Kota / Kabupaten
                                    </p>
                                    <input type="text" name="city" class="form-control"
                                        placeholder="Masukan Nomor">
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 text-dark fs-6 form-label">
                                        Provinsi
                                    </p>
                                    <input name="province" type="text" class="form-control"
                                        placeholder="Masukan Nomor">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="mb-0 text-dark fs-6 form-label">
                                        Alamat
                                    </p>
                                    <textarea name="address" id="" class="form-control"></textarea>
                                </div>
                            </div>
                        @endif

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
                <form id="form-create" action="{{ route('service.provider.qualifications.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Tambah Kualifikasi dan Klasifikasi
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
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
                            <label for="basicpill-email-input">File</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="basicpill-phoneno-input">Kualifikasi</label>
                            <select name="qualification_id" class="form-select list-qualifications select2-create"
                                style="width:100%" id="list-qualifications">
                                <option value="">Pilih Kualifikasi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label id="name" for="recipient-name" class="control-label mb-2">
                                Tahun Terbit</label>
                            <input type="text" class="form-control" id="create-year" class="form-control"
                                name="year" aria-describedby="name" placeholder="Masukan Tahun" />
                        </div>
                        <div class="mb-3">
                            <label id="name" for="recipient-name" class="control-label mb-2">
                                Berlaku Sampai</label>
                            <input type="date" class="form-control" class="form-control" name="expired_at"
                                aria-describedby="name" placeholder="Berlaku Sampai" />
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
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
                            <label for="basicpill-phoneno-input">File</label>
                            <input type="file" name="file" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label id="name" for="recipient-name" class="control-label mb-2">
                                Tahun Terbit</label>
                            <input type="text" class="form-control" id="create-year" class="form-control"
                                name="year" aria-describedby="name" placeholder="Masukan Tahun" />
                        </div>
                        <div class="mb-3">
                            <label id="name" for="recipient-name" class="control-label mb-2">
                                Berlaku Sampai</label>
                            <input type="date" class="form-control" class="form-control" name="expired_at"
                                aria-describedby="name" placeholder="Berlaku Sampai" />
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
    <div class="modal fade bs-example-modal-md" id="modal-detail-tenaga-kerja" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Detail Tenaga Kerja</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <p class="mt-3 fs-5 text-dark mb-2" style="font-weight: 700">
                                <span id="detail-name-worker"></span>
                            </p>
                            <div class="">
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Tanggal Lahir :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-birth_date"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Pendidikan :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-education"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">No. Registrasi :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-registration_number"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Jenis Sertifikat :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-cerificate"></span></p>
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
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <x-delete-modal-component />
    {{-- end --}}
@endsection
@section('script')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tab = localStorage.getItem('tab');
            var defaultTabId = 'badan-usaha-tab';
            var selectedTabId = tab ? tab : defaultTabId;

            var selectedTab = document.getElementById(selectedTabId);
            if (selectedTab) {
                showTab(selectedTab);
            }

            var tabs = document.querySelectorAll('.nav-link');
            tabs.forEach(function(tab) {
                tab.addEventListener('click', function(event) {
                    event.preventDefault();
                    var targetId = tab.getAttribute('href').substring(1);
                    localStorage.setItem('tab', tab.id);
                    showTab(tab);
                });
            });

            function showTab(tab) {
                var activeTab = document.querySelector('.nav-link.active');
                var activePane = document.querySelector('.tab-pane.show.active');
                if (activeTab) {
                    activeTab.classList.remove('active');
                    activeTab.setAttribute('aria-selected', 'false');
                }
                if (activePane) {
                    activePane.classList.remove('show', 'active');
                }

                var targetPaneId = tab.getAttribute('href').substring(1);
                var targetPane = document.getElementById(targetPaneId);
                tab.classList.add('active');
                tab.setAttribute('aria-selected', 'true');
                if (targetPane) {
                    targetPane.classList.add('show', 'active');
                }
            }
        });

        function tab(tab) {
            localStorage.setItem('tab', tab);
        }


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
                    $('#update-list-classifications').empty();
                    $('#list-classifications').empty();

                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`;
                        $('#update-list-classifications').append(option);
                        $('#list-classifications').append(option);
                    });

                    $('#list-classifications').change(function() {
                        var selectedClassificationId = $(this).val();
                        $('#list-sub-classifications')
                            .empty(); // Menghapus opsi sebelum menambahkan yang baru
                        if (selectedClassificationId !== '') {
                            subclassifications(selectedClassificationId, '#list-sub-classifications');
                        }
                    });

                    $('#update-list-classifications').change(function() {
                        var selectedClassificationId = $(this).val();
                        $('#update-list-sub-classifications')
                            .empty(); // Menghapus opsi sebelum menambahkan yang baru
                        if (selectedClassificationId !== '') {
                            subclassifications(selectedClassificationId,
                                '#update-list-sub-classifications');
                        }
                    });
                }
            });
        }

        function subclassifications(classificationId, targetElement) {
            $.ajax({
                url: "list-sub-classifications/" + classificationId,
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $(targetElement).empty();

                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`;
                        $(targetElement).append(option);
                    });
                }
            });
        }

        $('.btn-detail-tenaga-kerja').click(function() {
            const data = getDataAttributes($(this).attr('id'))
            handleDetail(data)
            $('#modal-detail-tenaga-kerja').modal('show')
        })

        $('.modal-detail-qualification').click(function() {
            const data = getDataAttributes($(this).attr('id'))
            handleDetail(data)
            $('#modal-detail-qualification').modal('show')
        })
        $('.btn-edit-qualification').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `service-provider-qualifications/${formData['id']}`;
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
        $('.btn-delete-serviceProviderQualification').click(function() {
            id = $(this).data('id')
            var actionUrl = `service-provider-qualification/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection
