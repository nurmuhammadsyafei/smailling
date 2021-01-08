<style>
  .unlink{
    text-decoration:none;
    color:black;
  }
  .unlink:hover{
    color:black;
  }
  .bg-purple{
    background:#purple;
  }
</style>

<script>

$(document).ready(function(){
	var data_monitoring = "<?= base_url('administrator/dashboard/data_monitoring')?>";
	$('.tabel_monitoring').html("<img style='width:20%' src='https://gifimage.net/wp-content/uploads/2017/09/ajax-loading-gif-transparent-background-8.gif'>");
	$('.tabel_monitoring').load(data_monitoring);



	$('#repres').click(function(){
	$('.tabel_monitoring').html("<img style='width:20%' src='https://gifimage.net/wp-content/uploads/2017/09/ajax-loading-gif-transparent-background-8.gif'>");
		$('.tabel_monitoring').load(data_monitoring);
	})

})
</script>

      <!-- <h1>
        FML INFO
        <small><?= date("d M Y")?></small>
      </h1> -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <br>

        
      <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert">
          <i class="ace-icon fa fa-times"></i>
        </button>
        <i class="ace-icon fa fa-check green"></i>
        Hi, 
        <strong class="green">
          <?= $_SESSION['data']['auth_username'];?>
        </strong>,
        Semangat pagi selamat beraktivitas , jangan lupa senyum <i class="fa fa-smile-o"style="font-size:20px"></i>
      </div>

    <div class="row">
		<div class="space-6"></div>
			  <?php //var_dump($_SESSION);die();
			  if($_SESSION['data']['auth_level']=='8'){ ?>
									<div class="col-sm-7 infobox-container">
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-shopping-cart"></i>
											</div>
											<div class="infobox-data">
												<span class="infobox-data-number"><?= $avaiable['COUNT(*)'] ?></span>
												<div class="infobox-content"><b>Data Avaiable</b></div>
											</div>
										</div>

                    					<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-comments"></i>
											</div>
											<div class="infobox-data">
												<span class="infobox-data-number"><?= $blmcall['COUNT(*)'] ?></span>
												<div class="infobox-content"><b>Data Belum Call</b></div>
											</div>
										</div>

										<div class="infobox infobox-orange">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-bolt "></i>
											</div>
											<div class="infobox-data">
												<span class="infobox-data-number"><?= $udahcall['COUNT(*)'] ?></span>
												<div class="infobox-content"><b>Data Sudah Call</b></div>
											</div>
										</div>
			  <?php }else{ ?> 
									<div class="col-sm-6" style="margin-left:20px;border-right:2px solid #3498db">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													<b>Teva Monitoring</b> 
												</h4>
												<button class="btn pull-right btn-info" title="Refresh" style="border-radius:50px;" id="repres"><i class="fa fa-refresh"></i></button>
												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<div class="tabel_monitoring" style="text-align:center;width:100%"></div>
													
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->


			  <?php } ?>
<!-- UNKNOW -->
										<!-- <div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-flask"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?= $blmcall['COUNT(*)'] ?></span>
												<div class="infobox-content">comments + 2 reviews</div>
											</div>
										</div>

										<div class="infobox infobox-orange2">
											<div class="infobox-chart">
												<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"></span>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">6,251</span>
												<div class="infobox-content">pageviews</div>
											</div>

											<div class="badge badge-success">
												7.2%
												<i class="ace-icon fa fa-arrow-up"></i>
											</div>
										</div>

										<div class="infobox infobox-blue2">
											<div class="infobox-progress">
												<div class="easy-pie-chart percentage" data-percent="42" data-size="46">
													<span class="percent">42</span>%
												</div>
											</div>

											<div class="infobox-data">
												<span class="infobox-text">traffic used</span>

												<div class="infobox-content">
													<span class="bigger-110">~</span>
													58GB remaining
												</div>
											</div>
										</div> -->

										<div class="space-6"></div>

										<!-- <div class="infobox infobox-green infobox-small infobox-dark">
											<div class="infobox-progress">
												<div class="easy-pie-chart percentage" data-percent="61" data-size="39">
													<span class="percent">61</span>%
												</div>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">Task</div>
												<div class="infobox-content">Completion</div>
											</div>
										</div>

										<div class="infobox infobox-blue infobox-small infobox-dark">
											<div class="infobox-chart">
												<span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">Earnings</div>
												<div class="infobox-content">$32,000</div>
											</div>
										</div>

										<div class="infobox infobox-grey infobox-small infobox-dark">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-download"></i>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">Downloads</div>
												<div class="infobox-content">1,205</div>
											</div>
										</div> -->
									</div>

									<div class="vspace-12-sm"></div>

									<!-- <div class="col-sm-5">
										<div class="widget-box">
											<div class="widget-header widget-header-flat widget-header-small">
												<h5 class="widget-title">
													<i class="ace-icon fa fa-signal"></i>
													Traffic Sources
												</h5>

												<div class="widget-toolbar no-border">
													<div class="inline dropdown-hover">
														<button class="btn btn-minier btn-primary">
															This Week
															<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
														</button>

														<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
															<li class="active">
																<a href="#" class="blue">
																	<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
																	This Week
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	Last Week
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	This Month
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	Last Month
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div id="piechart-placeholder"></div>

													<div class="hr hr8 hr-double"></div>

													<div class="clearfix">
														<div class="grid3">
															<span class="grey">
																<i class="ace-icon fa fa-facebook-square fa-2x blue"></i>
																&nbsp; likes
															</span>
															<h4 class="bigger pull-right">1,255</h4>
														</div>

														<div class="grid3">
															<span class="grey">
																<i class="ace-icon fa fa-twitter-square fa-2x purple"></i>
																&nbsp; tweets
															</span>
															<h4 class="bigger pull-right">941</h4>
														</div>

														<div class="grid3">
															<span class="grey">
																<i class="ace-icon fa fa-pinterest-square fa-2x red"></i>
																&nbsp; pins
															</span>
															<h4 class="bigger pull-right">1,050</h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div> -->
								</div><!-- /.row -->
          <!-- /.col -->
        <!--  -->
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
            </div>
          </div>
        </div> -->

        <!-- /.col -->

        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">2,000</span>
            </div>
          </div>
        </div> -->

        <!-- /.col -->
      </div>
      <!-- /.row -->

      

  
 