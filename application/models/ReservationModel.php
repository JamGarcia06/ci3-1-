<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReservationModel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function insertData($data){
		return $this->db->insert('reservation', $data);
	}

	public function getData(){
		return $this->db->get('reservation')->result();
	}

	public function getUserReservations($user_id)
	{
	$this->db->select('reservation.*, foods.food_name');
	$this->db->from('reservation');
	$this->db->join('foods', 'foods.id = reservation.food_id');
	$this->db->where('user_id', $user_id);

	return $this->db->get()->result();
	}
}

?>