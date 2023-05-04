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

	// Condsulta universal para traer registros de tabla e implementarlo en ajax
	public function get_data_ajax($section){
		$result = $this->Home_model->get_data($section);
		echo json_encode($result);
	}



	//**************************/
	// CRUD a la bases de datos de Usuarios "Contrlador"
	
	public function add_user(){
	// Agrega los datos del formulario
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
	





	//**************************/
	// CRUD a la bases de datos de Libros "Contrlador"
	
	public function add_books(){

		// Obtener los datos del formulario utilizando el método input() del helper form
		$date = $this->revert_date($this->input->post('fechaBook'));

		$data = array(
			'name' => $this->input->post('nameBook'),
			'author' => $this->input->post('authorBook'),
			'published_date' => $date,
			'category' => json_encode($this->input->post('categoryBook')),
			'user' => $this->input->post('userBook')
		);
		// Insertar los datos en la base de datos utilizando el modelo
		$this->Home_model->add_data($data, 'books');
		redirect('home/section_load/books/');
	}


	// Elimina el registro dinamicamente
	public function del_book($id){
		$this->Home_model->del_data($id, 'books');
		redirect('home/section_load/books');

	}

		// Actualiza el registro dinamicamente
		public function update_book($id){
			$date = $this->revert_date($this->input->post('fechaBook'));
			var_dump($date);
			$data = array(
				'name' => $this->input->post('nameBook'),
				'author' => $this->input->post('authorBook'),
				'published_date' => $date,
				'category' => json_encode($this->input->post('categoryBook')),
				'user' => $this->input->post('userBook')
			);
			var_dump($data);
			$this->Home_model->update_data($id, $data, 'books');
			redirect('home/section_load/books');
		}


		//**************************/
		// Funcion que revierte el orden de la fecha para que pueda ser regstrada en la BD
		public function revert_date($date_input){
			$date_array = array_reverse(explode('/', $date_input));
			$date_format = implode('/', $date_array);
			return $date_format;
		}



}
