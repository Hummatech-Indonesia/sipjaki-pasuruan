@extends('layouts.app')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <style>
        td {
            vertical-align: top;
        }
    </style>
    <div class="d-flex justify-content-between mb-3">
        <div class="">
            <h4 class="mb-3 font-size-18" style="font-weight: 800">Detail Daftar Progres</h4>
        </div>
        <div>
            <button onclick="history.back()" class="btn btn-warning btn-md rounded-3">
                <i class="fas fa-arrow-left" style="margin-right:10px"></i>Kembali
            </button>
        </div>
    </div>
    {{-- modal detail  --}}
    <div class="modal fade bs-example-modal-md" id="modal-detail" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Detail Progres</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="btn btn-sm mb-2 text-dark rounded-3 year-detail" style="background-color: #E4ECFF;">

                            </div>
                            <p class="mt-1 fs-5 text-dark mb-2" style="font-weight: 700">
                                <span id="detail-name " class="name-detail"></span>
                            </p>
                            <div class="">
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Progress (%) :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-birth_date"
                                                class="progres-detail"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Tanggal Mulai :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-education"
                                                class="date_start-detail"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Tanggal Akhir :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-registration_number" class="date_finish-detail"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Minggu Ke- :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-"
                                                class="week"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Deskripsi :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-cerificate"
                                                class="description-detail"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    {{-- end modal  --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    {{ $executorProject->fiscalYear->name }}
                                </div>
                                <p class="fw-bolder fs-5">{{ $executorProject->name }}</p>
                            </div>
                            <table cellpadding="10" style="border-collapse: collapse; width: 75%;">
                                <tbody>
                                    <tr>
                                        <td>Nilai Kontrak</td>
                                        <td>:</td>
                                        <td>{{ 'Rp' . number_format($executorProject->project_value, 0, ',', '.') }}</td>

                                    </tr>
                                    <tr>
                                        <td>Progres Fisik</td>
                                        <td>:</td>
                                        <td>{{ $executorProject->physical_progress != null ? $executorProject->physical_progress . '%' : '0%' }}
                                    </tr>
                                    <tr>
                                        <td>Progres Keuangan</td>
                                        <td>:</td>
                                        <td>{{ $executorProject->finance_progress != null ? $executorProject->finance_progress . '%' : '0%' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>{{ $executorProject->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mulai</td>
                                        <td>:</td>
                                        <td>{{ Carbon::parse($executorProject->start_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Selesai</td>
                                        <td>:</td>
                                        <td>{{ Carbon::parse($executorProject->end_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sumber Dana</td>
                                        <td>:</td>
                                        <td>{{ $executorProject->fundSource->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Dinas</td>
                                        <td>:</td>
                                        <td colspan="2" style="vertical-align: top;">
                                            {{ $executorProject->consultantProject->dinas->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kontrak</td>
                                        <td>:</td>
                                        <td>{{ $executorProject->contractCategory->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Karakteristik Kontrak</td>
                                        <td>:</td>
                                        <td>{{ $executorProject->characteristic_project }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pelaksana</td>
                                        <td>:</td>
                                        <td>{{ $executorProject->serviceProvider->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Konsultan</td>
                                        <td>:</td>
                                        <td>{{ $executorProject->consultantProject->serviceProvider->user->name }}</td>
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
                            <p class="fw-medium fs-5" style="margin-bottom: 25%;">Daftar Progress</p>
                        </div>
                        <div>
                            @if ($executorProject->status == 'active')
                                @if (Auth::user()->serviceProvider?->type_of_business_entity == 'consultant')
                                    <div {{ $executorProject->physical_progress == 100 ? '' : 'data-bs-toggle=modal data-bs-target=#modal-create' }}
                                        class="btn  rounded-3" style="background-color:#1B3061; color:white;">
                                        @if ($executorProject->physical_progress == 100)
                                            <form
                                                action="{{ Route('mark.done', ['executorProject' => $executorProject->id]) }}"
                                                method="POST" id="mark-done">
                                                @method('PUT')
                                                @csrf
                                                <span class="text-white"
                                                    onclick="document.getElementById('mark-done').submit()">Tandai
                                                    Selesai</span>
                                            </form>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                                                    fill="white" />
                                            </svg> Upload Progress
                                        @endif
                                    </div>
                                @endif
                        </div>
                        @endif
                    </div>

                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert mt-3 alert-danger alert-dismissible fade show" role="alert">
                            {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th>Miggu ke-</th>
                                <th>Progres (%)</th>
                                <th>Aksi</th>
                                <th>
                                    File
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($executorProject->serviceProviderProjects as $serviceProviderProject)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ Carbon::parse($serviceProviderProject->date_start)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                    </td>
                                    <td>{{ Carbon::parse($serviceProviderProject->date_finish)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                    </td>
                                    <td>{{ $serviceProviderProject->week }}</td>
                                    <td>{{ $serviceProviderProject->progres }}% Progress</td>
                                    <td>
                                        <div class="d-flex justify-content-header gap-2">
                                            <div class="">
                                                <button type="button" id="{{ $serviceProviderProject->id }}"
                                                    data-id="{{ $serviceProviderProject->id }}"
                                                    class="btn btn-sm btn-detail" style="background-color: #1B3061;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path d="M4.5 12.5C7.5 6 16.5 6 19.5 12.5" stroke="white"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M12 16C10.8954 16 10 15.1046 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16Z"
                                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            </div>
                                            @if (Auth::user()->serviceProvider?->type_of_business_entity == 'consultant' && $executorProject->status == 'active')
                                                <div>
                                                    <button class="btn btn-edit btn-sm btn-warning"
                                                        id="btn-edit-{{ $serviceProviderProject->id }}"
                                                        data-id="{{ $serviceProviderProject->id }}"
                                                        data-progres="{{ $serviceProviderProject->progres }}"
                                                        data-description="{{ $serviceProviderProject->description }}"
                                                        data-date_start="{{ \Carbon\Carbon::parse($serviceProviderProject->date_start)->format('Y-m-d') }}"
                                                        data-week="{{ $serviceProviderProject->week }}"
                                                        data-date_finish="{{ \Carbon\Carbon::parse($serviceProviderProject->date_finish)->format('Y-m-d') }}"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 24 24" fill="none">
                                                            <g clip-path="url(#clip0_373_6257)">
                                                                <path
                                                                    d="M7 7H6C5.46957 7 4.96086 7.21071 4.58579 7.58579C4.21071 7.96086 4 8.46957 4 9V18C4 18.5304 4.21071 19.0391 4.58579 19.4142C4.96086 19.7893 5.46957 20 6 20H15C15.5304 20 16.0391 19.7893 16.4142 19.4142C16.7893 19.0391 17 18.5304 17 18V17"
                                                                    stroke="white" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path
                                                                    d="M20.385 6.58511C20.7788 6.19126 21.0001 5.65709 21.0001 5.10011C21.0001 4.54312 20.7788 4.00895 20.385 3.61511C19.9912 3.22126 19.457 3 18.9 3C18.343 3 17.8088 3.22126 17.415 3.61511L9 12.0001V15.0001H12L20.385 6.58511V6.58511Z"
                                                                    stroke="white" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M16 5L19 8" stroke="white" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_373_6257">
                                                                    <rect width="24" height="24" fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg></button>
                                                </div>
                                                <div class="">
                                                    <button class="btn btn-delete btn-danger btn-sm"
                                                        id="{{ $serviceProviderProject->id }}"
                                                        data-id="{{ $serviceProviderProject->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 20 20" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z"
                                                                fill="white" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    @if ($serviceProviderProject->file)
                                        <td>
                                            <a href="/download-service-provider-project/{{ $serviceProviderProject->id }}"
                                                class="btn btn-success btn-sm rounded-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12 15V3" stroke="white" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </td>
                                    @else
                                        <td>
                                            -
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <div class="d-flex justify-content-center" style="min-height:16rem">
                                            <div class="my-auto">
                                                <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                                <h4 class="text-center mt-4"> Belum Ada Progres Kosong!!</h4>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="ms-2 fw">
                            <p class="fw-medium fs-5" style="margin-bottom: 25%;">Daftar File</p>
                        </div>
                        <div>
                            @role('service provider')
                                @if (Auth::user()->serviceProvider?->type_of_business_entity == 'executor')
                                    <div data-bs-toggle="modal" data-bs-target="#modal-create" class="btn  rounded-3"
                                        style="background-color:#1B3061; color:white;">
                                        @if (
                                            $executorProject->contract ||
                                                $executorProject->report ||
                                                $executorProject->minutes_of_disbursement ||
                                                $executorProject->administrative_minutes)
                                            Edit File
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                                                    fill="white" />
                                            </svg> Upload File
                                        @endif
                                    </div>
                                @endif
                            @endrole
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
                                        @if ($executorProject->contract)
                                            <a href="{{ route('downloadExecutorContract', ['executorProject' => $executorProject->id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @else
                                        -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Surat Pesanan</td>
                                    <td>:</td>
                                    <td>
                                        @if ($executorProject->mail_order)
                                            <a href="{{ route('downloadExecutorMailOrder', ['executorProject' => $executorProject->id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @else
                                        -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Berita Acara Uitzet</td>
                                    <td>:</td>
                                    <td>
                                        @if ($executorProject->uitzet_minutes)
                                            <a href="{{ route('downloadUitzetMinutes', ['executorProject' => $executorProject->id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @else
                                        - 
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Berita Acara PCM</td>
                                    <td>:</td>
                                    <td>
                                        @if ($executorProject->pcm_minutes)
                                            <a href="{{ route('downloadExecutorPcmMinutes', ['executorProject' => $executorProject->id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @else
                                        - 
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dokumen Invoice</td>
                                    <td>:</td>
                                    <td>
                                        @if ($executorProject->invoices)
                                            <a href="{{ route('downloadInvoices', ['executorProject' => $executorProject->id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @else
                                        - 
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mutual Check 0</td>
                                    <td>:</td>
                                    <td>
                                        @if ($executorProject->mutual_check_0)
                                            <a href="{{ route('downloadMinutesOfHandOver', ['consultantProject' => $executorProject->consultant_project_id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @else
                                        - 
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Shop Drawing</td>
                                    <td>:</td>
                                    <td>
                                        @if ($executorProject->shop_drawing)
                                            <a href="{{ route('downloadShopDrawing', ['executorProject' => $executorProject->id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @else
                                        - 
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mutual Check 100</td>
                                    <td>:</td>
                                    <td>
                                        @if ($executorProject->mutual_check_100)
                                            <a href="{{ route('downloadMinutesOfHandOver', ['consultantProject' => $executorProject->consultant_project_id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Asbuild Drawing</td>
                                    <td>:</td>
                                    <td>
                                        @if ($executorProject->asbuild_drawing)
                                            <a href="{{ route('downloadAsbuildDrawing', ['executorProject' => $executorProject->id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @else
                                        - 
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Berita Acara P1</td>
                                    <td>:</td>
                                    <td>
                                        @if ($executorProject->p1_meeting_minutes)
                                            <a href="{{ route('downloadMinutesOfHandOver', ['consultantProject' => $executorProject->consultant_project_id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @else
                                        -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Berita Acara Administrasi
                                    </td>
                                    <td>:</td>
                                    <td>
                                        @if ($executorProject->administrative_minutes)
                                            <a href="{{ route('downloadExecutorAdministrativeMinutes', ['executorProject' => $executorProject->id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @else
                                        - 
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>Berita Acara Pencariran</td>
                                    <td>:</td>
                                    <td>
                                        @if ($executorProject->minutes_of_disbursement)
                                            <a href="{{ route('downloadMinutesOfDisbursement', ['consultantProject' => $executorProject->consultant_project_id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @else
                                        - 
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>Berita Acara P2</td>
                                    <td>:</td>
                                    <td>
                                        @if ($executorProject->p2_meeting_minutes)
                                            <a href="{{ route('downloadMinutesOfHandOver', ['consultantProject' => $executorProject->consultant_project_id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @else
                                        - 
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>Laporan</td>
                                    <td>:</td>
                                    <td>
                                        @if ($executorProject->report)
                                            <a href="{{ route('downloadExecutorReport', ['executorProject' => $executorProject->id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
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
    <div class="modal fade bs-example-modal-xl" id="modal-create" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div style="background-color: #1B3061;">
                    <h5 class="modal-title text-white text-center m-3 fs-4">Tambah
                        {{ Auth::user()->serviceProvider?->type_of_business_entity == 'consultant' ? 'Progress' : 'File' }}
                    </h5>
                </div>
                @if (Auth::user()->serviceProvider?->type_of_business_entity == 'consultant')
                    <form
                        action="{{ route('service-provider-projects.store', ['executorProject' => $executorProject->id]) }}"
                        method="post" enctype="multipart/form-data">
                        @method('POST')
                    @else
                        <form action="{{ route('upload-file-executor', ['executorProject' => $executorProject->id]) }}"
                            method="post" enctype="multipart/form-data">
                            @method('PUT')
                @endif

                @csrf
                <div class="modal-body">
                    <div class="row">
                        @if (Auth::user()->serviceProvider?->type_of_business_entity == 'consultant')
                            <div class="col-lg-3">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" value="{{ old('date_start') }}"
                                        name="date_start" id="">

                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Tanggal Akhir</label>
                                    <input type="date" class="form-control" value="{{ old('date_finish') }}"
                                        name="date_finish" id="">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Progres (max
                                        {{ 100 - $executorProject->physical_progress }}%)</label>
                                    <input type="number" class="form-control" value="{{ old('progres') }}"
                                        name="progres" id="">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Minggu ke-</label>
                                    <input type="number" class="form-control" value="{{ old('week') }}"
                                        name="week" id="">
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                <label class="form-label">File Pendukung</label>
                                <input class="form-control" type="file" value="{{ old('file') }}" name="file"
                                    id="">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="">Deskripsi</label>
                            <textarea class="form-control" name="description" id="" cols="20" rows="5">{{ old('description') }}</textarea>
                        </div>
                    </div>
                @else
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Kontrak</label>
                            <input class="form-control" accept=".pdf" type="file" value="{{ old('contract') }}"
                                name="contract" id="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Surat Pesanan</label>
                            <input class="form-control" accept=".pdf" type="file" value="{{ old('mail_order') }}"
                                name="mail_order" id="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Berita Acara Uitzet</label>
                            <input class="form-control" type="file" value="{{ old('uitzet_minutes') }}"
                                name="uitzet_minutes" accept=".pdf" id="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Berita Acara PCM</label>
                            <input class="form-control" type="file" value="{{ old('pcm_minutes') }}"
                                name="pcm_minutes" accept=".pdf" id="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                        <label class="form-label">Dokumen Invoice</label>
                            <input class="form-control" type="file" value="{{ old('invoices') }}"
                                name="invoices" accept=".pdf" id="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Berita Acara Administrasi</label>
                            <input class="form-control" type="file" value="{{ old('administrative_minutes') }}"
                                name="administrative_minutes" accept=".pdf" id="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Berita Acara Pencairan</label>
                            <input class="form-control" type="file" value="{{ old('minutes_of_disbursement') }}"
                                name="minutes_of_disbursement" accept=".pdf" id="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Mutual Check 0</label>
                            <input class="form-control" type="file" value="{{ old('mutual_check_0') }}"
                                name="mutual_check_0" accept=".pdf" id="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Shop Drawing</label>
                            <input class="form-control" type="file" value="{{ old('shop_drawing') }}"
                                name="shop_drawing" accept=".pdf" id="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Mutual Check 100</label>
                            <input class="form-control" type="file" value="{{ old('mutual_check_100') }}"
                                name="mutual_check_100" accept=".pdf" id="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Asbuild Drawing</label>
                            <input class="form-control" type="file" value="{{ old('asbuild_drawing') }}"
                                name="asbuild_drawing" accept=".pdf" id="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Berita Acara P1</label>
                            <input class="form-control" type="file" value="{{ old('p1_meeting_minutes') }}"
                                name="p1_meeting_minutes" accept=".pdf" id="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Berita Acara P2</label>
                            <input class="form-control" type="file" value="{{ old('p2_meeting_minutes') }}"
                                name="p2_meeting_minutes" accept=".pdf" id="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Laporan</label>
                            <input class="form-control" accept=".pdf" type="file" value="{{ old('report') }}"
                                name="report" id="">
                        </div>
                    </div>
                    @endif
                    <div class="d-flex d-row justify-content-end mt-3">
                        <button type="button" class="btn btn-danger btn-md me-2" data-bs-dismiss="modal"
                            aria-label="Close">Batal</button>
                        <button type="submit" style="background-color: #1B3061; color:white;"
                            class="btn btn-md">Tambah</button>

                    </div>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div class="modal fade bs-example-modal-xl" id="modal-update" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div style="background-color: #1B3061;">
                    <h5 class="modal-title text-white text-center m-3 fs-4">Edit Progress</h5>
                </div>
                <form id="form-update" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" value="{{ old('date_start') }}"
                                        name="date_start" id="">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Tanggal Akhir</label>
                                    <input type="date" class="form-control" value="{{ old('date_finish') }}"
                                        name="date_finish" id="">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Progres (max
                                        {{ 100 - $executorProject->physical_progress }}%)</label>
                                    <input type="text" max="3" class="form-control"
                                        value="{{ old('progres') }}" name="progres" id="">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Minggu ke-</label>
                                    <input type="text" class="form-control" value="{{ old('week') }}"
                                        name="week" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">File Pendukung</label>
                                    <input class="form-control" type="file" value="{{ old('file') }}"
                                        name="file" id="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="">Deskripsi</label>
                                <textarea class="form-control" name="description" id="" cols="20" rows="5">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex d-row justify-content-end mb-3 me-2">

                        <button type="button" class="btn btn-danger btn-md me-2" data-bs-dismiss="modal"
                            aria-label="Close">Batal</button>
                        <button type="submit" style="background-color: #1B3061; color:white;"
                            class="btn btn-md">Edit</button>

                    </div>
            </div>
            </form>
        </div>
    </div>
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
        $('#paket-jasa').addClass('active')
        $('#paket-jasa .sub-menu').addClass('mm-show')
        $('#paket-jasa-link').addClass('mm-active')

        $('#paket-pekerjaan-jasa').addClass('mm-active')

        $('#project-admin').addClass('mm-active')
        $('#project-admin-link').addClass('active')

        $('#paket-pekerjaan-jasa-link').addClass('active')
        $('#project-dinas').addClass('mm-active')

        $('#project-dinas-link').addClass('active')

        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `/service-provider-projects/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
        $('.btn-detail').click(function() {
            id = $(this).data('id')
            get()

            function get() {
                $.ajax({
                    url: "/service-provider-project-detail/" + id,
                    type: 'GET',
                    dataType: "JSON",
                    success: function(response) {
                        $('.year-detail').text(response.data.project.year)
                        $('.name-detail').text(response.data.project.name)
                        $('.progres-detail').text(response.data.progres)
                        $('.date_start-detail').text(response.data.date_start)
                        $('.date_finish-detail').text(response.data.date_finish)
                        $('.description-detail').text(response.data.description)
                        $('.week').text(response.data.week)
                        $('.file-detail').attr('href', response.data.file)
                    }
                });
            }
            $('#modal-detail').modal('show')
        })
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `/service-provider-projects/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);
            console.log(formData);
            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })
    </script>
@endsection
