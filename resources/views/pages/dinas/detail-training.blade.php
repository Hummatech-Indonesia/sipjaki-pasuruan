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
    <div class="d-flex justify-content-between mb-3">
        <div class="">
            <h3 class="text-dark" style="font-weight: 600">
                Detail Pelatihan
            </h3>
        </div>
        <div class="">
            <a href="{{ route('training') }}" class="btn btn-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 16" fill="none">
                    <path
                        d="M0.292892 7.29289C-0.0976315 7.68342 -0.0976315 8.31658 0.292892 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292892 7.29289ZM20 7L1 7V9L20 9V7Z"
                        fill="white" />
                </svg>&nbsp;Kembali
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="badge bg-info">
                <p class="mb-0 px-3 py-1 fs-6">
                    <span id="detail-year">{{ $training->fiscalYear->name }}</span>
                </p>
            </div>
            <p class="mt-3 fs-5 text-dark mb-2" style="font-weight: 700">
                <span id="detail-name">{{ $training->name }}</span>
            </p>
            <table class="table">
                <tbody>
                    <tr>
                        <td class="text-dark" style="font-weight: bold;">Sumber Dana:</td>
                        <td class="text-dark" style="font-weight: 600;"><span
                                id="detail-project_value">{{ $training->fundSource->name }}</span></td>
                    </tr>
                    <tr>
                        <td class="text-dark" style="font-weight: bold;">Kualifikasi:</td>
                        <td class="text-dark" style="font-weight: 600;"><span
                                id="detail-physical_progress"></span>{{ $training->qualificationTraining->name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-dark" style="font-weight: bold;">Jenjang KKNI:</td>
                        <td class="text-dark" style="font-weight: 600;"><span
                                id="detail-finance_progress">{{ $training->qualificationLevelTraining->name }}</span></td>
                    </tr>
                    <tr>
                        <td class="text-dark" style="font-weight: bold;">Klasifikasi:</td>
                        <td class="text-dark" style="font-weight: 600;"><span
                                id="detail-status">{{ $training->subClassificationTraining->classificationTraining->name }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-dark" style="font-weight: bold;">Sub Klasifikasi:</td>
                        <td class="text-dark" style="font-weight: 600;"><span
                                id="detail-service_provider_name">{{ $training->subClassificationTraining->name }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-dark" style="font-weight: bold;">Waktu Pelaksanaan:</td>
                        <td class="text-dark" style="font-weight: 600;"><span
                                id="detail-start_at">{{ \Carbon\Carbon::parse($training->start_at)->translatedFormat('d F Y') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-dark" style="font-weight: bold;">Selesai Pelaksanaan:</td>
                        <td class="text-dark" style="font-weight: 600;"><span
                                id="detail-end_at">{{ \Carbon\Carbon::parse($training->end_at)->translatedFormat('d F Y') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-dark" style="font-weight: bold;">Jam Pelajaran:</td>
                        <td class="text-dark" style="font-weight: 600;"><span
                                id="detail-physical_progress_start">{{ $training->lesson_hour }}</span></td>
                    </tr>
                    <tr>
                        <td class="text-dark" style="font-weight: bold;">Metode Pelatihan:</td>
                        <td class="text-dark" style="font-weight: 600;"><span
                                id="detail-finance_progress_start">{{ $training->TrainingMethod->name }}</span></td>
                    </tr>
                    <tr>
                        <td class="text-dark" style="font-weight: bold;">Sumber Dana:</td>
                        <td class="text-dark" style="font-weight: 600;"><span
                                id="detail-fund_source">{{ $training->fundSource->name }}</span></td>
                    </tr>
                    <tr>
                        <td class="text-dark" style="font-weight: bold;">Lokasi:</td>
                        <td class="text-dark" style="font-weight: 600;"><span
                                id="detail-contract_category_name">{{ $training->location }}</span></td>
                    </tr>
                    <tr>
                        <td class="text-dark" style="font-weight: bold;">Keterangan:</td>
                        <td class="text-dark" style="font-weight: 600;"><span
                                id="detail-characteristic_project_name">{{ $training->description }}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="text-dark" style="font-weight: 600">
                Berikut Daftar Peserta Pelatihan
            </h4>
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-header gap-3">
                    <form action="" class="">
                        <div class="">
                            <div class="position-relative mb-3 ">
                                <input type="search" class="form-control search-chat py-2 ps-5" placeholder="Search"
                                    name="name" value="{{ $name }}">
                                <i
                                    class="bx bx-search-alt-2
                            position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                            </div>
                        </div>
                    </form>
                    <div>
                        <button class="btn btn-danger d-flex items-center gap-2">
                            PDF<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24">
                                <path fill="white"
                                    d="m23 12l-4-4v3h-9v2h9v3M1 18V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3h-2V6H3v12h12v-3h2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2Z" />
                            </svg>
                            </i>
                        </button>
                    </div>
                    <div>
                        <button class="btn btn-success d-flex items-center gap-2">
                            Excel<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24">
                                <path fill="white"
                                    d="m23 12l-4-4v3h-9v2h9v3M1 18V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3h-2V6H3v12h12v-3h2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2Z" />
                            </svg>
                            </i>
                    </div>
                    </button>
                    <div class="">
                        <button id="checkAll" onclick="selectAll()" class="btn text-white"
                            style="background-color: #1B3061">
                            Select All
                        </button>
                    </div>
                    <div class="">
                        <form id="delete-multiple" action="{{ route('delete-member') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" id="selected-worker">
                            <button id="DeleteAll" onclick="deleteSelected()" type="button"
                                class="btn text-white btn-danger">
                                Delete Select
                            </button>
                        </form>
                    </div>
                </div>

                <div class="">
                    <button data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl" class="btn text-white"
                        style="background-color: #1B3061">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                                fill="white" />
                        </svg>&nbsp;Tambah
                    </button>
                </div>
            </div>
            {{-- modal --}}
            <div class="modal fade" id="modal-update" tabindex="-1" role="dialog"
                aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #1B3061">
                            <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Edit Peserta Pelatihan</h5>
                            <button type="button" class="btn-close" style="background-color: white"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="card-body">
                            <form action="" id="form-update" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div id="basic-update">
                                    <!-- Seller Details -->
                                    <h3>Data 1</h3>
                                    <section>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input">Nama</label>
                                                    <input name="name" type="text" class="form-control"
                                                        id="basicpill-phoneno-input" placeholder="Masukkan Nama">
                                                    @error('name')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-lastname-input">Jabatan</label>
                                                    <input name="position" type="text" class="form-control"
                                                        id="basicpill-phoneno-input" placeholder="Masukkan Jabatan">
                                                    @error('position')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-lastname-input">No Telephone</label>
                                                    <input name="phone_number" type="text" class="form-control"
                                                        id="basicpill-phoneno-input" placeholder="Masukkan No Telephone">
                                                    @error('phone_number')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-phoneno-input">Jenis kelamin</label> <br>
                                                    <input type="radio" name="gender" id="update-gender-male"
                                                        value="male">&nbsp;Laki-Laki
                                                    <input type="radio" name="gender" id="update-gender-female"
                                                        value="female">&nbsp;Perempuan
                                                    @error('gender')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input">Sertifikat</label>
                                                    <input name="file" type="file" class="form-control"
                                                        id="basicpill-phoneno-input" placeholder="Enter Your Name.">
                                                    @error('file')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <!-- Company Document -->
                                    <h3>Data 2</h3>
                                    <section>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input">Surat Keputusan</label>
                                                    <input name="decree" type="text" class="form-control"
                                                        id="basicpill-phoneno-input"
                                                        placeholder="Masukkan Surat Keputusan">
                                                    @error('decree')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input">Pendidikan</label>
                                                    <input name="education" type="text" class="form-control"
                                                        id="basicpill-phoneno-input" placeholder="Masukkan Pendidikan">
                                                    @error('education')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-phoneno-input">NIK</label>
                                                    <input name="national_identity_number" type="number"
                                                        class="form-control" id="basicpill-phoneno-input"
                                                        placeholder="MAsukkan NIK">
                                                    @error('national_identity_number')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input">Alamat</label>
                                                    <textarea name="address" placeholder="Masukkan Alamat" id="" cols="30" rows="5"
                                                        class="form-control"></textarea>
                                                    @error('address')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog"
                aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #1B3061">
                            <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Peserta Pelatihan</h5>
                            <button type="button" class="btn-close" style="background-color: white"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('training.members.store', $training->id) }}" id="form-create"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div id="basic-example">
                                    <!-- Seller Details -->
                                    <h3>Data 1</h3>
                                    <section>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input">Nama</label>
                                                    <input name="name" type="text" class="form-control"
                                                        id="basicpill-phoneno-input" placeholder="Masukkan Nama">
                                                    @error('name')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-lastname-input">Jabatan</label>
                                                    <input name="position" type="text" class="form-control"
                                                        id="basicpill-phoneno-input" placeholder="Masukkan Jabatan">
                                                    @error('position')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-lastname-input">No Telephone</label>
                                                    <input name="phone_number" type="text" class="form-control"
                                                        id="basicpill-phoneno-input" placeholder="Masukkan No Telephone">
                                                    @error('phone_number')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-phoneno-input">Jenis kelamin</label> <br>
                                                    <input type="radio" name="gender" value="male">&nbsp;Laki-Laki
                                                    <input type="radio" name="gender" value="female">&nbsp;Perempuan
                                                    @error('gender')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-8">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input">Sertifikat</label>
                                                    <input name="file" type="file" class="form-control"
                                                        id="basicpill-phoneno-input" placeholder="Enter Your Name.">
                                                    @error('file')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <!-- Company Document -->
                                    <h3>Data 2</h3>
                                    <section>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input">Surat Keputusan</label>
                                                    <input name="decree" type="text" class="form-control"
                                                        id="basicpill-phoneno-input"
                                                        placeholder="Masukkan Surat Keputusan">
                                                    @error('decree')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input">Pendidikan</label>
                                                    <input name="education" type="text" class="form-control"
                                                        id="basicpill-phoneno-input" placeholder="Masukkan Pendidikan">
                                                    @error('education')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-phoneno-input">NIK</label>
                                                    <input name="national_identity_number" type="number"
                                                        class="form-control" id="basicpill-phoneno-input"
                                                        placeholder="Masukkan NIK">
                                                    @error('national_identity_number')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input">Alamat</label>
                                                    <textarea name="address" placeholder="Masukkan Alamat" id="" cols="30" rows="5"
                                                        class="form-control"></textarea>
                                                    @error('address')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            {{-- end --}}
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
                <table class="table">
                    <thead>
                        <tr>
                            <td class="text-white" style="background-color: #1B3061">
                                Select
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Nama
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Posisi
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Alamat
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                No Telephone
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Jenis Kelamin
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Surat Keputusan
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                nomor identitas Nasional
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Pendidikan
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Aksi
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trainingMembers as $trainingMember)
                            <tr>
                                <td>
                                    <input type="checkbox" value="{{ $trainingMember->id }}" class="check">
                                </td>
                                <td>
                                    {{ $trainingMember->name }}
                                </td>
                                <td>
                                    {{ $trainingMember->position }}
                                </td>
                                <td>
                                    {{ $trainingMember->address }}
                                </td>
                                <td>
                                    {{ $trainingMember->phone_number }}
                                </td>
                                <td>
                                    @if ($trainingMember->gender == 'male')
                                        Laki-Laki
                                    @else
                                        Perempuan
                                    @endif
                                </td>
                                <td>
                                    {{ $trainingMember->decree }}
                                </td>
                                <td>
                                    {{ $trainingMember->national_identity_number }}
                                </td>
                                <td>
                                    {{ $trainingMember->education }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-header gap-3">
                                        <div class="">
                                            <button class="btn btn-warning btn-edit"
                                                id="btn-edit-{{ $trainingMember->id }}"
                                                data-id="{{ $trainingMember->id }}"
                                                data-position="{{ $trainingMember->position }}"
                                                data-decree="{{ $trainingMember->decree }}"
                                                data-phone_number="{{ $trainingMember->phone_number }}"
                                                data-address="{{ $trainingMember->address }}"
                                                data-gender="{{ $trainingMember->gender }}"
                                                data-education="{{ $trainingMember->education }}"
                                                data-national_identity_number="{{ $trainingMember->national_identity_number }}"
                                                data-name="{{ $trainingMember->name }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <g clip-path="url(#clip0_115_12085)">
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
                                                        <clipPath id="clip0_115_12085">
                                                            <rect width="24" height="24" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="">
                                            <button class="btn btn-danger btn-delete"
                                                id="btn-edit-{{ $trainingMember->id }}"
                                                data-id="{{ $trainingMember->id }}">
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
                                <td colspan="10" class="text-center">
                                    <div class="d-flex justify-content-center" style="min-height:16rem">
                                        <div class="my-auto">
                                            <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                            <h4 class="text-center mt-4">Peserta Pelatihan Masih Kosong!!</h4>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $trainingMembers->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script>
        $('#training-admin').addClass('mm-active')
        $('#training-link-admin').addClass('active')
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `/training-members/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `/training-member-update/${formData['id']}`;
            var gender = formData['gender'];
            console.log(gender);
            if (gender === 'male') {
                $('#update-gender-male').prop('checked', true);
            } else if (gender === 'female') {
                $('#update-gender-female').prop('checked', true);
            }
            $('#form-update').attr('action', actionUrl);
            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
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
