<?php
session_start();
include('include/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>s.c.a.t</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="sales-css/bootstrap.min.css" rel="stylesheet" media="screen">
 </head>
 
<table class="table table-condensed table-bordered table-hover" cellpadding="0" cellspacing="0">
<thead>
    <tr>
        <th><center>No</center></th>
        <th><center>EFORM NUMBER</center></th>
        <th><center>NO PROSPECT</center></th>
        <th><center>NPP</center></th>
        <th><center>NAMA NASABAH</center></th>
        <th><center>MITRA</center></th>
		<th><center>CABANG</center></th>
        <th><center>TANGGAL INPUT</center></th>
        <th style="width:35px;"><center>AKSI</center></th>
    </tr>
</thead>
<tbody> 
    <?php 
        $i = 1;
        $jml_per_halaman = 20; // jumlah data yg ditampilkan perhalaman
		if($_SESSION['user_level']==8 || $_SESSION['user_level']==9 ||$_SESSION['user_level']==11 ){
			$jml_data = mssql_num_rows(mssql_query("SELECT * FROM leads_staging where ket in ('0') and SCO_NPP='$_SESSION[username]'"));
			$jml_halaman = ceil($jml_data / $jml_per_halaman);
          // query pada saat mode pencarian
			if(isset($_POST['cari'])) { 
				$kunci = $_POST['cari']; 
				echo "<strong>Hasil pencarian untuk kata kunci $kunci</strong>";
				$query = mssql_query("select * from (
											SELECT c.nama_cabang,ROW_NUMBER() OVER (ORDER BY id DESC) AS ROWNUM ,a.* FROM (
												SELECT * FROM leads_staging where ket in ('0') AND SCO_NPP='$_SESSION[username]'
											) AS a  
											LEFT JOIN (SELECT KODE_cabang,ID_AREA,nama_cabang FROM CABANG WHERE tipe_cabang =  'KCU') c on a.BRANCH=c.nama_cabang 
										)z where z.nama LIKE '%$kunci%' OR z.BRANCH LIKE '%$kunci%'
									");
			// query jika nomor halaman sudah ditentukan
			} elseif(isset($_POST['halaman'])) {
				$halaman = $_POST['halaman'];
				$i = ($halaman - 1) * $jml_per_halaman  + 1;
				$query = mssql_query("select * from (
											SELECT c.nama_cabang,ROW_NUMBER() OVER (ORDER BY id DESC) AS ROWNUM ,a.* FROM (
												SELECT * FROM leads_staging where ket in ('0')  AND SCO_NPP='$_SESSION[username]'
											) AS a  
											LEFT JOIN (SELECT KODE_cabang,ID_AREA,nama_cabang FROM CABANG WHERE tipe_cabang =  'KCU') c on a.BRANCH=c.nama_cabang 
									  )z
									 WHERE z.ROWNUM BETWEEN (($halaman - 1) * $jml_per_halaman)+1 AND ($jml_per_halaman*$halaman) ORDER BY id DESC
									");
			// query ketika tidak ada parameter halaman maupun pencarian
			} else {
				$halaman = 1;
				 $i = ($halaman - 1) * $jml_per_halaman  + 1;
				$query = mssql_query("select * from (
											SELECT c.nama_cabang,ROW_NUMBER() OVER (ORDER BY id DESC) AS ROWNUM ,a.* FROM (
												SELECT * FROM leads_staging where ket in ('0') and SCO_NPP='$_SESSION[username]'
											) AS a  
											LEFT JOIN (SELECT KODE_cabang,ID_AREA,nama_cabang FROM CABANG WHERE tipe_cabang =  'KCU') c on a.BRANCH=c.nama_cabang 
									  )z
									 WHERE z.ROWNUM BETWEEN (($halaman - 1) * $jml_per_halaman)+1 AND ($jml_per_halaman*$halaman) ORDER BY id DESC
									");
				$halaman = 1; 
			}
	   }else if($_SESSION['user_level']==1 || $_SESSION['user_level']==2 ){
		        $jml_data = mssql_num_rows(mssql_query("SELECT * FROM leads_staging where ket in ('0')"));
				$jml_halaman = ceil($jml_data / $jml_per_halaman);
       
		   // query pada saat mode pencarian
        if(isset($_POST['cari'])) {
            $kunci = $_POST['cari'];
            echo "<strong>Hasil pencarian untuk kata kunci $kunci</strong>";
            $query = mssql_query("select * from (
										SELECT c.nama_cabang,ROW_NUMBER() OVER (ORDER BY id DESC) AS ROWNUM ,a.* FROM (
											SELECT * FROM leads_staging where ket in ('0') 
										) AS a  
										LEFT JOIN (SELECT KODE_cabang,ID_AREA,nama_cabang FROM CABANG WHERE tipe_cabang =  'KCU') c on a.BRANCH=c.nama_cabang 
									)z
								   WHERE a.nama_nasabah LIKE '%$kunci%'
									  OR b.nama_cabang LIKE '%$kunci%'
								");
        // query jika nomor halaman sudah ditentukan
        } elseif(isset($_POST['halaman'])) {
            $halaman = $_POST['halaman'];
            $i = ($halaman - 1) * $jml_per_halaman  + 1;
			$query = mssql_query("select * from (
										SELECT c.nama_cabang,ROW_NUMBER() OVER (ORDER BY id DESC) AS ROWNUM ,a.* FROM (
											SELECT * FROM leads_staging where ket in ('0') 
										) AS a  
										LEFT JOIN (SELECT KODE_cabang,ID_AREA,nama_cabang FROM CABANG WHERE tipe_cabang =  'KCU') c on a.BRANCH=c.nama_cabang 
								  )z
								 WHERE z.ROWNUM BETWEEN (($halaman - 1) * $jml_per_halaman)+1 AND ($jml_per_halaman*$halaman) ORDER BY id DESC
								");
        // query ketika tidak ada parameter halaman maupun pencarian
        } else {
            $halaman = 1;
			 $i = ($halaman - 1) * $jml_per_halaman  + 1;
			$query = mssql_query("select * from (
										SELECT c.nama_cabang,ROW_NUMBER() OVER (ORDER BY id DESC) AS ROWNUM ,a.* FROM (
											SELECT * FROM leads_staging where ket in ('0') 
										) AS a  
										LEFT JOIN (SELECT KODE_cabang,ID_AREA,nama_cabang FROM CABANG WHERE tipe_cabang =  'KCU') c on a.BRANCH=c.nama_cabang 
								  )z
								 WHERE z.ROWNUM BETWEEN (($halaman - 1) * $jml_per_halaman)+1 AND ($jml_per_halaman*$halaman) ORDER BY id DESC
								");
            $halaman = 1; 
        }
	   }  
        while($data = mssql_fetch_array($query)) {
			$tgl = date('d-m-Y',strtotime($data['EFORM_DATE']));
    ?>
    <tr>
        <td><center><?php echo $i++ ?></center></td>
        <td><?php echo $data['eFORM_NO'] ?></td>
        <td><?php echo $data['PROSPECT_NO'] ?></td>
        <td><?php echo $data['SCO_NPP'] ?></td>
        <td><?php echo $data['NAME'] ?></td>
        <td><?php echo $data['MITRA'] ?></td>
        <td><?php echo $data['nama_cabang'] ?></td>
        <td><center><?php echo $tgl ?></center></td>
		<td><center><a href="index.php?page=16a&id=<?php echo $data['id'] ?>" ><i class="icon-pencil"></i></a></center> </td>
    </tr>
    <?php
        }
    ?>
</tbody>
</table>
 
<?php if(!isset($_POST['cari'])) { ?>
<!-- untuk menampilkan menu halaman -->
<div class="pagination pagination-right">
  <ul>
    <?php

    // tambahan
    // panjang pagig yang akan ditampilkan
    $no_hal_tampil = 10; // lebih besar dari 3

    if ($jml_halaman <= $no_hal_tampil) {
        $no_hal_awal = 1;
        $no_hal_akhir = $jml_halaman;
    } else {
        $val = $no_hal_tampil - 2; //3
        $mod = $halaman % $val; //
        $kelipatan = ceil($halaman/$val);
        $kelipatan2 = floor($halaman/$val);

        if($halaman < $no_hal_tampil) {
            $no_hal_awal = 1;
            $no_hal_akhir = $no_hal_tampil;
        } elseif ($mod == 2) {
            $no_hal_awal = $halaman - 1;
            $no_hal_akhir = $kelipatan * $val + 2;  
        } else {
            $no_hal_awal = ($kelipatan2 - 1) * $val + 1;
            $no_hal_akhir = $kelipatan2 * $val + 2;
        }

        if($jml_halaman <= $no_hal_akhir) {
            $no_hal_akhir = $jml_halaman;
        }
    }

    for($i = $no_hal_awal; $i <= $no_hal_akhir; $i++) {
        // tambahan
        // menambahkan class active pada tag li
        $aktif = $i == $halaman ? ' active' : '';
    ?>
    <li class="halaman<?php echo $aktif ?>" id="<?php echo $i ?>"><a href="#"><?php echo $i ?></a></li>
    <?php } ?>
  </ul>
</div>
<?php } ?>
