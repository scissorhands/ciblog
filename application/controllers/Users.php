<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model','users');
		if( !$this->session->userdata('is_logged_in') ){
			redirect('/');
		}
	}

	public function add()
	{
		$this->users->validate_user_to_insert();
		$data = [
			"content" => "add_user",
			"title" => "Agregar usuario"
		];
		$this->load->view('template/loader', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}

/* End of file Articles.php */
/* Location: ./application/controllers/Articles.php */