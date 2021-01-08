
</div>
</div><!-- /.main-content -->

<div class="footer">
  <div class="footer-inner">
    <div class="footer-content">
      <span class="bigger-120">
        <span class="blue bolder">Sgv</span>
        TeleVerification <?= date("Y")?>
      </span>

    </div>
  </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
  <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="<?= base_url('assets/js/jquery-2.1.4.min.js')?>"></script>

<!-- <![endif]-->

    <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
  if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url('assets/js/jquery.mobile.custom.min.js')?>'>"+"<"+"/script>");
</script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    <!-- page specific plugin scripts -->

    <!--[if lte IE 8]>
      <script src="<?= base_url('assets/js/excanvas.min.js') ?>"></script>
    <![endif]-->
    <script src="<?= base_url('assets/js/jquery-ui.custom.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.ui.touch-punch.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.easypiechart.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.sparkline.index.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.flot.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.flot.pie.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.flot.resize.min.js') ?>"></script>
    <script src="<?= base_url('assets/my_assets/datatables.js') ?>"></script>

    <!-- ace scripts -->
    <script src="<?= base_url('assets/js/ace-elements.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/ace.min.js') ?>"></script>
<!-- inline scripts related to this page -->

<script>
  $(document).ready( function () {
    $('.table_id').DataTable();
  } );
</script>
<script>
  $(document).ready( function () {
    $('.table_id2').DataTable();
  } );
</script>
</body>
</html>
