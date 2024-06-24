@extends('layouts.app')
@section('content')
    <h4 class="mb-3 font-size-18">Paket Pekerjaan</h4>
    <div class="d-flex justify-content-between mb-3">
        <form action="" method="get" class="d-flex gap-3 col-8">
            <input type="search" name="name" id="search-name" value="{{ request()->name }}" class="form-control"
                placeholder="Search">
            <select name="status" class="form-control ml-3" id="search-status">
                <option value="">Semua Status</option>
                <option value="active" {{ request()->status == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="nonactive" {{ request()->status == 'nonactive' ? 'selected' : '' }}>Non Aktif</option>
                <option value="canceled" {{ request()->status == 'canceled' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
            <select name="year" class="form-control ml-3" id="search-year">
                <option value="">Semua Tahun</option>
                @foreach ($fiscalYears as $fiscalYear)
                    <option value="{{ $fiscalYear->id }}" {{ request()->year == $fiscalYear->id ? 'selected' : '' }}>
                        {{ $fiscalYear->name }}</option>
                @endforeach
            </select>
            <button class="btn text-white d-flex items-center gap-2" style="background-color:#1B3061" type="submit">
                Cari <i class="fa fa-search my-auto"></i>
            </button>
            <button class="btn btn-danger d-flex items-center gap-2" id="export-pdf">
                PDF<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="white"
                        d="m23 12l-4-4v3h-9v2h9v3M1 18V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3h-2V6H3v12h12v-3h2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2Z" />
                </svg>
                </i>
            </button>
            <button class="btn btn-success d-flex items-center gap-2" id="export-excel">
                Excel<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="white"
                        d="m23 12l-4-4v3h-9v2h9v3M1 18V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3h-2V6H3v12h12v-3h2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2Z" />
                </svg>
                </i>
            </button>
        </form>
        @if (auth()->user()->dinas)
            <div class="">
                <button data-bs-toggle="modal" data-bs-target="#modal-create" class="btn text-white"
                    style="background-color:#1B3061">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                            fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                            fill="white" />
                    </svg>Tambah
                </button>
            </div>
        @endif
    </div>
    @if (session('success'))
    <x-alert-success-component :success="session('success')" />
@endif
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
                            Dinas
                        </td>
                        <td class="text-white text-center" style="background-color: #1B3061">
                            Tahun
                        </td>
                        <td class="text-white text-center" style="background-color: #1B3061">
                            Progres
                        </td>
                        <td class="text-white text-center" style="background-color: #1B3061">
                            Status
                        </td>
                        <td class="text-white text-center" style="background-color: #1B3061">
                            Aksi
                        </td>
                    </tr>
                </thead>
                @forelse ($executorProjects as $executorProject)
                    <tbody>
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-center">
                                {{ $executorProject->name }}
                            </td>
                            <td class="text-center">
                                {{ $executorProject->consultantProject->dinas->user->name }}
                            </td>
                            <td class="text-center">
                                {{ $executorProject->fiscalYear->name }}
                            </td>
                            <td class="text-center">
                                {{ $executorProject->physical_progress }}%
                            </td>
                            <td class="text-center">
                                @php
                                    switch ($executorProject->status) {
                                        case 'canceled':
                                            $color = '#FF0000';
                                            $text = 'Dibatalkan';
                                            break;
                                        case 'nonactive':
                                            $color = '#FFF700';
                                            $text = 'Non Aktif';
                                            break;
                                        default:
                                            $color = '#1B3061';
                                            $text = 'Aktif';
                                    }
                                @endphp
                                <span class="fs-6 badge px-4 py-2"
                                    style="background-color: {{ $color }}; color: #FFFFFF">
                                    {{ $text }}
                                </span>
                            </td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('detail-project', ['executorProject' => $executorProject->id]) }}"
                                        class="btn btn-primary btn-md rounded-4  " style="background-color: #1B3061;">
                                        Detail
                                    </a>
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
                                    <h4 class="text-center mt-4">Pekerjaan Masih Kosong!!</h4>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforelse
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

        $('#export-excel').click(function() {
            var status = $('#search-status').val()
            var name = $('#search-name').val()
            var year = $('#search-year').val()
            var route = "/project-export"
            var location = `${route}?status=${status}&name=${name}&year=${year}`
            window.location.href = location
        })

        $('#export-pdf').click(function() {
            var status = $('#search-status').val()
            var name = $('#search-name').val()
            var year = $('#search-year').val()
            var route = "{{ Route('project-export-pdf') }}"
            var location = `${route}?status=${status}&name=${name}&year=${year}`
            window.location.href = location
        })
    </script>
@endsection
