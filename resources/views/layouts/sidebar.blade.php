<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                @if (Auth::user()->roles->pluck('name')[0]  == 'superadmin')
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
                <li class="{{ request()->routeIs('classifications.*') || request()->routeIs('sub-classfication.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('classifications.index') }}" class="waves-effect {{ request()->routeIs('classifications.*') || request()->routeIs('sub-classfication.*') ? 'active' : '' }}">
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
                              <path d="M9.16675 5.5V38.5" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M34.8333 38.5V5.5" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M9.16675 12.8335H34.8334" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M9.16675 27.5H34.8334" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M14.6667 23.8335V31.1668" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M20.1667 23.8335V31.1668" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M29.3333 23.8335V31.1668" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M25.6667 9.1665V16.4998" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M20.1667 9.1665V16.4998" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M14.6667 9.1665V16.4998" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M5.5 38.5H38.5" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
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
                    <a href="{{route('history-login.index')}}" class="waves-effect">
                        <i class="bx bx-history"></i>
                        <span key="t-file-manager">History Login</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('sections.index')}}" class="waves-effect">
                        <i class="bx bx-slider"></i>
                        <span key="t-file-manager">Pengaturan Seksi</span>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36" fill="currentColor">
                            <path d="M27 13.5V18M27 18V22.5M27 18H31.5M27 18H22.5M19.5 10.5C19.5 13.8137 16.8137 16.5 13.5 16.5C10.1863 16.5 7.5 13.8137 7.5 10.5C7.5 7.18629 10.1863 4.5 13.5 4.5C16.8137 4.5 19.5 7.18629 19.5 10.5ZM4.5 30C4.5 25.0294 8.52944 21 13.5 21C18.4706 21 22.5 25.0294 22.5 30V31.5H4.5V30Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                        <span key="t-file-manager">Pelatihan</span>
                    </a>
                </li>
                @endif
                @if ( Auth::user()->roles->pluck('name')[0]  == 'dinas')
                <li>
                    <a href="{{ route('accident') }}" class="waves-effect">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
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
                        <i class="bx bx-user-plus"></i>
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
                    <a href="{{ route('work-package') }}" class="waves-effect">
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
