@extends('layouts.app')
@section('content')
    <h4 class="mb-3 font-size-18">Paket Pekerjaan</h4>
    <div class="col-12 col-lg-5 col-xxl-4 mb-3">
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
                <div class="ms-2">
                    <button class="btn text-white" type="submit" style="background-color: #1B3061">Search</button>
                </div>
                <button class="btn btn-danger d-flex items-center gap-2">
                    PDF<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="white" d="m23 12l-4-4v3h-9v2h9v3M1 18V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3h-2V6H3v12h12v-3h2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2Z"/></svg>
                </i>
                </button>
                <button class="btn btn-success d-flex items-center gap-2">
                    Excel<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="white" d="m23 12l-4-4v3h-9v2h9v3M1 18V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3h-2V6H3v12h12v-3h2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2Z"/></svg>
                </i>
                </button>
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
                                    <a href="detail-project/{{ $serviceProviderProject->id }}"
                                        class="btn btn-primary btn-md rounded-4  " style="background-color: #1B3061;">
                                        Lihat Progress
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
