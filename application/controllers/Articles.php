<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Articles_model','articles');
	}

	public function add()
	{
//		exit(json_encode($this->input->post()));
		$this->articles->validate_article();
		$data = [
			"content" => "add_article",
			"title" => "Agregar artículo"
		];
		$this->load->view('template/loader', $data);
	}

}

/* End of file Articles.php */
/* Location: ./application/controllers/Articles.php */