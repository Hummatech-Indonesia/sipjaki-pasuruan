@extends('layouts.app')
@section('content')
    <h2>Berita</h2>
    <div class="card p-3">
        <div>
            <h5>
                Daftar Berita
            </h5>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="" class="">
                <div class="input-group">
                    <input name="title" type="text" class="form-control" placeholder="Search"
                        value="{{ request()->title }}">
                    <div class="input-group-append">
                        <button class="btn text-white" style="background-color: #1B3061; border-radius: 0 5px 5px 0;"
                            type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create"
                    style="background-color: #1B3061; border-radius: 10px"><i class="fas fa-plus"
                        style="margin-right:10px"></i>Tambah</button>
            </div>
        </div>
        <div class="modal fade" id="modal-create" tabindex="-1" id="modal-create" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ route('news.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="exampleModalLabel1">
                                Tambah Berita
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form-create" method="POST">
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-3">
                                        <label id="name" for="recipient-name" class="control-label mb-2">Judul</label>
                                        <input type="text" class="form-control" id="create-name" class="form-control"
                                            name="title" id="nametext" aria-describedby="name"
                                            placeholder="Masukan Judul" value="{{ old('title') }}" />
                                    </div>
                                    <div class="col-md-6 col-12 ">
                                        <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                            Thumbnail</label>
                                        <input type="file" class="form-control mb-3" name="thumbnail" id="thumbnail"
                                            aria-describedby="name" placeholder="Masukan"
                                            accept="image/png, image/jpeg, image/jpg" />
                                        <img src="" height="200" style="" id="preview-img" alt="">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">berita</label>
                                    <textarea name="content" id="summernote" class="form-control" cols="30" rows="20">{{ old('content') }}</textarea>
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


        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif


        <div class="table-responsive">
            <table class="table table-borderless" border="1">
                <thead>
                    <tr>
                        <th style="background-color: #1B3061;color:#ffffff">No</th>
                        <th style="background-color: #1B3061;color:#ffffff">Judul</th>
                        <th style="background-color: #1B3061;color:#ffffff;text-align: center">Tanggal Upload</th>
                        <th style="background-color: #1B3061;color:#ffffff;text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($news as $index => $news)
                        <tr>
                            <td scope="row" class="fs-5">{{ $index + 1 }}</td>
                            <td class="fs-5">{{ $news->title }}</td>
                            <td class="fs-5 text-center">
                                {{ \Carbon\Carbon::parse($news->created_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}</td>
                            <td class="d-flex flex-row gap-3 justify-content-center">
                                <button id="btn-detail-{{ $news->id }}" data-title="{{ $news->title }}" data-created_at="{{ \Carbon\Carbon::parse($news->created_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}" data-thumbnail="{{ asset('storage/' . $news->thumbnail) }}" data-content="{{ $news->content }}" class="btn text-white btn-detail" style="background-color: #1B3061">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M4.5 12.5C7.5 6 16.5 6 19.5 12.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 16C10.8954 16 10 15.1046 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                      </svg> Detail
                                </button>
                                <button type="button"
                                    class="btn waves-effect waves-light d-flex btn-edit flex-row gap-1 justify-content-evenly"
                                    style="width: 90px; background-color: #FFC928; color: white"
                                    id="btn-edit-{{ $news->id }}" data-id="{{ $news->id }}"
                                    data-photo="{{ $news->thumbnail }}" data-content="{{ $news->content }}"
                                    data-title="{{ $news->title }}"><i class="bx bx-bx bxs-edit fs-4"></i>
                                    <span>Edit</span></button>
                                <button type="button"
                                    class="btn waves-effect waves-light d-flex flex-row gap-1 justify-content-between btn-delete"
                                    id="btn-delete-{{ $news->id }}"
                                    style="width: 90px; background-color: #E05C39; color: white"
                                    data-id="{{ $news->id }}"><i class="bx bx-bx bxs-trash fs-4"></i> Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                <div class="d-flex justify-content-center" style="min-height:16rem">
                                    <div class="my-auto">
                                        <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                        <h4 class="text-center mt-4">Berita Belum ditambahkan !!</h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form id="form-update" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="exampleModalLabel1">
                                Edit Berita
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 col-12 mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Judul</label>
                                    <input type="text" class="form-control" id="update-name" class="form-control"
                                        name="title" id="nametext" aria-describedby="name"
                                        placeholder="Masukan Judul" value="{{ old('title') }}" />
                                </div>
                                <div class="col-md-6 col-12 ">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Thumbnail</label>
                                    <input type="file" class="form-control mb-3" name="thumbnail"
                                        id="update-thumbnail" aria-describedby="name" placeholder="Masukan"
                                        accept="image/png, image/jpeg, image/jpg" />
                                    <img src="" height="200" style="" id="preview-img" alt="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label id="name" for="recipient-name" class="control-label mb-2">berita</label>
                                <textarea name="content" id="update" class="form-control" cols="30" rows="20">{{ old('content') }}</textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                                    data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" style="background-color: #1B3061"
                                    class="btn text-white btn-create">
                                    Edit
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-md" id="modal-detail" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white text-center" id="myExtraLargeModalLabel">Detail Berita</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="detail-file-thumbnail" width="100%" alt="Thumbnail Image">

                    <div id="detail-created_at" class="mt-2 mb-1 fs-5 text-black">

                    </div>
                    <div id="detail-title" class="mt-2 mb-2 fw-bold fs-4 text-black">

                    </div>
                    <div id="detail-content" class="text-black">

                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    <script>
        // const thumbnailInput = document.getElementById('thumbnail');
        // const previewImg = document.getElementById('preview-img');

        // thumbnailInput.addEventListener('change', function(event) {
        //     const file = event.target.files[0];

        //     if (file) {
        //         const reader = new FileReader();

        //         reader.addEventListener('load', function() {
        //             previewImg.src = reader.result;
        //         });

        //         reader.readAsDataURL(file);
        //     } else {
        //         previewImg.src = '';
        //     }
        // });
        // const updateThumnail = document.getElementById('thumbnail');
        // const previewupdate = document.getElementById('preview-img');

        // updateThumnail.addEventListener('change', function(event) {
        //     const file = event.target.files[0];

        //     if (file) {
        //         const reader = new FileReader();

        //         reader.addEventListener('load', function() {
        //             previewupdate.src = reader.result;
        //         });

        //         reader.readAsDataURL(file);
        //     } else {
        //         previewupdate.src = '';
        //     }
        // });
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300
            });
        });

        $(document).ready(function() {
            $('#update').summernote({
                height:300
            });
        });
        $('.btn-detail').click(function() {
            const data = getDataAttributes($(this).attr('id'))
            handleDetail(data)
            handleThumbnail(data)
            $('#modal-detail').modal('show')
        })
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `news/${formData['id']}`;
            const detailPhoto = document.getElementById("detail-photo");

            $('#form-update').attr('action', actionUrl);
            var contentData = formData['content'];

            $('#update').summernote('code', contentData);

            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `news/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection
