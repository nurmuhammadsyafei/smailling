<!-- Profile Image -->
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
        <div class="box-body box-profile">
            <h3 class="profile-username text-center" sty;e="font-weight:bold">
                <p class="text-muted text-center">Tambah Admin Baru</p>
            </h3>
            <form action="<?= base_url('administrator/user_management/add') ?>" method="POST">
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Username</b>
                    <input type="hidden" name="_kode" value="<?= $kodeadm ?>">
                    <input type="text" name="_user" class="form-control">
                    <?= form_error('_user','<small class="text-danger bold pl-4">','</small>'); ?>

                </li>
                <li class="list-group-item">
                    <b>login ID</b>
                    <input type="text" name="_email" class="form-control">
                    <?= form_error('_email','<small class="text-danger bold pl-4">','</small>'); ?>
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
                        echo ">$c</option>"; 
                    } ?>
                    </select>
                </li>
                    <input type="hidden" name="_pass1" class="form-control" value="sgv123">
                    <?= form_error('_pass1','<small class="text-danger bold pl-4">','</small>'); ?>
                    <input type="hidden" name="_pass2" class="form-control" value="sgv123">
            </ul>
            <button class="btn btn-primary btn-block"><b>Tambah User</b></button>
            </form>
        </div>
        <!-- /.box-body -->
        </div>
    </div>
</div>



