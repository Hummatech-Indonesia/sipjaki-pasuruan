@extends('layouts.auth-app')
@section('style')
    <style>
        .email-input {
            display: flex;
            gap: 5px;
        }

        .email-input input {
            flex: 1;
            border: 1px solid #ccc;
            padding: 7px;
            width: 30px;
            /* Ubah ukuran input di sini */
        }
    </style>
@endsection
@section('content')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="d-flex justify-content-center mb-5">
                <img src="https://i.postimg.cc/xTC1nsMF/logo.png" style="width: 250px" alt="" />
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary-subtle">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-dark p-4">
                                        <h5 class="text-dark" style="font-weight: 600">Verifikasi Email</h5>
                                        <p>Verifikasi akun</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('kontruksi.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="#">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle " style="background-color: #1B3061">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55"
                                                viewBox="0 0 63 63" fill="currentColor">
                                                <path
                                                    d="M31.5002 6.29279C17.5793 6.29279 6.29297 17.5791 6.29297 31.5C6.29297 45.4209 17.5793 56.7072 31.5002 56.7072C45.4211 56.7072 56.7074 45.4209 56.7074 31.5C56.7074 17.5791 45.4211 6.29279 31.5002 6.29279ZM41.6425 40.5467C39.8987 42.4926 37.6315 43.8951 35.1118 44.5865C32.592 45.2779 29.9265 45.2289 27.4339 44.4455C24.9413 43.662 22.727 42.1772 21.0559 40.1686C19.3849 38.16 18.3276 35.7126 18.0107 33.1191C17.6097 33.3844 17.1245 33.4913 16.6492 33.419C16.1738 33.3467 15.7423 33.1004 15.4383 32.7279C15.1344 32.3554 14.9796 31.8832 15.0042 31.403C15.0287 30.9229 15.2308 30.4689 15.5712 30.1294L18.4312 27.2693C18.7895 26.911 19.2739 26.7073 19.7805 26.7016C20.2872 26.696 20.776 26.8888 21.1422 27.239L24.1319 30.0991C24.4676 30.4177 24.6783 30.8458 24.7259 31.3062C24.7735 31.7665 24.6548 32.2287 24.3914 32.6093C24.128 32.9898 23.7371 33.2635 23.2895 33.381C22.8418 33.4985 22.3669 33.452 21.9505 33.25C22.2826 35.037 23.1089 36.6952 24.3356 38.0365C25.5623 39.3777 27.1403 40.3484 28.8907 40.8384C30.641 41.3283 32.4936 41.3179 34.2384 40.8084C35.9832 40.2989 37.5502 39.3106 38.7618 37.9557C39.1095 37.5879 39.5873 37.3707 40.093 37.3504C40.5988 37.3301 41.0924 37.5084 41.4685 37.8471C41.8445 38.1859 42.0732 38.6582 42.1058 39.1633C42.1383 39.6684 41.972 40.1662 41.6425 40.5504V40.5467ZM47.4304 32.8706L44.5704 35.7307C44.2121 36.089 43.7277 36.2927 43.2211 36.2984C42.7144 36.3041 42.2256 36.1112 41.8594 35.761L38.8697 32.9009C38.5404 32.584 38.3337 32.161 38.2859 31.7065C38.2382 31.2519 38.3525 30.7952 38.6088 30.4168C38.865 30.0383 39.2467 29.7626 39.6864 29.6382C40.1262 29.5137 40.5958 29.5486 41.0123 29.7367C40.6793 27.9537 39.8538 26.2994 38.6292 24.9613C37.4047 23.6231 35.83 22.6545 34.0834 22.1651C32.3368 21.6756 30.4881 21.6849 28.7465 22.1918C27.0049 22.6987 25.44 23.683 24.2289 25.0334C24.0588 25.2229 23.8531 25.3771 23.6235 25.4872C23.3938 25.5972 23.1448 25.6609 22.8905 25.6747C22.6362 25.6885 22.3817 25.6521 22.1415 25.5675C21.9013 25.4829 21.6802 25.3519 21.4906 25.1818C21.3011 25.0118 21.1469 24.8061 21.0368 24.5764C20.9268 24.3468 20.8631 24.0977 20.8493 23.8435C20.8355 23.5892 20.8719 23.3347 20.9565 23.0945C21.0411 22.8543 21.1721 22.6331 21.3422 22.4436C23.0873 20.4979 25.3563 19.0965 27.8774 18.4073C30.3986 17.7181 33.0649 17.7703 35.5572 18.5577C38.0494 19.3451 40.2618 20.8343 41.9293 22.8468C43.5969 24.8594 44.6489 27.31 44.9594 29.9052C45.3576 29.6337 45.8427 29.5202 46.32 29.5869C46.7974 29.6536 47.2328 29.8957 47.5413 30.266C47.8499 30.6363 48.0094 31.1082 47.9889 31.5897C47.9684 32.0713 47.7693 32.5279 47.4304 32.8706Z"
                                                    fill="currentColor" />
                                            </svg> </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @else
                                    <div class="alert alert-info text-center mb-4" role="alert">
                                        Verifikasi akun anda!
                                    </div>
                                @endif
                                <form class="form-horizontal" action="{{ route('verify-token/' ,$Id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Token</label>
                                        <div class="email-input">
                                            <input type="text" class="text-center form-control" id="email-part1"
                                                maxlength="1" oninput="updateTokenValue()">
                                            <input type="text" class="text-center form-control" id="email-part2"
                                                maxlength="1" oninput="updateTokenValue()">
                                            <input type="text" class="text-center form-control" id="email-part3"
                                                maxlength="1" oninput="updateTokenValue()">
                                            <input type="text" class="text-center form-control" id="email-part4"
                                                maxlength="1" oninput="updateTokenValue()">
                                            <input type="text" class="text-center form-control" id="email-part5"
                                                maxlength="1" oninput="updateTokenValue()">
                                        </div>
                                        <input type="hidden" name="token" id="token" >
                                    </div>
                                    <div class="mt-4 d-flex justify-content-end">
                                        <button type="submit" class="btn text-white" style="background-color: #1B3061">
                                            Kirim Email
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function updateTokenValue() {
            var emailPart1 = document.getElementById('email-part1').value;
            var emailPart2 = document.getElementById('email-part2').value;
            var emailPart3 = document.getElementById('email-part3').value;
            var emailPart4 = document.getElementById('email-part4').value;
            var emailPart5 = document.getElementById('email-part5').value;
            var token = emailPart1 + emailPart2 + emailPart3 + emailPart4 + emailPart5;
            document.getElementById('token').value = token;
        }
        function combineInputValues(event) {
            event.preventDefault();
            // Lakukan proses pengiriman form atau manipulasi data sesuai kebutuhan Anda
            document.forms[0].submit();
        }
    </script>
@endsection
