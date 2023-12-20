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
            <img src="{{ asset('storage/structure_organitation/structure_organitation.jpg') }}" alt="" style="border:10px solid #1B3061;border-radius: 20px; width: 100%; height: auto; max-width: 700px;">
        </div>
    </div>


@endsection
