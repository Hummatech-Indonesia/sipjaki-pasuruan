@extends('layouts.app')
@section('content')
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
    });
</script>
@endif
    <h2>Dinas</h2>
    <div class="d-flex justify-content-between">
        <div class="position-relative mb-3 col-lg-3">
            <input type="search" class="form-control search-chat py-2 ps-5" id="search-name" placeholder="Search">
            <i class="bx bx-search-alt-2
            position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
        </div>
        <div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create"
                style="background-color: #1B3061; border-radius: 10px"><i class="fas fa-plus"
                    style="margin-right:10px"></i>Tambah</button>
        </div>
    </div>
    <div class="modal fade" id="modal-create" tabindex="-1" id="modal-create" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('agencies.store') }}" method="POST">
                    @csrf
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Tambah Dinas
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label id="name" for="recipient-name" class="control-label mb-2">Username</label>
                            <input type="text" class="form-control" id="create-name" class="form-control" name="name"
                                id="nametext" aria-describedby="name" placeholder="Masukan nama" />
                        </div>
                        <div class="mb-3">
                            <label id="phone_number" for="recipient-name" class="control-label mb-2">Nomor Handphone</label>
                            <input type="number" class="form-control" id="create-name" class="form-control" name="phone_number"
                                id="nametext" aria-describedby="name" placeholder="Masukan nomor hp anda" />
                        </div>
                        <div class="mb-3">
                            <label id="email" for="recipient-name" class="control-label mb-2">Email</label>
                            <input type="email" class="form-control" id="create-email" class="form-control" name="email"
                                aria-describedby="name" placeholder="Masukan email" />
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
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="row">
        @forelse ($users as $user)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <img class="rounded-circle" src="{{ asset('assets/images/jobs.png') }}" alt=""
                            width="70" height="70" style="object-fit: cover;">
                        <div class="ms-3">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">{{ $user->email }}</p>
                            <p>
                                <span class="badge bg-primary-subtle text-primary fs-6">Dinas</span>
                            </p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-6 mb-2">
                                    <button class="btn text-white btn-edit" id="btn-edit-{{ $user->id }}"
                                        data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                        data-email="{{ $user->email }}" data-phone_number="{{ $user->phone_number }}" style="background-color: #1B3061; width: 100%;">
                                        edit
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button data-id="{{ $user->id }}" class="btn text-white btn-delete btn-danger"
                                        style="width: 100%;">
                                        hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">
                <div class="d-flex justify-content-center" style="min-height:16rem">
                    <div class="my-auto">
                        <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                        <h4 class="text-center mt-4">Dinas Kosong!!</h4>
                    </div>
                </div>
            <div>
        @endforelse
    </div>
    {{$users->links('pagination::bootstrap-5')}}
    <div class="modal fade" id="modal-update" tabindex="-1" id="modal-create" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" id="form-update">
                    @csrf
                    @method('PUT')
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Edit Dinas
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label id="name" for="recipient-name" class="control-label mb-2">Username</label>
                            <input type="text" class="form-control" id="update-name" class="form-control" name="name"
                                id="nametext" aria-describedby="name" placeholder="Masukan nama" />
                        </div>
                        <div class="mb-3">
                            <label id="phone_number" for="recipient-name" class="control-label mb-2">Nomor Handphone</label>
                            <input type="number" class="form-control" id="update-name" class="form-control" name="phone_number"
                                id="nametext" aria-describedby="name" placeholder="Masukan nomor hp anda" />
                        </div>
                        <div class="mb-3">
                            <label id="email" for="recipient-name" class="control-label mb-2">Email</label>
                            <input type="email" class="form-control" id="update-email" class="form-control" name="email"
                                aria-describedby="name" placeholder="Masukan email" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" style="background-color: #1B3061" class="btn text-white btn-update">
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
            var actionUrl = `agencies/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);

            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `agencies/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection
