@extends('layouts.app')
@section('content')
    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
        });
    </script>
    @endif
    <h4 style="font-weight:800" class="text-dark mb-4">
        Penyedia Jasa Konsultan
    </h4>
    <div class="card">
        <div class="card-body">
            <p class="fs-5 " style="font-weight: 600">
                Berikut daftar Penyedia Jasa Konsultan
            </p>
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-header gap-3">
                    <div class="">
                        <form action="" class="">
                            <div class="input-group">
                                <input name="service_provider" type="text" class="form-control" placeholder="Search"
                                    value="{{ request()->service_provider }}">
                                <div class="input-group-append">
                                    <button class="btn text-white"
                                        style="background-color: #1B3061; border-radius: 0 5px 5px 0;" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="d-flex">
                    <button class="btn ms-1 text-white rounded" style="background-color:#1B3061" onclick="selectAll()">
                        Pilih Semua
                    </button>
                    <form action="{{ route('service-provider.destroys') }}" id="delete-multiple" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" id="selected-worker">
                        <button type="button" class="btn ms-1 text-white rounded" style="background-color:#E05C39"
                            onclick="deleteSelected()">
                            Hapus Pilihan
                        </button>
                    </form>
                </div>
            </div>
            <div class="table-responsive mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <td scope="col" class="text-center text-white" style="background-color: #1B3061;">
                                select
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                No
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Nama Jasa
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Email
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Asosiasi
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                No Telp
                            </td>
                            <td class="text-white" style="background-color: #1B3061">
                                Aksi
                            </td>
                        </tr>
                    </thead>
                    @forelse ($serviceProviders as $serviceProvider)
                        <tbody>
                            <tr>
                                <th scope="row" class="text-center">
                                    <input value="{{ $serviceProvider->id }}" type="checkbox"
                                        aria-label="Checkbox for following text input">
                                </th>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $serviceProvider->user->name }}
                                </td>
                                <td>
                                    {{ $serviceProvider->user->email }}
                                </td>
                                <td>
                                    {{ $serviceProvider->association->name }}
                                </td>
                                <td>
                                    {{ $serviceProvider->user->phone_number }}

                                </td>
                                <td>
                                    <a href="detail-service-provider/{{ $serviceProvider->id }}" class="btn text-white"
                                        style="background-color: #1B3061">
                                        Detail
                                    </a>
                                    <button type="button" id="{{ $serviceProvider->id }}"
                                        data-id="{{ $serviceProvider->id }}"
                                        data-name="{{ $serviceProvider->user->name }}" class="btn btn-danger btn-delete">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                <div class="d-flex justify-content-center" style="min-height:16rem">
                                    <div class="my-auto">
                                        <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                        <h4 class="text-center mt-4">Konsultan Kosong!!</h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </table>
                {{ $serviceProviders->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-md" id="modal-detail" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Detail Penyedia Jasa</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="bg-info col-3 rounded">
                        <div class="badge bg-info">
                            <p class="mb-0 px-3 py-1 fs-6">
                                <span id="">Profil Penyedia Jasa</span>
                            </p>
                        </div>
                    </div>
                    <h5 class="mt-3 name mb-3">
                    </h5>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Alamat :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-birth_date"
                                    class="address"></span></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Kota/Kab :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-birth_date"
                                    class="city"></span></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Provinsi :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-birth_date"
                                    class="province"></span></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Kode Pos :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-birth_date"
                                    class="postal_code"></span></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Telepon :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="phone_number"
                                    class=""></span></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Email :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="email"
                                    class=""></span></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Website :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-birth_date"
                                    class="website"></span></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Bentuk Badan Usaha :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-birth_date"
                                    class="form_of_business_entity"></span></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <p class="mb-2 text-dark">Jenis Badan Usaha :</p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2 text-dark" style="font-weight:600;"><span id="detail-birth_date"
                                    class="type_of_business_entity"></span></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-end">
                        <div class="">
                            <button class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-md" id="modal-reject" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Hapus Akun</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="form-reject" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        <h5 class="text-black" id="label">
                        </h5>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <div class="d-flex justify-content-header gap-2">
                                <div class="">
                                    <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Batal</button>
                                </div>
                                <div class="">
                                    <button class="btn text-white" type="submit" style="background-color: #1B3061">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @error('resend')
                    <p>
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.btn-detail').click(function() {
            id = $(this).data('id')
            console.log(id);
            get()
            $('#modal-detail').modal('show');

            function get() {
                $.ajax({
                    url: "service-provider-detail/" + id,
                    type: 'GET',
                    dataType: "JSON",
                    success: function(response) {
                        var name = response.data.user.name;
                        var email = response.data.user.email;
                        var phone_number = response.data.user.phone_number;
                        var address = response.data.association.address;
                        var province = response.data.province;
                        var city = response.data.city;
                        var type_of_business_entity = response.data.type_of_business_entity;
                        var form_of_business_entity = response.data.form_of_business_entity;
                        var website = response.data.website;
                        var postal_code = response.data.postal_code;
                        var datawebsite = '';
                        if (website === null) {
                            var datawebsite = '-';
                        } else {
                            var datawebsite = website;
                        }
                        var datacity = '';
                        if (city === null) {
                            var datacity = '-';
                        } else {
                            var datacity = city;
                        }
                        var datapostal_code = '';
                        if (postal_code === null) {
                            var datapostal_code = '-';
                        } else {
                            var datapostal_code = city;
                        }
                        var dataprovince = '';
                        if (province === null) {
                            var dataprovince = '-';
                        } else {
                            var dataprovince = city;
                        }
                        var dataform_of_business_entity = '';
                        if (form_of_business_entity === null) {
                            var dataform_of_business_entity = '-';
                        } else {
                            var dataform_of_business_entity = city;
                        }
                        var datatype_of_business_entity = '';
                        if (type_of_business_entity === null) {
                            var datatype_of_business_entity = '-';
                        } else {
                            var datatype_of_business_entity = city;
                        }
                        $('#phone_number').text(phone_number)
                        $('.website').text(datawebsite)
                        $('.postal_code').text(datapostal_code)
                        $('.form_of_business_entity').text(dataform_of_business_entity)
                        $('.type_of_business_entity').text(datatype_of_business_entity)
                        $('.city').text(datacity)
                        $('.province').text(dataprovince)
                        $('.address').text(address)
                        $('#email').text(email)
                        $('.name').text(name)
                    }
                });
            }
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            name = $(this).data('name')
            $('#label').html(`Apakah Anda Yakin Ingin Menghapus Akun Permanent dari ${name}?`);
            var actionUrl = `service-provider/${id}`;
            $('#form-reject').attr('action', actionUrl);
            $('#modal-reject').modal('show')
        })

        function updateSelected() {
            var selectedIds = [];
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    var workerId = checkbox.value;
                    selectedIds.push(workerId);
                }
            });
            document.getElementById('selected-worker').value = selectedIds;
        }

        function deleteSelected() {
            updateSelected();
            var selectedIds = document.getElementById('selected-worker').value;
            if (selectedIds) {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin melanjutkan?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-multiple').submit();
                    } else {
                        Swal.fire('Dibatalkan', 'Aksi telah dibatalkan.', 'error');
                    }
                });
            } else {
                Swal.fire({
                    'icon': 'error',
                    'title': 'error',
                    'text': 'Setidaknya Pilih Satu Akun Konsultan Untuk Dihapus'
                })
            }
        }

        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', updateSelected);
        });

        function selectAll() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = true;
            });
        }
    </script>
@endsection
