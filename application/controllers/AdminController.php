<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('AdminModel');
	}

	public function index()
	{
		$this->load->view('adminLogin');
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$admin = $this->AdminModel->login($email, $password);

		if($admin){
			$this->load->view('adminPage');
		}else{
			$data['error'] = 'Invalid email or password';
			$this->load->view('adminLogin', $data);
		}
	}
}

?>