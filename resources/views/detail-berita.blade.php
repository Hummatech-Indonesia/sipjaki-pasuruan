@extends('layouts.app-landing-page')
@section('content')
    <div class="tabs-wrapper">
        <div class="section-title text-center">
            <h2 style="border-radius: 16px;
    background: var(--Kuning, #FFC928);" class="title p-1">Detail Berita</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="post-wrapper">
                <article class="post">
                    <div class="feature-image">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('storage/' . $data->thumbnail) }}"
                                style="
                        width: -webkit-fill-available;
                    "
                                alt="blog">
                        </a>
                    </div>
                    <div class="blog-content">
                        <ul class="post-meta">
                            <li><i class="fas fa-calendar-alt"></i>
                                {{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</li>
                        </ul>

                        <h4 class="entry-title">{{ $data->title }}</h4>

                        <p>
                            {!! $data->content !!}
                        </p>

                    </div><!-- /.post-content -->
                </article><!-- /.post -->

            </div><!-- /.post-wrapper -->
        </div><!-- /.col-lg-8 -->
        <div class="col-lg-4">
            <div class="sidebar">
                <div id="gp-posts-widget-2" class="widget gp-posts-widget">
                    <h2 class="widget-title">Berita Terbaru</h2>
                    <div class="gp-posts-widget-wrapper">
                        @forelse ($dataNews as $news)
                            <div class="post-item">
                                <div class="post-widget-thumbnail">
                                    <a href="#">
                                        <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="thumb">
                                    </a>
                                </div>
                                <div class="post-widget-info">
                                    <h5 class="post-widget-title">
                                        <a href="{{ route('berita',$news->slug) }}" title="{{ $news->title }}">{{ substr($news->title, 0, 50)}}</a>
                                    </h5>
                                    <span
                                        class="post-date">{{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('d F Y') }}</span>

                                </div>
                            </div>
                        @empty
                        @endforelse

                    </div>
                </div>
            </div><!-- /.sidebar -->
        </div><!-- /.col-lg-4 -->
    </div>
@endsection
