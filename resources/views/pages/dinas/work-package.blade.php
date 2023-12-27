@extends('layouts.app')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <p class="fs-4 text-dark" style="font-weight: 600">
        Paket Pekerjaan
    </p>
    <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-header gap-3">
            <div class="">
                {{-- <button class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Export
                </button> --}}
            </div>
        </div>
        <div class="">
            <button data-bs-toggle="modal" data-bs-target="#modal-create" class="btn text-white"
                style="background-color:#1B3061">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                        fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                        fill="white" />
                </svg>Tambah
            </button>
        </div>
    </div>
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
                    <form action="{{ route('projects.store') }}" method="POST" id="form-create">
                        @csrf
                        <div id="basic-example">
                            <!-- Seller Details -->
                            <h3>informasi Umum</h3>
                            <section>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="basicpill-name">Nama Pekerjaan</label>
                                            <input type="text" class="form-control" name="name" id="basicpill-name"
                                                placeholder="masukan nama pekerjaan" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-year">Tahun</label>
                                            <input type="number" class="form-control" name="year" id="basicpill-year"
                                                placeholder="Masukan Tahun" value="{{ old('year') }}">
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
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-penyedia-jasa">Penyelenggara</label>
                                            <select class="form-control select2-create" style="width:100%"
                                                name="executor_id" id="basicpill-penyelenggara">
                                                @foreach ($executors as $executor)
                                                    <option value="{{ $executor->id }}"
                                                        {{ old('service_provider_id') == $executor->id ? 'selected' : '' }}>
                                                        {{ $executor->user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-penyedia-jasa">Konsultan</label>
                                            <select class="form-control select2-create" style="width:100%"
                                                name="consultant_id" id="basicpill-konsultan">
                                                @foreach ($consultants as $consultant)
                                                    <option value="{{ $consultant->id }}"
                                                        {{ old('service_provider_id') == $consultant->id ? 'selected' : '' }}>
                                                        {{ $consultant->user->name }}
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
                                            <label for="basicpill-cstno-input">karakteristik Kontrak</label>
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
                                                    {{ old('status') == 'nonactive' ? 'selected' : '' }}>Nonaktif</option>
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
                                                <label for="basicpill-physical_progress_start">Progress Fisik Pada</label>
                                                <input type="date" name="physical_progress_start" class="form-control"
                                                    id="basicpill-physical_progress_start"
                                                    value="{{ old('physical_progress_start') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-servicetax-input">Progress Fisik(%)</label>
                                                <input type="number" name="physical_progress" class="form-control"
                                                    id="basicpill-servicetax-input" placeholder="Masukan progress"
                                                    value="{{ old('physical_progress') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-physical_progress_start">Progress Keuangan
                                                    Pada</label>
                                                <input type="date" class="form-control" name="finance_progress_start"
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
        <div class="table-responsive">
            <table class="table table-borderless" border="1">
                <thead>
                    <tr>
                        <th class="text-center table-sipjaki">No</th>
                        <th class="text-center table-sipjaki">Tahun</th>
                        <th class="text-center table-sipjaki">Nama Pekerjaan</th>
                        <th class="text-center table-sipjaki">Aksi</th>
                    </tr>
                </thead>
                @forelse ($projects as $index=>$project)
                    <tbody>
                        <tr>
                            <td class="text-center">
                                {{ $index + 1 }}
                            </td>
                            <td class="text-center">
                                {{ $project->year }}
                            </td>
                            <td class="text-center">
                                {{ $project->name }}
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <div class="d-flex justify-content-center mb-2">
                                        <button data-id="{{ $project->id }}" style="min-width: 90px;width:100%"
                                            class="btn btn-danger btn-delete d-flex"><i
                                                class="bx bx-bx bxs-trash fs-4 me-1"></i>
                                            Hapus</button>
                                    </div>
                                    <div class="d-flex justify-content-center mb-2">
                                        <button style="min-width: 90px;width:100%" class="d-flex btn btn-edit btn-warning"
                                            id="btn-edit-{{ $project->id }}" data-id="{{ $project->id }}"
                                            data-name="{{ $project->name }}" data-year="{{ $project->year }}"
                                            data-status="{{ $project->status }}"
                                            data-start_at="{{ \Carbon\Carbon::parse($project->start_at)->format('Y-m-d') }}"
                                            data-end_at="{{ \Carbon\Carbon::parse($project->end_at)->format('Y-m-d') }}"
                                            data-finance_progress="{{ $project->finance_progress }}"
                                            data-finance_progress_start="{{ \Carbon\Carbon::parse($project->finance_progress_start)->format('Y-m-d') }}"
                                            data-physical_progress="{{ $project->physical_progress }}"
                                            data-physical_progress_start="{{ \Carbon\Carbon::parse($project->physical_progress_start)->format('Y-m-d') }}"
                                            data-project_value="{{ $project->project_value }}"
                                            data-fund_source_id="{{ $project->fund_source_id }}"
                                            data-service_provider_id="{{ $project->service_provider_id }}"
                                            data-contract_category_id="{{ $project->contract_category_id }}"
                                            data-consultant_id="{{ $project->consultant_id }}"
                                            data-executor_id="{{ $project->executor_id }}"
                                            data-characteristic_project="{{ $project->characteristic_project }}"><i
                                                class="bx bx-bx bxs-edit fs-4 me-1"></i> Edit</button>
                                    </div>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="/detail-project-dinas/{{ $project->id }}" style="min-width: 90px;width:100%;background-color: #1B3061"
                                            class="btn text-white btn-detail" 
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                viewBox="0 0 24 24" fill="none">
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
                        <td colspan="5" class="text-center">
                            <div class="d-flex justify-content-center" style="min-height:16rem">
                                <div class="my-auto">
                                    <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                    <h4 class="text-center mt-4">Project Masih Kosong!!</h4>
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
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="update-name">Nama Pekerjaan</label>
                                            <input type="text" class="form-control" name="name" id="update-name"
                                                placeholder="masukan nama pekerjaan" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-year">Tahun</label>
                                            <input type="number" class="form-control" name="year" id="update-year"
                                                placeholder="Masukan Tahun" value="{{ old('year') }}">
                                        </div>
                                    </div>
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
                                            <label for="update-penyedia-jasa">Penyelenggara</label>
                                            <select class="form-control select2-update" style="width:100%"
                                                name="executor_id" id="update-penyelenggara">
                                                @foreach ($executors as $serviceProvider)
                                                    <option value="{{ $serviceProvider->id }}"
                                                        {{ old('service_provider_id') == $serviceProvider->id ? 'selected' : '' }}>
                                                        {{ $serviceProvider->user->name }}
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
                                                    {{ old('status') == 'nonactive' ? 'selected' : '' }}>Nonaktif</option>
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
    </script>
@endsection
