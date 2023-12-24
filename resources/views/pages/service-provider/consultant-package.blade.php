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
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
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
                    <tr>
                        <td class="text-center">
                            1
                        </td>
                        <td class="text-center">
                            Abdul Kader
                        </td>
                        <td class="text-center">
                            2023
                        </td>
                        <td class="text-center">
                            80%
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center">
                                <a href="detail-consultan" class="btn btn-primary btn-md"
                                    style="background-color: #1B3061;">
                                    Detail
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
