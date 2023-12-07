<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from saaspik.pixelsigns.art/saaspik/blog-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Dec 2023 01:34:03 GMT -->

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Blog Grid — Software, App, SaaS landing HTML Template</title>

    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/fav/favicon-16x16.png">
    <link rel="mask-icon" href="assets/img/fav/safari-pinned-tab.svg" color="#fa7070">

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
    </div><!-- /.page-loader -->

    <div id="main_content">


        <!--=========================-->
        <!--=        Navbar         =-->
        <!--=========================-->
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
                                    <a href="index.html">Beranda</a>
                                    <ul class="sub-menu">
                                        <li><a href="index.html">Home One</a></li>
                                        <li><a href="index-two.html">Home Two</a></li>
                                        <li><a href="index-three.html">Home Three</a></li>
                                        <li><a href="index-four.html">Home Four</a></li>
                                        <li><a href="index-five.html">Home Five</a></li>
                                        <li><a href="index-six.html">Home Six</a></li>
                                        <li><a href="index-seven.html">Home Seven</a></li>
                                        <li><a href="index-eight.html">Home Eight</a></li>
                                        <li><a href="index-nine.html">Home Nine</a></li>
                                        <li><a href="index-ten.html">Home Ten</a></li>
                                        <li><a href="index-eleven.html">Home Eleven</a></li>
                                        <li><a href="index-twelve.html">Home Twelve</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.html">Profil DKSK</a></li>
                                <li class="menu-item-has-children">
                                    <a href="blog.html">Layanan</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">Blog Standard</a></li>
                                        <li><a href="blog-grid.html">Blog Grid</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
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
                                <li><a href="contact.html">Data Jakon</a></li>
                                <li><a href="contact.html">Pelatihan</a></li>
                                <li><a href="contact.html">Pengawasan</a></li>
                            </ul>

                            <div class="nav-right">
                                <a href="signup.html" class="nav-btn">Masuk</a>
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
                <svg style="margin-right: 5px;" class="me-2" width="35" height="35" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="22.5" cy="22.5" r="22.5" fill="white"/>
                    <path d="M11.7047 16.9428L22.5001 22.3405L33.2957 16.9428C33.2143 15.5248 32.0386 14.4 30.6002 14.4H14.4002C12.9618 14.4 11.7861 15.5248 11.7047 16.9428Z" fill="#1B3061"/>
                    <path d="M33.3002 19.9592L22.5001 25.3592L11.7002 19.9593V27.9C11.7002 29.3912 12.909 30.6 14.4002 30.6H30.6002C32.0914 30.6 33.3002 29.3912 33.3002 27.9V19.9592Z" fill="#1B3061"/>
                    </svg>

                <div class="mt-1">
                    <a style="color: var(--White-Original, #FFF);
                    font-family: Poppins;
                    font-size: 14px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: normal; margin-right:20px;" href="kelembagaan.djbk@pu.go.id">kelembagaan.djbk@pu.go.id</a>
                </div>
                <svg style="margin-right: 5px;" width="35" height="35" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="22.5" cy="22.5" r="22.5" fill="white"/>
                    <g clip-path="url(#clip0_90_3317)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9014 11.9683C14.1475 11.7226 14.443 11.532 14.7683 11.4091C15.0935 11.2863 15.4412 11.234 15.7883 11.2556C16.1353 11.2773 16.4738 11.3725 16.7813 11.5349C17.0887 11.6972 17.3582 11.9231 17.5718 12.1975L20.096 15.4403C20.5586 16.0352 20.7218 16.81 20.5389 17.5413L19.7697 20.6209C19.73 20.7804 19.7321 20.9475 19.776 21.106C19.8198 21.2644 19.9039 21.4088 20.02 21.5252L23.4752 24.9803C23.5917 25.0967 23.7363 25.1809 23.895 25.2248C24.0537 25.2686 24.2211 25.2707 24.3808 25.2306L27.4591 24.4614C27.82 24.3712 28.1966 24.3642 28.5606 24.4409C28.9246 24.5177 29.2663 24.6761 29.56 24.9044L32.8028 27.4272C33.9686 28.3342 34.0755 30.0569 33.0321 31.0989L31.578 32.553C30.5374 33.5936 28.9821 34.0506 27.5322 33.5402C23.8214 32.2345 20.4521 30.1101 17.6744 27.3245C14.889 24.5472 12.7646 21.1785 11.4588 17.4681C10.9497 16.0197 11.4068 14.463 12.4474 13.4223L13.9014 11.9683Z" fill="#1B3061"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_90_3317">
                    <rect width="22.5" height="22.5" fill="white" transform="translate(11.25 11.25)"/>
                    </clipPath>
                    </defs>
                    </svg>
                    <div style="color: var(--White-Original, #FFF);
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

        <!--========================-->
        <!--=         Blog         =-->
        <!--========================-->
        <div class="blog-post-archive">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <article class="post-post-grid">
                            <div class="feature-image">
                                <a href="blog-signle.html">
                                    <img src="media/blog/13.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <ul class="post-meta">
                                    <li><a href="#">Oct 16, 2019</a></li>
                                </ul>

                                <h3 class="entry-title"><a href="#">An Uncomplicated Guide to Improve Rate By
                                        3X.</a></h3>

                                <div class="author">
                                    <img src="media/blog/auth2.jpg" alt="author">
                                    <a href="#" class="author-link">Hans Down</a>
                                </div>

                            </div><!-- /.post-content -->
                        </article><!-- /.post -->
                    </div>
                    <!-- /.col-lg-4 -->


                    <div class="col-lg-4 col-md-6">
                        <article class="post-post-grid">
                            <div class="feature-image">
                                <a href="blog-signle.html">
                                    <img src="media/blog/14.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <ul class="post-meta">
                                    <li><a href="#">Oct 16, 2019</a></li>
                                </ul>
                                <h3 class="entry-title"><a href="#">The most powerfull chating saas that make
                                        you.</a></h3>


                                <div class="author">
                                    <img src="media/blog/auth2.jpg" alt="author">
                                    <a href="#" class="author-link">Hans Down</a>
                                </div>

                            </div><!-- /.post-content -->
                        </article><!-- /.post -->
                    </div>
                    <!-- /.col-lg-4 -->

                    <div class="col-lg-4 col-md-6">
                        <article class="post-post-grid">
                            <div class="feature-image">
                                <a href="blog-signle.html">
                                    <img src="media/blog/15.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <ul class="post-meta">
                                    <li><a href="#">Oct 16, 2019</a></li>
                                </ul>

                                <h3 class="entry-title"><a href="#">10 days quick challange for boost your
                                        online visitors.</a></h3>

                                <div class="author">
                                    <img src="media/blog/auth2.jpg" alt="author">
                                    <a href="#" class="author-link">Hans Down</a>
                                </div>

                            </div><!-- /.post-content -->
                        </article><!-- /.post -->
                    </div>
                    <!-- /.col-lg-4 -->

                    <div class="col-lg-4 col-md-6">
                        <article class="post-post-grid">
                            <div class="feature-image">
                                <a href="blog-signle.html">
                                    <img src="media/blog/16.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <ul class="post-meta">
                                    <li><a href="#">Oct 16, 2019</a></li>
                                </ul>

                                <h3 class="entry-title"><a href="#">Why DIY tools were rejected by the
                                        market.</a></h3>

                                <div class="author">
                                    <img src="media/blog/auth2.jpg" alt="author">
                                    <a href="#" class="author-link">Hans Down</a>
                                </div>

                            </div><!-- /.post-content -->
                        </article><!-- /.post -->
                    </div>
                    <!-- /.col-lg-4 -->

                    <div class="col-lg-4 col-md-6">
                        <article class="post-post-grid">
                            <div class="feature-image">
                                <a href="blog-signle.html">
                                    <img src="media/blog/17.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <ul class="post-meta">
                                    <li><a href="#">Oct 16, 2019</a></li>
                                </ul>

                                <h3 class="entry-title"><a href="#">The Belgian Exodus of World War One</a></h3>

                                <div class="author">
                                    <img src="media/blog/auth2.jpg" alt="author">
                                    <a href="#" class="author-link">Hans Down</a>
                                </div>

                            </div><!-- /.post-content -->
                        </article><!-- /.post -->
                    </div>
                    <!-- /.col-lg-4 -->

                    <div class="col-lg-4 col-md-6">
                        <article class="post-post-grid">
                            <div class="feature-image">
                                <a href="blog-signle.html">
                                    <img src="media/blog/18.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <ul class="post-meta">
                                    <li><a href="#">Oct 16, 2019</a></li>
                                </ul>

                                <h3 class="entry-title"><a href="#">Young Guns Reflections: Paul Felton</a></h3>

                                <div class="author">
                                    <img src="media/blog/auth2.jpg" alt="author">
                                    <a href="#" class="author-link">Hans Down</a>
                                </div>

                            </div><!-- /.post-content -->
                        </article><!-- /.post -->
                    </div>
                    <!-- /.col-lg-4 -->


                    <div class="col-lg-4 col-md-6">
                        <article class="post-post-grid">
                            <div class="feature-image">
                                <a href="blog-signle.html">
                                    <img src="media/blog/19.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <ul class="post-meta">
                                    <li><a href="#">Oct 16, 2019</a></li>
                                </ul>

                                <h3 class="entry-title"><a href="#">Nicholas Misani: More on the Floor</a></h3>

                                <div class="author">
                                    <img src="media/blog/auth2.jpg" alt="author">
                                    <a href="#" class="author-link">Hans Down</a>
                                </div>

                            </div><!-- /.post-content -->
                        </article><!-- /.post -->
                    </div>
                    <!-- /.col-lg-4 -->


                    <div class="col-lg-4 col-md-6">
                        <article class="post-post-grid">
                            <div class="feature-image">
                                <a href="blog-signle.html">
                                    <img src="media/blog/20.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <ul class="post-meta">
                                    <li><a href="#">Oct 16, 2019</a></li>
                                </ul>

                                <h3 class="entry-title"><a href="#">A brand for a company is like a reputation
                                        person.</a></h3>

                                <div class="author">
                                    <img src="media/blog/auth2.jpg" alt="author">
                                    <a href="#" class="author-link">Hans Down</a>
                                </div>

                            </div><!-- /.post-content -->
                        </article><!-- /.post -->
                    </div>
                    <!-- /.col-lg-4 -->


                    <div class="col-lg-4 col-md-6">
                        <article class="post-post-grid">
                            <div class="feature-image">
                                <a href="blog-signle.html">
                                    <img src="media/blog/21.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <ul class="post-meta">
                                    <li><a href="#">Oct 16, 2019</a></li>
                                </ul>

                                <h3 class="entry-title"><a href="#">The most powerfull chating saas that make
                                        you.</a></h3>

                                <div class="author">
                                    <img src="media/blog/auth2.jpg" alt="author">
                                    <a href="#" class="author-link">Hans Down</a>
                                </div>

                            </div><!-- /.post-content -->
                        </article><!-- /.post -->
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <!-- /.row -->

                <ul class="post-navigation">
                    <li class="active">1</li>
                    <li><a href="#">2</a></li>
                    <li class="next"><a href="#"><i class="ei ei-arrow_carrot-right"></i></a></li>
                </ul>
            </div><!-- /.container -->
        </div><!-- /.blog-post-archive -->

        <!--=========================-->
        <!--=        Footer         =-->
        <!--=========================-->
        <footer id="footer">
            <div class="container">
                <div class="footer-inner wow pixFadeUp">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="widget footer-widget">
                                <h3 class="widget-title">Company</h3>

                                <ul class="footer-menu">
                                    <li><a href="#">Features</a></li>
                                    <li><a href="#">Dashboard & Tool</a></li>
                                    <li><a href="#">Our Portfolio</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Get In Touch</a></li>
                                </ul>
                            </div>
                            <!-- /.widget footer-widget -->
                        </div>
                        <!-- /.col-lg-3 col-md-6 -->

                        <div class="col-lg-3 col-md-6">
                            <div class="widget footer-widget">
                                <h3 class="widget-title">Services</h3>

                                <ul class="footer-menu">
                                    <li><a href="#">Features</a></li>
                                    <li><a href="#">Dashboard & Tool</a></li>
                                    <li><a href="#">Our Portfolio</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Get In Touch</a></li>
                                </ul>
                            </div>
                            <!-- /.widget footer-widget -->
                        </div>
                        <!-- /.col-lg-3 col-md-6 -->

                        <div class="col-lg-3 col-md-6">
                            <div class="widget footer-widget">
                                <h3 class="widget-title">Digital Experience</h3>

                                <ul class="footer-menu">
                                    <li><a href="#">Features</a></li>
                                    <li><a href="#">Dashboard & Tool</a></li>
                                    <li><a href="#">Our Portfolio</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Get In Touch</a></li>
                                </ul>
                            </div>
                            <!-- /.widget footer-widget -->
                        </div>
                        <!-- /.col-lg-3 col-md-6 -->

                        <div class="col-lg-3 col-md-6">
                            <div class="widget footer-widget">
                                <h3 class="widget-title">Our Address</h3>

                                <p>
                                    Lavaca Street, Suite 24, Road Apt New York, USA
                                </p>

                                <ul class="footer-social-link">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <!-- /.widget footer-widget -->
                        </div>
                        <!-- /.col-lg-3 col-md-6 -->
                    </div>
                    <!-- /.row -->

                </div><!-- /.footer-inner -->

                <div class="site-info">
                    <div class="copyright">
                        <p>© 2023 All Rights Reserved Design by <a href="http://www.pixelsigns.art/"
                                target="_blank">PixelSigns</a></p>
                    </div>

                    <ul class="site-info-menu">
                        <li><a href="#">Privacy & Policy.</a></li>
                        <li><a href="#">Faq.</a></li>
                        <li><a href="#">Terms.</a></li>
                    </ul>
                </div><!-- /.site-info -->
            </div><!-- /.container -->
        </footer><!-- /#footer -->


    </div><!-- /#site -->

    <!-- Dependency Scripts -->
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


    <!-- Site Scripts -->
    <script src="assets/js/header.js"></script>
    <script src="assets/js/app-min.js"></script>

</body>


<!-- Mirrored from saaspik.pixelsigns.art/saaspik/blog-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Dec 2023 01:34:07 GMT -->

</html>
