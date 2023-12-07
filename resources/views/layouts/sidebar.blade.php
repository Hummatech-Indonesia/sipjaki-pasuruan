<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

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
                <li>
                    <a href="{{ route('classifications.index') }}" class="waves-effect">
                        <i class="fas fa-clipboard"></i>
                        <span key="t-file-manager">Klasifikasi</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('training-methods.index') }}" class="waves-effect">
                        <i class="fas fa-clipboard"></i>
                        <span key="t-file-manager">Metode Pelatihan</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('fiscal-years.index') }}" class="waves-effect">
                        <i class="bx bx-bar-chart-alt"></i>
                        <span key="t-file-manager">Tahun Anggaran</span>
                    </a>
                </li>

                <li class="{{request()->routeIs('qualifications.*') ? 'mm-active' : ''}}">
                    <a href="{{ route('qualifications.index') }}" class="waves-effect {{request()->routeIs('qualifications.*') ? 'active' : ''}}">
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
                    <a href="{{ route('agencies.index') }}" class="waves-effect">
                        <i class="bx bx-user-plus"></i>
                        <span key="t-file-manager">Dinas</span>
                    </a>

                <li>
                    <a href="/profile-OPD" class="waves-effect">
                        <i class="bx bx-user-plus"></i>
                        <span key="t-file-manager">Profile OPD</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('training') }}" class="waves-effect">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 36 36" fill="none">
                            <path d="M27 13.5V18M27 18V22.5M27 18H31.5M27 18H22.5M19.5 10.5C19.5 13.8137 16.8137 16.5 13.5 16.5C10.1863 16.5 7.5 13.8137 7.5 10.5C7.5 7.18629 10.1863 4.5 13.5 4.5C16.8137 4.5 19.5 7.18629 19.5 10.5ZM4.5 30C4.5 25.0294 8.52944 21 13.5 21C18.4706 21 22.5 25.0294 22.5 30V31.5H4.5V30Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                        <span key="t-file-manager">Pelatihan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
