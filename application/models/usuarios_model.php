<?php

class Usuarios_model extends CI_Model {

    /**
     * 
     * @param type $usuario
     */
    public function salva($usuario) {

        $this->db->insert("usuarios", $usuario);
    }

    public function buscarTodos() {

        return $this->db->get("usuarios")->result_array();
        
    }

}
