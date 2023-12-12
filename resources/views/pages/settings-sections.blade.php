@extends('layouts.app')
@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    <h2>Pengaturan Seksi</h2>
    <div class="card p-3">
        <div>
            <h5 class="mb-3">
                Berikut Daftar Seksi
            </h5>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="" class=" col-lg-3">
                <div class="input-group">
                    <input type="text" name="name" value="{{ $name }}" class="form-control" placeholder="Search">
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

            <div class="modal fade" id="modal-create" tabindex="-1" id="modal-create" aria-labelledby="exampleModalLabel1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="form-create" action="{{ route('sections.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="exampleModalLabel1">
                                    Tambah Seksi
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Seksi</label>
                                    <input type="text" class="form-control" id="create-name" class="form-control"
                                        name="name" aria-describedby="name" placeholder="Masukkan Seksi" />
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
                        <th style="background-color: #1B3061;color:#ffffff">No</th>
                        <th style="background-color: #1B3061;color:#ffffff">Nama</th>
                        <th style="background-color: #1B3061;color:#ffffff;text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sections as $index => $section)
                        <tr>
                            <td class="fs-5">{{ $index + 1 }}</td>
                            <td class="fs-5">{{ $section->name }}</td>
                            <td class="d-flex flex-row gap-3 justify-content-center">
                                <button type="button"
                                    class="btn waves-effect waves-light d-flex btn-edit flex-row gap-1 justify-content-evenly"
                                    style="width: 90px; background-color: #FFC928; color: white"
                                    id="btn-edit-{{ $section->id }}" data-id="{{ $section->id }}"
                                    data-name="{{ $section->name }}"><i class="bx bx-bx bxs-edit fs-4"></i>
                                    <span>Edit</span></button>
                                <button type="button"
                                    class="btn waves-effect waves-light btn-delete d-flex flex-row gap-1 justify-content-between"
                                    style="width: 90px; background-color: #E05C39; color: white"
                                    data-id="{{ $section->id }}" data-bs-toggle="modal" data-bs-target="#modal-delete"><i
                                        class="bx bx-bx bxs-trash fs-4"></i> Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                <div class="d-flex justify-content-center" style="min-height:16rem">
                                    <div class="my-auto">
                                        <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                        <h4 class="text-center mt-4">Seksi Kosong!!</h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $sections->links('pagination::bootstrap-5') }}
        </div>

        <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="form-update" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="exampleModalLabel1">
                                Edit Seksi
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Seksi</label>
                                <input type="text" class="form-control" id="update-name" class="form-control"
                                    name="name" aria-describedby="name"
                                    placeholder="Masukkan Seksi" />
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
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script>
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `sections/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);

            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `sections/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection
