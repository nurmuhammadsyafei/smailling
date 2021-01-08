
<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-2">
    <div class="widget-box widget-color-blue" id="widget-box-2">
        <div class="widget-header">
            <h5 class="widget-title bigger lighter">
                <i class="ace-icon fa fa-table"></i>
                Auth User
            </h5>
        </div>

        <div class="widget-body">
            <div class="widget-main no-padding">
                <table id='table_id' class="table table-striped table-bordered table-hover">
                    <thead class="thin-border-bottom">
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Login ID</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no=1; foreach($auth as $a ){?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $a['auth_username']?></td>
                                <td><?= $a['auth_loginid']?></td>
                                <td><?= $a['nama_grup']?></td>
                                <td><?= $a['status_name']?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn-xs btn btn-info" data-toggle="modal" data-target="#modal-info<?= $a['auth_id']?>"><i class="fa fa-edit"></i></button>
                                        <!-- <button type="button" class="btn btn-danger"></button> -->
                                        <a href="<?= base_url('administrator/user_management/get_delete/').$a['auth_id'] ?>"class="btn btn-xs btn-danger" onclick="return confirm('Hapus Akun Ini ?');"><i class="fa fa-close"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <!-- MODAL -->
                            <div class="modal  fade" id="modal-info<?= $a['auth_id']?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                                <h3 class="text-center modal-title">Edit Profil</h3>
                                                <?php $qry = $this->db->get_where('auth_user',['auth_id'=>$a['auth_id']])->row_array();?>

                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('administrator/user_management/go_edit_2') ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="">

                                                        <ul class="list-group list-group-unbordered">
                                                            <li class="list-group-item ">
                                                                <b>Username</b> 
                                                                <input name="_id" type="hidden" value="<?= $qry['auth_id']?>">
                                                                <input name="_username" class="form-control input-sm" type="text" value="<?= $qry['auth_username']?>">
                                                            </li>
                                                            <li class="list-group-item ">
                                                                <b>Email</b>
                                                                <input name="_email" class="form-control input-sm" type="text" value="<?= $qry['auth_loginid']?>">
                                                            </li>
                                                            <li class="list-group-item ">
                                                                <b>Level</b> 
                                                                <?php $level = $this->db->query("SELECT * FROM menu_grup")->result_array();?>
                                                                <select class="form-control" name="_level">
                                                                    <option value="">Pilih level</option>
                                                                    <?php foreach($level as $a ){
                                                                        $c=$a['nama_grup'];
                                                                        $id=$a['id_grup'];
                                                                        echo "<option value='$id'";
                                                                        echo $qry['auth_level']==$id?'selected="selected"':'';
                                                                        echo ">$c</option>"; 
                                                                    } ?>
                                                                </select>
                                                            </li>
                                                        </li>
                                                        <li class="list-group-item ">
                                                            <b>Status</b>
                                                            <?php $stt = $this->db->query("SELECT * FROM status")->result_array();?>
                                                            <select class="form-control" name="_status">
                                                                <option value="">Pilih Status</option>
                                                                <?php foreach($stt as $a ){
                                                                    $c=$a['status_name'];
                                                                    $id=$a['id'];
                                                                    echo "<option value='$id'";
                                                                    echo $qry['auth_is_active']==$id?'selected="selected"':'';
                                                                    echo ">$c</option>"; 
                                                                } ?>
                                                            </select>
                                                        </li>
                                                        <li class="list-group-item ">
                                                            <b>Foto</b>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="hidden" name="_fotolama" value="<?=$qry['auth_image']?>">
                                                                    <input name="_foto" class="form-control" type="file" id="image-source" onchange="previewImage();" >
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <img class="profile-user-img " src="<?= base_url('image/').$qry['auth_image'] ?>" alt="User profile picture" style="width:100%">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <img id="image-preview" alt="image preview" />
                                                                </div>
                                                            </div>
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
                </table>

                         <div class="btn-group">
                            <a href="<?= base_url('administrator/user_management/add')?>" class="btn btn-info">New User</a>
                        </div>
            </div>
        </div>
    </div>
</div><!-- /.span -->
</div><!-- /.row -->

