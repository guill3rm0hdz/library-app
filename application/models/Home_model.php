<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

   public function __construct() {
      parent::__construct();
      $this->load->database(); 
      // Carga la biblioteca de la base de datos
      /*if ($this->db->conn_id) {
            echo "La conexión a la base de datos se ha establecido correctamente";
          } else {
            echo "No se pudo establecer la conexión a la base de datos";
          }
      */
   }

	// Condsulta universal para traer cualquier tabla depende de la variable $seccion
  public function get_data($section){
    $this->db->select('*');
    $this->db->from($section);
    $query = $this->db->get();
    return $query->result();
  }

  //**************************/
	// CRUD a la bases de datos "Modelo"
	//**************************/
  public function add_data($data, $section) {
    var_dump($section);
      // Insertar los datos en la tabla 'usuarios'
      $this->db->insert($section, $data);
  }

  public function del_data($id, $section){
      $this->db->where('id', $id);
      $this->db->delete($section);
  }

  public function update_data($id, $data, $section){
    $this->db->where('id', $id);
    $this->db->update($section, $data);

  }
  //**************************/
	// FIN CRUD a la bases de datos "Modelo"
	//**************************/

}
?>