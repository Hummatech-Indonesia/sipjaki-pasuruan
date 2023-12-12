@extends('layouts.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form method="PUT" action="{{ route('dinas.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Pilih Tipe</label>
                                    <select id="formrow-inputState" class="form-select">
                                        <option disabled selected>Choose...</option>
                                        <option>A++</option>
                                        <option>B++</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Nama Bidang</label>

                                    <select class="select2 form-control select2-multiple" multiple="multiple"
                                        data-placeholder="Choose ...">
                                        <optgroup label="Pilih Nama Bidang">
                                            @foreach ($fields as $field)
                                                    <option value="{{ $field->id }}">{{ $field->name }}
                                                    </option>
                                                @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Nama Saksi</label>

                                    <select class="select2 form-control select2-multiple" multiple="multiple"
                                        data-placeholder="Choose ...">
                                        <optgroup label="Pilih Nama Saksi">
                                            @foreach ($sections as $section)
                                                    <option value="{{ $section->id }}">{{ $section->name }}
                                                    </option>
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
                                        <textarea rows="4" required class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No Telp</label>
                                    <div>
                                        <input data-parsley-type="number" type="text" class="form-control" required
                                            placeholder="Enter only numbers" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <div>
                                        <input type="email" class="form-control" required parsley-type="email"
                                            placeholder="Enter a valid e-mail" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Penjabat</label>
                                    <div>
                                        <input type="text" class="form-control" required
                                            placeholder="Enter your name" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Eseleon</label>
                                    <div>
                                        <input type="text" class="form-control" required
                                            placeholder="Enter your eselon" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Jabatan</label>
                                    <div>
                                        <input type="text" class="form-control" required
                                            placeholder="Enter your name" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email Penjabat</label>
                                    <div>
                                        <input type="text" class="form-control" required
                                            placeholder="Enter your eselon" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No Hp</label>
                                    <div>
                                        <input type="number" class="form-control" required
                                            placeholder="Enter your no Hp" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No Perda</label>
                                    <div>
                                        <input type="text" class="form-control" required
                                            placeholder="Enter your Number" />
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
                                            <input class="form-check-input" type="radio" name="formRadios"
                                                id="formRadios1" checked>
                                            <label class="form-check-label" for="formRadios1">
                                                Ada
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="formRadios"
                                                id="formRadios2" checked>
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
                                            <input class="form-check-input" type="radio" name="formRadios"
                                                id="formRadios1" checked>
                                            <label class="form-check-label" for="formRadios1">
                                                Ada
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="formRadios"
                                                id="formRadios2" checked>
                                            <label class="form-check-label" for="formRadios2">
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
                                            <input class="form-check-input" type="radio" name="formRadios"
                                                id="formRadios1" checked>
                                            <label class="form-check-label" for="formRadios1">
                                                Ada
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="formRadios"
                                                id="formRadios2" checked>
                                            <label class="form-check-label" for="formRadios2">
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
                                        <input type="number" class="form-control" required
                                            placeholder="Enter your no Hp" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No Sk Sipjaki</label>
                                    <div>
                                        <input type="number" class="form-control" required
                                            placeholder="Enter your Number" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn w-md mx-1 rounded-3" style="background-color: #1B3061; color:white">Batal</button>
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
