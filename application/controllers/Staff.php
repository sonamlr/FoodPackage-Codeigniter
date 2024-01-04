<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Staff extends CI_Controller {

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
			$i = 1;
			$str = null;
		    $get =  $this->db->get('tb_staff');
			 foreach($get->result_array() as $v)
				 {
					
					$str.='<tr>
					        <td>'.$i.'</td>
							<td>'.$v['name'].'</td>
							<td>'.$v['username'].'</td>
							<td>'.$v['password'].'</td>
							<td>'.anchor("Staff/Edit/".$v['id'],"<i class='fa fa-pencil-square-o edit' aria-hidden='true'></i>",array('onclick'=>"return confirm('Do you want edit this record ??')")).'
							| '.anchor("Permission/Add/".$v['id'],"<i class='fa fa-lock eye' aria-hidden='true'></i>",array('onclick'=>"return confirm('Do you want edit this record ??')")).'
						</td> </tr>';
					$i++;
				 }
				$data['list'] = $str;
				$this->load->view('site/header');
				$this->load->view('staff/stafflist',$data);
				$this->load->view('site/footer');
 		}
	
	
	
	
	
	public function Add()
		{
			
			$this->form_validation->set_rules('name','name','required');
			$this->form_validation->set_rules('username','username','required');
			$this->form_validation->set_rules('password','password','required');
			
			if($this->form_validation->run()==False)
				{
					$this->load->view('site/header');
					$this->load->view('staff/addstaff');
					$this->load->view('site/footer');
					
				}
			else
				{
					
					$name = ucwords($this->input->post('name'));
					$insert['name'] = $name;
					$username = $this->input->post('username');
					$insert['username'] = trim($username);
					$password = $this->input->post('password');
					$insert['password'] = trim($password);
					$this->db->where(array('username'=>$username));
					$this->db->where(array('password'=>$password));
					$totalstaff = $this->db->count_all_results('tb_staff');
					
					if($totalstaff!=null)
						{
							$this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in ">
										<button data-dismiss="alert" class="close" type="button" data-original-title="">
											x
										</button>
										<p>
										Already Exist !!</p>
										</div>');
						}
					else
						{
							$this->db->insert('tb_staff',$insert);
							$insetdata['staff_id'] =   $this->db->insert_id();
							$this->db->insert('tb_permission',$insetdata);
							$this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in ">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Your Data Has Been Added Successfully !!</p>
											</div>');
						}
					
					redirect('Staff/');
				}
		}
	public function Edit()
		{
			
			$this->form_validation->set_rules('name','name','required');
			$this->form_validation->set_rules('username','username','required');
			$this->form_validation->set_rules('password','password','required');
			
			if($this->form_validation->run()==False)
				{
						$id = $this->uri->segment(3);
						$this->db->where(array("(id)"=>$id));
						$dd = $this->db->get('tb_staff');
						$edit['id'] = $dd->row()->id;
						$edit['name'] = $dd->row()->name;
						$edit['username'] = $dd->row()->username;
						$edit['password'] = $dd->row()->password;
						$this->load->view('site/header');
						$this->load->view('staff/editstaff',$edit);
						$this->load->view('site/footer');
				}
			else
				{
						
						$id = $this->input->post('id');
						$update['name'] = ucwords($this->input->post('name'));
						$update['username'] = trim($this->input->post('username'));
						$update['password'] = trim($this->input->post('password'));
						$this->db->where(array("id"=>$id));
						$this->db->update("tb_staff", $update);
						$this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in ">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Your Data Has Been Updated Successfully !!</p>
										</div>');
						redirect('Staff/');
				}
		}
	
	

}
