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
    <h4 class="mb-3 font-size-18">Tenaga Kerja</h4>
    <div class="d-flex justify-content-between">
        <div class="">
            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-create" class="btn text-white fw-normal"
                style="background-color:#1B3061;">
                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12" fill="white" viewBox="0 0 448 512">
                    <path
                        d="M246.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 109.3V320c0 17.7 14.3 32 32 32s32-14.3 32-32V109.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 53 43 96 96 96H352c53 0 96-43 96-96V352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V352z" />
                </svg>
                <span class="ms-2">Import</span>
            </button>
            <a href="{{ route('export.workers') }}">
                <button type="submit" class="btn text-white fw-normal" style="background-color:#2CA67A;">
                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" fill="white" transform="rotate(90)"
                        viewBox="0 0 512 512">
                        <path
                            d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                    </svg>
                    <span class="ms-2">Export</span>
                </button>
            </a>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modal-create" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form-create" action="{{ route('workers.store') }}" method="POST">
                    @csrf
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Tambah Tenaga Kerja
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Nama</label>
                                    <input type="text" value="{{ old('name') }}" class="form-control" id="create-name"
                                        class="form-control" name="name" aria-describedby="name"
                                        placeholder="Masukkan Nama" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Jenis
                                        Sertifikat</label>
                                    <input type="text" value="{{ old('cerificate') }}" class="form-control"
                                        id="create-name" class="form-control" name="cerificate" aria-describedby="name"
                                        placeholder="Masukkan Jenis Sertifikat" />
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Pendidikan</label>
                                    <input type="text" value="{{ old('education') }}" class="form-control"
                                        id="create-name" class="form-control" name="education" aria-describedby="name"
                                        placeholder="Masukkan Pendidikan" />
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">No.
                                        Registrasi</label>
                                    <input type="text" value="{{ old('registration_number') }}" class="form-control"
                                        id="create-name" class="form-control" name="registration_number"
                                        aria-describedby="name" placeholder="Masukkan No. Registrasi" />
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Tanggal
                                        Lahir</label>
                                    <input type="date" value="{{ old('birth_date') }}" class="form-control"
                                        id="create-name" class="form-control" name="birth_date" aria-describedby="name"
                                        placeholder="Masukkan Tanggal Lahir" />
                                </div>
                            </div>
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
    <div class="mt-4 rounded p-4" style="background-color: #fff;box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
        <h6 class="mb-3 font-size-14">Berikut Daftar Peserta Pelatihan</h6>
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <div class="d-flex position-relative col-lg-5">
                    <input type="search" class="form-control search-chat py-2 ps-5" id="search-name"
                        placeholder="Search">
                    <i class="bx bx-search-alt-2 position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
                <button class="btn ms-1 text-white rounded" style="background-color:#1B3061" onclick="selectAll()">
                    Pilih Semua
                </button>
                <form action="{{ route('delete-workers') }}" id="delete-multiple" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="worker_id" id="selected-worker">
                    <button type="button" class="btn ms-1 text-white rounded" style="background-color:#E05C39"
                        onclick="deleteSelected()">
                        Hapus Pilihan
                    </button>
                </form>
            </div>
            <button class="btn ms-1 rounded" data-bs-toggle="modal" data-bs-target="#modal-create"
                style="background-color:#1B3061;color:white">
                + Tambah
            </button>
        </div>
        <div class="table-responsive">
            @if ($errors->has('name'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ $errors->first('name') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('birth_date'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ $errors->first('birth_date') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('education'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ $errors->first('education') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('registration_number'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ $errors->first('registration_number') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('cerificate'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ $errors->first('cerificate') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table table-bordered table-hover mt-4">
                <thead>
                    <tr>
                        <th scope="col" class="text-center text-white"
                            style="background-color: #1B3061; border-radius:5px 0px 0px 5px; border-color: #1B3061; border-width: 0px;">
                            Select
                        </th>
                        <th scope="col" class="table-sipjaki text-center">Name</th>
                        <th scope="col" class="table-sipjaki text-center">Tanggal Lahir</th>
                        <th scope="col" class="table-sipjaki text-center">Pendidikan</th>
                        <th scope="col" class="table-sipjaki text-center">No Registrasi</th>
                        <th scope="col" class="table-sipjaki text-center" style="">
                            Jenis Sertifikat</th>
                        <th scope="col" class="text-white text-center"
                            style="background-color: #1B3061; border-radius:0px 5px 5px 0px; color: #ffffff; border-color: #1B3061; border-width: 0px;">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($workers as $worker)
                        <tr>
                            <th scope="row" class="text-center">
                                <input value="{{ $worker->id }}" type="checkbox"
                                    aria-label="Checkbox for following text input">
                            </th>
                            <td class="text-center">{{ $worker->name }}</td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($worker->birth_date)->translatedFormat('d F Y') }}</td>
                            <td class="text-center">{{ $worker->education }}</td>
                            <td class="text-center">{{ $worker->registration_number }}</td>
                            <td>{{ $worker->cerificate }}</td>
                            <td class="" style="border-bottom: 1px solid #fff">
                                <div class="d-flex justify-content-header gap-3">
                                    <div class="">
                                        <button id="btn-edit-{{ $worker->id }}" data-id="{{ $worker->id }}"
                                            data-name="{{ $worker->name }}"
                                            data-birth_date="{{ \Carbon\Carbon::parse($worker->birth_date)->translatedFormat('d F Y') }}"
                                            data-cerificate="{{ $worker->cerificate }}"
                                            data-education="{{ $worker->education }}"
                                            data-registration_number="{{ $worker->registration_number }}" type="button"
                                            data-bs-target="#modal-detail" data-bs-toggle="modal"
                                            class="btn btn-detail waves-effect waves-light text-white btn waves-effect d-flex flex-row gap-1 justify-content-evenly"
                                            style="background-color: #1B3061">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                viewBox="0 0 24 24" fill="none">
                                                <path d="M4.5 12.5C7.5 6 16.5 6 19.5 12.5" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M12 16C10.8954 16 10 15.1046 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16Z"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg> Detail
                                        </button>
                                    </div>
                                    <div class="">
                                        <button type="button"
                                            class="btn waves-effect waves-light d-flex btn-edit flex-row gap-1 justify-content-evenly"
                                            style="width: 90px; background-color: #FFC928; color: white"
                                            id="btn-edit-{{ $worker->id }}" data-id="{{ $worker->id }}"
                                            data-name="{{ $worker->name }}" data-birth_date="{{ $worker->birth_date }}"
                                            data-cerificate="{{ $worker->cerificate }}"
                                            data-education="{{ $worker->education }}"
                                            data-registration_number="{{ $worker->registration_number }}"><i
                                                class="bx bx-bx bxs-edit fs-4"></i>
                                            <span>Edit</span>
                                        </button>
                                    </div>
                                    <div class="">
                                        <button type="button"
                                            class="btn waves-effect waves-light d-flex flex-row gap-1 justify-content-between btn-delete"
                                            style="width: 90px; background-color: #E05C39; color: white" data-id=""
                                            data-bs-toggle="modal" data-bs-target="#modal-delete"><i
                                                class="bx bx-bx bxs-trash fs-4"></i>
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                <div class="d-flex justify-content-center" style="min-height:19rem">
                                    <div class="my-auto">
                                        <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                        <h4 class="text-center mt-4">Tenaga kerja kosong!!</h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modal-update" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form-update" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Tambah Tenaga Kerja
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Nama</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}"
                                        id="update-name" class="form-control" name="name" aria-describedby="name"
                                        placeholder="Masukkan Nama" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Jenis
                                        Sertifikat</label>
                                    <input value="{{ old('cerificate') }}" type="text" class="form-control"
                                        id="update-name" class="form-control" name="cerificate" aria-describedby="name"
                                        placeholder="Masukkan Jenis Sertifikat" />
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name"
                                        class="control-label mb-2">Pendidikan</label>
                                    <input value="{{ old('education') }}" type="text" class="form-control"
                                        id="update-name" class="form-control" name="education" aria-describedby="name"
                                        placeholder="Masukkan Pendidikan" />
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">No.
                                        Registrasi</label>
                                    <input value="{{ old('registration_number') }}" type="text" class="form-control"
                                        id="update-name" class="form-control" name="registration_number"
                                        aria-describedby="name" placeholder="Masukkan No. Registrasi" />
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Tanggal
                                        Lahir</label>
                                    <input type="date" value="{{ old('birth_date') }}" class="form-control"
                                        id="update-name" class="form-control" name="birth_date" aria-describedby="name"
                                        placeholder="Masukkan Tanggal Lahir" />
                                </div>
                            </div>
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
    <div class="modal fade bs-example-modal-md" id="modal-detail" tabindex="-1" role="dialog"
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
                                <span id="detail-name"></span>
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
@endsection
@section('script')
    <script>
        $('.btn-detail').click(function() {
            const data = getDataAttributes($(this).attr('id'))
            handleDetail(data)
            $('#modal-detail').modal('show')
        })
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `workers/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);
            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', actionUrl);
            $('#modal-update').modal('show')
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `contract-categories/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })

        function updateSelected() {
            var selectedIds = [];
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    var workerId = checkbox.value;
                    selectedIds.push(workerId);
                }
            });
            document.getElementById('selected-worker').value = selectedIds;
        }

        function deleteSelected() {
            updateSelected();
            var selectedIds = document.getElementById('selected-worker').value;
            if (selectedIds) {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin melanjutkan?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-multiple').submit();
                    } else {
                        Swal.fire('Dibatalkan', 'Aksi telah dibatalkan.', 'error');
                    }
                });
            } else {
                Swal.fire({
                    'icon': 'error',
                    'title': 'error',
                    'text': 'Setidaknya Pilih Satu Tenaga kerja Untuk Dihapus'
                })
            }
        }

        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', updateSelected);
        });

        function selectAll() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = true;
            });
        }
    </script>
@endsection
