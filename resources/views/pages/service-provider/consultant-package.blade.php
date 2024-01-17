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
                        <option value="" selected>Semua Tahun</option>
                        @foreach ($fiscalYears as $fiscalYear)
                            <option value="{{$fiscalYear->id}}" {{ request()->year == $fiscalYear->id ? 'selected' : '' }}>{{$fiscalYear->name}}</option>
                        @endforeach
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
                                <a href="{{Route('consultant-projects.show',['consultant_project' => $consultantProject->id])}}"
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
