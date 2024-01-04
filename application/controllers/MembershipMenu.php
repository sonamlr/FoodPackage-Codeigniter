<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MembershipMenu extends CI_Controller {

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
			redirect('MembershipMenu/List');
		}
	public function List()
		{
			$i = 1;
			$str = null;
			$id = $this->uri->segment(3);
			$this->db->where(array("package_id"=>$id));
		    $get =  $this->db->get('tb_iteam');
			 foreach($get->result_array() as $v)
				 {
					$packid = $this->uri->segment(3);
					$str.='<tr>
					        <td>'.$i.'</td>
							<td>'.$v['iteam_name'].'</td> 
							<td>'.anchor("Ingredient/List/".$v['id'],"Add","title='New Ingredients'",array('onclick'=>"return confirm('Do you want add new ingredient ??')")).'
						</td>
						<td>'.anchor("MembershipMenu/Delete/".$v['id'].'/'.$packid,"<i class='fa fa-trash delete' aria-hidden='true' title='Delete'></i>",array('onclick'=>"return confirm('Do you want Delete this Item ??')")).'
						</td>
						</tr>';
					$i++;
				 }
				$data['list'] = $str;
			
			
					$this->load->view('site/header');
					$this->load->view('membershipmenu/menulist',$data);
					$this->load->view('site/footer');
					
				
 		}
	
	public function AddIteam()
		{
			$this->form_validation->set_rules('item','item','required');			
			if($this->form_validation->run()==False)
				{
						redirect("MembershipMenu/List/".$this->input->post("pack_id")); 
				}
			else
				{
					$insert['iteam_name']=$this->input->post("item");
					$insert['package_id']=$this->input->post("pack_id");
					$this->db->insert("tb_iteam",$insert);
					$this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in ">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Your Data Has Been Added Successfully !!</p>
										</div>');
					redirect("MembershipMenu/List/".$this->input->post("pack_id")); 
				}
				
		}
	
		
	
	
	public function Edit()
		{
			$this->form_validation->set_rules('protein','protein','required');
			
			if($this->form_validation->run()==False)
				{
						$id = $this->uri->segment(3);
						$this->db->where(array("(id)"=>$id));
						$dd = $this->db->get('tb_package_menu');
						$edit['id'] = $dd->row()->id;
						$edit['protein'] = $dd->row()->protein;
						$edit['carbo'] = $dd->row()->carbo;
						$edit['sugar'] = $dd->row()->sugar;
						$edit['fiber'] = $dd->row()->fiber;
						$edit['fat'] = $dd->row()->fat;
						$edit['cholesterol'] = $dd->row()->cholesterol;
						$edit['sodium'] = $dd->row()->sodium;
						$edit['package_id'] = $dd->row()->package_id;
						$this->load->view('site/header');
						$this->load->view('membershipmenu/editmenu',$edit);
						$this->load->view('site/footer');
				}
			else
				{
						
						$id = $this->input->post('package_id');
						
						$update['protein'] = ucwords($this->input->post('protein'));
						$update['carbo'] = $this->input->post('carbo');
						$update['sugar'] = $this->input->post('sugar');
						$update['fiber'] = $this->input->post('fiber');
						$update['fat'] = $this->input->post('fat');
						$update['cholesterol'] = $this->input->post('cholesterol');
						$update['sodium'] = $this->input->post('sodium');
						$this->db->where(array("id"=>$id));
						$this->db->update("tb_package_menu", $update);
						$this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in ">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Your Data Has Been Updated Successfully !!</p>
										</div>');
						redirect('MembershipMenu/List/'.$id);
				}
		}
		
	public function Delete()
		{
			$id = $this->uri->segment(3);
			$packid = $this->uri->segment(4);
			$this->db->where(array("id"=>$id));
			$this->db->delete('tb_iteam');			
			$this->session->set_flashdata('success', '<div class="alert alert-block alert-danger  fade in">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Your Data Has Been Deleted Successfully !!</p>
										</div>');
			redirect("MembershipMenu/List/".$packid);  
		}
	
	

}
