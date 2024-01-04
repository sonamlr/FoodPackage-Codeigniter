<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends CI_Controller {
	function __construct() 
		{
			parent::__construct();
			$this->valid();
		} 
	public function valid()
		{
			if($this->session->userdata('admin')==1)
				{
				}
			else
				{
					$array_items = array('username','password','admin'); 
					$this->session->unset_userdata($array_items);
					redirect("Login");
				}
		}
	public function index()
		{
			$this->load->view("site/header");
			 $this->load->view("changepassword/add");
			 $this->load->view("site/footer");
		}
	public function Add() 
		{  
			$this->form_validation->set_rules('old','Old','required');
			$this->form_validation->set_rules('new','New','required');
			$this->form_validation->set_rules('confirm','Confirm','required|matches[new]');
			if($this->form_validation->run()==False)
				{
					$this->load->view("site/header");
					$this->load->view('changepassword/add');
					$this->load->view("site/footer");
				}
			else
				{ 
					$old = $this->input->post("old");
					$this->db->where(array("password"=>$old));
					$cc = $this->db->get("tb_admin");
					if($cc->num_rows() == 1 )
						{
							$update['password']	=$this->input->post("new");	
							if($this->db->update("tb_admin",$update))
								{
									$this->session->set_flashdata('message','
									<div class="alert alert-block alert-success fade in">
										<button data-dismiss="alert" class="close" type="button" data-original-title="">
											x
										</button>
										<p>
											Password Successfully Change.
										</p>
									</div>');
									redirect("ChangePassword/Add");
								}
							else
								{
									$this->session->set_flashdata('message','
									<div class="alert alert-block alert-danger fade in">
										<button data-dismiss="alert" class="close" type="button" data-original-title="">
											x
										</button>
										<p>
										Sorry New Password and Re-Type Password does not Match Please Try again
										</p>
									</div>');
									redirect("ChangePassword/Add");
								}
						}
						else
						{
							 $this->session->set_flashdata('message','
						<div class="alert alert-block alert-danger fade in">
								<button data-dismiss="alert" class="close" type="button" data-original-title="">
									x
								</button>
								<p>
								Sorry You Old Password is Wrong Please try Again
								</p>
							</div>');
							$this->load->view("site/header");
							$this->load->view('changepassword/add');
							$this->load->view("site/footer");
						}
			
				}	   
							   
		}
		
}
	
	



