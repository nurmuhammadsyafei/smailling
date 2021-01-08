<!-- STAR MODAL NEW -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="<?= base_url('administrator/grup/add') ?>" method="POST">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Grup</h4>
            </div>
            <div class="modal-body">
                <div class="row"><div class="col-md-12"><i>Nama Grup</i>
                    <input type="text"name="_nama"class="form-control">
                </div></div>
                <div class="row"><div class="col-md-12"><i>Deskripsi</i>
                    <input type="text"name="_desc"class="form-control">
                </div></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- END MODAL NEW -->

<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="box-title">Data Login</h3>
                    </div>
                    <div class="col-md-6" id="mydiv">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body no-padding">
                <div class="row">
                <div class="col-md-5  col-sm-9">

                </div>
                <div class="col-md-2  col-sm-9">
                </div>
                <div class="col-md-12 col-sm-9">
                        <table id="" class=" table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Id Grup</th>
                                <th>Tanggal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($log as $a ){?>
                                <tr>
                                    <td><?= $a['id'] ?></td>
                                    <td><?= $a['nama']?></td>
                                    <td><?= $a['tanggal']?></td>
                                </tr>
                                
                            <?php } ?> 
                            </tbody>
                            
                        </table>
                         
                <div class="col-md-3 col-sm-4">
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
setTimeout(function() {
    $('#mydiv').fadeOut(5000);
}, 3000); 
</script>
