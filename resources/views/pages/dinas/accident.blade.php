@extends('layouts.app')
@section('content')
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
    });
</script>
@endif
    <h3>
        Kecelakaan
    </h3>
    <div class="d-flex justify-content-between mb-3">
        <div class="d-flex justify-content-header gap-3 mt-4">
            <div class="">
                <div class="position-relative mb-3 ">
                    <input type="search" class="form-control search-chat py-2 ps-5" id="search-name" placeholder="Search">
                    <i
                        class="bx bx-search-alt-2
                position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>
            <div class="">
                <button class="btn text-white" style="background-color: #2CA67A">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none">
                        <path
                            d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>Export
                </button>
            </div>
        </div>
        <div class="">
            <button class="btn text-white mt-4" data-bs-toggle="modal" data-bs-target="#modal-create"
                style="background-color: #1B3061">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
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
    {{-- modal --}}
    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Pelatihan</h5>
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
                                    <label for="update-year">Pekerjaan</label>
                                    <select name="project_id" class="form-control select2" style="width:100%"
                                        id="project_id">
                                        <option value="">Pilih Pekerjaan</option>
                                    </select>
                                    @error('project_id')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-email-input">Waktu</label>
                                    <input type="datetime-local" class="form-control" name="time" id="update-name"
                                        placeholder="masukan nama pekerjaan">
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
                                    <label for="update-source_found">Lokasi</label>
                                    <textarea name="location" id="" class="form-control"></textarea>
                                    @error('location')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-nilai_kontrak">Deskripsi</label>
                                    <textarea name="description" id="" class="form-control"></textarea>
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
                                    <label for="update-vatno-input">Kerugian</label>
                                    <textarea name="loss" id="" class="form-control"></textarea>
                                    @error('loss')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-cstno-input">Masalah</label>
                                    <textarea name="problem" id="" class="form-control"></textarea>
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
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
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
    <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Pelatihan</h5>
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
                                    <label for="update-year">Pekerjaan</label>
                                    <select name="project_id" class="form-control select2" style="width:100%"
                                        id="update-project_id">
                                        <option value="">Pilih Pekerjaan</option>
                                    </select>
                                    @error('project_id')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-email-input">Waktu</label>
                                    <input type="datetime-local" class="form-control" name="time" id="update-time"
                                        placeholder="masukan nama pekerjaan">
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
                                    <label for="update-source_found">Lokasi</label>
                                    <textarea name="location" id="update-location" class="form-control"></textarea>
                                    @error('location')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-nilai_kontrak">Deskripsi</label>
                                    <textarea name="description" id="update-description" class="form-control"></textarea>
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
                                    <label for="update-vatno-input">Kerugian</label>
                                    <textarea name="loss" id="update-loss" class="form-control"></textarea>
                                    @error('loss')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="update-cstno-input">Masalah</label>
                                    <textarea name="problem" id="update-problem" class="form-control"></textarea>
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
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
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
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Pelatihan</h5>
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
                                <div class="">
                                    <button class="btn text-white" style="background-color: #2CA67A">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span>
                                            Export
                                        </span>
                                    </button>
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
                                        <p class="mb-2 text-dark">Keerugian :</p>
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
    <div class="row">
        @forelse ($accidents as $accident)
            <div class="col-12 col-lg-6 col-xxl-4">
                <div class="card ">
                    <div class="card-body">
                        <div class="badge bg-light text-info">
                            <p class="mb-0 px-3 py-1 fs-6">
                                {{ $accident->project->name }}
                            </p>
                        </div>
                        <div class="">
                            <p class="mb-0 mt-3 fs-4" style="font-weight: 600">
                                {{ $accident->problem }}
                            </p>
                        </div>
                        <div class="d-flex justify-content-header gap-3 mt-4">
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
                                    href="{{ route('detail.accident.index') }}" class="btn text-white btn-detail"
                                    style="background-color: #1B3061">
                                    Detail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="d-flex justify-content-center" style="min-height:16rem">
                <div class="my-auto">
                    <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                    <h4 class="text-center mt-4">Kecelakaan Tidak Tersedia!!</h4>
                </div>
            </div>
        @endforelse
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script>
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
            var actionUrl = `accident.destroy/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
        $('.btn-detail').click(function() {
            const formData = getDataAttributes($(this).attr('id'));
            var actionUrl = `${formData['id']}`;
            show();

            function show() {
                $.ajax({
                    url: "accident.show/" + actionUrl,
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
            var actionUrl = `training-member-update/${formData['id']}`;
            var id = `${formData['id']}`;
            show();

            function show() {
                $.ajax({
                    url: "accident.show/" + id,
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
