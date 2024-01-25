@extends('layouts.app')
@section('content')
<h3 class="text-dark fw-semibold d-flex justify-content-center mb-3">Download buku panduan sipjaki disini</h3>
    <div class="d-flex justify-content-center align-items-center">
        <button class="btn text-white" style="background-color: #1B3061" onclick="downloadManualBook()">
            <span class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M5 20h14v-2H5v2zM19 9h-4V3H9v6H5l7 7l7-7z" />
                </svg> Download
            </span>
        </button>
    </div>
@endsection
@section('script')
    <script>
        function downloadManualBook() {
            var link = document.createElement('a');
            link.href = "{{ asset('Manual Book SIPJAKI.pdf') }}";
            link.download = 'Manual Book SIPJAKI.pdf';
            link.click();
        }
    </script>
@endsection
