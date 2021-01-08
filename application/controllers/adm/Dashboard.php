<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends MY_Controller		
{
	 
	public function __construct()
	{
		parent::__construct();
		$this->load->library('custom_library');
		date_default_timezone_set('Asia/Jakarta');
		if($this->session->userdata('status') != "login"){
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Anda Harus Login!</div>');
			redirect(base_url('administrator/welcome'));
		}
	}

	public function index()
	{
		$this->load->library('custom_library'); 

		$this->page('administrator/dashboard');
	}
	
	public function data_monitoring(){
		$id=$_SESSION['data']['auth_id'];
		$date=date("Y-m-d");
		// var_dump($date);die();
		$data['avaiable']=$this->db->query("SELECT COUNT(*) FROM tele_data where assign_to='$id'
		and waktude='$date'")->row_array();		
		
		$data['blmcall']=$this->db->query("SELECT COUNT(*)  FROM tele_data a 
		LEFT JOIN tele_ask b ON a.batch=b.batch AND a.id=b.id_tele  where assign_to='$id'
		and waktude='$date' and is_call=''")->row_array();

		$data['udahcall']=$this->db->query("SELECT COUNT(*)  FROM tele_data a 
		LEFT JOIN tele_ask b ON a.batch=b.batch AND a.id=b.id_tele  where assign_to='$id'
		and waktude='$date' and is_call='1'")->row_array();
		$data['monitoring']=$this->db->query("SELECT  b.auth_username,COUNT(a.batch)  'all' , SUM(c.is_call)'sudahcall' ,
											COUNT(a.batch)-SUM(c.is_call)'belumcall'
											FROM tele_data a
											LEFT JOIN tele_ask  c ON c.batch = a.batch AND c.id_tele=a.id
											LEFT JOIN auth_user b ON a.assign_to = b.auth_id
											WHERE a.waktude='$date' AND b.auth_username IS NOT NULL GROUP BY a.assign_to")->result_array();
		$data['monitoringtotal_assgn']=$this->db->query("SELECT  COUNT(a.batch)  'all' , SUM(c.is_call)'sudahcall' ,
											COUNT(a.batch)-SUM(c.is_call)'belumcall'
											FROM tele_data a
											LEFT JOIN tele_ask  c ON c.batch = a.batch AND c.id_tele=a.id
											WHERE a.waktude='$date' AND is_survei='0'AND a.is_assign='1'")->row_array();
		$data['monitoringtotal_free']=$this->db->query("SELECT  COUNT(a.batch)  'all' , SUM(c.is_call)'sudahcall' ,
											COUNT(a.batch)-SUM(c.is_call)'belumcall'
											FROM tele_data a
											LEFT JOIN tele_ask  c ON c.batch = a.batch AND c.id_tele=a.id
											WHERE a.waktude='$date' AND is_survei='0'AND a.is_assign='0'")->row_array();

		$this->load->view('administrator/dashbord/data_monitoring',$data);
	}
}



