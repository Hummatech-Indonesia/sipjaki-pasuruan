@extends('layouts.app')
@section('content')
    <h3 class="mb-3">
        Detail Asosiasi
    </h3>
    <div class="d-flex justify-content-end mb-3">
        
        <div>
            <a href="{{ route('associations.index') }}" class="btn btn-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
                    <path
                        d="M0.292892 7.29289C-0.0976315 7.68342 -0.0976315 8.31658 0.292892 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292892 7.29289ZM20 7L1 7V9L20 9V7Z"
                        fill="white" />
                </svg>
                Kembali
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="badge bg-light text-info">
                <p class="mb-0 px-3 py-1 fs-6">
                    Profil Asosiasi
                </p>
            </div>
            <h5 class="mt-4 text-dark" style="font-weight: 700">
                {{ $association->name }}
            </h5>
            <table cellpadding="8" style="border-collapse: collapse;width:35%;" class="fs-6 fw-normal">
                <tbody>
                    <tr>
                        <td class="fw-bold">Email</td>
                        <td>:</td>
                        <td id="detail-project_value">
                            {{ $association->email }}
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Telepon</td>
                        <td>:</td>
                        <td id="detail-physical_progress">{{ $association->phone_number }}</td>
                    </tr>

                    <tr>
                        <td class="fw-bold">Alamat</td>
                        <td>:</td>
                        <td id="detail-finance_progress">{{ $association->address }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Kode Post</td>
                        <td>:</td>
                        <td id="detail-finance_progress">{{ $association->postal_code }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Kota / Kab</td>
                        <td>:</td>
                        <td id="detail-status">
                            {{ $association->city }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="badge bg-light text-info">
                <p class="mb-0 px-3 py-1 fs-6">
                    Ketua Asosiasi
                </p>
            </div>
            <h5 class="mt-4 text-dark" style="font-weight: 700">
                {{ $association->leader }}
            </h5>
            <table cellpadding="7" style="border-collapse: collapse;width:35%;" class="fs-6 fw-normal">
                <tbody>
                    <tr>
                        <td class="fw-bold">Email</td>
                        <td>:</td>
                        <td id="detail-project_value">
                            {{ $association->email_leader }}
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Telepon</td>
                        <td>:</td>
                        <td id="detail-physical_progress">
                            {{ $association->phone_number_leader }}
                        </td>
                    </tr>

                    <tr>
                        <td class="fw-bold">Alamat</td>
                        <td>:</td>
                        <td id="detail-finance_progress">
                            {{ $association->address_leader }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
<script>
    $('#master').addClass('active')
        $('#master .sub-menu').addClass('mm-show')
        $('#master-link').addClass('mm-active')
        $('#jasa').addClass('mm-active')
        $('#jasa-link').addClass('mm-active')
        $('#jasa .sub-menu').addClass('mm-show');
        $('#assosiasi').addClass('mm-active')
        $('#assosiasi-link').addClass('active')
</script>
@endsection
