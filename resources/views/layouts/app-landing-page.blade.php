<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    @if(request()->routeIs('berita'))
    <meta property="og:title" content="{{$news->title}}">
    <meta property="og:description" content="{{$news->title}}">
    <meta property="og:image" content="{{asset('storage/'.$news->thumbnail)}}">
    @else
    <meta property="og:title" content="Sipjaki">
    <meta property="og:description" content="SIPJAKI adalah sistem informasi yang dikelola bersama oleh pembina jasa konstruksi nasional, provinsi dan kabupaten/kota dalam rangka meningkatkan kemudahan akses informasi usaha jasa konstruksi, peningkatan transparansi, serta membantu memperkuat jaringan bisnis pelaku usaha dalam rantai pasok konstruksi.">
    <meta property="og:image" content="{{asset('logo-3.png')}}">
    @endif
    <title>Sipjaki</title>

    <link rel="apple-touch-icon" sizes="180x180" type="{{ asset('image/png') }}" href="{{ asset('assets/sipjaki.png') }}">
    <link rel="icon" type="{{ asset('image/png') }}" href="{{ asset('assets/sipjaki.png') }}">
    <link rel="icon" type="{{ asset('image/png') }}" href="{{ asset('assets/sipjaki.png') }}">
    <link rel="mask-icon" type="{{ asset('image/png') }}" href="{{ asset('assets/sipjaki.png') }}">

    <meta name="msapplication-TileColor" content="#fa7070">
    <meta name="theme-color" content="#fa7070">

    <!-- Dependency Styles -->
    <link rel="stylesheet" href="{{ asset('dependencies/bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('dependencies/fontawesome/css/all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('dependencies/swiper/css/swiper.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('dependencies/wow/css/animate.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('dependencies/magnific-popup/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('dependencies/components-elegant-icons/css/elegant-icons.min.css') }}"
        type="text/css">
    <link rel="stylesheet" href="{{ asset('dependencies/simple-line-icons/css/simple-line-icons.css') }}"
        type="text/css">
    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" type="text/css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="path/to/your/style.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&amp;family=Satisfy&amp;display=swap"
        rel="stylesheet">
    <style>
        .site-header .site-nav .site-main-menu li.menu-item-has-children a:hover,
        .site-header .site-nav .site-main-menu li.menu-item-has-children:focus {
            color: #FFC928;
        }

        path {
            stroke: rgb(68, 116, 226);
        }

        .site-header .site-main-menu li {
            margin: 0 12px;
            position: relative;
            padding: 36px 0;
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        @media (max-width: 540px) {
            .logo3 {
                width: 150px;
            }

            .font-size-email {
                font-size: 11px;
            }

            .icon-email {
                margin-top: 7px;
                margin-left: 10px;
                width: 20px;
                height: 20px;
            }

            .icon-location {
                width: 80px;
                height: 25px;
            }

            .logo-kab-pasuruan {
                width: 80%;
            }

            .banner {
                height: 100px;
            }

            .page-banner .bradcurmed li {
                font-size: 16px;
            }

            .page-banner .page-title-1 {
                font-size: 30px;
                font-weight: 800;
                color: #2b2350;
                position: relative;
                z-index: 2;
                max-width: 820px;
                margin: 20px auto 15px;
            }

            .page-banner .page-title-2 {
                font-size: 25px;
                font-weight: 800;
                color: #FFC928;
                position: relative;
                z-index: 2;
                max-width: 820px;
                margin: 20px auto 10px;
            }

            .maps {
                height: 200px;
                margin-bottom: 20px;
            }

            .alamat {
                margin-top: 20px;
            }

            .img-sipjaki {
                max-width: 80%;
            }

            .tabs-wrapper {
                max-width: 320px;
                margin: 0 auto;
            }
        }

        @media (max-width: 991px) {
            .page-banner {
                height: 550px;
            }
        }

        @media(min-width: 541px && max-width:1199px) {
            .logo3 {
                width: 40%;
            }

            .banner {
                height: 140px;
            }
        }

        @media(min-width:1200px) {
            .logo3 {
                width: 70%;
            }

            .font-size-email {
                font-size: 14px;
            }

            .icon-email {
                width: 35px;
                height: 35px;
            }

            .icon-location {
                width: 50px;
                height: 25px;
            }

            .logo-kab-pasuruan {
                width: 75%;
            }

            .banner {
                height: 140px;
            }

            .maps {
                height: 280px;
            }

            .img-sipjaki {
                margin-top: 20px;
                max-width: 75%;
            }

            .alamat {
                margin-top: 45px;
            }
        }
    </style>

</head>

<body id="home-version-1" class="home-version-1" data-style="default">

    <a href="#main_content" data-type="section-switch" class="return-to-top">
        <i class="fa fa-chevron-up"></i>
    </a>

    <div class="page-loader">
        <div class="loader">
            <!-- Loader -->
            <div class="blobs">
                <div class="blob-center"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 900 900">
                <path fill-rule="evenodd" stroke="rgb(250, 112, 112)" stroke-width="100px" stroke-linecap="butt"
                    stroke-linejoin="miter" opacity="0.051" fill="none"
                    d="M 450 50 C 670.914 50 850 229.086 850 450 C 850 670.914 670.914 850 450 850 C 229.086 850 50 670.914 50 450 C 50 229.086 229.086 50 450 50 Z">
                </path>
            </svg>


        </div>
    </div>

    <div id="main_content">
        <header class="site-header header-dark header_trans-fixed" data-top="992">
            <div class="container">
                <div class="header-inner">
                    <div class="site-mobile-logo">
                        <a href="{{ route('landing-page') }}" class="logo">
                            <img src="{{ asset('logo.png') }}" alt="site logo" class="main-logo">
                            <img src="{{ asset('logo.png') }}" alt="site logo" class="sticky-logo">
                        </a>
                    </div><!-- /.site-mobile-logo -->

                    <div class="toggle-menu">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                    <!-- /.toggle-menu -->
                    <nav class="site-nav nav-dark">
                        <div class="close-menu">
                            <span>Close</span>
                            <i class="ei ei-icon_close"></i>
                        </div>
                        <div class="site-logo">
                            <a href="{{ route('landing-page') }}" class="logo">
                                <img src="{{ asset('logo.png') }}" alt="site logo" class="main-logo">
                                <img src="{{ asset('logo.png') }}" alt="site logo" class="sticky-logo">
                            </a>
                        </div>

                        <div class="menu-wrapper" data-top="992">
                            <ul class="site-main-menu">
                                <li>
                                    <a class="{{ request()->routeIs('landing-page') ? 'active' : '' }}"
                                        href="{{ route('landing-page') }}">Beranda</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a class="d-flex d-row {{ request()->routeIs('struktur-organisasi') || request()->routeIs('rencana-strategis') || request()->routeIs('tugas-fungsi') ? 'active' : '' }}"
                                        href="#">Profil</a>
                                    <ul class="sub-menu">
                                        <li><a class="{{ request()->routeIs('struktur-organisasi') ? 'active' : '' }}"
                                                href="{{ route('struktur-organisasi') }}">Struktur Organisasi
                                            </a></li>
                                        <li><a class="{{ request()->routeIs('rencana-strategis') ? 'active' : '' }}"
                                                href="{{ route('rencana-strategis') }}">Rencana Strategis</a>
                                        </li>
                                        <li><a class="{{ request()->routeIs('tugas-fungsi') ? 'active' : '' }}"
                                                href="{{ route('tugas-fungsi') }}">Tugas Dan Fungsi</a></li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children">
                                    <a class="d-flex d-row {{ request()->routeIs('bantuan') ? 'active' : '' }}"
                                        href="#">Layanan</a>
                                    <ul class="sub-menu">
                                        <li><a class="{{ request()->routeIs('bantuan') ? 'active' : '' }}"
                                                href="{{ route('bantuan') }}">Bantuan</a></li>
                                    </ul>
                                </li>
                                <li><a class="{{ request()->routeIs('berita-terbaru') || request()->routeIs('detail-berita') ? 'active' : '' }}"
                                        href="{{ route('berita-terbaru') }}">Berita Terbaru</a></li>
                                <li><a class="{{ request()->routeIs('rules.landing') ? 'active' : '' }}"
                                        href="{{ route('rules.landing') }}">Peraturan</a></li>
                                <li class="menu-item-has-children">
                                    <a class="d-flex d-row {{ request()->routeIs('association.landing') || request()->routeIs('paket.pekerjaan') || request()->routeIs('detail.project') || request()->routeIs('association-detail.landing') ? 'active' : '' }}"
                                        href="#">Data Jakon</a>
                                    <ul class="sub-menu">
                                        <li><a class="{{ request()->routeIs('association.landing') || request()->routeIs('association-detail.landing') ? 'active' : '' }}"
                                                href="{{ route('association.landing') }}">Asosiasi</a></li>
                                        <li><a class="{{ request()->routeIs('paket.pekerjaan') || request()->routeIs('detail.project') ? 'active' : '' }}"
                                                href="{{ route('paket.pekerjaan') }}">Paket Pekerjaan</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="d-flex d-row {{ request()->routeIs('pelatihan') ? 'active' : '' }}"
                                        href="{{ route('pelatihan') }}">Pelatihan</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a class="d-flex d-row {{ request()->routeIs('kecelakaan') ? 'active' : '' }}"
                                        href="#">Pengawasan</a>
                                    <ul class="sub-menu">
                                        <li><a class="{{ request()->routeIs('kecelakaan') ? 'active' : '' }}"
                                                href="{{ route('kecelakaan') }}">Kecelakaan</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <div class="nav-right">
                                <a href="{{ route('login') }}" class="nav-btn">Masuk</a>
                            </div>
                        </div>
                        <!-- /.menu-wrapper -->

                    </nav><!-- /.site-nav -->
                </div><!-- /.header-inner -->
            </div><!-- /.container -->
        </header><!-- /.site-header -->

        <!--==========================-->
        <!--=         Banner         =-->
        <!--==========================-->
        <section class="page-banner">
            <div class="container">
                <div class="page-title-wrapper">
                    <h2 class="page-title-1">SISTEM INFORMASI PEMBINA</h2>
                    <h4 class="page-title-2">JASA KONSTRUKSI</h4>

                    <ul class="bradcurmed mt-4">
                        <li style="color: #1B3061;font-weight:600" class="font-sipjaki">SIPJAKI adalah sistem
                            informasi yang dikelola bersama oleh pembina jasa konstruksi nasional, provinsi dan
                            kabupaten/kota dalam rangka meningkatkan kemudahan akses informasi usaha jasa konstruksi,
                            peningkatan transparansi, serta membantu memperkuat jaringan bisnis pelaku usaha dalam
                            rantai pasok konstruksi.</li>
                    </ul>
                </div>
                <!-- /.page-title-wrapper -->
            </div>
            <!-- /.container -->

            <svg class="circle" data-parallax='{"x" : -200}' xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" width="950px" height="950px">
                <path fill-rule="evenodd" stroke="rgb(250, 112, 112)" stroke-width="100px" stroke-linecap="butt"
                    stroke-linejoin="miter" opacity="0.051" fill="none"
                    d="M450.000,50.000 C670.914,50.000 850.000,229.086 850.000,450.000 C850.000,670.914 670.914,850.000 450.000,850.000 C229.086,850.000 50.000,670.914 50.000,450.000 C50.000,229.086 229.086,50.000 450.000,50.000 Z" />
            </svg>

            <ul class="animate-ball">
                <li class="ball"></li>
                <li class="ball"></li>
                <li class="ball"></li>
                <li class="ball"></li>
                <li class="ball"></li>
            </ul>
        </section>
        <div class="d-flex w-full d-row align-items-center justify-content-between banner"
            style="flex-shrink: 0;background: var(--Biru-Primary, #1B3061);">
            <div class="d-flex flex-row">
                <div style="margin-left: 30px;">
                    <img class="logo3" src="{{ asset('logo-3.png') }}" alt="logo-sipkali.png">
                </div>
            </div>
            <div class="d-flex d-row" style="margin-right: 30px;">
                <svg style="margin-right: 5px;" class="icon-email me-2" viewBox="0 0 45 45" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="22.5" cy="22.5" r="22.5" fill="white" />
                    <path
                        d="M11.7047 16.9428L22.5001 22.3405L33.2957 16.9428C33.2143 15.5248 32.0386 14.4 30.6002 14.4H14.4002C12.9618 14.4 11.7861 15.5248 11.7047 16.9428Z"
                        fill="#1B3061" />
                    <path
                        d="M33.3002 19.9592L22.5001 25.3592L11.7002 19.9593V27.9C11.7002 29.3912 12.909 30.6 14.4002 30.6H30.6002C32.0914 30.6 33.3002 29.3912 33.3002 27.9V19.9592Z"
                        fill="#1B3061" />
                </svg>

                <div class="font-size-email mt-1">
                    <div style="color: var(--White-Original, #FFF);
                    font-family: Poppins;
                    font-style: normal;
                    font-weight: 600;
                    line-height: normal;">kelembagaan.djbk@pu.go.id</div>
                </div>
            </div>
        </div>
        <!-- /.page-banner -->

        <div class="blog-post-archive">
            <div class="container">
                @yield('content')
            </div><!-- /.container -->
        </div><!-- /.blog-post-archive -->

        <!--=========================-->
        <!--=        Footer         =-->
        <!--=========================-->
        <footer id="footer">
            <div class="container">
                <div class="footer-inner wow pixFadeUp">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="widget footer-widget">
                                <div>
                                    <img class="img-sipjaki mb-2" src="{{ asset('sipjaki.png') }}" alt="" srcset="">
                                </div>
                                <div class="alamat"
                                    style="color: var(--Biru-Primary, #1B3061);
                                font-family: Poppins;
                                font-size: 20px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: normal;
                                text-decoration-line: underline;
                                text-decoration-thickness: 2px;">
                                    Alamat
                                </div>
                                <div class="d-flex d-row mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-location" viewBox="0 0 34 34"
                                        fill="none">
                                        <path
                                            d="M17 2.125C11.1343 2.125 6.375 6.40887 6.375 11.6875C6.375 20.1875 17 31.875 17 31.875C17 31.875 27.625 20.1875 27.625 11.6875C27.625 6.40887 22.8657 2.125 17 2.125ZM17 17C16.1594 17 15.3377 16.7507 14.6388 16.2837C13.9399 15.8167 13.3952 15.153 13.0735 14.3764C12.7518 13.5998 12.6677 12.7453 12.8317 11.9209C12.9956 11.0964 13.4004 10.3392 13.9948 9.7448C14.5892 9.15042 15.3464 8.74565 16.1709 8.58166C16.9953 8.41768 17.8498 8.50184 18.6264 8.82351C19.403 9.14518 20.0667 9.68992 20.5337 10.3888C21.0007 11.0877 21.25 11.9094 21.25 12.75C21.2488 13.8768 20.8006 14.9571 20.0038 15.7538C19.2071 16.5506 18.1268 16.9988 17 17Z"
                                            fill="#1B3061" />
                                    </svg>
                                    <div class="mb-3"
                                        style="color: var(--Biru-Primary, #1B3061);
                                      font-family: Poppins;
                                      font-size: 16px;
                                      font-style: normal;
                                      font-weight: 500;
                                      line-height: normal;margin-left:10px;">
                                        Dinas Bina Marga dan Bina Konstruksi Kabupaten Pasuruan
                                        Jalan Raya Raci KM 9 Masangan, Karangpanas, Raci, Kec. Bangil, Pasuruan, Jawa
                                        Timur 67153
                                    </div>
                                </div>
                                <div
                                    style="color: var(--Biru-Primary, #1B3061);
                                font-family: Poppins;
                                font-size: 20px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: normal;
                                text-decoration-line: underline;
                                text-decoration-thickness: 2px;
                                margin-top:20px;">
                                    Email
                                </div>
                                <div class="d-flex d-row mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25"
                                        viewBox="0 0 30 30" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.41 9.61811C3.53286 10.1663 3 11.1277 3 12.1621V23.9994C3 25.6562 4.34315 26.9994 6 26.9994H24C25.6569 26.9994 27 25.6562 27 23.9994V12.1621C27 11.1277 26.4671 10.1663 25.59 9.61812L16.59 3.99311C15.6172 3.38511 14.3828 3.38511 13.41 3.99311L4.41 9.61811ZM8.33205 13.2514C7.64276 12.7919 6.71145 12.9782 6.25192 13.6675C5.7924 14.3568 5.97866 15.2881 6.66795 15.7476L14.1679 20.7476C14.6718 21.0835 15.3282 21.0835 15.8321 20.7476L23.3321 15.7476C24.0213 15.2881 24.2076 14.3568 23.7481 13.6675C23.2885 12.9782 22.3572 12.7919 21.6679 13.2514L15 17.6967L8.33205 13.2514Z"
                                            fill="#1B3061" />
                                    </svg>
                                    <div>
                                        <div style="color: var(--Biru-Primary, #1B3061);
                                        font-family: Poppins;
                                        font-size: 16px;
                                        font-style: normal;
                                        font-weight: 500;
                                        line-height: normal;margin-left:10px;">dbmbk@pasuruankab.go.id</div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.widget footer-widget -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div>
                                <img class="logo-kab-pasuruan" src="{{ asset('logo-kab-pasuruan-2.png') }}"
                                    alt="" srcset="">
                                {{-- <div id="googleMap" style="width:100%;height:400px;"></div> --}}
                                <div id="map" class="maps"
                                    style="border:1px solid;height:300px;margin-top:34px"></div>

                            </div>
                            <!-- /.widget footer-widget -->
                        </div>

                        <!-- /.col-lg-3 col-md-6 -->


                    </div>
                    <ul class="d-flex justify-content-end mt-3"
                        style="color: var(--Biru-Primary, #1B3061);
                    font-family: Poppins;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 500;"
                        class="footer-social-link">
                        Copyright &copy;2021. All Rights Reserved by SipjakiTeam
                    </ul>
                    <!-- /.row -->

                </div><!-- /.footer-inner -->
            </div><!-- /.container -->
        </footer>


    </div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<YOUR_GOOGLE_MAPS_API_KEY>" defer></script>
    <script>
        var map = L.map('map').setView([-7.608875876607843, 112.83035837823894], 17);

        L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
            attribution: '© Google Maps'
        }).addTo(map);

        var marker = L.marker([-7.608875876607843, 112.83035837823894]).addTo(map);
        marker.bindPopup("<b>Hai!</b><br>Kantor PUPR Kab Pasuruan.").openPopup();
    </script>

    <script src="{{ asset('dependencies/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dependencies/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dependencies/swiper/js/swiper.min.js') }}"></script>
    <script src="{{ asset('dependencies/jquery.appear/jquery.appear.js') }}"></script>
    <script src="{{ asset('dependencies/wow/js/wow.min.js') }}"></script>
    <script src="{{ asset('dependencies/countUp.js/countUp.min.js') }}"></script>
    <script src="{{ asset('dependencies/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('dependencies/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('dependencies/jquery.parallax-scroll/js/jquery.parallax-scroll.js') }}"></script>
    <script src="{{ asset('dependencies/magnific-popup/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('dependencies/gmap3/js/gmap3.min.js') }}"></script>

    <script src="{{ asset('assets/js/header.js') }}"></script>
    <script src="{{ asset('assets/js/app-min.js') }}"></script>
    <script>
        function showNoData(message) {
            return `<div class="d-flex justify-content-center" style="min-height:16rem">
                        <div class="my-auto ">
                            <img src="{{ asset('no-data.png') }}" width="400" height="400"/>
                            <h4 class="text-center mt-3">${message}</h4>
                            </div>
                    </div>`
        }
    </script>
    @yield('script')
</body>


</html>
