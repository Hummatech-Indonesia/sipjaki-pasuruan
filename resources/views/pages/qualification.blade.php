@extends('layouts.app')
@section('content')
    <h2>Kerangka Kualifikasi Nasional Indonesia</h2>
    <div class="card p-3">
        <div>
            <h5 class="mb-3">
                Berikut daftar Kerangka Nasional Indonesia
            </h5>
        </div>
        <div class="d-flex justify-content-between mb-3">
            <div class=" col-lg-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create"
                    style="background-color: #1B3061"><i class="fas fa-plus" style="margin-right:10px"></i>Tambah</button>
            </div>
        </div>
        <div class="modal fade" id="modal-create" tabindex="-1" id="modal-create" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="form-create" action="{{ route('qualifications.store') }}" method="POST">
                        @csrf
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="exampleModalLabel1">
                                Tambah Kualifikasi Nasional Indonesia
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan KKNI</label>
                                <input type="text" class="form-control" id="create-name" class="form-control"
                                    name="name" aria-describedby="name"
                                    placeholder="Masukkan Kualifikasi Nasional Indonesia" />
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
        @if ($errors->has('name'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('name') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-borderless" border="1">
                <thead>
                    <tr>
                        <th style="background-color: #1B3061;color:#ffffff" >No</th>
                        <th style="background-color: #1B3061;color:#ffffff">Nama Kualifikasi</th>
                        <th style="background-color: #1B3061;color:#ffffff">Jumlah Jenjang</th>
                        <th style="background-color: #1B3061;color:#ffffff; text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($qualifications as $index => $qualification)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $qualification->name }}
                            </td>
                            <td>{{ $qualification->qualification_levels_count }}</td>
                            <td class="d-flex flex-row gap-3 justify-content-center" style="border-bottom: 1px solid #fff">
                                <a href="{{ route('qualifications.show', $qualification->id) }}" type="button" class="btn  waves-effect waves-light text-white"
                                    style="background-color: #1B3061">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                        viewBox="0 0 24 24" fill="none">
                                        <path d="M4.5 12.5C7.5 6 16.5 6 19.5 12.5" stroke="white"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M12 16C10.8954 16 10 15.1046 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16Z"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg> Jenjang
                                </a>
                                <button type="button"
                                    class="btn waves-effect waves-light d-flex btn-edit flex-row gap-1 justify-content-evenly"
                                    style="width: 90px; background-color: #FFC928; color: white"
                                    id="btn-edit-{{ $qualification->id }}" data-id="{{ $qualification->id }}"
                                    data-name="{{ $qualification->name }}"><i class="bx bx-bx bxs-edit fs-4"></i>
                                    <span>Edit</span></button>
                                <button type="button"
                                    class="btn waves-effect waves-light d-flex flex-row gap-1 justify-content-between btn-delete"
                                    style="width: 90px; background-color: #E05C39; color: white"
                                    data-id="{{ $qualification->id }}" data-bs-toggle="modal"
                                    data-bs-target="#modal-delete"><i class="bx bx-bx bxs-trash fs-4"></i> Hapus</button>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            <div class="d-flex justify-content-center" style="min-height:16rem">
                                <div class="my-auto">
                                    <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                    <h4 class="text-center mt-4">Kualifikasi Kosong!!</h4>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
            </tbody>
            </table>
            {{$qualifications->links('pagination::bootstrap-5')}}
        </div>

        <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="form-update" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="exampleModalLabel1">
                                Edit Kualifikasi Nasional Indonesia
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan KKNI</label>
                                <input type="text" class="form-control" id="update-name" class="form-control"
                                    name="name" aria-describedby="name"
                                    placeholder="Masukkan Kualifikasi Nasional Indonesia" />
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
    <x-delete-modal-component />
@endsection
@section('script')
    <script>
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `qualifications/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);

            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `qualifications/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection
