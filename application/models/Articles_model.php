<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles_model extends CI_Model {
	
	public function validate_article()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('author', 'Autor', 'required|min_length[4]');
		$this->form_validation->set_rules('text', 'Texto', 'required');
		if( $this->form_validation->run() ){
			$data=[
				"author" => $this->input->post("author"),
				"text" => $this->input->post("text")
			];
			$this->insert_article($data);
			redirect('home');
		}
	}

	public function insert_article($data)
	{
		$this->db->insert("entries",$data);
	}

	public function get_articles()
	{
		$query = $this->db->get("entries");
		return $query->result();
	}

}

/* End of file Articles_model.php */
/* Location: ./application/models/Articles_model.php */