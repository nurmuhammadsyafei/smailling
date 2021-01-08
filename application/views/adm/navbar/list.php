<!-- STAR MODAL NEW -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="<?= base_url('administrator/navbar/add')?>"method="POST">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Nev Menu Navbar</h4>
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
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="box-title">Auth User</h3>
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
                <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modal-default">
                New Menu Navbar
              </button>
                        <!-- <a href="<?= base_url('administrator/menu/add')?>" class=></a> -->
                        <!-- <button type="button" class="btn btn-warning">Right</button> -->
                        <!-- <button type="button" class="btn btn-success">Right</button> -->
                </div>
                <div class="col-md-12 col-sm-9">
                        <table id="" class="example2 table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Link</th>
                                <th>Icon</th>
                                <th>Sort</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($menu as $a ){?>
                                <tr>
                                    <td><?= $a['nama_menu']?></td>
                                    <td><?= $a['link_menu']?></td>
                                    <td><?= $a['icon_menu']?></td>
                                    <td><?= $a['sort']?></td>
                                    <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info<?= $a['id_menu']?>"><i class="fa fa-edit"></i></button>
                                        <a href="#"class="btn btn-danger" onclick="return confirm('Hapus Akun Ini ?');"><i class="fa fa-close"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                 <!-- MODAL -->
                                    <div class="modal  fade" id="modal-info<?= $a['id_menu']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                        <h3 class="text-center modal-title">Edit Menu</h3>
                                                    <?php $qry = $this->db->get_where('fe_navbar',['id_menu'=>$a['id_menu']])->row_array();?>

                                                    </div>
                                                    <div class="modal-body">
                                                    <form action="<?= base_url('administrator/navbar/get_edit') ?>" method="POST" enctype="multipart/form-data">
                                                        <div class="">
                                                        
                                                            <ul class="list-group list-group-unbordered">
                                                                <li class="list-group-item ">
                                                                    <b>Nama Menu</b> 
                                                                    <input name="_id" type="hidden" value="<?= $qry['id_menu']?>">
                                                                    <input name="_nama" class="form-control input-sm" type="text" value="<?= $qry['nama_menu'] ?>">
                                                                </li>
                                                                <li class="list-group-item ">
                                                                    <b>Link</b>
                                                                    <input name="_link" class="form-control input-sm" type="text" value="<?= $qry['link_menu'] ?>">
                                                                </li>
                                                                <li class="list-group-item ">
                                                                    <b>Sort</b> 
                                                                    <input name="_sort" class="form-control input-sm" type="text" value="<?= $qry['sort'] ?>">
                                                                </li>
                                                                <li class="list-group-item ">
                                                                    <b>Icon</b> 
                                                                    <input name="_icon" class="form-control input-sm" type="text" value="<?= $qry['icon_menu'] ?>">
                                                                </li>
                                                            </ul>
                                                            
                                                    </div>
                                                    <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary btn-block"><b>Update</b></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- END MODAL -->
                            <?php } ?> 
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                            </tfoot>
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
