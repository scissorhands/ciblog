<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model','users');
	}

	public function index()
	{
		$this->users->validate_user();
		$data = [
			"content" => "login",
			"title" => "Iniciar Sesion"
		];
		$this->load->view('template/loader', $data);
	}

	public function valid_user( $password, $user )
	{
		return $this->users->valid_user($password,$user);
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */