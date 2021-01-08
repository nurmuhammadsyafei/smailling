<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_management extends MY_Controller		
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
        $data['auth']=$this->My_model->get_user();
		$this->page('administrator/user/user_management',$data);
	}
	
    public function myuser()
    {
		$id=$this->session->userdata('data')['auth_id'];
		$this->db->join('menu_grup l','l.id_grup = auth_user.auth_level' ,'left');
		$this->db->join('status s','s.id = auth_user.auth_is_active' ,'left');
        $data['auth']=$this->db->get_where('auth_user',['auth_id'=>$id])->row_array();
		$this->page('administrator/user/myuser',$data); 
    }
    public function e()
    {
		$id=$this->session->userdata('data')['auth_id'];
		$data['auth']=$this->db->get_where('auth_user',['auth_id'=>$id])->row_array();
		$this->load->view('administrator/user/ed',$data);
    }
    public function go_e() //Edit secara personal
    {
		
		if (!empty($_FILES["_foto"]["name"])) {
			$namafoto 			= $_FILES['_foto']['name'];			// Jika Foto Di Update
			$this->load->helper('file');	  						// Panggil Helper
			unlink("image/".$_FILES['_foto']['name']); 				// hapus file lama
			unlink("image/".$this->input->post('_fotolama',true)); 	// hapus jika ada file yang kembar / replace 
		} else {	
			$namafoto			= $this->input->post('_fotolama',true); // JIKA Foto tidak di update
		}

		$data=[
			'auth_username'	 =>$this->input->post('_username',true),
			'auth_loginid'	 =>$this->input->post('_email',true),
			'auth_colorbg'	 =>$this->input->post('_colorbg',true),
			'auth_colortx'	 =>$this->input->post('_colortx',true),
			'auth_image'	 =>$namafoto
		];
		$this->db->where('auth_id',$this->input->post('_id',true));
		$this->db->update('auth_user',$data);

		$this->_uploadImage(); 			  // Upload Image Baru
		redirect('administrator/user_management/myuser');

	}public function go_edit_2() //Edit oleh admin
    {
		
		if (!empty($_FILES["_foto"]["name"])) {
			$namafoto 			= $_FILES['_foto']['name'];			// Jika Foto Di Update
			$this->load->helper('file');	  						// Panggil Helper
			unlink("image/".$_FILES['_foto']['name']); 				// hapus file lama
			unlink("image/".$this->input->post('_fotolama',true)); 	// hapus jika ada file yang kembar / replace 
		} else {	
			$namafoto			= $this->input->post('_fotolama',true); // JIKA Foto tidak di update
		}

		$data=[
			'auth_username'	 =>$this->input->post('_username',true),
			'auth_loginid'	 =>$this->input->post('_email',true),
			'auth_level'	 =>$this->input->post('_level',true),
			'auth_is_active' =>$this->input->post('_status',true),
			'auth_image'	 =>$namafoto
		];
		$this->db->where('auth_id',$this->input->post('_id',true));
		$this->db->update('auth_user',$data);

		$this->_uploadImage(); 			  // Upload Image Baru
		redirect('administrator/user_management');
	}
	
	private function _uploadImage()
	{
		

		$config['upload_path']          = './image/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100000;  // max ukuran file, gedein aja , tapi ini udah gede kok 
		$config['max_width']            = 10200004; 
		$config['max_height']           = 7680000; 
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('_foto')) {
			return $this->upload->data("file_name");	
		}
		return "default.jpg";
	}
	
	// TAMBAH DATA 
	public function add()
	{
		$this->form_validation->set_rules('_user', 'Name','required|trim');//validasi nama harus ada
		$this->form_validation->set_rules('_email','Email','required|trim|is_unique[auth_user.auth_loginid]',[
			'is_unique'=>'Email ini sudah terdaftar! |  gunakan email lain! ..'
			]); //validasi email harus ada

		$this->form_validation->set_rules('_pass1', 'Password','required|trim|min_length[5]|matches[_pass2]',[
			'matches'=>'Password harus sama!',	
			'min_length'=>'Password terlalu pendek, minimal 5 karakter!'
			]);//validasi nama harus ada
		$this->form_validation->set_rules('_pass2', 'Password','matches[_pass1]');//validasi nama harus ada

		if($this->form_validation->run()==false){	
			$data['kodeadm']=$this->My_model->kodeadmin();
			// $this->load->view('administrator/z_header');
			// $this->load->view('administrator/user/add_new',$data);
			// $this->load->view('administrator/z_footer');
			$this->page('administrator/user/add_new',$data);
		}else{
			
		//var_dump($_POST);die();
			$data=
				[ // untuk memasukkan data ke database
					/*htmlspecialchars() berfungsi untuk filter dari karakter aneh*/
				'auth_id'			=> $this->input->post('_kode',true),
				'auth_username' 	=> htmlspecialchars($this->input->post('_user',true)),
				'auth_loginid'		=> htmlspecialchars($this->input->post('_email',true)),
				'auth_password' 	=> password_hash($this->input->post('_pass1'),PASSWORD_DEFAULT),
				'auth_image'		=> htmlspecialchars('default.jpg'),
				'auth_level'		=> $this->input->post('_level',true),
				'auth_date_created' => date("Y-m-d"),
				'auth_is_active'	=> '1',
				'auth_default_password'=> password_hash('bankbni',PASSWORD_DEFAULT)
			];

			$this->db->insert('auth_user',$data);
			$this->session->set_flashdata('message','<span class="hideMe alert alert-success" role="alert">Penambahan Akun Berhasil !</span>');
			redirect('administrator/user_management');
		}
		
	}

	public function get_delete($id)
	{
		$this->db->delete('auth_user',['auth_id'=>$id]);
		$this->session->set_flashdata('message','<span class="hideMe alert alert-success" role="alert">Akun Berhasil Dihapus !</span>');
		redirect('administrator/user_management');
	}



	Public function tes()
	{
		$data=$this->db->get_Where('menu_access',['id_grup'=>$this->session->userdata('data')['auth_level']])->result_array();
		foreach($data as $data1){
			 $data2[]=$data1['id_menu'];
		}
		// var_dump($data2);
		
		
		$this->db->where_in('id',$data2);
		$query = $this->db->get('menu')->result_array();
		die();


		$data=[
			3,4,5
		];var_dump($data);die();
		$this->db->where_in('id',$data);
		$qry=$this->db->get('menu')->result_array();
		var_dump($qry);


die();
	}
}



