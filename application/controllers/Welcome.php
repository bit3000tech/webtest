<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->model('Ubicacion_class','ubicacion',TRUE);
		$this->ubicacion->getLast();
		$data['ubicacion'] = $this->ubicacion;
		$this->load->view('welcome_message',$data);
	}
}
