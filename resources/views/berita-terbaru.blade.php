@extends('layouts.app-landing-page')
@section('content')
    <div class="tabs-wrapper">
        <div class="section-title text-center">
            <h2 style="border-radius: 16px;
    background: var(--Kuning, #FFC928);" class="title">Berita Terbaru</h2>
        </div>
    </div>
    <div class="row">
        @forelse ($news as $news)
            <div class="col-lg-4 col-md-6">
                <article class="post-post-grid" data-wow-delay="0.7s"
                    style="visibility: visible; animation-delay: 0.7s; animation-name: pixFadeLeft;">
                    <div class="feature-image">
                        <a href="#">
                            <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="">
                        </a>
                    </div>
                    <div class="blog-content">
                        <ul class="post-meta">
                            <li><a
                                    href="#">{{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('d F Y') }}</a>
                            </li>
                        </ul>

                        <h3 class="entry-title"><a href="#">{{ $news->title }}</a></h3>
                        <div class="row">
                            <a href="javascript:void(0)" class="col-12">
                                <button class="btn btn-outline-primary d-flex align-items-center justify-content-between"
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
        @empty
        @endforelse

    </div>
    <!-- /.row -->

    <ul class="post-navigation">
        <li class="active">1</li>
        <li><a href="#">2</a></li>
        <li class="next"><a href="#"><i class="ei ei-arrow_carrot-right"></i></a></li>
    </ul>
@endsection
