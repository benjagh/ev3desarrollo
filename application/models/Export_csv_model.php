<?php
class Export_csv_model extends CI_Model
{
	function fetch_data()
	{
		$this->db->select("supplier_name, mobile,address,previous_due");
		$this->db->from('proveedores');
		return $this->db->get();
	}
}
?>
