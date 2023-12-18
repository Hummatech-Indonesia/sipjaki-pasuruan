@extends('layouts.app')

@section('style')
    <style>
        .avatar-title {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background-color: #1B3061;
            color: #fff;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            font-weight: 500;
            height: 100%;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            width: 100%
        }

        .search-container {
            display: flex;
            align-items: center;
            position: relative;
        }

        .search-icon {
            margin-left: 10px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
@endsection

@section('content')
    <div class="page-title-box d-sm-flex align-items-center">
        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="text-center">
                        <div class="avatar-sm mx-auto mb-4">
                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle mini-stat-icon">
                                    <span class="avatar-title rounded-circle ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            viewBox="0 0 60 60" fill="none">
                                            <path
                                                d="M20 5H40C43.9782 5 47.7936 6.58035 50.6066 9.3934C53.4196 12.2064 55 16.0218 55 20V40C55 43.9782 53.4196 47.7936 50.6066 50.6066C47.7936 53.4196 43.9782 55 40 55H20C16.0218 55 12.2064 53.4196 9.3934 50.6066C6.58035 47.7936 5 43.9782 5 40L5 20C5 16.0218 6.58035 12.2064 9.3934 9.3934C12.2064 6.58035 16.0218 5 20 5V5ZM35 27.5C34.337 27.5 33.7011 27.7634 33.2322 28.2322C32.7634 28.7011 32.5 29.337 32.5 30C32.5 30.663 32.7634 31.2989 33.2322 31.7678C33.7011 32.2366 34.337 32.5 35 32.5H42.5C43.163 32.5 43.7989 32.2366 44.2678 31.7678C44.7366 31.2989 45 30.663 45 30C45 29.337 44.7366 28.7011 44.2678 28.2322C43.7989 27.7634 43.163 27.5 42.5 27.5H35ZM30 37.5C29.337 37.5 28.7011 37.7634 28.2322 38.2322C27.7634 38.7011 27.5 39.337 27.5 40C27.5 40.663 27.7634 41.2989 28.2322 41.7678C28.7011 42.2366 29.337 42.5 30 42.5H42.5C43.163 42.5 43.7989 42.2366 44.2678 41.7678C44.7366 41.2989 45 40.663 45 40C45 39.337 44.7366 38.7011 44.2678 38.2322C43.7989 37.7634 43.163 37.5 42.5 37.5H30ZM30 17.5C29.337 17.5 28.7011 17.7634 28.2322 18.2322C27.7634 18.7011 27.5 19.337 27.5 20C27.5 20.663 27.7634 21.2989 28.2322 21.7678C28.7011 22.2366 29.337 22.5 30 22.5H42.5C43.163 22.5 43.7989 22.2366 44.2678 21.7678C44.7366 21.2989 45 20.663 45 20C45 19.337 44.7366 18.7011 44.2678 18.2322C43.7989 17.7634 43.163 17.5 42.5 17.5H30ZM19.57 30.6075L17.8025 28.84C17.5719 28.6012 17.296 28.4108 16.991 28.2797C16.686 28.1487 16.358 28.0798 16.026 28.0769C15.6941 28.074 15.3649 28.1372 15.0576 28.2629C14.7504 28.3886 14.4712 28.5743 14.2365 28.809C14.0018 29.0437 13.8161 29.3229 13.6904 29.6301C13.5647 29.9374 13.5015 30.2666 13.5044 30.5985C13.5073 30.9305 13.5762 31.2585 13.7072 31.5635C13.8383 31.8685 14.0287 32.1444 14.2675 32.375L17.8025 35.91C18.0347 36.1424 18.3104 36.3268 18.6139 36.4526C18.9174 36.5785 19.2427 36.6432 19.5712 36.6432C19.8998 36.6432 20.2251 36.5785 20.5286 36.4526C20.8321 36.3268 21.1078 36.1424 21.34 35.91L28.41 28.84C28.8794 28.3712 29.1434 27.7352 29.1439 27.0718C29.1444 26.4084 28.8813 25.7719 28.4125 25.3025C27.9437 24.8331 27.3077 24.5691 26.6443 24.5686C25.9809 24.5681 25.3444 24.8312 24.875 25.3L19.57 30.605V30.6075Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <p class="font-16 text-muted mb-2"></p>
                        <div class="text-muted fw-medium">Jumlah Penyedia Jasa</div>
                        <h4 class="mb-0" style="color: #1B3061">{{ $serviceProvider }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="text-center">
                        <div class="avatar-sm mx-auto mb-4">
                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle mini-stat-icon">
                                    <span class="avatar-title rounded-circle ">
                                        <i class="fas fa-user fa-2x"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <p class="font-16 text-muted mb-2"></p>
                        <div class="text-muted fw-medium">Jumlah Dinas</div>
                        <h4 class="mb-0" style="color: #1B3061"> {{ $dinas }} </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="text-center">
                        <div class="avatar-sm mx-auto mb-4">
                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle mini-stat-icon">
                                    <span class="avatar-title rounded-circle ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            viewBox="0 0 60 60" fill="none">
                                            <path
                                                d="M59.0132 14.7891C58.8756 14.506 58.6723 14.2598 58.4203 14.0712C58.1683 13.8826 57.8749 13.757 57.5645 13.7048C57.2541 13.6527 56.9357 13.6754 56.6358 13.7713C56.336 13.8672 56.0635 14.0333 55.8409 14.2559L49.8468 20.25C49.6023 20.4912 49.2726 20.6264 48.9292 20.6264C48.5857 20.6264 48.2561 20.4912 48.0116 20.25L45.3772 17.6156C45.1363 17.3708 45.0012 17.041 45.0012 16.6975C45.0012 16.3539 45.1363 16.0242 45.3772 15.7793L51.3397 9.81563C51.5679 9.58751 51.7366 9.30696 51.8313 8.99853C51.9259 8.6901 51.9435 8.36318 51.8826 8.04636C51.8217 7.72954 51.684 7.43248 51.4817 7.18116C51.2794 6.92983 51.0186 6.73191 50.7222 6.60469C46.0686 4.61251 40.2831 5.73165 36.6597 9.33399C33.5179 12.4523 32.578 17.3027 34.0815 22.6582C34.1463 22.8881 34.1461 23.1314 34.0807 23.3611C34.0153 23.5907 33.8874 23.7977 33.7112 23.959L13.4495 42.7852C12.7782 43.389 12.237 44.1233 11.8586 44.9431C11.4803 45.7629 11.2729 46.6512 11.2489 47.5538C11.225 48.4564 11.3851 49.3544 11.7194 50.1931C12.0537 51.0318 12.5553 51.7937 13.1936 52.4323C13.8319 53.0709 14.5935 53.5729 15.4321 53.9077C16.2707 54.2424 17.1686 54.4029 18.0712 54.3795C18.9738 54.356 19.8622 54.149 20.6822 53.771C21.5022 53.3931 22.2367 52.8522 22.8409 52.1813L41.8358 31.8844C41.9948 31.7122 42.1978 31.5866 42.4229 31.5211C42.6479 31.4557 42.8866 31.4528 43.1132 31.5129C48.3866 32.9191 53.1913 31.9816 56.2886 28.9348C58.0698 27.177 59.3132 24.6961 59.7913 21.9375C60.2401 19.3359 59.9565 16.7297 59.0132 14.7891Z"
                                                fill="white" />
                                            <path
                                                d="M51.2496 44.3449C49.616 42.9867 46.1261 39.8449 42.5695 36.5848L34.8269 44.8594C38.1363 48.375 41.1316 51.6387 42.4441 53.1656L42.4523 53.175C42.7676 53.5359 43.1533 53.8284 43.5858 54.0348C44.0182 54.2412 44.4883 54.3569 44.9671 54.375H45.096C46.0167 54.3723 46.8999 54.0097 47.557 53.3649L47.5652 53.3567L51.4828 49.4461C51.8231 49.1066 52.0887 48.6997 52.2627 48.2516C52.4367 47.8035 52.5151 47.3239 52.4931 46.8437C52.471 46.3635 52.3489 45.8932 52.1346 45.4629C51.9202 45.0326 51.6184 44.6518 51.2484 44.3449H51.2496Z"
                                                fill="white" />
                                            <path
                                                d="M13.8913 25.1426C13.8932 24.6978 13.7715 24.2613 13.5398 23.8816C13.5073 23.8303 13.4899 23.7709 13.4897 23.7101C13.4894 23.6494 13.5063 23.5898 13.5383 23.5382C13.5704 23.4866 13.6163 23.4451 13.6709 23.4183C13.7254 23.3916 13.7864 23.3808 13.8468 23.3871H13.8538C13.9523 23.3977 14.4784 23.4738 15.2249 23.9273C15.7792 24.2637 17.3612 25.343 20.1151 28.0922C20.0858 29.0285 20.3852 29.9456 20.9612 30.6844L28.7226 23.4715C28.0351 22.8206 27.137 22.438 26.1913 22.3934C26.1825 22.3837 26.1743 22.3736 26.1667 22.3629L26.0905 22.282L23.2148 18.3164C22.8951 17.8823 22.6854 17.3771 22.6038 16.8442C22.5221 16.3113 22.5709 15.7666 22.746 15.2566C23.0098 14.4972 23.4896 13.8313 24.1265 13.3406C24.7933 12.8238 26.298 12.2016 27.5765 12.0961C28.172 12.0469 28.7716 12.084 29.3566 12.2063C29.6368 12.2739 29.913 12.3572 30.1839 12.4559C30.266 12.4865 30.3502 12.5112 30.4359 12.5297C30.8078 12.6121 31.1961 12.5792 31.5489 12.4355C31.9017 12.2917 32.2024 12.0438 32.4109 11.7249C32.6193 11.406 32.7257 11.0312 32.7158 10.6503C32.7058 10.2694 32.5801 9.90061 32.3554 9.59297C32.3249 9.55196 32.2007 9.38321 32.0167 9.15586C31.6734 8.7229 31.2973 8.31701 30.8917 7.9418C29.9366 7.0793 27.4616 5.625 24.212 5.625C22.3524 5.62364 20.51 5.98177 18.7862 6.67969C14.2898 8.49024 11.3483 10.9664 9.99601 12.2801L9.98546 12.2906C9.0755 13.1891 8.23298 14.1535 7.46475 15.1758C7.17433 15.5853 6.98553 16.0581 6.91397 16.5551C6.88054 16.7665 6.76937 16.9578 6.60224 17.0916C6.43511 17.2253 6.22407 17.2919 6.01046 17.2781C5.96827 17.2781 5.92491 17.2781 5.88272 17.2781C5.24388 17.2739 4.62927 17.5224 4.17296 17.9695L0.721786 21.334L0.684286 21.3715C0.250161 21.8225 0.00531667 22.4227 8.55723e-05 23.0487C-0.00514552 23.6747 0.229634 24.2789 0.656161 24.7371C0.678426 24.7606 0.69952 24.7828 0.722958 24.8051L6.28936 30.2344C6.74799 30.6837 7.36408 30.9361 8.00616 30.9375C8.64501 30.9418 9.25961 30.6932 9.71593 30.2461L13.1683 26.8723C13.3985 26.6471 13.5812 26.378 13.7054 26.0808C13.8296 25.7837 13.8928 25.4646 13.8913 25.1426V25.1426Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <p class="font-16 text-muted mb-2"></p>
                        <div class="text-muted fw-medium">Jumlah Pekerjaan</div>
                        <h4 class="mb-0" style="color: #1B3061"> {{ $project }} </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="text-center">
                        <div class="avatar-sm mx-auto mb-4">
                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle mini-stat-icon">
                                    <span class="avatar-title rounded-circle ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            viewBox="0 0 60 60" fill="none">
                                            <path
                                                d="M32.5 40C32.5 41.3807 31.3807 42.5 30 42.5C28.6193 42.5 27.5 41.3807 27.5 40C27.5 38.6193 28.6193 37.5 30 37.5C31.3807 37.5 32.5 38.6193 32.5 40Z"
                                                fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M18.9124 5.73223C19.3813 5.26339 20.0172 5 20.6802 5L39.3198 5C39.9828 5 40.6187 5.26339 41.0876 5.73223L54.2678 18.9124C54.7366 19.3813 55 20.0172 55 20.6802V39.3198C55 39.9828 54.7366 40.6187 54.2678 41.0876L41.0876 54.2678C40.6187 54.7366 39.9828 55 39.3198 55H20.6802C20.0172 55 19.3813 54.7366 18.9124 54.2678L5.73223 41.0876C5.26339 40.6187 5 39.9828 5 39.3198L5 20.6802C5 20.0172 5.26339 19.3813 5.73223 18.9124L18.9124 5.73223ZM21.7157 10L10 21.7157L10 38.2843L21.7157 50H38.2843L50 38.2843V21.7157L38.2843 10L21.7157 10ZM30 17.5C31.3807 17.5 32.5 18.6193 32.5 20V30C32.5 31.3807 31.3807 32.5 30 32.5C28.6193 32.5 27.5 31.3807 27.5 30V20C27.5 18.6193 28.6193 17.5 30 17.5Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <p class="font-16 text-muted mb-2"></p>
                        <div class="text-muted fw-medium">Jumlah Kecelakaan</div>
                        <h4 class="mb-0" style="color: #1B3061"> {{ $accident }} </h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="page-title-box d-sm-flex align-items-center">
        <h4 class="mb-sm-0 font-size-18">Menu</h4>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="mini-stat-icon avatar-sm rounded-circle">
                                <span class="avatar-title">
                                    <i class="bx bx-news fa-2x"></i>
                                </span>
                            </div>
                            <div class="fw-bold mt-3">Berita</div>
                        </div>
                        <div class="flex-shrink-0 mt-2">
                            <button class="btn btn-md rounded-3"
                                style="background-color: #1B3061;color:white;width:100px;">Lihat</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="mini-stat-icon avatar-sm rounded-circle">
                                <span class="avatar-title">
                                    <i class="bx bx-image-add fa-2x"></i>
                                </span>
                            </div>
                            <div class="fw-bold mt-3">Input Gambar</div>
                        </div>
                        <div class="flex-shrink-0 mt-2">
                            <button class="btn btn-md rounded-3"
                                style="background-color: #1B3061;color:white;width:100px;">Lihat</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="mini-stat-icon avatar-sm rounded-circle">
                                <span class="avatar-title">
                                    <i class="bx bx-user-plus fa-2x"></i>
                                </span>
                            </div>
                            <div class="fw-bold mt-3">Dinas</div>
                        </div>
                        <div class="flex-shrink-0 mt-2">
                            <button class="btn btn-md rounded-3"
                                style="background-color: #1B3061;color:white;width:100px;">Lihat</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="mini-stat-icon avatar-sm rounded-circle">
                                <span class="avatar-title">
                                    <i class="fas fa-clipboard fa-2x"></i>
                                </span>
                            </div>
                            <div class="fw-bold mt-3">Peraturan</div>
                        </div>
                        <div class="flex-shrink-0 mt-2">
                            <button class="btn btn-md rounded-3"
                                style="background-color: #1B3061;color:white;width:100px;">Lihat</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="mini-stat-icon avatar-sm rounded-circle">
                                <span class="avatar-title">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                        viewBox="0 0 44 44" fill="currentColor">
                                        <path
                                            d="M34.2032 7.03313C30.7354 4.25847 26.4259 2.74781 21.9846 2.75C16.7493 2.75 11.8595 4.76696 8.20369 8.42961C4.6708 11.9737 2.73462 16.653 2.75009 21.6021C2.75021 25.2306 3.81547 28.7793 5.81376 31.8081L5.83009 31.8313C5.85415 31.8665 5.87908 31.9017 5.904 31.9361C5.92892 31.9705 5.95986 32.0152 5.96673 32.0263L5.98564 32.0607C6.08275 32.2326 6.15751 32.4423 6.09134 32.6537L4.50837 38.3823C4.44505 38.5953 4.41037 38.8158 4.40525 39.038C4.4041 39.6225 4.63479 40.1836 5.04671 40.5982C5.45864 41.0129 6.01819 41.2473 6.60267 41.25C6.91153 41.2398 7.2159 41.1731 7.50072 41.0532L13.3006 38.9598L13.3737 38.9314C13.5315 38.8652 13.701 38.8315 13.8721 38.8326C14.0299 38.833 14.1863 38.8621 14.3336 38.9185C14.4728 38.9727 15.737 39.4565 17.0707 39.8295C18.1793 40.1388 20.4859 40.6029 22.2931 40.6029C27.4193 40.6029 32.206 38.6177 35.7707 35.0118C39.3045 31.4334 41.2501 26.6767 41.2501 21.6124C41.2505 20.3125 41.1129 19.0161 40.8393 17.7452C39.9507 13.567 37.5943 9.76164 34.2032 7.03313ZM13.7501 24.75C13.2062 24.75 12.6745 24.5887 12.2223 24.2865C11.77 23.9844 11.4176 23.5549 11.2094 23.0524C11.0013 22.5499 10.9468 21.997 11.0529 21.4635C11.159 20.9301 11.421 20.4401 11.8055 20.0555C12.1901 19.6709 12.6801 19.409 13.2136 19.3028C13.747 19.1967 14.3 19.2512 14.8025 19.4593C15.305 19.6675 15.7345 20.0199 16.0366 20.4722C16.3388 20.9244 16.5001 21.4561 16.5001 22C16.5001 22.7293 16.2104 23.4288 15.6946 23.9445C15.1789 24.4603 14.4794 24.75 13.7501 24.75ZM22.0001 24.75C21.4562 24.75 20.9245 24.5887 20.4723 24.2865C20.02 23.9844 19.6676 23.5549 19.4594 23.0524C19.2513 22.5499 19.1968 21.997 19.3029 21.4635C19.409 20.9301 19.671 20.4401 20.0555 20.0555C20.4401 19.6709 20.9301 19.409 21.4636 19.3028C21.997 19.1967 22.55 19.2512 23.0525 19.4593C23.555 19.6675 23.9845 20.0199 24.2866 20.4722C24.5888 20.9244 24.7501 21.4561 24.7501 22C24.7501 22.7293 24.4604 23.4288 23.9446 23.9445C23.4289 24.4603 22.7294 24.75 22.0001 24.75ZM30.2501 24.75C29.7062 24.75 29.1745 24.5887 28.7223 24.2865C28.27 23.9844 27.9176 23.5549 27.7094 23.0524C27.5013 22.5499 27.4468 21.997 27.5529 21.4635C27.659 20.9301 27.921 20.4401 28.3055 20.0555C28.6901 19.6709 29.1801 19.409 29.7136 19.3028C30.247 19.1967 30.8 19.2512 31.3025 19.4593C31.805 19.6675 32.2345 20.0199 32.5366 20.4722C32.8388 20.9244 33.0001 21.4561 33.0001 22C33.0001 22.7293 32.7104 23.4288 32.1946 23.9445C31.6789 24.4603 30.9794 24.75 30.2501 24.75Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                            <div class="fw-bold mt-3">FAQ</div>
                        </div>
                        <div class="flex-shrink-0 mt-2">
                            <button class="btn btn-md rounded-3"
                                style="background-color: #1B3061;color:white;width:100px;">Lihat</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="mini-stat-icon avatar-sm rounded-circle">
                                <span class="avatar-title">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 44 44" fill="currentColor">
                                        <g clip-path="url(#clip0_26_6710)">
                                            <path d="M9.16675 5.5V38.5" stroke="currentColor" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M34.8333 38.5V5.5" stroke="currentColor" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9.16675 12.8335H34.8334" stroke="currentColor" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9.16675 27.5H34.8334" stroke="currentColor" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M14.6667 23.8335V31.1668" stroke="currentColor" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M20.1667 23.8335V31.1668" stroke="currentColor" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M29.3333 23.8335V31.1668" stroke="currentColor" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M25.6667 9.1665V16.4998" stroke="currentColor" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M20.1667 9.1665V16.4998" stroke="currentColor" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M14.6667 9.1665V16.4998" stroke="currentColor" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M5.5 38.5H38.5" stroke="currentColor" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_26_6710">
                                                <rect width="44" height="44" fill="currentColor" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                            </div>
                            <div class="fw-bold mt-3">Pelatihan</div>
                        </div>
                        <div class="flex-shrink-0 mt-2">
                            <button class="btn btn-md rounded-3"
                                style="background-color: #1B3061;color:white;width:100px;">Lihat</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-title-box d-sm-flex align-items-center">
        <h4 class="mb-sm-0 font-size-18">Pekerjaan Aktif</h4>
    </div>

    <div class="card p-3">
        <h5 class="mb-2">
            Berikut daftar Pekerjaan sedang aktif
        </h5>
        <form action="" class="d-flex">
            <div class="position-relative search-container me-2">
                <input type="search" class="form-control py-2 ps-5" id="search-name" placeholder="Search">
                <i class="bx bx-search-alt search-icon"></i>
            </div>
            <div class="py-3">
                <select class="form-select pe-5">
                    <option>2022</option>
                    <option>2023</option>
                </select>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-borderless" border="1">
                <thead>
                    <tr>
                        <th style="background-color: #1B3061;color:#ffffff">No</th>
                        <th style="background-color: #1B3061;color:#ffffff">Nama Pekerjaan</th>
                        <th style="background-color: #1B3061;color:#ffffff">Dinas</th>
                        <th style="background-color: #1B3061;color:#ffffff">Nilai Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($activeProjects as $activeProject)   
                        <tr>
                            <td class="fs-5">{{$loop->iteration}}</td>
                            <td class="fs-5">{{$activeProject->name}}</td>
                            <td class="fs-5">{{$activeProject->dinas->user->name}}</td>
                            <td class="fs-5">{{$activeProject->project_value}}</td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            <div class="d-flex justify-content-center" style="min-height:16rem">
                                <div class="my-auto">
                                    <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                    <h4 class="text-center mt-4">Pekerjaan Kosong!!</h4>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
