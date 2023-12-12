@extends('layouts.app')
@section('content')
    <h4 class="mb-3 font-size-18">Detail Progress</h4>
    <div class="d-flex justify-content-between mb-3">
        <div class="d-flex position-relative">
            <div class="btn btn-success btn-md rounded-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="15" height="15" viewBox="0 0 24 24"
                    fill="none">
                    <path
                        d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>Export
            </div>
        </div>

        <div>
            <button class="btn btn-warning btn-md rounded-3">
                <i class="fas fa-arrow-left" style="margin-right:10px"></i>Kembali
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="btn btn-sm mb-2 text-dark rounded-3" style="background-color: #E4ECFF;">
                                2023
                            </div>
                            <p class="fw-bolder fs-5">PJL Kel. Purwosari Kec. Purwosari</p>
                            <table cellpadding="10" style="border-collapse: collapse; width: 100%;">
                                <tbody>
                                    <tr>
                                        <td width="120">Tanggal Mulai</td>
                                        <td>:</td>
                                        <td>08-05-2023</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Akhir</td>
                                        <td>:</td>
                                        <td>18-05-2023</td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td colspan="2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                            eu scelerisque felis. Maecenas dolor tortor, tincidunt suscipit egestas quis,
                                            fermentum non lacus. Praesent venenatis placerat lectus. Pellentesque at massa
                                            in dui feugiat pretium. Fusce vulputate auctor tempus. Cras luctus ac risus
                                            volutpat porttitor. Donec convallis lobortis tellus, eu feugiat risus vestibulum
                                            nec. Cras at ex volutpat quam euismod dignissim ut vel mauris. Suspendisse</td>
                                    </tr>
                                    <tr>
                                        <td>File</td>
                                        <td>:</td>
                                        <td colspan="2">
                                            <div class="btn btn-sm rounded-3"
                                                style="background-color: #1B3061; color: white;">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="15"
                                                    height="15" viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12 15V3" stroke="white" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>Download File
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
