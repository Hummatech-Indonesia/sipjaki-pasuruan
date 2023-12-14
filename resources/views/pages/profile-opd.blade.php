@extends('layouts.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
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
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('dinas.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Pilih Tipe</label>
                                    <select id="formrow-inputState" name="type_id" class="form-select">
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Nama Seksi</label>
                                    <select id="formrow-inputState" name="section_id" class="form-select">
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Nama Bidang</label>
                                    <select class="select2 form-control select2-multiple" name="field_id[]"
                                        multiple="multiple" data-placeholder="Choose ...">
                                        <optgroup label="Pilih Nama Seksi">
                                            @foreach ($fields as $field)
                                                <option value="{{ $field->id }}">{{ $field->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <div>
                                        <textarea rows="4" name="address" class="form-control" rows="3">{{ old('address') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No Telp</label>
                                    <div>
                                        <input type="number" name="mobile_phone_number" type="text" class="form-control"
                                            placeholder="Masukkan No Telepon" value="{{ old('mobile_phone_number') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Eseleon</label>
                                    <div>
                                        <input type="text" class="form-control" value="{{ old('echelon') }}"
                                            name="echelon" placeholder="Masukkan Eseleon" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Penjabat</label>
                                    <div>
                                        <input type="text" name="name_official" value="{{ old('name_official') }}"
                                            class="form-control" placeholder="Masukkan Nama Penjabat" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <div>
                                        <input type="email" name="email_official" value="{{ old('email_official') }}"
                                            class="form-control" placeholder="Masukkan Eseleon" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Jabatan</label>
                                    <div>
                                        <input type="text" name="position" value="{{ old('position') }}"
                                            class="form-control" placeholder="Masukkan Jabatan" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Perda</label>
                                    <div>
                                        <input type="text" name="local_regulation" value="{{ old('local_regulation') }}"
                                            class="form-control" placeholder="Masukkan Email Penjabat" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">No Perda</label>
                                    <div>
                                        <input type="number" name="number_local_regulation"
                                            value="{{ old('number_local_regulation') }}" class="form-control"
                                            placeholder="Masukkan No Perda" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">No Hp</label>
                                    <div class="d-flex flex-row gap-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" value="1" type="radio"
                                                name="the_phone_number" id="formRadios1">
                                            <label class="form-check-label" for="formRadios1">
                                                Ada
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" value="0" type="radio"
                                                name="the_phone_number" id="formRadios2">
                                            <label class="form-check-label" for="formRadios2">
                                                Tidak Ada
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Admin Sipjaki</label>
                                    <div class="d-flex flex-row gap-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" value="1" type="radio"
                                                name="admin_sipjaki" id="formAdminSipJaki">
                                            <label class="form-check-label" for="formAdminSipJaki">
                                                Ada
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" value="0" type="radio"
                                                name="admin_sipjaki" id="formAdminSipJaki2">
                                            <label class="form-check-label" for="formAdminSipJaki2">
                                                Tidak Ada
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Sk Tpjk</label>
                                    <div class="d-flex flex-row gap-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="sk_tpjk"
                                                id="Formsk_tpjk" value="1">
                                            <label class="form-check-label" for="formRadios2">
                                                Ada
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" value="0" name="sk_tpjk"
                                                id="Formsk_tpjk2">
                                            <label class="form-check-label" for="Formsk_tpjk2">
                                                Tidak Ada
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No Sk Tpjk</label>
                                    <div>
                                        <input type="number" value="{{ old('number_sk_tpjk') }}" name="number_sk_tpjk"
                                            class="form-control" placeholder="Masukkan No Sk Tpjk" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No Sk Sipjaki</label>
                                    <div>
                                        <input type="number" value="{{ old('number_sk_sipjaki') }}"
                                            name="number_sk_sipjaki" class="form-control"
                                            placeholder="Masukkan No Sk Sipjaki" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Aktivitas</label>
                                    <div>
                                        <input type="text" name="activity" value="{{ old('activity') }}"
                                            class="form-control" placeholder="Masukkan No Sk Tpjk" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Anggaran Tahun Lalu</label>
                                    <div>
                                        <input type="number" value="{{ old('last_year_budget') }}"
                                            name="last_year_budget" class="form-control"
                                            placeholder="Masukkan No Sk Sipjaki" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Struktur Organisasi</label>
                                    <div>
                                        <input type="file" name="sturucture_organization_file" class="form-control"
                                            placeholder="Masukkan No Sk Tpjk" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Anggaran</label>
                                    <div>
                                        <input type="number" value="{{ old('budget_this_year') }}"
                                            name="budget_this_year" class="form-control"
                                            placeholder="Masukkan No Sk Sipjaki" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn w-md mx-1 rounded-3"
                                style="background-color: #1B3061; color:white">Batal</button>
                            <button type="submit" class="btn btn-success w-md mx-1 text-white rounded-3">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
@endsection
