<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
		public function index()
			{
				
				$subscription = $this->db->count_all('tb_subscription');
				$package = $this->db->count_all('tb_package');
				$customer = $this->db->count_all('tb_customer');
				
				$data['subscription']=$subscription;
				$data['package']=$package;
				$data['customer']=$customer;
				$this->load->view('site/header');
				$this->load->view('dashboard/dashboard_view',$data);
				$this->load->view('site/footer');
			}
		
	
}
