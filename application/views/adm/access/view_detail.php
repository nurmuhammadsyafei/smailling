
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="box-title">Access Group <b><?= $grup['nama_grup'] ?></b></h3>
                    </div>
                    <div class="col-md-6" id="mydiv">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
            </div>
            <div class="box-body no-padding">
                <div class="col-md-11 col-sm-9">
                    <form action="<?= base_url('administrator/access/tambah_detail')?>" method="POST">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <?php $no=1;
                    foreach ($menu as $dt){  ?>
                        <input type="checkbox" name="access<?= $no++ ?>" value="<?= $dt['id']?>"<?php 
                        for ($i=0; $i <= $jmlakses-1; $i++){
                        if($dt['id']==$access[$i]['id_menu']){echo 'checked="checked"';} }?> 
                        
                        ><?= $dt['nama']?><br>
                    <?php }  ?>
                    <button type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>