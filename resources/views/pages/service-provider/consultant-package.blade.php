@extends('layouts.app')
@section('content')
    <h4 class="mb-3 font-size-18">Paket Pekerjaan</h4>
    <div class="col-12 col-lg-5 col-xxl-3 mb-3">
        <form action="" class="">
            <div class="input-group d-flex ">
                <input type="text" name="name" value="{{ request()->name }}" class="form-control" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn text-white" style="background-color: #1B3061; border-radius: 0 5px 5px 0;"
                        type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div class="ms-3">
                    <select name="year" class="form-select pe-5">
                        <option value="2022" {{ $year == '2022' ? 'selected' : '' }}>2022</option>
                        <option value="2023" {{ $year == '2023' ? 'selected' : '' }}>2023</option>
                    </select>
                </div>
                <div class="ms-1">
                    <button class="btn text-white" type="submit" style="background-color: #1B3061">Search</button>
                </div>
            </div>
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
                    @forelse ($serviceProviderProjects as $index=>$serviceProviderProject)
                    @php
                        $totalProgres = $serviceProviderProject->serviceProviderProjects->pluck('progres')->sum();
                    @endphp
                    <tbody>
                        <tr>
                            <td class="text-center">
                                {{ $index + 1 }}
                            </td>
                            <td class="text-center">
                                {{ $serviceProviderProject->name }}
                            </td>
                            <td class="text-center">
                                {{ $serviceProviderProject->year }}
                            </td>
                            <td class="text-center">
                                {{ $totalProgres }}%
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <a href="detail-consultant/{{ $serviceProviderProject->id }}"
                                        class="btn btn-primary btn-md rounded-4  " style="background-color: #1B3061;">
                                        Detail
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
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
