@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium">Total Peraturan</p>
                            <h4 class="mb-0">1,235</h4>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <div class="mini-stat-icon avatar-sm rounded-circle">
                                <span class="avatar-title">
                                    <i class="bx bx-copy-alt font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium">Sub Klasifikasi Terbanyak</p>
                            <h4 class="mb-0">$35, 723</h4>
                        </div>

                        <div class="flex-shrink-0 align-self-center ">
                            <div class="avatar-sm rounded-circle mini-stat-icon">
                                <span class="avatar-title rounded-circle ">
                                    <i class="bx bx-archive-in font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium">Total List Sumber Dana</p>
                            <h4 class="mb-0">$16.2</h4>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <div class="avatar-sm rounded-circle mini-stat-icon">
                                <span class="avatar-title rounded-circle">
                                    <i class="fas fa-users fa-lg"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
