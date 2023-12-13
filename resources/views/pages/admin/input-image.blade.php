@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between">
        <h2>Beranda</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create"
            style="background-color: #1B3061; border-radius: 10px"><i class="fas fa-plus"
                style="margin-right:10px"></i>Tambah</button>
    </div>
    <div class="card">
        <div class="card-body">
            <img src="" id="img-beranda" height="200" alt="">
            <input type="file" name="" id="" class="form-control">
        </div>
    </div>
@endsection
