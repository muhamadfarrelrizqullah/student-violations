@extends('admin.template.main')

@section('title', 'Categories - EduGuard')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Category Data</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Home</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Categories</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <button type="button" class="btn btn-sm fw-bold btn-secondary" id="bt-download">
                        Download
                    </button>
                    <button type="button" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalTambah">
                        Add Category
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
                                    <table id="tabelKategori" class="table hover stripe" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Description</th>
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
                    <h5 class="modal-title" id="modalDetailLabel">Detail Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="detailName" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="detailName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="detailDescription" class="form-label">Description:</label></label>
                            <input type="textarea" class="form-control" id="detailDescription" readonly>
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
                    <h5 class="modal-title" id="modalEditLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEdit" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="updateName" name="name"
                                placeholder="Enter the category name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <input type="textarea" class="form-control" id="updateDescription" name="description"
                                placeholder="Enter the category description">
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
                    <h5 class="modal-title" id="modalTambahLabel">Add Category
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('datakategori.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="addName" name="name"
                                placeholder="Enter the category name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <input type="textarea" class="form-control" id="addDescription" name="description"
                                placeholder="Enter the category description">
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
            window.location.href = '/export-excel/category';
        });

        $(document).ready(function() {
            tabel = $('#tabelKategori').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datakategori') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'description',
                        name: 'description',
                    },
                    {
                        data: null,
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<button type="button" onclick="modalDetail('${row.name}','${row.description}')"class="btn btn-primary btn-sm btn-icon-text"><i 
                                                    class="link-icon" data-feather="eye" data-bs-toggle="modal"
                                                    data-bs-target="#modalDetail"></i> </button>
                                    <button type="button" onclick="modalEdit('${row.id}','${row.name}','${row.description}')" class="btn btn-success btn-sm btn-icon-text"><i
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
            $('#tabelKategori').DataTable().columns.adjust().responsive.recalc();
        });

        function modalDetail(name, description) {
            $('#detailName').val(name);
            $('#detailDescription').val(description);
            $('#modalDetail').modal('show');
        }

        $(document).on('click', '.detail-btn', function() {
            var name = $(this).data('name');
            var description = $(this).data('description');

            modalDetail(name, description);
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
                        'Category has been added.',
                        'success'
                    );
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON.message);

                    Swal.fire(
                        'Error!',
                        'Error adding category: ' + xhr.responseJSON.message,
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
                    fetch(`category/${id}`, {
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
                        url: "{{ route('datakategori.update') }}",
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

        function modalEdit(id, name, description) {
            $('#id').val(id);
            $('#updateName').val(name);
            $('#updateDescription').val(description);
            $('#modalEdit').modal('show');
        }
    </script>
@endpush

@push('style')
    <style>
        #tabelKategori td,
        #tabelKategori th {
            text-align: center;
            font-size: 15px;
            white-space: nowrap;
        }

        #tabelKategori th {
            font-weight: bold;
        }

        #tabelKategori thead th:first-child {
            cursor: default;
        }

        #tabelKategori thead th:first-child::after,
        #tabelKategori thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #tabelKategori td {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>
@endpush
