@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div>
            <h2 class="">Sumber Dana</h2>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span>
                                <h5 style="color: #1B3061">Berikut List - List Sumber Dana</h4>
                            </span>
                            <span>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create"
                                    style="background-color: #1B3061"><i class="fas fa-plus"
                                        style="margin-right:10px"></i>Tambah</button>
                            </span>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0" border="1" style="border-color: #1B3061">
                                <thead class="table-light">
                                    <tr class="">
                                        <th class="fw-medium"
                                            style="background-color: #1B3062; color: white; border-right: 1px solid #1B3061">
                                            No</th>
                                        <th class="fw-medium"
                                            style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061">
                                            Nama Sumber Dana</th>
                                        <th class="fw-medium"
                                            style="background-color: #1B3061; color: white; text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <th scope="row" class="fs-5" style="border-right: 1px solid #1B3061">1</th>
                                            <td class="fs-5" style="border-right: 1px solid #1B3061">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, corporis.</td>
                                            <td class="d-flex flex-row gap-3 justify-content-center"
                                                style="border-bottom: 1px solid #fff">
                                                <button type="button" id="btn-edit" data-bs-toggle="modal" data-bs-target="#modal-update"
                                                    class="btn waves-effect waves-light d-flex flex-row gap-1 justify-content-evenly btn-edit"
                                                    style="width: 90px; background-color: #FFC928; color: white"><i
                                                        class="bx bx-bx bxs-edit fs-4"></i> <span>Edit</span></button>
                                                <button type="button"
                                                    class="btn waves-effect waves-light d-flex flex-row gap-1 justify-content-between"
                                                    style="width: 90px; background-color: #E05C39; color: white"
                                                    data-bs-toggle="modal" data-bs-target="#modal-delete"><i
                                                        class="bx bx-bx bxs-trash fs-4"></i> Hapus</button>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-create" tabindex="-1" id="modal-create" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-create" method="POST" method="{{ route('source-fund.store') }}">
                    @csrf
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Tambah Sumber Dana
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-create" method="POST">
                            <div class="mb-3">
                                <label id="name" for="recipient-name" class="control-label mb-2">Nama</label>
                                <input type="text" class="form-control" id="create-school_year" class="form-control"
                                    name="name" id="nametext" aria-describedby="name"
                                    placeholder="Masukkan Nama Sumber Dana" />
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Edit Sumber Dana
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-update" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label id="name" for="recipient-name" class="control-label mb-2">Sumber Dana</label>
                                <input type="text" class="form-control"  class="form-control"
                                    name="name" id="nametext" aria-describedby="name"
                                    placeholder="Masukkan Nama Sumber Dana" />
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger text-white font-medium waves-effect"
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
    <x-delete-modal-component />
@endsection

@section('script')
    <script>
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            console.log(formData);
            var actionUrl = `source-fund/${formData['id']}`;
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