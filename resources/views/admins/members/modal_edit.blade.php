<!-- /.modal -->
<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-info" id="modalEditTitle">EDIT DATA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="formEdit" id="formEdit">
                @csrf
                @method('PUT')
                <!-- /.modal-body -->
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Card Code | NIP ID</label>
                                <div class="form-row col-sm-8">
                                    <input type="text" name="emp_card" class="form-control form-control-sm" id="emp_card"
                                           placeholder="Emp Card">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <div class="form-row col-sm-10">
                                    <select name="job_id" class="form-control form-control-sm select-job"
                                            id="job_id">
                                        <!-- select option-->
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="form-check">
                                    <input type="radio" name="is_status" value="1" id="txtStatus"> Active
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="is_status" value="0" id="txtStatus"> Inactive
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <div class="row">
                                    <div class="form-row col-md-4">
                                        <label>Nama Depan</label>
                                        <input type="text" name="first_name" class="form-control form-control-sm" id="first_name"
                                               placeholder="First name">
                                    </div>
                                    <div class="form-row col-md-4">
                                        <label>Nama Tengah</label>
                                        <input type="text" name="middle_name" class="form-control form-control-sm" id="middle_name"
                                               placeholder="Middle name">
                                    </div>
                                    <div class="form-row col-md-4">
                                        <label>Nama Akhir</label>
                                        <input type="text" name="last_name" class="form-control form-control-sm" id="last_name"
                                               placeholder="Last name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea type="text" name="address" class="form-control form-control-sm"
                                          id="txtAddress"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="form-row col-md-6">
                                        <label>Telp</label>
                                        <input type="text" name="phone" class="form-control form-control-sm"
                                               id="phone">
                                    </div>
                                    <div class="form-row col-md-6">
                                        <label>Telp Urgent</label>
                                        <input type="text" name="phone_urgent" class="form-control form-control-sm"
                                               id="phone_urgent">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-body end -->
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
