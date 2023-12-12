@extends('layouts.app')
@section('content')
    <style>
        td {
            vertical-align: top;
        }
    </style>
    <h4 class="mb-3 font-size-18">Detail Daftar Progres</h4>
    <div class="d-flex justify-content-between mb-3">
        <div class="d-flex position-relative">
            <div class="btn btn-success btn-md rounded-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="15" height="15" viewBox="0 0 24 24"
                    fill="none">
                    <path
                        d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>Export
            </div>
        </div>

        <div>
            <a href="/work-package" class="btn btn-warning btn-md rounded-3">
                <i class="fas fa-arrow-left" style="margin-right:10px"></i>Kembali
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
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
                                        <td>{{ $project->project_value }}</td>
                                    </tr>
                                    <tr>
                                        <td>Progres Fisik</td>
                                        <td>:</td>
                                        <td>{{ $project->physical_progress }}</td>
                                    </tr>
                                    <tr>
                                        <td>Progres Keuangan</td>
                                        <td>:</td>
                                        <td>{{ $project->finance_progress }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>{{ $project->status }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mulai</td>
                                        <td>:</td>
                                        <td>{{ $project->start_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>Selesai</td>
                                        <td>:</td>
                                        <td>{{ $project->end_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>Keuangan Bulanan</td>
                                        <td>:</td>
                                        <td>2022-08</td>
                                    </tr>
                                    <tr>
                                        <td>Sumber Dana</td>
                                        <td>:</td>
                                        <td>{{ $project->fundSource->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Penggunaan Jasa</td>
                                        <td>:</td>
                                        <td colspan="2" style="vertical-align: top;">
                                            {{ $project->serviceProvider->user_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Penyedia Nama</td>
                                        <td>:</td>
                                        <td>{{ $project->dinas->user_id }}</td>
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
                            <a href="/download-all-service-provider-project/{{ $project->id }}"
                                class="btn btn-success btn-sm rounded-3 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="15" height="15"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg> Download Semua
                            </a>
                            <div data-bs-toggle="modal" data-bs-target="#modal-create" class="btn btn-sm rounded-3"
                                style="background-color:#1B3061; color:white;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                                        fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                                        fill="white" />
                                </svg> Upload Progress
                            </div>
                        </div>

                    </div>
                    @if ($errors->has('date_start'))
                        <div class="alert mt-3 alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('date_start') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($errors->has('date_finish'))
                        <div class="alert mt-3 alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('date_finish') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($errors->has('description'))
                        <div class="alert mt-3 alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('description') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($errors->has('progres'))
                        <div class="alert mt-3 alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('progres') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Deskripsi</th>
                                    <th>Progres (%)</th>
                                    <th>Aksi</th>
                                    <th>file</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($serviceProviderProject as $index=>$serviceProviderProjec)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $serviceProviderProjec->date_start }}</td>
                                        <td>{{ $serviceProviderProjec->date_finish }}</td>
                                        <td>{{ $serviceProviderProjec->description }}</td>
                                        <td>{{ $serviceProviderProjec->progres }}% Progress</td>
                                        <td>
                                            <div class="d-flex justify-content-header gap-2">
                                                <div class="">
                                                    <a href="/service-provider-project-detail/{{ $serviceProviderProjec->id }}"
                                                        class="btn btn-sm" style="background-color: #1B3061;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 24 24" fill="none">
                                                            <path d="M4.5 12.5C7.5 6 16.5 6 19.5 12.5" stroke="white"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M12 16C10.8954 16 10 15.1046 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16Z"
                                                                stroke="white" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div class="">
                                                    <button class="btn btn-edit btn-sm btn-warning"
                                                        id="{{ $serviceProviderProjec->id }}"
                                                        data-id="{{ $serviceProviderProjec->id }}"
                                                        data-progres="{{ $serviceProviderProjec->progres }}"
                                                        data-description="{{ $serviceProviderProjec->description }}"
                                                        data-date_start="{{ \Carbon\Carbon::parse($serviceProviderProjec->date_start)->format('Y-m-d') }}"
                                                        data-date_finish="{{ \Carbon\Carbon::parse($serviceProviderProjec->date_finish)->format('Y-m-d') }}"><svg
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
                                                        id="{{ $serviceProviderProjec->id }}"
                                                        data-id="{{ $serviceProviderProjec->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 20 20" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z"
                                                                fill="white" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="/download-service-provider-project/{{ $serviceProviderProjec->id }}"
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
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <div class="d-flex justify-content-center" style="min-height:16rem">
                                                <div class="my-auto">
                                                    <img src="{{ asset('no-data.png') }}" width="300"
                                                        height="300" />
                                                    <h4 class="text-center mt-4">Pelatihan Masih Kosong!!</h4>
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
    <div class="modal fade bs-example-modal-xl" id="modal-create" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div style="background-color: #1B3061;">
                    <h5 class="modal-title text-white text-center m-3 fs-4">Tambah Progress</h5>
                </div>
                <form action="/service-provider-projects/{{ $project->id }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="date_start" id="">

                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Tanggal Akhir</label>
                                    <input type="date" class="form-control" name="date_finish" id="">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Progres (%)</label>
                                    <input type="text" class="form-control" name="progres" id="">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">File Pendukung</label>
                                    <input class="form-control" type="file" name="file" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="form-label" for="">Deskripsi</label>
                                <textarea class="form-control" name="description" id="" cols="20" rows="5"></textarea>
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
                                    <input type="date" class="form-control" name="date_start" id="update-date_start">

                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Tanggal Akhir</label>
                                    <input type="date" class="form-control" name="date_finish"
                                        id="update-date_finish">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">Progres (%)</label>
                                    <input type="text" class="form-control" name="progres" id="update-progres">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                    <label class="form-label">File Pendukung</label>
                                    <input class="form-control" type="file" name="file" id="update-file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="form-label" for="">Deskripsi</label>
                                <textarea class="form-control" name="description" id="update-description" cols="20" rows="5"></textarea>
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
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `/service-provider-projects/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            console.log(formData);
            var actionUrl = `/service-provider-projects/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);
            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })
    </script>
@endsection
