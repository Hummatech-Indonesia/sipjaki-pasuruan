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
                            <th class="text-center table-sipjaki">Kualifikasi</th>
                            <th class="text-center table-sipjaki">Tahun</th>
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
                                    {{ $serviceProviderQualificationPendin->qualification->name }}
                                </td>
                                <td class="text-center">
                                    {{ $serviceProviderQualificationPendin->year }}
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <div class="">
                                            <button type="button"
                                                id="btn-detail-{{ $serviceProviderQualificationPendin->id }}"
                                                data-id="{{ $serviceProviderQualificationPendin->id }}"
                                                data-name="{{ $serviceProviderQualificationPendin->serviceProvider->user->name }}"
                                                data-address="{{ $serviceProviderQualificationPendin->serviceProvider->address ? $serviceProviderQualificationPendin->serviceProvider->address : '-' }}"
                                                data-city="{{ $serviceProviderQualificationPendin->serviceProvider->city ? $serviceProviderQualificationPendin->serviceProvider->city : '-' }}"
                                                data-province="{{ $serviceProviderQualificationPendin->serviceProvider->province ? $serviceProviderQualificationPendin->serviceProvider->province : '-' }}"
                                                data-postal_code="{{ $serviceProviderQualificationPendin->serviceProvider->postal_code ? $serviceProviderQualificationPendin->serviceProvider->postal_code : '-' }}"
                                                data-phone_number="{{ $serviceProviderQualificationPendin->serviceProvider->user->phone_number }}"
                                                data-fax="{{ $serviceProviderQualificationPendin->serviceProvider->fax ? $serviceProviderQualificationPendin->serviceProvider->fax : '-' }}"
                                                data-email="{{ $serviceProviderQualificationPendin->serviceProvider->user->email }}"
                                                data-website="{{ $serviceProviderQualificationPendin->serviceProvider->website ? $serviceProviderQualificationPendin->serviceProvider->website : '-' }}"
                                                data-form_of_business_entity="{{ $serviceProviderQualificationPendin->serviceProvider->form_of_business_entity ? ($serviceProviderQualificationPendin->serviceProvider->form_of_business_entity == 'pt' ? 'PT' : 'CV') : '-' }}"
                                                data-type_of_business_entity="{{ $serviceProviderQualificationPendin->serviceProvider->type_of_business_entity ? ($serviceProviderQualificationPendin->serviceProvider->type_of_business_entity == 'consultant' ? 'Konsultan' : 'Penyelenggara') : '-' }}"
                                                data-sub_classification="{{ $serviceProviderQualificationPendin->subClassification->name }}"
                                                data-code="{{ $serviceProviderQualificationPendin->subClassification->code }}"
                                                data-qualification="{{ $serviceProviderQualificationPendin->qualification->name }}"
                                                data-year="{{ $serviceProviderQualificationPendin->year }}"
                                                data-association="{{ $serviceProviderQualificationPendin->serviceProvider->association->name }}"
                                                data-created_at="{{ Carbon::parse($serviceProviderQualificationPendin->created_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}"
                                                class="btn btn-warning btn-detail">
                                                Detail
                                            </button>
                                        </div>
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
    <div class="modal fade bs-example-modal-md" id="modal-detail" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Detail</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <div class="d-flex">
                            <a class="nav-link active rounded-start" style="border: solid 1px #1B3061;"
                                id="badan-usaha-tab" data-bs-toggle="pill" href="#badan-usaha" role="tab"
                                aria-controls="badan-usaha" aria-selected="true">
                                <div class="fw-bold">Badan Usaha</div>
                            </a>
                            <a class="nav-link" style="border: solid 1px #1B3061;" id="kualifikasi-klasifikasi-tab"
                                data-bs-toggle="pill" href="#kualifikasi-klasifikasi" role="tab"
                                aria-controls="kualifikasi-klasifikasi" aria-selected="false">
                                <div class="fw-bold">Kualifikasi dan Klasifikasi</div>
                            </a>
                        </div>
                    </div>
                    <div class="tab-content mt-3" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="badan-usaha" role="tabpanel"
                            aria-labelledby="badan-usaha-tab">
                            <p class="fw-bolder fs-4" id="detail-name"></p>
                            <table cellpadding="6" style="border-collapse: collapse;" class="fs-6 fw-normal">
                                <tbody>
                                    <tr>
                                        <td>Alamat Badan Usaha</td>
                                        <td>:</td>
                                        <td id="detail-address"></td>
                                    </tr>
                                    <tr>
                                        <td>Kabupaten</td>
                                        <td>:</td>
                                        <td id="detail-city"></td>
                                    </tr>
                                    <tr>
                                        <td>Provinsi</td>
                                        <td>:</td>
                                        <td id="detail-province"></td>
                                    </tr>
                                    <tr>
                                        <td>Kode Pos</td>
                                        <td>:</td>
                                        <td id="detail-postal_code"></td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td id="detail-phone_number"></td>
                                    </tr>
                                    <tr>
                                        <td>Fax</td>
                                        <td>:</td>
                                        <td id="detail-fax"></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td id="detail-email"></td>
                                    </tr>
                                    <tr>
                                        <td>Website</td>
                                        <td>:</td>
                                        <td id="detail-website"></td>
                                    </tr>
                                    <tr>
                                        <td>Bentuk Badan Usaha</td>
                                        <td>:</td>
                                        <td id="detail-form_of_business_entity"></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Badan Usaha</td>
                                        <td>:</td>
                                        <td id="detail-type_of_business_entity"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="kualifikasi-klasifikasi" role="tabpanel"
                            aria-labelledby="kualifikasi-klasifikasi-tab">
                            <p class="fw-bolder fs-4" id="detail-name"></p>
                            <table cellpadding="6" style="border-collapse: collapse;" class="fs-6 fw-normal">
                                <tbody>
                                    <tr>
                                        <td>Sub Bidang Klasifikasi/Layanan</td>
                                        <td>:</td>
                                        <td id="detail-sub_classification"></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Kode</td>
                                        <td>:</td>
                                        <td id="detail-code"></td>
                                    </tr>
                                    <tr>
                                        <td>Kualifikasi</td>
                                        <td>:</td>
                                        <td id="detail-qualification"></td>
                                    </tr>
                                    <tr>
                                        <td>Tahun</td>
                                        <td>:</td>
                                        <td id="detail-year"></td>
                                    </tr>
                                    <tr>
                                        <td>Asosiasi</td>
                                        <td>:</td>
                                        <td id="detail-association"></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Permohonan</td>
                                        <td>:</td>
                                        <td id="detail-created_at"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
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
