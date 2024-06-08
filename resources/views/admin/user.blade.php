@extends('admin.template.main')

@section('title', 'Users - EduGuard')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        User Data</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Home</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Users</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <button type="button" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalTambah">
                        Add User
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
                                    <table id="tabelPengguna" class="table hover stripe" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
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
                    <h5 class="modal-title" id="modalDetailLabel">Detail User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="detailName" class="form-label">Name:</label></label>
                            <input type="text" class="form-control" id="detailName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="detailPhoneNumber" class="form-label">Phone Number:</label></label>
                            <input type="number" class="form-control" id="detailPhoneNumber" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="detailEmail" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="detailEmail" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="detailRole" class="form-label">Role:</label></label>
                            <input type="text" class="form-control" id="detailRole" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="detailStatus" class="form-label">Status:</label></label>
                            <input type="text" class="form-control" id="detailStatus" readonly>
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
                    <h5 class="modal-title" id="modalEditLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEdit" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="updateName" name="name"
                                placeholder="Enter the user name">
                        </div>
                        <div class="mb-3">
                            <label for="noTelp" class="form-label">Phone Number:</label>
                            <input type="number" class="form-control" id="updatePhoneNumber" name="noTelp"
                                placeholder="Enter the user phone number">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="updateEmail" name="email"
                                placeholder="Enter the user email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="updatePassword" name="password"
                                placeholder="Enter the user password">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role:</label>
                            <select class="form-control" id="updateRole" name="role">
                                <option selected disabled>Select User Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Guru">Teacher</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <select class="form-control" id="updateStatus" name="status">
                                <option selected disabled>Select User Status</option>
                                <option value="Aktif">Active</option>
                                <option value="Tidak Aktif">Inactive</option>
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
                    <h5 class="modal-title" id="modalTambahLabel">Add User
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('datapengguna.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="addName" name="name"
                                placeholder="Enter the user name">
                        </div>
                        <div class="mb-3">
                            <label for="noTelp" class="form-label">Phone Number:</label>
                            <input type="number" class="form-control" id="addNoTelp" name="noTelp"
                                placeholder="Enter the user phone number">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="addEmail" name="email"
                                placeholder="Enter the user email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="addPassword" name="password"
                                placeholder="Enter the user password">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role:</label>
                            <select class="form-control" id="addRole" name="role">
                                <option selected disabled>Select User Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Guru">Teacher</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <select class="form-control" id="addStatus" name="status">
                                <option selected disabled>Select User Status</option>
                                <option value="Aktif">Active</option>
                                <option value="Tidak Aktif">Inactive</option>
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
            tabel = $('#tabelPengguna').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datapengguna') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'no_telepon',
                        name: 'no_telepon'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role',
                        name: 'role',
                        render: function(data, type, row) {
                            if (data === 'Admin') {
                                return `<span class="badge bg-primary">${data}</span>`;
                            } else if (data === 'Guru') {
                                return `<span class="badge bg-secondary">${data}</span>`;
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, row) {
                            if (data === 'Aktif') {
                                return `<span class="badge bg-success">${data}</span>`;
                            } else if (data === 'Tidak Aktif') {
                                return `<span class="badge bg-danger">${data}</span>`;
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: null,
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<button type="button" onclick="modalDetail('${row.email}','${row.role}','${row.status}','${row.nama_lengkap}','${row.no_telepon}')"class="btn btn-primary btn-sm btn-icon-text"><i 
                                                    class="link-icon" data-feather="eye" data-bs-toggle="modal"
                                                    data-bs-target="#modalDetail"></i> </button>
                                    <button type="button" onclick="modalEdit('${row.id}','${row.email}','${row.role}','${row.status}','${row.nama_lengkap}','${row.no_telepon}')" class="btn btn-success btn-sm btn-icon-text"><i
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
            $('#tabelPengguna').DataTable().columns.adjust().responsive.recalc();
        });

        function modalDetail(email, role, status, nama_lengkap, no_telepon) {
            $('#detailEmail').val(email);
            $('#detailRole').val(role);
            $('#detailStatus').val(status);
            $('#detailName').val(nama_lengkap);
            $('#detailPhoneNumber').val(no_telepon);
            $('#modalDetail').modal('show');
        }

        $(document).on('click', '.detail-btn', function() {
            var email = $(this).data('email');
            var role = $(this).data('role');
            var status = $(this).data('status');
            var nama_lengkap = $(this).data('nama_lengkap');
            var no_telepon = $(this).data('no_telepon');

            modalDetail(email, role, status, nama_lengkap, no_telepon);
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
                        'User has been added.',
                        'success'
                    );
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON.message);

                    Swal.fire(
                        'Error!',
                        'Error adding user: ' + xhr.responseJSON.message,
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
                    fetch(`user/${id}`, {
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
                        url: "{{ route('datapengguna.update') }}",
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

        function modalEdit(id, email, role, status, nama_lengkap, no_telepon) {
            $('#id').val(id);
            $('#updateEmail').val(email);
            $('#updateRole').val(role);
            $('#updateStatus').val(status);
            $('#updateName').val(nama_lengkap);
            $('#updatePhoneNumber').val(no_telepon);
            $('#modalEdit').modal('show');
        }
    </script>
@endpush

@push('style')
    <style>
        #tabelPengguna td,
        #tabelPengguna th {
            text-align: center;
            font-size: 15px;
            white-space: nowrap;
        }

        #tabelPengguna th {
            font-weight: bold;
        }

        #tabelPengguna thead th:first-child {
            cursor: default;
        }

        #tabelPengguna thead th:first-child::after,
        #tabelPengguna thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #tabelPengguna td {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>
@endpush
