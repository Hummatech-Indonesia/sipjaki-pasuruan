@extends('layouts.app')
@section('content')
    <div class="">
        <p class="fs-5 text-dark" style="font-weight: 600">
            Metode Pelatihan
        </p>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="samedata-modal" tabindex="-1" id="modeal-create" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('training-methods.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-header d-flex align-items-center text-white " style="background-color: #1B3061">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Tambah Metode Pelatihan
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label id="name" for="recipient-name" class="control-label mb-2">Nama</label>
                            <input type="text" class="form-control" id="create-school_year" class="form-control"
                                name="name" id="nametext" aria-describedby="name"
                                placeholder="Masukkan Nama metode pelatihan" />
                            @error('name')
                                <div class="bg-light-warning text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-success btn-create">
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal --}}
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <div class="">
                    <h4 class="card-title mt-2">Daftar Metode Pelatihan</h4>
                </div>
                <div class="">
                    <button class="btn me-2 btn-md btn-create text-white" data-bs-toggle="modal"
                        data-bs-target="#samedata-modal" style="background-color: #1B3061">
                        Tambah Metode
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="text-white" style="background-color: #1B3061">No</th>
                            <th class="text-white" style="background-color: #1B3061">Nama Metode Pelatihan</th>
                            <th class="text-white" style="background-color: #1B3061">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($traingMethods as $data)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <div class="d-flex justify-content-header gap-2">
                                        <div class="">
                                            <button type="button" class="btn btn-warning waves-effect waves-light btn-edit"
                                                id="btn-edit-{{ $data->id }}" data-id="{{ $data->id }}"
                                                data-name="{{ $data->name }}">
                                                <i class="bx bx-error font-size-13 btn-sm align-middle me-2"></i> Edit
                                            </button>
                                        </div>
                                        <div class="">
                                            <button type="button"
                                                class="btn btn-danger waves-effect waves-light btn-delete"
                                                data-id="{{ $data->id }}" id="btn-delete-{{ $data->id }}">
                                                <i class="bx bx-block font-size-13 btn-sm align-middle me-2"></i> Danger
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            data kosong
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">
                        Edit Masukan Anggaran
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-update" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                Anggaran</label>
                            <input type="text" class="form-control" id="update-name" class="form-control" name="name"
                                aria-describedby="name" placeholder="Masukan Anggaran" />
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
    <x-delete-modal-component />
@endsection
@section('script')
    <script>
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `training-methods/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);
            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `training-methods/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection
