@extends('layouts.app')
@section('content')
    <x-delete-modal-component />
    <h2>Tahun Anggaran</h2>
    <div class="card p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5>
                    Berikut daftar anggaran setiap tahun
                </h5>
            </div>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create"
                    style="background-color: #1B3061; border-radius: 10px"><i class="fas fa-plus" style="margin-right:10px"></i>Tambah</button>
            </div>
        </div>
        <div class="modal fade" id="modal-create" tabindex="-1" id="modal-create" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="form-create">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="exampleModalLabel1">
                                Tambah Tahun Anggaran
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form-create" method="POST">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan Anggaran</label>
                                    <input type="text" class="form-control" id="create-school_year" class="form-control"
                                        name="school_year" id="nametext" aria-describedby="name"
                                        placeholder="Masukan Anggaran" />
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
        <div class="table-responsive">
            <table class="table" border="1" style="border-color: #1B3061">
                <thead>
                    <tr>
                        <th style="background-color: #1B3061;color:#ffffff">No</th>
                        <th style="background-color: #1B3061;color:#ffffff">Nama Tahun Anggaran</th>
                        <th style="background-color: #1B3061;color:#ffffff;text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="fs-5" style="border-right: 1px solid #1B3061">1</th>
                        <td class="fs-5" style="border-right: 1px solid #1B3061">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab, modi.</td>
                        <td class="d-flex flex-row gap-3 justify-content-center" style="border-bottom: 1px solid #fff">
                            <button type="button" class="btn waves-effect waves-light d-flex flex-row gap-1 justify-content-evenly" style="width: 90px; background-color: #FFC928; color: white" data-bs-toggle="modal" data-bs-target="#modal-update"><i class="bx bx-bx bxs-edit fs-4"></i> <span>Edit</span></button>
                            <button type="button" class="btn waves-effect waves-light d-flex flex-row gap-1 justify-content-between" style="width: 90px; background-color: #E05C39; color: white" data-bs-toggle="modal" data-bs-target="#modal-delete"><i class="bx bx-bx bxs-trash fs-4"></i> Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="form-create">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="exampleModalLabel1">
                                Edit Masukan Anggaran
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form-create" method="POST">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan Anggaran</label>
                                    <input type="text" class="form-control" id="create-school_year" class="form-control"
                                        name="school_year" id="nametext" aria-describedby="name"
                                        placeholder="Masukan Anggaran" />
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
    </div>
@endsection
