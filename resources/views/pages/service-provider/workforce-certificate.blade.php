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
    <h4 class="mb-3 font-size-18">Sertifikat</h4>
    <div class="mt-4 rounded p-4" style="background-color: #fff;box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
        <h6 class="mb-3 font-size-14">Berikut Daftar Sertifikat {{ $worker->name }}</h6>
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <div class="col-lg-12">
                    <form action="" class="">
                        <div class="input-group">
                            <input type="text" name="name" value="{{ request()->name }}" class="form-control"
                                placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn text-white"
                                    style="background-color: #1B3061; border-radius: 0 5px 5px 0;" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                        <th scope="col" class="text-white text-center"
                            style="background-color: #1B3061; border-radius:0px 5px 5px 0px; color: #ffffff; border-color: #1B3061; border-width: 0px;">
                            Aksi
                        </th>
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
                                    <a class="btn btn-md btn-success" href=""><i class="bx bxs-download bx-xs"></i></a>
                            </td>
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
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form id="form-create" action="{{ route('worker-certificate.store', ['worker' => $worker->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Tambah Tenaga Kerja
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Jenis Sertifikat</label>
                                <input type="text" class="form-control" id="create-name" class="form-control"
                                    name="certificate" aria-describedby="certificate"
                                    placeholder="Masukkan Jenis Sertifikat" value="{{ old('certificate') }}" />
                            </div>
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    No Registrasi</label>
                                <input type="text" class="form-control" id="create-name" class="form-control"
                                    name="registration_number" aria-describedby="registration_number"
                                    placeholder="Masukkan No Registrasi" value="{{ old('registration_number') }}" />
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
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Jenis Sertifikat</label>
                                <input type="text" class="form-control" id="create-name" class="form-control"
                                    name="certificate" aria-describedby="certificate"
                                    placeholder="Masukkan Jenis Sertifikat" value="{{ old('certificate') }}" />
                            </div>
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    No Registrasi</label>
                                <input type="text" class="form-control" id="create-name" class="form-control"
                                    name="registration_number" aria-describedby="registration_number"
                                    placeholder="Masukkan No Registrasi" value="{{ old('registration_number') }}" />
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
                    <iframe id="detail-file" align="top" height="620" width="100%" frameborder="0" scrolling="auto" data-file=""></iframe>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script>
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
