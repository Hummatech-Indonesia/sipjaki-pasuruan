@extends('layouts.app')
@section('content')
@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $error }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endforeach
@endif    
    <div class="d-flex justify-content-between mb-3">
        <h2>Struktur Organisasi</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('images.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <img src="" id="img-beranda" height="200" alt="">
                <input type="hidden" name="categories" value="structure_organitation">
                <div class="row">
                    <div class="col-10">
                        <input type="file" name="photo" id="" class="form-control">
                    </div>
                    <button class="btn btn-primary col-2" data-bs-toggle="modal" data-bs-target="#modal-create"
                    style="background-color: #1B3061; border-radius: 10px"><i class="fas fa-plus"
                        style="margin-right:10px"></i>Tambah</button>
                </div>

            </form>
        </div>
    </div>
    <div class="d-flex justify-content-between mb-3">
        <h2>Rencana Strategis</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('images.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <img src="" id="img-beranda" height="200" alt="">
                <input type="hidden" name="categories" value="strategic_plan">
                <div class="row">
                    <div class="col-10">
                        <input type="file" name="photo" id="" class="form-control">
                    </div>
                    <button class="btn btn-primary col-2" data-bs-toggle="modal" data-bs-target="#modal-create"
                    style="background-color: #1B3061; border-radius: 10px"><i class="fas fa-plus"
                        style="margin-right:10px"></i>Tambah</button>
                </div>

            </form>
        </div>
    </div>
    <div class="d-flex justify-content-between mb-3">
        <h2>Tugas dan Fungsi</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('images.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <img src="" id="img-beranda" height="200" alt="">
                <input type="hidden" name="categories" value="job_and_function">
                <div class="row">
                    <div class="col-10">
                        <input type="file" name="photo" id="" class="form-control">
                    </div>
                    <button class="btn btn-primary col-2" data-bs-toggle="modal" data-bs-target="#modal-create"
                    style="background-color: #1B3061; border-radius: 10px"><i class="fas fa-plus"
                        style="margin-right:10px"></i>Tambah</button>
                </div>

            </form>
        </div>
    </div>

@endsection
