@extends('layouts.app')
@section('content')
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <div class="d-flex">
            <a class="nav-link active rounded-start" style="border: solid 1px #1B3061;" id="detail"
                data-bs-toggle="pill" href="#detail" role="tab" aria-controls="detail" aria-selected="true">
                <div class="fw-bold">Detail</div>
            </a>
            <a class="nav-link" style="border: solid 1px #1B3061;" id="tab-edit" data-bs-toggle="pill"
                href="#edit" role="tab" aria-controls="kualifikasi-klasifikasi"
                aria-selected="false">
                <div class="fw-bold">Edit data</div>
            </a>
        </div>
    </div>
    <div class="tab-content mt-4" id="v-pills-tabContent">
        <div class="tab-pane fade active show" id="detail" role="tabpanel" aria-labelledby="detail">
            <div class="card rounded-4">
                <div class="card-body">
                    detail
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="edit" role="tabpanel"
            aria-labelledby="tab-edit">
            <div class="d-flex justify-content-end mb-2">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-qualification"
                    style="background-color: #1B3061; border-radius: 10px"><i class="fas fa-plus"
                        style="margin-right:10px"></i>Tambah</button>
            </div>
            
        </div>
    </div>
@endsection
