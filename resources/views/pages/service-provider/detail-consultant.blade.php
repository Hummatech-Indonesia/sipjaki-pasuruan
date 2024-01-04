@extends('layouts.app')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    @if ($errors->has('name_package'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $errors->first('name_package') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($errors->has('project_value'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $errors->first('project_value') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-between">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <div class="d-flex">
                <a class="nav-link active rounded-start" style="border: solid 1px #1B3061;" id="detail-tab"
                    data-bs-toggle="pill" href="#detail" role="tab" aria-controls="detail" aria-selected="true">
                    <div class="fw-bold">Paket Konsultan</div>
                </a>
                <a class="nav-link" style="border: solid 1px #1B3061;" id="edit-tab" data-bs-toggle="pill" href="#edit"
                    role="tab" aria-controls="kualifikasi-klasifikasi" aria-selected="false">
                    <div class="fw-bold">Paket Pekerjaan</div>
                </a>
            </div>
        </div>
        <div class="">
            <a class="btn text-white btn-warning" href="consultant-package"><i class="fas fa-arrow-left"
                    style="margin-right:3px"></i> Kembali</a>
        </div>
    </div>
    <div class="tab-content mt-4" id="v-pills-tabContent">
        <div class="tab-pane fade active show" id="detail" role="tabpanel" aria-labelledby="detail-tab">
            <div class="card rounded-4 mb-3">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="d-flex justify-content-between">
                                    <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                        {{ $project->year }}
                                    </div>
                                    <div data-bs-toggle="modal" data-bs-target="#modal-edit-consultan">
                                        <button class="btn btn-md text-white d-flex" style="background-color: #1B3061;">
                                            <i class="bx bx-bx bxs-edit fs-4 me-1"></i><span>Edit</span>
                                        </button>
                                    </div>
                                </div>

                                <p class="fw-bolder fs-5">{{ $project->name }}</p>
                            </div>
                            <table cellpadding="10" style="border-collapse: collapse; width: 75%;">
                                <tbody>
                                    <tr>
                                        <td>Nama Paket Konsultan</td>
                                        <td>:</td>
                                        <td>{{ $project->consultantProject->name_package ? $project->consultantProject->name_package : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nilai Kontrak</td>
                                        <td>:</td>
                                        <td>{{ 'Rp ' . number_format($project->project_value, 0, ',', '.') }}</td>

                                    </tr>
                                    <tr>
                                        <td>Progres Fisik</td>
                                        <td>:</td>
                                        <td>{{ $project->physical_progress != null ? $project->physical_progress . '%' : '0%' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Progres Keuangan</td>
                                        <td>:</td>
                                        <td>{{ $project->finance_progress != null ? $project->finance_progress . '%' : '0%' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>{{ $project->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mulai</td>
                                        <td>:</td>
                                        <td>{{ Carbon::parse($project->start_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Selesai</td>
                                        <td>:</td>
                                        <td>{{ Carbon::parse($project->end_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sumber Dana</td>
                                        <td>:</td>
                                        <td>{{ $project->fundSource->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kontrak</td>
                                        <td>:</td>
                                        <td>{{ $project->contractCategory->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Karakteristik Kontrak</td>
                                        <td>:</td>
                                        <td>{{ $project->characteristic_project }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @if ($errors->has('contract'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('contract') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('report'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('report') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('minutes_of_disbursement'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('minutes_of_disbursement') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('administrative_minutes'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('administrative_minutes') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="ms-2 fw">
                            <p class="fw-medium fs-5" style="margin-bottom: 25%;">Daftar File</p>
                        </div>
                        <div>
                            @if (
                                $project->consultantProject->contract ||
                                    $project->consultantProject->report ||
                                    $project->consultantProject->minutes_of_disbursement ||
                                    $project->consultantProject->administrative_minutes)
                                <div data-bs-toggle="modal" data-bs-target="#modal-create" class="btn  rounded-3"
                                    style="background-color:#1B3061; color:white;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 24 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                                            fill="white"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                                            fill="white"></path>
                                    </svg> Edit File
                                </div>
                            @else
                                <div data-bs-toggle="modal" data-bs-target="#modal-create" class="btn  rounded-3"
                                    style="background-color:#1B3061; color:white;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 24 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                                            fill="white"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                                            fill="white"></path>
                                    </svg> Upload File
                                </div>
                            @endif
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
                                        @if ($project->consultantProject->contract)
                                            <a href="{{ route('downloadContract', ['consultantProject' => $project->consultantProject->id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Berita Acara Administrasi
                                    </td>
                                    <td>:</td>
                                    <td>
                                        @if ($project->consultantProject->administrative_minutes)
                                            <a href="{{ route('downloadAdministrativeMinutes', ['consultantProject' => $project->consultantProject->id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Laporan</td>
                                    <td>:</td>
                                    <td>
                                        @if ($project->consultantProject->report)
                                            <a href="{{ route('downloadReport', ['consultantProject' => $project->consultantProject->id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Berita Acara Pencairan</td>
                                    <td>:</td>
                                    <td>
                                        @if ($project->consultantProject->minutes_of_disbursement)
                                            <a href="{{ route('downloadMinutesOfDisbursement', ['consultantProject' => $project->consultantProject->id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Berita Acara Serah Terima</td>
                                    <td>:</td>
                                    <td>
                                        @if ($project->consultantProject->minutes_of_hand_over)
                                            <a href="{{ route('downloadMinutesOfHandOver', ['consultantProject' => $project->consultantProject->id]) }}"
                                                type="button" class="btn btn-md text-white"
                                                style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i>
                                                Download</a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    {{ $project->year }}
                                </div>
                                <p class="fw-bolder fs-5">{{ $project->name }}</p>
                            </div>
                            <table cellpadding="10" style="border-collapse: collapse; width: 75%;">
                                <tbody>
                                    <tr>
                                        <td>Nilai Kontrak</td>
                                        <td>:</td>
                                        <td>{{ 'Rp ' . number_format($project->project_value, 0, ',', '.') }}</td>

                                    </tr>
                                    <tr>
                                        <td>Progres Fisik</td>
                                        <td>:</td>
                                        <td>{{ $project->physical_progress != null ? $project->physical_progress . '%' : '0%' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Progres Keuangan</td>
                                        <td>:</td>
                                        <td>{{ $project->finance_progress != null ? $project->finance_progress . '%' : '0%' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>{{ $project->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mulai</td>
                                        <td>:</td>
                                        <td>{{ Carbon::parse($project->start_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Selesai</td>
                                        <td>:</td>
                                        <td>{{ Carbon::parse($project->end_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sumber Dana</td>
                                        <td>:</td>
                                        <td>{{ $project->fundSource->name }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td>Penggunaan Jasa</td>
                                        <td>:</td>
                                        <td colspan="2" style="vertical-align: top;">
                                            {{ $project->serviceProvider->user_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Penyedia Nama</td>
                                        <td>:</td>
                                        <td>{{ $project->dinas->user_id }}</td>
                                    </tr> --}}
                                    <tr>
                                        <td>Jenis Kontrak</td>
                                        <td>:</td>
                                        <td>{{ $project->contractCategory->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Karakteristik Kontrak</td>
                                        <td>:</td>
                                        <td>{{ $project->characteristic_project }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
                    <h5 class="modal-title text-white text-center m-3 fs-4">Upload File</h5>
                </div>
                <form action="{{ route('consultant-project.store', ['project' => $project->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Kontrak</label>
                                    <input class="form-control" type="file" value="{{ old('contract') }}"
                                        name="contract" id="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Berita Acara Administrasi</label>
                                    <input class="form-control" type="file"
                                        value="{{ old('administrative_minutes') }}" name="administrative_minutes"
                                        id="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Laporan</label>
                                    <input class="form-control" type="file" value="{{ old('report') }}"
                                        name="report" id="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Berita Acara Pencairan</label>
                                    <input class="form-control" type="file"
                                        value="{{ old('minutes_of_disbursement') }}" name="minutes_of_disbursement"
                                        id="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Berita Acara Serah Terima</label>
                                    <input class="form-control" type="file"
                                        value="{{ old('minutes_of_hand_over') }}" name="minutes_of_hand_over"
                                        id="">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex d-row justify-content-end mt-3">

                            <button type="button" class="btn btn-danger btn-md me-2" data-bs-dismiss="modal"
                                aria-label="Close">Batal</button>
                            <button type="submit" style="background-color: #1B3061; color:white;"
                                class="btn btn-md">Tambah</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-lg" id="modal-edit-consultan" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div style="background-color: #1B3061;">
                    <h5 class="modal-title text-white text-center m-3 fs-4">Edit Data Paket Konsultan</h5>
                </div>
                <form action="{{ route('consultant-project.update', ['project' => $project->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Nama Paket Konsultan</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Paket"
                                        value="{{ $project->consultantProject->name_package ?? old('name_package') }}"
                                        name="name_package" id="">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Nilai Kontrak</label>
                                    <input type="number" class="form-control" placeholder="Masukkan Nilai Kontrak"
                                        value="{{ $project->project_value ?? old('project_value') }}"
                                        name="project_value" id="">
                                </div>
                            </div>

                        </div>
                        <div class="d-flex d-row justify-content-end mt-3">

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
@endsection
@section('script')
    <script>
         $('#paket-jasa').addClass('active')
        $('#paket-jasa .sub-menu').addClass('mm-show')
        $('#paket-jasa-link').addClass('mm-active')
        $('#paket-konsultant').addClass('mm-active')
        $('#paket-konsultant-link').addClass('active')
    </script>
@endsection
