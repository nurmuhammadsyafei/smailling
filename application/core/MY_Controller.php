<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
  function page($content, $data = NULL){
    /*
     * $data['headernya'] , $data['contentnya'] , $data['footernya']
     * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
     * */
        $data['headernya'] = $this->load->view('template/header', $data, TRUE);
        $data['contentnya'] = $this->load->view($content, $data, TRUE);
        $data['footernya'] = $this->load->view('template/footer', $data, TRUE);
        
        $this->load->view('template/index', $data);
    }
    function fe_page($content, $data = NULL){
    
      $data['headernya'] = $this->load->view('fe/template/header', $data, TRUE);
      $data['contentnya'] = $this->load->view($content, $data, TRUE);
      $data['footernya'] = $this->load->view('fe/template/footer', $data, TRUE);
      
      $this->load->view('fe/template/index', $data);
  }
}



