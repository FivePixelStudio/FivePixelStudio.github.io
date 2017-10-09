<?php

class Usuario_model extends CI_Model {

    private $tabla;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->tabla  = 'gp_usuarios';
    }

    public function alta($data)
    {
        return $this->db->insert($this->tabla, $data);
    }

    public function modifica($data, $id)
    {

        $this->db->where($this->tabla.'.id', $id);
        return $this->db->update($this->tabla, $data);
    }

    public function obtener($id)
    {
        $this->db->select($this->tabla.'.*');
        $this->db->from($this->tabla);
        $this->db->where($this->tabla.'.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function validar_usuario($usuario)
    {
        $this->db->select($this->tabla.'.*');
        $this->db->from($this->tabla);
        $this->db->where($this->tabla.'.usuario', $usuario);
        $query = $this->db->get();
        return $query->row();
    }

  

    public function validar_email($email)
    {
        $this->db->select($this->tabla.'.*');
        $this->db->from($this->tabla);
        $this->db->where($this->tabla.'.email', $email);
        $query = $this->db->get();
        return $query->row();

    }
    
    public function login($usuario, $password)
    {
        $this->db->select($this->tabla.'.*');
        $this->db->from($this->tabla);
        $this->db->where($this->tabla.'.usuario', $usuario);
        $this->db->where($this->tabla.'.password', $password);
        $query = $this->db->get();
        return $query->row();

    }

    public function get_id($usuario)
    {
        $this->db->select($this->tabla.'.id');
        $this->db->from($this->tabla);
        $this->db->where($this->tabla.'.usuario', $usuario);
        $query = $this->db->get();
        

        return $query->row();
    }










}
