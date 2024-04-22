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
    <h4 class="mb-3 font-size-18">Tenaga Kerja</h4>
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
            <a href="{{ route('export.workers') }}">
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
                <form id="form-create" action="{{ route('import.workers') }}" method="POST" enctype="multipart/form-data">
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
                        <a href="{{ asset('import-workers.xlsx') }}" class="btn btn-success mb-3" style="">
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
                <form id="form-create" action="{{ route('workers.store') }}" method="POST">
                    @csrf
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Tambah Tenaga Kerja
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Pengurus</label>
                                <input type="text" class="form-control" id="create-name" class="form-control"
                                    name="name" aria-describedby="name" placeholder="Masukkan Pengurus"
                                    value="{{ old('name') }}" />
                            </div>
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    NIK</label>
                                <input type="text" class="form-control" id="create-name" class="form-control"
                                    name="national_identity_number" aria-describedby="name"
                                    placeholder="Masukkan Pengurus" value="{{ old('name') }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    No Telepon</label>
                                <input type="number" class="form-control" id="create-name" class="form-control"
                                    name="phone_number" aria-describedby="name" value="{{ old('phone_number') }}"
                                    placeholder="Masukkan No Telepon" />
                            </div>
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Pendidikan</label>
                                <input type="text" class="form-control" id="create-name" class="form-control"
                                    name="education" aria-describedby="name" value="{{ old('education') }}"
                                    placeholder="Masukkan Pendidikan" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Kewarganegaraan</label>
                                <select name="citizenship" class="form-select">
                                    <option value="wni" {{ old('citizenship') == 'wni' ? 'selected' : '' }}>
                                        WNI
                                    </option>
                                    <option value="wna" {{ old('citizenship') == 'wna' ? 'selected' : '' }}>
                                        WNA
                                    </option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Agama</label>
                                <select name="religion" class="form-select">
                                    <option value="islam" {{ old('religion') == 'islam' ? 'selected' : '' }}>
                                        Islam
                                    </option>
                                    <option value="kristen" {{ old('religion') == 'kristen' ? 'selected' : '' }}>
                                        Kristen
                                    </option>
                                    <option value="hindu" {{ old('religion') == 'hindu' ? 'selected' : '' }}>
                                        Hindu
                                    </option>
                                    <option value="budha" {{ old('religion') == 'budha' ? 'selected' : '' }}>
                                        Budha
                                    </option>
                                    <option value="katolik" {{ old('religion') == 'katolik' ? 'selected' : '' }}>
                                        Katolik
                                    </option>
                                    <option value="konghucu" {{ old('religion') == 'konghucu' ? 'selected' : '' }}>
                                        Konghucu
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Tanggal Lahir</label>
                                <input type="date" class="form-control" id="create-name" class="form-control"
                                    name="birth_date" aria-describedby="name" value="{{ old('birth_date') }}"
                                    placeholder="Masukkan Tanggal Lahir" />
                            </div>
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Status Kawin</label>
                                <select name="marital_status" class="form-select">
                                    <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>
                                        Belum Kawin
                                    </option>
                                    <option value="marry" {{ old('marital_status') == 'marry' ? 'selected' : '' }}>
                                        Sudah Kawin
                                    </option>
                                    <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>
                                        Cerai Hidup
                                    </option>
                                    <option value="death_divorce"
                                        {{ old('marital_status') == 'death_divorce' ? 'selected' : '' }}>
                                        Cerai Mati
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Jenis Kelamin</label>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="gender" id="formRadios1"
                                        checked="" value="male">
                                    <label class="form-check-label" for="formRadios1">
                                        Laki - laki
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="gender" id="formRadios1"
                                        checked="" value="female">
                                    <label class="form-check-label" for="formRadios1">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Alamat</label>
                                <textarea class="form-control" name="address" id="" cols="15" rows="5"
                                    placeholder="Masukkan Alamat">{{ old('address') }}</textarea>
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
    <div class="mt-4 rounded p-4" style="background-color: #fff;box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
        <h6 class="mb-3 font-size-14">Berikut Daftar Peserta Pelatihan</h6>
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <div class="col-lg-5">
                    <form action="" class="">
                        <div class="input-group">
                            <input type="text" name="name" value="{{ request()->name }}" class="form-control"
                                placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn text-white"
                                    style="background-color: #1B3061; border-radius: 0 5px 5px 0;" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <button class="btn ms-1 text-white rounded" style="background-color:#1B3061" onclick="selectAll()">
                    Pilih Semua
                </button>
                <form action="{{ route('delete-workers') }}" id="delete-multiple" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="worker_id" id="selected-worker">
                    <button type="button" class="btn ms-1 text-white rounded" style="background-color:#E05C39"
                        onclick="deleteSelected()">
                        Hapus Pilihan
                    </button>
                </form>
            </div>
            <button class="btn ms-1 rounded" data-bs-toggle="modal" data-bs-target="#modal-create"
                style="background-color:#1B3061;color:white">
                + Tambah
            </button>
        </div>
        <div class="table-responsive">
            @if ($errors->has('name'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ $errors->first('name') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('birth_date'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ $errors->first('birth_date') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('education'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ $errors->first('education') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('registration_number'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ $errors->first('registration_number') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('cerificate'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ $errors->first('cerificate') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('phone_number'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ $errors->first('phone_number') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('gender'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ $errors->first('gender') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('religion'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ $errors->first('religion') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('marital_status'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ $errors->first('marital_status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('citizenship'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ $errors->first('citizenship') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table table-borderless table-hover mt-4">
                <thead>
                    <tr>
                        <th scope="col" class="text-center text-white"
                            style="background-color: #1B3061; border-radius:5px 0px 0px 5px; border-color: #1B3061; border-width: 0px;">
                            Select
                        </th>
                        <th scope="col" class="table-sipjaki text-center">Name</th>
                        <th scope="col" class="table-sipjaki text-center">Tanggal Lahir</th>
                        <th scope="col" class="table-sipjaki text-center">Pendidikan</th>
                        <th scope="col" class="table-sipjaki text-center">No Telepon</th>
                        <th scope="col" class="text-white text-center"
                            style="background-color: #1B3061; border-radius:0px 5px 5px 0px; color: #ffffff; border-color: #1B3061; border-width: 0px;">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($workers as $worker)
                        <tr>
                            <th scope="row" class="text-center">
                                <input value="{{ $worker->id }}" type="checkbox"
                                    aria-label="Checkbox for following text input">
                            </th>
                            <td class="text-center">{{ $worker->name }}</td>
                            <td class="text-center">
                                {{ Carbon::parse($worker->birth_date)->translatedFormat('d F Y') }}</td>
                            <td class="text-center">{{ $worker->education }}</td>
                            <td class="text-center">{{ $worker->phone_number }}</td>
                            <td class="" style="border-bottom: 1px solid #fff">
                                <div class="d-flex justify-content-header gap-2">
                                    <div class="">
                                        <a href="{{ route('worker-certificate', ['worker' => $worker->id]) }}" class="btn btn-md btn-success"> <i class="far fa-file-alt fs-5"></i>
                                            Sertifikat
                                        </a>
                                    </div>
                                    <div class="">
                                        <button data-name="{{ $worker->name }}"
                                            data-birth_date="{{ Carbon::parse($worker->birth_date)->locale('id_ID')->isoFormat('DD MMMM Y') }}"
                                            data-address="{{ $worker->address }}"
                                            data-phone_number="{{ $worker->phone_number }}"
                                            data-education="{{ $worker->education }}"
                                            data-religion="{{ $worker->religion == 'islam'
                                                ? 'Islam'
                                                : ($worker->religion == 'kristen'
                                                    ? 'Kristen'
                                                    : ($worker->religion == 'hindu'
                                                        ? 'Hindu'
                                                        : ($worker->religion == 'budha'
                                                            ? 'Buddha'
                                                            : ($worker->religion == 'katolik'
                                                                ? 'Katolik'
                                                                : ($worker->religion == 'konghucu'
                                                                    ? 'Konghucu'
                                                                    : ''))))) }}"
                                            data-gender="{{ $worker->gender == 'male' ? 'Laki - Laki' : 'Perempuan' }}"
                                            data-marital_status="{{ $worker->marital_status == 'marry'
                                                ? 'Sudah Kawin'
                                                : ($worker->marital_status == 'single'
                                                    ? 'Belum Kawin'
                                                    : ($worker->marital_status == 'divorced'
                                                        ? 'Cerai Hidup'
                                                        : ($worker->marital_status == 'death_divorce'
                                                            ? 'Cerai Mati'
                                                            : ''))) }}"
                                            data-citizenship="{{ $worker->citizenship == 'wni' ? 'WNI' : 'WNA' }}"
                                            data-national_identity_number="{{ $worker->national_identity_number }}"
                                            id="btn-detail-{{ $worker->id }}" data-id="{{ $worker->id }}"
                                            type="button" class="btn btn-detail waves-effect waves-light text-white btn waves-effect d-flex flex-row"
                                            style="background-color: #1B3061">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                viewBox="0 0 24 24" fill="none">
                                                <path d="M4.5 12.5C7.5 6 16.5 6 19.5 12.5" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M12 16C10.8954 16 10 15.1046 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16Z"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="">
                                        <button type="button"
                                            class="btn waves-effect waves-light d-flex btn-edit flex-row gap-1 justify-content-evenly"
                                            style="background-color: #FFC928; color: white"
                                            id="btn-edit-{{ $worker->id }}" data-id="{{ $worker->id }}"
                                            data-name="{{ $worker->name }}" data-birth_date="{{ $worker->birth_date }}"
                                            data-address="{{ $worker->address }}"
                                            data-phone_number="{{ $worker->phone_number }}"
                                            data-education="{{ $worker->education }}"
                                            data-religion="{{ $worker->religion }}" data-gender="{{ $worker->gender }}"
                                            data-marital_status="{{ $worker->marital_status }}"
                                            data-citizenship="{{ $worker->citizenship }}"
                                            data-national_identity_number="{{ $worker->national_identity_number }}"><i
                                                class="bx bx-bx bxs-edit fs-4"></i>
                                            <span></span>
                                        </button>
                                    </div>
                                    <div class="">
                                        <button type="button"
                                            class="btn waves-effect waves-light d-flex flex-row gap-1 justify-content-between btn-delete"
                                            style="background-color: #E05C39; color: white" data-id="{{$worker->id}}"
                                            data-bs-toggle="modal" data-bs-target="#modal-delete"><i
                                                class="bx bx-bx bxs-trash fs-4"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                <div class="d-flex justify-content-center" style="min-height:19rem">
                                    <div class="my-auto">
                                        <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                        <h4 class="text-center mt-4">Tenaga kerja kosong!!</h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $workers->links('pagination::bootstrap-5') }}
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modal-update" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form-update" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="exampleModalLabel1">
                            Edit Tenaga Kerja
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Pengurus</label>
                                <input type="text" class="form-control" id="create-name" class="form-control"
                                    name="name" aria-describedby="name" placeholder="Masukkan Pengurus"
                                    value="{{ old('name') }}" />
                            </div>
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    NIK</label>
                                <input type="text" class="form-control" id="create-name" class="form-control"
                                    name="national_identity_number" aria-describedby="name"
                                    placeholder="Masukkan Pengurus" value="{{ old('name') }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    No Telepon</label>
                                <input type="number" class="form-control" id="create-name" class="form-control"
                                    name="phone_number" aria-describedby="name" value="{{ old('phone_number') }}"
                                    placeholder="Masukkan No Telepon" />
                            </div>
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Pendidikan</label>
                                <input type="text" class="form-control" id="create-name" class="form-control"
                                    name="education" aria-describedby="name" value="{{ old('education') }}"
                                    placeholder="Masukkan Pendidikan" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Kewarganegaraan</label>
                                <select name="citizenship" class="form-select">
                                    <option value="wni" {{ old('citizenship') == 'wni' ? 'selected' : '' }}>
                                        WNI
                                    </option>
                                    <option value="wna" {{ old('citizenship') == 'wna' ? 'selected' : '' }}>
                                        WNA
                                    </option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Agama</label>
                                <select name="religion" class="form-select">
                                    <option value="islam" {{ old('religion') == 'islam' ? 'selected' : '' }}>
                                        Islam
                                    </option>
                                    <option value="kristen" {{ old('religion') == 'kristen' ? 'selected' : '' }}>
                                        Kristen
                                    </option>
                                    <option value="hindu" {{ old('religion') == 'hindu' ? 'selected' : '' }}>
                                        Hindu
                                    </option>
                                    <option value="budha" {{ old('religion') == 'budha' ? 'selected' : '' }}>
                                        Budha
                                    </option>
                                    <option value="katolik" {{ old('religion') == 'katolik' ? 'selected' : '' }}>
                                        Katolik
                                    </option>
                                    <option value="konghucu" {{ old('religion') == 'konghucu' ? 'selected' : '' }}>
                                        Konghucu
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Tanggal Lahir</label>
                                <input type="date" class="form-control" id="create-name" class="form-control"
                                    name="birth_date" aria-describedby="name" value="{{ old('birth_date') }}"
                                    placeholder="Masukkan Tanggal Lahir" />
                            </div>
                            <div class="col-6">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Status Kawin</label>
                                <select name="marital_status" class="form-select">
                                    <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>
                                        Belum Kawin
                                    </option>
                                    <option value="marry" {{ old('marital_status') == 'marry' ? 'selected' : '' }}>
                                        Sudah Kawin
                                    </option>
                                    <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>
                                        Cerai Hidup
                                    </option>
                                    <option value="death_divorce"
                                        {{ old('marital_status') == 'death_divorce' ? 'selected' : '' }}>
                                        Cerai Mati
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Jenis Kelamin</label>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="gender" id="formRadios1"
                                        checked="" value="male">
                                    <label class="form-check-label" for="formRadios1">
                                        Laki - laki
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="gender" id="formRadios1"
                                        checked="" value="female">
                                    <label class="form-check-label" for="formRadios1">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Alamat</label>
                                <textarea class="form-control" name="address" id="" cols="15" rows="5"
                                    placeholder="Masukkan Alamat">{{ old('address') }}</textarea>
                            </div>
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
                    <table cellpadding="6" style="border-collapse: collapse;width:80%;" class="fs-6 fw-normal">
                        <tbody>
                            <tr>
                                <td class="fw-bold">Nama Tenaga Kerja</td>
                                <td>:</td>
                                <td id="detail-name"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">NIK</td>
                                <td>:</td>
                                <td id="detail-national_identity_number"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Jenis Kelamin</td>
                                <td>:</td>
                                <td id="detail-gender"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Agama</td>
                                <td>:</td>
                                <td id="detail-religion"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Status</td>
                                <td>:</td>
                                <td id="detail-marital_status"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kewarganegaran</td>
                                <td>:</td>
                                <td id="detail-citizenship"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">No Telepon</td>
                                <td>:</td>
                                <td id="detail-phone_number"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pendidikan</td>
                                <td>:</td>
                                <td id="detail-education"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Tanggal Lahir</td>
                                <td>:</td>
                                <td id="detail-birth_date"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Alamat</td>
                                <td>:</td>
                                <td id="detail-address"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script>
        $('.btn-detail').click(function() {
            const data = getDataAttributes($(this).attr('id'))
            handleDetail(data)
            $('#modal-detail').modal('show')
        })
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `workers/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);
            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', actionUrl);
            $('#modal-update').modal('show')
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `workers/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })

        function updateSelected() {
            var selectedIds = [];
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    var workerId = checkbox.value;
                    selectedIds.push(workerId);
                }
            });
            document.getElementById('selected-worker').value = selectedIds;
        }

        function deleteSelected() {
            updateSelected();
            var selectedIds = document.getElementById('selected-worker').value;
            if (selectedIds) {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin melanjutkan?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-multiple').submit();
                    } else {
                        Swal.fire('Dibatalkan', 'Aksi telah dibatalkan.', 'error');
                    }
                });
            } else {
                Swal.fire({
                    'icon': 'error',
                    'title': 'error',
                    'text': 'Setidaknya Pilih Satu Tenaga kerja Untuk Dihapus'
                })
            }
        }

        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', updateSelected);
        });

        function selectAll() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = true;
            });
        }
    </script>
@endsection
