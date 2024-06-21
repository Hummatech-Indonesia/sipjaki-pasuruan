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
                            <th class="text-center table-sipjaki">Nama</th>
                            <th class="text-center table-sipjaki">Tanggal</th>
                            <th class="text-center table-sipjaki">Kode Klasifikasi</th>
                            <th class="text-center table-sipjaki">Kualifikasi</th>
                            <th class="text-center table-sipjaki">File</th>
                            <th class="text-center table-sipjaki">Tahun Terbit</th>
                            <th class="text-center table-sipjaki">Berlaku Sampai</th>
                            <th class="text-center table-sipjaki">Aksi</th>
                        </tr>
                    </thead>
                    @forelse ($serviceProviderQualificationPending as $index=>$serviceProviderQualificationPendin)
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    {{ $index + 1 }}
                                </td>
                                <td class="text-center">
                                    {{ $serviceProviderQualificationPendin->serviceProvider->user->name }}
                                </td>
                                <td class="text-center">
                                    {{ $serviceProviderQualificationPendin->created_at->format('j F Y') }} </td>
                                <td class="text-center">
                                    {{ $serviceProviderQualificationPendin->subClassification->code }}
                                </td>
                                <td class="text-center">
                                    {{ $serviceProviderQualificationPendin->qualification->name }}
                                </td>
                                <td class="text-center">
                                    <a href="detail-service-provider-qualification-pending/{{ $serviceProviderQualificationPendin->id }}"
                                        class="btn text-white" style="background-color: #1B3061">Detail</a>
                                </td>
                                <td class="text-center">
                                    {{ $serviceProviderQualificationPendin->year }}
                                </td>
                                <td class="text-center">
                                    {{ $serviceProviderQualificationPendin->expired_at->format('j F Y') }} </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        {{-- <div class="">
                                            <a href="{{ route('qualification.detail.pending') }}">
                                                <button type="button"
                                                    class="btn btn-warning btn-detail">
                                                    Detail
                                                </button>
                                            </a>
                                        </div> --}}
                                        <div class="">
                                            <button type="button" id="{{ $serviceProviderQualificationPendin->id }}"
                                                data-id="{{ $serviceProviderQualificationPendin->id }}"
                                                class="btn btn-danger btn-reject">
                                                Tolak
                                            </button>
                                        </div>
                                        <div class="">
                                            <form id="approval-form"
                                                action="approve-service-provider-qualifications/{{ $serviceProviderQualificationPendin->id }}"
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
                                        <h4 class="text-center mt-4">Belum ada permintaan!!</h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
    {{-- modal  --}}
    <div class="modal fade bs-example-modal-md" id="modal-reject" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tolak Kualifikasi</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="form-reject" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <form action="" method="post">
                            @csrf
                            @method('PATCH')
                            <label for="">
                                Alasan
                            </label>
                            <textarea name="resend" id="" class="form-control" name="resend"></textarea>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <div class="d-flex justify-content-header gap-2">
                                <div class="">
                                    <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Tutup</button>
                                </div>
                                <div class="">
                                    <button class="btn text-white" type="submit" style="background-color: #1B3061">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @error('resend')
                    <p>
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
    </div>

    {{-- end modal  --}}
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
        $('.btn-detail').click(function() {
            const data = getDataAttributes($(this).attr('id'))
            handleDetail(data)
            $('#modal-detail').modal('show')
        })
        $('.btn-reject').click(function() {
            id = $(this).data('id')
            var actionUrl = `reject-service-provider-qualifications/${id}`;
            $('#form-reject').attr('action', actionUrl);
            $('#modal-reject').modal('show')
        })
        document.getElementById('approval-form').addEventListener('submit', function(e) {
            e.preventDefault();
            swal({
                title: 'Konfirmasi',
                text: 'Anda yakin ingin menyetujui kualifikasi penyedia layanan ini?',
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
