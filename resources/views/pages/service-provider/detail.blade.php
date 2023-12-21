@extends('layouts.app')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="d-flex justify-content-between mb-4">
        <div class="">
            <h4 style="font-weight:800" class="text-dark mb-4">
                Detail Penyedia Jasa
            </h4>
        </div>
        <div class="">
            <a href="/all-service-provider" class="text-white btn" style="background-color: #1B3061">Kembali</a>
        </div>
    </div>
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
            <a class="nav-link" style="border: solid 1px #1B3061;" id="pengalaman-tab" data-bs-toggle="pill"
            href="#pengalaman" role="tab" role="tab" aria-controls="pengalaman" aria-selected="false">
                <div class="fw-bold">Pengalaman</div>
            </a>
            <a class="nav-link rounded-end" style="border: solid 1px #1B3061;" id="ganti-tab" data-bs-toggle="pill"
                href="#ganti" role="tab" aria-controls="ganti" aria-selected="false">
                <div class="fw-bold">Ganti Password</div>
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
            <h4 class="mt-3 mb-3 fw-bold">Akte Pendiri</h4>
            <div class="card rounded-bottom-4" style="border: 1px solid black;border-radius: 20px 20px 20px 20px;">
                <h5 class="card-header text-center border-bottom text-uppercase rounded-top-4 p-3"
                    style="background-color: #1B3061;color:white;">Akte Pendiri</h5>
                <div class="card-body">
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
                                <td>@if ($foundingDeeps && $foundingDeeps->deed_date)
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
                                        <td>{{ $verifications->judicary_date ? Carbon::parse($verifications->judicary_date)->locale('id_ID')->isoFormat('DD MMMM Y'): '-' }}
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
                            <table cellpadding="5" style="border-collapse: collapse; width: 60%;" class="fs-6 fw-normal">
                                <tbody>
                                    @if ($amendmentDeeps)
                                    <tr>
                                        <td>No Akte</td>
                                        <td>:</td>
                                        <td>{{ $amendmentDeeps->deed_number ? $amendmentDeeps->deed_number : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Notaris</td>
                                        <td>:</td>
                                        <td>{{ $amendmentDeeps->notary_name ? $amendmentDeeps->notary_name : '-' }}</td>
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
        <div class="tab-pane fade" id="pengalaman" role="tabpanel" aria-labelledby="pengalaman-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    Data Pengalaman Badan Usaha
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
                                        <td>{{ $serviceProvider->user->phone_number ? $serviceProvider->user->phone_number : '-' }}
                                        </td>
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
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->year }}</td>
                                    <td>{{ $project->project_value }}</td>
                                    <td>{{ $project->dinas->user->name }}</td>
                                    <td>{{ $project->contractCategory->name }}</td>
                                    <td>{{ Carbon::parse($project->start_date)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                    </td>
                                    <td>{{ Carbon::parse($project->end_date)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <div class="d-flex justify-content-center" style="min-height:19rem">
                                            <div class="my-auto">
                                                <img src="{{ asset('no-data.png') }}" width="300" height="300" />
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
        <div class="tab-pane fade" id="ganti" role="tabpanel" aria-labelledby="ganti-tab">
            <div class="card rounded-3">
                <h5 class="card-header rounded-top-3 border-bottom text-uppercase text-center h-20"
                    style="background-color: #1B3061;color:white;">Ganti Password</h5>
                <div class="card-body">
                    <form action="/update-password-service-provider/{{ $serviceProvider->id }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-lg-3 d-flex flex-column align-items-center">
                                <img width="90%" src="{{ asset('assets/images/Password 1.png') }}" alt="">
                            </div>
    
                            <div class="col-lg-9">
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
@endsection