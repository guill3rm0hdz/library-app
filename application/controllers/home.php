<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
			// Cargar el modelo para la inserción en la base de datos
			$this->load->model('Home_model');
	 }

	// Carga la vista principal del dashboard
	public function index()
	{
		$data['scripts'] = $this->load->view('plantilla/scripts_js', '', true);
		$data['footer'] = $this->load->view('plantilla/footer', '', true);
		$this->load->view('plantilla/head');
		$this->load->view('home', $data);
	}

	// Carga cada seccion dinamicamente
	public function section_load($section) 
	{
		$section_data['title'] = strtoupper($section);
		$section_data['table'] = $this->get_data($section);
		$data['section'] = $this->load->view('bibliotecario/'.$section, $section_data, true);
		$data['scripts'] = $this->load->view('plantilla/scripts_js', '', true);
		$data['footer'] = $this->load->view('plantilla/footer', '', true);
		$this->load->view('plantilla/head');
		$this->load->view('home', $data);		 
    }

	// Condsulta universal para traer cualquier tabla depende de la variable $seccion
	public function get_data($section){
		$result = $this->Home_model->get_data($section);
		return $result;
	}


	//**************************/
	// CRUD a la bases de datos de Usuarios "Contrlador"
	
	public function add_user(){
		// Obtener los datos del formulario utilizando el método input() del helper form
		$data = array(
			'name' => $this->input->post('nameUser'),
			'email' => $this->input->post('emailUser')
		);
		// Insertar los datos en la base de datos utilizando el modelo
		$this->Home_model->add_data($data, 'users');
		redirect('home/section_load/users/');
	}
	
	// Elimina el registro dinamicamente
	public function del_user($id){
		$this->Home_model->del_data($id, 'users');
		redirect('home/section_load/users');

	}

	// Actualiza el registro dinamicamente
	public function update_user($id){
		$data = array(
			'name' => $this->input->post('nameUser'),
			'email' => $this->input->post('emailUser')
		);

		$this->Home_model->update_data($id, $data, 'users');
		redirect('home/section_load/users');
	}

	// FIN CRUD a la bases de datos de Usuarios "Contrlador"
	//**************************/


	//**************************/
	// CRUD a la bases de datos de Categories "Contrlador"
	
	public function add_categories(){
		// Obtener los datos del formulario utilizando el método input() del helper form
		$data = array(
			'name' => $this->input->post('nameCategories'),
			'description' => $this->input->post('descriptionCategories')
		);
		// Insertar los datos en la base de datos utilizando el modelo
		$this->Home_model->add_data($data, 'categories');
		redirect('home/section_load/categories/');
	}

	// Elimina el registro dinamicamente
	public function del_categories($id){
		$this->Home_model->del_data($id, 'categories');
		redirect('home/section_load/categories');

	}
	
		// Actualiza el registro dinamicamente
		public function update_categories($id){
			$data = array(
				'name' => $this->input->post('nameCategories'),
				'description' => $this->input->post('descriptionCategories')
			);
	
			$this->Home_model->update_data($id, $data, 'categories');
			redirect('home/section_load/categories');
		}
	

	// FIN CRUD a la bases de datos de Categories "Contrlador"
	//**************************/


}
