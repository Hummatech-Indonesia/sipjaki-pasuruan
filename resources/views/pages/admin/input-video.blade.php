@extends('layouts.app')
@section('style')
    <style>
        #preview {
            height: 500px;
            border: 1px dashed #ccc;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        #preview::before {
            content: '';
            background-image: url('path/to/image-icon.png');
            background-size: 40px;
            background-position: center;
            background-repeat: no-repeat;
            width: 40px;
            height: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #preview::after {
            content: "Upload Video";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 16px;
            color: #333;
            text-align: center;
        }
    </style>
@endsection
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
    <div class="d-flex justify-content-between mb-3">
        <h2>Video Halaman Beranda Landing Page</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('video.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('POST')
                <img src="" id="img-beranda" height="200" alt="">
                <input type="hidden" name="categories" value="video">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div id="preview"></div>
                    </div>
                    <div class="col-10">
                        <input type="file" value="{{ old('photo') }}" name="photo" id="fileInput"
                            class="form-control">
                    </div>
                    <button class="btn btn-primary col-2 " data-bs-toggle="modal" data-bs-target="#modal-create"
                        style="background-color: #1B3061; border-radius: 10px"><i class="fas fa-plus"
                            style="margin-right:10px"></i>Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
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
        // preview
        const fileInput = document.getElementById('fileInput');
        const previewDiv = document.getElementById('preview');
        const defaultVideoSrc = "{{ asset('storage/video/video.mp4') }}";

        // Set video source to default on page load
        window.addEventListener('DOMContentLoaded', function() {
            previewDiv.innerHTML =
                `<video id="previewVideo" src="${defaultVideoSrc}" style="width: 100%; height: 100%; object-fit: cover;" controls></video>`;
        });

        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];

            if (file) {
                const fileReader = new FileReader();

                fileReader.onload = function(event) {
                    const fileType = file.type;
                    const fileUrl = event.target.result;

                    if (fileType.startsWith('image/')) {
                        previewDiv.innerHTML =
                            `<img src="${fileUrl}" style="width: 100%; height: 100%; object-fit: cover;">`;
                    } else if (fileType.startsWith('video/')) {
                        previewDiv.innerHTML =
                            `<video id="previewVideo" src="${fileUrl}" style="width: 100%; height: 100%; object-fit: cover;" controls></video>`;
                    } else {
                        previewDiv.innerHTML = 'File tidak didukung';
                    }
                };

                fileReader.readAsDataURL(file);
            } else {
                previewDiv.innerHTML =
                    `<video id="previewVideo" src="${defaultVideoSrc}" style="width: 100%; height: 100%; object-fit: cover;" controls></video>`;
            }
        });
    </script>
@endsection
