@extends('layouts.app-landing-page')
@section('content')
    <div class="tabs-wrapper">
        <div class="section-title text-center">
            <h2 style="border-radius: 16px;
            background: var(--Kuning, #FFC928);" class="title p-1">Tugas dan Fungsi</h2>
        </div>
    </div>
    <div class="px-2 py-2 d-flex justify-content-center">
        <div class="px-1 py-1" style="border-radius: 4px; overflow: hidden;">
           <div id="data"></div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $.ajax({
            url: "/image-landing-page",
            type: "GET",
            data: {
                category: 'job_and_function'
            },
            dataType: "JSON",
            success: function(response) {
                var imageUrl = response.data[0].photo;

                if (imageUrl == "-") {
                    $('#data').html(showNoData('Tugas dan Fungsi Kosong!!'))
                }
                else{
                    $('#data').html(imageUrl);
                }
            },
            error: function(response) {

            }
        });
    </script>
@endsection
