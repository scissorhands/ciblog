<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(  APPPATH.'libraries/phpass-0.1/PasswordHash.php');

class Users_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	
	public function validate_user()
	{
		$this->form_validation->set_rules('user', 'usuario', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'contraseña', 'required|callback_valid_user['.$this->input->post('user').']');
		if( $this->form_validation->run() ){
			$user = $this->users->get_user( $this->input->post("user") );
			$this->session->set_userdata( [
				'is_logged_in' => true,
				'user' => $user->id,
				'first_name' => $user->first_name,
				'last_name' => $user->last_name,
				'type' => $user->is_admin
			] );
			redirect('home');
		}
	}

	public function get_user($email)
	{
		$query  =  $this->db->where("email",$email)
		->get("users");
		return $query->result()? $query->row() : null;
	}

	public function validate_user_to_insert()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'Nombre', 'required');
		$this->form_validation->set_rules('last_name', 'Apellido', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]');
		if( $this->form_validation->run() ){
			$hasher = new PasswordHash(HASH_STRENGTH, HASH_PORTABLE);
			$hashedPass = $hasher->HashPassword( $this->input->post("password") );
			$data=[
				"first_name" => $this->input->post("first_name"),
				"last_name" => $this->input->post("last_name"),
				"email" => $this->input->post("email"),
				"password" => $hashedPass,
				"is_admin" => false
			];
			$this->insert_user($data);
			redirect('home');
		}
	}

	public function insert_user($data)
	{
		$this->db->insert("users",$data);
	}

	public function valid_user( $password, $user )
	{
		$user = $this->users->get_user($user);
		if( $user ){
			$hasher = new PasswordHash(HASH_STRENGTH, HASH_PORTABLE);
			$hashedPass = $hasher->HashPassword( $password );
			if( !$hasher->checkPassword($password,$user->password) ){
				$this->form_validation->set_message('valid_user', 'La contraseña es incorrecta, favor de verificar.');
				return false;
			}
		} else{
			$this->form_validation->set_message('valid_user', 'El usuario no existe en la base de datos.');
			return false;
		}
		return true;
	}

}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */