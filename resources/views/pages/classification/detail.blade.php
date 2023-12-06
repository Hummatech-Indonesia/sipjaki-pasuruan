@extends('layouts.app')
@section('content')
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
    });
</script>
@endif
    <div class="">
        <div>
            <h2 class="">
                Detail Klasifikasi
            </h2>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="samedata-modal" tabindex="-1" id="modeal-create" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="sub-classifications/{{ $classification }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="modal-header d-flex align-items-center text-white " style="background-color: #1B3061">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Tambah Klasifikasi
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                Klasifikasi</label>
                            <input type="text" class="form-control" id="create-school_year" class="form-control"
                                name="name" id="nametext" aria-describedby="name" placeholder="" />
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
                    <h4 class="card-title mt-2">Arsiktektur</h4>
                </div>
                <div class="">
                    <button class="btn me-2 btn-md btn-create text-white" data-bs-toggle="modal"
                        data-bs-target="#samedata-modal" style="background-color: #1B3061">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"/></svg>
                        Tambah
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 table-borderless" border="1">
                    <thead>
                        <tr>
                            <th class="text-white" style="background-color: #1B3061">No</th>
                            <th class="text-white" style="background-color: #1B3061">Sub Klasifikasi</th>
                            <th class="text-white" style="background-color: #1B3061; text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    
                </table>
            </div>
            <p class="mt-3 fs-8" style="font-weight: 800">
                Total Jumlah 130 Sub Klasifikasi
            </p>
        </div>
    </div>
    <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center text-white" style="background-color: #1B3061">
                    <h4 class="modal-title" id="exampleModalLabel1">
                        Edit Metode Pelatihan
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: white;"></button>
                </div>
                <div class="modal-body">
                    <form id="form-update" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                Anggaran</label>
                            <input type="text" class="form-control" id="update-name" class="form-control"
                                name="name" aria-describedby="name" placeholder="Masukan Anggaran" />
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
