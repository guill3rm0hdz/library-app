<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['scripts'] = $this->load->view('plantilla/scripts_js', '', true);
		$data['footer'] = $this->load->view('plantilla/footer', '', true);
		
		$this->load->view('plantilla/head');
		$this->load->view('home', $data);
	}

	public function cargar_seccion($section) 
	{

		$section_data['title'] = strtoupper($section);

		$data['section'] = $this->load->view('bibliotecario/'.$section, $section_data, true);
		$data['scripts'] = $this->load->view('plantilla/scripts_js', '', true);
		$data['footer'] = $this->load->view('plantilla/footer', '', true);
		
		$this->load->view('plantilla/head');
		$this->load->view('home', $data);		
        
    }

	public function add_user_bibliotecario(){
		var_dump("aqui esta el pedo");


	}
}
