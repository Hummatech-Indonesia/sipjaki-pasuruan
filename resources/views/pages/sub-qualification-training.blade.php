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
    <div>
        <div>
            <h2 class="">
                Detail Jenjang KKNI
            </h2>
        </div>
    </div>
    <div class="modal fade" id="samedata-modal" tabindex="-1" id="modeal-create" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/qualification-level-trainings/{{ $Id }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="modal-header d-flex align-items-center text-white " style="background-color: #1B3061">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Tambah Jenjang KKNI
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label id="name" for="recipient-name" class="control-label mb-2">Masukan Jenjang
                                KKNi</label>
                            <input type="text" class="form-control" id="create-school_year" class="form-control"
                                name="name" id="nametext" aria-describedby="name" placeholder="" />
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
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <div class="">
                    <h5>
                        Berikut daftar Jenjang KKNI</h5>
                </div>
                <div class="">
                    <a href="{{ route('qualification-trainings.index') }}"
                        class="btn me-2 btn-md btn-create text-white cursor-pointer" style="background-color: #1B3061">
                        Kembali
                    </a>
                    <button class="btn me-2 btn-md btn-create text-white" data-bs-toggle="modal"
                        data-bs-target="#samedata-modal" style="background-color: #1B3061">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z" />
                        </svg>
                        Tambah Jenjang KKNI
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 table-borderless" border="1">
                    <thead>
                        <tr>
                            <th class="text-white" style="background-color: #1B3061">No</th>
                            <th class="text-white" style="background-color: #1B3061">Jenjang</th>
                            <th class="text-white" style="background-color: #1B3061; text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($qualificationLevelTrainings as $qualificationLevelTraining)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $qualificationLevelTraining->name }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <div class="">
                                            <button type="button"
                                                class="btn waves-effect waves-light d-flex btn-edit flex-row gap-1 justify-content-evenly"
                                                style="width: 90px; background-color: #FFC928; color: white"
                                                id="btn-edit-{{ $qualificationLevelTraining->id }}"
                                                data-id="{{ $qualificationLevelTraining->id }}"
                                                data-name="{{ $qualificationLevelTraining->name }}"><i
                                                    class="bx bx-bx bxs-edit fs-4"></i>
                                                <span>Edit</span>
                                            </button>
                                        </div>
                                        <div class="">
                                            <button type="button"
                                                class="btn waves-effect waves-light d-flex flex-row gap-1 justify-content-between btn-delete"
                                                style="width: 90px; background-color: #E05C39; color: white"
                                                data-id="{{ $qualificationLevelTraining->id }}" data-bs-toggle="modal"
                                                data-bs-target="#modal-delete"><i class="bx bx-bx bxs-trash fs-4"></i> Hapus
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    <div class="d-flex justify-content-center" style="min-height:16rem">
                                        <div class="my-auto">
                                            <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                            <h4 class="text-center mt-4">Jenjang KKNI Kosong!!</h4>
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
    <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center text-white" style="background-color: #1B3061">
                    <h4 class="modal-title" id="exampleModalLabel1">
                        Edit Jenjang KKNI
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: white;"></button>
                </div>
                <div class="modal-body">
                    <form id="form-update" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                Anggaran</label>
                            <input type="text" class="form-control" id="update-name" class="form-control"
                                name="name" aria-describedby="name" placeholder="Masukan Anggaran" />
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
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `/qualification-level-trainings/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);

            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `destroy/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection
