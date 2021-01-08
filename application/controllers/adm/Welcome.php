<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller		
{
	// CONSTRUC-------------------- Welcome CONTROLLER
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}
	// CONSTRUC-------------------- Welcome CONTROLLER
	// STAR--PROSES--LOGIN
	public function index()
	{
		$this->form_validation->set_rules('_email','Email','trim|required');
		$this->form_validation->set_rules('_password','Password','trim|required');
		if ($this->form_validation->run() == false) {	
			$data['kel'] = $this->db->query("SELECT * FROM kelompok")->result_array();
			$this->load->view('adm/login',$data);
		}
		else{
			$this->_login();
		}
		
	}
	private function _login()
	{/*ambil data dari form email dan password saat login*/
		$email   =$this->input->post('_email',true);
		$password=$this->input->post('_password',true);
		/*cek apakah ada data di database yang sesuai dengan email inputan login */
		$user = $this->db->get_where('auth_user',['npp'=>$email])->row_array();
		if($user){	
			//jika user aktif
			if (password_verify($password, $user['auth_password'])) {
				//cek password nya --
				if($user['auth_is_active']==1) {
					$data=[
						'data'=>$user,
						'status'=>'login'
					]; 
					$this->session->set_userdata($data);
					$log=[
						'nama'=>$_SESSION['data']['auth_username'],
						'tanggal'=>date("Y-m-d H:i:s")
					];
					$this->db->insert('data_login',$log);
					// var_dump($_SESSION);die();
					// $this->db->query("INSERT INTO ");
					redirect('adm/dashboard');	//Jika lolos smua , diarahkan ke link 
				}else{
					$this->session->set_flashdata('message','<span style="color:red;font-weight:bold" >User anda tidak aktif ! Hubungi Admin
						</span>');
					redirect('adm/welcome');
				}
			}else{
				$this->session->set_flashdata('message_password','<span style="color:red;font-weight:bold" >Password salah !
					</span>');
				redirect('adm/welcome');
			}
		}else{
			$this->session->set_flashdata('message','<span style="color:red;font-weight:bold">Email Tidak terdaftar !
						</span>');
			redirect('adm/welcome');

		}	
	}
// END--PROSES--LOGIN

	public function registration()
	{
		$this->form_validation->set_rules('_user', 'Name','required|trim');//validasi nama harus ada
		$this->form_validation->set_rules('_email','Email','required|trim|valid_email|is_unique[auth_user.npp]',[
			'is_unique'=>'Email ini sudah terdaftar! |  gunakan email lain! ..'
			]); //validasi email harus ada

		$this->form_validation->set_rules('_pass1', 'Password','required|trim|min_length[5]|matches[_pass2]',[
			'matches'=>'Password harus sama!',	
			'min_length'=>'Password terlalu pendek, minimal 5 karakter!'
			]);//validasi nama harus ada
		$this->form_validation->set_rules('_pass2', 'Password','matches[_pass1]');//validasi nama harus ada

		if($this->form_validation->run()==false){	
			$data['kodeadm']=$this->My_model->kodeadmin();
			$this->load->view('adm/registration',$data);
		}else{
			$data=
				[ // untuk memasukkan data ke database
					/*htmlspecialchars() berfungsi untuk filter dari karakter aneh*/
				'auth_id'			=> $this->input->post('_kode',true),
				'auth_username' 	=> htmlspecialchars($this->input->post('_user',true)),
				'npp'				=> htmlspecialchars($this->input->post('_email',true)),
				'auth_password' 	=> password_hash($this->input->post('_pass1'),PASSWORD_DEFAULT),
				'auth_image'		=> htmlspecialchars('default.jpg'),
				'auth_level'		=> '2',
				'auth_date_created' => date("Y-m-d"),
				'auth_is_active'	=> '1',
				'auth_default_password'=> password_hash('peiganteng',PASSWORD_DEFAULT)
			];

			$this->db->insert('auth_user',$data);
			$this->session->set_flashdata('message','<div class="alert alert-warning text-center" role="alert">Selamat! akun anda berhasil didaftarkan,<br> silahkan aktivasi!
				</div>');
			redirect('adm/welcome/index');
		}
		
	}
	public function logout_dashboard()
	{
		$this->session->unset_userdata('data');
		$this->session->unset_userdata('status');
		redirect(base_url('adm/welcome')); 
	}
	//LUPA PASSWORD
	public function lupapasword()
	{
		$this->form_validation->set_rules('_email','trim|required');
		$this->form_validation->set_rules('_pasdef','PasswordDefault','trim|required');
		if($this->form_validation->run()==false){
			$this->load->view('adm/lupa_pasword');
		}else{
			$this->_go1();
		}
	}

	private function _go1()
	{/*ambil data dari form email dan password saat login*/
		$email   =$this->input->post('_email',true);
		$password=$this->input->post('_pasdef',true);
		/*cek apakah ada data di database yang sesuai dengan email inputan login */
		$user = $this->db->get_where('auth_user',['npp'=>$email])->row_array();
		if($user){	
			if (password_verify($password, $user['auth_default_password'])) {
					$data=[
						'data'=>$user,
						'status'=>'login'
					];
					$this->session->set_userdata($data); ?>
					<script>alert("Atur Ulang Kata Sandi Anda")</script>
			<?php	redirect('adm/welcome/go2');	//Jika lolos smua , diarahkan ke link 
			}else{
				$this->session->set_flashdata('message_password','<span style="color:red;font-weight:bold" >Password salah ! ( Tanya kelompok SPO )
					</span>');
				redirect('adm/welcome/lupapasword');
			}
		}else{
			$this->session->set_flashdata('message','<span style="color:red;font-weight:bold">User Tidak terdaftar !
						</span>');
			redirect('adm/welcome/lupapasword');
		}
	}

	public function go2()
	{
		// $this->load->view('adm/lupa_pasword_next');
		
		$this->form_validation->set_rules('_newpas', 'Password','required|trim|min_length[5]|matches[_newpas1]',[
			'matches'=>'Password harus sama!',	
			'min_length'=>'Password terlalu pendek, minimal 5 karakter!'
			]);//validasi nama harus ada
		$this->form_validation->set_rules('_newpas1', 'Password','matches[_newpas]');//validasi nama harus ada

		if($this->form_validation->run()==false){
			$this->load->view('adm/lupa_pasword_next');
		}else{
		$id = $this->input->post('_id',true);
		$data=['auth_password'=>password_hash($this->input->post('_newpas',true),PASSWORD_DEFAULT)];
		$this->db->where('auth_id',$id);
		$this->db->update('auth_user',$data);
		?>
		<script>
			alert("Perubahan Password Berhasil !");
			window.location.href = "<?= base_url() ?>";
		</script>
		<?php
		//redirect('adm/welcome');
		}
	}
	// private function _get_go2()
	// {
		
	// }

}



