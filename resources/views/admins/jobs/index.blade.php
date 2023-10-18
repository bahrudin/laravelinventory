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
                                <th>Job Title</th>
                                <th>Keterangan</th>
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
    @includeIf('admins.jobs.modal_add')
    @includeIf('admins.jobs.modal_edit')
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
                    "url": "{{ route('job.json.list') }}",
                    "dataType": "json",
                    "type": "GET",
                    "data": {"_token": "{{ csrf_token() }}"}
                },
                columns: [
                    {data: "DT_RowIndex", name: 'DT_RowIndex',"width": "5%", orderable: false, serachable: false},
                    {data: 'title', name: 'title', "width": "20%"},
                    {data: 'descriptions', name: 'descriptions', "width": "50%"},
                    {data: "Actions", "width": "15%", orderable: false, serachable: false, sClass: 'text-center'},
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
                    url: "{{ route('job.store') }}", /* endpoint */
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
                    url: '/job/' + dataId,
                    success: function (data) {
                        $('#formEdit input[name="id"]').val(data.id);
                        $('#formEdit input[name="title"]').val(data.title);
                        $('#formEdit #descriptions').val(data.descriptions);
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
                    url: '/job/' + dataId, //endpoint
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
                            url: '/job/' + dataId, // endpoint
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
        });

    </script>
@endpush
