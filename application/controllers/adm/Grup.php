<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Grup extends MY_Controller		
{
	 
	public function __construct()
	{
		parent::__construct();
		$this->load->library('custom_library');
		if($this->session->userdata('status') != "login"){
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Anda Harus Login!</div>');
			redirect(base_url('administrator/welcome'));
		}
	}

	public function index()
	{
        $data['grup']=$this->My_model->get_grup();
		$this->page('administrator/grup/view',$data);
    }
	// public function add()
	// {
	// 	// var_dump($_POST);die();
	// 	$data=[
	// 		'nama_grup'=>$this->input->post('_nama',true),
	// 		'desc_grup'=>$this->input->post('_desc',true)
	// 	];
	// 	$this->db->insert('menu_grup',$data);
	// 	redirect(base_url('administrator/access'));
	// }
	public function delete($id)
	{
		$this->db->query("DELETE from menu_grup where id_grup=$id");
		redirect(base_url('administrator/access'));
	}
}



