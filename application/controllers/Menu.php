<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	function __construct(){
	    parent::__construct();
	    $this->load->model('M_adminmenu');
    }

	public function index()
	{
		$data = $this->M_adminmenu->getMenu();
		$this->load->view('home',array('data' => $data));
	}
    
    public function admin()
	{
		$this->load->view('login');
	}
		
	}