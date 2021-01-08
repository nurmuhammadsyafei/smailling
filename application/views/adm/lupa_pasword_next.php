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
  <div class="main-container">
    <div class="main-content">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="login-container"><br><br><br><br><br>
            <div class="center ">
              <h1 class="company-text-atas">
                <i class="ace-icon fa fa-leaf orange"></i>
                <span class="orange">SGV</span>
                <span id="id-text2"style="color:#005e6a">Televerivication</span>
              </h1>
              <h4 class="company-text">&copy; Bank Negara Indonesia</h4>
            </div>

            <div class="space-6"></div>

            <div class="position-relative">
              <div id="login-box" class="login-box visible  no-border">
                <div class="widget-body my-widget-body " >
                  <div class="widget-main center">
                    <h4 class="blak bold">
                      Atur Ulang Kata Sandi
                    </h4>

                    <div class="space-6"></div>

                    <?= form_open( base_url('administrator/welcome/go2') ,['method' => 'POST']); ?>
                    <fieldset>
                      <?= $this->session->flashdata('message'); ?>
                      <input type="hidden" name="_id" value="<?= $this->session->userdata('data')['auth_id'] ?>">
                      <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                          <input type="password" name="_newpas" class="form-control" placeholder="Password Baru" />
                          <?= form_error('_newpas','<small class="text-danger bold pl-4">','</small>'); ?>
                          <i class="ace-icon fa fa-user"></i>
                        </span>
                      </label>

                      <?= $this->session->flashdata('message_password'); ?>
                      <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                          <input type="password" name="_newpas1" class="form-control" placeholder="Konfirmasi Password" />
                          <i class="ace-icon fa fa-lock"></i>
                        </span>
                      </label>

                      <div class="space"></div>

                      <div class="clearfix">

                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                          <i class="ace-icon fa fa-key"></i>
                          <span class="bigger-110">Reset</span>
                        </button>
                      </div>

                    </fieldset>
                    <?= form_close(); ?>
                  </div><!-- /.widget-main -->

                </div><!-- /.widget-body -->
              </div><!-- /.login-box -->



            </div><!-- /.position-relative -->

          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.main-content -->
  </div><!-- /.main-container -->

  <script src="<?= base_url('assets/js/jquery-2.1.4.min.js') ?>"></script>

  <script type="text/javascript">
    if('ontouchstart' in document.documentElement) 
      document.write("<script src='<?= base_url(assets/js/jquery.mobile.custom.min.js) ?>'>"+"<"+"/script>");
  </script>

  <!-- inline scripts related to this page -->
  <script type="text/javascript">
    jQuery(function($) {
     $(document).on('click', '.toolbar a[data-target]', function(e) {
      e.preventDefault();
      var target = $(this).data('target');
        $('.widget-box.visible').removeClass('visible');//hide others
        $(target).addClass('visible');//show target
      });
   });



      //you don't need this, just used for changing background
      jQuery(function($) {
       $('#btn-login-dark').on('click', function(e) {
        $('body').attr('class', 'login-layout');
        $('#id-text2').attr('class', 'white');
        $('#id-company-text').attr('class', 'blue');
        
        e.preventDefault();
      });
       $('#btn-login-light').on('click', function(e) {
        $('body').attr('class', 'login-layout light-login');
        $('#id-text2').attr('class', 'grey');
        $('#id-company-text').attr('class', 'blue');
        
        e.preventDefault();
      });
       $('#btn-login-blur').on('click', function(e) {
        $('body').attr('class', 'login-layout blur-login');
        $('#id-text2').attr('class', 'white');
        $('#id-company-text').attr('class', 'light-blue');
        
        e.preventDefault();
      });
       
     });
   </script>
 </body>
 </html>
