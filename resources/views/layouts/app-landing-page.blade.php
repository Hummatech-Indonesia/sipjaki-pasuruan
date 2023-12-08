<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Sipjaki</title>

    <link rel="apple-touch-icon" sizes="180x180" type="{{ asset('image/png') }}" href="{{ asset('assets/sipjaki.png') }}">
    <link rel="icon" type="{{ asset('image/png') }}" href="{{ asset('assets/sipjaki.png') }}">
    <link rel="icon" type="{{ asset('image/png') }}" href="{{ asset('assets/sipjaki.png') }}">
    <link rel="mask-icon" type="{{ asset('image/png') }}" href="{{ asset('assets/sipjaki.png') }}">

    <meta name="msapplication-TileColor" content="#fa7070">
    <meta name="theme-color" content="#fa7070">

    <!-- Dependency Styles -->
    <link rel="stylesheet" href="dependencies/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="dependencies/fontawesome/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="dependencies/swiper/css/swiper.min.css" type="text/css">
    <link rel="stylesheet" href="dependencies/wow/css/animate.css" type="text/css">
    <link rel="stylesheet" href="dependencies/magnific-popup/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="dependencies/components-elegant-icons/css/elegant-icons.min.css" type="text/css">
    <link rel="stylesheet" href="dependencies/simple-line-icons/css/simple-line-icons.css" type="text/css">
    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="assets/css/app.css" type="text/css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&amp;family=Satisfy&amp;display=swap"
        rel="stylesheet">

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
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                <defs>
                    <filter id="goo">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                        <feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7"
                            result="goo" />
                        <feBlend in="SourceGraphic" in2="goo" />
                    </filter>
                </defs>
            </svg>

        </div>
    </div>

    <div id="main_content">
        <header class="site-header header-dark header_trans-fixed" data-top="992">
            <div class="container">
                <div class="header-inner">
                    <div class="site-mobile-logo">
                        <a href="index.html" class="logo">
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
                            <a href="index.html" class="logo">
                                <img src="{{ asset('logo.png') }}" alt="site logo" class="main-logo">
                                <img src="{{ asset('logo.png') }}" alt="site logo" class="sticky-logo">
                            </a>
                        </div>

                        <div class="menu-wrapper" data-top="992">
                            <ul class="site-main-menu">
                                <li class="menu-item-has-children">
                                    <a href="/">Beranda</a>
                                </li>
                                <li><a href="about.html">Profil DKSK</a></li>
                                <li class="menu-item-has-children">
                                    <a href="blog.html">Layanan</a>
                                    <ul class="sub-menu">
                                        <li><a href="/faq">Bantuan</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Berita Terbaru</a>

                                    <ul class="sub-menu">
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="service.html">Service</a></li>
                                        <li><a href="team.html">Our Team</a></li>
                                        <li><a href="pricing.html">Pricing</a></li>
                                        <li class="menu-item-has-children">
                                            <a href="portfolio.html">Portfolio</a>
                                            <ul class="sub-menu">
                                                <li><a href="portfolio-one.html">Style One</a></li>
                                                <li><a href="portfolio-two.html">Style Two</a></li>
                                                <li><a href="portfolio-three.html">Style Three</a></li>
                                                <li><a href="portfolio-single.html">Portfolio Single</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="faq.html">Faq's</a></li>
                                        <li><a href="error.html">Error 404</a></li>
                                        <li><a href="signin.html">Sing In</a></li>
                                        <li><a href="signup.html">Sing Up</a></li>
                                    </ul>
                                </li>

                                <li><a href="contact.html">Peraturan</a></li>
                                <li class="menu-item-has-children">
                                    <a href="">Data Jakon</a>
                                            <ul class="sub-menu">
                                                <li><a href="/opd">OPD</a></li>
                                                <li><a href="/data-paket-pekerjaan">Paket Pekerjaan</a></li>
                                            </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="">Pelatihan</a>
                                            <ul class="sub-menu">
                                                <li><a href="/tenaga-ahli">Tenaga Ahli</a></li>
                                                <li><a href="/tenaga-terampil">Tenaga Terampil</a></li>
                                            </ul>
                                </li>
                                <li><a href="contact.html">Pengawasan</a></li>
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
                    <h class="page-title-2">JASA KONSTRUKSI</h1>

                        <ul class="bradcurmed mt-5">
                            <li><a href="#" rel="noopener noreferrer">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Duis pharetra turpis eu sapien suscipit blandit. Sed semper erat
                                    non egestas viverra. Proin tempus condimentum tortor quis tempor. Donec faucibus
                                    dolor nisi. Phasellus tincidunt maximus sapien, nec gravida ex condimentum sit amet.
                                    Nulla convallis posuere ligula, sed pulvinar lacus elementum ut. Nunc condimentum
                                    mauris vitae interdum imperdiet. Integer ac imperdiet erat</a></li>
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
        <div class="d-flex w-full d-row align-items-center justify-content-between"
            style="height: 154px;
            flex-shrink: 0;background: var(--Biru-Primary, #1B3061);">
            <div class="d-flex flex-row">
                <div>
                    <img style="width: 250px;padding-left:20px;" src="{{ asset('logo-2.png') }}" alt="">
                </div>
                <div
                    style="color: var(--White-Original, #FFF);
                font-family: Poppins;
                font-size: 16px;
                font-style: normal;
                font-weight: 500;
                line-height: normal;
                text-transform: uppercase;
                width:500px;padding-left:20px;">
                    Direktorat kelembagaan dan sumber daya kontruksi direktorat jenderal bina konstruksi kementerian
                    pekerjaan umum dan perumahan rakyat
                </div>
            </div>
            <div class="d-flex d-row">
                <svg style="margin-right: 5px;" class="me-2" width="35" height="35" viewBox="0 0 45 45"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="22.5" cy="22.5" r="22.5" fill="white" />
                    <path
                        d="M11.7047 16.9428L22.5001 22.3405L33.2957 16.9428C33.2143 15.5248 32.0386 14.4 30.6002 14.4H14.4002C12.9618 14.4 11.7861 15.5248 11.7047 16.9428Z"
                        fill="#1B3061" />
                    <path
                        d="M33.3002 19.9592L22.5001 25.3592L11.7002 19.9593V27.9C11.7002 29.3912 12.909 30.6 14.4002 30.6H30.6002C32.0914 30.6 33.3002 29.3912 33.3002 27.9V19.9592Z"
                        fill="#1B3061" />
                </svg>

                <div class="mt-1">
                    <a style="color: var(--White-Original, #FFF);
                    font-family: Poppins;
                    font-size: 14px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: normal; margin-right:20px;"
                        href="kelembagaan.djbk@pu.go.id">kelembagaan.djbk@pu.go.id</a>
                </div>
                <svg style="margin-right: 5px;" width="35" height="35" viewBox="0 0 45 45" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="22.5" cy="22.5" r="22.5" fill="white" />
                    <g clip-path="url(#clip0_90_3317)">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.9014 11.9683C14.1475 11.7226 14.443 11.532 14.7683 11.4091C15.0935 11.2863 15.4412 11.234 15.7883 11.2556C16.1353 11.2773 16.4738 11.3725 16.7813 11.5349C17.0887 11.6972 17.3582 11.9231 17.5718 12.1975L20.096 15.4403C20.5586 16.0352 20.7218 16.81 20.5389 17.5413L19.7697 20.6209C19.73 20.7804 19.7321 20.9475 19.776 21.106C19.8198 21.2644 19.9039 21.4088 20.02 21.5252L23.4752 24.9803C23.5917 25.0967 23.7363 25.1809 23.895 25.2248C24.0537 25.2686 24.2211 25.2707 24.3808 25.2306L27.4591 24.4614C27.82 24.3712 28.1966 24.3642 28.5606 24.4409C28.9246 24.5177 29.2663 24.6761 29.56 24.9044L32.8028 27.4272C33.9686 28.3342 34.0755 30.0569 33.0321 31.0989L31.578 32.553C30.5374 33.5936 28.9821 34.0506 27.5322 33.5402C23.8214 32.2345 20.4521 30.1101 17.6744 27.3245C14.889 24.5472 12.7646 21.1785 11.4588 17.4681C10.9497 16.0197 11.4068 14.463 12.4474 13.4223L13.9014 11.9683Z"
                            fill="#1B3061" />
                    </g>
                    <defs>
                        <clipPath id="clip0_90_3317">
                            <rect width="22.5" height="22.5" fill="white" transform="translate(11.25 11.25)" />
                        </clipPath>
                    </defs>
                </svg>
                <div
                    style="color: var(--White-Original, #FFF);
                    font-family: Poppins;
                    font-size: 14px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: normal;margin-right:45px;margin-top:10px;">
                    +62-21 739 5063
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
                        <div class="col-lg-7 col-md-6">
                            <div class="d-flex d-row widget footer-widget">
                                <img src="{{ asset('logo-2.png') }}" alt=""
                                    style="margin-right: 10px;width:35%;">
                                <div
                                    style="color: var(--Biru-Primary, #1B3061);
                                font-family: Poppins;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 500;
                                line-height: normal;
                                text-transform: uppercase;">
                                    Direktorat kelembagaan dan sumber daya kontruksi
                                    direktorat jenderal bina konstruksi
                                    kementerian pekerjaan umum dan perumahan rakyat
                                </div>
                            </div>
                            <div class="mt-3">
                                <img src="{{ asset('logo.png') }}" alt="" srcset="">
                            </div>
                            <div class="d-flex d-row mt-5">
                                <svg style="margin-right: 5px;" class="me-2" width="35" height="35"
                                    viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="22.5" cy="22.5" r="22.5" fill="white" />
                                    <path
                                        d="M11.7047 16.9428L22.5001 22.3405L33.2957 16.9428C33.2143 15.5248 32.0386 14.4 30.6002 14.4H14.4002C12.9618 14.4 11.7861 15.5248 11.7047 16.9428Z"
                                        fill="#1B3061" />
                                    <path
                                        d="M33.3002 19.9592L22.5001 25.3592L11.7002 19.9593V27.9C11.7002 29.3912 12.909 30.6 14.4002 30.6H30.6002C32.0914 30.6 33.3002 29.3912 33.3002 27.9V19.9592Z"
                                        fill="#1B3061" />
                                </svg>

                                <div>
                                    <a style="color: var(--White-Original, #1B3061);
                                    font-family: Poppins;
                                    font-size: 14px;
                                    font-style: normal;
                                    font-weight: 600;
                                    line-height: normal; margin-right:20px;"
                                        href="kelembagaan.djbk@pu.go.id">kelembagaan.djbk@pu.go.id</a>
                                </div>
                                <svg style="margin-right: 5px;" width="35" height="35" viewBox="0 0 45 45"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="22.5" cy="22.5" r="22.5" fill="white" />
                                    <g clip-path="url(#clip0_90_3317)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.9014 11.9683C14.1475 11.7226 14.443 11.532 14.7683 11.4091C15.0935 11.2863 15.4412 11.234 15.7883 11.2556C16.1353 11.2773 16.4738 11.3725 16.7813 11.5349C17.0887 11.6972 17.3582 11.9231 17.5718 12.1975L20.096 15.4403C20.5586 16.0352 20.7218 16.81 20.5389 17.5413L19.7697 20.6209C19.73 20.7804 19.7321 20.9475 19.776 21.106C19.8198 21.2644 19.9039 21.4088 20.02 21.5252L23.4752 24.9803C23.5917 25.0967 23.7363 25.1809 23.895 25.2248C24.0537 25.2686 24.2211 25.2707 24.3808 25.2306L27.4591 24.4614C27.82 24.3712 28.1966 24.3642 28.5606 24.4409C28.9246 24.5177 29.2663 24.6761 29.56 24.9044L32.8028 27.4272C33.9686 28.3342 34.0755 30.0569 33.0321 31.0989L31.578 32.553C30.5374 33.5936 28.9821 34.0506 27.5322 33.5402C23.8214 32.2345 20.4521 30.1101 17.6744 27.3245C14.889 24.5472 12.7646 21.1785 11.4588 17.4681C10.9497 16.0197 11.4068 14.463 12.4474 13.4223L13.9014 11.9683Z"
                                            fill="#1B3061" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_90_3317">
                                            <rect width="22.5" height="22.5" fill="white"
                                                transform="translate(11.25 11.25)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <div
                                    style="color: var(--White-Original, #1B3061);
                                    font-family: Poppins;
                                    font-size: 14px;
                                    font-style: normal;
                                    font-weight: 600;
                                    line-height: normal;margin-right:45px;margin-top:10px;">
                                    +62-21 739 5063
                                </div>
                            </div>
                            <!-- /.widget footer-widget -->
                        </div>

                        <!-- /.col-lg-3 col-md-6 -->

                        <div class="col-lg-5 col-md-6">
                            <div class="widget footer-widget">
                                <img style="width: 70%;" src="{{ asset('iprove.png') }}" alt="">

                                <div
                                    style="color: var(--Biru-Primary, #1B3061);
                                font-family: Poppins;
                                font-size: 20px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: normal;
                                text-decoration-line: underline;
text-decoration-thickness: 2px;
                                margin-top:10px;">
                                    Alamat
                                </div>
                                <div class="d-flex d-row mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 34 34" fill="none">
                                        <path
                                            d="M17 2.125C11.1343 2.125 6.375 6.40887 6.375 11.6875C6.375 20.1875 17 31.875 17 31.875C17 31.875 27.625 20.1875 27.625 11.6875C27.625 6.40887 22.8657 2.125 17 2.125ZM17 17C16.1594 17 15.3377 16.7507 14.6388 16.2837C13.9399 15.8167 13.3952 15.153 13.0735 14.3764C12.7518 13.5998 12.6677 12.7453 12.8317 11.9209C12.9956 11.0964 13.4004 10.3392 13.9948 9.7448C14.5892 9.15042 15.3464 8.74565 16.1709 8.58166C16.9953 8.41768 17.8498 8.50184 18.6264 8.82351C19.403 9.14518 20.0667 9.68992 20.5337 10.3888C21.0007 11.0877 21.25 11.9094 21.25 12.75C21.2488 13.8768 20.8006 14.9571 20.0038 15.7538C19.2071 16.5506 18.1268 16.9988 17 17Z"
                                            fill="#1B3061" />
                                    </svg>
                                    <div
                                        style="color: var(--Biru-Primary, #1B3061);
                                      font-family: Poppins;
                                      font-size: 16px;
                                      font-style: normal;
                                      font-weight: 500;
                                      line-height: normal;margin-left:10px;">
                                        Jl. Pattimura No. 20 Kebayoran Baru
                                        Jakarta Selatan 12110
                                    </div>
                                </div>
                                <div class="d-flex d-row mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 30 30" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.41 9.61811C3.53286 10.1663 3 11.1277 3 12.1621V23.9994C3 25.6562 4.34315 26.9994 6 26.9994H24C25.6569 26.9994 27 25.6562 27 23.9994V12.1621C27 11.1277 26.4671 10.1663 25.59 9.61812L16.59 3.99311C15.6172 3.38511 14.3828 3.38511 13.41 3.99311L4.41 9.61811ZM8.33205 13.2514C7.64276 12.7919 6.71145 12.9782 6.25192 13.6675C5.7924 14.3568 5.97866 15.2881 6.66795 15.7476L14.1679 20.7476C14.6718 21.0835 15.3282 21.0835 15.8321 20.7476L23.3321 15.7476C24.0213 15.2881 24.2076 14.3568 23.7481 13.6675C23.2885 12.9782 22.3572 12.7919 21.6679 13.2514L15 17.6967L8.33205 13.2514Z"
                                            fill="#1B3061" />
                                    </svg>
                                    <div
                                        style="color: var(--Biru-Primary, #1B3061);
                                      font-family: Poppins;
                                      font-size: 16px;
                                      font-style: normal;
                                      font-weight: 500;
                                      line-height: normal;margin-left:10px;">
                                        kelembagaan.djbk@pu.go.id
                                    </div>
                                </div>
                                <div class="d-flex d-row mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 23 24" fill="none">
                                        <path
                                            d="M18.4295 23.9998C17.4272 23.9998 16.0192 23.6216 13.9107 22.3926C11.3469 20.8926 9.36372 19.5078 6.81369 16.8543C4.35507 14.2909 3.15862 12.6313 1.4841 9.4523C-0.407625 5.86297 -0.0851483 3.98152 0.275327 3.1774C0.704611 2.21632 1.33827 1.64149 2.1573 1.07094C2.6225 0.75296 3.1148 0.480375 3.62795 0.256649C3.6793 0.233613 3.72706 0.211648 3.76968 0.191827C4.02386 0.072361 4.40898 -0.108177 4.89681 0.0846825C5.22237 0.212184 5.51301 0.47308 5.96796 0.941836C6.90099 1.90185 8.176 4.03991 8.64637 5.08992C8.96217 5.79761 9.17116 6.26476 9.17168 6.78869C9.17168 7.40209 8.8759 7.87513 8.51697 8.38568C8.4497 8.48157 8.38294 8.57318 8.31824 8.66211C7.92747 9.19783 7.84172 9.35265 7.8982 9.62908C8.01271 10.1846 8.86666 11.8384 10.27 13.2993C11.6734 14.7602 13.2129 15.5949 13.7475 15.7138C14.0237 15.7754 14.1752 15.6822 14.7051 15.26C14.7811 15.1995 14.8592 15.1368 14.9408 15.0741C15.4882 14.6493 15.9206 14.3488 16.4947 14.3488H16.4977C16.9974 14.3488 17.4251 14.5749 18.1338 14.9477C19.0581 15.4342 21.169 16.7472 22.0949 17.7217C22.5452 18.1953 22.7963 18.4974 22.919 18.8365C23.1039 19.3471 22.9298 19.7472 22.8163 20.0151C22.7973 20.0596 22.7763 20.1083 22.7542 20.1624C22.5381 20.6968 22.2752 21.2094 21.9691 21.6935C21.4232 22.5453 20.8702 23.2048 19.9469 23.6532C19.4728 23.8871 18.954 24.0057 18.4295 23.9998Z"
                                            fill="#1B3061" />
                                    </svg>
                                    <div
                                        style="color: var(--Biru-Primary, #1B3061);
                                      font-family: Poppins;
                                      font-size: 16px;
                                      font-style: normal;
                                      font-weight: 500;
                                      line-height: normal;margin-left:10px;">
                                        Telp/Fax. 021 - 769 5063, 739 5375, 7279 9238</div>
                                </div>

                                <ul class="mt-4"
                                    style="color: var(--Biru-Primary, #1B3061);
                                font-family: Poppins;
                                font-size: 16px;
                                font-style: normal;
                                font-weight: 500;"
                                    class="footer-social-link">
                                    Copyright C2021. All Rights Reserved by SipjakiTeam
                                </ul>
                            </div>
                            <!-- /.widget footer-widget -->
                        </div>
                        <!-- /.col-lg-3 col-md-6 -->
                    </div>
                    <!-- /.row -->

                </div><!-- /.footer-inner -->
            </div><!-- /.container -->
        </footer>


    </div>

    <script src="dependencies/jquery/jquery.min.js"></script>
    <script src="dependencies/bootstrap/js/bootstrap.min.js"></script>
    <script src="dependencies/swiper/js/swiper.min.js"></script>
    <script src="dependencies/jquery.appear/jquery.appear.js"></script>
    <script src="dependencies/wow/js/wow.min.js"></script>
    <script src="dependencies/countUp.js/countUp.min.js"></script>
    <script src="dependencies/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="dependencies/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="dependencies/jquery.parallax-scroll/js/jquery.parallax-scroll.js"></script>
    <script src="dependencies/magnific-popup/js/jquery.magnific-popup.min.js"></script>
    <script src="dependencies/gmap3/js/gmap3.min.js"></script>
    <script type='text/javascript'
        src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&amp;ver=2.1.6'></script>

    <script src="assets/js/header.js"></script>
    <script src="assets/js/app-min.js"></script>

</body>


</html>
