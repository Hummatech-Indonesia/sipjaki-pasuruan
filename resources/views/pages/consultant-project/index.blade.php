@extends('layouts.app')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <p class="fs-4 text-dark" style="font-weight: 600">
        Paket Konsultan
    </p>

    @if (Auth::user()->roles->pluck('name')[0] == 'service provider')
        <div class="row">
            <div class="col-md-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <div class="ms-2">
                                    <span class="badge bg-info text-light-primary fs-5">2002</span>
                                </div>
                                <div class="ms-2 mt-2">
                                    <h4>
                                        Paket Konsultan Dinas Perhutani
                                    </h4>
                                </div>
                                <table cellpadding="10" style="border-collapse: collapse; width: 75%;">
                                    <tbody>
                                        <tr>
                                            <td>Nilai Kontrak</td>
                                            <td>:</td>
                                            <td>10000000
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Progres Fisik</td>
                                            <td>:</td>
                                            <td>12 %
                                        </tr>
                                        <tr>
                                            <td>Progres Keuangan</td>
                                            <td>:</td>
                                            <td>12%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td> Aktif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mulai</td>
                                            <td>:</td>
                                            <td>12 Januari 2002
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Selesai</td>
                                            <td>:</td>
                                            <td>12 Mei 2022
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sumber Dana</td>
                                            <td>:</td>
                                            <td>APBN</td>
                                        </tr>
                                        <tr>
                                            <td>Dinas</td>
                                            <td>:</td>
                                            <td colspan="2" style="vertical-align: top;">
                                                Dinas Perhutani</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kontrak</td>
                                            <td>:</td>
                                            <td>Tetap</td>
                                        </tr>
                                        <tr>
                                            <td>Karakteristik Kontrak</td>
                                            <td>:</td>
                                            <td>Single</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="ms-2 fw">
                                <p class="fw-medium fs-5" style="margin-bottom: 25%;">Daftar File</p>
                            </div>
                            <div>
                                <div data-bs-toggle="modal" data-bs-target="#modal-create" class="btn  rounded-3"
                                    style="background-color:#1B3061; color:white;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 24 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                                            fill="white" />
                                    </svg> Upload File
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">

                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th></th>
                                        <th>File</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Kontrak</td>
                                        <td>:</td>
                                        <td>
                                            <a href="#" type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Berita Acara Serah Terima</td>
                                        <td>:</td>
                                        <td>
                                            <a href="#" type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Berita Acara Administrasi</td>
                                        <td>:</td>
                                        <td>
                                            <a href="#" type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Berita Acara Pencairan</td>
                                        <td>:</td>
                                        <td>
                                            <a href="#" type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Dokumen Pendukung / Laporan</td>
                                        <td>:</td>
                                        <td>
                                            <a href="#" type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal-xl" id="modal-create" tabindex="-1" role="dialog"
            aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div style="background-color: #1B3061;">
                        <h5 class="modal-title text-white text-center m-3 fs-4">Tambah
                            {{ Auth::user()->serviceProvider->type_of_business_entity == 'consultant' ? 'Progress' : 'File' }}
                        </h5>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                        <label class="form-label">Kontrak</label>
                                        <input class="form-control" accept=".pdf" type="file"
                                            value="{{ old('contract') }}" name="contract" id="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                        <label class="form-label">Berita Acara Serah Terima</label>
                                        <input class="form-control" type="file" value="{{ old('uitzet_minutes') }}"
                                            name="uitzet_minutes" accept=".pdf" id="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                        <label class="form-label">Berita Acara Administrasi</label>
                                        <input class="form-control" type="file"
                                            value="{{ old('administrative_minutes') }}" name="administrative_minutes"
                                            accept=".pdf" id="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                        <label class="form-label">Berita Acara Pencairan</label>
                                        <input class="form-control" type="file"
                                            value="{{ old('minutes_of_disbursement') }}" name="minutes_of_disbursement"
                                            accept=".pdf" id="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                        <label class="form-label">Dokumen Pendukung / Laporan</label>
                                        <input class="form-control" type="file" value="{{ old('mitual_check_0') }}"
                                            name="minutes_of_mutual_check_0" accept=".pdf" id="">
                                    </div>
                                </div>
                                <div class="d-flex d-row justify-content-end mt-3">
                                    <button type="button" class="btn btn-danger btn-md me-2" data-bs-dismiss="modal"
                                        aria-label="Close">Batal</button>
                                    <button type="submit" style="background-color: #1B3061; color:white;"
                                        class="btn btn-md">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    @endif


    <div class="d-flex justify-content-between ">
        @if (Auth::user()->serviceProvider->type_of_business_entity != 'consultant')
            <form action="" method="GET" class="d-flex gap-3 col-8">
                <input type="search" id="search-name" value="{{ request()->name }}" name="name"
                    class="form-control" placeholder="Search">

                @if (auth()->user()->role() == 'admin' ||
                        auth()->user()->role() == 'superadmin')
                    <select name="dinas_id" id="search-status" class="form-control ml-3">
                        <option value="">Semua Dinas</option>
                        @foreach ($dinases as $dinas)
                            <option {{ request()->dinas_id == $dinas->id ? 'selected' : '' }} value="{{ $dinas->id }}">
                                {{ $dinas->user->name }}</option>
                        @endforeach
                    </select>
                @endif
                <select name="year" id="search-year" class="form-control">
                    <option value="" selected>Tampilkan Semua Tahun</option>
                    @foreach ($fiscalYears as $fiscalYear)
                        <option {{ request()->year == $fiscalYear->id ? 'selected' : '' }} value="{{ $fiscalYear->id }}">
                            {{ $fiscalYear->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn text-white d-flex items-center gap-2" style="background-color:#1B3061">
                    Cari <i class="fa fa-search my-auto"></i>
                </button>
                <button id="export-pdf" type="button" class="btn btn-danger d-flex items-center gap-2">
                    PDF<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="white"
                            d="m23 12l-4-4v3h-9v2h9v3M1 18V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3h-2V6H3v12h12v-3h2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2Z" />
                    </svg>
                    </i>
                </button>
                <button id="export-excel" type="button" class="btn btn-success d-flex items-center gap-2">
                    Excel<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="white"
                            d="m23 12l-4-4v3h-9v2h9v3M1 18V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3h-2V6H3v12h12v-3h2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2Z" />
                    </svg>
                    </i>
                </button>

            </form>
        @endif

        @if (auth()->user()->dinas)
            <div class="">
                <button data-bs-toggle="modal" data-bs-target="#modal-create" class="btn text-white"
                    style="background-color:#1B3061">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                            fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                            fill="white" />
                    </svg>Tambah
                </button>
            </div>
        @endif
    </div>
    @if (auth()->user()->dinas)
        <div class="modal fade bs-example-modal-xl" id="modal-create" tabindex="-1" role="dialog"
            aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #1B3061">
                        <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah </h5>
                        <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('consultant-projects.store') }}" method="POST" id="form-create">
                            @csrf
                            <div id="basic-example">
                                <!-- Seller Details -->
                                <h3>informasi Umum</h3>
                                <section>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-name">Nama Paket Konsultan</label>
                                                <input type="text" class="form-control" name="name"
                                                    id="basicpill-name" placeholder="masukan nama pekerjaan"
                                                    value="{{ old('name') ? old('name') : 'Paket Konsultan Dinas ' . auth()->user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-fiscal_year_id">Tahun</label>
                                                <select name="fiscal_year_id" class="form-control select2-create"
                                                    style="width:100%" id="basicpill-fiscal_year_id">
                                                    @foreach ($fiscalYears as $fiscalYear)
                                                        <option value="{{ $fiscalYear->id }}"
                                                            {{ old('fund_source_id') == $fiscalYear->id ? 'selected' : '' }}>
                                                            {{ $fiscalYear->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-penyedia-jasa">Konsultan</label>
                                                <select class="form-control select2-create" style="width:100%"
                                                    name="service_provider_id" id="basicpill-konsultan">
                                                    @foreach ($consultants as $consultant)
                                                        <option value="{{ $consultant->id }}"
                                                            {{ old('service_provider_id') == $consultant->id ? 'selected' : '' }}>
                                                            {{ $consultant->user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-fund_source_id">Sumber Dana</label>
                                                <select name="fund_source_id" class="form-control select2-create"
                                                    style="width:100%" id="basicpill-fund_source_id">
                                                    @foreach ($fundSources as $fundSource)
                                                        <option value="{{ $fundSource->id }}"
                                                            {{ old('fund_source_id') == $fundSource->id ? 'selected' : '' }}>
                                                            {{ $fundSource->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <!-- Company Document -->
                                <h3>Kontrak</h3>
                                <section>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-nilai_kontrak">Nilai Kontrak</label>
                                                <input type="number" class="form-control" name="project_value"
                                                    id="basicpill-nilai_kontrak" placeholder="Masukan nilai kontrak"
                                                    value="{{ old('project_value') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-contract_category_id">Jenis kontrak</label>
                                                <select name="contract_category_id" class="form-control select2-create"
                                                    style="width:100%" id="basicpill-contract_category_id">
                                                    @foreach ($contractCategories as $contractCategory)
                                                        <option value="{{ $contractCategory->id }}"
                                                            {{ old('contract_category_id') == $contractCategory->id ? 'selected' : '' }}>
                                                            {{ $contractCategory->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-cstno-input">Karakteristik Kontrak</label>
                                                <select name="characteristic_project" class="form-select">
                                                    <option value="single"
                                                        {{ old('characteristic_project') == 'single' ? 'selected' : '' }}>
                                                        tahun tunggal
                                                    </option>
                                                    <option value="multiple"
                                                        {{ old('characteristic_project') == 'multiple' ? 'selected' : '' }}>
                                                        tahun jamak
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Status</label>
                                                <select name="status" class="form-select">
                                                    <option disabled>Pilih status</option>
                                                    <option value="active"
                                                        {{ old('status') == 'active' ? 'selected' : '' }}>
                                                        Aktif</option>
                                                    <option value="nonactive"
                                                        {{ old('status') == 'nonactive' ? 'selected' : '' }}>Nonaktif
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-start_at">Mulai</label>
                                                <input type="date" name="start_at" class="form-control"
                                                    id="basicpill-start_at" value="{{ old('start_at') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-end_at">Selesai</label>
                                                <input type="date" name="end_at" class="form-control"
                                                    id="basicpill-end_at" value="{{ old('end_at') }}">
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <!-- Bank Details -->
                                <h3>Detail (optional)</h3>
                                <section>
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-physical_progress_start">Progress Keuangan
                                                        Pada</label>
                                                    <input type="date" class="form-control"
                                                        name="finance_progress_start"
                                                        id="basicpill-physical_progress_start"
                                                        value="{{ old('finance_progress_start') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-declaration-input">Progress Keuangan(%)</label>
                                                    <input type="number" name="finance_progress" class="form-control"
                                                        id="basicpill-Declaration-input"
                                                        placeholder="Masukan progress keuangan"
                                                        value="{{ old('finance_progress') ? old('finance_progress') : '0' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </form>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    @endif

    <div class="row mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            <h4>Paket Pekerjaan</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-borderless" border="1">
                <thead>
                    <tr>
                        <th class="text-center table-sipjaki">No</th>
                        <th class="text-center table-sipjaki">Nama</th>
                        @if (!auth()->user()->dinas)
                            <th class="text-center table-sipjaki">Dinas</th>
                        @endif
                        <th class="text-center table-sipjaki">Konsultan</th>
                        <th class="text-center table-sipjaki">Tahun</th>
                        <th class="text-center table-sipjaki">Nilai Kontrak</th>
                        <th class="text-center table-sipjaki">Progress</th>
                        <th class="text-center table-sipjaki">Aksi</th>
                    </tr>
                </thead>
                @forelse ($consultantProjects as $consultantProject)
                    <tbody>
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-center">
                                {{ $consultantProject->name }}
                            </td>
                            @if (!auth()->user()->dinas)
                                <td class="text-center">
                                    {{ $consultantProject->dinas->user->name }}
                                </td>
                            @endif
                            <td class="text-center">
                                {{ $consultantProject->serviceProvider->user->name }}
                            </td>
                            <td class="text-center">
                                {{ $consultantProject->fiscalYear->name }}
                            </td>
                            <td class="text-center">
                                Rp.{{ number_format($consultantProject->project_value, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                {{ $consultantProject->finance_progress }}%
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    @if (auth()->user()->dinas)
                                        <div class="d-flex justify-content-center mb-2">
                                            <button data-id="{{ $consultantProject->id }}"
                                                style="min-width: 90px;width:100%"
                                                class="btn btn-danger btn-delete d-flex"><i
                                                    class="bx bx-bx bxs-trash fs-4 me-1"></i>
                                                Hapus</button>
                                        </div>
                                        <div class="d-flex justify-content-center mb-2">
                                            <button style="min-width: 90px;width:100%"
                                                class="d-flex btn btn-edit btn-warning"
                                                id="btn-edit-{{ $consultantProject->id }}"
                                                data-id="{{ $consultantProject->id }}"
                                                data-name="{{ $consultantProject->name }}"
                                                data-year="{{ $consultantProject->year }}"
                                                data-status="{{ $consultantProject->status }}"
                                                data-start_at="{{ \Carbon\Carbon::parse($consultantProject->start_at)->format('Y-m-d') }}"
                                                data-end_at="{{ \Carbon\Carbon::parse($consultantProject->end_at)->format('Y-m-d') }}"
                                                data-finance_progress="{{ $consultantProject->finance_progress }}"
                                                data-finance_progress_start="{{ \Carbon\Carbon::parse($consultantProject->finance_progress_start)->format('Y-m-d') }}"
                                                data-physical_progress="{{ $consultantProject->physical_progress }}"
                                                data-physical_progress_start="{{ \Carbon\Carbon::parse($consultantProject->physical_progress_start)->format('Y-m-d') }}"
                                                data-project_value="{{ $consultantProject->project_value }}"
                                                data-fund_source_id="{{ $consultantProject->fund_source_id }}"
                                                data-service_provider_id="{{ $consultantProject->service_provider_id }}"
                                                data-contract_category_id="{{ $consultantProject->contract_category_id }}"
                                                data-consultant_id="{{ $consultantProject->consultant_id }}"
                                                data-executor_id="{{ $consultantProject->executor_id }}"
                                                data-characteristic_project="{{ $consultantProject->characteristic_project }}"><i
                                                    class="bx bx-bx bxs-edit fs-4 me-1"></i> Edit</button>
                                        </div>
                                    @endif
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="/detail-project-dinas/{{ $consultantProject->id }}"
                                            style="min-width: 90px;width:100%;background-color: #1B3061"
                                            class="btn text-white btn-detail"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="19" height="19" viewBox="0 0 24 24" fill="none">
                                                <path d="M4.5 12.5C7.5 6 16.5 6 19.5 12.5" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M12 16C10.8954 16 10 15.1046 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16Z"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg> Detail</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            <div class="d-flex justify-content-center" style="min-height:16rem">
                                <div class="my-auto">
                                    <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                    <h4 class="text-center mt-4">Paket Pekerjaan Masih Kosong!!</h4>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>

    <div class="modal fade bs-example-modal-md" id="modal-detail" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Detail Pekerjaan</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="badge bg-info">
                        <p class="mb-0 px-3 py-1 fs-6">
                            <span id="detail-year"></span>
                        </p>
                    </div>
                    <p class="mt-3 fs-5 text-dark mb-2" style="font-weight: 700">
                        <span id="detail-name"></span>
                    </p>
                    <table cellpadding="7" style="border-collapse: collapse;width:100%;" class="fs-6 fw-normal">
                        <tbody>
                            <tr>
                                <td class="fw-bold">Nilai Kontrak</td>
                                <td>:</td>
                                <td id="detail-project_value"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Progres Fisik</td>
                                <td>:</td>
                                <td id="detail-physical_progress"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Progres Keuangan</td>
                                <td>:</td>
                                <td id="detail-finance_progress"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Status</td>
                                <td>:</td>
                                <td id="detail-status"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Konsultan</td>
                                <td>:</td>
                                <td id="detail-konsultan"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Penyelenggara</td>
                                <td>:</td>
                                <td id="detail-executor"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Mulai</td>
                                <td>:</td>
                                <td id="detail-start_at"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Selesai</td>
                                <td>:</td>
                                <td id="detail-end_at"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Fisik Bulan</td>
                                <td>:</td>
                                <td id="detail-physical_progress_start"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Keuangan Bulan</td>
                                <td>:</td>
                                <td id="detail-finance_progress_start"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Sumber Dana</td>
                                <td>:</td>
                                <td id="detail-fund_source"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">jenis Kontrak</td>
                                <td>:</td>
                                <td id="detail-contract_category_name"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Karakteristik Kontrak</td>
                                <td>:</td>
                                <td id="detail-characteristic_project_name"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div class="modal fade bs-example-modal-xl" id="modal-update" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah </h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <form method="POST" id="form-update">
                        @csrf
                        @method('PUT')
                        <div id="basic-update">
                            <!-- Seller Details -->
                            <h3>informasi Umum</h3>
                            <section>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-name">Nama Pekerjaan</label>
                                            <input type="text" class="form-control" name="name" id="update-name"
                                                placeholder="masukan nama pekerjaan" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-fiscal_year_id">Tahun</label>
                                            <select name="fiscal_year_id" class="form-control select2-update"
                                                style="width:100%" id="update-fiscal_year_id">
                                                @foreach ($fiscalYears as $fiscalYear)
                                                    <option value="{{ $fiscalYear->id }}"
                                                        {{ old('fiscal_year_id') == $fiscalYear->id ? 'selected' : '' }}>
                                                        {{ $fiscalYear->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-fund_source_id">Sumber Dana</label>
                                            <select name="fund_source_id" class="form-control select2-update"
                                                style="width:100%" id="update-fund_source_id">
                                                @foreach ($fundSources as $fundSource)
                                                    <option value="{{ $fundSource->id }}"
                                                        {{ old('fund_source_id') == $fundSource->id ? 'selected' : '' }}>
                                                        {{ $fundSource->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-penyedia-jasa">Konsultan</label>
                                            <select class="form-control select2-update" style="width:100%"
                                                name="consultant_id" id="update-konsultan">
                                                @foreach ($consultants as $serviceProvider)
                                                    <option value="{{ $serviceProvider->id }}"
                                                        {{ old('service_provider_id') == $serviceProvider->id ? 'selected' : '' }}>
                                                        {{ $serviceProvider->user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Company Document -->
                            <h3>Kontrak</h3>
                            <section>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-nilai_kontrak">Nilai Kontrak</label>
                                            <input type="number" class="form-control" name="project_value"
                                                id="update-nilai_kontrak" placeholder="Masukan nilai kontrak"
                                                value="{{ old('project_value') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-contract_category_id">Jenis kontrak</label>
                                            <select name="contract_category_id" class="form-control select2-update"
                                                style="width:100%" id="update-contract_category_id">
                                                @foreach ($contractCategories as $contractCategory)
                                                    <option value="{{ $contractCategory->id }}"
                                                        {{ old('contract_category_id') == $contractCategory->id ? 'selected' : '' }}>
                                                        {{ $contractCategory->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-cstno-input">karakteristik Kontrak</label>
                                            <select name="characteristic_project" class="form-select">
                                                <option value="single"
                                                    {{ old('characteristic_project') == 'single' ? 'selected' : '' }}>
                                                    tahun tunggal
                                                </option>
                                                <option value="multiple"
                                                    {{ old('characteristic_project') == 'multiple' ? 'selected' : '' }}>
                                                    tahun jamak
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <select name="status" class="form-select">
                                                <option disabled>Pilih status</option>
                                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                                                    Aktif</option>
                                                <option value="nonactive"
                                                    {{ old('status') == 'nonactive' ? 'selected' : '' }}>Nonaktif
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-start_at">Mulai</label>
                                            <input type="date" name="start_at" class="form-control"
                                                id="update-start_at" value="{{ old('start_at') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-end_at">Selesai</label>
                                            <input type="date" name="end_at" class="form-control" id="update-end_at"
                                                value="{{ old('end_at') }}">
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Bank Details -->
                            <h3>Detail (optional)</h3>
                            <section>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="update-physical_progress_start">Progress Fisik Pada</label>
                                                <input type="date" name="physical_progress_start" class="form-control"
                                                    id="update-physical_progress_start"
                                                    value="{{ old('physical_progress_start') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="update-servicetax-input">Progress Fisik(%)</label>
                                                <input type="number" name="physical_progress" class="form-control"
                                                    id="update-servicetax-input" placeholder="Masukan progress"
                                                    value="{{ old('physical_progress') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="update-physical_progress_start">Progress Keuangan
                                                    Pada</label>
                                                <input type="date" class="form-control" name="finance_progress_start"
                                                    id="update-physical_progress_start"
                                                    value="{{ old('finance_progress_start') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="update-declaration-input">Progress Keuangan(%)</label>
                                                <input type="number" name="finance_progress" class="form-control"
                                                    id="update-Declaration-input" placeholder="Masukan progress keuangan"
                                                    value="{{ old('finance_progress') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <x-delete-modal-component />
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
        $('a[href="#finish"]').click(function() {
            console.log(true);
            $(this).closest('form').submit()
        })
        $(document).ready(function() {
            $(".select2-create").select2({
                dropdownParent: $("#modal-create")
            });
            $(".select2-update").select2({
                dropdownParent: $("#modal-update")
            });
        });
        $('.btn-detail').click(function() {
            const data = getDataAttributes($(this).attr('id'))
            handleDetail(data)
            if (data['characteristic_project'] == "single") {
                $('#detail-characteristic_project_name').html('Tahun Tunggal')
            } else {
                $('#detail-characteristic_project_name').html('Tahun Jamak')
            }
            $('#modal-detail').modal('show')
        })
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `projects/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);

            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `projects/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })

        $('#export-excel').click(function() {
            var status = $('#search-status').val()
            var name = $('#search-name').val()
            var year = $('#search-year').val()
            var route = "/project-export"
            var location = `${route}?status=${status}&name=${name}&year=${year}`
            window.location.href = location
        })

        $('#export-pdf').click(function() {
            var status = $('#search-status').val()
            var name = $('#search-name').val()
            var year = $('#search-year').val()
            var route = "{{ Route('project-export-pdf') }}"
            var location = `${route}?status=${status}&name=${name}&year=${year}`
            window.location.href = location
        })
    </script>
@endsection
