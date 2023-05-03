<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

   public function __construct() {
      parent::__construct();
      $this->load->database(); // Carga la biblioteca de la base de datos
      /*if ($this->db->conn_id) {
        echo "La conexión a la base de datos se ha establecido correctamente";
      } else {
        echo "No se pudo establecer la conexión a la base de datos";
      }*/
   }

    public function insertUser($datos) {



      var_dump($datos);
      
      // Insertar los datos en la tabla 'usuarios'
      $this->db->insert('users', $datos);

      // Verificar si la inserción fue exitosa
      if ($this->db->affected_rows() > 0) {
        return true; // Retorna verdadero si la inserción fue exitosa
      } else {
        return false; // Retorna falso si hubo un error en la inserción
      }
  }
}
?>