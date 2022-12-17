<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Get_ajax_value extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CommonModel');
	}

	public
	function get_purchase_statement()
	{

			$date_from = $this->input->post('date_from');
			$date_to = $this->input->post('date_to');
			$nombre_producto = $this->input->post('nombre_producto');
			//$invoice = $this->input->post('invoice');
			$supplier = $this->input->post('supplier');
			$checking_array = array();
			if (!empty($date_from) && !empty($date_to)) {
				$checking_array['date>='] = $date_from;
				$checking_array['date<='] = $date_to;
			}
			if (!empty($nombre_producto)) {
				$checking_array['nombre_producto'] = $nombre_producto;
			}
//			if (!empty($invoice)) {
//				$checking_array['invoice_no'] = $invoice;
//			}
			if (!empty($supplier)) {
				$checking_array['nombre_proveedor'] = $supplier;
			}
			$result = $this->CommonModel->get_distinct_value_where('nombre_producto', "informacion_de_compra", $checking_array);
			$count = 0;
			foreach ($result as $info) {
				$count++;
				$checking_array['nombre_producto'] = $info->nombre_producto;
				$data['product_result' . $count] = $this->CommonModel->get_all_info_by_array("informacion_de_compra", $checking_array);
			}
			$data['count_it'] = $count;
			$this->load->view('inventory/purchase_statement', $data);
	}

	function show_purchase_due()
	{
			$s_supplier= $this->input->post('s_supplier');

//			if (empty($s_supplier)) {
//				echo "<p style='color: #E13300;font-size: 20px;'>Please select a Supplier.</p>";
//			} else {
				$data['all_value'] = $this->CommonModel->get_allinfo_byid('informacion_de_compra', 'nombre_proveedor', $s_supplier,'date(date)','asc');
				$total = 0;
				$paid = 0;
				foreach ($data['all_value'] as $info) {
					$total += $info->precio_compra;
					$paid += $info->compra_pagada;
				}
				$old_due = $total - $paid;
				$data['old_due'] = $old_due;
				$data['nombre_proveedor'] = $s_supplier;
				$this->load->view('inventory/show_purchase_due', $data);
//			}
	}
	public function get_medicine_price() {
		$nombre_producto= $this->input->post('nombre_producto');
		$result = $this->CommonModel->get_allinfo_byid('informacion_de_compra', 'nombre_producto', $nombre_producto);
		$price = 0;
		foreach ($result as $info) {
			$price = $info->precio_venta_unitario;
		}
		echo $price;
	}

	public function sales_confirm() {
		$all_purchase = $this->input->post('all_purchase');
		$amount = $this->input->post('amount');
		$discount = $this->input->post('discount');
		$sub_total = $this->input->post('sub_total');
		$pay = $this->input->post('pay');
		//$due = $this->input->post('due');

		$invoice = 0;
		//Invoice Create Sales
		$result = $this->CommonModel->find_last_id('invoice', 'producto_ventas');
		if (!$result) {
			$invoice = 1;
		} else {
			foreach ($result as $row) {
				$invoice = ($row->invoice) + 1;
			}
		}
		//Invoice Create Sales END
		$medicine_collection="";

			foreach ($all_purchase as $single_purchase) {
				$date = $single_purchase[0];
				$nombre_producto = $single_purchase[1];
				$precio_venta_unitario = $single_purchase[2];
				$sales_qty = $single_purchase[3];
				$precio_compra = $single_purchase[4];
				$nombre_producto_id = $single_purchase[5];
				$marca = $single_purchase[6];
				$tipo_de_producto = $single_purchase[7];
				$correo_cliente = $single_purchase[8];
				$medicine_collection .= "$nombre_producto ($precio_compra $), ";

				$insert_data = array(
					'date' => $date,
					'invoice' => $invoice,
					'informe ' => "Sales Medicine",
					//	'patient_id' => $nombre_producto,
					//	'nombre_cliente' => $nombre_cliente,
					'correo_cliente' => $correo_cliente,
					'tipo_de_producto' => $tipo_de_producto,
					'nombre_producto' => $nombre_producto,
					'nombre_producto_id' => $nombre_producto_id,
					'marca' => $marca,
					'cantidad' => $sales_qty,
					'precio_venta_unitario' => $precio_venta_unitario,
					'precio_total' => $precio_compra,
					'cantidad_total' => $amount,
					'descuento_total' => $discount,
					'precio_descuento' => $sub_total,
					'ventas_pagadas' => $pay,
					//'ventas_vencidas' => $due
				);
				$this->CommonModel->insert_data('producto_ventas', $insert_data);
		
				
			}
		  			// Invoice Data Goes Here
		$data['date'] = $date;
		$data['invoice'] = $invoice;
		//$data['cliente_id'] = $cliente_id;
		//$data['nombre_cliente'] = $nombre_cliente;
		$data['email'] = $correo_cliente;
		$data['nombre_producto'] = $medicine_collection;
		$data['tipo_de_producto'] = $tipo_de_producto;
		$data['precio_venta_unitario'] = $precio_venta_unitario;
		$data['cantidad'] = $sales_qty;
		$data['amount'] = $amount;
		$data['discount'] = $discount;
		$data['sub_total'] = $sub_total;
		$data['pay'] = $pay;
		//$data['due'] = $due;

		$this->load->view('sales/sales_invoice', $data);
	}

	public
	function get_sales_statement()
	{

		$date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');
		$nombre_producto = $this->input->post('nombre_producto');
		//$invoice = $this->input->post('invoice');
		//$supplier = $this->input->post('supplier');
		$checking_array = array();
		if (!empty($date_from) && !empty($date_to)) {
			$checking_array['date>='] = $date_from;
			$checking_array['date<='] = $date_to;
		}
		if (!empty($nombre_producto)) {
			$checking_array['nombre_producto'] = $nombre_producto;
		}
//			if (!empty($invoice)) {
//				$checking_array['invoice_no'] = $invoice;
//			}
//		if (!empty($supplier)) {
//			$checking_array['nombre_proveedor'] = $supplier;
//		}
		$result = $this->CommonModel->get_distinct_value_where('invoice', "producto_ventas", $checking_array);
		$count = 0;
		foreach ($result as $info) {
			$count++;
			$checking_array['invoice'] = $info->invoice;
			$data['product_result' . $count] = $this->CommonModel->get_all_info_by_array("producto_ventas", $checking_array);
		}
		$data['count_it'] = $count;
		$this->load->view('sales/get_sales_statement', $data);
	}
	// Account profit Loss
	public
	function get_product_profit_loss_info()
	{
		if ($this->session->userdata('username') != '') {
			$date_from = $this->input->post('date_from');
			$date_to = $this->input->post('date_to');
			$nombre_producto_id = $this->input->post('nombre_producto_id');
			$checking_array = array();

			if (!empty($nombre_producto_id)) {
				$checking_array['nombre_producto_id'] = $nombre_producto_id;
			}
			$data['all_product_info'] = $this->CommonModel->check_value_get_data('informacion_de_compra', $checking_array);
			if (!empty($data['all_product_info'])) {
				$count = 0;
				foreach ($data['all_product_info'] as $p) {
					$precio_compra = $p->precio_compra;
					$array_check = array();
					$array_check['nombre_producto_id'] = $p->nombre_producto_id;
					if (!empty($date_from) && !empty($date_to)) {
						// $array_check['date >='] = $date_from;
						$array_check['date <='] = $date_to;
					}
					$sold_qty = 0;
					$total_sale = 0;
					$sales = $this->CommonModel->get_all_info_by_array('producto_ventas', $array_check);
					foreach ($sales as $s) {
						$sold_qty += $s->cantidad;
						$total_sale += $s->precio_venta_unitario * $s->cantidad ;
					}
					if ($sold_qty != 0) {
						$count++;
						$data['name' . $count] = $p->nombre_producto;
						$data['precio_compra' . $count] = $p->precio_compra;
						$data['sold_qty' . $count] = $sold_qty;
//						$data['selling_price' . $count] = round($total_sale / $sold_qty, 2);
						$data['selling_price' . $count] = $total_sale;
						$data['profit_loss_unit' . $count] = ($data['selling_price' . $count])- $precio_compra;
//						$data['profit_loss_total' . $count] = $data['profit_loss_unit' . $count] * $sold_qty;
						$data['total_sale' . $count] = $total_sale;
					}
				}
				$data['c'] = $count;
				$data['start_date'] = $date_from;
				$data['end_date'] = $date_to;
				$this->load->view('account/show_product_profit_loss_info', $data);
			}
		} else {
			$data['wrong_msg'] = "";
			$this->load->view('Main/login', $data);
		}
	}


} //END
