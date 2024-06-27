@extends('layouts.app')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
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
                            <th class="text-center table-sipjaki">Nama Badan Usaha</th>
                            <th class="text-center table-sipjaki">Email</th>
                            <th class="text-center table-sipjaki">Asosiasi</th>
                            <th class="text-center table-sipjaki">Jenis</th>
                            <th class="text-center table-sipjaki">Aksi</th>
                        </tr>
                    </thead>
                    @forelse ($users as $user)
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    {{ $user->name }}
                                </td>
                                <td class="text-center">
                                    {{ $user->email }} </td>
                                <td class="text-center">
                                    {{ $user->serviceProvider->association->name }}
                                </td>
                                <td class="text-center">
                                    {{ $user->serviceProvider->type_of_business_entity == 'executor' ? 'Pelaksana' : 'Konsultan' }}
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <div class="">
                                            <form method="post" id="delete-form"
                                                action="{{ route('service-provider.destroy', ['service_provider' => $user->serviceProvider->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-reject">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                        <div class="">
                                            <form id="approval-form" action="approve-registration/{{ $user->id }}"
                                                method="post">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn text-white"
                                                    style="background-color: #1B3061">
                                                    Terima
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                <div class="d-flex justify-content-center" style="min-height:16rem">
                                    <div class="my-auto">
                                        <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                        <h4 class="text-center mt-4">Tidak ada pendaftar yang perlu diverifikasi!!</h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    <script>
        $('#approval .sub-menu').addClass('mm-show')

        $('.btn-detail').click(function() {
            const data = getDataAttributes($(this).attr('id'))
            handleDetail(data)
            $('#modal-detail').modal('show')
        })
        document.getElementById('approval-form').addEventListener('submit', function(e) {
            e.preventDefault();
            swal({
                title: 'Konfirmasi',
                text: 'Anda yakin ingin menverifikasi pendaftar ini?',
                icon: 'warning',
                buttons: ['Batal', 'Ya'],
            }).then(function(result) {
                if (result) {
                    e.target.submit();
                }
            });
        });

        document.getElementById('delete-form').addEventListener('submit', function(e) {
            e.preventDefault();
            swal({
                title: 'Konfirmasi',
                text: 'Anda yakin ingin menghapus pendaftar ini?',
                icon: 'warning',
                buttons: ['Batal', 'Ya'],
            }).then(function(result) {
                if (result) {
                    e.target.submit();
                }
            });
        });
    </script>
@endsection
