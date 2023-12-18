@extends('layouts.app')
@section('content')
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
                        <h4 class="mb-0" style="color: #1B3061">8</h4>
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
                        <div class="text-muted fw-medium">Jumlah Pengguna</div>
                        <h4 class="mb-0" style="color: #1B3061">8 </h4>
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
                        <h4 class="mb-0" style="color: #1B3061">8 </h4>
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
                        <h4 class="mb-0" style="color: #1B3061">8</h4>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 68 68" fill="none">
                                        <g clip-path="url(#clip0_468_5856)">
                                            <path
                                                d="M25.5 14.1667H19.8333C18.3304 14.1667 16.8891 14.7637 15.8264 15.8264C14.7636 16.8891 14.1666 18.3304 14.1666 19.8333V53.8333C14.1666 55.3362 14.7636 56.7776 15.8264 57.8403C16.8891 58.903 18.3304 59.5 19.8333 59.5H48.1666C49.6695 59.5 51.1109 58.903 52.1736 57.8403C53.2363 56.7776 53.8333 55.3362 53.8333 53.8333V19.8333C53.8333 18.3304 53.2363 16.8891 52.1736 15.8264C51.1109 14.7637 49.6695 14.1667 48.1666 14.1667H42.5"
                                                stroke="white" stroke-width="3" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M36.8333 8.5H31.1667C28.0371 8.5 25.5 11.0371 25.5 14.1667C25.5 17.2963 28.0371 19.8333 31.1667 19.8333H36.8333C39.9629 19.8333 42.5 17.2963 42.5 14.1667C42.5 11.0371 39.9629 8.5 36.8333 8.5Z"
                                                stroke="white" stroke-width="3" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M25.5 34H25.5271" stroke="white" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M36.8334 34H42.5" stroke="white" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M25.5 45.3333H25.5271" stroke="white" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M36.8334 45.3333H42.5" stroke="white" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_468_5856">
                                                <rect width="68" height="68" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                            </div>
                            <div class="fw-bold mt-3">Kategori Peraturan</div>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 68 68" fill="none">
                                        <g clip-path="url(#clip0_468_5930)">
                                            <path
                                                d="M25.5001 14.1667H19.8334C18.3305 14.1667 16.8892 14.7637 15.8265 15.8264C14.7638 16.8891 14.1667 18.3304 14.1667 19.8333V53.8333C14.1667 55.3362 14.7638 56.7776 15.8265 57.8403C16.8892 58.903 18.3305 59.5 19.8334 59.5H48.1667C49.6696 59.5 51.111 58.903 52.1737 57.8403C53.2364 56.7776 53.8334 55.3362 53.8334 53.8333V19.8333C53.8334 18.3304 53.2364 16.8891 52.1737 15.8264C51.111 14.7637 49.6696 14.1667 48.1667 14.1667H42.5001"
                                                stroke="white" stroke-width="3" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M36.8333 8.5H31.1667C28.0371 8.5 25.5 11.0371 25.5 14.1667C25.5 17.2963 28.0371 19.8333 31.1667 19.8333H36.8333C39.9629 19.8333 42.5 17.2963 42.5 14.1667C42.5 11.0371 39.9629 8.5 36.8333 8.5Z"
                                                stroke="white" stroke-width="3" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M39.6666 31.1667H32.5833C31.4561 31.1667 30.3751 31.6144 29.578 32.4115C28.781 33.2085 28.3333 34.2895 28.3333 35.4167C28.3333 36.5438 28.781 37.6248 29.578 38.4219C30.3751 39.2189 31.4561 39.6667 32.5833 39.6667H35.4166C36.5438 39.6667 37.6248 40.1144 38.4218 40.9115C39.2188 41.7085 39.6666 42.7895 39.6666 43.9167C39.6666 45.0438 39.2188 46.1248 38.4218 46.9219C37.6248 47.7189 36.5438 48.1667 35.4166 48.1667H28.3333"
                                                stroke="white" stroke-width="3" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M34 28.3333V31.1667M34 48.1667V51V48.1667Z" stroke="white"
                                                stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_468_5930">
                                                <rect width="68" height="68" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                            </div>
                            <div class="fw-bold mt-3">Sumber Dana</div>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 52 52" fill="none">
                                        <path
                                            d="M17.3333 4.33333H34.6666C38.1144 4.33333 41.421 5.70297 43.859 8.14095C46.2969 10.5789 47.6666 13.8855 47.6666 17.3333V34.6667C47.6666 38.1145 46.2969 41.4211 43.859 43.8591C41.421 46.297 38.1144 47.6667 34.6666 47.6667H17.3333C13.8854 47.6667 10.5788 46.297 8.14086 43.8591C5.70289 41.4211 4.33325 38.1145 4.33325 34.6667L4.33325 17.3333C4.33325 13.8855 5.70289 10.5789 8.14086 8.14095C10.5788 5.70297 13.8854 4.33333 17.3333 4.33333V4.33333ZM30.3333 23.8333C29.7586 23.8333 29.2075 24.0616 28.8012 24.4679C28.3949 24.8743 28.1666 25.4254 28.1666 26C28.1666 26.5746 28.3949 27.1257 28.8012 27.5321C29.2075 27.9384 29.7586 28.1667 30.3333 28.1667H36.8332C37.4079 28.1667 37.959 27.9384 38.3653 27.5321C38.7716 27.1257 38.9999 26.5746 38.9999 26C38.9999 25.4254 38.7716 24.8743 38.3653 24.4679C37.959 24.0616 37.4079 23.8333 36.8332 23.8333H30.3333ZM25.9999 32.5C25.4253 32.5 24.8742 32.7283 24.4679 33.1346C24.0615 33.5409 23.8333 34.092 23.8333 34.6667C23.8333 35.2413 24.0615 35.7924 24.4679 36.1987C24.8742 36.6051 25.4253 36.8333 25.9999 36.8333H36.8332C37.4079 36.8333 37.959 36.6051 38.3653 36.1987C38.7716 35.7924 38.9999 35.2413 38.9999 34.6667C38.9999 34.092 38.7716 33.5409 38.3653 33.1346C37.959 32.7283 37.4079 32.5 36.8332 32.5H25.9999ZM25.9999 15.1667C25.4253 15.1667 24.8742 15.3949 24.4679 15.8013C24.0615 16.2076 23.8333 16.7587 23.8333 17.3333C23.8333 17.908 24.0615 18.4591 24.4679 18.8654C24.8742 19.2717 25.4253 19.5 25.9999 19.5H36.8332C37.4079 19.5 37.959 19.2717 38.3653 18.8654C38.7716 18.4591 38.9999 17.908 38.9999 17.3333C38.9999 16.7587 38.7716 16.2076 38.3653 15.8013C37.959 15.3949 37.4079 15.1667 36.8332 15.1667H25.9999ZM16.9606 26.5265L15.4288 24.9947C15.2289 24.7877 14.9898 24.6227 14.7255 24.5091C14.4611 24.3956 14.1768 24.3358 13.8891 24.3333C13.6014 24.3308 13.3161 24.3856 13.0499 24.4946C12.7836 24.6035 12.5417 24.7644 12.3382 24.9678C12.1348 25.1712 11.9739 25.4132 11.865 25.6794C11.756 25.9457 11.7012 26.231 11.7037 26.5187C11.7062 26.8064 11.766 27.0907 11.8795 27.355C11.9931 27.6194 12.1581 27.8585 12.3651 28.0583L15.4288 31.122C15.63 31.3234 15.8689 31.4833 16.132 31.5923C16.395 31.7013 16.6769 31.7575 16.9617 31.7575C17.2464 31.7575 17.5283 31.7013 17.7914 31.5923C18.0544 31.4833 18.2934 31.3234 18.4946 31.122L24.6219 24.9947C25.0288 24.5884 25.2575 24.0372 25.258 23.4622C25.2584 22.8872 25.0304 22.3357 24.6241 21.9288C24.2178 21.522 23.6666 21.2932 23.0916 21.2928C22.5167 21.2924 21.9651 21.5204 21.5583 21.9267L16.9606 26.5243V26.5265Z"
                                            fill="white" />
                                    </svg>
                                </span>
                            </div>
                            <div class="fw-bold mt-3">Penyedia Jasa</div>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 68 68" fill="none">
                                        <g clip-path="url(#clip0_468_6103)">
                                            <path d="M34 22.6655V33.9988L39.6667 39.6655" stroke="white" stroke-width="4"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M8.6416 31.1677C9.27653 24.9346 12.184 19.1533 16.8093 14.927C21.4347 10.7006 27.4541 8.32507 33.7191 8.25351C39.9841 8.18195 46.0562 10.4194 50.7768 14.539C55.4975 18.6586 58.5363 24.3719 59.3134 30.589C60.0905 36.806 58.5516 43.0916 54.9903 48.2464C51.4289 53.4012 46.0944 57.0645 40.0046 58.5373C33.9147 60.0101 27.4958 59.1893 21.9724 56.2316C16.4491 53.2738 12.208 48.3862 10.0583 42.5011M8.6416 56.6677V42.5011H22.8083"
                                                stroke="white" stroke-width="4" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_468_6103">
                                                <rect width="68" height="68" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                            </div>
                            <div class="fw-bold mt-3">History Login</div>
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
                                        viewBox="0 0 50 50" fill="none">
                                        <path
                                            d="M46.875 48.4375H4.6875C3.8587 48.4375 3.06384 48.1083 2.47779 47.5222C1.89174 46.9362 1.5625 46.1413 1.5625 45.3125V3.125C1.5625 2.7106 1.72712 2.31317 2.02015 2.02015C2.31317 1.72712 2.7106 1.5625 3.125 1.5625C3.5394 1.5625 3.93683 1.72712 4.22985 2.02015C4.52288 2.31317 4.6875 2.7106 4.6875 3.125V45.3125H46.875C47.2894 45.3125 47.6868 45.4771 47.9799 45.7701C48.2729 46.0632 48.4375 46.4606 48.4375 46.875C48.4375 47.2894 48.2729 47.6868 47.9799 47.9799C47.6868 48.2729 47.2894 48.4375 46.875 48.4375Z"
                                            fill="white" />
                                        <path
                                            d="M15.2344 42.1875H11.3281C10.3957 42.1875 9.50151 41.8171 8.8422 41.1578C8.1829 40.4985 7.8125 39.6043 7.8125 38.6719V23.8281C7.8125 22.8957 8.1829 22.0015 8.8422 21.3422C9.50151 20.6829 10.3957 20.3125 11.3281 20.3125H15.2344C16.1668 20.3125 17.061 20.6829 17.7203 21.3422C18.3796 22.0015 18.75 22.8957 18.75 23.8281V38.6719C18.75 39.6043 18.3796 40.4985 17.7203 41.1578C17.061 41.8171 16.1668 42.1875 15.2344 42.1875Z"
                                            fill="white" />
                                        <path
                                            d="M29.2969 42.1875H25.3906C24.4582 42.1875 23.564 41.8171 22.9047 41.1578C22.2454 40.4985 21.875 39.6043 21.875 38.6719V19.1406C21.875 18.2082 22.2454 17.314 22.9047 16.6547C23.564 15.9954 24.4582 15.625 25.3906 15.625H29.2969C30.2293 15.625 31.1235 15.9954 31.7828 16.6547C32.4421 17.314 32.8125 18.2082 32.8125 19.1406V38.6719C32.8125 39.6043 32.4421 40.4985 31.7828 41.1578C31.1235 41.8171 30.2293 42.1875 29.2969 42.1875Z"
                                            fill="white" />
                                        <path
                                            d="M43.3242 42.1875H39.418C38.4856 42.1875 37.5914 41.8171 36.932 41.1578C36.2727 40.4985 35.9023 39.6043 35.9023 38.6719V12.8906C35.9023 11.9582 36.2727 11.064 36.932 10.4047C37.5914 9.7454 38.4856 9.375 39.418 9.375H43.3242C44.2566 9.375 45.1508 9.7454 45.8101 10.4047C46.4694 11.064 46.8398 11.9582 46.8398 12.8906V38.6719C46.8398 39.6043 46.4694 40.4985 45.8101 41.1578C45.1508 41.8171 44.2566 42.1875 43.3242 42.1875Z"
                                            fill="white" />
                                    </svg>
                                </span>
                            </div>
                            <div class="fw-bold mt-3">Tahun Anggaran</div>
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
                                        viewBox="0 0 46 46" fill="none">
                                        <path d="M7.6665 40.2504V26.8337" stroke="white" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.66675 19.1667V5.75" stroke="white" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M23 40.25V23" stroke="white" stroke-width="3" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M23 15.3333V5.75" stroke="white" stroke-width="3" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M38.3335 40.2496V30.6663" stroke="white" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M38.3333 23V5.75" stroke="white" stroke-width="3" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M1.9165 26.8337H13.4165" stroke="white" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M17.25 15.3337H28.75" stroke="white" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M32.5835 30.6663H44.0835" stroke="white" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="fw-bold mt-3">Pengaturan Seksi</div>
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
                        <th style="background-color: #1B3061;color:#ffffff">Nama Pekerja</th>
                        <th style="background-color: #1B3061;color:#ffffff">Tahun</th>
                        <th style="background-color: #1B3061;color:#ffffff">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fs-5">1</td>
                        <td class="fs-5">Arsitektur</td>
                        <td class="fs-5">2023</td>
                        <td><span class="fs-6 badge px-4 py-2"
                                style="background-color: #E4ECFF;color:#1B3061;">Aktif</span></td>
                    </tr>
                    <tr>
                        <td class="fs-5">2</td>
                        <td class="fs-5">Arsitektur</td>
                        <td class="fs-5">2023</td>
                        <td><span class="fs-6 badge text-bg-danger px-4 py-2">Non Aktif</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
