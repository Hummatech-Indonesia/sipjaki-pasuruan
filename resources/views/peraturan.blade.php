@extends('layouts.app-landing-page')
@section('content')
    <style>
        .search-container {
            display: flex;
            align-items: center;
            position: relative;
        }

        .search-icon {
            margin-left: 10px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <div class="tabs-wrapper">
        <div class="section-title text-center">
            <h2 style="border-radius: 16px;
        background: var(--Kuning, #FFC928);" class="title p-1">Data Peraturan</h2>
        </div>
    </div>
    <div class="d-flex row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Peraturan</h4>
                    <div id="column_chart_datalabel" data-colors='["#FFC928"]' class="apex-charts" dir="ltr"></div>
                    <div class="text-center col-12" style="display: none;">
                        <div class="d-flex justify-content-center" style="min-height:16rem">
                            <div class="my-auto">
                                <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                <h4 class="text-center mt-4">Data Masih Kosong!!</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="d-flex justify-content-header gap-2">
                            <div class="d-flex d-row align-items-center mb-3">
                                <div class="position-relative  search-container">
                                    <input type="search" class="py-2 ps-5" id="search-name" name="title" placeholder="Search">
                                    <i class="bx bx-search-alt search-icon"></i>
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="text-white btn" style="background-color: #1B3061">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0" border="1">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-medium"
                                        style="background-color: #1B3062; color: white; border-right: 1px solid #1B3061;">
                                        No</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Kategori</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Nomor</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Tahun</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Judul</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rules as $index=> $rule)
                                    <tr>
                                        <th scope="row" class="fs-5">{{ $index + 1 }}</th>
                                        <td>{{ $rule->ruleCategory->name }}</td>
                                        <td>{{ $rule->code }}</td>
                                        <td>{{ $rule->year }}</td>
                                        <td>{{ $rule->title }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="download-rule/{{ $rule->id  }}">
                                                    <button type="submit" class="btn btn-detail waves-effect waves-light text-white btn waves-effect d-flex flex-row gap-1 justify-content-evenly"
                                                        style="background-color:#2CA67A;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="15"
                                                            width="15" fill="white" transform="rotate(90)"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                                                        </svg>
                                                        <span class="ms-2">Download</span>
                                                    </button>
                                            </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <div class="d-flex justify-content-center" style="min-height:16rem">
                                            <div class="my-auto">
                                                <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                                <h4 class="text-center mt-4">Belum Peraturan Ditambahkan!!</h4>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/apexcharts.init.js') }}"></script>
    <script>
        get()
        function get() {
            $.ajax({
                url: "accident-chart",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    if (response.data.length === 0) {
            $("#column_chart_datalabel").hide();
                        $(".text-center.col-12").show();

        }else{
            var seriesData = [];
            var categories = [];

            $.each(response.data, function(index, item) {
                seriesData.push(item.accidentCount);
                categories.push(item.name);
            });

            var options = {
                chart: {
                    height: 350,
                    type: "bar",
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            position: "top"
                        }
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(e) {
                        return e + "";
                    },
                    offsetY: -22,
                    style: {
                        fontSize: "12px",
                        colors: ["#304758"]
                    }
                },
                series: [{
                    name: "Kecelakaan",
                    data: seriesData
                }],
                colors: ['#FFC928'],
                grid: {
                    borderColor: "#f1f1f1"
                },
                xaxis: {
                    categories: categories,
                    position: "top",
                    labels: {
                        offsetY: -18
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        fill: {
                            type: "gradient",
                            gradient: {
                                colorFrom: "#D8E3F0",
                                colorTo: "#BED1E6",
                                stops: [0, 100],
                                opacityFrom: 0.4,
                                opacityTo: 0.5
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                        offsetY: -35
                    }
                },
                fill: {
                    gradient: {
                        shade: "light",
                        type: "horizontal",
                        shadeIntensity: 0.25,
                        gradientToColors: undefined,
                        inverseColors: true,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [50, 0, 100, 100]
                    }
                },
                yaxis: {
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        show: false,
                        formatter: function(e) {
                            return e + "";
                        }
                    }
                }
            };

            var chart = new ApexCharts(
                document.querySelector("#column_chart_datalabel"),
                options
            );

            chart.render();

            // Menambahkan teks di bawah grafik
            var chartContainer = document.querySelector("#column_chart_datalabel");
            var textContainer = document.createElement("div");
            textContainer.innerHTML = categories.map(function(category, index) {
                return "<span style='display: block; text-align: center; width: " + (100 /
                    categories.length) + "%;'>" + category + "</span>";
            }).join("");
            textContainer.style.display = "flex";
            textContainer.style.justifyContent = "space-between";
            chartContainer.parentNode.appendChild(textContainer);
        }
                }
            });
        }
    </script>
@endsection
