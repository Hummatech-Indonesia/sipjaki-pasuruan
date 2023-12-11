@extends('layouts.app')

@section('content')
    <p class="fs-4 text-dark" style="font-weight: 600">
        Detail Paket Pekerjaan
    </p>
    <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-header gap-3">
            <div class="">
                <button class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Export
                </button>
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
                </svg>Tambah Pelatihan
            </button>
        </div>
    </div>
    <div class="modal fade bs-example-modal-xl" id="modal-create" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Pelatihan</h5>
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
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-year">Tahun</label>
                                            <input type="number" class="form-control" name="year" id="basicpill-year"
                                                placeholder="Masukan Tahun">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-name">Nama Pekerjaan</label>
                                            <input type="text" class="form-control" name="name" id="basicpill-name"
                                                placeholder="masukan nama pekerjaan">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-fund_source_id">Sumber Dana</label>
                                            <select name="fund_source_id" class="form-control select2-create"
                                                style="width:100%" id="basicpill-fund_source_id">
                                                @foreach ($fundSources as $fundSource)
                                                    <option value="{{ $fundSource->id }}">{{ $fundSource->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Penyedia Jasa</label>
                                            <select class="form-control select2-create" style="width:100%"
                                                name="service_provider_id" id="basicpill-penyedia-jasa">
                                                @foreach ($serviceProviders as $serviceProvider)
                                                    <option value="{{ $serviceProvider->id }}">
                                                        {{ $serviceProvider->user->name }}</option>
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
                                                id="basicpill-nilai_kontrak" placeholder="Masukan nilai kontrak">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-contract_category_id">Jenis kontrak</label>
                                            <select name="contract_category_id" name=""
                                                class="form-control select2-create" style="width:100%"
                                                id="basicpill-contract_category_id">
                                                @foreach ($contractCategories as $contractCategory)
                                                    <option value="{{ $contractCategory->id }}">
                                                        {{ $contractCategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-cstno-input">karakteristik Kontrak</label>
                                            <select name="characteristic_project" class="form-select" id="">
                                                <option value="single">tahun tunggal</option>
                                                <option value="multiple">tahun jamak</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-servicetax-input">Progress Fisik(%)</label>
                                            <input type="number" name="physical_progress" class="form-control"
                                                id="basicpill-servicetax-input" placeholder="Masukan progress">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-physical_progress_start">Progress Fisik Pada</label>
                                            <input type="date" name="physical_progress_start" class="form-control"
                                                id="basicpill-physical_progress_start"
                                                placeholder="Masukan Progress Fisik">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-declaration-input">Progress Keuangan(%)</label>
                                            <input type="number" name="finance_progress" class="form-control"
                                                id="basicpill-Declaration-input" placeholder="Masukan progress keuangan">
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Bank Details -->
                            <h3>Detail</h3>
                            <section>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-physical_progress_start">Progress Keuangan
                                                    Pada</label>
                                                <input type="date" class="form-control" name="finance_progress_start"
                                                    id="basicpill-physical_progress_start" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Status</label>
                                                <select name="status" class="form-select">
                                                    <option selected disabled>Pilih status</option>
                                                    <option value="active">Aktif</option>
                                                    <option value="nonactive">Nonaktif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-start_at">Mulai</label>
                                                <input type="date" name="start_at" class="form-control"
                                                    id="basicpill-start_at" placeholder="Credit Card Number">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-card-verification-input">Selesai</label>
                                                <input type="date" name="end_at" class="form-control"
                                                    id="basicpill-end_at" placeholder="Credit Verification Number">
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
        @forelse ($projects as $project)
            <div class="col-12 col-xl-4 col-md-6">
                <div class="card p-4">
                    <div class="mb-3">
                        <span class="badge fs-6 bg-info text-white">{{ $project->year }}</span>
                    </div>
                    <div class="mb-3">
                        <h4>{{ $project->name }}</h4>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-center mb-2 col-12 col-lg-4">
                            <button data-id="{{ $project->id }}" style="min-width: 90px;width:100%"
                                class="btn btn-danger btn-delete">Hapus</button>
                        </div>
                        <div class="d-flex justify-content-center mb-2 col-12 col-lg-4">
                            <button style="min-width: 90px;width:100%" class="btn btn-edit btn-warning"
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
                                data-characteristic_project="{{ $project->characteristic_project }}">Edit</button>
                        </div>
                        <div class="d-flex justify-content-center mb-2 col-12 col-lg-4">
                            <button style="min-width: 90px;width:100%;background-color: #1B3061"
                                class="btn text-white btn-detail" id="btn-detail-{{ $project->id }}"
                                data-id="{{ $project->id }}" data-name="{{ $project->name }}"
                                data-year="{{ $project->year }}" data-status="{{ $project->status }}"
                                data-start_at="{{ \Carbon\Carbon::parse($project->start_at)->format('Y-m-d') }}"
                                data-end_at="{{ \Carbon\Carbon::parse($project->end_at)->format('Y-m-d') }}"
                                data-finance_progress="{{ $project->finance_progress }}"
                                data-finance_progress_start="{{ \Carbon\Carbon::parse($project->finance_progress_start)->format('Y-m-d') }}"
                                data-physical_progress="{{ $project->physical_progress }}"
                                data-physical_progress_start="{{ \Carbon\Carbon::parse($project->physical_progress_start)->format('Y-m-d') }}"
                                data-project_value="{{ $project->project_value }}"
                                data-fund_source="{{ $project->fundSource->name }}"
                                data-service_provider_name="{{ $project->serviceProvider->name }}"
                                data-contract_category_name="{{ $project->contractCategory->name }}"
                                data-characteristic_project="{{ $project->characteristic_project }}">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <tr>
                <td colspan="3" class="text-center">
                    <div class="d-flex justify-content-center" style="min-height:16rem">
                        <div class="my-auto">
                            <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                            <h4 class="text-center mt-4">Project Masih Kosong!!</h4>
                        </div>
                    </div>
                </td>
            </tr>
        @endforelse
    </div>

    <div class="modal fade bs-example-modal-md" id="modal-detail" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Pelatihan</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge bg-info">
                                <p class="mb-0 px-3 py-1 fs-6">
                                    <span id="detail-year"></span>
                                </p>
                            </div>
                            <p class="mt-3 fs-5 text-dark mb-2" style="font-weight: 700">
                                <span id="detail-name"></span>
                            </p>
                            <div class="">
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Nilai Kontrak :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-project_value"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Progres Fisik :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-physical_progress"></span> %</p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Progres Keuangan :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-finance_progress"></span> %</p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Status :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-status"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Penyedia jasa :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-service_provider_name"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Mulai :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-start_at"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Selesai :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-end_at"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Fisik Bulan :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-physical_progress_start"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Keuangan Bulan :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-finance_progress_start"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Sumber Dana :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-fund_source"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">jenis Kontrak :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"> <span id="detail-contract_category_name"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Karakteristik Kontrak :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-characteristic_project_name"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div class="modal fade bs-example-modal-xl" id="modal-update" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Pelatihan</h5>
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
                                            <label for="update-year">Tahun</label>
                                            <input type="number" class="form-control" name="year" id="update-year"
                                                placeholder="Masukan Tahun">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-name">Nama Pekerjaan</label>
                                            <input type="text" class="form-control" name="name" id="update-name"
                                                placeholder="masukan nama pekerjaan">
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
                                                    <option value="{{ $fundSource->id }}">{{ $fundSource->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-email-input">Penyedia Jasa</label>
                                            <select class="form-control select2-update" style="width:100%"
                                                name="service_provider_id" id="update-penyedia-jasa">
                                                @foreach ($serviceProviders as $serviceProvider)
                                                    <option value="{{ $serviceProvider->id }}">
                                                        {{ $serviceProvider->user->name }}</option>
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
                                                id="update-nilai_kontrak" placeholder="Masukan nilai kontrak">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-contract_category_id">Jenis kontrak</label>
                                            <select name="contract_category_id" name=""
                                                class="form-control select2-update" style="width:100%"
                                                id="update-contract_category_id">
                                                @foreach ($contractCategories as $contractCategory)
                                                    <option value="{{ $contractCategory->id }}">
                                                        {{ $contractCategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-cstno-input">karakteristik Kontrak</label>
                                            <select name="characteristic_project" class="form-select" id="">
                                                <option value="single">tahun tunggal</option>
                                                <option value="multiple">tahun jamak</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-servicetax-input">Progress Fisik(%)</label>
                                            <input type="number" name="physical_progress" class="form-control"
                                                id="update-servicetax-input" placeholder="Masukan progress">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-physical_progress_start">Progress Fisik Pada</label>
                                            <input type="date" name="physical_progress_start" class="form-control"
                                                id="update-physical_progress_start" placeholder="Masukan Progress Fisik">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-declaration-input">Progress Keuangan(%)</label>
                                            <input type="number" name="finance_progress" class="form-control"
                                                id="update-Declaration-input" placeholder="Masukan progress keuangan">
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Bank Details -->
                            <h3>Detail</h3>
                            <section>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="update-physical_progress_start">Progress Keuangan
                                                    Pada</label>
                                                <input type="date" class="form-control" name="finance_progress_start"
                                                    id="update-physical_progress_start" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Status</label>
                                                <select name="status" class="form-select">
                                                    <option selected disabled>Pilih status</option>
                                                    <option value="active">Aktif</option>
                                                    <option value="nonactive">Nonaktif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="update-start_at">Mulai</label>
                                                <input type="date" name="start_at" class="form-control"
                                                    id="update-start_at" placeholder="Credit Card Number">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="update-card-verification-input">Selesai</label>
                                                <input type="date" name="end_at" class="form-control"
                                                    id="update-end_at" placeholder="Credit Verification Number">
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
            if(data['characteristic_project'] == "single"){
                $('#detail-characteristic_project_name').html('Tahun Tunggal')
            }else{
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
