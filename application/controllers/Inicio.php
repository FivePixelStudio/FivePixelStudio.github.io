<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		$this->load->view('plantillas/plantilla_header');
		$this->load->view('inicio');
		$this->load->view('plantillas/plantilla_footer');
	}
	
}
