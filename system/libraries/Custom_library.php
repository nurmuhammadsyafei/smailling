<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CI_Custom_library {

	public function nama_bulan($bln) {
		switch ($bln) {
			case 1: return "Januari";	break;
			case 2: return "Februari";	break;
			case 3: return "Maret";		break;
			case 4: return "April";		break;
			case 5: return "Mei";		break;
			case 6: return "Juni";		break;
			case 7: return "Juli";		break;
			case 8: return "Agustus";	break;
			case 9: return "September";	break;
			case 10: return "Oktober";	break;
			case 11: return "November";	break;
			case 12: return "Desember";	break;
		}
	}	
	public function indo_date($tgl) {
		if ($tgl == '0000-00-00') {
			return '-';
		} else {
			$tanggal = substr($tgl, 8, 2);
			$bulan = $this->nama_bulan(substr($tgl, 5, 2));
			$tahun = substr($tgl, 0, 4);
			return $tanggal . ' ' . $bulan . ' ' . $tahun;
		}
	}

	public function tgl_indo($tanggal){
		$bulan = [1 =>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
		$pecahkan = explode('-', $tanggal);
		return $pecahkan[2]. ' - '.$bulan[(int)$pecahkan[1]].' - '.$pecahkan[0];
	}

	function hari_indo($date)
	{
		if($date != '0000-00-00'){
			$data = $this->nama_hari(date('D', strtotime($date)));
		}else{
			$data = '*';
		}
		return $data;
	}

	function nama_hari($day) {
		$hari = $day;
		switch ($hari) {
			case "Sun":$hari = "Minggu";break;
			case "Mon":$hari = "Senin";break;
			case "Tue":$hari = "Selasa";break;
			case "Wed":$hari = "Rabu";break;
			case "Thu":$hari = "Kamis";break;
			case "Fri":$hari = "Jum'at";break;
			case "Sat":$hari = "Sabtu";break;
		}
		return $hari;
	}


	public function rupiah($rupiah) {
		return number_format($rupiah, 0, ",", ".");
	}
	function rp($angka){
	
		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;
	 
	}

}

?>