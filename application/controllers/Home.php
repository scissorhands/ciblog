<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if( !$this->session->userdata('is_logged_in') ){
			redirect('/');
		}
	}

	public function index()
	{
		$this->load->model('Articles_model','articles');
		$articles = $this->articles->get_articles();
		$data = [
			"content" => "home",
			"title" => "Home",
			"articles" => $articles,
			"usuario" => $this->session->userdata('usuario'),
			"tipo" => $this->session->userdata('tipo')
		];
		$this->load->view('template/loader', $data);
	}

	public function about()
	{
		$user = $tipo = null;
		if( $this->session->userdata('user')!==null ){
			$user = $this->session->userdata('user');
		}
		if( $this->session->userdata('tipo')!==null ){
			$tipo = $this->session->userdata('tipo');
		}
		$data = [
			"content" => "about",
			"title" => "About",
			"usuario" => $user, 
			"tipo" => $tipo
		];
		$this->load->view('template/loader', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */