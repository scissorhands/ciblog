<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model('Articles_model','articles');
		$articles = $this->articles->get_articles();
		//exit( json_encode($articles) );
		$data = [
			"content" => "home",
			"title" => "Home",
			"articles" => $articles
		];
		$this->load->view('template/loader', $data);
	}

	public function about()
	{
		$data = [
			"content" => "about",
			"title" => "About"
		];
		$this->load->view('template/loader', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */