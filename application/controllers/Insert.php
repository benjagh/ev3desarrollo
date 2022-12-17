<?php
/**
 * Created by PhpStorm.
 * User: bmmah
 * Date: 1/25/2019
 * Time: 11:39 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Insert extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('CommonModel');
	}

	// Create Option Start
	public function tipo_de_producto() {
		if ($this->session->userdata('username') != '') { //Check Login
			$this->form_validation->set_rules('tipo_de_producto', 'Medicine Presentation', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				redirect('ShowForm/tipo_de_producto/empty', 'refresh');
			} else {
				$tipo_de_producto = $this->input->post('tipo_de_producto');
				$insert_data = array(
					'tipo_de_producto' => $tipo_de_producto
				);
				$this->CommonModel->insert_data('tipo_de_producto', $insert_data); //insert data to table
				redirect('ShowForm/tipo_de_producto/created', 'refresh');
			}
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
	public function marca() {
		if ($this->session->userdata('username') != '') { //Check Login
			$this->form_validation->set_rules('marca', 'Generic Name', 'trim|required');// check form validation

			if ($this->form_validation->run() == FALSE) {
				redirect('ShowForm/marca/empty', 'refresh'); //If form not  validate
			} else {
				$marca = $this->input->post('marca');
				$insert_data = array(
					'marca' => $marca
				);
				$this->CommonModel->insert_data('marca', $insert_data); //insert data to table
				redirect('ShowForm/marca/created', 'refresh');
			}
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
	public function nombre_producto() {
		if ($this->session->userdata('username') != '') { //Check Login
			$this->form_validation->set_rules('marca', 'Generic Name', 'trim|required'); // check form validation
			$this->form_validation->set_rules('nombre_producto', 'Medicine Name', 'trim|required'); // check form validation
			if ($this->form_validation->run() == FALSE) {
				redirect('ShowForm/marca/empty', 'refresh'); //If form not  validate
			} else {
				$marca = $this->input->post('marca');
				$nombre_producto = $this->input->post('nombre_producto');
				$insert_data = array(
					'marca' => $marca,
					'nombre_producto' => $nombre_producto
				);
				$this->CommonModel->insert_data('producto', $insert_data); //insert data to table
				redirect('ShowForm/producto/created', 'refresh');
			}
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
	
	
	public function supplier() {
		if ($this->session->userdata('username') != '') { //Check Login
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required'); // check form validation

			if ($this->form_validation->run() == FALSE) {
				redirect('ShowForm/proveedor/empty', 'refresh'); //If form not  validate
			} else {

				$company_name= $this->input->post('company_name'); //get data from file to variable
				$telefono= $this->input->post('telefono');			 				//get data from file to variable
				$direccion= $this->input->post('direccion'); 						//get data from file to variable
				$deuda= $this->input->post('deuda'); 	//get data from file to variable
				$insert_data = array(
					'nombre_proveedor' => $company_name,//insert data to column
					'telefono' => $telefono,   						 //insert data to column
					'direccion' => $direccion,						//insert data to column
					'deuda' => $deuda	 //insert data to column
				);
				$this->CommonModel->insert_data('proveedor', $insert_data); 			//insert data to table
				redirect('ShowForm/proveedor/created', 'refresh'); 		//after inserting back to the page
			}
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
	// Create Option End
	public function info_producto() {
		if ($this->session->userdata('username') != '') { //Check Login
			$this->form_validation->set_rules('nombre_producto', 'Medicine Name', 'trim|required'); // check form validation

			if ($this->form_validation->run() == FALSE) {
				redirect('ShowForm/info_producto/empty', 'refresh'); //If form not  validate
			} else {

				$medicine= explode('#', $this->input->post('nombre_producto')); //get data from file to variable
				$nombre_producto = $medicine[0];
				$nombre_producto_id = $medicine[1];

				//$generic= $this->input->post('generic');			 				//get data from file to variable
				$generic= explode('#', $this->input->post('generic')); //get data from file to variable
				$marca = $generic[0];
				$marca_id = $generic[1];

				//$presentation= $this->input->post('presentation'); 						//get data from file to variable
				$presentation= explode('#', $this->input->post('presentation')); //get data from file to variable
				$presentation_name = $presentation[0];
				$presentation_id = $presentation[1];

				//$supplier= $this->input->post('supplier'); 	//get data from file to variable
				$supplier= explode('#', $this->input->post('supplier')); //get data from file to variable
				$nombre_proveedor = $supplier[0];
				$supplier__id = $supplier[1];

				$cantidad= $this->input->post('cantidad'); 	//get data from file to variable
				$precio_unitario= $this->input->post('precio_unitario'); 	//get data from file to variable
				$precio_compra= $this->input->post('precio_compra'); 	//get data from file to variable
				$precio_venta_unitario= $this->input->post('precio_venta_unitario'); 	//get data from file to variable
				$unidad= $this->input->post('unidad'); 	//get data from file to variable
				$compra_pagada= $this->input->post('compra_pagada'); 	//get data from file to variable
				$compra_vencida= $this->input->post('compra_vencida'); 	//get data from file to variable
				$ex_date= $this->input->post('ex_date'); 	//get data from file to variable
				$date = $this->input->post('date');
				$insert_data = array(
					'date' => $date,
					'nombre_producto' => $nombre_producto,//insert data to column
					'nombre_producto_id' => $nombre_producto_id,//insert data to column
					'marca' => $marca,   						 //insert data to column
					'marca_id' => $marca_id,
					'date'=>$date,
					'tipo_de_producto' => $presentation_name,						//insert data to column
					'tipo_producto_id' => $presentation_id,
					'nombre_proveedor' => $nombre_proveedor,   						 //insert data to column
					'proveedor_id'=>$supplier__id,
					'cantidad' => $cantidad,
					'informe_detallado' => 'Purchase Medicine',
					'precio_unitario' => $precio_unitario,   						 //insert data to column
					'precio_compra' => $precio_compra,
					'precio_venta_unitario' => $precio_venta_unitario,//insert data to column
					'unidad' => $unidad,   						 //insert data to column
					'compra_pagada' => $compra_pagada,
					'compra_vencida' => $compra_vencida,
					'fecha_caducidad' => $ex_date	 //insert data to column
				);
				$this->CommonModel->insert_data('informacion_de_compra', $insert_data); 			//insert data to table
				redirect('ShowForm/info_producto/created', 'refresh'); 		//after inserting back to the page
			}
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
	public function edit_info_producto($compra_id) {
		if ($this->session->userdata('username') != '') { //Check Login
			$this->form_validation->set_rules('nombre_producto', 'Medicine Name', 'trim|required'); // check form validation

			if ($this->form_validation->run() == FALSE) {
				redirect('ShowForm/info_producto/empty', 'refresh'); //If form not  validate
			} else {

				$medicine= explode('###', $this->input->post('nombre_producto')); //get data from file to variable
				$nombre_producto = $medicine[0];
				$nombre_producto_id = $medicine[1];

				//$generic= $this->input->post('generic');			 				//get data from file to variable
				$generic= explode('###', $this->input->post('generic')); //get data from file to variable
				$marca = $generic[0];
				$marca_id = $generic[1];

				//$presentation= $this->input->post('presentation'); 						//get data from file to variable
				$presentation= explode('###', $this->input->post('presentation')); //get data from file to variable
				$presentation_name = $presentation[0];
				$presentation_id = $presentation[1];

				//$supplier= $this->input->post('supplier'); 	//get data from file to variable
				$supplier= explode('###', $this->input->post('supplier')); //get data from file to variable
				$nombre_proveedor = $supplier[0];
				$supplier__id = $supplier[1];

				$cantidad= $this->input->post('cantidad'); 	//get data from file to variable
				$precio_unitario= $this->input->post('precio_unitario'); 	//get data from file to variable
				$precio_compra= $this->input->post('precio_compra'); 	//get data from file to variable
				$precio_venta_unitario= $this->input->post('precio_venta_unitario'); 	//get data from file to variable
				$unidad= $this->input->post('unidad'); 	//get data from file to variable
				$compra_pagada= $this->input->post('compra_pagada'); 	//get data from file to variable
				$compra_vencida= $this->input->post('compra_vencida'); 	//get data from file to variable
				$ex_date= $this->input->post('ex_date'); 	//get data from file to variable
				$date = $this->input->post('date');
				$update_data = array(
					'date' => $date,
					'nombre_producto' => $nombre_producto,//insert data to column
					'nombre_producto_id' => $nombre_producto_id,//insert data to column
					'marca' => $marca,   						 //insert data to column
					'marca_id' => $marca_id,
					'tipo_de_producto' => $presentation_name,						//insert data to column
					'tipo_producto_id' => $presentation_id,
					'nombre_proveedor' => $nombre_proveedor,   						 //insert data to column
					'proveedor_id'=>$supplier__id,
					'cantidad' => $cantidad,
					'informe_detallado' => 'Updated Purchase',
					'precio_unitario' => $precio_unitario,   						 //insert data to column
					'precio_compra' => $precio_compra,
					'precio_venta_unitario' => $precio_venta_unitario,//insert data to column
					'unidad' => $unidad,   						 //insert data to column
					'compra_pagada' => $compra_pagada,
					'compra_vencida' => $compra_vencida,
					'fecha_caducidad' => $ex_date	 //insert data to column
				);
				$this->CommonModel->update_data_onerow('informacion_de_compra', $update_data, 'compra_id',$compra_id);			//insert data to table
				redirect('ShowForm/info_producto/editado', 'refresh'); 		//after inserting back to the page
			}
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}

	//Insert Supplier Payment
	public function insert_purchase_payment() {
			if ($this->session->userdata('username') != '') { //Check Login
			$nombre_proveedor = $this->input->post('s_supplier');
			$paid = $this->input->post('paid');
			$final_due = $this->input->post('final_due');
			$insert_data = array(
				'date' => date('Y-m-d'),
				'informe_detallado' => "Payment",
				'nombre_proveedor' => $nombre_proveedor,
				'precio_compra' => 0,
				'compra_pagada' => $paid,
				'compra_vencida' => $final_due
			);
			$this->CommonModel->insert_data('informacion_de_compra', $insert_data);
					redirect('ShowForm/pago_proveedores/creado', 'refresh'); 		//after inserting back to the page

			$data['all_value'] = $this->CommonModel->get_allinfo_byid('informacion_de_compra', 'nombre_proveedor', $nombre_proveedor);
			$data['old_due'] = $this->input->post('final_due');
			$data['nombre_proveedor'] = $nombre_proveedor;
			$this->load->view('inventory/show_purchase_due', $data);
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}

	// Create Staff
	public function create_staff() {
		if ($this->session->userdata('username') != '') { //Check Login
			$this->form_validation->set_rules('username', 'Username', 'trim|required'); // check form validation
//			$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required'); // check form validation
			if ($this->form_validation->run() == FALSE) {
				redirect('ShowForm/adm_usuario/empty', 'refresh'); //If form not  validate
			} else {

				$username= $this->input->post('username'); //get data from file to variable
				$password= md5($this->input->post('password')); //get data from file to variable
				$insert_data = array(
					'username' => $username,//insert data to column
					'password' => $password, //insert data to column
					'identity' => "Staff" //insert data to column
				);
				$this->CommonModel->insert_data('staff', $insert_data); //insert data to table
				redirect('ShowForm/adm_usuario/created', 'refresh'); //after inserting back to the page
			}
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
	// Create Staff
	public function edit_staff_info($id) {
		if ($this->session->userdata('username') != '') { //Check Login
			$this->form_validation->set_rules('username', 'Username', 'trim|required'); // check form validation
//			$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required'); // check form validation
			if ($this->form_validation->run() == FALSE) {
				redirect('ShowForm/adm_usuario/empty', 'refresh'); //If form not  validate
			} else {

				$username= $this->input->post('username'); //get data from file to variable
				$password= md5($this->input->post('password')); //get data from file to variable
				$insert_data = array(
					'username' => $username,//insert data to column
					'password' => $password, //insert data to column
					'identity' => "Staff" //insert data to column
				);
				$this->CommonModel->update_data_onerow('staff', $insert_data, 'id', $id);//insert data to table
				redirect('ShowForm/adm_usuario/created', 'refresh'); //after inserting back to the page
			}
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}
}
