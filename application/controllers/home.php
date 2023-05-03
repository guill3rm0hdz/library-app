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
		// Cargar el modelo para la inserción en la base de datos
		$this->load->model('Home_model');

		// Obtener los datos del formulario utilizando el método input() del helper form
		$datos_formulario = array(
			'name' => $this->input->post('nameUser'),
			'email' => $this->input->post('emailUser')
		);

    	// Insertar los datos en la base de datos utilizando el modelo
    	$id_usuario = $this->Home_model->insertUser($datos_formulario);
		
		// Mostrar un mensaje de éxito o error utilizando Flashdata
		if ($id_usuario) {
			$this->session->set_flashdata('mensaje', 'El usuario ha sido agregado correctamente.');
			//redirect('home/cargar_seccion/usuarios');
		} else {
			$this->session->set_flashdata('mensaje', 'Ha ocurrido un error al agregar el usuario.');
			//redirect('home/cargar_seccion/usuarios');
		}

	}
}
