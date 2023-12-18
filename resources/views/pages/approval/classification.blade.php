@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <div class="">
        <p class="fs-4 text-dark" style="font-weight: 600">
            Approval
        </p>
    </div>
</div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless" border="1">
                    <thead>
                        <tr>
                            <th class="text-center table-sipjaki">No</th>
                            <th class="text-center table-sipjaki">Nama</th>
                            <th class="text-center table-sipjaki">Sub Bidak klasifikasi</th>
                            <th class="text-center table-sipjaki">Tanggal</th>
                            <th class="text-center table-sipjaki">Kualifikasi</th>
                            <th class="text-center table-sipjaki">Tahun</th>
                            <th class="text-center table-sipjaki">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                1
                            </td>
                            <td class="text-center">
                                Kader
                            </td>
                            <td class="text-center">
                                Pelatihan
                            </td>
                            <td class="text-center">
                                12 januari 2023
                            </td>
                            <td class="text-center">
                                kepergian
                            </td>
                            <td class="text-center">
                                2023
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-centerp gap-2">
                                    <div class="">
                                        <button class="btn btn-danger">
                                            Tolak
                                        </button>
                                    </div>
                                    <div class="">
                                        <button class="btn text-white" style="background-color: #1B3061">
                                            Terima
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
