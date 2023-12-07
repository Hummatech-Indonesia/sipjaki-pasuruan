@extends('layouts.app-landing-page')
@section('content')
<div class="container d-flex justify-content-center" style="margin-top:12px">
    <iframe src="{{ asset('assets/PUPR.mp4') }}" width="1200" height="700" frameborder="2"></iframe>
</div>
    <div class="blog-post-archive">
        <div class="container">
            <div class="d-flex justify-content-center mb-4">
                <div style="width:20%;height:auto;flex-shrink:0;border-radius: 16px;background: var(--Kuning, #FFC928);">
                    <p class="my-auto"
                        style="color: var(--Biru-Primary, #1B3061);
            text-align: center;
            font-family: Poppins;
            font-size: 25px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;">
                        Berita Terbaru</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <article class="post-post-grid">
                        <div class="feature-image">
                            <a href="blog-signle.html">
                                <img src="{{ asset('assets/sipjaki.png') }}" alt="">
                            </a>
                        </div>
                        <div class="blog-content">
                            <ul class="post-meta">
                                <li><a href="#">12 Januari 2023</a></li>
                            </ul>

                            <h3 class="entry-title"><a href="#">Pemerintah Korupsi Dana
                                    Perbaikan AC</a></h3>
                            <div class="row">
                                <a href="javascript:void(0)" class="col-12">
                                    <button
                                        class="btn btn-outline-primary d-flex align-items-center justify-content-between"
                                        style="width:100%">
                                        <span>Lihat selengkapnya</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
                                        </svg>
                                    </button>
                                </a>
                            </div>

                        </div><!-- /.post-content -->
                    </article><!-- /.post -->
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="post-post-grid">
                        <div class="feature-image">
                            <a href="blog-signle.html">
                                <img src="{{ asset('assets/sipjaki.png') }}" alt="">
                            </a>
                        </div>
                        <div class="blog-content">
                            <ul class="post-meta">
                                <li><a href="#">12 Januari 2023</a></li>
                            </ul>

                            <h3 class="entry-title"><a href="#">Pemerintah Korupsi Dana
                                    Perbaikan AC</a></h3>
                            <div class="row">
                                <a href="javascript:void(0)" class="col-12">
                                    <button
                                        class="btn btn-outline-primary d-flex align-items-center justify-content-between"
                                        style="width:100%">
                                        <span>Lihat selengkapnya</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
                                        </svg>
                                    </button>
                                </a>
                            </div>

                        </div><!-- /.post-content -->
                    </article><!-- /.post -->
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="post-post-grid">
                        <div class="feature-image">
                            <a href="blog-signle.html">
                                <img src="{{ asset('assets/sipjaki.png') }}" alt="">
                            </a>
                        </div>
                        <div class="blog-content">
                            <ul class="post-meta">
                                <li><a href="#">12 Januari 2023</a></li>
                            </ul>

                            <h3 class="entry-title"><a href="#">Pemerintah Korupsi Dana
                                    Perbaikan AC</a></h3>
                            <div class="row">
                                <a href="javascript:void(0)" class="col-12">
                                    <button
                                        class="btn btn-outline-primary d-flex align-items-center justify-content-between"
                                        style="width:100%">
                                        <span>Lihat selengkapnya</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
                                        </svg>
                                    </button>
                                </a>
                            </div>

                        </div><!-- /.post-content -->
                    </article><!-- /.post -->
                </div>
                <!-- /.col-lg-4 -->
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
@endsection
