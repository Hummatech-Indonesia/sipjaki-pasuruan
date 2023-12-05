@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between">
        <div class="">
            <p class="fs-5 text-dark" style="font-weight: 600">
                Metode Pelatihan
            </p>
        </div>
        <div class="">
            <button class="btn me-2 mb-1 btn-md btn-create text-white" data-bs-toggle="modal" data-bs-target="#samedata-modal" style="background-color: #1B3061">
                Tambah Metode
            </button>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="samedata-modal" tabindex="-1" id="modeal-create" aria-labelledby="exampleModalLabel1">
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
                                    placeholder="Masukkan Nama metode pelatihan" />
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-success btn-create" >
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal --}}
@endsection