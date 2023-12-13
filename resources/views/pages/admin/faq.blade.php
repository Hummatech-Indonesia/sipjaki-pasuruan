@extends('layouts.app')
@section('content')
    <h3>
        FAQ
    </h3>
    <div class="modal fade bs-example-modal-xl" id="modal-create" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="{{ route('faqs.store') }}" class="modal-content">
                @csrf
                <div style="background-color: #1B3061;">
                    <h5 class="modal-title text-white text-center m-3 fs-4">Tambah FAQ</h5>
                </div>
                <div class="modal-body">
                    <p class="text-dark fs-5 mb-0" style="font-weight: 600">
                        Pertanyaan
                    </p>
                    <textarea name="question" id="" cols="30" rows="3" class="form-control"></textarea>
                    <p class="text-dark fs-5 mb-0 mt-3" style="font-weight: 600">
                        Jawaban
                    </p>
                    <textarea name="answer" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-end gap-2">
                        <div class="">
                            <button data-bs-dismiss="modal" type="button" class="btn btn-danger">
                                Batal
                            </button>
                        </div>
                        <div class="">
                            <button class="btn text-white" style="background-color: #1B3061">
                                Tambah
                            </button>
                        </div>
                    </div>
                </div>
            </form><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h5>
                Berikut Daftar FAQ
            </h5>
            <div class="d-flex justify-content-between mt-4">
                <form action="" class="">
                    <div class="input-group">
                        <input name="name" value="{{ $name }}" type="text" class="form-control"
                            placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn text-white" style="background-color: #1B3061; border-radius: 0 5px 5px 0;"
                                type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="">
                    <button data-bs-toggle="modal" data-bs-target="#modal-create" class="text-white btn"
                        style="background-color: #1B3061">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                                fill="white" />
                        </svg>
                        Tambah
                    </button>
                </div>
            </div>

            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible mt-3 fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
            <div class="table-responsive mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <td class="text-white" style="background-color: #1B3061">
                                No
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Pertanyaan
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Jawaban
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Aksi
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($faqs as $faq)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <p class="d-inline-block text-truncate" style="max-width: 400px;">
                                        {{ $faq->question }}
                                    </p>
                                </td>
                                <td>
                                    <p class="d-inline-block text-truncate" style="max-width: 600px;">
                                        {{ $faq->answer }}
                                    </p>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-header gap-2">
                                        <div class="">
                                            <button data-question="{{ $faq->question }}" data-answer="{{ $faq->answer }}"
                                                id="btn-detail-{{ $faq->id }}" data-id="{{ $faq->id }}"
                                                class="btn btn-detail text-white" style="background-color: #1B3061"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path d="M4.5 12.5C7.5 6 16.5 6 19.5 12.5" stroke="white"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M12 16C10.8954 16 10 15.1046 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16Z"
                                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg></button>
                                        </div>
                                        <div class="">
                                            <button class="btn btn-edit text-white" data-question="{{ $faq->question }}"
                                                data-answer="{{ $faq->answer }}" id="btn-edit-{{ $faq->id }}"
                                                data-id="{{ $faq->id }}" style="background-color: #FFC928"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <g clip-path="url(#clip0_384_4766)">
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
                                                        <clipPath id="clip0_384_4766">
                                                            <rect width="24" height="24" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg></button>
                                        </div>
                                        <div class="">
                                            <button class="btn text-white" style="background-color: #E05C39">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 20 20" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z"
                                                        fill="white" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    <div class="d-flex justify-content-center" style="min-height:19rem">
                                        <div class="my-auto">
                                            <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                            <h4 class="text-center mt-4">Faq kosong!!</h4>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-xl" id="modal-update" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" id="form-update" class="modal-content">
                @csrf
                @method('PUT')
                <div style="background-color: #1B3061;">
                    <h5 class="modal-title text-white text-center m-3 fs-4">Edit FAQ</h5>
                </div>
                <div class="modal-body">
                    <p class="text-dark fs-5 mb-0" style="font-weight: 600">
                        Pertanyaan
                    </p>
                    <textarea name="question" id="" cols="30" rows="3" class="form-control"></textarea>
                    <p class="text-dark fs-5 mb-0 mt-3" style="font-weight: 600">
                        Jawaban
                    </p>
                    <textarea name="answer" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-end gap-2">
                        <div class="">
                            <button data-bs-dismiss="modal" type="button"  class="btn btn-danger">
                                Batal
                            </button>
                        </div>
                        <div class="">
                            <button class="btn text-white" style="background-color: #1B3061">
                                Tambah
                            </button>
                        </div>
                    </div>
                </div>
            </form><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div class="modal fade bs-example-modal-md" id="modal-detail" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #1B3061">
                <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Detail</h5>
                <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <div class="row mb-1">
                                <div class="col-md-5">
                                    <p class="mb-2 text-dark">Pertanyaan :</p>
                                </div>
                                <div class="col-md-5">
                                    <p class="mb-2 text-dark" style="font-weight:600;"><span
                                            id="detail-question"></span></p>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-5">
                                    <p class="mb-2 text-dark">Jawaban :</p>
                                </div>
                                <div class="col-md-5">
                                    <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-answer"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.modal-content -->
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
        $('.btn-detail').click(function() {
            const data = getDataAttributes($(this).attr('id'))
            handleDetail(data)
            $('#modal-detail').modal('show')
        })
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `faqs/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);
            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', actionUrl);
            $('#modal-update').modal('show')
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `contract-categories/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection
