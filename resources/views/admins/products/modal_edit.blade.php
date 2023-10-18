<!-- /.modal -->
<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-info" id="modalEditTitle">Edit DATA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="formEdit" id="formEdit">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Code</label>
                                <input type="text" name="code" class="form-control form-control-sm" id="code"
                                       placeholder="code">
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label>Kategori3</label>
                                <select name="cat_code" class="form-control form-control-sm select-category"
                                        id="optionCatCode">
                                    <!-- select option-->
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control form-control-sm" id="txtName"
                                       placeholder="name">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Qty</label>
                                <div class="form-row col-md-6">
                                    <input type="number" name="qty" class="form-control form-control-sm" id="txtQty">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga Beli</label>
                                <div class="form-row col-md-10">
                                    <input type="text" name="price_purchase" class="form-control form-control-sm"
                                           id="txtPricePurchase">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <div class="form-row col-md-10">
                                    <input type="text" name="price_sale" class="form-control form-control-sm"
                                           id="txtPriceSale">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Descriptions</label>
                                <textarea type="text" name="descriptions" class="form-control form-control-sm"
                                          id="txtDescriptions"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Sort Order</label>
                                <div class="form-row col-md-6">
                                    <input type="number" name="sort_order" class="form-control form-control-sm"
                                           id="txtSortOrder"
                                           placeholder="Order">
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
                    </div>
                    <div class="row">
                        <div id="errorMessages"></div>
                    </div>
                </div>
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
