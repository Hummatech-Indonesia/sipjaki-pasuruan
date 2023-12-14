@extends('layouts.app')
@section('style')
    <style>
        #preview {
            height: 300px;
            border: 1px dashed #ccc;
            padding: 10px;
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
            content: "Upload Image";
            position: absolute;
            top: 80px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 16px;
            color: #333;
        }

        .PreviewData {
            height: 300px;
            border: 1px dashed #ccc;
            padding: 10px;
            position: relative;
        }

        .PreviewData::before {
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

        .PreviewData::after {
            content: "Upload Image";
            position: absolute;
            top: 80px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 16px;
            color: #333;
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
        <h2>Struktur Organisasi</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('images.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('POST')
                <img src="" id="img-beranda" height="200" alt="">
                <input type="hidden" name="categories" value="structure_organitation">
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
    <div class="d-flex justify-content-between mb-3">
        <h2>Rencana Strategis</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('images.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <img src="" id="img-beranda" height="200" alt="">
                <input type="hidden" name="categories" value="strategic_plan">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div id="previewRencana" class="PreviewData"></div>
                    </div>
                    <div class="col-10">
                        <input type="file" name="photo" id="FileRencana" class="form-control">
                    </div>
                    <button class="btn btn-primary col-2" data-bs-toggle="modal" data-bs-target="#modal-create"
                        style="background-color: #1B3061; border-radius: 10px"><i class="fas fa-plus"
                            style="margin-right:10px"></i>Tambah</button>
                </div>

            </form>
        </div>
    </div>
    <div class="d-flex justify-content-between mb-3">
        <h2>Tugas dan Fungsi</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('images.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <img src="" id="img-beranda" height="200" alt="">
                <input type="hidden" name="categories" value="job_and_function">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div id="previewTugas" class="PreviewData"></div>
                    </div>
                    <div class="col-10">
                        <input type="file" name="photo" id="FileTugas" class="form-control">
                    </div>
                    <button class="btn btn-primary col-2" data-bs-toggle="modal" data-bs-target="#modal-create"
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
        const defaultImageUrl = "{{ asset('storage/structure_organitation/structure_organitation.jpg') }}";

        // Tampilkan gambar default saat halaman dimuat
        previewDiv.innerHTML = `<img src="${defaultImageUrl}" style="width: 100%; height: 100%; object-fit: cover;">`;

        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];

            if (file) {
                const fileReader = new FileReader();

                fileReader.onload = function(event) {
                    const imageUrl = event.target.result;
                    previewDiv.innerHTML =
                        `<img src="${imageUrl}" style="width: 100%; height: 100%; object-fit: cover;">`;
                };

                fileReader.readAsDataURL(file);
            } else {
                previewDiv.innerHTML =
                    `<img src="${defaultImageUrl}" style="width: 100%; height: 100%; object-fit: cover;">`;
            }
        });
        // preview rencana 
        const FileRencana = document.getElementById('FileRencana');
        const previewRencana = document.getElementById('previewRencana');
        const defaultImageUrlRencana = "{{ asset('storage/strategic_plan/strategic_plan.jpg') }}";
        previewRencana.style.backgroundImage = `url(${defaultImageUrlRencana})`;
        previewRencana.style.backgroundSize = 'cover';
        previewRencana.style.backgroundPosition = 'center';
        previewRencana.style.backgroundRepeat = 'no-repeat';

        FileRencana.addEventListener('change', function() {
            const file = FileRencana.files[0];

            if (file) {
                const fileUrl = URL.createObjectURL(file);

                previewRencana.style.backgroundImage = `url(${fileUrl})`;
                previewRencana.style.backgroundSize = 'cover';
                previewRencana.style.backgroundPosition = 'center';
                previewRencana.style.backgroundRepeat = 'no-repeat';
                previewRencana.textContent = '';
            } else {
                // Kembali ke gambar default jika tidak ada file yang dipilih
                previewRencana.style.backgroundImage = `url(${defaultImageUrlRencana})`;
            }
        });
        // preview tugas
        const FileTugas = document.getElementById('FileTugas');
        const previewTugas = document.getElementById('previewTugas');
        const defaultImageUrltugas = "{{ asset('storage/job_and_function/job_and_function.jpg') }}";

        // Tampilkan gambar default saat halaman dimuat
        previewTugas.style.backgroundImage = `url(${defaultImageUrltugas})`;
        previewTugas.style.backgroundSize = 'cover';
        previewTugas.style.backgroundPosition = 'center';
        previewTugas.style.backgroundRepeat = 'no-repeat';

        FileTugas.addEventListener('change', function() {
            const file = FileTugas.files[0];

            if (file) {
                const fileUrl = URL.createObjectURL(file);

                previewTugas.style.backgroundImage = `url(${fileUrl})`;
                previewTugas.style.backgroundSize = 'cover';
                previewTugas.style.backgroundPosition = 'center';
                previewTugas.style.backgroundRepeat = 'no-repeat';
                previewTugas.textContent = '';
            } else {
                // Kembali ke gambar default jika tidak ada file yang dipilih
                previewTugas.style.backgroundImage = `url(${defaultImageUrltugas})`;
            }
        });
    </script>
@endsection
