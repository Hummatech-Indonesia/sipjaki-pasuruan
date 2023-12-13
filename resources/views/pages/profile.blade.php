@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card rounded-3">
                <h5 class="card-header rounded-top-3 border-bottom text-uppercase text-center h-20"
                    style="background-color: #1B3061;color:white;">Profil Saya</h5>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-lg-2 d-flex flex-column align-items-center">
                                <img id="preview" class="rounded-circle" width="90%" style="object-fit: cover"
                                    alt="">
                                <div class="btn btn-sm mt-3 btn-upload rounded-3" id="btn-upload"
                                    style="background-color: #1B3061; color: white; padding-left: 50px; padding-right: 50px;">
                                    UPLOAD</div>
                                <input type="file" style="display: none" name="photo" id="photo">
                            </div>

                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="" id="">
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="" id="">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="" class="form-label">No Telepon</label>
                                        <input type="number" class="form-control" name="" id="">
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">Sk</label>
                                        <input type="number" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <div class="d-flex mt-4 justify-content-between">
                                    <div>
                                        <button class="btn btn-warning btn-md rounded-3">
                                            Reset Password
                                        </button>
                                    </div>
                                    <div>
                                        <div class="btn btn-outline-primary waves-effect waves-light rounded-3 me-1">
                                            Kembali
                                        </div>
                                        <button type="submit" class="btn btn-md rounded-3"
                                            style="background-color: #1B3061;color:white;">
                                            Simpan
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.getElementById('btn-upload').addEventListener('click', function() {
            document.getElementById('photo').click();
        });

        document.getElementById('photo').addEventListener('change', function() {
            displayImage(this);
            submitForm();
        });

        function displayImage(input) {
            var file = input.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }


        function submitForm() {
            document.getElementById('myForm').submit();
        }
    </script>
@endsection
