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
                        <div class="btn-group float-right">
                            <a href="javascript:void(0)" class="btn btn-xs btn-secondary btnStock">
                                <span><i class="fa fa-plus-circle"></i></span> Tambah Stok
                            </a>
                            <button class="btn btn-xs btn-primary btnAdd">
                                <span><i class="fa fa-plus-circle"></i></span> Tambah Produk
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>QTY</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
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
    @includeIf('admins.products.modal_add')
    @includeIf('admins.products.modal_stock')
    @includeIf('admins.products.modal_edit')
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
                    "url": "{{ route('product.json.list') }}",
                    "dataType": "json",
                    "type": "GET",
                    "data": {"_token": "{{ csrf_token() }}"}
                },
                columns: [
                    {data: "DT_RowIndex", name: 'DT_RowIndex', orderable: false, serachable: false},
                    {data: 'code', name: 'code'},
                    {data: 'name', name: 'name'},
                    {data: 'qty', name: 'qty'},
                    {data: 'price_purchase', name: 'price_purchase'},
                    {data: 'price_sale', name: 'price_sale'},
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
                    url: "{{ route('product.store') }}", /* endpoint */
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
                        } else {
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
                    url: '/product/' + dataId,
                    success: function (data) {
                        $('#formEdit input[name="id"]').val(data.id);
                        $('#formEdit input[name="code"]').val(data.code);
                        $('#formEdit input[name="name"]').val(data.name);
                        $('#formEdit input[name="qty"]').val(data.qty);
                        $("#formEdit #optionCatCode").val(data.cat_code).attr('selected', 'selected');
                        $('#formEdit input[name="price_purchase"]').val(data.price_purchase);
                        $('#formEdit input[name="price_sale"]').val(data.price_sale);
                        $('#formEdit input[name="sort_order"]').val(data.sort_order);
                        $('#formEdit #txtDescriptions').val(data.descriptions);
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
                    url: '/product/' + dataId, //endpoint
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
                        } else {
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
                            url: '/product/' + dataId, // endpoint
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

            //Select Options category
            $(document).on('show.bs.modal', function (e) {
                let selectOption = $('.select-category');
                selectOption.empty();
                $.ajax({
                    type: 'GET',
                    url: '/product-category/get-options', // endpoint
                    success: function (data) {
                        $(".select-category").append("<option value=''>--Opsi Kategori--</option>");
                        $.each(data.options, function (key, value) {
                            selectOption.append($('<option></option>').attr('value', key).text(value));
                        });
                    },
                    error: function (error) {
                        console.log('Terjadi kesalahan: ' + error);
                    }
                });
            });
            //Select category

            //------- STOCK---------------------------------->
            $('body').on('click', '.btnStock',function () {
                $('#myModalStock').modal('show');
            });
            $('#formStock').submit(function (e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let dataId = $('#formStock').find('input[name="code"]').val();

                $.ajax({
                    type: "PUT",
                    url: '/product/stock/' + dataId, //endpoint
                    data: formData,
                    success: function (response) {
                        $('#errorMessages').empty(); // Bersihkan pesan kesalahan sebelum menampilkan respons
                        console.log(response.message);
                        if (response.status == true) {
                            $('#myModalStock').modal('hide');
                            $('#formStock').trigger('reset');
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
            });
            //------- STOCK END------------------------------>
        });
    </script>
@endpush
