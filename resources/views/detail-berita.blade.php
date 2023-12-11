@extends('layouts.app-landing-page')
@section('content')
<div class="tabs-wrapper">
    <div class="section-title text-center">
        <h2 style="border-radius: 16px;
    background: var(--Kuning, #FFC928);" class="title">Detail Berita</h2>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="post-wrapper">
            <article class="post">
                <div class="feature-image">
                    <a href="blog-signle.html">
                        <img src="{{ asset('berita.png') }}" alt="blog">
                    </a>
                </div>
                <div class="blog-content">
                    <ul class="post-meta">
                        <li><i class="fas fa-calendar-alt"></i> Oct 16, 2019</li>
                    </ul>

                    <h4 class="entry-title">Pelatihan Tenaga Terampil Jasa Konstruksi Tahun 2023</h4>

                    <p>
                        The little rotter spiffing good time lemon squeezy smashing excuse my French old, cheesed off give us a bell happy days brown bread, blow off Harry barney bobby. Cup of char gormless hors.!
                    </p>

                </div><!-- /.post-content -->
            </article><!-- /.post -->

        </div><!-- /.post-wrapper -->
    </div><!-- /.col-lg-8 -->
    <div class="col-lg-4">
        <div class="sidebar">
            <div id="gp-posts-widget-2" class="widget gp-posts-widget">
                <h2 class="widget-title">Berita Terpopuler</h2>
                <div class="gp-posts-widget-wrapper">
                    <div class="post-item">
                        <div class="post-widget-thumbnail">
                            <a href="#">
                                <img src="{{ asset('berita-2.png') }}" alt="thumb">
                            </a>
                        </div>
                        <div class="post-widget-info">
                            <h5 class="post-widget-title">
                                <a href="#" title="This Is Test Post">The Festive Season is Approaching</a>
                            </h5>
                            <span class="post-date">May 16, 2019, Saturday</span>

                        </div>
                    </div>

                    <div class="post-item">
                        <div class="post-widget-thumbnail">
                            <a href="#">
                                <img src="{{ asset('berita-2.png') }}" alt="thumb">
                            </a>
                        </div>
                        <div class="post-widget-info">
                            <h5 class="post-widget-title">
                                <a href="#" title="This Is Test Post">Shrimp Scampi With Linguini</a>
                            </h5>
                            <span class="post-date">Apri 16, 2019, Thursday</span>
                        </div>
                    </div>

                    <div class="post-item">
                        <div class="post-widget-thumbnail">
                            <a href="#">
                                <img src="{{ asset('berita-2.png') }}" alt="thumb">
                            </a>
                        </div>
                        <div class="post-widget-info">
                            <h5 class="post-widget-title">
                                <a href="#" title="This Is Test Post">Join Us For a Delicious Event</a>
                            </h5>
                            <span class="post-date">Oct 16, 2019, Monday</span>

                        </div>
                    </div>

                </div>
            </div>
        </div><!-- /.sidebar -->
    </div><!-- /.col-lg-4 -->
</div>
@endsection
