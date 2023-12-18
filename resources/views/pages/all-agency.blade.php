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
    <h2>Dinas</h2>
    <div class="d-flex justify-content-between mb-3">
        <form action="" class="">
            <div class="input-group">
                <input name="name" type="text" class="form-control"
                    placeholder="Search">
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
                <form action="{{ route('agencies.store') }}" method="POST">
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
                                        name="name" id="nametext" aria-describedby="name" placeholder="Masukan nama" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Penanggung
                                        Jawab</label>
                                    <input type="text" class="form-control" id="create-person_responsible"
                                        class="form-control" name="person_responsible" id="nametext"
                                        aria-describedby="name" placeholder="Masukan penanggung jawab" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label id="phone_number" for="recipient-name" class="control-label mb-2">Nomor
                                        Handphone</label>
                                    <input type="number" class="form-control" id="create-phone_number" class="form-control"
                                        name="phone_number" id="nametext" aria-describedby="name"
                                        placeholder="Masukan nomor hp anda" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label id="email" for="recipient-name" class="control-label mb-2">Email</label>
                                    <input type="email" class="form-control" id="create-email" class="form-control"
                                        name="email" aria-describedby="name" placeholder="Masukan email" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label id="email" for="recipient-name" class="control-label mb-2">Password</label>
                                    <input type="password" class="form-control" id="create-password" class="form-control"
                                        name="password" aria-describedby="name" placeholder="Masukan password" />
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
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-borderless" border="1">
            <thead>
                <tr>
                    <th class=" table-sipjaki" >No</th>
                    <th class=" table-sipjaki" >Nama</th>
                    <th class=" table-sipjaki" >Email</th>
                    <th class=" table-sipjaki" >Penanggung jawab</th>
                    <th class=" table-sipjaki" >Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="">
                        <p class="mt-2">
                            1
                        </p>
                    </td>
                    <td class="">
                        <div class="d-flex justify-content-header gap-2">
                            <div class="">
                                <img class="rounded-circle"
                            src="{{ asset('Default.png') }}"
                            alt="" width="45" height="45" style="object-fit: cover;">
                            </div>
                            <div class="">
                                <p class="mt-2">
                                    Abdul Kader
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="">
                        <p class="mt-2">
                            kadergantegrek@gmail.com
                        </p>
                    </td>
                    <td class="">
                        <p class="mt-2">
                            Kader
                        </p>
                    </td>
                    <td class="">
                        <div class="d-flex justify-content-header gap-2">
                            <div class="">
                                <button class="btn text-white btn-edit" 
                                    style="background-color: #1B3061; width: 100%;">
                                    edit
                                </button>
                            </div>
                            <div class="">
                                <button class="btn text-white btn-delete btn-danger"
                                    style="width: 100%;">
                                    hapus
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
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
                            <div class="col-4">
                                <div class="mb-3">
                                    <label id="phone_number" for="recipient-name" class="control-label mb-2">Nomor
                                        Handphone</label>
                                    <input type="number" class="form-control" id="update-phone_number"
                                        name="phone_number" aria-describedby="name"
                                        placeholder="Masukan nomor hp anda" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label id="email" for="recipient-name" class="control-label mb-2">Email</label>
                                    <input type="email" class="form-control" id="update-email" name="email"
                                        aria-describedby="name" placeholder="Masukan email" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label id="email" for="recipient-name"
                                        class="control-label mb-2">Password</label>
                                    <input type="password" class="form-control" id="update-password" name="password"
                                        aria-describedby="name" placeholder="Masukan password" />
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
