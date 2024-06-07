@extends('admin.template.main')

@section('title', 'Students - EduGuard')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Student Data</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Home</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Students</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <button type="button" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalTambah">
                        Add Student
                    </button>
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
                                    <table id="tabelSiswa" class="table hover stripe" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>NIS</th>
                                                <th>Class</th>
                                                <th>Major</th>
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
                    <h5 class="modal-title" id="modalDetailLabel">Detail Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="detailName" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="detailName" readonly>
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
                            <label for="detailMajor" class="form-label">Major:</label></label>
                            <input type="text" class="form-control" id="detailMajor" readonly>
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
                    <h5 class="modal-title" id="modalEditLabel">Edit Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEdit" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="updateName" name="name"
                                placeholder="Enter the student name">
                        </div>
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS:</label>
                            <input type="number" class="form-control" id="updateNis" name="nis"
                                placeholder="Enter the student nis">
                        </div>
                        <div class="mb-3">
                            <label for="updateClass" class="form-label">Class:</label>
                            <select class="form-control" id="updateIdClass" name="class_id">
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }} - {{ $class->major }}</option>
                                @endforeach
                            </select>
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
                    <h5 class="modal-title" id="modalTambahLabel">Add Student
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('datasiswa.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="addName" name="name"
                                placeholder="Enter the student name">
                        </div>
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS:</label>
                            <input type="number" class="form-control" id="addNis" name="nis"
                                placeholder="Enter the student nis">
                        </div>
                        <div class="mb-3">
                            <label for="class_id" class="form-label">Class:</label>
                            <select class="form-control" id="addClass" name="class_id">
                                <option selected disabled>Select Student Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }} - {{ $class->major }}</option>
                                @endforeach
                            </select>
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
        $(document).ready(function() {
            tabel = $('#tabelSiswa').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datasiswa') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'nis',
                        name: 'nis'
                    },
                    {
                        data: 'class_name',
                        name: 'class_name'
                    },
                    {
                        data: 'major',
                        name: 'major'
                    },
                    {
                        data: null,
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<button type="button" onclick="modalDetail('${row.name}','${row.nis}','${row.class_name}','${row.major}')"class="btn btn-primary btn-sm btn-icon-text"><i 
                                                    class="link-icon" data-feather="eye" data-bs-toggle="modal"
                                                    data-bs-target="#modalDetail"></i> </button>
                                    <button type="button" onclick="modalEdit('${row.id}','${row.name}','${row.nis}','${row.class_id}')" class="btn btn-success btn-sm btn-icon-text"><i
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
            $('#tabelSiswa').DataTable().columns.adjust().responsive.recalc();
        });

        function modalDetail(name, nis, class_name, major) {
            $('#detailName').val(name);
            $('#detailNis').val(nis);
            $('#detailClassName').val(class_name);
            $('#detailMajor').val(major);
            $('#modalDetail').modal('show');
        }

        $(document).on('click', '.detail-btn', function() {
            var name = $(this).data('name');
            var nis = $(this).data('nis');
            var class_name = $(this).data('class_name');
            var major = $(this).data('major');

            modalDetail(name, nis, class_name, major);
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
                    fetch(`student/${id}`, {
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
                        url: "{{ route('datasiswa.update') }}",
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

        function modalEdit(id, name, nis, id_class) {
            $('#id').val(id);
            $('#updateName').val(name);
            $('#updateNis').val(nis);
            $('#updateIdClass').val(id_class);
            $('#modalEdit').modal('show');
        }
    </script>
@endpush

@push('style')
    <style>
        #tabelSiswa td,
        #tabelSiswa th {
            text-align: center;
            font-size: 15px;
        }

        #tabelSiswa th {
            font-weight: bold;
        }

        #tabelSiswa thead th:first-child {
            cursor: default;
        }

        #tabelSiswa thead th:first-child::after,
        #tabelSiswa thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #tabelSiswa td {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>
@endpush
