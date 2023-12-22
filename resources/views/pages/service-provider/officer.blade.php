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
                    <input type="text" name="name" value="{{ request()->name }}" class="form-control"
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

            <div class="modal fade" id="modal-create" tabindex="-1" id="modal-create" aria-labelledby="exampleModalLabel1">
                <div class="modal-dialog modal-lg" role="document">
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
                                            Jabatan</label>
                                        <input type="text" class="form-control" id="create-name" class="form-control"
                                            name="position" aria-describedby="name" value="{{ old('position') }}"
                                            placeholder="Masukkan Jabatan" />
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
                                            Pekerjaan</label>
                                        <input type="text" class="form-control" id="create-name" class="form-control"
                                            name="job" aria-describedby="name" value="{{ old('job') }}"
                                            placeholder="Masukkan Pekerjaan" />
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
                                            <option value="konghucu"
                                                {{ old('religion') == 'konghucu' ? 'selected' : '' }}>
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
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                            Jenis Kelamin</label>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="formRadios1" checked="" value="male">
                                            <label class="form-check-label" for="formRadios1">
                                                Laki - laki
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="formRadios1" checked="" value="female">
                                            <label class="form-check-label" for="formRadios1">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                            Status Kawin</label>
                                        <select name="marital_status" class="form-select">
                                            <option value="single"
                                                {{ old('marital_status') == 'single' ? 'selected' : '' }}>
                                                Belum Kawin
                                            </option>
                                            <option value="marry"
                                                {{ old('marital_status') == 'marry' ? 'selected' : '' }}>
                                                Sudah Kawin
                                            </option>
                                            <option value="divorced"
                                                {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>
                                                Cerai Hidup
                                            </option>
                                            <option value="death_divorce"
                                                {{ old('marital_status') == 'death_divorce' ? 'selected' : '' }}>
                                                Cerai Mati
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Alamat</label>
                                    <textarea class="form-control" name="address" id="" cols="15" rows="5"
                                        placeholder="Masukkan Alamat">{{ old('address') }}</textarea>
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
        @if ($errors->has('birth_date'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('birth_date') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->has('address'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('address') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->has('position'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('position') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->has('education'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('education') }}
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
                            <td class="fs-6">{{ $index + 1 }}</td>
                            <td class="fs-6">{{ $officer->name }}</td>
                            <td class="fs-6">
                                {{ Carbon::parse($officer->birth_date)->locale('id_ID')->isoFormat('DD MMMM Y') }}</td>
                            <td class="fs-6">{{ $officer->address }}</td>
                            <td class="fs-6">{{ $officer->position }}</td>
                            <td class="fs-6">{{ $officer->education }}</td>
                            <td class="d-flex flex-row gap-3 justify-content-center">
                                <button data-name="{{ $officer->name }}"
                                    data-birth_date="{{ Carbon::parse($officer->birth_date)->locale('id_ID')->isoFormat('DD MMMM Y') }}"
                                    data-address="{{ $officer->address }}" data-position="{{ $officer->position }}"
                                    data-education="{{ $officer->education }}"
                                    data-religion="{{ $officer->religion == 'islam'
                                        ? 'Islam'
                                        : ($officer->religion == 'kristen'
                                            ? 'Kristen'
                                            : ($officer->religion == 'hindu'
                                                ? 'Hindu'
                                                : ($officer->religion == 'budha'
                                                    ? 'Buddha'
                                                    : ($officer->religion == 'katolik'
                                                        ? 'Katolik'
                                                        : ($officer->religion == 'konghucu'
                                                            ? 'Konghucu'
                                                            : ''))))) }}"
                                    data-gender="{{ $officer->gender == 'male' ? 'Laki - Laki' : 'Perempuan' }}"
                                    data-marital_status="{{ $officer->marital_status == 'marry'
                                        ? 'Sudah Kawin'
                                        : ($officer->marital_status == 'single'
                                            ? 'Belum Kawin'
                                            : ($officer->marital_status == 'divorced'
                                                ? 'Cerai Hidup'
                                                : ($officer->marital_status == 'death_divorce'
                                                    ? 'Cerai Mati'
                                                    : ''))) }}"
                                    data-citizenship="{{ $officer->citizenship == 'wni' ? 'WNI' : 'WNA' }}"
                                    data-job="{{ $officer->job }}"
                                    data-national_identity_number="{{ $officer->national_identity_number }}"
                                    id="btn-detail-{{ $officer->id }}" data-id="{{ $officer->id }}"
                                    class="btn btn-detail text-white" style="background-color: #1B3061"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none">
                                        <path d="M4.5 12.5C7.5 6 16.5 6 19.5 12.5" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M12 16C10.8954 16 10 15.1046 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg> Detail</button>
                                <button type="button"
                                    class="btn waves-effect waves-light d-flex btn-edit flex-row gap-1 justify-content-evenly"
                                    style="width: 90px; background-color: #FFC928; color: white"
                                    id="btn-edit-{{ $officer->id }}" data-id="{{ $officer->id }}"
                                    data-name="{{ $officer->name }}" data-birth_date="{{ $officer->birth_date }}"
                                    data-address="{{ $officer->address }}" data-position="{{ $officer->position }}"
                                    data-education="{{ $officer->education }}"><i class="bx bx-bx bxs-edit fs-4"></i>
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
                                        <h4 class="text-center mt-4">Tidak Ada Pengurus!!</h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $officers->links('pagination::bootstrap-5') }}
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
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Pengurus</label>
                                    <input type="text" class="form-control" id="update-name" class="form-control"
                                        name="name" aria-describedby="name" placeholder="Masukkan Pengurus" />
                                </div>
                                <div class="col-6">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="create-name" class="form-control"
                                        name="birth_date" aria-describedby="name" value="{{ old('birth_date') }}"
                                        placeholder="Masukkan Tanggal Lahir" />

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Jabatan</label>
                                    <input type="text" class="form-control" id="create-name" class="form-control"
                                        name="position" aria-describedby="name" value="{{ old('position') }}"
                                        placeholder="Masukkan Jabatan" />
                                </div>
                                <div class="col-6">
                                    <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                        Pendidikan</label>
                                    <input type="text" class="form-control" id="create-name" class="form-control"
                                        name="education" aria-describedby="name" value="{{ old('education') }}"
                                        placeholder="Masukkan Pendidikan" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label id="name" for="recipient-name" class="control-label mb-2">Masukan
                                    Alamat</label>
                                <textarea class="form-control" name="address" id="" cols="15" rows="5"
                                    placeholder="Masukkan Alamat">{{ old('address') }}</textarea>
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
                                <td class="fw-bold">Nama Pengurus</td>
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
                                <td class="fw-bold">Jabatan</td>
                                <td>:</td>
                                <td id="detail-position"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pekerjaan</td>
                                <td>:</td>
                                <td id="detail-job"></td>
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
