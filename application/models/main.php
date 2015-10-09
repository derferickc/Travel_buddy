<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Model {

	public function register($post)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'trim|min_length[3]|required');
		$this->form_validation->set_rules('username', 'username', 'trim|min_length[3]|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|matches[confirm_password]|required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');	
		
		if($this->form_validation->run() ===FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			return false;		
		}
		else
		{
			$query = "INSERT INTO users(name, username, password, created_at, updated_at)
				VALUES(?,?,?,NOW(), NOW())";
			$values = array($post['name'], $post['username'], $post['password']);
			$this->db->query($query, $values);
			$this->session->set_flashdata('success', 'Thanks for registering!');

		}
	}

	public function login($post)
	{	
		$query = "SELECT * FROM users WHERE username =? AND password = ?";
		$values = array($post['username'], $post['password']);
		return $this->db->query($query, $values)->row_array();
	}

	public function add_trip($post)
	{
		$query = "INSERT INTO trips(destination, description, travel_from, travel_to, created_at, updated_at)
				VALUES(?,?,?,?, NOW(), NOW())";
				$poster_id = $this->session->userdata['user']['id'];
		$values = array($post['destination'], $post['description'], $post['travel_from'], $post['travel_to']);
		$this->db->query($query, $values);
		$trips_id = $this->db->insert_id();

		$query = "INSERT INTO party(user_id, trip_id)
				VALUES(?,?)";
				$poster_id = $this->session->userdata['user']['id'];
		$values = array($poster_id, $trips_id);
		return $this->db->query($query, $values);
	}

	public function fetch_all_trips($id)
	{
		$query = "SELECT users.name, trips.destination, trips.travel_from, trips.travel_to, trips.id
		FROM party
		JOIN users ON users.id = party.user_id
		JOIN trips ON trips.id = party.trip_id
		WHERE party.trip_id
		-- expression proceeded does not have any of the values present in the arguments
		NOT IN
		-- subquery run first, and compared to the 
       (SELECT trips.id FROM party 
 	   JOIN users ON users.id = party.user_id
 	   JOIN trips ON trips.id = party.trip_id
       WHERE users.id = '{$id}')
	   GROUP BY party.trip_id";
		return $this->db->query($query)->result_array();
	}

	public function fetch_my_trips($id)
	{
		$query = "SELECT trips.destination, trips.travel_from, trips.travel_to, trips.description, trips.id
		FROM party
		JOIN users ON users.id = party.user_id
		JOIN trips ON trips.id = party.trip_id
		WHERE party.user_id = {$id}";
		return $this->db->query($query)->result_array();
	}

	public function fetch_trip_by_id($id)
	{
		$query = "SELECT trips.destination, trips.travel_from, trips.travel_to, trips.description, trips.id, users.name
		FROM party
		JOIN users ON users.id = party.user_id
		JOIN trips ON trips.id = party.trip_id
		WHERE trip_id = {$id}";
		return $this->db->query($query)->row_array();
	}

	public function fetch_trip_by_idzzz($id)
	{
		$query = "SELECT trips.destination, trips.travel_from, trips.travel_to, trips.description, trips.id, users.name
		FROM party
		JOIN users ON users.id = party.user_id
		JOIN trips ON trips.id = party.trip_id
		WHERE trip_id = {$id}";
		return $this->db->query($query)->result_array();
	}

	public function add_to_trip($id)
	{
		$query = "INSERT INTO party(user_id, trip_id)
				VALUES(?,?)";
				$poster_id = $this->session->userdata['user']['id'];
		$values = array($poster_id, $id);
		return $this->db->query($query, $values);
	}
}	