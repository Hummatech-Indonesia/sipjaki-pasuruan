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
            <form action="" class="d-flex gap-4">
                <div class="position-relative mb-3 col-lg-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn text-white" style="background-color: #1B3061; border-radius: 0 5px 5px 0;" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
            </form>
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
                                <p>{{$history->created_at->isoFormat('Do MMMM YYYY HH:mm', 'ID')}}</p>
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
                                            <h4 class="text-center mt-4">History Login {{$name ? 'Tidak Ditemukan!' : 'Kosong!'}}!!</h4>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$histories->links('pagination::bootstrap-5')}}
            </div>
        </div>
    </div>
    <x-delete-modal-component />
@endsection
