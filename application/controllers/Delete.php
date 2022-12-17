<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Delete extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CommonModel');
	}

	public function tipo_de_producto($id) {
		if ($this->session->userdata('username') != '') {
			$this->CommonModel->delete_info('tipo_producto_id', $id, 'tipo_de_producto');
			redirect('ShowForm/tipo_de_producto/borrar', 'refresh');
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
	public function marca($id) {
		if ($this->session->userdata('username') != '') {
			$this->CommonModel->delete_info('marca_id', $id, 'marca');
			redirect('ShowForm/marca/borrar', 'refresh');
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
	public function nombre_producto($id) {
		if ($this->session->userdata('username') != '') {
			$this->CommonModel->delete_info('nombre_producto_id', $id, 'producto');
			redirect('ShowForm/producto/borrar', 'refresh');
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
	
	
	public function supplier($id) {
		if ($this->session->userdata('username') != '') {
			$this->CommonModel->delete_info('proveedor_id', $id, 'proveedor');
			redirect('ShowForm/proveedor/borrar', 'refresh');
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
	//Inventory
	public function info_producto($id) {
		if ($this->session->userdata('username') != '') {
			$this->CommonModel->delete_info('compra_id', $id, 'informacion_de_compra');
			redirect('ShowForm/info_producto/borrar', 'refresh');
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
	// Staff Manage
	public function adm_usuario($id) {
		if ($this->session->userdata('username') != '') {
			$this->CommonModel->delete_info('id', $id, 'staff');
			redirect('ShowForm/adm_usuario/borrar', 'refresh');
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
}
