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
    <h4 class="mb-3 font-size-18">Assosiasi</h4>
    <div class="d-flex justify-content-between">
        <div class="">
            <button type="button" data-bs-toggle="modal" data-bs-target="#import" class="btn text-white fw-normal"
                style="background-color:#1B3061;">
                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12" fill="white" viewBox="0 0 448 512">
                    <path
                        d="M246.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 109.3V320c0 17.7 14.3 32 32 32s32-14.3 32-32V109.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 53 43 96 96 96H352c53 0 96-43 96-96V352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V352z" />
                </svg>
                <span class="ms-2">Import</span>
            </button>
            <a href="export-associations">
                <button type="submit" class="btn text-white fw-normal" style="background-color:#2CA67A;">
                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" fill="white"
                        transform="rotate(90)" viewBox="0 0 512 512">
                        <path
                            d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                    </svg>
                    <span class="ms-2">Export</span>
                </button>
            </a>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="import" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <div class="d-flex justify-content-center">
                        <h4 class="text-center text-white" id="">
                            Import File
                        </h4>
                    </div>
                </div>
                <form id="form-create" action="import-associations" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-warning d-flex align-items-center p-4">
                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-2hx svg-icon-primary me-3">
                                <span class="svg-icon svg-icon-2hx svg-icon-warning me-4"><svg width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3"
                                            d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                            </span>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Title-->
                                <h4 class="mb-1 text-dark">Informasi</h4>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <ul>
                                    <li class="mb-1">File yang dapat diunggah berupa file excel berekstensi xls, xlsx.
                                    </li>
                                    <li class="mb-1">Format pengisian file excel berisi Nama, Tanggal Lahir, Edukasi,
                                        Nomor Registrasi, Jumlah Sertifikasi</li>
                                </ul>
                                <!--end::Content-->

                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <a href="{{ asset('import-assosiaction.xlsx') }}" class="btn btn-success mb-3" style="">
                            <i class="fas fa-file-excel"></i>
                            Download Format Excel
                        </a>
                        <p class="mb-0 text-dark " style="font-weight: 600">
                            File Excel *
                        </p>
                        <input type="file" class="form-control" name="import" id="">
                        @error('import')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" style="background-color: #1B3061" class="btn text-white btn-create">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modal-create" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">
                        Tambah Asosiasi
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('associations.store') }}" method="POST" id="form-create">
                        @csrf
                        <div id="basic-example">
                            <!-- Seller Details -->
                            <h3>Asosiasi</h3>
                            <section>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-year">Nama</label>
                                            <input type="text" class="form-control" name="name" id="basicpill-year"
                                                placeholder="Masukkan Nama Asosiasi">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-name">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                id="basicpill-name" placeholder="Masukkan Email Asosiasi">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="basicpill-fund_source_id">Telepon</label>
                                            <input type="number" placeholder="Telepon Asosiasi" name="phone_number"
                                                id="create-phone_number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Kota/Kab</label>
                                            <input type="text" name="city" placeholder="Kota/Kab Asosiasi"
                                                id="create-city" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Kode Pos</label>
                                            <input type="number" placeholder="Masukkan Kode Pos" name="postal_code"
                                                id="create-postal-code" class="form-control">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="" class="form-label">Alamat</label>
                                        <textarea name="address" placeholder="Masukkan Alamat" id="create-address" class="form-control" cols="25"
                                            rows="5"></textarea>
                                    </div>
                                </div>
                            </section>

                            <!-- Company Document -->
                            <h3>Ketua Asosiasi</h3>
                            <section>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="basicpill-nilai_kontrak">Nama Ketua</label>
                                            <input type="text" class="form-control" name="leader"
                                                id="basicpill-nilai_kontrak" placeholder="Masukkan Nama Ketua Asosiasi">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="basicpill-contract_category_id">Email</label>
                                            <input type="email" name="email_leader" placeholder="Masukkan Email"
                                                id="create-email_leader" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="basicpill-cstno-input">Telepon</label>
                                            <input type="number" placeholder="Masukkan Telepon"
                                                name="phone_number_leader" id="create-phone_number_leader"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Alamat</label>
                                            <textarea name="address_leader" placeholder="Masukkan Alamat" class="form-control" id="create-leader_address"
                                                cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 rounded p-4" style="background-color: #fff;box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
        <h6 class="mb-3 font-size-14">Berikut Daftar Peserta Pelatihan</h6>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="" class=" col-lg-3">
                <div class="input-group">
                    <input type="text" name="name" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                        <button class="btn text-white" style="background-color: #1B3061; border-radius: 0 5px 5px 0;"
                            type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <span>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create"
                    style="background-color: #1B3061"><i class="fas fa-plus"
                        style="margin-right:10px"></i>Tambah</button>
            </span>
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
            <table class="table table-borderless table-hover mt-4">
                <thead>
                    <tr>
                        <th scope="col" class="table-sipjaki text-center">NO</th>
                        <th scope="col" class="table-sipjaki text-center">Name</th>
                        <th scope="col" class="table-sipjaki text-center">Email</th>
                        <th scope="col" class="table-sipjaki text-center">No Telepone</th>
                        <th scope="col" class="table-sipjaki text-center">Nama Ketua</th>
                        <th scope="col" class="table-sipjaki text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($associations as $association)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $association->name }}</td>
                            <td class="text-center">{{ $association->email }}</td>
                            <td class="text-center">{{ $association->phone_number }}</td>
                            <td class="text-center">{{ $association->leader }}</td>
                            <td class="" style="border-bottom: 1px solid #fff">
                                <div class="d-flex justify-content-header gap-3">
                                    <div class="">
                                        <a href="{{ route('associations.show', ['association' => $association->id]) }}">
                                            <button type="button"
                                                class="btn btn-edit waves-effect waves-light text-white btn waves-effect d-flex flex-row gap-1 justify-content-evenly"
                                                style="background-color: #1B3061">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path d="M4.5 12.5C7.5 6 16.5 6 19.5 12.5" stroke="white"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M12 16C10.8954 16 10 15.1046 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16Z"
                                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg> Detail
                                            </button>
                                        </a>
                                    </div>
                                    <div class="">
                                        <button id="btn-edit-{{ $association->id }}"
                                            data-name="{{ $association->name }}"
                                            data-leader="{{ $association->leader }}"
                                            data-email="{{ $association->email }}"
                                            data-phone_number="{{ $association->phone_number }}"
                                            data-city="{{ $association->city }}"
                                            data-phone_number_leader="{{ $association->phone_number_leader }}"
                                            data-email_leader="{{ $association->email_leader }}"
                                            data-postal_code="{{ $association->postal_code }}"
                                            data-address_leader="{{ $association->address_leader }}"
                                            data-address="{{ $association->address }}" data-id="{{ $association->id }}"
                                            type="button"
                                            class="btn waves-effect waves-light d-flex btn-edit flex-row gap-1 justify-content-evenly"
                                            style="width: 90px; background-color: #FFC928; color: white"><i
                                                class="bx bx-bx bxs-edit fs-4"></i>
                                            <span>Edit</span>
                                        </button>
                                    </div>
                                    <div class="">
                                        <button type="button" data-id="{{ $association->id }}"
                                            class="btn waves-effect waves-light d-flex flex-row gap-1 justify-content-between btn-delete"
                                            style="width: 90px; background-color: #E05C39; color: white" data-id=""><i
                                                class="bx bx-bx bxs-trash fs-4"></i>
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                <div class="d-flex justify-content-center" style="min-height:16rem">
                                    <div class="my-auto">
                                        <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                        <h4 class="text-center mt-4">Asosiasi Kosong !!</h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modal-update" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">
                        Tambah Asosiasi
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form-update">
                        @csrf
                        @method('PUT')
                        <div id="basic-update">
                            <!-- Seller Details -->
                            <h3>Asosiasi</h3>
                            <section>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-name">Nama</label>
                                            <input type="text" class="form-control" name="name" id="update-name"
                                                placeholder="Masukan Tahun">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-email">Email</label>
                                            <input type="email" class="form-control" name="email" id="update-email"
                                                placeholder="masukan nama pekerjaan">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="update-fund_source_id">Telepon</label>
                                            <input type="number" name="phone_number" id="update-phone_number"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Kota/Kab</label>
                                            <input type="text" name="city" id="update-city" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Kode Pos</label>
                                            <input type="number" name="postal_code" id="update-postal-code"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="" class="form-label">Alamat</label>
                                        <textarea name="address" id="update-address" class="form-control" cols="25" rows="5"></textarea>
                                    </div>
                                </div>
                            </section>

                            <!-- Company Document -->
                            <h3>Ketua Asosiasi</h3>
                            <section>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="basicpill-nilai_kontrak">Nama Ketua</label>
                                            <input type="text" class="form-control" name="leader"
                                                id="basicpill-nilai_kontrak" placeholder="Masukan nilai kontrak">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="basicpill-contract_category_id">Email</label>
                                            <input type="email" name="email_leader" id="update-email_leader"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="basicpill-cstno-input">Telepon</label>
                                            <input type="number" name="phone_number_leader"
                                                id="update-phone_number_leader" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Alamat</label>
                                            <textarea name="address_leader" class="form-control" id="update-leader_address" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-md" id="modal-detail" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Detail Tenaga Kerja</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <p class="mt-3 fs-5 text-dark mb-2" style="font-weight: 700">
                                <span id="detail-name"></span>
                            </p>
                            <div class="">
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Tanggal Lahir :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-birth_date"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Pendidikan :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-education"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">No. Registrasi :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-registration_number"></span></p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Jenis Sertifikat :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;"><span
                                                id="detail-cerificate"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                                data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script>
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `associations/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);

            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `associations/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection
