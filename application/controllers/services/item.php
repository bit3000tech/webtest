<?php

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class item extends REST_Controller
{
    public function index_get()
    {
        $this->load->model('Item_class','item',TRUE);
        $this->response($this->item->listado());
    }

    public function index_post()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);

        $this->load->model('Item_class','item',TRUE);
        $this->item->nombre = $obj->nombre;
        $this->item->detalle = $obj->detalle;
        $this->item->guardar();
        $this->response($this->item, 201);
    }
}