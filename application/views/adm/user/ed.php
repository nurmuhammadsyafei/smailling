

        <div class="box box-danger">
            <form action="<?= base_url('administrator/user_management/go_e') ?>" method="POST" enctype="multipart/form-data">
            <div class="box-body box-profile">
            <h3 class="text-center">Edit Profil</h3>
                <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Username</b> 
                    <input name="_id" type="hidden" value="<?= $auth['auth_id']?>">
                    <input name="_username" class="form-control input-sm" type="text"required value="<?= $auth['auth_username']?>">
                </li>
                <li class="list-group-item">
                    <b>Email</b>
                    <input name="_email" class="form-control input-sm" type="text"required value="<?= $auth['auth_loginid']?>">
                </li>
                <li class="list-group-item">
                <b>Foto</b>
                    <input class="form-control" type="hidden" name="_fotolama" value="<?= $auth['auth_image']?>">
                    <input class="form-control" type="file" name="_foto" >
                </li>
                <li class="list-group-item">
                    <b>Background Color</b>
                    <input name="_colorbg" class="form-control input-sm" type="text"required value="<?= $auth['auth_colorbg']?>">
                </li>
                <li class="list-group-item">
                    <b>Text Color</b>
                    <input name="_colortx" class="form-control input-sm" type="text"required value="<?= $auth['auth_colortx']?>">
                </li>
                </ul>
                <button type="submit" class="btn btn-primary btn-block"><b>Update</b></button>
                </form>
            </div>
        </div>


