@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <div class="d-flex">
            <a class="nav-link active rounded-start" style="border: solid 1px #1B3061;" id="detail-tab"
                data-bs-toggle="pill" href="#detail" role="tab" aria-controls="detail" aria-selected="true">
                <div class="fw-bold">Detail</div>
            </a>
            <a class="nav-link" style="border: solid 1px #1B3061;" id="edit-tab" data-bs-toggle="pill"
                href="#edit" role="tab" aria-controls="kualifikasi-klasifikasi"
                aria-selected="false">
                <div class="fw-bold">Edit data</div>
            </a>
        </div>
    </div>
    <div class="">
        <a class="btn text-white" style="background-color: #1B3061" href="consultant-package">Kembali</a>
    </div>
</div>
    <div class="tab-content mt-4" id="v-pills-tabContent">
        <div class="tab-pane fade active show" id="detail" role="tabpanel" aria-labelledby="detail-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    detail
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
            <div class="card rounded-4">
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
@endsection
