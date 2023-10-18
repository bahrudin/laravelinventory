<!-- /.modal -->
<div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-info" id="modalAddTitle">TAMBAH DATA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="formAdd" id="formAdd">
                @csrf
                @method('POST')
                <!-- /.modal-body -->
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label>Job Title</label>
                        <div class="form-row col-sm-8">
                            <input type="text" name="title" class="form-control form-control-sm" id="title"
                                   placeholder="Job Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea type="text" name="descriptions" class="form-control form-control-sm"
                                  id="descriptions" rows="3"></textarea>
                    </div>
                </div>
                <!-- /.modal-body end-->
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-secondary btn-sm btnCancel" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm btnSave">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal end-->
