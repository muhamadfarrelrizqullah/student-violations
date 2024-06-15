@extends('teacher.template.main')

@section('title', 'Dashboard Teacher - EduGuard')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Teacher Dashboard</h1>
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
                <div class="row g-5 g-xl-10">
                    <div class="col-xl-4 mb-xl-10">
                        <div class="card card-flush h-xl-100">
                            <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px"
                                style="background-image:url('assets/media/svg/shapes/top-green.png" data-bs-theme="light">
                                <h3 class="card-title align-items-start flex-column text-white pt-15">
                                    <span class="fw-bold fs-2x mb-3">Info Card</span>
                                    <div class="fs-4 text-white">
                                        <span class="opacity-75">You have reported</span>
                                        <span class="position-relative d-inline-block">
                                            <a href="{{ route('teacher-violation') }}"
                                                class="link-white opacity-75-hover fw-bold d-block mb-1">{{ $countViolationsUser }}
                                                students</a>
                                            <span
                                                class="position-absolute opacity-50 bottom-0 start-0 border-2 border-body border-bottom w-100"></span>
                                        </span>
                                        <span class="opacity-75">so far.</span>
                                    </div>
                                </h3>
                            </div>
                            <div class="card-body mt-n20">
                                <div class="mt-n20 position-relative">
                                    <div class="row g-3 g-lg-6">
                                        <div class="col-6">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                <div class="symbol symbol-30px me-5 mb-8">
                                                    <span class="symbol-label">
                                                        <i class="ki-duotone ki-user fs-1 text-primary">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                </div>
                                                <div class="m-0">
                                                    <span
                                                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $countStudents }}</span>
                                                    <span class="text-gray-500 fw-semibold fs-6">Students</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                <div class="symbol symbol-30px me-5 mb-8">
                                                    <span class="symbol-label">
                                                        <i class="ki-duotone ki-bank fs-1 text-primary">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                </div>
                                                <div class="m-0">
                                                    <span
                                                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $countClasses }}</span>
                                                    <span class="text-gray-500 fw-semibold fs-6">Classes</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                <div class="symbol symbol-30px me-5 mb-8">
                                                    <span class="symbol-label">
                                                        <i class="ki-duotone ki-clipboard fs-1 text-primary">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </div>
                                                <div class="m-0">
                                                    <span
                                                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $countViolations }}</span>
                                                    <span class="text-gray-500 fw-semibold fs-6">Violations</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                <div class="symbol symbol-30px me-5 mb-8">
                                                    <span class="symbol-label">
                                                        <i class="ki-duotone ki-abstract-26 fs-1 text-primary">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </div>
                                                <div class="m-0">
                                                    <span
                                                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $countCategories }}</span>
                                                    <span class="text-gray-500 fw-semibold fs-6">Categories</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 mb-5 mb-xl-10">
                        <div class="row g-5 g-xl-10">
                            <div class="col-xl-12 mb-xl-10">
                                <div class="card p-2" id="kt_chart_widgets_22_tab_content_2">
                                    <div class="d-flex flex-wrap flex-md-nowrap justify-content-center">
                                        <div id="performance"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-transparent" data-bs-theme="light" style="background-color: #1C325E;">
                            <div class="card-body d-flex ps-xl-15">
                                <div class="m-0">
                                    <div class="position-relative fs-2x z-index-2 fw-bold text-white mb-7">
                                        <span class="me-2">Every step you take in guiding your <br>
                                            <span class="position-relative d-inline-block text-danger">
                                                <a class="text-danger opacity-75-hover">students helps</a>
                                                <span
                                                    class="position-absolute opacity-50 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                                            </span></span>shape their future.
                                    </div>
                                    <div class="mb-3">
                                        <a href='{{ route('teacher-violation') }}'
                                            class="btn btn-primary fw-semibold me-2">Add Violation</a>
                                    </div>
                                </div>
                                <img src="assets/media/illustrations/sigma-1/17-dark.png"
                                    class="position-absolute me-3 bottom-0 end-0 h-200px" alt="" />
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
        document.addEventListener("DOMContentLoaded", function() {
            function adjustMargin() {
                var card = document.getElementById("kt_chart_widgets_22_tab_content_2");
                if (window.innerWidth < 768) {
                    card.classList.add("mb-10");
                } else {
                    card.classList.remove("mb-10");
                }
            }
            adjustMargin();
            window.addEventListener("resize", function() {
                adjustMargin();
            });
        });


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
            let data = @json($performance);
            let chartData = data.map(function(item) {
                return {
                    x: new Date(item.date).toISOString().split('T')[0],
                    y: item.pelanggaran_count
                };
            });
            let uniqueDates = Array.from(new Set(chartData.map(item => item.x)));
            let options = {
                series: [{
                    name: 'Violations',
                    data: chartData
                }],
                chart: {
                    height: 350,
                    width: 700,
                    type: 'bar',
                    zoom: {
                        enabled: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                    },
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    type: 'category',
                    categories: uniqueDates,
                    labels: {
                        formatter: function(val) {
                            return val.split('-').reverse().join('/');
                        }
                    }
                },
                yaxis: {
                    min: 0,
                    max: 10,
                    forceNiceScale: true
                },
                tooltip: {
                    x: {
                        formatter: function(val) {
                            return val.split('-').reverse().join('/');
                        }
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
