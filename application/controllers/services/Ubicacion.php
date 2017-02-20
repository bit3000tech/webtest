<?php

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Ubicacion extends REST_Controller
{
    public function index_get()
    {
        $this->load->model('Uciacion_class','ubicacion',TRUE);
        $this->response($this->ubicacion->listado());
    }

    public function index_post()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);

        $this->load->model('Ubicacion_class','ubicacion',TRUE);
        $this->ubicacion->latitud = $obj->latitud;
        $this->ubicacion->longitud = $obj->longitud;
        $this->ubicacion->fecha = $obj->fecha;
        $this->ubicacion->guardar();
        $this->response($this->ubicacion, 201);
    }
}