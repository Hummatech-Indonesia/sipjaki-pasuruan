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
    <div class="container d-flex justify-content-center mt-4">
        <main role="main" style="width:75%">
            <div id="carousel" class="carousel" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <canvas id="pdf-canvas" class="d-block w-100"
                            data-file="{{ asset('Manual Book SIPJAKI.pdf') }}"></canvas>
                        <div class="carousel-caption d-none d-md-block">
                            <span>Page: <span id="page-num"></span> / <span id="page-count"></span></span>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#" role="button" data-slide="prev">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a class="carousel-control-next" href="#" role="button" data-slide="next">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </main>
    </div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <script>
        function downloadManualBook() {
            var link = document.createElement('a');
            link.href = "{{ asset('Manual Book SIPJAKI.pdf') }}";
            link.download = 'Manual Book SIPJAKI.pdf';
            link.click();
        }
    </script>
    <script>
        
       
        $(function() {
            let pdfDoc = null,
                pageNum = 1,
                pageRendering = false,
                pageNumPending = null;

            const scale = 5.0,
                canvas = document.getElementById('pdf-canvas'),
                pnum = document.getElementById('page-num'),
                ctx = canvas.getContext('2d');

            /**
             * Get page info from document, resize canvas accordingly, and render page.
             * @param num Page number.
             */
            function renderPage(num) {
                pageRendering = true;

                // Using promise to fetch the page
                pdfDoc.getPage(num).then(function(page) {
                    const page_viewport = page.getViewport({
                        scale
                    });
                    canvas.height = page_viewport.height;
                    canvas.width = page_viewport.width;

                    // Render PDF page into canvas context
                    const renderContext = {
                        canvasContext: ctx,
                        viewport: page_viewport
                    };
                    const renderTask = page.render(renderContext);

                    // Wait for rendering to finish
                    renderTask.promise.then(function() {
                        pageRendering = false;
                        if (pageNumPending !== null) {
                            // New page rendering is pending
                            renderPage(pageNumPending);
                            pageNumPending = null;
                        }
                    });
                });

                // Update page counters
                pnum.textContent = num;
            }

            /**
             * If another page rendering in progress, waits until the rendering is
             * finished. Otherwise, executes rendering immediately.
             */
            function queueRenderPage(num) {
                if (pageRendering) {
                    pageNumPending = num;
                } else {
                    renderPage(num);
                }
            }

            /**
             * Displays previous page.
             */
            document.querySelector(".carousel-control-prev").addEventListener('click', function() {
                if (pageNum > 1) {
                    pageNum--;
                    queueRenderPage(pageNum);
                }
            });

            /**
             * Displays next page.
             */
            document.querySelector(".carousel-control-next").addEventListener('click', function() {
                if (pageNum < pdfDoc.numPages) {
                    pageNum++;
                    queueRenderPage(pageNum);
                }
            });

            /**
             * Asynchronously downloads PDF.
             */
            (function() {
                const url = canvas.dataset.file;
                pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
                    pdfDoc = pdfDoc_;
                    document.getElementById("page-count").textContent = pdfDoc.numPages;

                    // Initial/first page rendering
                    renderPage(pageNum);
                });
            })();
        });
    </script>
@endsection
