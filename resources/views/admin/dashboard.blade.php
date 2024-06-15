@extends('admin.template.main')

@section('title', 'Dashboard Admin - EduGuard')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Admin Dashboard</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Home</li>
                    </ul>
                </div>
                <div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center gap-2 gap-lg-3">
                    <div class="d-flex justify-content-between w-100 gap-2">
                        <input type="date" id="bt-start-date" name="start_date"
                            class="form-control form-control-sm mb-2 mb-lg-0 w-100">
                        <input type="date" id="bt-end-date" name="end_date"
                            class="form-control form-control-sm mb-2 mb-lg-0 w-100">
                    </div>
                    <button type="button" class="btn btn-sm fw-bold btn-secondary w-100 w-lg-auto" id="bt-download">
                        Download
                    </button>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="col-xxl-8">
                        <div class="card h-xl-100">
                            <div class="card-header position-relative py-0 border-bottom-2">
                                <ul class="nav nav-stretch nav-pills nav-pills-custom d-flex mt-3">
                                    <li class="nav-item p-0 ms-0 me-8">
                                        <a class="nav-link btn btn-color-muted active px-0" data-bs-toggle="tab"
                                            id="kt_chart_widgets_22_tab_1" href="#kt_chart_widgets_22_tab_content_1">
                                            <span class="nav-text fw-semibold fs-4 mb-3">Overview</span>
                                            <span
                                                class="bullet-custom position-absolute z-index-2 w-100 h-2px top-100 bottom-n100 bg-primary rounded"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item p-0 ms-0">
                                        <a class="nav-link btn btn-color-muted px-0" data-bs-toggle="tab"
                                            id="kt_chart_widgets_22_tab_2" href="#kt_chart_widgets_22_tab_content_2">
                                            <span class="nav-text fw-semibold fs-4 mb-3">Performance</span>
                                            <span
                                                class="bullet-custom position-absolute z-index-2 w-100 h-2px top-100 bottom-n100 bg-primary rounded"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body pb-3">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="kt_chart_widgets_22_tab_content_1">
                                        <div class="d-flex flex-wrap flex-md-nowrap">
                                            <div class="me-md-5 w-100">
                                                <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                                    <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                                        <div class="symbol symbol-50px me-4">
                                                            <span class="symbol-label">
                                                                <i class="ki-duotone ki-user fs-2qx text-primary">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                </i>
                                                            </span>
                                                        </div>
                                                        <div class="me-2">
                                                            <span class="text-gray-800 fs-6 fw-bold">Good Students</span>
                                                            <span class="text-gray-500 fw-bold d-block fs-7">Students
                                                                without Violations Report</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="text-gray-900 fw-bolder fs-2x">{{ $studentsWithoutViolation }}</span>
                                                        <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                                                        <span
                                                            class="text-gray-600 fw-semibold fs-2 me-3 pt-2">{{ $totalStudents }}</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                                    <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                                        <div class="symbol symbol-50px me-4">
                                                            <span class="symbol-label">
                                                                <i class="ki-duotone ki-user-edit fs-2qx text-primary">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                </i>
                                                            </span>
                                                        </div>
                                                        <div class="me-2">
                                                            <a href="#"
                                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">Bad
                                                                Students</a>
                                                            <span class="text-gray-500 fw-bold d-block fs-7">Students with
                                                                Violations Report</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="text-gray-900 fw-bolder fs-2x">{{ $studentsWithViolation }}</span>
                                                        <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                                                        <span
                                                            class="text-gray-600 fw-semibold fs-2 me-3 pt-2">{{ $totalStudents }}</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                                    <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                                        <div class="symbol symbol-50px me-4">
                                                            <span class="symbol-label">
                                                                <i class="ki-duotone ki-abstract-24 fs-2qx text-primary">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                            </span>
                                                        </div>
                                                        <div class="me-2">
                                                            <a href="#"
                                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">Exceptional
                                                                Students</a>
                                                            <span class="text-gray-500 fw-bold d-block fs-7">Students with
                                                                Outstanding Records</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="text-gray-900 fw-bolder fs-2x">{{ $studentsWithHighPoints }}</span>
                                                        <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                                                        <span
                                                            class="text-gray-600 fw-semibold fs-2 me-3 pt-2">{{ $totalStudents }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column w-225px w-md-600px mx-auto mx-md-0 pt-3 pb-5">
                                                <div class="fs-4 fw-bold text-gray-900 text-center">Violation Categories
                                                </div>
                                                <div id="category"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_chart_widgets_22_tab_content_2">
                                        <div class="d-flex flex-wrap flex-md-nowrap justify-content-center">
                                            <div id="performance"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card bg-primary h-xl-100">
                            <div class="card-body d-flex flex-column pt-13 pb-14">
                                <div class="m-0">
                                    <h1 class="fw-semibold text-white text-center lh-lg mb-9">How are you feeling today?
                                        <span class="fw-bolder">Feels good, right?</span>
                                    </h1>
                                    <div class="flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-center card-rounded-bottom h-200px mh-200px my-5 mb-lg-12"
                                        style="background-image:url('assets/media/svg/illustrations/easy/6.svg')"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabelPelanggaranDashboard" class="table hover stripe" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Student Name</th>
                                                <th>NIS</th>
                                                <th>Class</th>
                                                <th>Category</th>
                                                <th>Sanction</th>
                                                <th>Points</th>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Teacher Name</th>
                                                <th>Teacher Phone</th>
                                                <th>Teacher Email</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.getElementById('bt-download').addEventListener('click', function() {
            var startDate = document.getElementById('bt-start-date').value;
            var endDate = document.getElementById('bt-end-date').value;

            if (!startDate || !endDate) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Please select both start and end dates before downloading the report!',
                });
                return;
            }

            var selectedStartDate = new Date(startDate);
            var selectedEndDate = new Date(endDate);

            if (selectedStartDate > selectedEndDate) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Date Range',
                    text: 'The start date cannot be later than the end date.',
                });
                return;
            }

            var hasRecords = false;
            tabel.rows().every(function() {
                var rowData = this.data();
                var rowDataDate = new Date(rowData.date);

                if (rowDataDate >= selectedStartDate && rowDataDate <= selectedEndDate) {
                    hasRecords = true;
                    return false;
                }
            });

            if (!hasRecords) {
                Swal.fire({
                    icon: 'error',
                    title: 'No Records Found',
                    text: 'No violations found for the selected date range in the table.',
                });
                return;
            }

            window.location.href = '/export-excel/violation-dashboard?start_date=' + encodeURIComponent(startDate) +
                '&end_date=' + encodeURIComponent(endDate);
        });

        $(document).ready(function() {
            tabel = $('#tabelPelanggaranDashboard').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datapelanggaran') }}",
                order: [
                    [7, 'desc']
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'student_name',
                        name: 'student_name'
                    },
                    {
                        data: 'nis',
                        name: 'nis'
                    },
                    {
                        data: null,
                        name: 'class_major',
                        render: function(data, type, row, meta) {
                            return `${row.class_name} - ${row.major}`;
                        }
                    },
                    {
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'sanction_name',
                        name: 'sanction_name'
                    },
                    {
                        data: 'points',
                        name: 'points'
                    },
                    {
                        data: 'date',
                        name: 'date',
                        render: function(data, type, full, meta) {
                            if (type === 'display' || type === 'filter') {
                                return moment(data).format('DD/MM/YYYY');
                            }
                            return data;
                        }
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'teacher_name',
                        name: 'teacher_name'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number',
                        render: function(data, type, row) {
                            let phoneNumber = data.replace(/\D/g,
                                '');
                            return '<a href="https://wa.me/' + phoneNumber +
                                '" target="_blank" class="fw-semibold text-muted text-hover-primary">' +
                                data + '</a>';
                        }
                    },
                    {
                        data: 'teacher_email',
                        name: 'teacher_email'
                    },
                ],
                aLengthMenu: [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                iDisplayLength: 10,
                responsive: true,
                drawCallback: function(settings) {
                    feather.replace();
                },
                initComplete: function() {
                    feather.replace();
                }
            });

            tabel.on('responsive-display.dt', function(e, datatable, row, showHide, update) {
                feather.replace();
            });

            tabel.on('draw.dt', function() {
                feather.replace();
            });

            $(window).resize(function() {
                tabel.columns.adjust().responsive.recalc();
            });
        });

        $(window).resize(function() {
            $('#tabelPelanggaranDashboard').DataTable().columns.adjust().responsive.recalc();
        });

        document.addEventListener('DOMContentLoaded', function() {
            let categoriesData = @json($categoriesData);
            let chartData = categoriesData.map(function(category) {
                return {
                    x: category.name,
                    y: category.pelanggaran_count
                };
            });
            let options = {
                series: chartData.map(data => data.y),
                chart: {
                    type: 'donut',
                    height: 350
                },
                labels: chartData.map(data => data.x),
                plotOptions: {
                    pie: {
                        donut: {
                            size: '65%',
                        }
                    }
                },
                legend: {
                    position: 'bottom'
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                    }
                }]
            };
            var chart = new ApexCharts(document.querySelector("#category"), options);
            chart.render();
        });

        document.addEventListener('DOMContentLoaded', function() {
            let data = @json($performance);
            let chartData = data.map(function(item) {
                return {
                    x: new Date(item.date).getTime(),
                    y: item.pelanggaran_count
                };
            });
            chartData.sort((a, b) => a.x - b.x);
            let options = {
                series: [{
                    name: 'Violations',
                    data: chartData
                }],
                chart: {
                    height: 350,
                    width: 700,
                    type: 'line', 
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                title: {
                    text: 'Violations Report',
                    align: 'center',
                    margin: 10,
                    style: {
                        fontSize: '18px',
                        fontWeight: 'bold',
                        color: '#000'
                    }
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    type: 'datetime', 
                    labels: {
                        format: 'dd MMM yyyy',
                        datetimeUTC: false 
                    },
                    tickAmount: 'dataPoints', 
                    tooltip: {
                        enabled: true,
                        formatter: function(val) {
                            return new Date(val).toLocaleDateString('en-GB'); 
                        }
                    }
                },
                yaxis: {
                    min: 0,
                    forceNiceScale: true
                },
                tooltip: {
                    x: {
                        format: 'dd MMM yyyy'
                    }
                },
                responsive: [{
                    breakpoint: 768,
                    options: {
                        chart: {
                            height: 300,
                            width: '100%',
                            toolbar: {
                                show: false
                            }
                        }
                    }
                }]
            };
            var chart = new ApexCharts(document.querySelector("#performance"), options);
            chart.render();
        });
    </script>
@endpush

@push('style')
    <style>
        #tabelPelanggaranDashboard td,
        #tabelPelanggaranDashboard th {
            text-align: center;
            white-space: nowrap;
        }

        #tabelPelanggaranDashboard th {
            font-weight: bold;
        }

        #tabelPelanggaranDashboard thead th:first-child {
            cursor: default;
        }

        #tabelPelanggaranDashboard thead th:first-child::after,
        #tabelPelanggaranDashboard thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #tabelPelanggaranDashboard td {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>
@endpush
