@extends('layouts.app')
@section('content')

    <h2>Dinas</h2>
    <div class="d-flex justify-content-between mb-3">
        <form action="" class="">
            <div class="input-group">
                <input name="name" type="text" value="{{ $name }}" class="form-control" placeholder="Search">
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
                <form action="{{ route('agencies.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Tambah Dinas
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Nama Dinas</label>
                                    <input type="text" class="form-control" id="create-name" class="form-control"
                                        name="name" id="nametext" aria-describedby="name" placeholder="Masukan nama"
                                        value="{{ old('name') }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Penanggung
                                        Jawab</label>
                                    <input type="text" class="form-control" id="create-person_responsible"
                                        class="form-control" name="person_responsible" id="nametext"
                                        aria-describedby="name" placeholder="Masukan penanggung jawab"
                                        value="{{ old('person_responsible') }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Logo Dinas</label>
                                    <input type="file" class="form-control" id="create-logo" class="form-control"
                                        name="profile" id="nametext" aria-describedby="name"
                                        placeholder="Masukan penanggung jawab" value="{{ old('logo') }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="phone_number" for="recipient-name" class="control-label mb-2">Nomor
                                        Handphone</label>
                                    <input type="number" class="form-control" id="create-phone_number" class="form-control"
                                        name="phone_number" id="nametext" aria-describedby="name"
                                        value="{{ old('phone_number') }}" placeholder="Masukan nomor hp anda" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="email" for="recipient-name" class="control-label mb-2">Email</label>
                                    <input type="email" class="form-control" id="create-email" class="form-control"
                                        name="email" aria-describedby="name" placeholder="Masukan email"
                                        value="{{ old('email') }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="email" for="recipient-name"
                                        class="control-label mb-2">Password</label>
                                    <div class="d-flex">
                                        <input type="password" class="form-control" name="password" required
                                            autocomplete="current-password" placeholder="Masukan Password"
                                            aria-label="Password" aria-describedby="password-addon"
                                            style="border-radius: 8px 0 0 8px;">
                                        <button class="btn btn-light " type="button" id="password-addon"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>
                            </div>
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
    @if (session('success'))
        <x-alert-success-component :success="session('success')" />
    @endif
    <div class="table-responsive">
        <table class="table table-borderless" border="1">
            <thead>
                <tr>
                    <th class=" table-sipjaki">No</th>
                    <th class=" table-sipjaki">Nama</th>
                    <th class=" table-sipjaki">Email</th>
                    <th class=" table-sipjaki">Penanggung jawab</th>
                    <th class=" table-sipjaki">Aksi</th>
                </tr>
            </thead>
            @forelse ($users as $index=>$user)
                <tbody>
                    <tr>
                        <td class="">
                            <p class="mt-2">
                                {{ $index + 1 }}
                            </p>
                        </td>
                        <td class="">
                            <div class="d-flex justify-content-header gap-2">
                                <div class="">
                                    <img class="rounded-circle"
                                        src="{{ $user->profile ? asset('storage/' . $user->profile) : asset('Default.png') }}"
                                        alt="" width="45" height="45" style="object-fit: cover;">
                                </div>
                                <div class="">
                                    <p class="mt-2">
                                        {{ $user->name }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="">
                            <p class="mt-2">
                                {{ $user->email }}
                            </p>
                        </td>
                        <td class="">
                            <p class="mt-2">
                                {{ $user->dinas->person_responsible }}
                            </p>
                        </td>
                        <td class="">
                            <div class="d-flex justify-content-header gap-2">
                                <div class="">
                                    <button class="btn text-white d-flex gap-1 btn-edit"
                                        id="btn-edit-{{ $user->id }}" data-id="{{ $user->id }}"
                                        data-name="{{ $user->name }}" data-email="{{ $user->email }}"
                                        data-person_responsible="{{ $user->dinas->person_responsible }}"
                                        data-phone_number="{{ $user->phone_number }}"
                                        style="background-color: #1B3061; width: 100%;">
                                        <i class="bx bx-bx bxs-edit fs-4"></i>Edit
                                    </button>
                                </div>
                                <div class="">
                                    <button data-id="{{ $user->id }}"
                                        class="d-flex gap-1 btn text-white btn-delete btn-danger" style="width: 100%;">
                                        <i class="bx bx-bx bxs-trash fs-4"></i> Hapus
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        <div class="d-flex justify-content-center" style="min-height:16rem">
                            <div class="my-auto">
                                <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                <h4 class="text-center mt-4">Dinas Kosong!!</h4>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforelse
        </table>
    </div>
    {{ $users->links('pagination::bootstrap-5') }}
    <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="POST" enctype="multipart/form-data" id="form-update">
                    @csrf
                    @method('PUT')
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Edit Dinas
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Nama
                                        Dinas</label>
                                    <input type="text" class="form-control" id="update-name" name="name"
                                        aria-describedby="name" placeholder="Masukan nama" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Penanggung
                                        Jawab</label>
                                    <input type="text" class="form-control" id="update-person_responsible"
                                        name="person_responsible" aria-describedby="name"
                                        placeholder="Masukan penanggung jawab" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Logo
                                        Dinas</label>
                                    <input type="file" class="form-control" id="update-profile" name="profile"
                                        aria-describedby="name" placeholder="Masukan penanggung jawab" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="phone_number" for="recipient-name" class="control-label mb-2">Nomor
                                        Handphone</label>
                                    <input type="number" class="form-control" id="update-phone_number"
                                        name="phone_number" aria-describedby="name"
                                        placeholder="Masukan nomor hp anda" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="email" for="recipient-name" class="control-label mb-2">Email</label>
                                    <input type="email" class="form-control" id="update-email" name="email"
                                        aria-describedby="name" placeholder="Masukan email" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="email" for="recipient-name"
                                        class="control-label mb-2">Password</label>
                                    <div class="d-flex">
                                        <input type="password" class="form-control" name="password"
                                            autocomplete="current-password" placeholder="Masukan Password"
                                            aria-label="Password" aria-describedby="password-addon"
                                            style="border-radius: 8px 0 0 8px;">
                                        <button class="btn btn-light " type="button" id="password-addon"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>
                            </div>
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
            var id = $(this).data('id');
            var actionUrl = `agencies/${id}`;

            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show');
        })
    </script>
@endsection
