@extends('layouts.app-landing-page')
@section('content')
    <div class="tabs-wrapper">
        <div class="section-title text-center">
            <h2 style="border-radius: 16px;
            background: var(--Kuning, #FFC928);" class="title p-1">Struktur Organisasi DKSDK</h2>
        </div>
    </div>
    <div class="px-2 py-2 d-flex justify-content-center">
        <div class="px-1 py-1" style="border-radius: 4px; overflow: hidden;">
            {!! $images[0]->photo !!}
        </div>
    </div>


@endsection
