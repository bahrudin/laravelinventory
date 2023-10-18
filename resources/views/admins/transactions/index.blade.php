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
                        <h3 class="card-title">Order List</h3>
                    </div>
                    <!-- /.card-header -->
                    <form class="form-horizontal" id="formAdd">
                        @csrf
                        @method('POST')

                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Customer</label>
                                <div class="col-sm-3">
                                    <input type="text" name="customer_card" class="form-control form-control-sm"
                                           id="customer_card" placeholder="Member ID" readonly>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="name" class="form-control form-control-sm"
                                           id="name" placeholder="Nama" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <a href="javascript:void(0)" class="btn badge-info btn-xs btnMember"><span><i class="fa fa-search"></i></span> Cari</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="pull-right">
                                    <a href="javascript:void(0)" class="btn btn-xs btn-primary btnAdd">
                                        <span><i class="fa fa-plus-circle"></i></span> Tambah Item
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <table id="cartTable" class="table table-striped table-hover" style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $total = 0; $no = 1 @endphp
                                    @if(session('carts'))
                                        @foreach(session('carts') as $id => $item)
                                            @php $total += $item['price'] * $item['quantity']; @endphp
                                            <tr rowId="{{ $id }}">
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item['product_code'] }}</td>
                                                <td>{{ $item['name'] }}</td>
                                                <td>{{ $item['price'] }}</td>
                                                <td>{{ $item['quantity'] }}</td>
                                                <td class="actions">
                                                    <a class="btn btn-danger btn-sm delete-product btn-xs">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TOTAL</label>
                                <div class="col-sm-3 text-info">
                                    <label class="h3 total"><strong>{{ $total }}</strong></label>
                                    <input type="hidden" name="total" id="total" class="total" value="{{ $total }}">
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="btn-group float-right">
                                <a href="{{ route('order.index') }}" class="btn btn-sm btn-secondary btnCancel"><span><i
                                            class="fa fa-step-backward"></i></span> Batal
                                </a>
                                <a href="javascript:void(0)" class="btn btn-sm btn-primary btnSave">
                                    <span><i class="fa fa-save"></i></span> Simpan Order
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('modals')
    @includeIf('admins.transactions.modal_products')
    @includeIf('admins.transactions.modal_members')
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
            //Prodak
            let eTable = $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                "bFilter": true,
                "bInfo": true,
                "order": [[0, 'desc']],
                "ajax": {
                    "url": "{{ route('product.get-options') }}",
                    "dataType": "json",
                    "type": "GET",
                    "data": {"_token": "{{ csrf_token() }}"}
                },
                columns: [
                    {data: "DT_RowIndex", name: 'DT_RowIndex', orderable: false, serachable: false},
                    {data: 'code', name: 'code'},
                    {data: 'name', name: 'name'},
                    {data: 'category', name: 'category'},
                    {data: 'qty', name: 'qty'},
                    {data: 'price_purchase', name: 'price_purchase'},
                    {data: 'price_sale', name: 'price_sale'},
                    {data: "Options", orderable: false, serachable: false, sClass: 'text-center'},
                ]
            });

            //Member
            let mTable = $('#myTableMembers').DataTable({
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                "bFilter": true,
                "bInfo": true,
                "order": [[0, 'desc']],
                "ajax": {
                    "url": "{{ route('customer.get-options') }}",
                    "dataType": "json",
                    "type": "GET",
                    "data": {"_token": "{{ csrf_token() }}"}
                },
                columns: [
                    {data: "DT_RowIndex", name: 'DT_RowIndex', orderable: false, serachable: false},
                    {data: 'customer_card', name: 'customer_card'},
                    {data: 'name', name: 'name'},
                    {data: 'phone', name: 'phone'},
                    {data: 'status', name: 'status'},
                    {data: "Options", orderable: false, serachable: false, sClass: 'text-center'},
                ]
            });

            //ButtonAdd
            $(document).on('click', '.btnAdd', function () {
                $('#myModalProducts').modal('show');
            });

            //ButtonMember
            $(document).on('click', '.btnMember', function () {
                $('#myModalMembers').modal('show');
            });

            //Responsive table
            $('#myModalProducts').on('shown.bs.modal', function () {
                eTable.columns.adjust();
            });

            //pilihan item
            $('#myModalProducts #myTable tbody').on('click', 'tr', function () {
                let data = eTable.row(this).data();
                let dataId = data['code'];
                $.ajax({
                    type: 'GET',
                    url: '/transaction/' + dataId,
                    success: function (data) {
                        console.log(data.status)
                        console.log(data.message)
                        $('#myModalProducts').modal('hide');
                        // window.location.reload();
                        $( "#cartTable" ).load(window.location.href + " #cartTable");
                        $( ".total" ).load(window.location.href + " .total");
                    },
                    error: function () {
                    }
                });
            });

            //pilihan item
            $('#myModalMembers #myTableMembers tbody').on('click', 'tr', function () {
                let dataMember = mTable.row(this).data();
                $('#customer_card').val(dataMember['customer_card']);
                $('#name').val(dataMember['name']);
                $('#myModalMembers').modal('hide');
            });

            //delete
            $("#cartTable").on('click','.delete-product', function (e) {
                e.preventDefault();
                let elementItem = $(this);
                Swal.fire({
                    title: 'Anda Yakin! Hapus Item?',
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) { <!--confirm-->
                        $.ajax({
                            url: '{{ route('transaction.delete') }}',
                            method: "DELETE",
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: elementItem.parents("tr").attr("rowId")
                            },
                            success: function (response) {
                                // window.location.reload();
                                $("#cartTable").load(window.location.href + " #cartTable");
                                $( ".total" ).load(window.location.href + " .total");
                            }
                        });
                    }<!--confirm end-->
                });
            });

        });

        $('body').on('click', '.btnSave', function (e) {
            Swal.fire('Programmer Istirahat');
        });

        let sessionOrder = "{{ $cekTransaction }}";
        // $('#sessionData').text(sessionData);
        if (sessionOrder != 0) {
            Swal.fire({
                icon: 'info',
                title: 'Reload | Order',
                text: sessionOrder,
            })
        }
    </script>
@endpush
