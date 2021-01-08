
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/bootstrap.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/Ionicons/ionicons.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/adminlte.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/iCheck/square/blue.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/jvectormap/jquery-jvectormap.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/skins/_all-skins.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/AdminLTE.min.css')?>">
</head>


<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Register </b>Syafei</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="border-top:5px solid black">
      <p class="login-box-msg">Register your new account</p>

      <?= form_open( base_url('administrator/welcome/registration') ,['method' => 'POST']); ?>
        <div class="form-group has-feedback">
            <input name="_kode" type="hidden" value="<?= $kodeadm ?>">
          <input name="_user" type="text" class="form-control" placeholder="Nama Lengkap">
          <?= form_error('_user','<small class="text-danger bold pl-4">','</small>'); ?>
        </div>
        <div class="form-group has-feedback">
            <input name="_email" type="email" class="form-control" placeholder="Email">
            <?= form_error('_email','<small class="text-danger bold pl-4">','</small>'); ?>
        </div>
        <div class="form-group has-feedback">
            <input name="_pass1" type="password" class="form-control" placeholder="Password">
            <?= form_error('_pass1','<small class="text-danger bold pl-4">','</small>'); ?>
        </div>
        <div class="form-group has-feedback">
            <input name="_pass2" type="password" class="form-control" placeholder="Repeat Password">
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
         
            </div>
          </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
    <?= form_close(); ?>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
