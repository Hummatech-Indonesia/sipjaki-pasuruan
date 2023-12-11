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
                            <th class="table-sipjaki">No</th>
                            <th class="table-sipjaki">Nama</th>
                            <th class="table-sipjaki">Waktu</th>
                            <th class="table-sipjaki">Alamat Ip</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($histories as $history)
                        <tr>
                            <td>
                                <p>{{$loop->iteration}}</p>
                            </td>
                            <td>
                                <p>{{$history->user->name}}</p>
                            </td>
                            <td>
                                <p>{{$history->created_at}}</p>
                            </td>
                            <td>
                                <p>{{$history->ip_address}}</p>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    <div class="d-flex justify-content-center" style="min-height:16rem">
                                        <div class="my-auto">
                                            <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                            <h4 class="text-center mt-4">History Login Kosong!!</h4>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-delete-modal-component />
@endsection
