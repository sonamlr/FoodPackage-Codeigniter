<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends CI_Controller {

	public function index()
		{
			
			redirect('Permission/Add');
		}
	public function Add()
		{
			$id = $this->uri->segment(3);
			$this->db->where(array("id"=>$id));
			$staff = $this->db->get('tb_staff');
			$data['staffname'] = $staff->row()->name;
			$this->db->where(array("staff_id"=>$id));
			$dt = $this->db->get('tb_permission');
			$data['package'] = $dt->row()->package;
			$data['customer_subs'] = $dt->row()->customer_subs;
			$data['subs_appro_manag'] = $dt->row()->subs_appro_manag;
			$data['sub_balance'] = $dt->row()->sub_balance;
			$data['subs_payment'] = $dt->row()->subs_payment;
			$data['staff'] = $dt->row()->staff;
			$this->load->view('site/header');
			$this->load->view('permission/permissionlist',$data);
			$this->load->view('site/footer');
		}
	public function updatePermission()
		{
			
			$staff_id = $this->input->post('staff_id');
			$update['package'] = $this->input->post('package');
			$update['customer_subs'] = $this->input->post('customer_subs');
			$update['subs_appro_manag'] = $this->input->post('subs_appro_manag');
			$update['sub_balance'] = $this->input->post('sub_balance');
			$update['subs_payment'] = $this->input->post('subs_payment');
			$update['staff'] = $this->input->post('staff');
			$this->db->where(array("staff_id"=>$staff_id));
			$this->db->update('tb_permission',$update);
			$this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Data updated successfully !!</p>
											</div>');
			redirect('Staff');
			
		}
}
