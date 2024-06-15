@extends('teacher.template.main')

@section('title', 'Violations - EduGuard')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Violation Data</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Home</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Violations</li>
                    </ul>
                </div>
                <div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center gap-2 gap-lg-3">
                    <input type="date" id="bt-date" name="date"
                        class="form-control form-control-sm mb-2 mb-lg-0 w-100">
                    <div class="d-flex justify-content-between w-100 gap-2">
                        <button type="button" class="btn btn-sm fw-bold btn-secondary w-100 w-lg-auto" id="bt-download">
                            Download
                        </button>
                        <button type="button" class="btn btn-sm fw-bold btn-primary text-nowrap w-100 w-lg-auto"
                            data-bs-toggle="modal" data-bs-target="#modalTambah">
                            Add Violation
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabelPelanggaran" class="table hover stripe" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Student Name</th>
                                                <th>Class</th>
                                                <th>Category</th>
                                                <th>Sanction</th>
                                                <th>Teacher Name</th>
                                                <th>Date</th>
                                                <th>Action</th>
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

@section('modals')
    <div id="modalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailLabel">Detail Violation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="detailStudentName" class="form-label">Student Name:</label>
                            <input type="text" class="form-control" id="detailStudentName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="detailNis" class="form-label">NIS:</label></label>
                            <input type="number" class="form-control" id="detailNis" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="detailClassName" class="form-label">Class:</label></label>
                            <input type="text" class="form-control" id="detailClassName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="detailCategoryName" class="form-label">Category:</label></label>
                            <input type="text" class="form-control" id="detailCategoryName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="detailDate" class="form-label">Date:</label></label>
                            <input type="text" class="form-control" id="detailDate" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="detailDescription" class="form-label">Description:</label></label>
                            <input type="textarea" class="form-control" id="detailDescription" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="detailSanctionName" class="form-label">Sanction:</label></label>
                            <input type="text" class="form-control" id="detailSanctionName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="detailTeacherName" class="form-label">Teacher Name:</label></label>
                            <input type="text" class="form-control" id="detailTeacherName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="detailPhoneNumber" class="form-label">Teacher Phone Number:</label></label>
                            <input type="number" class="form-control" id="detailPhoneNumber" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="detailTeacherEmail" class="form-label">Teacher Email:</label></label>
                            <input type="email" class="form-control" id="detailTeacherEmail" readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit Violation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEdit" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="updateStudentId" class="form-label">Student Name:</label>
                            <select class="form-control" id="updateStudentId" name="student_id">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }} - {{ $student->nis }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="updateCategoryId" class="form-label">Category:</label>
                            <select class="form-control" id="updateCategoryId" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="updateSanctionId" class="form-label">Sanction:</label>
                            <select class="form-control" id="updateSanctionId" name="sanction_id">
                                @foreach ($sanctions as $sanction)
                                    <option value="{{ $sanction->id }}">{{ $sanction->name }} - {{ $sanction->points }}
                                        Points</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" id="updateUserId" name="user_id" value="{{ old('user_id') }}">
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date:</label>
                            <input type="date" class="form-control" id="updateDate" name="date">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <input type="textarea" class="form-control" id="updateDescription" name="description"
                                placeholder="Enter the violation description">
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id" name="id">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalTambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Add Violation
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('datapelanggaran.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="student_id" class="form-label">Student:</label>
                            <select class="form-control" id="addStudent" name="student_id">
                                <option selected disabled>Select Violation Student</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }} - {{ $student->nis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category:</label>
                            <select class="form-control" id="addCategory" name="category_id">
                                <option selected disabled>Select Violation Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sanction_id" class="form-label">Sanction:</label>
                            <select class="form-control" id="addSanction" name="sanction_id">
                                <option selected disabled>Select Violation Sanction</option>
                                @foreach ($sanctions as $sanction)
                                    <option value="{{ $sanction->id }}">{{ $sanction->name }} - {{ $sanction->points }}
                                        Points</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date:</label>
                            <input type="date" class="form-control" id="addDate" name="date"
                                placeholder="Enter the violation date">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <input type="textarea" class="form-control" id="addDescription" name="description"
                                placeholder="Enter the violation description">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="btnSave" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.getElementById('bt-download').addEventListener('click', function() {
            var selectedDate = document.getElementById('bt-date').value;

            if (!selectedDate) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Please select a date before downloading the report!',
                });
                return;
            }

            var hasRecords = false;
            tabel.rows().every(function() {
                var rowData = this.data();
                if (rowData.date === selectedDate) {
                    hasRecords = true;
                    return false;
                }
            });

            if (!hasRecords) {
                Swal.fire({
                    icon: 'error',
                    title: 'No Records Found',
                    text: 'No violations found for the selected date in the table.',
                });
                return;
            }

            var selectedDate = document.getElementById('bt-date').value;
            window.location.href = '/export-excel/violation?date=' + encodeURIComponent(selectedDate);
        });

        $(document).ready(function() {
            tabel = $('#tabelPelanggaran').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datapelanggaran') }}",
                order: [
                    [6, 'desc']
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
                        data: 'class_name',
                        name: 'class_name'
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
                        data: 'teacher_name',
                        name: 'teacher_name'
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
                        data: null,
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<button type="button" onclick="modalDetail('${row.student_name}','${row.nis}','${row.class_name}','${row.category_name}','${row.date}','${row.description}','${row.sanction_name}','${row.teacher_name}','${row.phone_number}','${row.teacher_email}')"
                                                    class="btn btn-primary btn-sm btn-icon-text"><i 
                                                    class="link-icon" data-feather="eye" data-bs-toggle="modal"
                                                    data-bs-target="#modalDetail"></i> </button>
                                    <button type="button" onclick="modalEdit('${row.id}','${row.student_id}','${row.category_id}','${row.date}','${row.description}','${row.sanction_id}','${row.user_id}')" class="btn btn-success btn-sm btn-icon-text"><i
                                                    class="link-icon" data-feather="edit" data-bs-toggle="modal"
                                                    data-bs-target="#modalEdit" onclick="#"></i> </button>
                                    <button type="button" onclick="deleteData(${row.id})" class="btn btn-danger btn-sm btn-icon-text"><i
                                                    class="link-icon" data-feather="trash"></i></button>`;
                        }
                    }
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
            $('#tabelPelanggaran').DataTable().columns.adjust().responsive.recalc();
        });

        function modalDetail(student_name, nis, class_name, category_name, date, description, sanction_name, teacher_name,
            phone_number, teacher_email) {
            $('#detailStudentName').val(student_name);
            $('#detailNis').val(nis);
            $('#detailClassName').val(class_name);
            $('#detailCategoryName').val(category_name);
            $('#detailDate').val(date);
            $('#detailDescription').val(description);
            $('#detailSanctionName').val(sanction_name);
            $('#detailTeacherName').val(teacher_name);
            $('#detailPhoneNumber').val(phone_number);
            $('#detailTeacherEmail').val(teacher_email);
            $('#modalDetail').modal('show');
        }

        $(document).on('click', '.detail-btn', function() {
            var student_name = $(this).data('student_name');
            var nis = $(this).data('nis');
            var class_name = $(this).data('class_name');
            var category_name = $(this).data('category_name');
            var date = $(this).data('date');
            var description = $(this).data('description');
            var sanction_name = $(this).data('sanction_name');
            var teacher_name = $(this).data('teacher_name');
            var phone_number = $(this).data('phone_number');
            var teacher_email = $(this).data('teacher_email');

            modalDetail(student_name, nis, class_name, category_name, date, description, sanction_name,
                teacher_name, phone_number, teacher_email);
        });

        $('#modalTambah, #modalEdit, #modalDetail').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
        });

        $('#modalTambah form').on('submit', function(e) {
            e.preventDefault();
            let data = $(this).serialize();
            let form = $(this);

            $.ajax({
                url: form.attr('action'),
                type: "POST",
                data: data,
                success: function(response) {
                    console.log(response);
                    $('#modalTambah').modal('hide');
                    tabel.ajax.reload();

                    Swal.fire(
                        'Success!',
                        'Student has been added.',
                        'success'
                    );
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON.message);

                    Swal.fire(
                        'Error!',
                        'Error adding student: ' + xhr.responseJSON.message,
                        'error'
                    );
                }
            });
        });

        function deleteData(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`violation/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Deleted:', data);
                            tabel.ajax.reload();

                            Swal.fire(
                                'Deleted!',
                                'Your data has been deleted.',
                                'success'
                            );
                        })
                        .catch(error => {
                            console.error('Error deleting data:', error);
                            Swal.fire(
                                'Error!',
                                'Error deleting data: ' + error.message,
                                'error'
                            );
                        });
                }
            });
        }

        $('#formEdit').on('submit', function(e) {
            e.preventDefault();
            let data = $(this).serialize();

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to save the changes?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('datapelanggaran.update') }}",
                        type: "POST",
                        data: data,
                        success: function(response) {
                            console.log(response);
                            $('#modalEdit').modal('hide');
                            tabel.ajax.reload();

                            Swal.fire(
                                'Saved!',
                                'Your data has been updated.',
                                'success'
                            );
                        },
                        error: function(xhr) {
                            console.log(xhr.responseJSON.message);

                            Swal.fire(
                                'Error!',
                                'Error updating data: ' + xhr.responseJSON.message,
                                'error'
                            );
                        }
                    });
                }
            });
        });

        function modalEdit(id, student_id, category_id, date, description, sanction_id, user_id) {
            $('#id').val(id);
            $('#updateStudentId').val(student_id);
            $('#updateCategoryId').val(category_id);
            $('#updateDate').val(date);
            $('#updateDescription').val(description);
            $('#updateSanctionId').val(sanction_id);
            $('#updateUserId').val(user_id);
            $('#modalEdit').modal('show');
        }
    </script>
@endpush

@push('style')
    <style>
        #tabelPelanggaran td,
        #tabelPelanggaran th {
            text-align: center;
            white-space: nowrap;
        }

        #tabelPelanggaran th {
            font-weight: bold;
        }

        #tabelPelanggaran thead th:first-child {
            cursor: default;
        }

        #tabelPelanggaran thead th:first-child::after,
        #tabelPelanggaran thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #tabelPelanggaran td {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>
@endpush
