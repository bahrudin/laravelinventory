<!-- /.modal -->
<div class="modal fade" id="myModalStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-info" id="modalAddTitle">TAMBAH STOCK</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="formStock" id="formStock">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="code" class="form-control form-control-sm" id="code"
                               placeholder="code">
                        <div class="valid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label>Qty</label>
                        <input type="number" name="qty" class="form-control form-control-sm" id="qty">

                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-secondary btn-sm btnCancel" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm btnSimpanStock">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal end-->
