<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ingredient extends CI_Controller {

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
			redirect('Ingredient/List');
		}
	public function List()
		{
			$i = 1;
			$str = null;
			$id = $this->uri->segment(3);
			$this->db->where(array("iteam_id"=>$id));
		    $get =  $this->db->get('ingredients');
			 foreach($get->result_array() as $v)
				 {
					$itemid = $this->uri->segment(3);
					$str.='<tr>
					        <td>'.$i.'</td>
							<td>'.$v['name'].'</td> 
							<td>'.$v['value'].'</td> 
							<td>'.anchor("Ingredient/Delete/".$v['id'].'/'.$itemid,"<i class='fa fa-trash delete' aria-hidden='true' title='Delete'></i>",array('onclick'=>"return confirm('Do you want Delete this record ??')")).'
						</td> </tr>';
					$i++;
				 }
				$data['list'] = $str;
				$this->load->view('site/header');
				$this->load->view('membershipmenu/editmenu',$data);
				$this->load->view('site/footer');
					
				
 		}
		
	public function AddIngredient()
		{
			$this->form_validation->set_rules('ingredient','ingredient','required');
			$this->form_validation->set_rules('value','value','required');
			if($this->form_validation->run()==False)
				{
						redirect("Ingredient/List/".$this->input->post("item_id")); 
				}
			else
				{
					$insert['name']=$this->input->post("ingredient");
					$insert['value']=$this->input->post("value");
					$insert['iteam_id']=$this->input->post("item_id");
					$this->db->insert("ingredients",$insert);
					$this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in ">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Your Data Has Been Added Successfully !!</p>
										</div>');
					redirect("Ingredient/List/".$this->input->post("item_id"));  
				}
		}
	public function Delete()
		{
			$id = $this->uri->segment(3);
			$itemid = $this->uri->segment(4);
			$this->db->where(array("id"=>$id));
			$this->db->delete('ingredients');
			$this->session->set_flashdata('success', '<div class="alert alert-block alert-danger  fade in">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Your Data Has Been Deleted Successfully !!</p>
										</div>');
			redirect("Ingredient/List/".$itemid);  
		}
	
	
	
	

}
