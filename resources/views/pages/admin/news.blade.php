@extends('layouts.app')
@section('content')
    <h2>Berita</h2>
    <div class="card p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5>
                    Daftar Berita
                </h5>
            </div>
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
                                            placeholder="Masukan Judul" />
                                    </div>
                                    <div class="col-md-6 col-12 ">
                                        <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                            Gambar</label>
                                        <input type="file" class="form-control mb-3" name="thumbnail" id="thumbnail"
                                            aria-describedby="name" placeholder="Masukan"
                                            accept="image/png, image/jpeg, image/jpg" />
                                        <img src="" height="200" style="" id="preview-img" alt="">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">berita</label>
                                    <textarea name="content" id="summernote" class="form-control" cols="30" rows="10"></textarea>
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
                        <th style="background-color: #1B3061;color:#ffffff">Tanggal Upload</th>
                        <th style="background-color: #1B3061;color:#ffffff;text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($news as $index => $news)
                        <tr>
                            <td scope="row" class="fs-5">{{ $index + 1 }}</td>
                            <td class="fs-5">{{ $news->title }}</td>
                            <td class="fs-5">{{ \Carbon\Carbon::parse($news->created_at)->format('d-m-Y') }}</td>
                            <td class="d-flex flex-row gap-3 justify-content-center">
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
                                        placeholder="Masukan Judul" />
                                </div>
                                <div class="col-md-6 col-12 ">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Gambar</label>
                                    <input type="file" class="form-control mb-3" name="thumbnail" id="thumbnail"
                                        aria-describedby="name" placeholder="Masukan Kategori Kontrak"
                                        accept="image/png, image/jpeg, image/jpg" />
                                    <img src="" height="200" style="" id="preview-img" alt="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label id="name" for="recipient-name" class="control-label mb-2">berita</label>
                                <textarea name="content" id="update" class="form-control" cols="30" rows="10"></textarea>
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
            $('#summernote').summernote();
        });
        $(document).ready(function() {
            $('#update').summernote();
        });
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
