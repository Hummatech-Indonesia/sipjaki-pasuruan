@extends('layouts.app')

@section('content')
    <h4 class="mb-3 font-size-18">Peraturan</h4>
    <div class="d-flex justify-content-between">
        <div class="">
            <form action="/export-workers" method="GET" id="fomr-export">
                <button type="button" class="btn text-white fw-normal" style="background-color:#1B3061;">
                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12" fill="white"
                        viewBox="0 0 448 512">
                        <path
                            d="M246.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 109.3V320c0 17.7 14.3 32 32 32s32-14.3 32-32V109.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 53 43 96 96 96H352c53 0 96-43 96-96V352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V352z" />
                    </svg>
                    <span class="ms-2">Import</span>
                </button>
                <button type="submit" class="btn text-white fw-normal" style="background-color:#2CA67A;">
                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" fill="white"
                        transform="rotate(90)" viewBox="0 0 512 512">
                        <path
                            d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                    </svg>
                    <span class="ms-2">Export</span>
                </button>
            </form>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modal-create" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form-create" action="{{ route('rules.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Tambah Peraturan
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="category" for="recipient-category"
                                        class="control-label mb-2">Category</label>
                                    <input type="text" class="form-control" id="create-category" class="form-control"
                                        name="category" aria-describedby="name" placeholder="Masukkan Nama" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Nomor</label>
                                    <input type="text" class="form-control" id="create-name" class="form-control"
                                        name="code" aria-describedby="name" placeholder="Masukkan Jenis Sertifikat" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">FIle</label>
                                    <input type="file" class="form-control" id="create-name" class="form-control"
                                        name="file" aria-describedby="name" placeholder="Masukkan Pendidikan" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Tahun</label>
                                    <select name="fiscal_year_id" class="form-select" id="">
                                        @foreach ($fiscalYears as $fiscalYear)
                                            <option value="{{ $fiscalYear->id }}">{{ $fiscalYear->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Judul</label>
                                    <textarea name="title" id="" class="form-control" cols="30" rows="10"></textarea>
                                </div>
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

    <div class="mt-4 rounded p-4" style="background-color: #fff;box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
        <div class="d-flex justify-content-between">
            <h6 class="mb-3 font-size-14">Berikut Daftar Peraturan</h6>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create"
                    style="background-color: #1B3061; border-radius: 10px"><i class="fas fa-plus"
                        style="margin-right:10px"></i>Tambah</button>
            </div>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-hover mt-4">
                <thead>
                    <tr>
                        <th scope="col" class="text-center text-white"
                            style="background-color: #1B3061; border-radius:5px 0px 0px 5px; border-color: #1B3061; border-width: 0px;">
                            No
                        </th>
                        <th scope="col" class="table-sipjaki text-center">Kategori</th>
                        <th scope="col" class="table-sipjaki text-center">Nomor</th>
                        <th scope="col" class="table-sipjaki text-center">Tahun</th>
                        <th scope="col" class="table-sipjaki text-center">Judul</th>
                        <th scope="col" class="text-white text-center"
                            style="background-color: #1B3061; border-radius:0px 5px 5px 0px; color: #ffffff; border-color: #1B3061; border-width: 0px;">
                            Aksi
                        </th>
                        <th scope="col" class="table-sipjaki text-center">File</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rules as $index => $rule)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">Undang-Undang</td>
                            <td class="text-center">{{ $rule->code }}</td>
                            <td class="text-center">{{ $rule->fiscalYear->name }}</td>
                            <td>{{ $rule->title }}</td>
                            <td class="d-flex flex-row gap-3 justify-content-center"
                                style="border-bottom: 1px solid #fff">
                                <button class="btn btn-detail waves-effect waves-light text-white"
                                    id="btn-detail-{{ $rule->id }}" data-title="{{ $rule->title }}"
                                    data-code="{{ $rule->code }}"
                                    data-fiscal_year_name="{{ $rule->fiscalYear->name }}"
                                    style="background-color: #1B3061">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                        viewBox="0 0 24 24" fill="none">
                                        <path d="M4.5 12.5C7.5 6 16.5 6 19.5 12.5" stroke="white" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M12 16C10.8954 16 10 15.1046 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16Z"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg> Detail
                                </button>
                                <button type="button" id="btn-edit-{{ $rule->id }}"
                                    data-title="{{ $rule->title }}" data-code="{{ $rule->code }}"
                                    data-fiscal_year_id="{{ $rule->fiscal_year_id }}" data-id="{{ $rule->id }}"
                                    class="btn waves-effect waves-light d-flex btn-edit flex-row gap-1 justify-content-evenly"
                                    style="width: 90px; background-color: #FFC928; color: white"><i
                                        class="bx bx-bx bxs-edit fs-4"></i>
                                    <span>Edit</span></button>
                                <button type="button" data-id="{{ $rule->id }}"
                                    class="btn waves-effect waves-light d-flex flex-row gap-1 justify-content-between btn-delete"
                                    style="width: 90px; background-color: #E05C39; color: white"><i
                                        class="bx bx-bx bxs-trash fs-4"></i>
                                    Hapus</button>
                            </td>
                            <td>
                                <button type="submit" class="btn text-white fw-normal"
                                    style="background-color:#2CA67A;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" fill="white"
                                        transform="rotate(90)" viewBox="0 0 512 512">
                                        <path
                                            d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                                    </svg>
                                    <span class="ms-2">Downlaoad</span>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                <div class="d-flex justify-content-center" style="min-height:19rem">
                                    <div class="my-auto">
                                        <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                        <h4 class="text-center mt-4">Peraturan kosong!!</h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modal-update" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form-update" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-kategori" id="exampleModalLabel1">
                            Tambah Peraturan
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="category" for="recipient-category"
                                        class="control-label mb-2">Category</label>
                                    <input type="text" class="form-control" id="create-category" class="form-control"
                                        name="category" aria-describedby="name" placeholder="Masukkan Nama" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Nomor</label>
                                    <input type="text" class="form-control" id="create-name" class="form-control"
                                        name="code" aria-describedby="name" placeholder="Masukkan Jenis Sertifikat" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">FIle</label>
                                    <input type="file" class="form-control" id="create-name" class="form-control"
                                        name="file" aria-describedby="name" placeholder="Masukkan Pendidikan" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Tahun</label>
                                    <select name="fiscal_year_id" class="form-select" id="">
                                        @foreach ($fiscalYears as $fiscalYear)
                                            <option value="{{ $fiscalYear->id }}">{{ $fiscalYear->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Judul</label>
                                    <textarea name="title" id="" class="form-control" cols="30" rows="10"></textarea>
                                </div>
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
                    <div class="card">
                        <div class="card-body">
                            <p class="mt-3 fs-5 text-dark text-center mb-3" style="font-weight: 700">
                                <span id="detail-title"></span>
                            </p>
                            <div class="">
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Kategori :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-category">UUD</span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Nomor :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-code"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Tahun :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-fiscal_year_name"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">file :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn text-white fw-normal"
                                        style="background-color:#2CA67A;">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" fill="white"
                                            transform="rotate(90)" viewBox="0 0 512 512">
                                            <path
                                                d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                                        </svg>
                                        <span class="ms-2">Downlaoad</span>
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script>
        $('.btn-detail').click(function() {
            const data = getDataAttributes($(this).attr('id'))
            handleDetail(data)
            $('#modal-detail').modal('show')
        })
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `rules/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);
            var contentData = formData['content'];

            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `rules/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection
