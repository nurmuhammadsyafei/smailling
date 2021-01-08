<script>
     function opennewmenu()
    {   
        var hal = "<?= base_url('administrator/menu/opennewmenu') ?>";
        $("#new").load(hal);
        $("#new").toggle(400);
        $("#edit").hide(400)
    }
    function editmenu(id)
    {
        // alert('oke');
        var halaman = "<?php echo base_url('administrator/menu/editmenu/') ?>"+id;
        $("#edit").load(halaman);
        $("#edit").show(400);
        $("#new").hide(400);
    }
</script>
<!-- STAR MODAL NEW -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="<?= base_url('administrator/menu/add')?>"method="POST">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Default Modal</h4>
            </div>
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
                    <div class="col-md-4">
                        <h3 class="box-title">Auth Menu</h3>
                    </div>
                    <div class="col-md-5" >
                        <div class=""id="mydiv">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-info btn-block" onclick="opennewmenu()">
                            New Menu
                        </button>
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
                            <table id="" class="example2 table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Sort</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($menu as $a ){?>
                                    <tr>
                                        <td><?= $a['nama']?></td>
                                        <td><?= $a['sort']?></td>
                                        <td style="margin: auto;width: 19%;">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-info" onclick="editmenu(<?= $a['id']?>)"><i class="fa fa-edit"></i></a>
                                            <!-- <button type="button" class="btn btn-danger"></button> -->
                                            <a href="<?= base_url("administrator/menu/delete_menu/").$a['id'] ?>"class="btn btn-danger" onclick="return confirm('Hapus Akun Ini ?');"><i class="fa fa-close"></i></a>
                                        </div>
                                        </td>
                                    </tr>
                                    <!-- MODAL -->
                                
                                    <!-- END MODAL -->
                                <?php } ?> 
                                </tbody>
                            </table>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 "id='new'style="display: none">
    </div>
    <div class="col-md-6 "id='edit'style="display: none">
    </div>
</div>


<script>
setTimeout(function() {
    $('#mydiv').fadeOut(5000);
}, 3000); 
</script>
