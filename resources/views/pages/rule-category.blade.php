@extends('layouts.app')
@section('content')
<x-delete-modal-component />
    <h2>Kategori Peraturan</h2>
    <div class="card p-3">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <h5>
                    Daftar-Daftar Peraturan
                </h5>
            </div>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create"
                    style="background-color: #1B3061"><i class="fas fa-plus" style="margin-right:10px"></i>Tambah</button>
            </div>
        </div>
        <div class="modal fade" id="modal-create" tabindex="-1" id="modal-create" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="form-create">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="exampleModalLabel1">
                                Tambah Metode Pelatihan
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form-create" method="POST">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Nama</label>
                                    <input type="text" class="form-control" id="create-school_year" class="form-control"
                                        name="school_year" id="nametext" aria-describedby="name"
                                        placeholder="Masukkan Nama kategori pelatihan" />
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
            <table class="table">
                <thead>
                    <tr>
                        <th style="background-color: #1B3061;color:#ffffff">No</th>
                        <th style="background-color: #1B3061;color:#ffffff">Nama Peraturan</th>
                        <th style="background-color: #1B3061;color:#ffffff">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut orci orci, placerat nec quam quis,
                        </td>
                        <td>
                            <div class="d-flex justify-content-header gap-2">
                                <div class="">
                                    <button type="button" class="btn btn-warning waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modal-update">
                                        <i class="bx bx-edit font-size-17 btn-sm align-middle me-2"></i> Edit
                                    </button>
                                </div>
                                <div class="">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modal-delete" class="btn btn-danger waves-effect waves-light">
                                        <i
                                            class="bx bx-trash-alt font-size-17 btn-sm align-middle me-2"></i>
                                        Hapus
                                    </button>
                                </div>
                            </div>
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
                                Edit Metode Pelatihan
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form-create" method="POST">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Nama</label>
                                    <input type="text" class="form-control" id="create-school_year" class="form-control"
                                        name="school_year" id="nametext" aria-describedby="name"
                                        placeholder="Masukkan Nama kategori pelatihan" />
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
