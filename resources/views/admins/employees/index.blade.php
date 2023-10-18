@extends('admins.layouts.app')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('contents')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Table List</h3>
                        <button class="btn btn-xs btn-primary float-right btnAdd">
                            <span><i class="fa fa-plus-circle"></i></span> Tambah
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Job</th>
                                <th>Telp</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>
    </div>
@endsection

@section('modals')
    @includeIf('admins.employees.modal_add')
    @includeIf('admins.employees.modal_edit')
@endsection

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let eTable = $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                "bFilter": true,
                "bInfo": true,
                "order": [[0, 'desc']],
                "ajax": {
                    "url": "{{ route('employee.json.list') }}",
                    "dataType": "json",
                    "type": "GET",
                    "data": {"_token": "{{ csrf_token() }}"}
                },
                columns: [
                    {data: "DT_RowIndex", name: 'DT_RowIndex', orderable: false, serachable: false},
                    {data: 'emp_card', name: 'emp_card'},
                    {data: 'full_name', name: 'full_name'},
                    {data: 'title', name: 'title', defaultContent: '-'},
                    {data: 'phone', name: 'phone'},
                    {data: "Actions", orderable: false, serachable: false, sClass: 'text-center'},
                ]
            });

            //ButtonAdd
            $(document).on('click', '.btnAdd', function () {
                $('#myModalAdd').modal('show');
                $('#formAdd').trigger('reset');
            });

            /* Saved New */
            $('#formAdd').submit(function (e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ route('employee.store') }}", /* endpoint */
                    data: formData,
                    success: function (response) {
                        $('#errorMessages').empty(); // Bersihkan pesan kesalahan sebelum menampilkan respons
                        console.log(response.message);
                        if (response.status == true) {
                            $('#myModalAdd').modal('hide');
                            $('#formAdd').trigger('reset');
                            eTable.draw();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Good Job',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },

                    error: function (xhr, status, error) {
                        if (xhr.status === 403) {
                            console.log(xhr.status);
                        }
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessages = '';
                            $.each(errors, function (key, value) {
                                errorMessages += value[0] + '<br>';
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Validasi Gagal',
                                html: errorMessages,
                            });
                        }else {
                            alert('Hubungi Administrator')
                            console.log("Status: " + xhr.status);
                            console.log("Pesan: " + error);
                        }
                    }
                });
            });

            //ButtonEdit
            $(document).on('click', '.btnEdit', function () {
                let dataId = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: '/employee/' + dataId,
                    success: function (data) {
                        $('#formEdit input[name="id"]').val(data.id);
                        $('#formEdit input[name="emp_card"]').val(data.emp_card);
                        $('#formEdit input[name="first_name"]').val(data.first_name);
                        $('#formEdit input[name="middle_name"]').val(data.middle_name);
                        $('#formEdit input[name="last_name"]').val(data.last_name);
                        $('#formEdit input[name="email"]').val(data.email);
                        $('#formEdit input[name="phone"]').val(data.phone);
                        $('#formEdit input[name="phone_urgent"]').val(data.phone_urgent);
                        $("#formEdit #job_id").val(data.job_id).attr('selected','selected');
                        $('#formEdit #txtAddress').val(data.address);
                        if (data.is_status === 1) {
                            $('#formEdit input[value="1"]').prop('checked', true);
                        } else {
                            $('#formEdit input[value="0"]').prop('checked', true);
                        }
                    },
                    error: function () {
                    }
                });
            });

            /* Saved Update */
            $('#formEdit').submit(function (e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let dataId = $('#formEdit').find('input[name="id"]').val();
                $.ajax({
                    type: 'PUT',
                    url: '/employee/' + dataId, //endpoint
                    data: formData,
                    success: function (response) {
                        if (response.status == true) {
                            $('#myModalEdit').modal('hide');
                            $('#formEdit').trigger('reset');
                            eTable.draw();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Good Job',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessages = '';
                            $.each(errors, function (key, value) {
                                errorMessages += value[0] + '<br>';
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Validasi Gagal',
                                html: errorMessages,
                            });
                        }else {
                            alert('Hubungi Administrator')
                            console.log("Status: " + xhr.status);
                            console.log("Pesan: " + error);
                        }
                    }
                });
            });

            //Button Delete
            $(document).on('click', '.btnDelete', function () {
                Swal.fire({
                    title: 'Anda Yakin! Hapus Data?',
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    /*isConfirmed */
                    if (result.isConfirmed) {
                        let dataId = $(this).data('id');
                        $.ajax({
                            type: 'DELETE',
                            url: '/employee/' + dataId, // endpoint
                            success: function (response) {
                                if (response.status == true) {
                                    eTable.draw();
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Good Job',
                                        text: response.message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                alert('Hubungi Administrator')
                                console.log("Status: " + xhr.status);
                                console.log("Pesan: " + error);
                            }
                        });
                    }
                });
            });

            //Select Options
            $(document).on('show.bs.modal', function (e) {
                let selectOption = $('.select-job');
                selectOption.empty();
                $.ajax({
                    type: 'GET',
                    url: '/job/get-options', // endpoint
                    success: function (data) {
                        $(".select-job").append("<option value=''>--Opsi Job--</option>");
                        $.each(data.options, function (key, value) {
                            selectOption.append($('<option></option>').attr('value', key).text(value));
                        });
                    },
                    error: function (error) {
                        console.log('Terjadi kesalahan: ' + error);
                    }
                });
            });
        });

    </script>
@endpush
