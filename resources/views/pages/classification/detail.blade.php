@extends('layouts.app')
@section('content')

    <div class="d-flex justify-content-between mb-3">
        <div>
            <h2 class="">
                Detail Klasifikasi
            </h2>
        </div>
        <div class="">
            <a href="{{ route('classifications.index') }}" class="btn btn-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 16" fill="none">
                    <path
                        d="M0.292893 7.29289C-0.0976314 7.68342 -0.0976315 8.31658 0.292892 8.7071L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34314C8.46159 1.95262 8.46159 1.31946 8.07107 0.928931C7.68054 0.538406 7.04738 0.538406 6.65686 0.928931L0.292893 7.29289ZM24 7L1 7L1 9L24 9L24 7Z"
                        fill="white" />
                </svg>
                Kembali
            </a>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="samedata-modal" tabindex="-1" id="modeal-create" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/sub-classifications/{{ $classification->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="classification_id" value="{{ $classification->id }}">
                    <div class="modal-header d-flex align-items-center text-white " style="background-color: #1B3061">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Tambah Sub Klasifikasi
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Sub Klasifikasi</label>
                                    <input type="text" class="form-control" id="create-school_year" class="form-control"
                                        name="name" id="nametext" aria-describedby="name" placeholder="" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Kode Klasifikasi</label>
                                    <input type="text" class="form-control" id="create-code" class="form-control"
                                        name="code" id="nametext" aria-describedby="name" placeholder="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">Deskripsi</label>
                            <textarea class="form-control" name="description" id="create-description" cols="30" rows="10"></textarea>
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
                    <h4 class=" mt-2" style="font-weight:600">{{ $classification->name }}</h4>
                </div>
                <div class="">
                    <button class="btn me-2 btn-md btn-create text-white" data-bs-toggle="modal"
                        data-bs-target="#samedata-modal" style="background-color: #1B3061">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z" />
                        </svg>
                        Tambah
                    </button>
                </div>
            </div>
            @if ($errors->has('name'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('name') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('code'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('code') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('description'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('description') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('success'))
            <x-alert-success-component :success="session('success')" />
        @endif
            <div class="table-responsive">
                <table class="table mb-0 table-borderless" border="1">
                    <thead>
                        <tr>
                            <th class="text-white" style="background-color: #1B3061">No</th>
                            <th class="text-white" style="background-color: #1B3061">Sub Klasifikasi</th>
                            <th class="text-white" style="background-color: #1B3061">Kode</th>
                            <th class="text-white" style="background-color: #1B3061">Deskripsi</th>
                            <th class="text-white" style="background-color: #1B3061; text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subClassifications as $subClassification)
                            <tr>
                                <th scope="row" class="fs-5">{{ $loop->iteration }}</th>
                                <td>{{ $subClassification->name }}</td>
                                <td>{{ $subClassification->code }}</td>
                                <td>{{ $subClassification->description }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <div class="">
                                            <button type="button"
                                                class="btn btn-warning waves-effect waves-light btn-edit"
                                                id="btn-edit-{{ $subClassification->id }}"
                                                data-id="{{ $subClassification->id }}"
                                                data-name="{{ $subClassification->name }}"
                                                data-description="{{ $subClassification->description }}"
                                                data-code="{{ $subClassification->code }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <g clip-path="url(#clip0_26_1791)">
                                                        <path
                                                            d="M7 7H6C5.46957 7 4.96086 7.21071 4.58579 7.58579C4.21071 7.96086 4 8.46957 4 9V18C4 18.5304 4.21071 19.0391 4.58579 19.4142C4.96086 19.7893 5.46957 20 6 20H15C15.5304 20 16.0391 19.7893 16.4142 19.4142C16.7893 19.0391 17 18.5304 17 18V17"
                                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M20.385 6.58511C20.7788 6.19126 21.0001 5.65709 21.0001 5.10011C21.0001 4.54312 20.7788 4.00895 20.385 3.61511C19.9912 3.22126 19.457 3 18.9 3C18.343 3 17.8088 3.22126 17.415 3.61511L9 12.0001V15.0001H12L20.385 6.58511V6.58511Z"
                                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M16 5L19 8" stroke="white" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_26_1791">
                                                            <rect width="24" height="24" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg> Edit
                                            </button>
                                        </div>
                                        <div class="">
                                            <button type="button"
                                                class="btn btn-danger waves-effect waves-light btn-delete"
                                                data-id="{{ $subClassification->id }}"
                                                id="btn-delete-{{ $subClassification->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z"
                                                        fill="white" />
                                                </svg> Hapus
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <div class="d-flex justify-content-center" style="min-height:16rem">
                                        <div class="my-auto">
                                            <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                            <h4 class="text-center mt-4">Sub Klasifikasi Kosong!!</h4>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $subClassifications->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center text-white" style="background-color: #1B3061">
                    <h4 class="modal-title" id="exampleModalLabel1">
                        Edit Sub Klasifikasi
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: white;"></button>
                </div>
                <div class="modal-body">
                    <form id="form-update" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="classification_id" value="{{ $classification->id }}">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Sub Klasifikasi</label>
                                    <input type="text" class="form-control" id="create-school_year"
                                        class="form-control" name="name" id="nametext" aria-describedby="name"
                                        placeholder="" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Kode Klasifikasi</label>
                                    <input type="text" class="form-control" id="create-code" class="form-control"
                                        name="code" id="nametext" aria-describedby="name" placeholder="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">Deskripsi</label>
                            <textarea class="form-control" name="description" id="create-description" cols="30" rows="10"></textarea>
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
        $('#master').addClass('active')
        $('#master .sub-menu').addClass('mm-show')
        $('#master-link').addClass('mm-active')
        $('#jasa').addClass('mm-active')
        $('#jasa-link').addClass('mm-active')
        $('#jasa .sub-menu').addClass('mm-show');
        $('#klasifikasi-jasa').addClass('mm-active')
        $('#klasifikasi-link-jasa').addClass('active')
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            console.log();
            var actionUrl = `/sub-classifications/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);
            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `/sub-classifications/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection
