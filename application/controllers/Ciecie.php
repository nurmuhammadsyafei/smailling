

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciecie extends CI_Controller		
{
	// CONSTRUC-------------------- Welcome CONTROLLER
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}
	// CONSTRUC-------------------- Welcome CONTROLLER
	
    
    
	// 
	public function index()
	{
        $this->load->view('ciecie');
	}
	
}



?>