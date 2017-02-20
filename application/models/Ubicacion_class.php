<?php

class Ubicacion_class extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function initialize($datos = NULL)
    {
        if($datos != NULL)
        {
            foreach($datos as $key => $value)$this->$key = $value;
        }
        else
        {
            $this->latitud = null;
            $this->longitud = null;
            $this->fecha = null;
        }
    }

    function guardar()
    {
        if(!isset($this->id) || $this->id == NULL)
        {
            unset($this->id);
            $this->db->query($this->db->insert_string('ubicacion', (array)$this));
            $this->id = $this->db->insert_id();
        }
        else
        {
            $id = $this->id;
            unset($this->id);
            $where = "id = ".$id;
            $this->db->query($this->db->update_string('ubicacion', (array)$this, $where));
            $this->id = $id;
        }
    }

    function eliminar($id)
    {
        $this->db->query("delete from ubicacion where id = ?",array($id));
    }

    public function consultar($id)
    {
        $query = $this->db->query("select * from ubicacion where id = ?", array($id));
        $datos = $query->result();
        $this->initialize($datos[0]);
    }

    function listado()
    {
        $sql="select * from ubicacion";
        $query= $this->db->query($sql);
        return $query->result();
    }

    public function getLast()
    {
        $query = $this->db->query("select * from ubicacion order by id desc limit 1");
        $datos = $query->result();
        $this->initialize($datos[0]);
    }
}
?>