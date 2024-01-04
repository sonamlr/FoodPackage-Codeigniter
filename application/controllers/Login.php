<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
		{
			$this->load->view('login/login_view');
		}
	public function Validation()
		{
			$this->form_validation->set_rules('user_name','User Name','required');
			$this->form_validation->set_rules('password','Password','required');
			if($this->form_validation->run()==False)
				{
					$this->load->view('login/login_view');
				} 
			else
				{
					$user_name= $this->input->post("user_name");
					$password= $this->input->post("password");
					$this->db->where(array("md5(username)"=>md5($user_name)));
					$this->db->where(array("md5(password)"=>md5($password)));
					$dd = $this->db->get("tb_admin");
					if($dd->num_rows()==  1)
						{
							$newdata = array(
										'username'  => $user_name,
										'password'     => $password,
										'admin' => "1",
										'logged_in' => TRUE	
								); 
							$this->session->set_userdata($newdata);
							redirect("Dashboard");
						}
					else
						{
							$this->load->view('login/login_view');
						}
				}	
		}
}
