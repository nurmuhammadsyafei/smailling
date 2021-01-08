
<div class="row">
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="box-title">New Grup<b></b></h3>
                    </div>
                    <div class="col-md-6" id="mydiv">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
            </div>
            <div class="box-body no-padding">
                <div class="col-md-11 col-sm-9">
                    <form action="<?= base_url('administrator/access/add_grup') ?>" method="POST">
                        <div class="modal-body">
                            <div class="row"><div class="col-md-12"><i>Nama Grup</i>
                                <input type="text"name="_nama"class="form-control">
                            </div></div>
                            <div class="row"><div class="col-md-12"><i>Deskripsi</i>
                                <textarea type="text"name="_desc"class="form-control"></textarea>
                            </div></div>
                            <button type="submit" class="btn btn-primary mt-3" style="float:right;margin-top:10px;margin-bottom:10px">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



