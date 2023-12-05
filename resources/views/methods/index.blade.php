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
                <form id="form-create">
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
                                name="school_year" id="nametext" aria-describedby="name"
                                placeholder="Masukkan Nama metode pelatihan" />
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
                    <thead >
                        <tr>
                            <th class="text-white" style="background-color: #1B3061">No</th>
                            <th class="text-white" style="background-color: #1B3061">Nama Metode Pelatihan</th>
                            <th class="text-white" style="background-color: #1B3061">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut orci orci, placerat nec quam
                                quis,</td>
                            <td>
                                <div class="d-flex justify-content-header gap-2">
                                    <div class="">
                                        <button type="button" class="btn btn-warning waves-effect waves-light">
                                            <i class="bx bx-error font-size-13 btn-sm align-middle me-2"></i> Warning
                                        </button>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-danger waves-effect waves-light">
                                            <i class="bx bx-block font-size-13 btn-sm align-middle me-2"></i> Danger
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut orci orci, placerat nec quam
                                quis,</td>
                            <td>
                                <div class="d-flex justify-content-header gap-2">
                                    <div class="">
                                        <button type="button" class="btn btn-warning waves-effect waves-light">
                                            <i class="bx bx-error font-size-13 btn-sm align-middle me-2"></i> Warning
                                        </button>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-danger waves-effect waves-light">
                                            <i class="bx bx-block font-size-13 btn-sm align-middle me-2"></i> Danger
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut orci orci, placerat nec quam
                                quis,</td>
                            <td>
                                <div class="d-flex justify-content-header gap-2">
                                    <div class="">
                                        <button type="button" class="btn btn-warning waves-effect waves-light">
                                            <i class="bx bx-error font-size-13 btn-sm align-middle me-2"></i> Warning
                                        </button>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-danger waves-effect waves-light">
                                            <i class="bx bx-block font-size-13 btn-sm align-middle me-2"></i> Danger
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
