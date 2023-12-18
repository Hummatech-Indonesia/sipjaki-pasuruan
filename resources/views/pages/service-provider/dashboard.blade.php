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
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium">Jumlah Tenaga Kerja</p>
                            <h4 style="color: #1B3061" class="mb-0">{{ $countWorker }}</h4>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <div class="mini-stat-icon avatar-sm rounded-circle">
                                <span class="avatar-title">
                                    <i class="fas fa-users-cog fa-2x"></i>
                                </span>
                            </div>
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
                            <p class="text-muted fw-medium">Jumlah Pekerja Aktif</p>
                            <h4 class="mb-0" style="color: #1B3061">{{ $countExperience }}</h4>
                        </div>

                        <div class="flex-shrink-0 align-self-center ">
                            <div class="avatar-sm rounded-circle mini-stat-icon">
                                <span class="avatar-title rounded-circle ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 60 60" fill="none">
                                        <path
                                            d="M53.2793 19.8516C52.9317 19.5015 52.5182 19.2239 52.0625 19.0348C51.6069 18.8457 51.1183 18.7489 50.625 18.75H43.125V16.875C43.125 13.394 41.7422 10.0556 39.2808 7.59422C36.8194 5.13281 33.481 3.75 30 3.75C26.519 3.75 23.1806 5.13281 20.7192 7.59422C18.2578 10.0556 16.875 13.394 16.875 16.875V18.75H9.375C8.38044 18.75 7.42661 19.1451 6.72335 19.8484C6.02009 20.5516 5.625 21.5054 5.625 22.5V47.8125C5.625 52.3828 9.49219 56.25 14.0625 56.25H45.9375C48.1482 56.2507 50.2715 55.3863 51.8531 53.8418C52.6491 53.0824 53.2829 52.1697 53.7164 51.1586C54.1498 50.1475 54.3739 49.0591 54.375 47.959V22.5C54.3765 22.008 54.2805 21.5206 54.0924 21.066C53.9043 20.6114 53.628 20.1987 53.2793 19.8516ZM38.9637 32.1094L28.4637 45.2344C28.2912 45.4498 28.0734 45.6245 27.8256 45.7461C27.5779 45.8676 27.3064 45.933 27.0305 45.9375H27C26.7292 45.9375 26.4616 45.8789 26.2156 45.7656C25.9696 45.6523 25.751 45.4871 25.575 45.2812L21.075 40.0219C20.915 39.8347 20.7933 39.6179 20.7171 39.3838C20.6408 39.1496 20.6114 38.9028 20.6306 38.6573C20.6497 38.4118 20.7171 38.1725 20.8287 37.953C20.9403 37.7335 21.0941 37.5382 21.2813 37.3781C21.4684 37.2181 21.6852 37.0965 21.9193 37.0202C22.1535 36.944 22.4003 36.9146 22.6458 36.9337C22.8913 36.9529 23.1307 37.0202 23.3501 37.1318C23.5696 37.2435 23.765 37.3972 23.925 37.5844L26.9531 41.1223L36.0363 29.7656C36.3471 29.3771 36.7995 29.128 37.294 29.0731C37.7885 29.0181 38.2845 29.1619 38.673 29.4727C39.0616 29.7835 39.3107 30.2359 39.3656 30.7303C39.4206 31.2248 39.2768 31.7209 38.966 32.1094H38.9637ZM39.375 18.75H20.625V16.875C20.625 14.3886 21.6127 12.004 23.3709 10.2459C25.129 8.48772 27.5136 7.5 30 7.5C32.4864 7.5 34.871 8.48772 36.6291 10.2459C38.3873 12.004 39.375 14.3886 39.375 16.875V18.75Z"
                                            fill="white" />
                                    </svg>
                                </span>
                            </div>
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
                            <p class="text-muted fw-medium">Jumlah Paket Pekerjaan</p>
                            <h4 class="mb-0" style="color: #1B3061">{{ $countAllExperience }}</h4>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <div class="avatar-sm rounded-circle mini-stat-icon">
                                <span class="avatar-title rounded-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 60 60" fill="none">
                                        <path
                                            d="M59.0127 14.7897C58.8751 14.5066 58.6718 14.2605 58.4198 14.0719C58.1678 13.8833 57.8744 13.7577 57.564 13.7055C57.2536 13.6533 56.9352 13.6761 56.6354 13.7719C56.3355 13.8678 56.063 14.0339 55.8404 14.2565L49.8463 20.2506C49.6018 20.4918 49.2721 20.627 48.9287 20.627C48.5853 20.627 48.2556 20.4918 48.0111 20.2506L45.3767 17.6163C45.1358 17.3714 45.0007 17.0416 45.0007 16.6981C45.0007 16.3546 45.1358 16.0248 45.3767 15.7799L51.3392 9.81627C51.5674 9.58815 51.7361 9.30761 51.8308 8.99917C51.9254 8.69074 51.943 8.36382 51.8821 8.047C51.8212 7.73018 51.6835 7.43312 51.4812 7.1818C51.2789 6.93047 51.0181 6.73255 50.7217 6.60533C46.0681 4.61315 40.2826 5.73229 36.6592 9.33463C33.5174 12.453 32.5775 17.3034 34.081 22.6588C34.1459 22.8887 34.1456 23.132 34.0802 23.3617C34.0148 23.5914 33.8869 23.7984 33.7107 23.9596L13.449 42.7858C12.7778 43.3897 12.2365 44.1239 11.8582 44.9437C11.4798 45.7635 11.2724 46.6518 11.2484 47.5544C11.2245 48.457 11.3846 49.355 11.7189 50.1938C12.0532 51.0325 12.5548 51.7944 13.1931 52.433C13.8314 53.0716 14.593 53.5736 15.4316 53.9083C16.2702 54.2431 17.1681 54.4036 18.0707 54.3801C18.9733 54.3566 19.8617 54.1496 20.6817 53.7717C21.5017 53.3938 22.2362 52.8528 22.8404 52.1819L41.8353 31.885C41.9944 31.7128 42.1973 31.5872 42.4224 31.5218C42.6475 31.4563 42.8861 31.4535 43.1127 31.5135C48.3861 32.9198 53.1908 31.9823 56.2881 28.9354C58.0693 27.1776 59.3127 24.6967 59.7908 21.9381C60.2396 19.3366 59.956 16.7303 59.0127 14.7897Z"
                                            fill="white" />
                                        <path
                                            d="M51.2508 44.3441C49.6172 42.9859 46.1273 39.8441 42.5707 36.584L34.8281 44.8586C38.1375 48.3742 41.1328 51.6379 42.4453 53.1648L42.4535 53.1742C42.7688 53.5351 43.1545 53.8277 43.587 54.034C44.0194 54.2404 44.4895 54.3561 44.9684 54.3742H45.0973C46.018 54.3715 46.9011 54.009 47.5582 53.3641L47.5664 53.3559L51.484 49.4453C51.8243 49.1058 52.0899 48.6989 52.2639 48.2508C52.4379 47.8027 52.5163 47.3231 52.4943 46.8429C52.4722 46.3627 52.3501 45.8924 52.1358 45.4621C51.9214 45.0318 51.6196 44.651 51.2496 44.3441H51.2508Z"
                                            fill="white" />
                                        <path
                                            d="M13.8913 25.1426C13.8932 24.6978 13.7715 24.2613 13.5398 23.8816C13.5073 23.8303 13.4899 23.7709 13.4897 23.7101C13.4894 23.6494 13.5063 23.5898 13.5383 23.5382C13.5704 23.4866 13.6163 23.4451 13.6709 23.4183C13.7254 23.3916 13.7864 23.3808 13.8468 23.3871H13.8538C13.9523 23.3977 14.4784 23.4738 15.2249 23.9273C15.7792 24.2637 17.3612 25.343 20.1151 28.0922C20.0858 29.0285 20.3852 29.9456 20.9612 30.6844L28.7226 23.4715C28.0352 22.8206 27.137 22.438 26.1913 22.3934C26.1825 22.3837 26.1743 22.3736 26.1667 22.3629L26.0905 22.282L23.2148 18.3164C22.8951 17.8823 22.6854 17.3771 22.6038 16.8442C22.5221 16.3113 22.5709 15.7666 22.746 15.2566C23.0098 14.4972 23.4896 13.8313 24.1265 13.3406C24.7933 12.8238 26.298 12.2016 27.5765 12.0961C28.172 12.0469 28.7716 12.084 29.3566 12.2063C29.6368 12.2739 29.913 12.3572 30.1839 12.4559C30.266 12.4865 30.3502 12.5112 30.4359 12.5297C30.8078 12.6121 31.1961 12.5792 31.5489 12.4355C31.9017 12.2917 32.2024 12.0438 32.4109 11.7249C32.6193 11.406 32.7257 11.0312 32.7158 10.6503C32.7058 10.2694 32.5801 9.90061 32.3554 9.59297C32.3249 9.55196 32.2007 9.38321 32.0167 9.15586C31.6734 8.7229 31.2973 8.31701 30.8917 7.9418C29.9366 7.0793 27.4616 5.625 24.212 5.625C22.3524 5.62364 20.51 5.98177 18.7862 6.67969C14.2898 8.49024 11.3483 10.9664 9.99601 12.2801L9.98546 12.2906C9.0755 13.1891 8.23298 14.1535 7.46476 15.1758C7.17433 15.5853 6.98553 16.0581 6.91397 16.5551C6.88054 16.7665 6.76937 16.9578 6.60224 17.0916C6.43511 17.2253 6.22407 17.2919 6.01046 17.2781C5.96827 17.2781 5.92491 17.2781 5.88272 17.2781C5.24388 17.2739 4.62927 17.5224 4.17296 17.9695L0.721786 21.334L0.684286 21.3715C0.250161 21.8225 0.00531667 22.4227 8.55723e-05 23.0487C-0.00514552 23.6747 0.229634 24.2789 0.656161 24.7371C0.678426 24.7605 0.69952 24.7828 0.722958 24.8051L6.28936 30.2344C6.74799 30.6837 7.36408 30.9361 8.00616 30.9375C8.64501 30.9418 9.25961 30.6932 9.71593 30.2461L13.1683 26.8723C13.3985 26.6471 13.5812 26.378 13.7054 26.0808C13.8296 25.7837 13.8928 25.4646 13.8913 25.1426Z"
                                            fill="white" />
                                    </svg>
                                </span>
                            </div>
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
        <h5 class="mb-1">
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
                    @forelse ($experiences as $experience)
                    <tr>
                        <td class="fs-5">{{ $loop->iteration }}</td>
                        <td class="fs-5">{{ $experience->name }}</td>
                        <td class="fs-5">{{ $experience->year }}</td>
                        <td>
                            <span class="fs-6 badge px-4 py-2" style="background-color: {{ $experience->status == 'nonactive' ? '#FF0000' : '#E4ECFF' }}; color: {{ $experience->status == 'nonactive' ? '#FFFFFF' : '#1B3061' }}">
                                {{ $experience->status }}
                            </span>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            <div class="d-flex justify-content-center" style="min-height:16rem">
                                <div class="my-auto">
                                    <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                    <h4 class="text-center mt-4">Tidak Ada Pekerjaan Yang Aktif !!</h4>
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
