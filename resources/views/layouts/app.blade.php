<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sipjaki Kabupaten Pasuruan</title>
    <link rel="shortcut icon" type="{{ asset('image/png') }}" href="{{ asset('assets/sipjaki.png') }}" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/plugin.js') }}"></script>
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/libs/summernote/summernote.css') }}">

    @yield('style')
    <style>
        .btn-sipjaki {
            background-color: #1B3061;
        }

        thead .table-sipjaki {
            background-color: #1B3061;
            color: #ffffff
        }
         .badge-sipjaki{
            background-color: #1B3061;
        }
    </style>
</head>

<body>
    <div class="layout-wraper">
        @include('layouts.header')
        @include('layouts.sidebar')
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')

                </div>
                <!-- container-fluid -->
            </div>

        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ asset('assets/libs/summernote/summernote.js') }}"></script>


    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>

    <!-- form wizard init -->
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ asset('assets/js/pages/sweet-alerts.init.js') }}"></script>
    <script>
        // const authToken = localStorage.getItem('token')
        // $.ajaxSetup({
        //     headers: {
        //         'Accept': 'application/json',
        //         'Authorization': 'Bearer ' + authToken,
        //     }
        // });


        $('#logoutBtn').on('click', function() {
            $('.preloader').show()
            $.ajax({
                url: "{{ config('app.api_url') }}/logout",
                type: "POST",
                dataType: "JSON",
                success: function(response) {
                    $('.preloader').fadeOut()
                    localStorage.removeItem('token');
                    window.location.href =
                        "/login";
                },
                error: function(response) {
                    $('.preloader').fadeOut()
                    console.log(response);
                }
            });
        });

        function handleValidate(messages, type) {
            const keys = Object.keys(messages);
            for (const key of keys) {
                const text = messages[key];
                var ErrorList = $('<li>').text(text[0])
                let inputElement = $(`#${type}-${key}`)
                let select2Element = $(`#${type}-${key}`).siblings('.select2-container');
                if (!inputElement.is('div')) {
                    inputElement.addClass('error')
                    select2Element.addClass('error');
                }
                inputElement.next('ul').html(ErrorList)
                select2Element.next('ul').html(ErrorList)
            }
            $('.error').change(function() {
                $(this).removeClass('error')
                $(this).next('ul').html('')
            })
        }

        function handlePaginate(pagination) {
            const paginate = $('<ul>').addClass('pagination')
            const currentPage = pagination.current_page
            const lastPage = pagination.last_page
            if (lastPage >= 11) {
                var startPage = currentPage
                var endPage = currentPage + 1
                if (startPage > 1) startPage = currentPage - 1
                if (currentPage == lastPage) endPage -= 1
                for (var page = startPage; page <= endPage; page++) {
                    const pageItem = $('<li>').addClass('page-item')
                    page == currentPage ? pageItem.addClass('active') : '';
                    const pageLink =
                        `<button class="page-link" onclick="get(${page})" >${page}</button>`
                    pageItem.html(pageLink)
                    paginate.append(pageItem)
                }
                const morePage = `<li class="page-item disabled">
                            <button
                            class="page-link"
                            tabindex="-1"
                            aria-disabled="true"
                            >...</button>
                        </li>`
                if (currentPage >= 3) {
                    var leftPage = 3;
                    if (currentPage == 3) leftPage = 1
                    if (currentPage == 4) leftPage = 2
                    if (currentPage >= 6) paginate.prepend(morePage)
                    for (var page = leftPage; page >= 1; page--) {
                        const pageItem = $('<li>').addClass('page-item')
                        const pageLink =
                            `<button  class="page-link" onclick="get(${page})">${page}</button>`
                        pageItem.html(pageLink)
                        paginate.prepend(pageItem)
                    }
                }
                if (currentPage <= (lastPage - 2)) {
                    var rightPage = 1
                    if (currentPage == (lastPage - 2)) rightPage = 0
                    if (currentPage == (lastPage - 3)) rightPage = 1
                    if (currentPage < (lastPage - 4)) paginate.append(morePage)
                    for (var page = (lastPage - rightPage); page <= lastPage; page++) {
                        const pageItem = $('<li>').addClass('page-item')
                        const pageLink = `<button class="page-link" onclick="get(${page})">${page}</button>`
                        pageItem.html(pageLink)
                        paginate.append(pageItem)
                    }
                }
            } else {
                for (var page = 1; page <= lastPage; page++) {
                    const pageItem = $('<li>').addClass('page-item')
                    page == currentPage ? pageItem.addClass('active') : '';
                    const pageLink = `<button class="page-link" onclick="get(${page})">${page}</button>`
                    pageItem.append(pageLink)
                    paginate.append(pageItem)
                }
            }
            const previous = `<li class="page-item ${currentPage == 1 ? 'disabled' : ''}" ${currentPage != 1 ? 'onclick="get('+(currentPage - 1)+')"' : ''}>
                            <button
                            class="page-link"
                            tabindex="-1"
                            aria-disabled="true"
                            >Previous</button>
                        </li>`
            const next = `<li class="page-item ${currentPage == lastPage ? 'disabled' : ''}" ${currentPage != lastPage ? 'onclick="get('+(pagination.current_page + 1)+')"' : ''}>
                                <button class="page-link" href="#">Next</button>
                        </li>`
            paginate.prepend(previous)
            paginate.append(next)
            return paginate
        }

        function emptyForm(formId) {
            const form = $('#' + formId)
            form.find('input').each(function() {
                if ($(this).attr('type') === 'checkbox' || $(this).attr('type') === 'radio') {
                    $(this).prop('checked', false);
                } else if ($(this).attr('type') === 'file') {
                    $(this).val(null);
                } else {
                    $(this).val('');
                }
            });
            form.find('select').prop('selectedIndex', 0);
            form.find('.select2-with-bg').val(null).trigger('change');
            form.find('.select2').val(null).trigger('change');
            form.find('textarea').val('');
        }

        function getDataAttributes(elementId) {
            const dataAttributes = {};
            const element = $('#' + elementId);
            if (element.length === 0) {
                console.error('Element with ID "' + elementId + '" not found.');
                return null;
            }
            $.each(element[0].attributes, function() {
                if (this.name.startsWith('data-')) {
                    const key = this.name.substring(5);
                    const value = this.value;
                    dataAttributes[key] = value;
                }
            });
            return dataAttributes;
        }

        function setFormValues(formId, values) {
            const form = $('#' + formId);
            for (const key in values) {
                if (values.hasOwnProperty(key)) {
                    const value = values[key];
                    const input = form.find('[name="' + key + '"]');
                    if (input.length > 0) {
                        const type = input.attr('type');
                        if (type === 'radio') {
                            input.filter('[value="' + value + '"]').prop('checked', true);
                        } else if (input.is('select')) {
                            if (input.hasClass('select2')) {
                                input.val(value).trigger('change'); // Trigger change event for Select2
                            } else {
                                input.val(value).trigger('change');
                            }
                        } else {
                            input.val(value);
                        }
                    } else {
                        const textarea = form.find('textarea[name="' + key + '"]');
                        if (textarea.length > 0) {
                            textarea.html(value);
                        }
                    }
                }
            }
        }

        function handleDetail(data) {
            const keys = Object.keys(data);
            for (const key of keys) {
                const text = data[key];
                $('#detail-' + key).html(text)
            }
        }

        function showLoading() {
            return `<div class="d-flex justify-content-center" style="margin-top:11rem">
                        <div class="spinner-border my-auto" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>`
        }

        function showNoData(message) {
            return `<div class="d-flex justify-content-center" style="min-height:16rem">
                        <div class="my-auto ">
                            <img src="{{ asset('no-data.svg') }}" width="400" height="400"/>
                            <h4 class="text-center">${message}</h4>
                            </div>
                    </div>`
        }
        $("#inputDate").on("change", function() {
            const inputDateValue = $(this).val();
            const parts = inputDateValue.split("-");
            const year = parts[0];
            const month = parts[1];
            const day = parts[2];
            const formattedDate = `${year}/${month}/${day}`;
            $(this).val(formattedDate);
        });
    </script>
    @yield('script')
</body>

</html>
