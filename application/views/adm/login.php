<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8" />
  <title>Login Page - SGV teva</title>

  <meta name="description" content="User login page" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/font-awesome/4.5.0/css/font-awesome.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/fonts.googleapis.com.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/ace.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/ace-rtl.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/my.css') ?>" />

</head>

<body class="login-layout mylogin-page" >
  <div class="main-container" style="display:none">
    <div class="main-content">
      <div class="row" >
        <div class="col-sm-10 col-sm-offset-1">
          <div class="login-container">
            <div class="center form-atas">
              <h1 class="company-text-atas">
                <i class="ace-icon fa cl-birubni"></i><i class="ace-icon fa"style="color:white">Login</i>
                <i class="ace-icon fa cl-birubni">SM</i><i class="ace-icon fa"style="color:white">ailling</i>
              </h1>
              <h4 class="company-text bold">&copy; <span class="white">BNI</span> Divisi SLN</h4>
            </div>
            <div class="position-relative">
                <div class="my-widget-body " >
                  <div class="widget-main center">
                    <div class="space-6"></div>

                    <?= form_open( base_url('adm/welcome') ,['method' => 'POST']); ?>
                    <fieldset>
                      <?= $this->session->flashdata('message'); ?>
                      <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                          <input name="_email" type="text" class="form-control" placeholder="Username" />
                          <i class="ace-icon fa fa-user"></i>
                        </span>
                      </label>

                      <?= $this->session->flashdata('message_password'); ?>
                      <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                          <input name="_password"type="password" class="form-control" placeholder="Password" />
                          <i class="ace-icon fa fa-lock"></i>
                        </span>
                      </label>

                      <div class="space"></div>

                      <div class="clearfix">
                        <a href="<?= base_url('administrator/welcome/lupapasword') ?>">Lupa Password ?</a>
                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                          <i class="ace-icon fa fa-key"></i>
                          <span class="bigger-110">Login</span>
                        </button>
                      </div>

                    </fieldset>
                    <?= form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- REGISTRASI -->

    <div class="main-container">
    <div class="main-content">
      <div class="row" >
        <div class="col-sm-10 col-sm-offset-1">
          <div class="login-container">
            <div class="center form-atas">
              <h1 class="company-text-atas">
                <i class="ace-icon fa cl-birubni"></i><i class="ace-icon fa"style="color:white">Registration</i>
                <i class="ace-icon fa cl-birubni">SM</i><i class="ace-icon fa"style="color:white">ailling</i>
              </h1>
              <h4 class="company-text bold">&copy; <span class="white">BNI</span> Divisi SLN</h4>
            </div>
            <div class="position-relative">
                <div class="my-widget-body " >
                  <div class="widget-main center">
                    <div class="space-6"></div>

                    <?php //echo form_open( base_url('adm/welcome') ,['method' => 'POST']); ?>
                    <fieldset>
                      <span style="color:red;font-weight:bold"></span>
                      <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                          <input name="npp" id="npp" type="text" class="form-control" placeholder="Npp" />
                          <i class="ace-icon fa fa-user"></i>
                        </span>
                      </label>

                      <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                          <input name="nama" id="nama" type="password" class="form-control" placeholder="Nama" />
                          <i class="ace-icon fa fa-lock"></i>
                        </span>
                      </label>
                      
                      <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                          <input name="no_wa" id="no_wa" type="password" class="form-control" placeholder="No Whatsapp" />
                          <i class="ace-icon fa fa-lock"></i>
                        </span>
                      </label>

                      <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                          <select name="kelompok" id="kelompok" class="form-control">
                            <option value="">-Pilih Kelompok-</option>
                            <?php 
                              foreach($kel as $kelompok){
                            ?>
                            <option value="<?= $kelompok['id_kelompok']?>"><?= $kelompok['nama_kelompok']?></option>
                            <?php } ?>
                          </select>
                          <i class="ace-icon fa fa-lock"></i>
                        </span>
                      </label>

                      <div class="space"></div>

                      <div class="clearfix">
                        <a href="<?= base_url('administrator/welcome/lupapasword') ?>">Lupa Password ?</a>
                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                          <span class="bigger-110" id="kirimdata">Kirim Data<i class="fas fa-camera"></i>  </span>
                        </button>
                      </div>

                    </fieldset>
                    <?php //echo form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- END REGISTRASI -->
  <script src="<?= base_url('assets/js/jquery-2.1.4.min.js') ?>"></script>

<script>
  $(document).ready(function(){ //jquery script

    $('#kirimdata').click(function(){
      var npp = $('#npp').val();
      var nama = $('#nama').val();
      var no_wa = $('#no_wa').val();
      var kelompok = $('#kelompok').val();

      if(nama==''){
        $('#alertnpp')
      }
    })



  })
</script>


 </body>
 </html>
