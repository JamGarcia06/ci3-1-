<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');

		$this->load->model('UserModel');
		$this->load->model('FoodModel');
		$this->load->model('ReservationModel');
	}


	public function index(){
    if(!$this->session->userdata('is_user_logged_in'))
    {
        $this->load->view('userLogin');
    }
    else
    {
        $data['foods'] = $this->FoodModel->getData();
        $data['food'] = null;

        $this->load->view('userPage', $data);
    }
}


	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->UserModel->login($email, $password);


		if($user)
		{
			$session_data = [
				'user_id' => $user->id,
				'email' => $user->email,
				'is_user_logged_in' => TRUE
			];

			$this->session->set_userdata($session_data);

			redirect('UserController/index');

		}
		else
		{
			$data['error'] = "Invalid login";
			$this->load->view('userLogin', $data);
		}
	}


	public function logout()
	{
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('is_user_logged_in');

    $this->session->sess_destroy();

    redirect('UserController/index');
	}

	public function reserve($food_id)
	{
		if(!$this->session->userdata('is_user_logged_in'))
		{
			redirect('UserController/index');
		}


		$data['foods'] = $this->FoodModel->getData();
		$data['food'] = $this->FoodModel->getFood($food_id);

		$this->load->view('userPage', $data);
	}


	public function saveReservation()
	{
		if(!$this->session->userdata('is_user_logged_in'))
		{
			redirect('UserController/index');
		}


		$data = [
			'user_id' => $this->session->userdata('user_id'),
			'food_id' => $this->input->post('food_id'),
			'quantity' => $this->input->post('quantity'),
			'status' => 'Pending',
			'reservation_time' => date('Y-m-d H:i:s')
		];


		if($this->ReservationModel->insertData($data))
		{
			redirect('UserController/myReservations');
		}
		else
		{
			show_error('Error saving reservation');
		}
	}


	public function myReservations()
	{
		if(!$this->session->userdata('is_user_logged_in'))
		{
			redirect('UserController/index');
		}


		$user_id = $this->session->userdata('user_id');

		$data['reservations'] =
		$this->ReservationModel->getUserReservations($user_id);

		$this->load->view('myReservations', $data);
	}

}
?>