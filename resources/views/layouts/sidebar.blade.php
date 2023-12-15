<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                @if (Auth::user()->roles->pluck('name')[0] == 'superadmin')
                    <li>
                        <a href="{{ route('rule-categories.index') }}" class="waves-effect">
                            <i class="fas fa-clipboard"></i>
                            <span key="t-file-manager">Kategori Peraturan</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('fund-sources.index') }}" class="waves-effect">
                            <i class="bx bx-bx bx-money"></i>
                            <span key="t-file-manager">Sumber Dana</span>
                        </a>
                    </li>
                    <li
                        class="{{ request()->routeIs('classifications.*') || request()->routeIs('sub-classfication.*') ? 'mm-active' : '' }}">
                        <a href="{{ route('classifications.index') }}"
                            class="waves-effect {{ request()->routeIs('classifications.*') || request()->routeIs('sub-classfication.*') ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 42 42"
                                fill="currentColor">
                                <path
                                    d="M17.5 7V10.5H24.5V7H17.5ZM28 7H29.75C30.6783 7 31.5685 7.36875 32.2249 8.02513C32.8813 8.6815 33.25 9.57174 33.25 10.5V35C33.25 35.9283 32.8813 36.8185 32.2249 37.4749C31.5685 38.1312 30.6783 38.5 29.75 38.5H12.25C11.3217 38.5 10.4315 38.1312 9.77513 37.4749C9.11875 36.8185 8.75 35.9283 8.75 35V10.5C8.75 9.57174 9.11875 8.6815 9.77513 8.02513C10.4315 7.36875 11.3217 7 12.25 7H14C14 6.07174 14.3687 5.1815 15.0251 4.52513C15.6815 3.86875 16.5717 3.5 17.5 3.5H24.5C25.4283 3.5 26.3185 3.86875 26.9749 4.52513C27.6313 5.1815 28 6.07174 28 7ZM28 10.5C28 11.4283 27.6313 12.3185 26.9749 12.9749C26.3185 13.6313 25.4283 14 24.5 14H17.5C16.5717 14 15.6815 13.6313 15.0251 12.9749C14.3687 12.3185 14 11.4283 14 10.5H12.25V35H29.75V10.5H28ZM15.75 17.5H26.25C26.7141 17.5 27.1592 17.6844 27.4874 18.0126C27.8156 18.3408 28 18.7859 28 19.25C28 19.7141 27.8156 20.1592 27.4874 20.4874C27.1592 20.8156 26.7141 21 26.25 21H15.75C15.2859 21 14.8408 20.8156 14.5126 20.4874C14.1844 20.1592 14 19.7141 14 19.25C14 18.7859 14.1844 18.3408 14.5126 18.0126C14.8408 17.6844 15.2859 17.5 15.75 17.5ZM15.75 26.25H26.25C26.7141 26.25 27.1592 26.4344 27.4874 26.7626C27.8156 27.0908 28 27.5359 28 28C28 28.4641 27.8156 28.9092 27.4874 29.2374C27.1592 29.5656 26.7141 29.75 26.25 29.75H15.75C15.2859 29.75 14.8408 29.5656 14.5126 29.2374C14.1844 28.9092 14 28.4641 14 28C14 27.5359 14.1844 27.0908 14.5126 26.7626C14.8408 26.4344 15.2859 26.25 15.75 26.25Z"
                                    fill="currentColor" />
                            </svg>
                            <span key="t-file-manager" class="px-2">Klasifikasi</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('training-methods.index') }}" class="waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 44 44"
                                fill="currentColor">
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
                            <span class="px-2" key="t-file-manager">Metode Pelatihan</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('fiscal-years.index') }}" class="waves-effect">
                            <i class="bx bx-bar-chart-alt"></i>
                            <span key="t-file-manager">Tahun Anggaran</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('qualifications.*') ? 'mm-active' : '' }}">
                        <a href="{{ route('qualifications.index') }}"
                            class="waves-effect {{ request()->routeIs('qualifications.*') ? 'active' : '' }}">
                            <i class="bx bx-sitemap"></i>
                            <span key="t-file-manager">Kualifikasi</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contract-categories.index') }}" class="waves-effect">
                            <i class="bx bx-bx bx-task"></i>
                            <span key="t-file-manager">Kategori Kontrak</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('history-login.index') }}" class="waves-effect">
                            <i class="bx bx-history"></i>
                            <span key="t-file-manager">History Login</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sections.index') }}" class="waves-effect">
                            <i class="bx bx-slider"></i>
                            <span key="t-file-manager">Pengaturan Seksi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('fields.index') }}" class="waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20"
                                viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="M8 7a4 4 0 1 0 8 0a4 4 0 1 0-8 0M2.5 17a4 4 0 1 0 8 0a4 4 0 1 0-8 0m11 0a4 4 0 1 0 8 0a4 4 0 1 0-8 0" />
                            </svg>
                            <span key="t-file-manager">Bidang</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('types.index') }}" class="waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20"
                                viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2">
                                    <path d="M4 6a8 3 0 1 0 16 0A8 3 0 1 0 4 6" />
                                    <path d="M4 6v6a8 3 0 0 0 16 0V6" />
                                    <path d="M4 12v6a8 3 0 0 0 16 0v-6" />
                                </g>
                            </svg>
                            <span key="t-file-manager">Type</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('all.service.provider') }}" class="waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 38 38" fill="none">
                                <path
                                    d="M12.6665 3.16602H25.3332C27.8527 3.16602 30.2691 4.16691 32.0507 5.9485C33.8323 7.7301 34.8332 10.1465 34.8332 12.666V25.3327C34.8332 27.8522 33.8323 30.2686 32.0507 32.0502C30.2691 33.8318 27.8527 34.8327 25.3332 34.8327H12.6665C10.1469 34.8327 7.73058 33.8318 5.94899 32.0502C4.16739 30.2686 3.1665 27.8522 3.1665 25.3327L3.1665 12.666C3.1665 10.1465 4.16739 7.7301 5.94899 5.9485C7.73058 4.16691 10.1469 3.16602 12.6665 3.16602V3.16602ZM22.1665 17.416C21.7466 17.416 21.3439 17.5828 21.0469 17.8798C20.75 18.1767 20.5832 18.5794 20.5832 18.9993C20.5832 19.4193 20.75 19.822 21.0469 20.1189C21.3439 20.4159 21.7466 20.5827 22.1665 20.5827H26.9165C27.3364 20.5827 27.7392 20.4159 28.0361 20.1189C28.333 19.822 28.4998 19.4193 28.4998 18.9993C28.4998 18.5794 28.333 18.1767 28.0361 17.8798C27.7392 17.5828 27.3364 17.416 26.9165 17.416H22.1665ZM18.9998 23.7493C18.5799 23.7493 18.1772 23.9162 17.8803 24.2131C17.5833 24.51 17.4165 24.9128 17.4165 25.3327C17.4165 25.7526 17.5833 26.1553 17.8803 26.4523C18.1772 26.7492 18.5799 26.916 18.9998 26.916H26.9165C27.3364 26.916 27.7392 26.7492 28.0361 26.4523C28.333 26.1553 28.4998 25.7526 28.4998 25.3327C28.4998 24.9128 28.333 24.51 28.0361 24.2131C27.7392 23.9162 27.3364 23.7493 26.9165 23.7493H18.9998ZM18.9998 11.0827C18.5799 11.0827 18.1772 11.2495 17.8803 11.5464C17.5833 11.8434 17.4165 12.2461 17.4165 12.666C17.4165 13.0859 17.5833 13.4887 17.8803 13.7856C18.1772 14.0825 18.5799 14.2493 18.9998 14.2493H26.9165C27.3364 14.2493 27.7392 14.0825 28.0361 13.7856C28.333 13.4887 28.4998 13.0859 28.4998 12.666C28.4998 12.2461 28.333 11.8434 28.0361 11.5464C27.7392 11.2495 27.3364 11.0827 26.9165 11.0827H18.9998ZM12.3942 19.3841L11.2748 18.2647C11.1287 18.1135 10.954 17.9928 10.7608 17.9099C10.5676 17.8269 10.3599 17.7832 10.1496 17.7814C9.9394 17.7795 9.73091 17.8196 9.53633 17.8992C9.34174 17.9788 9.16496 18.0964 9.01629 18.2451C8.86763 18.3937 8.75006 18.5705 8.67045 18.7651C8.59084 18.9597 8.55078 19.1682 8.55261 19.3784C8.55443 19.5886 8.59811 19.7964 8.68109 19.9896C8.76407 20.1827 8.8847 20.3575 9.03592 20.5035L11.2748 22.7423C11.4218 22.8896 11.5964 23.0063 11.7886 23.086C11.9809 23.1657 12.1869 23.2067 12.395 23.2067C12.603 23.2067 12.8091 23.1657 13.0013 23.086C13.1935 23.0063 13.3681 22.8896 13.5152 22.7423L17.9928 18.2647C18.2901 17.9678 18.4573 17.565 18.4576 17.1448C18.4579 16.7246 18.2913 16.3216 17.9944 16.0243C17.6975 15.727 17.2947 15.5598 16.8745 15.5595C16.4544 15.5592 16.0513 15.7258 15.754 16.0227L12.3942 19.3825V19.3841Z"
                                    fill="currentColor" />
                            </svg> <span key="t-file-manager" class="px-2">Penyedia Jasa</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->roles->pluck('name')[0] == 'admin')
                    <li>
                        <a href="{{ route('news.index') }}" class="waves-effect">
                            <i class="bx bx-news"></i>
                            <span key="t-file-manager">Berita</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('agencies.index') }}" class="waves-effect">
                            <i class="bx bx-user-plus"></i>
                            <span key="t-file-manager">Dinas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('training') }}" class="waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 36 36" fill="currentColor">
                                <path
                                    d="M27 13.5V18M27 18V22.5M27 18H31.5M27 18H22.5M19.5 10.5C19.5 13.8137 16.8137 16.5 13.5 16.5C10.1863 16.5 7.5 13.8137 7.5 10.5C7.5 7.18629 10.1863 4.5 13.5 4.5C16.8137 4.5 19.5 7.18629 19.5 10.5ZM4.5 30C4.5 25.0294 8.52944 21 13.5 21C18.4706 21 22.5 25.0294 22.5 30V31.5H4.5V30Z"
                                    stroke="white" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <span key="t-file-manager">Pelatihan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('rules.index') }}" class="waves-effect">
                            <i class="fas fa-clipboard"></i>
                            <span key="t-file-manager">Peraturan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('faqs.index') }}" class="waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                viewBox="0 0 44 44" fill="currentColor">
                                <path
                                    d="M34.2032 7.03313C30.7354 4.25847 26.4259 2.74781 21.9846 2.75C16.7493 2.75 11.8595 4.76696 8.20369 8.42961C4.6708 11.9737 2.73462 16.653 2.75009 21.6021C2.75021 25.2306 3.81547 28.7793 5.81376 31.8081L5.83009 31.8313C5.85415 31.8665 5.87908 31.9017 5.904 31.9361C5.92892 31.9705 5.95986 32.0152 5.96673 32.0263L5.98564 32.0607C6.08275 32.2326 6.15751 32.4423 6.09134 32.6537L4.50837 38.3823C4.44505 38.5953 4.41037 38.8158 4.40525 39.038C4.4041 39.6225 4.63479 40.1836 5.04671 40.5982C5.45864 41.0129 6.01819 41.2473 6.60267 41.25C6.91153 41.2398 7.2159 41.1731 7.50072 41.0532L13.3006 38.9598L13.3737 38.9314C13.5315 38.8652 13.701 38.8315 13.8721 38.8326C14.0299 38.833 14.1863 38.8621 14.3336 38.9185C14.4728 38.9727 15.737 39.4565 17.0707 39.8295C18.1793 40.1388 20.4859 40.6029 22.2931 40.6029C27.4193 40.6029 32.206 38.6177 35.7707 35.0118C39.3045 31.4334 41.2501 26.6767 41.2501 21.6124C41.2505 20.3125 41.1129 19.0161 40.8393 17.7452C39.9507 13.567 37.5943 9.76164 34.2032 7.03313ZM13.7501 24.75C13.2062 24.75 12.6745 24.5887 12.2223 24.2865C11.77 23.9844 11.4176 23.5549 11.2094 23.0524C11.0013 22.5499 10.9468 21.997 11.0529 21.4635C11.159 20.9301 11.421 20.4401 11.8055 20.0555C12.1901 19.6709 12.6801 19.409 13.2136 19.3028C13.747 19.1967 14.3 19.2512 14.8025 19.4593C15.305 19.6675 15.7345 20.0199 16.0366 20.4722C16.3388 20.9244 16.5001 21.4561 16.5001 22C16.5001 22.7293 16.2104 23.4288 15.6946 23.9445C15.1789 24.4603 14.4794 24.75 13.7501 24.75ZM22.0001 24.75C21.4562 24.75 20.9245 24.5887 20.4723 24.2865C20.02 23.9844 19.6676 23.5549 19.4594 23.0524C19.2513 22.5499 19.1968 21.997 19.3029 21.4635C19.409 20.9301 19.671 20.4401 20.0555 20.0555C20.4401 19.6709 20.9301 19.409 21.4636 19.3028C21.997 19.1967 22.55 19.2512 23.0525 19.4593C23.555 19.6675 23.9845 20.0199 24.2866 20.4722C24.5888 20.9244 24.7501 21.4561 24.7501 22C24.7501 22.7293 24.4604 23.4288 23.9446 23.9445C23.4289 24.4603 22.7294 24.75 22.0001 24.75ZM30.2501 24.75C29.7062 24.75 29.1745 24.5887 28.7223 24.2865C28.27 23.9844 27.9176 23.5549 27.7094 23.0524C27.5013 22.5499 27.4468 21.997 27.5529 21.4635C27.659 20.9301 27.921 20.4401 28.3055 20.0555C28.6901 19.6709 29.1801 19.409 29.7136 19.3028C30.247 19.1967 30.8 19.2512 31.3025 19.4593C31.805 19.6675 32.2345 20.0199 32.5366 20.4722C32.8388 20.9244 33.0001 21.4561 33.0001 22C33.0001 22.7293 32.7104 23.4288 32.1946 23.9445C31.6789 24.4603 30.9794 24.75 30.2501 24.75Z"
                                    fill="currentColor" />
                            </svg>
                            <span key="t-file-manager" class="px-2">FAQ</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('images.index') }}" class="waves-effect">
                            <i class="bx bx-image-add"></i>
                            <span key="t-file-manager">Input Image</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->roles->pluck('name')[0] == 'dinas')
                    <li>
                        <a href="{{ route('accident') }}" class="waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-2q3.35 0 5.675-2.325T20 12q0-1.35-.438-2.6T18.3 7.1L7.1 18.3q1.05.825 2.3 1.263T12 20Zm-6.3-3.1L16.9 5.7q-1.05-.825-2.3-1.262T12 4Q8.65 4 6.325 6.325T4 12q0 1.35.437 2.6T5.7 16.9Z" />
                            </svg>
                            <span key="t-file-manager" class="px-2">Kecelakaan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('projects.index') }}" class="waves-effect">
                            <i class="bx bxs-package"></i>
                            <span key="t-file-manager">Paket Pekerjaan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/profile-OPD" class="waves-effect">
                            <i class="bx bxs-user-circle"></i>
                            <span key="t-file-manager">Profile OPD</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->roles->pluck('name')[0] == 'service provider')
                    <li>
                        <a href="{{ route('dashboard-service-provider') }}" class="waves-effect">
                            <i class="bx bxs-dashboard"></i>
                            <span key="t-file-manager">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('work.package') }}" class="waves-effect">
                            <i class="bx bx-briefcase"></i>
                            <span key="t-file-manager">Paket Pekerjaan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('workers.index') }}" class="waves-effect">
                            <i class="fas fa-users-cog
                        fa-sm"></i>
                            <span key="t-file-manager">Tenaga Kerja</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
