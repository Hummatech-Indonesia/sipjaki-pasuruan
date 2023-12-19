@extends('layouts.app')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    <h2>Pengurus</h2>
    <div class="card p-3">
        <div>
            <h5 class="mb-3">
                Berikut Daftar Pengurus
            </h5>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="" class=" col-lg-3">
                <div class="input-group">
                    <input type="text" name="name" value="" class="form-control" placeholder="Search">
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
                        <form id="form-create" action="{{ route('officers.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="exampleModalLabel1">
                                    Tambah Pengurus
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Pengurus</label>
                                    <input type="text" class="form-control" id="create-name" class="form-control"
                                        name="name" aria-describedby="name" placeholder="Masukkan Pengurus" />
                                </div>
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="create-name" class="form-control"
                                        name="birth_date" aria-describedby="name" placeholder="Masukkan Tanggal Lahir" />
                                </div>
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Alamat</label>
                                    <textarea class="form-control" name="address" id="" cols="15" rows="5"
                                        placeholder="Masukkan Alamat"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Jabatan</label>
                                    <input type="text" class="form-control" id="create-name" class="form-control"
                                        name="position" aria-describedby="name" placeholder="Masukkan Jabatan" />
                                </div>
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Pendidikan</label>
                                    <input type="text" class="form-control" id="create-name" class="form-control"
                                        name="education" aria-describedby="name" placeholder="Masukkan Pendidikan" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                                    data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" style="background-color: #1B3061"
                                    class="btn text-white btn-create">
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
                        <th style="background-color: #1B3061;color:#ffffff">Tanggal Lahir</th>
                        <th style="background-color: #1B3061;color:#ffffff">Alamat</th>
                        <th style="background-color: #1B3061;color:#ffffff">Jabatan</th>
                        <th style="background-color: #1B3061;color:#ffffff">Pendidikan</th>
                        <th style="background-color: #1B3061;color:#ffffff;text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($officers as $index => $officer)
                        <tr>
                            <td class="fs-5">{{ $index + 1 }}</td>
                            <td class="fs-5">{{ $officer->name }}</td>
                            <td class="fs-5">
                                {{ Carbon::parse($officer->birth_date)->locale('id_ID')->isoFormat('DD MMMM Y') }}</td>
                            <td class="fs-5">{{ $officer->address }}</td>
                            <td class="fs-5">{{ $officer->position }}</td>
                            <td class="fs-5">{{ $officer->education }}</td>
                            <td class="d-flex flex-row gap-3 justify-content-center">
                                <button type="button"
                                    class="btn waves-effect waves-light d-flex btn-edit flex-row gap-1 justify-content-evenly"
                                    style="width: 90px; background-color: #FFC928; color: white"
                                    id="btn-edit-{{ $officer->id }}" data-id="{{ $officer->id }}"
                                    data-name="{{ $officer->name }}"><i class="bx bx-bx bxs-edit fs-4"></i>
                                    <span>Edit</span></button>
                                <button type="button"
                                    class="btn waves-effect waves-light btn-delete d-flex flex-row gap-1 justify-content-between"
                                    style="width: 90px; background-color: #E05C39; color: white"
                                    data-id="{{ $officer->id }}" data-bs-toggle="modal"
                                    data-bs-target="#modal-delete"><i class="bx bx-bx bxs-trash fs-4"></i> Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                <div class="d-flex justify-content-center" style="min-height:16rem">
                                    <div class="my-auto">
                                        <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                        <h4 class="text-center mt-4">Type Kosong!!</h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- {{ $officers->links('pagination::bootstrap-5') }} --}}
        </div>

        <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="form-update" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="exampleModalLabel1">
                                Edit Pengurus
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Pengurus</label>
                                <input type="text" class="form-control" id="update-name" class="form-control"
                                    name="name" aria-describedby="name" placeholder="Masukkan Pengurus" />
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
            var actionUrl = `officers/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);

            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `officers/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection
