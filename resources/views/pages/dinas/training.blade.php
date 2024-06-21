@extends('layouts.app')
@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('
                        success ') }}',
            });
        </script>
    @endif
    <div class="d-flex justify-content-between mb-3">
        <div class="fs-4 text-dark" style="font-weight: 600">
            Pelatihan
        </div>
    </div>
    <div class="d-flex justify-content-between mb-3">
        <form action="{{ route('training') }}" class="d-flex gap-3 col-8" method="GET">
            <input type="search" value="{{ request()->name }}" name="name" class="form-control" placeholder="Search">
            <select name="fiscal_year_id" class="form-control ml-3" id="">
                <option value="">Semua Tahun</option>
                @foreach ($fiscalYears as $fiscalYear)
                    <option {{ $year == $fiscalYear->id ? 'selected' : '' }} value="{{ $fiscalYear->id }}">
                        {{ $fiscalYear->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn text-white d-flex items-center gap-2" style="background-color:#1B3061">
                Cari <i class="fa fa-search my-auto"></i>
            </button>
            <a href="/print-training" class="btn btn-danger d-flex items-center gap-2">
                PDF<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="white"
                        d="m23 12l-4-4v3h-9v2h9v3M1 18V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3h-2V6H3v12h12v-3h2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2Z" />
                </svg>
                </i>
            </a>
            <a href="/training-export" class="btn btn-success d-flex items-center gap-2">
                Excel<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="white"
                        d="m23 12l-4-4v3h-9v2h9v3M1 18V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3h-2V6H3v12h12v-3h2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2Z" />
                </svg>
                </i>
            </a>
        </form>
        <div class="">
            <button data-bs-toggle="modal" data-bs-target="#modal-create" class="btn text-white"
                style="background-color:#1B3061">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                        fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                        fill="white" />
                </svg>Tambah
            </button>
        </div>
    </div>
    <div class="modal fade " id="modal-create" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Pelatihan</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <form action="{{ route('training.store') }}" id="form-create" method="post">
                        @csrf
                        @method('POST')
                        <div id="basic-example">
                            <!-- Seller Details -->
                            <h3>Step 1</h3>
                            <section>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Tahun Anggaran</label>
                                            <select name="fiscal_year_id" class="form-select select2-create"
                                                style="width:100%" id="list-fiscal-year">
                                                <option value="">pilih Tahun anggaran</option>
                                            </select>
                                            @error('fiscal_year_id')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Nama</label>
                                            <input name="name" type="text" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Masukkan Nama"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Penyelenggara</label>
                                            <input name="organizer" type="text" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Masukkan Nama Penyelenggara"
                                                value="{{ old('organizer') }}">
                                            @error('organizer')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Sumber Dana</label>
                                            <select name="fund_source_id" class="form-select  founds-source"
                                                id="" value="{{ old('fund_source_id') }}">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-phoneno-input">Kualifikasi Pelatihan</label>
                                            <select name="qualification_training_id"
                                                class="form-select list-qualifications select2-create" style="width:100%"
                                                id="list-qualifications" value="{{ old('qualification_training_id') }}">
                                                <option value="">Pilih Kualifikasi</option>
                                            </select>
                                            @error('qualification_training_id')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Tingkat Pelatihan</label>
                                            <select name="qualification_level_training_id"
                                                class="form-select select2-create" style="width:100%"
                                                id="list-qualification-level"
                                                value="{{ old('qualification_level_training_id') }}">
                                            </select>
                                            @error('qualification_level_training_id')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Klasifikasi</label>
                                            <select name="" class="form-select list-classifications select2-create"
                                                style="width:100%" id="list-classifications"
                                                value="{{ old('qualification_training_id') }}">
                                                <option value="">Pilih klasifikasi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Sub Klasifikasi</label>
                                            <select name="sub_classification_training_id"
                                                class="form-select sub-classifications select2-create" style="width:100%"
                                                id="list-sub-classifications"
                                                value="{{ old('sub_classification_training_id') }}">
                                            </select>
                                            @error('sub_classification_training_id')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Company Document -->
                            <h3>Step 2</h3>
                            <section>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-phoneno-input">Waktu Pelaksanaan</label>
                                            <input name="start_at" type="date" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Enter Your Name."
                                                value="{{ old('start_at') }}">
                                            @error('start_at')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Selesai Pelaksanaan</label>
                                            <input name="end_time" type="date" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Enter Your Name."
                                                value="{{ old('end_time') }}">
                                            @error('end_time')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Jam Pelajaran</label>
                                            <input type="number" name="lesson_hour" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Masukkan Jam pelajaran"
                                                value="{{ old('lesson_hour') }}">
                                            @error('lesson_hour')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Metode Pelatihan</label>
                                            <select name="training_method_id" class="form-select select2-create"
                                                style="width:100%" id="list-training-method">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="basicpill-lastname-input">Lokasi</label>
                                        <textarea name="location" id="" class="form-control">{{ old('location') }}</textarea>
                                        @error('location')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="basicpill-lastname-input">Keterangan</label>
                                        <textarea name="description" id="" class="form-control">{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Edit Pelatihan</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <form id="form-update" method="post">
                        @csrf
                        @method('PUT')
                        <div id="basic-update">
                            <!-- Seller Details -->
                            <h3>Data 1</h3>
                            <section>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Tahun Anggaran</label>
                                            <select name="fiscal_year_id" class="form-select select2-update"
                                                style="width:100%" id="update-list-fiscal-year">
                                                <option value="">Pilih Tahun Anggaran</option>
                                            </select>
                                            @error('fiscal_year_id')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Nama</label>
                                            <input name="name" type="text" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Enter Your Name.">
                                            @error('name')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Penyelenggara</label>
                                            <input name="organizer" type="text" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Enter Your Name.">
                                            @error('organizer')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Sumber Dana</label>
                                            <select name="fund_source_id" class="form-select founds-source"
                                                value="{{ old('fund_source_id') }}" id="">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-phoneno-input">Kualifikasi</label>
                                            <select name="qualification_training_id"
                                                class="form-select list-qualifications select2-update" style="width:100%"
                                                id="update-list-qualifications">
                                                <option value="">Pilih Kualifikasi</option>
                                            </select>
                                            @error('qualification_training_id')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Jenjang KKNI</label>
                                            <select name="qualification_level_training_id"
                                                class="form-select list-qualification-level select2-update"
                                                style="width:100%" id="update-list-qualification-level">
                                            </select>
                                            @error('qualification_level_training_id')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Klasifikasi</label>
                                            <select name="klasifikasi"
                                                class="form-select list-classifications select2-update" style="width:100%"
                                                id="update-list-classifications">
                                                <option value="">Pilih Klalifikasi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Sub Klasifikasi</label>
                                            <select name="sub_classification_training_id"
                                                class="form-select sub-classifications select2-update" style="width:100%"
                                                id="update-list-sub-classifications">
                                            </select>
                                            @error('sub_classification_training_id')
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
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-phoneno-input">Waktu Pelaksanaan</label>
                                            <input name="start_at" type="date" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Enter Your Name.">
                                            @error('start_at')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Selesai Pelaksanaan</label>
                                            <input name="end_time" type="date" class="form-control"
                                                id="update-end_time" placeholder="Enter Your Name.">
                                            @error('end_time')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Jam Pelajaran</label>
                                            <input type="text" name="lesson_hour" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Enter Your Name.">
                                            @error('lesson_hour')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Metode Pelatihan</label>
                                            <select name="training_method_id" class="form-select select2-update"
                                                style="width:100%" id="update-list-training-method">
                                                <option value="">Pilih Metode Pelatihan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="basicpill-lastname-input">Lokasi</label>
                                        <textarea name="location" id="" class="form-control"></textarea>
                                        @error('location')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="basicpill-lastname-input">Keterangan</label>
                                        <textarea name="description" id="" class="form-control"></textarea>
                                        @error('description')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible mt-3 fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
    <div class="table-responsive">
        <table class="table table-borderless" border="1">
            <thead>
                <tr>
                    <th class="text-center table-sipjaki">No</th>
                    <th class="text-center table-sipjaki">Nama</th>
                    <th class="text-center table-sipjaki">Tahun</th>
                    <th class="text-center table-sipjaki">Keterangan</th>
                    <th class="text-center table-sipjaki">Aksi</th>
                </tr>
            </thead>
            @forelse ($trainings as $index=>$training)
                <tbody>
                    <tr>
                        <td class="text-center">
                            {{ $index + 1 }}
                        </td>
                        <td class="text-center">
                            {{ $training->name }}
                        </td>
                        <td class="text-center">
                            {{ $training->fiscalYear->name }}
                        </td>
                        <td class="text-center">
                            {{ $training->description }}
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-3">
                                <div class="">
                                    <button class="btn btn-danger btn-delete" data-id="{{ $training->id }}">
                                        Hapus
                                    </button>
                                </div>
                                <div class="">
                                    <button class="btn btn-warning btn-edit" id="btn-edit-{{ $training->id }}"
                                        data-fund_source_id="{{ $training->fund_source_id }}"
                                        data-fiscal_year_id="{{ $training->fiscal_year_id }}"
                                        data-id="{{ $training->id }}" data-name="{{ $training->name }}"
                                        data-lesson_hour="{{ $training->lesson_hour }}"
                                        data-organizer="{{ $training->organizer }}"
                                        data-sub_classification_training_id="{{ $training->subClassificationTraining->id }}"
                                        data-klasifikasi="{{ $training->subClassificationTraining->classificationTraining->id }}"
                                        data-start_at="{{ \Carbon\Carbon::parse($training->start_at)->format('Y-m-d') }}"
                                        data-end_time="{{ \Carbon\Carbon::parse($training->end_time)->format('Y-m-d') }}"
                                        data-sub_classification_id="{{ $training->sub_classification_id }}"
                                        data-training_method_id="{{ $training->training_method_id }}"
                                        data-qualification_training_id="{{ $training->qualification_training_id }}"
                                        data-location="{{ $training->location }}"
                                        data-description="{{ $training->description }}">
                                        Edit
                                    </button>
                                </div>
                                <div class="">
                                    <a href="training-members/{{ $training->id }}" class="btn text-white"
                                        style="background-color: #1B3061">
                                        Detail
                                    </a>
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
                                <h4 class="text-center mt-4">Pelatihan Masih Kosong!!</h4>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforelse
        </table>
        {{ $trainings->links('pagination::bootstrap-5') }}
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script>
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `training.destroy/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
        $(document).ready(function() {
            $(".select2-create").select2({
                dropdownParent: $("#modal-create")
            });
            $(".select2-update").select2({
                dropdownParent: $("#modal-update")
            });
        });

        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `training.update/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);
            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })

        get();
        getFoundSource()
        training_method_id()

        function getFoundSource() {
            $.ajax({
                url: "{{ route('list-fund-source') }}",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = $('<option>');
                        option.val(item.id);
                        option.text(item.name);
                        $('.founds-source').append(option);
                    });
                }
            });
        }

        function get() {
            $.ajax({
                url: "json-classification-training",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#update-list-classifications').append(option);
                        $('#list-classifications').append(option);
                    });
                    $('#list-classifications').change(function() {
                        var selectedClassificationId = $(this).val();
                        if (selectedClassificationId !== '') {
                            subclassifications(
                                selectedClassificationId
                            );
                        }
                    });
                    $('#update-list-classifications').change(function() {
                        var selectedClassificationId = $(this).val();
                        if (selectedClassificationId !== '') {
                            subclassifications(
                                selectedClassificationId
                            );
                        }
                    });
                }
            });
        }
        function subclassifications(classificationId) {
            $.ajax({
                url: "json-sub-classification-training/" + classificationId,
                type: 'GET',
                dataType: "JSON",
                beforeSend:function(){
                    $('#list-sub-classifications').empty().trigger('change');
                    $('#update-list-sub-classifications').empty().trigger('change');
                },
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#list-sub-classifications').append(option);
                        $('#update-list-sub-classifications').append(option);
                    });
                }
            });
        }
        function qualifications() {
            $.ajax({
                url: "list-qualification-training",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`

                        $('#list-qualifications').append(option);
                        $('#update-list-qualifications').append(option);
                    });
                    $('#list-qualifications').change(function() {
                        var selectedClassificationId = $(this).val();
                        $('#list-qualification-level')
                        $('#update-list-qualification-level')
                            .empty();
                        if (selectedClassificationId !== '') {
                            listqualificationlevel(
                                selectedClassificationId
                            );
                        }
                    });
                    $('#update-list-qualifications').change(function() {
                        var selectedClassificationId = $(this).val();
                        $('#list-qualification-level')
                        $('#update-list-qualification-level')
                            .empty();
                        if (selectedClassificationId !== '') {
                            listqualificationlevel(
                                selectedClassificationId
                            );
                        }
                    });
                }
            });
        }
        function listqualificationlevel(classificationId) {
            $.ajax({
                url: "json-qualification-level-training/" + classificationId,
                type: 'GET',
                dataType: "JSON",
                beforeSend: function() {
                    $('#list-qualification-level').empty().trigger('change');
                    $('#update-list-qualification-level').empty().trigger('change');
                },
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#list-qualification-level').append(option);
                        $('#update-list-qualification-level').append(option);
                    });
                }
            });
        }


        function training_method_id() {
            $.ajax({
                url: "{{ route('list-training-method') }}",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#list-training-method').append(option);
                        $('#update-list-training-method').append(option);
                    });

                    $('#update-list-training-method').val(fiscalYearId).trigger('change');
                }
            });
        }

        qualifications()

      
        listfiscalyear();

        function listfiscalyear() {
            $.ajax({
                url: "{{ route('list-fiscal-year') }}",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`;
                        $('#update-list-fiscal-year').append(option);
                        $('#list-fiscal-year').append(option);

                    });
                    // Mengatur nilai fiscal_year_id pada elemen select2
                    $('#update-list-fiscal-year').val(fiscalYearId).trigger('change');
                }
            });
        }
    </script>
@endsection
