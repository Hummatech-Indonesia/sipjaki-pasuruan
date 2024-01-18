@extends('layouts.app')
@section('content')
    <h4 class="mb-3 font-size-18">Paket Konsultan</h4>
    <div class="col-8 mb-3">
        <form action="" class="d-flex gap-3 ">
            <input type="search" name="name" value="{{ request()->name }}" class="form-control" placeholder="Search">
            <select name="status" class="form-control ml-3" id="">
                <option value="">Semua Status</option>
                <option value="active" {{ request()->status == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="nonactive" {{ request()->status == 'nonactive' ? 'selected' : '' }}>Non Aktif
                </option>
                <option value="canceled" {{ request()->status == 'canceled' ? 'selected' : '' }}>Dibatalkan
                </option>
            </select>
            <select name="year" class="form-control ml-3" id="">
                <option value="">Semua Tahun</option>
                @foreach ($fiscalYears as $fiscalYear)
                    <option value="{{ $fiscalYear->id }}" {{ request()->year == $fiscalYear->id ? 'selected' : '' }}>
                        {{ $fiscalYear->name }}</option>
                @endforeach
            </select>
            <button data-bs-toggle="modal" data-bs-target="#modal-create" class="btn text-white d-flex items-center gap-2"
                style="background-color:#1B3061">
                Cari <i class="fa fa-search my-auto"></i>
            </button>
            <button class="btn btn-danger d-flex items-center gap-2">
                PDF<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="white"
                        d="m23 12l-4-4v3h-9v2h9v3M1 18V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3h-2V6H3v12h12v-3h2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2Z" />
                </svg>
                </i>
            </button>
            <button class="btn btn-success d-flex items-center gap-2">
                Excel<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="white"
                        d="m23 12l-4-4v3h-9v2h9v3M1 18V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3h-2V6H3v12h12v-3h2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2Z" />
                </svg>
                </i>
            </button>
        </form>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td class="text-white text-center" style="background-color: #1B3061">
                            No
                        </td>
                        <td class="text-white text-center" style="background-color: #1B3061">
                            Nama
                        </td>
                        <td class="text-white text-center" style="background-color: #1B3061">
                            Tahun
                        </td>
                        <td class="text-white text-center" style="background-color: #1B3061">
                            Progres
                        </td>
                        <td class="text-white text-center" style="background-color: #1B3061">
                            Aksi
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($consultantProjects as $consultantProject)
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-center">
                                {{ $consultantProject->name }}
                            </td>
                            <td class="text-center">
                                {{ $consultantProject->fiscalYear->name }}
                            </td>
                            <td class="text-center">
                                {{ $consultantProject->finance_progress }}%
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ Route('consultant-projects.show', ['consultant_project' => $consultantProject->id]) }}"
                                        class="btn btn-primary btn-md rounded-4  " style="background-color: #1B3061;">
                                        Detail
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <div class="d-flex justify-content-center" style="min-height:16rem">
                                    <div class="my-auto">
                                        <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                        <h4 class="text-center mt-4">Pekerjaan Masih Kosong!!</h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const progressBar = document.getElementById("progressBar");
            const totalProgress = progressBar.getAttribute("data-total-progress");

            progressBar.setAttribute("title", totalProgress + "%");
            progressBar.setAttribute("data-toggle", "tooltip");
            progressBar.setAttribute("data-placement", "top");

            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        });
    </script>
@endsection
