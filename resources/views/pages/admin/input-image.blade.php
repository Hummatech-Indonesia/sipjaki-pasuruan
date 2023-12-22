@extends('layouts.app')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
    <h3 class="text-dark" style="font-weight: 600">
        Gambar
    </h3>
    <div class="card">
        <div class="card-body">
            <p class="fs-5 text-dark" style="font-weight: 500">
                Daftar Gambar
            </p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td class="text-white" style="background-color: #1B3061">
                                Judul
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Gambar
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Aksi
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($images as $image)
                            <tr>
                                <td>
                                    <p class="fs-5 text-dark" style="font-weight: 700">
                                        @if ($image->categories == 'structure_organitation')
                                            Struktur Organisasi
                                        @elseif ($image->categories == 'job_and_function')
                                            Tugas dan Fungsi
                                        @else
                                            Rencana Strategis
                                        @endif
                                    </p>
                                </td>
                                <td>
                                    {!! $image->photo !!}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-header gap-2">
                                        <div class="">
                                            <button class="btn btn-detail text-white" data-bs-toggle="modal"
                                                data-bs-target="#detail-{{ $image->id }}"
                                                style="background-color: #1B3061">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path d="M4.5 12.5C7.5 6 16.5 6 19.5 12.5" stroke="white"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M12 16C10.8954 16 10 15.1046 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16Z"
                                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="">
                                            <button class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#modal-struktur-{{ $image->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <g clip-path="url(#clip0_683_6334)">
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
                                                        <clipPath id="clip0_683_6334">
                                                            <rect width="24" height="24" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade bs-example-modal-md" id="detail-{{ $image->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #1B3061">
                                            <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Detail Struktur
                                                Organisasi</h5>
                                            <button type="button" class="btn-close" style="background-color: white"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="fs-5" style="font-weight: 700">
                                                Judul
                                            </p>
                                            <p>
                                                @if ($image->categories == 'structure_organitation')
                                                    Struktur Organisasi
                                                @elseif ($image->categories == 'job_and_function')
                                                    Tugas dan Fungsi
                                                @else
                                                    Rencana Strategis
                                                @endif
                                            </p>
                                            <p class="fs-5" style="font-weight: 700">
                                                Gambar
                                            </p>
                                            {!! $image->photo !!}
                                        </div>
                                        <div class="modal-footer">
                                            <div class="d-flex justify-content-end">
                                                <div class="d-flex justify-content-header gap-2">
                                                    <div class="">
                                                        <button data-bs-dismiss="modal" class="btn btn-danger"
                                                            type="button">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            <div class="modal fade bs-example-modal-md" id="modal-struktur-{{ $image->id }}"
                                tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #1B3061">
                                            <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Edit Struktur
                                                Organisasi</h5>
                                            <button type="button" class="btn-close" style="background-color: white"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('images.store') }}" enctype="multipart/form-data"
                                                method="POST">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" class="mb-" name="categories"
                                                    value="{{ $image->categories }}">
                                                <p class="fs-5 mb-1" style="font-weight: 400">Kategori Struktur Organisasi
                                                </p>
                                                <textarea id="summernote" name="photo">{!! $image->photo !!}</textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="d-flex justify-content-end">
                                                <div class="d-flex justify-content-header gap-2">
                                                    <div class="">
                                                        <button data-bs-dismiss="modal" class="btn btn-danger"
                                                            type="button">Tutup</button>
                                                    </div>
                                                    <div class="">
                                                        <button class="btn text-white " style="background-color: #1B3061">
                                                            Simpan
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- modal struktur organisasi  --}}

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
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200
            });
            $('#summernote-tugas').summernote({
                height: 200
            });
            $('#summernote-rencana').summernote({
                height: 200
            });
        });
        // preview 
        const fileInput = document.getElementById('fileInput');
        const previewDiv = document.getElementById('preview');
        const defaultImageUrl = "";

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
