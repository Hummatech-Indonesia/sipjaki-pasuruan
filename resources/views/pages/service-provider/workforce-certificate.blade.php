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
    <div class="d-flex justify-content-between">
        <h4 class="mb-3 font-size-18">Sertifikat</h4>
        <div class="">
            <a href="/workers" class="btn me-2 btn-md btn-warning text-white cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 16" fill="none">
                    <path
                        d="M0.292893 7.29289C-0.0976314 7.68342 -0.0976315 8.31658 0.292892 8.7071L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34314C8.46159 1.95262 8.46159 1.31946 8.07107 0.928931C7.68054 0.538406 7.04738 0.538406 6.65686 0.928931L0.292893 7.29289ZM24 7L1 7L1 9L24 9L24 7Z"
                        fill="white"></path>
                </svg> Kembali
            </a>
        </div>
    </div>
    <div class="mt-4 rounded p-4" style="background-color: #fff;box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
        <div class="d-flex justify-content-between">
            <h6 class="mb-3 font-size-14">Berikut Daftar Sertifikat {{ $worker->name }}</h6>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create"
                    style="background-color: #1B3061; border-radius: 10px"><i class="fas fa-plus"
                        style="margin-right:10px"></i>Tambah</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-borderless table-hover mt-4">
                <thead>
                    <tr>

                        <th scope="col" class="table-sipjaki text-center" style="">
                            No</th>
                        <th scope="col" class="table-sipjaki text-center" style="">
                            File Sertifikat</th>
                        <th scope="col" class="table-sipjaki text-center" style="">
                            Jenis Sertifikat</th>
                        <th scope="col" class="table-sipjaki text-center">No Registrasi</th>
                        @role('service provider')
                            <th scope="col" class="text-white text-center"
                                style="background-color: #1B3061; border-radius:0px 5px 5px 0px; color: #ffffff; border-color: #1B3061; border-width: 0px;">
                                Aksi
                            </th>
                        @endrole
                    </tr>
                </thead>
                <tbody>
                    @forelse ($workerCertificates as $workerCertificate)
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-center">
                                <button class="btn btn-primary btn-detail btn-sm"
                                    id="btn-detail-{{ $workerCertificate->id }}" data-id="{{ $workerCertificate->id }}"
                                    data-file={{ asset('storage/' . $workerCertificate->file) }}>
                                    <i class="bx bx-file bx-sm"></i>
                                </button>
                            </td>
                            <td class="text-center">
                                {{ $workerCertificate->certificate }}
                            </td>
                            <td class="text-center">
                                {{ $workerCertificate->registration_number }}
                            </td>
                            @role('service provider')
                                <td class="d-flex flex-row justify-content-center gap-2">
                                    <button type="button"
                                        class="btn waves-effect waves-light d-flex btn-edit flex-row gap-1 justify-content-evenly"
                                        style="width: 90px; background-color: #FFC928; color: white"
                                        id="btn-edit-{{ $workerCertificate->id }}" data-id="{{ $workerCertificate->id }}"
                                        data-certificate="{{ $workerCertificate->certificate }}"
                                        data-registration_number="{{ $workerCertificate->registration_number }}"><i
                                            class="bx bx-bx bxs-edit fs-4"></i>
                                        <span>Edit</span></button>
                                    <button type="button"
                                        class="btn waves-effect waves-light btn-delete d-flex flex-row gap-1 justify-content-between"
                                        style="width: 90px; background-color: #E05C39; color: white"
                                        data-id="{{ $workerCertificate->id }}" data-bs-toggle="modal"
                                        data-bs-target="#modal-delete"><i class="bx bx-bx bxs-trash fs-4"></i> Hapus</button>
                                    <a class="btn btn-md btn-success"
                                        href="{{ route('worker-certificate-download', ['worker_certificate' => $workerCertificate->id]) }}"><i
                                            class="bx bxs-download bx-xs"></i></a>
                                </td>
                            @endrole
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <div class="d-flex justify-content-center" style="min-height:16rem">
                                    <div class="my-auto">
                                        <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                        <h4 class="text-center mt-4">Tidak Ada Sertifikat!!</h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modal-create" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form-create" action="{{ route('worker-certificate.store', ['worker' => $worker->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Tambah Serifikasi
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-6 mb-3">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Jenis Sertifikat</label>
                                <input type="text" class="form-control" id="create-name" class="form-control"
                                    name="certificate" aria-describedby="certificate"
                                    placeholder="Masukkan Jenis Sertifikat" value="{{ old('certificate') }}" />
                            </div>
                            <div class="col-6 mb-3">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    No Registrasi</label>
                                <input type="text" class="form-control" id="create-name" class="form-control"
                                    name="registration_number" aria-describedby="registration_number"
                                    placeholder="Masukkan No Registrasi" value="{{ old('registration_number') }}" />
                            </div>
                            <div class="col-6 mb-3">
                                <label for="" class="form-label">Klasifikasi</label>
                                <select name="clasification_id" id="create-clasification" style="width: 100%"
                                    class="form-select clasification_id select-2 select2-create w-100">

                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="" class="form-label">Sub Klasifikasi</label>
                                <select name="sub_clasification_id" id="create-sub_clasification_id" style="width: 100%"
                                    class="form-select sub-classification select-2 select2-create w-100"></select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="" class="form-label">Kualifikasi</label>
                                <select name="qualification_id" id="create-qualification" style="width: 100%"
                                    class="form-select select-2 qualification select2-create w-100"></select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="" class="form-label">Jenjang</label>
                                <select name="sub_qualification_id" id="create-sub_qualification_id" style="width: 100%"
                                    class="form-select sub-qualification select-2 select2-create w-100"></select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    File Sertifikat</label>
                                <input type="file" class="form-control" id="create-name" class="form-control"
                                    name="file" aria-describedby="name" value="{{ old('file') }}"
                                    placeholder="Masukkan No Telepon" />
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
    <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form id="form-update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Edit Pengurus
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-6 mb-3">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Jenis Sertifikat</label>
                                <input type="text" class="form-control" id="create-name" class="form-control"
                                    name="certificate" aria-describedby="certificate"
                                    placeholder="Masukkan Jenis Sertifikat" value="{{ old('certificate') }}" />
                            </div>
                            <div class="col-6 mb-3">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    No Registrasi</label>
                                <input type="text" class="form-control" id="create-name" class="form-control"
                                    name="registration_number" aria-describedby="registration_number"
                                    placeholder="Masukkan No Registrasi" value="{{ old('registration_number') }}" />
                            </div>
                            <div class="col-6 mb-3">
                                <label for="" class="form-label">Klasifikasi</label>
                                <select name="clasification_id" id="update-clasification" style="width: 100%"
                                    class="form-select clasification_id select-2 select2-update w-100">

                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="" class="form-label">Sub Klasifikasi</label>
                                <select name="sub_clasification_id" id="update-sub_clasification_id" style="width: 100%"
                                    class="form-select sub-classification select-2 select2-update w-100"></select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="" class="form-label">Kualifikasi</label>
                                <select name="qualification_id" id="update-qualification" style="width: 100%"
                                    class="form-select select-2 qualification select2-update w-100"></select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="" class="form-label">Jenjang</label>
                                <select name="sub_qualification_id" id="update-sub_qualification_id" style="width: 100%"
                                    class="form-select sub-qualification select-2 select2-update w-100"></select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    File Sertifikat</label>
                                <input type="file" class="form-control" id="create-name" class="form-control"
                                    name="file" aria-describedby="name" value="{{ old('file') }}"
                                    placeholder="Masukkan No Telepon" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" style="background-color: #1B3061" class="btn text-white btn-create">
                            Edit
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
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Detail</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="detail-file" align="top" height="620" width="100%" frameborder="0"
                        scrolling="auto" data-file=""></iframe>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script>
        $('#worker').addClass('mm-active')
        $('#worker-link').addClass('active')
        $(document).ready(function() {
            $(".select2-create").select2({
                dropdownParent: $("#modal-create")
            });
            $(".select2-update").select2({
                dropdownParent: $("#modal-update")
            });
        });
        $('.select-2').select2()

        getClassification()

        function getClassification() {
            $.ajax({
                url: '/json-classification-training',
                method: 'GET',
                dataType: 'JSON',
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#create-clasification').append(option);
                        $('#update-clasification').append(option);
                    })

                    $('#create-clasification').change(function() {
                        var selectedClassificationId = $(this).val();
                        if (selectedClassificationId !== '') {
                            getSubClassification(
                                selectedClassificationId
                            );
                        }
                    });
                    $('#update-clasification').change(function() {
                        var selectedClassificationId = $(this).val();
                        if (selectedClassificationId !== '') {
                            getSubClassification(
                                selectedClassificationId
                            );
                        }
                    });
                }
            })
        }

        function getSubClassification(id) {
            $.ajax({
                url: '/json-sub-classification-training/' + id,
                method: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $('#create-sub_clasification_id').empty().trigger('change');
                    $('#update-sub_clasification_id').empty().trigger('change');
                },
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#create-sub_clasification_id').append(option);
                        $('#update-sub_clasification_id').append(option);
                    })
                }
            })
        }
        getQualification()

        function getQualification() {
            $.ajax({
                url: '/list-qualification-training',
                method: 'GET',
                dataType: 'JSON',
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#create-qualification').append(option);
                        $('#update-qualification').append(option);
                    });
                    $('#create-qualification').change(function() {
                        var selectedClassificationId = $(this).val();
                        if (selectedClassificationId !== '') {
                            getSubQualification(
                                selectedClassificationId
                            );
                        }
                    });
                    $('#update-qualification').change(function() {
                        var selectedClassificationId = $(this).val();
                        if (selectedClassificationId !== '') {
                            getSubQualification(
                                selectedClassificationId
                            );
                        }
                    });
                }
            })
        }

        function getSubQualification(id) {
            $.ajax({
                url: '/json-qualification-level-training/' + id,
                method: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $('#create-sub_qualification').empty().trigger('change');
                    $('#update-sub_qualification').empty().trigger('change');
                },
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#create-sub_qualification').append(option);
                        $('#update-sub_qualification').append(option);
                    })
                }
            })
        }
        $('.btn-detail').click(function() {
            const data = getDataAttributes($(this).attr('id'))
            handleFile(data)
            console.log(data);
            $('#modal-detail').modal('show')
        })
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `/worker-certificate/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);

            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `/worker-certificate/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection
