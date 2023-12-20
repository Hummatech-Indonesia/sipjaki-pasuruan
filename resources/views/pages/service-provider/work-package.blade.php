@extends('layouts.app')
@section('content')
    <h4 class="mb-3 font-size-18">Paket Pekerjaan</h4>
        <div class="col-12 col-lg-4 col-xxl-3 mb-3">
            <div class="input-group">
                <input type="text" name="name" value="" class="form-control" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn text-white" style="background-color: #1B3061; border-radius: 0 5px 5px 0;"
                        type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @forelse ($serviceProviderProjects as $serviceProviderProject)
            <div class="col-md-12 col-lg-5 col-xxl-3 col-12">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        @php
                            $totalProgres = $serviceProviderProject->serviceProviderProjects->pluck('progres')->sum();
                        @endphp
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <div class="btn btn-sm mb-2 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    {{ $serviceProviderProject->year }}
                                </div>
                                <p class="fw-bolder fs-5">{{ $serviceProviderProject->name }}</p>
                                <p class="text-muted fw-medium mb-0">Selesai</p>
                                <p class="mb-0 text-end text-dark" style="font-weight: 500">
                                    {{ $totalProgres }}%
                                </p>
                                <div class="progress mb-4">
                                    <div class="progress-bar" id="progressBar" data-total-progress="{{ $totalProgres }}"
                                        role="progressbar" style="width:{{ $totalProgres }}%"
                                        aria-valuenow="{{ $totalProgres }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="detail-project/{{ $serviceProviderProject->id }}"
                                        class="btn btn-primary btn-md rounded-4  " style="background-color: #1B3061;">
                                        Lihat Progress
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="d-flex justify-content-center" style="min-height:16rem">
                <div class="my-auto">
                    <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                    <h4 class="text-center mt-4">Pekerjaan Masih Kosong!!</h4>
                </div>
            </div>
        @endforelse
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
