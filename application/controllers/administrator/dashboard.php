<?php

class dashboard extends CI_controller{

	public function index()
	{
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/dashboard');
		$this->load->view('templates_administrator/footer');
	}
}