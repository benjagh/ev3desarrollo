<?php
/**
 * Created by PhpStorm.
 * User: bmmah
 * Date: 1/25/2019
 * Time: 11:32 PM
 */

class ShowForm extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('CommonModel');
	} // Load Common Model

	public function tipo_de_producto($msg) {
		$data['page_title'] = "Tipo de Producto";
		if ($this->session->userdata('username') != '') {
			$data['all_value'] = $this->CommonModel->get_all_info('tipo_de_producto');
			$data['msg'] = $msg;
			$this->load->view("create_option/header", $data);
			$this->load->view("create_option/tipo_de_producto",$data);
			$this->load->view("create_option/footer");
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
	public function marca($msg) {
		$data['page_title'] = "Marca";

		if ($this->session->userdata('username') != '') {
			$data['all_value'] = $this->CommonModel->get_all_info('marca');
			$data['msg'] = $msg;
			$this->load->view("create_option/header", $data);
			$this->load->view("create_option/marca",$data);
			$this->load->view("create_option/footer");
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
	public function producto($msg) {
		$data['page_title'] = "Producto";
		if ($this->session->userdata('username') != '') {
			$data['all_generic'] = $this->CommonModel->get_all_info('marca');
			$data['all_value'] = $this->CommonModel->get_all_info('producto');
			$data['msg'] = $msg;
			$this->load->view("create_option/header", $data);
			$this->load->view("create_option/producto",$data);
			$this->load->view("create_option/footer");
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
	
	
	public function proveedor($msg) {
		$data['page_title'] = "Proveedor";
		if ($this->session->userdata('username') != '') {
			$data['all_value'] = $this->CommonModel->get_all_info('proveedor');
			$data['msg'] = $msg;
			$this->load->view("create_option/header", $data);
			$this->load->view("create_option/proveedor",$data);
			$this->load->view("create_option/footer");
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}

	//Inventory Start
	public function info_producto($msg) {
		$data['page_title'] = "Informacion de Producto";
		if ($this->session->userdata('username') != '') {
		$data['all_value'] = $this->CommonModel->get_all_info('informacion_de_compra');
		$data['all_medicine'] = $this->CommonModel->get_all_info('producto');
		$data['all_generic'] = $this->CommonModel->get_all_info('marca');
		$data['all_presen'] = $this->CommonModel->get_all_info('tipo_de_producto');
		$data['all_sup'] = $this->CommonModel->get_all_info('proveedor');
		$data['msg'] = $msg;

		// Getting sold products quantity
		$med_ids = array_column($data['all_value'],'nombre_producto_id');
		$data['sold'] = [];
		$med_ids = array_filter($med_ids);
		// print_r($med_ids);exit;
		if(count($med_ids) > 0){
			$sql = "SELECT nombre_producto_id,(SUM(cantidad)) as sold FROM `producto_ventas` where nombre_producto_id in (".(implode(',', $med_ids)).") group by nombre_producto_id";
			$data['sold'] = $this->CommonModel->get_array_column($sql,'sold','nombre_producto_id');
			// print_r($data['sold']);exit;
		}
		
		$this->load->view("header", $data);
		$this->load->view("inventory/info_producto",$data);
		$this->load->view("footer");
	} else {
		$data['wrong_msg'] = "";
		$this->load->view('Main/login', $data);
	}
}

	public function informacion_de_compra($id) {
		$data['page_title'] = "Informacion de Compra";
		if ($this->session->userdata('username') != '') {
			$data['all_value'] = $this->CommonModel->get_all_info('informacion_de_compra');
			$data['all_medicine'] = $this->CommonModel->get_all_info('producto');
			$data['all_generic'] = $this->CommonModel->get_all_info('marca');
			$data['all_presen'] = $this->CommonModel->get_all_info('tipo_de_producto');
			$data['all_sup'] = $this->CommonModel->get_all_info('proveedor');
	    	$data['one_value'] = $this->CommonModel->get_allinfo_byid('informacion_de_compra', 'compra_id', $id);

			$this->load->view("header", $data);
			$this->load->view("inventory/informacion_de_compra",$data);
			$this->load->view("footer");
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}

	public function detalle_compra($msg) {
		$data['page_title'] = "Detalle Compra";
		if ($this->session->userdata('username') != '') {
			$data['all_value'] = $this->CommonModel->get_all_info('informacion_de_compra');
			$data['all_medicine'] = $this->CommonModel->get_all_info('producto');
			$data['all_sup'] = $this->CommonModel->get_all_info('proveedor');
			$data['msg'] = $msg;
			$this->load->view("header", $data);
			$this->load->view("inventory/detalle_compra",$data);
			$this->load->view("footer");
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}

	public function pago_proveedores($msg) {
		$data['page_title'] = "Pago Proveedores";
		if ($this->session->userdata('username') != '' || $this->session->userdata('username') != 'staff' ) {
			$data['all_value'] = $this->CommonModel->get_all_info('informacion_de_compra');
			$data['all_medicine'] = $this->CommonModel->get_all_info('producto');
			$data['all_sup'] = $this->CommonModel->get_all_info('proveedor');
			$data['msg'] = $msg;
			$this->load->view("header", $data);
			$this->load->view("inventory/pago_proveedores",$data);
			$this->load->view("footer");
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
// Inventory END

//Sales Start
	public function venta_productos($msg) {
		$data['page_title'] = "Venta Productos";
		if ($this->session->userdata('username') != '') {
		//	$data['all_value'] = $this->CommonModel->get_all_info_not_null('informacion_de_compra','nombre_producto');
		    $data['all_value'] = $this->CommonModel->get_all_info('informacion_de_compra');
			$data['all_medicine'] = $this->CommonModel->get_all_info('producto');
			$data['all_sup'] = $this->CommonModel->get_all_info('proveedor');
			$data['msg'] = $msg;
			$this->load->view("header", $data);
			$this->load->view("sales/sell_product",$data);
			$this->load->view("footer");
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
	public function declaracion_ventas($msg)
	{
		$data['page_title'] = "Declaracion Ventas";
		if ($this->session->userdata('username') != '' || $this->session->userdata('username') != 'staff' ) {
			$data['all_value'] = $this->CommonModel->get_all_info('producto_ventas');
			$data['msg'] = $msg;
			$this->load->view("header", $data);
			$this->load->view("sales/declaracion_ventas", $data);
			$this->load->view("footer");
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);

		}
	}
	// Account
		public function perdidas($msg)
		{
			if ($this->session->userdata('username') != '') {
				$data['all_value'] = $this->CommonModel->get_all_info('informacion_de_compra');
				$data['msg'] = $msg;
				$this->load->view("header", $data);
				$this->load->view("account/perdidas", $data);
				$this->load->view("footer");
			} else {
				$data['wrong_msg'] = "";
				$this->load->view('Main/login', $data);
			}
		}
		// Manage Staff
	public function adm_usuario($msg)
	{
		if ($this->session->userdata('username') != '') {
			$data['all_value'] = $this->CommonModel->get_all_info('staff');
			$data['msg'] = $msg;
			$this->load->view("header", $data);
			$this->load->view("adm_usuario", $data);
			$this->load->view("footer");
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
	public function edit_staff_info($id)
	{
		if ($this->session->userdata('username') != '') {
			$data['all_value'] = $this->CommonModel->get_all_info('staff');
			$data['one_value'] = $this->CommonModel->get_allinfo_byid('staff', 'id', $id);
			//$data['msg'] = $msg;
			$this->load->view("header", $data);
			$this->load->view("edit_adm_usuario", $data);
			$this->load->view("footer");
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}

			}  // end
