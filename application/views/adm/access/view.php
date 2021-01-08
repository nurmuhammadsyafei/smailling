<!-- STAR MODAL NEW -->
<div class="modal fade" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="<?= base_url('administrator/access/add_grup') ?>" method="POST">
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
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                
                <div class="row">
                    <div class="col-md-3">
                        <h3 class="box-title">Access Grup</h3>
                    </div>
                    <div class="col-md-3" >
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">New Grup</button>
                    </div>
                    <div class="col-md-6" id="mydiv">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
            </div>
            <div class="box-body no-padding">
                <div class="row">
                <div class="col-md-5  col-sm-9">

                </div>
                <div class="col-md-2  col-sm-9">
                </div>
                <div class="col-md-12 col-sm-9">
                        <table id="" class="example2 table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Grup</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($access as $a ){?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a['nama_grup']?></td>
                                    <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" onclick="window.location.href='<?= base_url('administrator/access/view_detail/').$a['id_grup'] ?>'"><i class="fa fa-pencil"></i></button>
                                        <!-- <button type="button" class="btn btn-danger" onclick="return confirm('Hapus Akun Ini ?');window.location.href='<?= base_url('administrator/access/delete_grup/').$a['id_grup'] ?>'"><i class="fa fa-close"></i></button> -->
                                        <!-- <button type="button" class="btn btn-danger"></button> -->
                                        <a href="<?= base_url('administrator/access/delete_grup/').$a['id_grup'] ?>"class="btn btn-danger" onclick="return confirm('Hapus Akun Ini ?');"><i class="fa fa-close"></i></a>
                                    </div>
                                    </td>
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
