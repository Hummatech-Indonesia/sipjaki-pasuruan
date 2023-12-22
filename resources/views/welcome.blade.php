@extends('layouts.app-landing-page')
@section('content')
    <style>
        .blog-content .post-meta li a:hover {
            color: #FFC928;
        }

        @media (max-width: 540px) {
            .berita-terbaru {
                width: 50%;
            }
        }

        @media(min-width:1200px) {
            .berita-terbaru {
                width: 20%;
            }
        }
    </style>
    <div class="container d-flex justify-content-center" style="margin-top:12px">
        {{-- <iframe src="{{ asset('storage/video/video.mp4') }}" width="1200" height="700" frameborder="2"></iframe> --}}
    </div>
    <div class="blog-post-archive">
        <div class="container">
            <div class="d-flex justify-content-center mb-4">
                <div class="berita-terbaru"
                    style="height:auto;flex-shrink:0;border-radius: 16px;background: var(--Kuning, #FFC928);">
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

                                <h3 class="entry-title"><a
                                        href="{{ route('berita', ['news' => $news->id]) }}">{{ $news->title }}</a></h3>
                                <div class="row">
                                    <a href="{{ route('berita', ['news' => $news->id]) }}" class="col-12">
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
                @empty
                    <div class="text-center col-12">
                        <div class="d-flex justify-content-center" style="min-height:16rem">
                            <div class="my-auto">
                                <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                <h4 class="text-center mt-4">Berita Kosong!!</h4>
                            </div>
                        </div>
                    </div>
                @endforelse

                <!-- /.col-lg-4 -->
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.blog-post-archive -->
@endsection
