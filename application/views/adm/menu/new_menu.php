<div class="box box-danger">
            <div class="box-header with-border">
                
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="box-title">New Menu</h3>
                    </div>
                    <div class="col-md-5" >
                        <div class=""id="mydiv">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
                <!-- <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div> -->
            </div>
            <div class="box-body no-padding">
                <div class="row">
                    <div class="col-md-12 col-sm-9">
                        <form action="<?= base_url('administrator/menu/add')?>"method="POST">
                            <div class="modal-body">
                                <div class="row"><div class="col-md-12"><i>Nama Menu</i>
                                    <input type="text" name="_nama" class="form-control">
                                </div></div>
                                <div class="row"><div class="col-md-12"><i>Link</i>
                                    <input type="text" name="_link" class="form-control">
                                </div></div>
                                <div class="row"><div class="col-md-12"><i>Icon</i>
                                    <input type="text" name="_icon" class="form-control">
                                </div></div>
                            <button type="submit" class="btn btn-primary"style="float:right;margin-top:10px;margin-bottom:10px">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>