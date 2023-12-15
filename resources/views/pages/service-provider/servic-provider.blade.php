@extends('layouts.app')
@section('content')
    <h4 style="font-weight:800" class="text-dark mb-4">
        Penyedia Jasa
    </h4>
    <div class="card">
        <div class="card-body">
            <p class="fs-5 " style="font-weight: 600">
                Berikut daftar Penyedia Jasa
            </p>
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-header gap-3">
                    <div class="">
                        <div class="input-group">
                            <input name="name" type="text" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn text-white" style="background-color: #1B3061; border-radius: 0 5px 5px 0;"
                                    type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <button class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            Export
                        </button>
                    </div>
                </div>
            </div>
            <div class="table-responsive mt-4">
                <table class="table">
                    <tr>
                        <td class="text-white" style="background-color: #1B3061">
                            No
                        </td>
                        <td class="text-white" style="background-color: #1B3061">
                            Nama Jasa
                        </td>
                        <td class="text-white" style="background-color: #1B3061">
                            Email
                        </td>
                        <td class="text-white" style="background-color: #1B3061">
                            Asosiasi
                        </td>
                        <td class="text-white" style="background-color: #1B3061">
                            No Telp
                        </td>
                        <td class="text-white" style="background-color: #1B3061">
                            Aksi
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
