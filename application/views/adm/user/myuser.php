<script>
     function edit()
    {   
        // alert("helo");
        var hal = "<?= base_url('administrator/User_management/e') ?>";
        $("#new").load(hal);
        $("#new").toggle(400);
        // $("#edit").hide(400)
    }
</script>

<!-- Profile Image -->
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?= base_url('image/').$auth['auth_image'] ?>" alt="User profile picture">

            <h3 class="profile-username text-center"><?= $auth['auth_username']?></h3>

            <p class="text-muted text-center"><?= $auth['nama_grup']?> </p>

            <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Username</b> <span class="pull-right"><?= $auth['auth_username']?></span>
            </li>

            <li class="list-group-item">
                <b>Login ID</b> <span class="pull-right"><?= $auth['auth_loginid']?></span>
            </li>

            </li>
            <li class="list-group-item">
                <b>Status</b> <span class="pull-right"><?= $auth['status_name']?></span>
            </li>
            <li class="list-group-item">
                <b>Background Color</b> <span class="pull-right">
                    <div style="widht:10%;height10%;background:<?= $auth['auth_colorbg']?>;color:transparent">''''''''</div>
                </span>
            </li>
            <li class="list-group-item">
                <b>Text Color</b> <span class="pull-right">
                    <div style="widht:10%;height10%;background:<?= $auth['auth_colortx']?>;color:transparent">''''''''</div>
                </span>
            </li>
            </ul>
            <button class="btn btn-primary btn-block" onclick="edit()">
                <b>Edit Profil</b>
            </button>
        </div>
        <!-- /.box-body -->
        </div>
    </div>
    
    <div class="col-md-6">
        <div id="new">
        </div>
    </div>
</div>