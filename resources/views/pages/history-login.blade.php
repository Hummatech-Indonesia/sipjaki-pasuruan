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
    <h2 class="mb-3">History Login</h2>
    <div class="card">
        <div class="card-body">
            <div class="d-flex gap-4">
                <div class="position-relative mb-3 col-lg-3">
                    <input type="search" class="form-control search-chat py-2 ps-5" id="search-name" placeholder="Search">
                    <i
                        class="bx bx-search-alt-2
                position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
                <div>
                    <button class="btn btn-success"><i class="bx bx-download" style="margin-right:10px"></i>Export</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="table-sipjaki">Nama</th>
                            <th class="table-sipjaki">Tanggal</th>
                            <th class="table-sipjaki">Jam</th>
                            <th class="table-sipjaki">Alamat Ip</th>
                            <th class="table-sipjaki">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p>CAHYO Fajar Rahmanto</p>
                            </td>
                            <td>
                                <p>22-12-2023</p>
                            </td>
                            <td>
                                <p>13:00 WIB</p>
                            </td>
                            <td>
                                <p>192.55448487823.22</p>
                            </td>
                            <td>
                                <span class="badge bg-danger">Logout</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>CAHYO Fajar Rahmanto</p>
                            </td>
                            <td>
                                <p>22-12-2023</p>
                            </td>
                            <td>
                                <p>13:00 WIB</p>
                            </td>
                            <td>
                                <p>192.55448487823.22</p>
                            </td>
                            <td>
                                <span class="badge bg-primary">Login</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>CAHYO Fajar Rahmanto</p>
                            </td>
                            <td>
                                <p>22-12-2023</p>
                            </td>
                            <td>
                                <p>13:00 WIB</p>
                            </td>
                            <td>
                                <p>192.55448487823.22</p>
                            </td>
                            <td>
                                <span class="badge bg-primary">Login</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-delete-modal-component />
@endsection
