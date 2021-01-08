<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Access extends MY_Controller		
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
        
        $data['access']=$this->db->get('menu_grup')->result_array();
		$this->page('administrator/access/view',$data);
    }
    public function add()
    {
        $data=
            [ 
            'nama_grup' 	=> htmlspecialchars($this->input->post('_nama',true)),
            'desc_grup'		=> htmlspecialchars($this->input->post('_desc',true)),
        ];
        $this->db->insert('menu_grup',$data);
        $this->session->set_flashdata('message',
        '<span class="hideMe alert alert-success" role="alert">Penambahan Grup Berhasil !</span>');
        redirect('administrator/grup');
    }
    public function view_detail($id)
    { 
        
        $data['jmlakses']=$this->db->get_where('menu_access',['id_grup'=>$id])->num_rows();
        $data['menu']=$this->db->get('menu')->result_array();
        $data['access']=$this->db->get_where('menu_access',['id_grup'=>$id])->result_array();
        foreach($data['access'] as $dt){ $data['end']=json_encode($dt['id_menu']);}
        $data['grup']=$this->db->get_where('menu_grup',['id_grup'=>$id])->row_array();
        $data['id']=$id;    
        $this->load->view('administrator/access/view_detail',$data);
    }
    public function tambah_detail()
    {
        // var_dump($_POST);
        // die();
        // var_dump($this->input->post());die()
        $jmlperulangan = $this->db->get('menu')->num_rows();
            $this->db->delete('menu_access',['id_grup'=>$this->input->post('id')]);
        //echo $jmlperulangan.'<br><br>';
        for ($i = 1; $i < $jmlperulangan+1; $i++){
            // echo $i.$this->input->post('access'.$i);die();
            $data=[
                'id_grup'=>$this->input->post('id'),
                'id_menu'=>$this->input->post('access'.$i)
            ];
            $this->db->insert('menu_access',$data);
            $this->db->delete('menu_access',['id_grup'=>$this->input->post('id'),'id_menu'=>NULL]);
        }
        redirect(base_url('administrator/access'));
    }
    public function keluarkan($data)
    {
        $dt['data']=$data;
        $this->load->view('administrator/access/tes',$dt);
    }
    
    public function new_grup()
    {
        $this->load->view('administrator/access/new_grup');
    }
    public function add_grup()
    {
        $data=
            [ 
            'nama_grup' 	=> htmlspecialchars($this->input->post('_nama',true)),
            'desc_grup'		=> htmlspecialchars($this->input->post('_desc',true)),
        ];
        $this->db->insert('menu_grup',$data);
        $this->session->set_flashdata('message',
        '<span class="hideMe alert alert-warning" role="alert">Penambahan Grup Berhasil !</span>');
        redirect('administrator/Access');
    }

    public function delete_grup($id)
    {
        $this->db->query("DELETE from menu_grup where id_grup='$id'");
        $this->session->set_flashdata('message',
        '<span class="hideMe alert alert-warning" role="alert">Penghapusan Grup Berhasil !</span>');
        redirect('administrator/Access');
    }
}



