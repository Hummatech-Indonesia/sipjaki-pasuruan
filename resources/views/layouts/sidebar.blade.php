<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                @if (Auth::user()->roles->pluck('name')[0] == 'superadmin')
                    <li>
                        <a href="{{ route('dashboard-superadmin') }}" class="waves-effect">
                            <i class="bx bxs-dashboard"></i>
                            <span key="t-file-manager">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20"
                                viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="M8 7a4 4 0 1 0 8 0a4 4 0 1 0-8 0M2.5 17a4 4 0 1 0 8 0a4 4 0 1 0-8 0m11 0a4 4 0 1 0 8 0a4 4 0 1 0-8 0" />
                            </svg>
                            <span key="t-multi-level">Master</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li>
                                <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">Penyedia Jasa</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li id="kualifikasi-jasa"><a href="{{ route('qualifications.index') }}"
                                            id="kualifikasi-link-jasa" key="t-tui-calendar">Kualifikasi</a></li>
                                    <li id="klasisikasi-jasa"><a href="{{ route('classifications.index') }}"
                                            id="klasifikasi-link-jasa" key="t-full-calendar">Klasifikasi</a></li>
                                    <li><a href="{{ route('contract-categories.index') }}"
                                            key="t-full-calendar">Kategori Kontrak</a></li>
                                    <li><a href="{{ route('associations.index') }}" key="t-full-calendar">Assosiasi</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">Pelatihan</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li id="kualifikasi-training"><a
                                            href="{{ route('qualification-trainings.index') }}"
                                            id="kualifikasi-link-training" key="t-tui-calendar">Kualifikasi</a></li>
                                    <li id="klasifikasi-training"><a
                                            href="{{ route('classification-training.index') }}" key="t-full-calendar"
                                            id="klasifikasi-link-training">Klasifikasi</a></li>
                                    <li><a href="{{ route('training-methods.index') }}" key="t-full-calendar">Metode
                                            Pelatihan</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('all.agency') }}" key="t-tui-calendar">Dinas</a></li>
                            <li>
                                <a href="{{ route('rule-categories.index') }}" class="waves-effect">
                                    <span key="t-file-manager">Kategori Peraturan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('fund-sources.index') }}" class="waves-effect">
                                    <span key="t-file-manager">Sumber Dana</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('fiscal-years.index') }}" class="waves-effect">
                                    <span key="t-file-manager">Tahun Anggaran</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20"
                                viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="M8 7a4 4 0 1 0 8 0a4 4 0 1 0-8 0M2.5 17a4 4 0 1 0 8 0a4 4 0 1 0-8 0m11 0a4 4 0 1 0 8 0a4 4 0 1 0-8 0" />
                            </svg>
                            <span key="t-multi-level">Pengguna</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li>
                                <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">Penyedia Jasa</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="/service-provider-consultants" key="t-level-2-1">konsultan</a></li>
                                    <li><a href="/service-provider-executors" key="t-level-2-2">Pelaksana</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 42 42" fill="currentColor">
                                <path
                                    d="M17.5 7V10.5H24.5V7H17.5ZM28 7H29.75C30.6783 7 31.5685 7.36875 32.2249 8.02513C32.8813 8.6815 33.25 9.57174 33.25 10.5V35C33.25 35.9283 32.8813 36.8185 32.2249 37.4749C31.5685 38.1312 30.6783 38.5 29.75 38.5H12.25C11.3217 38.5 10.4315 38.1312 9.77513 37.4749C9.11875 36.8185 8.75 35.9283 8.75 35V10.5C8.75 9.57174 9.11875 8.6815 9.77513 8.02513C10.4315 7.36875 11.3217 7 12.25 7H14C14 6.07174 14.3687 5.1815 15.0251 4.52513C15.6815 3.86875 16.5717 3.5 17.5 3.5H24.5C25.4283 3.5 26.3185 3.86875 26.9749 4.52513C27.6313 5.1815 28 6.07174 28 7ZM28 10.5C28 11.4283 27.6313 12.3185 26.9749 12.9749C26.3185 13.6313 25.4283 14 24.5 14H17.5C16.5717 14 15.6815 13.6313 15.0251 12.9749C14.3687 12.3185 14 11.4283 14 10.5H12.25V35H29.75V10.5H28ZM15.75 17.5H26.25C26.7141 17.5 27.1592 17.6844 27.4874 18.0126C27.8156 18.3408 28 18.7859 28 19.25C28 19.7141 27.8156 20.1592 27.4874 20.4874C27.1592 20.8156 26.7141 21 26.25 21H15.75C15.2859 21 14.8408 20.8156 14.5126 20.4874C14.1844 20.1592 14 19.7141 14 19.25C14 18.7859 14.1844 18.3408 14.5126 18.0126C14.8408 17.6844 15.2859 17.5 15.75 17.5ZM15.75 26.25H26.25C26.7141 26.25 27.1592 26.4344 27.4874 26.7626C27.8156 27.0908 28 27.5359 28 28C28 28.4641 27.8156 28.9092 27.4874 29.2374C27.1592 29.5656 26.7141 29.75 26.25 29.75H15.75C15.2859 29.75 14.8408 29.5656 14.5126 29.2374C14.1844 28.9092 14 28.4641 14 28C14 27.5359 14.1844 27.0908 14.5126 26.7626C14.8408 26.4344 15.2859 26.25 15.75 26.25Z"
                                    fill="currentColor" />
                            </svg>
                            <span key="t-dashboards" class="px-2">Approval
                            </span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('service.provider.qualification.pending') }}"
                                    key="t-tui-calendar">Kualifikasi</a></li>
                        </ul>
                    </li>
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
                    <li id="training-admin">
                        <a href="{{ route('training') }}" id="training-link-admin" class="waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
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
                            <span key="t-dashboards" class="px-2">Pelatihan
                            </span>
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
                    <li>
                        <a href="{{ route('history-login.index') }}" class="waves-effect">
                            <i class="bx bx-history"></i>
                            <span key="t-file-manager">History Login</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->roles->pluck('name')[0] == 'admin')
                    <li>
                        <a href="{{ route('dashboard-admin') }}" class="waves-effect">
                            <i class="bx bxs-dashboard"></i>
                            <span key="t-file-manager">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 42 42" fill="currentColor">
                                <path
                                    d="M17.5 7V10.5H24.5V7H17.5ZM28 7H29.75C30.6783 7 31.5685 7.36875 32.2249 8.02513C32.8813 8.6815 33.25 9.57174 33.25 10.5V35C33.25 35.9283 32.8813 36.8185 32.2249 37.4749C31.5685 38.1312 30.6783 38.5 29.75 38.5H12.25C11.3217 38.5 10.4315 38.1312 9.77513 37.4749C9.11875 36.8185 8.75 35.9283 8.75 35V10.5C8.75 9.57174 9.11875 8.6815 9.77513 8.02513C10.4315 7.36875 11.3217 7 12.25 7H14C14 6.07174 14.3687 5.1815 15.0251 4.52513C15.6815 3.86875 16.5717 3.5 17.5 3.5H24.5C25.4283 3.5 26.3185 3.86875 26.9749 4.52513C27.6313 5.1815 28 6.07174 28 7ZM28 10.5C28 11.4283 27.6313 12.3185 26.9749 12.9749C26.3185 13.6313 25.4283 14 24.5 14H17.5C16.5717 14 15.6815 13.6313 15.0251 12.9749C14.3687 12.3185 14 11.4283 14 10.5H12.25V35H29.75V10.5H28ZM15.75 17.5H26.25C26.7141 17.5 27.1592 17.6844 27.4874 18.0126C27.8156 18.3408 28 18.7859 28 19.25C28 19.7141 27.8156 20.1592 27.4874 20.4874C27.1592 20.8156 26.7141 21 26.25 21H15.75C15.2859 21 14.8408 20.8156 14.5126 20.4874C14.1844 20.1592 14 19.7141 14 19.25C14 18.7859 14.1844 18.3408 14.5126 18.0126C14.8408 17.6844 15.2859 17.5 15.75 17.5ZM15.75 26.25H26.25C26.7141 26.25 27.1592 26.4344 27.4874 26.7626C27.8156 27.0908 28 27.5359 28 28C28 28.4641 27.8156 28.9092 27.4874 29.2374C27.1592 29.5656 26.7141 29.75 26.25 29.75H15.75C15.2859 29.75 14.8408 29.5656 14.5126 29.2374C14.1844 28.9092 14 28.4641 14 28C14 27.5359 14.1844 27.0908 14.5126 26.7626C14.8408 26.4344 15.2859 26.25 15.75 26.25Z"
                                    fill="currentColor" />
                            </svg>
                            <span key="t-dashboards" class="px-2">Approval
                            </span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('service.provider.qualification.pending') }}"
                                    key="t-tui-calendar">Kualifikasi</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20"
                                viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="M8 7a4 4 0 1 0 8 0a4 4 0 1 0-8 0M2.5 17a4 4 0 1 0 8 0a4 4 0 1 0-8 0m11 0a4 4 0 1 0 8 0a4 4 0 1 0-8 0" />
                            </svg>
                            <span key="t-multi-level">Pengguna</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="{{ route('all.agency') }}" key="t-tui-calendar">Dinas</a></li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">Penyedia Jasa</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="/service-provider-consultants" key="t-level-2-1">konsultan</a></li>
                                    <li><a href="/service-provider-executors" key="t-level-2-2">Pelaksana</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
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
                    <li id="training-admin">
                        <a href="{{ route('training') }}" id="training-link-admin" class="waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
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
                            <span key="t-dashboards" class="px-2">Pelatihan
                            </span>
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
                        <a href="{{ route('dashboard-dinas') }}" class="waves-effect">
                            <i class="bx bxs-dashboard"></i>
                            <span key="t-file-manager">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('accident.index') }}" class="waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 60 60" fill="currentColor">
                                <path
                                    d="M32.5 40C32.5 41.3807 31.3807 42.5 30 42.5C28.6193 42.5 27.5 41.3807 27.5 40C27.5 38.6193 28.6193 37.5 30 37.5C31.3807 37.5 32.5 38.6193 32.5 40Z"
                                    fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18.9124 5.73223C19.3813 5.26339 20.0172 5 20.6802 5L39.3198 5C39.9828 5 40.6187 5.26339 41.0876 5.73223L54.2678 18.9124C54.7366 19.3813 55 20.0172 55 20.6802V39.3198C55 39.9828 54.7366 40.6187 54.2678 41.0876L41.0876 54.2678C40.6187 54.7366 39.9828 55 39.3198 55H20.6802C20.0172 55 19.3813 54.7366 18.9124 54.2678L5.73223 41.0876C5.26339 40.6187 5 39.9828 5 39.3198L5 20.6802C5 20.0172 5.26339 19.3813 5.73223 18.9124L18.9124 5.73223ZM21.7157 10L10 21.7157L10 38.2843L21.7157 50H38.2843L50 38.2843V21.7157L38.2843 10L21.7157 10ZM30 17.5C31.3807 17.5 32.5 18.6193 32.5 20V30C32.5 31.3807 31.3807 32.5 30 32.5C28.6193 32.5 27.5 31.3807 27.5 30V20C27.5 18.6193 28.6193 17.5 30 17.5Z"
                                    fill="currentColor" />
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
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-briefcase"></i>
                            <span key="t-multi-level">Paket Pekerjaan</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="{{ route('work.package') }}" key="t-tui-calendar">Paket</a></li>
                            <li><a href="consultant-package" key="t-tui-calendar">Paket Konsultan</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('workers.index') }}" class="waves-effect">
                            <i class="fas fa-users-cog
                        fa-sm"></i>
                            <span key="t-file-manager">Tenaga Kerja</span>
                        </a>
                    </li>
                    <li>
                    <li>
                        <a href="{{ route('officers.index') }}" class="waves-effect">
                            <i class="fas fa-user-tie fa-sm"></i>
                            <span key="t-file-manager">Pengurus</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('service-provider-profile') }}" class="waves-effect">
                            <i class="fas fa-user-circle"></i>
                            <span key="t-file-manager">Profile Penyedia Jasa</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
