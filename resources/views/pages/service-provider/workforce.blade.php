@extends('layouts.app')
@section('content')
    <h4 class="mb-3 font-size-18">Tenaga Kerja</h4>
    <div class="d-flex justify-content-between">
        <div class="">
            <button type="button" class="btn text-white fw-normal" style="background-color:#1B3061;">
                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12" fill="white"
                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                    <path
                        d="M246.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 109.3V320c0 17.7 14.3 32 32 32s32-14.3 32-32V109.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 53 43 96 96 96H352c53 0 96-43 96-96V352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V352z" />
                </svg>
                <span class="ms-2">Import</span>
            </button>
            <button type="button" class="btn text-white fw-normal" style="background-color:#2CA67A;">
                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" fill="white" transform="rotate(90)"
                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                    <path
                        d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                </svg>
                <span class="ms-2">Export</span>
            </button>
        </div>
        <div class="">
            <button type="button" class="btn text-white fw-normal" style="background-color:#FFC928;">
                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" fill="white"
                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                    <path
                        d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z" />
                </svg>
                <span class="ms-1">Kembali</span>
            </button>
        </div>
    </div>
    <div class="mt-4 rounded p-4" style="background-color: #fff;box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
        <h6 class="mb-3 font-size-14">Berikut Daftar Peserta Pelatihan</h6>
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <div class="d-flex position-relative col-lg-5">
                    <input type="search" class="form-control search-chat py-2 ps-5" id="search-name" placeholder="Search">
                    <i class="bx bx-search-alt-2 position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
                <button class="btn ms-1 text-white rounded" style="background-color:#1B3061">
                    Pilih Semua
                </button>
                <button class="btn ms-1 text-white rounded" style="background-color:#E05C39">
                    Hapus Pilihan
                </button>
            </div>
            <button class="btn ms-1 text-white rounded" style="background-color:#1B3061">
                + Tambah
            </button>
        </div>
        <table class="table table-bordered table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col" class="text-center text-white"
                        style="background-color: #1B3061; border-radius:5px 0px 0px 5px; border-color: #1B3061; border-width: 0px;">
                        Select
                    </th>
                    <th scope="col" class="text-center text-white"
                        style="background-color: #1B3061; border-color: #1B3061; border-width: 0px;">Tanggal Lahir</th>
                    <th scope="col" class="text-center text-white"
                        style="background-color: #1B3061; border-color: #1B3061; border-width: 0px;">Pendidikan</th>
                    <th scope="col" class="text-center text-white"
                        style="background-color: #1B3061; border-color: #1B3061; border-width: 0px;">No Registrasi</th>
                    <th scope="col" class="text-center text-white"
                        style="background-color: #1B3061; font-size: 12px; margin-top: 10px; margin-bottom: 10px; border-color: #1B3061; border-width: 0px;">
                        Jumlah Sertifikat</th>
                    <th scope="col" class="text-white"
                        style="background-color: #1B3061; border-radius:0px 5px 5px 0px; color: #ffffff; border-color: #1B3061; border-width: 0px;">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="text-center"><input type="checkbox"
                            aria-label="Checkbox for following text input"></th>
                    <td class="text-center">Mark</td>
                    <td class="text-center">Otto</td>
                    <td class="text-center">@mdo</td>
                    <td class="text-center">@mdo</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row" class="text-center"><input type="checkbox"
                            aria-label="Checkbox for following text input"></th>
                    <td class="text-center">Mark</td>
                    <td class="text-center">Otto</td>
                    <td class="text-center">@mdo</td>
                    <td class="text-center">@mdo</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row" class="text-center"><input type="checkbox"
                            aria-label="Checkbox for following text input"></th>
                    <td class="text-center">Mark</td>
                    <td class="text-center">Otto</td>
                    <td class="text-center">@mdo</td>
                    <td class="text-center">@mdo</td>
                    <td>@mdo</td>
                </tr>

            </tbody>
        </table>


    </div>
@endsection
