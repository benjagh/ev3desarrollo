<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('CommonModel');
	} // Load Common Model

	function index()
	{
		$data['title'] = 'CodeIgniter Simple Login form With Session';
		$this->load->view("login", $data);
	}
	function login()
	{
		$data['title'] = 'CodeIgniter Simple Login form With Session';
		$this->load->view("login", $data);
	}

	function login_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run()) {
			//true
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			//model function
			$this->load->model('Main_model');
			if ($this->Main_model->can_login($username, $password)) {
				$session_data = array(
					'username' => $username
				);
				$this->session->set_userdata($session_data);
				redirect(base_url() . 'main/enter');
			} else {
				$this->session->set_flashdata('error', 'Invalid Username and Password');
				redirect(base_url() . 'main/login');
			}
		} else {
			//false
			$this->login();
		}
	}

	//empty ok
	function enter()
	{
		if ($this->session->userdata('username') != '') {

			$data['medicine_qty'] = count($this->CommonModel->get_all_info('proveedor')); //

			//Toda's Puchase Amount
			$where_array = array(
				"date" => date('Y-m-d')
			);
			$today_purchase = $this->CommonModel->group_by_data_where("informacion_de_compra", $where_array, "compra_id");
			$total_today_purchase = 0;
			foreach ($today_purchase as $today_sales_info) {
				$total_today_purchase += $today_sales_info->precio_compra;
			}
			$data['today_purchase_number'] = $total_today_purchase;

			//Due Puchase Amount
			$compra_vencida = $this->CommonModel->get_all_info("informacion_de_compra");
			$total_due = 0; $price=0;$pay=0;
			foreach ($compra_vencida as $info) {
				$price= $info->precio_compra;
				$pay= $info->compra_pagada;
				$total_due +=$price - $pay;
			}
			$data['today_due'] = $total_due;

			// Sales of Month
			$array_check = array(
				"date>=" => date('Y-m-d', strtotime('-1 month')),
				"date<=" => date('Y-m-d')
			);
			$monthly_sales_result = $this->CommonModel->group_by_data_where("producto_ventas", $array_check, "ventas_id");
			$total_monthly_sales = 0;
			foreach ($monthly_sales_result as $monthly_sales_info) {
				$total_monthly_sales += $monthly_sales_info->precio_descuento;
			}
			$data['monthly_sales_number'] = $total_monthly_sales;

			//Toda's Sales Amount
			$where_array_sale = array(
				"date" => date('Y-m-d')
			);
			$today_sale = $this->CommonModel->group_by_data_where("producto_ventas", $where_array_sale, "ventas_id");
			$total_today_sales = 0;
			foreach ($today_sale as $today_sales_info) {
				$total_today_sales += $today_sales_info->precio_descuento;
			}
			$data['today_sale_number'] = $total_today_sales;
			//Expire Date
			$array_check_near_expire = array(
				"fecha_caducidad<=" => date('Y-m-d')
			);
			$data['near_expired_product'] = count($this->CommonModel->get_all_info_by_array('informacion_de_compra', $array_check_near_expire));

			//END Dash Data

			$this->load->view("header");
			$this->load->view("dashboard",$data);
			$this->load->view("footer");
//			echo'<h2>Welcome-'.$this->session->userdata('username').'</h2>';
//			echo '<a href="'.base_url().'main/logout">Logout</a>';
		}
	}

	function logout()
	{
		$this->session->unset_userdata('username');
		redirect(base_url() . 'main/login');
	}
}
