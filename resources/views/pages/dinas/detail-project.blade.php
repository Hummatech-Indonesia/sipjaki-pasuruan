@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4">
        <div class="">
            <h3 class="text-dark" style="font-weight:600">
                Detail Pekerjaan
            </h3>
        </div>
        <div class="">
            <a href="/projects" class="btn text-white" style="background-color: #1B3061">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 16" fill="none">
                    <path
                        d="M0.292892 7.29289C-0.0976315 7.68342 -0.0976315 8.31658 0.292892 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292892 7.29289ZM20 7L1 7V9L20 9V7Z"
                        fill="white" />
                </svg> &nbsp;Kembali
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="badge bg-light text-info">
                <p class="mb-0 px-3 py-1 fs-6">
                    {{ $project->year }}
                </p>
            </div>
            <h5 class="mt-4 text-dark" style="font-weight: 700">
                {{ $project->name }}
            </h5>
            <table cellpadding="7" style="border-collapse: collapse;width:35%;" class="fs-6 fw-normal">
                <tbody>
                    <tr>
                        <td class="fw-bold">Nilai Kontrak</td>
                        <td>:</td>
                        <td id="detail-project_value"> {{ 'Rp ' . number_format($project->project_value, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Progres Fisik</td>
                        <td>:</td>
                        <td id="detail-physical_progress">{{ $project->physical_progress }} %</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Progres Keuangan</td>
                        <td>:</td>
                        <td id="detail-finance_progress">{{ $project->finance_progress }} %</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Status</td>
                        <td>:</td>
                        <td id="detail-status">
                            {{ $project->status == 'active' ? 'Aktif' : ($project->status == 'nonactive' ? 'Non-Aktif' : $project->status) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Konsultan</td>
                        <td>:</td>
                        <td id="detail-konsultan">{{ $project->consultant->user->name }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Penyelenggara</td>
                        <td>:</td>
                        <td id="detail-executor">{{ $project->executor->user->name }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Mulai</td>
                        <td>:</td>
                        <td id="detail-start_at">{{ \Carbon\Carbon::parse($project->start_at)->isoFormat('D MMMM Y') }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Selesai</td>
                        <td>:</td>
                        <td id="detail-end_at">
                            {{ \Carbon\Carbon::parse($project->end_at)->isoFormat('D MMMM Y') }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Fisik Bulan</td>
                        <td>:</td>
                        <td id="detail-physical_progress_start">
                            {{ \Carbon\Carbon::parse($project->physical_progress_start)->isoFormat('D MMMM Y') }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Keuangan Bulan</td>
                        <td>:</td>
                        <td id="detail-finance_progress_start">
                            {{ \Carbon\Carbon::parse($project->finance_progress_start)->isoFormat('D MMMM Y') }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Sumber Dana</td>
                        <td>:</td>
                        <td id="detail-fund_source">{{ $project->fundSource->name }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">jenis Kontrak</td>
                        <td>:</td>
                        <td id="detail-contract_category_name">{{ $project->contractCategory->name }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Karakteristik Kontrak</td>
                        <td>:</td>
                        <td id="detail-characteristic_project_name">
                            {{ $project->characteristic_project == 'single' ? 'Tahun Tunggal' : ($project->characteristic_project == 'multiple' ? 'Tahun Jamak' : $project->characteristic_project) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#project-admin').addClass('mm-active')
        $('#project-admin-link').addClass('active')
    </script>
@endsection
