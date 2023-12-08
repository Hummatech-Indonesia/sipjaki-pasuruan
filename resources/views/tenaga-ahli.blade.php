@extends('layouts.app-landing-page')
@section('content')
<div class="tabs-wrapper">
    <div class="section-title text-center">
        <h2 style="border-radius: 16px;
        background: var(--Kuning, #FFC928);" class="title p-2">Data Pelatihan Tenaga Ahli</h2>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-row justify-content-between align-items-center">
                        <div class="position-relative col-lg-4">
                            <input type="search" class="form-control search-chat me-2" id="search-name" placeholder="Search">
                            <i class="bx bx-search-alt-2
                            position-absolute top-50 translate-middle-y fs-6 text-dark"></i>
                        </div>
                        <select id="formrow-inputState" style="margin-right: 10px;" class="form-select col-lg-3">
                            <option disabled="" selected="">Menampilkan Data</option>
                            <option>A++</option>
                            <option>B++</option>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0" border="1">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-medium"
                                        style="background-color: #1B3062; color: white; border-right: 1px solid #1B3061;">
                                        No</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Nama Dinas</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; text-align: center">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <th scope="row" class="fs-5">1</th>
                                        <td class="fs-5">Muhammad surya rafliansyah</td>
                                        <td class="fs-5 text-center">2844</td>

                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
