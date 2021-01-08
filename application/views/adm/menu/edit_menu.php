<style>.ml{margin-left:10px}</style>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="box-title">Access Group <b><?= $menu['nama'] ?></b></h3>
                    </div>
                    <div class="col-md-6" id="mydiv">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
            </div>
            <div class="box-body no-padding">
                <div class="col-md-11 col-sm-9">
                    <form action="<?= base_url('administrator/menu/editmenugo')?>" method="POST">
                        <input type="hidden" class="form-control ml" name="id" value="<?= $menu['id']?>">
                        <i>nama</i>
                        <input type="text" class="form-control ml" name="nama" value="<?= $menu['nama']?>">
                        <i>link</i>
                        <input type="text" class="form-control ml" name="link" value="<?= $menu['link']?>">
                        <i>icon</i>
                        <input type="text" class="form-control ml" name="icon" value="<?= $menu['icon']?>">
                        <i>sort</i>
                        <input type="number" class="form-control ml" name="sort" value="<?= $menu['sort']?>">
                        <i>level</i>
                        <input type="number" class="form-control ml" name="level" value="<?= $menu['level']?>">
                        <i>access</i>
                        <input type="number" class="form-control ml" name="access" value="<?= $menu['access']?>">
                        <button type="submit" class="btn btn-primary"style="float:right;margin-top:10px;margin-bottom:10px">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>