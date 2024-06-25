@extends('layouts.app')
@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h3>
            Kecelakaan
        </h3>
        <div class="d-flex justify-content-between ">
            <form action="" method="GET" class="d-flex gap-3 col-10">
                <select name="year" id="search-year" class="form-control">
                    <option value="" selected> Semua Tahun</option>
                    @foreach ($fiscalYears as $fiscalYear)
                        <option {{ $fiscalYear->name == request()->year ? 'selected' : '' }} value="{{ $fiscalYear->name }}">
                            {{ $fiscalYear->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn text-white d-flex items-center gap-2" style="background-color:#1B3061">
                    Cari <i class="fa fa-search my-auto"></i>
                </button>
            </form>
            <div class="">
                <button class="btn text-white" data-bs-toggle="modal" data-bs-target="#modal-create"
                    style="background-color: #1B3061">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
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
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" data-bs-backdrop="static"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Kecelakaan</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('accident.store') }}" id="form-create" method="post">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-executor_project_id">Pekerjaan</label>
                                    <select name="executor_project_id" class="form-control select2" style="width:100%"
                                        id="update-executor_project_id">
                                        <option value="">Pilih Pekerjaan</option>
                                        @foreach ($executorProjects as $executorProject)
                                            <option value="{{ $executorProject->id }}"
                                                {{ old('executor_project_id', $executorProject->id) == $executorProject->id ? 'selected' : '' }}>
                                                {{ $executorProject->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('executor_project_id')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-time">Waktu</label>
                                    <input type="datetime-local" class="form-control" name="time" id="create-time"
                                        value="{{ old('time') }}" placeholder="masukan waktu">
                                    @error('time')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-location">Lokasi</label>
                                    <textarea name="location" id="update-location" class="form-control">{{ old('location') }}</textarea>
                                    @error('location')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-description">Deskripsi</label>
                                    <textarea name="description" id="update-description" class="form-control">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-loss">Kerugian</label>
                                    <textarea name="loss" id="update-loss" class="form-control">{{ old('loss') }}</textarea>
                                    @error('loss')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-problem">Masalah</label>
                                    <textarea name="problem" id="update-problem" class="form-control">{{ old('problem') }}</textarea>
                                    @error('problem')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-end">
                        <div class="d-flex justify-content-header gap-3">
                            <div class="">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    Batal
                                </button>
                            </div>
                            <div class="">
                                <button type="submit" class="btn text-white"
                                    style="background-color: #1B3061">Simpan</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    {{-- end modal --}}
    {{-- modal edit --}}
    <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" data-bs-backdrop="static"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Edit Pelatihan</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="form-update" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-executor_project_id">Pekerjaan</label>
                                    <select name="executor_project_id" class="form-control select2" style="width:100%"
                                        id="update-executor_project_id">
                                        <option value="">Pilih Pekerjaan</option>
                                        @foreach ($executorProjects as $executorProject)
                                            <option value="{{ $executorProject->id }}"
                                                {{ old('executor_project_id', $executorProject->id) == $executorProject->id ? 'selected' : '' }}>
                                                {{ $executorProject->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('executor_project_id')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-time">Waktu</label>
                                    <input type="datetime-local" class="form-control" name="time" id="update-time"
                                        value="{{ old('time') }}" placeholder="masukan waktu">
                                    @error('time')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-location">Lokasi</label>
                                    <textarea name="location" id="update-location" class="form-control">{{ old('location') }}</textarea>
                                    @error('location')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-description">Deskripsi</label>
                                    <textarea name="description" id="update-description" class="form-control">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-loss">Kerugian</label>
                                    <textarea name="loss" id="update-loss" class="form-control">{{ old('loss') }}</textarea>
                                    @error('loss')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-problem">Masalah</label>
                                    <textarea name="problem" id="update-problem" class="form-control">{{ old('problem') }}</textarea>
                                    @error('problem')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <div class="d-flex justify-content-end">
                        <div class="d-flex justify-content-header gap-3">
                            <div class="">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    Batal
                                </button>
                            </div>
                            <div class="">
                                <button type="submit" class="btn text-white"
                                    style="background-color: #1B3061">Simpan</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    {{-- end modal edit --}}
    {{-- modal detail --}}

    <div class="modal fade bs-example-modal-md" id="modal-detail" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Detail Kecelakaan</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="badge bg-info">
                                    <p class="mb-0 px-3 py-1 mt-1 fs-6 data-year">
                                    </p>
                                </div>
                            </div>
                            <p class="mt-3 fs-5 text-dark mb-2 data-name" style="font-weight: 700">
                            </p>
                            <div class="">
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Lokasi :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark data-location" style="font-weight:600;"></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Waktu :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark data-time" style="font-weight:600;"></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Deskripsi :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark data-description" style="font-weight:600;"></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Kerugian :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark data-loss" style="font-weight:600;"></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Masalah :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark data-problem" style="font-weight:600;"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    {{-- end modal --}}
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
    <div class="table-responsive">
        <table class="table table-borderless" border="1">
            <thead>
                <tr>
                    <th class="text-center table-sipjaki">No</th>
                    <th class="text-center table-sipjaki">Nama Pekerjaan</th>
                    <th class="text-center table-sipjaki">Masalah</th>
                    <th class="text-center table-sipjaki">Kerugian</th>
                    <th class="text-center table-sipjaki">Waktu</th>
                    <th class="text-center table-sipjaki">Aksi</th>
                </tr>
            </thead>
            @forelse ($accidents as $accident)
                <tbody>
                    <tr>
                        <td class="text-center">
                            {{ $loop->iteration }}
                        </td>
                        <td class="text-center">
                            {{ $accident->executorProject->name }}
                        </td>
                        <td class="text-center">
                            {{ $accident->problem }}
                        </td>
                        <td class="text-center">
                            {{ $accident->loss }}
                        </td>
                        <td class="text-center">
                            {{ Carbon\Carbon::parse($accident->time)->formatLocalized('%e %B %Y %H:%M'); }}
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-3">
                                <div class="">
                                    <button class="btn btn-danger btn-delete" id="btn-edit-{{ $accident->id }}"
                                        data-id="{{ $accident->id }}">
                                        Hapus
                                    </button>
                                </div>
                                <div class="">
                                    <button class="btn btn-warning btn-edit" id="btn-edit-{{ $accident->id }}"
                                        data-project_id="{{ $accident->project_id }}"
                                        data-location="{{ $accident->location }}"
                                        data-description="{{ $accident->description }}"
                                        data-time="{{ \Carbon\Carbon::parse($accident->time)->format('Y-m-d') }}"
                                        data-loss="{{ $accident->loss }}" data-problem="{{ $accident->problem }}">
                                        Edit
                                    </button>
                                </div>
                                <div class="">
                                    <button id="btn-edit-{{ $accident->id }}" data-id="{{ $accident->id }}"
                                        href="{{ route('accident.show', ['accident' => $accident->id]) }}"
                                        class="btn text-white btn-detail" style="background-color: #1B3061">
                                        Detail
                                    </button>
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
                                <h4 class="text-center mt-4">Kecelakaan Masih Kosong!!</h4>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforelse
        </table>
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script>
        function formatDateTime(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            return `${year}-${month}-${day}T${hours}:${minutes}`;
        }

        const currentDate = new Date();
        const formattedDate = formatDateTime(currentDate);

        $('#create-time').val(formattedDate)
        $(document).ready(function() {
            $("#update-project_id").select2({
                dropdownParent: $("#modal-update")
            });
            $("#project_id").select2({
                dropdownParent: $("#modal-create")
            });
        });
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `accident-destroy/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
        $('.btn-detail').click(function() {
            const formData = getDataAttributes($(this).attr('id'));
            var actionUrl = `${formData['id']}`;
            show();

            function show() {
                $.ajax({
                    url: "accident-show/" + actionUrl,
                    type: 'GET',
                    dataType: "JSON",
                    success: function(response) {
                        $('.data-name').text(response.data.project.name);
                        $('.data-year').text(response.data.project.year);
                        $('.data-loss').text(response.data.loss);
                        $('.data-problem').text(response.data.problem);
                        $('.data-description').text(response.data.description);
                        $('.data-time').text(response.data.time);
                        $('.data-location').text(response.data.location);
                    }
                });
            }
            $('#modal-detail').modal('show');
        });
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'));
            var actionUrl = `accident/${formData['id']}`;
            var id = `${formData['id']}`;
            show();

            function show() {
                $.ajax({
                    url: "accident-show/" + id,
                    type: 'GET',
                    dataType: "JSON",
                    success: function(response) {
                        var project = response.data.project;
                        var projectId = project.id;
                        var projectName = project.name;
                        var option = new Option(projectName, projectId, true, true);
                        $('#update-project_id').append(option).trigger('change');
                        $('#update-loss').val(response.data.loss);
                        $('#update-problem').val(response.data.problem);
                        $('#update-description').val(response.data.description);
                        $('#update-time').val(response.data.time);
                        $('#update-location').val(response.data.location);
                    }
                });
            }

            $('#form-update').attr('action', actionUrl);
            setFormValues('form-update', formData);
            $('#form-update').data('id', formData['id']);
            $('#modal-update').modal('show');
        });

        projects();

        function projects() {
            $.ajax({
                url: "list-projects",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`;
                        $('#project_id').append(option);
                        $('#update-project_id').append(option);
                    });
                }
            });
        }
    </script>
@endsection
