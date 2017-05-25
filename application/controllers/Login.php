<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_login');
    }

public function login()  
    {
       
        $username = $this->input->post('user');
        $password = sha1($this->input->post('pass')); 
        $isLogin = $this->M_login->login_authen($username, $password);
        if ($isLogin == TRUE)
        {  
            //declaring session  
            $this->session->set_userdata(array('user'=>$username));
            redirect('Admin_menu/load'); 
            //$this->load->view('login1');
        }else{
            redirect('Menu/admin');
        }  
        
    }  

public function logout()  
    {  
        //removing session  
        $this->session->unset_userdata('user');  
        redirect('Menu/admin');
    }

}
