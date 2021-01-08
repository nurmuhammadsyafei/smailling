<?php

class My_model extends CI_Model{

    public function kodeadmin(){
        $this->db->select('RIGHT(auth_user.auth_id,2) as auth_id', FALSE);
        $this->db->order_by('auth_id','DESC');    
        $this->db->limit(1);    
    $query = $this->db->get('auth_user');  //cek dulu apakah ada sudah ada kode di tabel.    
    if($query->num_rows() <> 0){      
            //cek kode jika telah tersedia    
        $data = $query->row();      
        $kode = intval($data->auth_id) + 1; 
    } 
    else{      
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $tgl=date('his'); 
        $kodetampil = "users".$tgl;  //format kode
        return $kodetampil;  
    }
    
    public function get_user()
    {
        $this->db->join('menu_grup l','l.id_grup = auth_user.auth_level' ,'left');
        $this->db->join('status s','s.id = auth_user.auth_is_active' ,'left');
        return $this->db->get('auth_user')->result_array();
    }
    public function get_menu()
    {
        return $this->db->get('menu')->result_array();
    }

//---------------------------------------G R U P---------------------------------------------
public function get_grup()
{
    return $this->db->get('menu_grup')->result_array();
}
//-------------------------------------E N D _ G R U P---------------------------------------
//---------------------------------------A C C E S S-----------------------------------------
    public function get_access()
    {
        $this->db->join('menu_grup k','k.id_grup = menu_access.id_grup' ,'left');
        return $this->db->get('menu_access')->result_array();
    }
    // public function get_total_access($id)
	// 	{
	// 		$query = $this->db->get_where('menu_access',['id_grup'=>$id])num_rows();
	// 		if($query->num_rows()>0)
	// 		{
	// 			return $query->num_rows();
	// 		}
	// 		else
	// 		{
	// 			return 0;
	// 		}
	// 	}
//-----------------------------------E N D _ A C C E S S-------------------------------------
}