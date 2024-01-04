<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller {
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
			$this->db->order_by('position', 'asc');
		    $get =  $this->db->get('tb_customer');
			 foreach($get->result_array() as $v)
				 {
					 if($v['status']==0)
						{
							$status = anchor("Customer/Deactive/".$v['id'],"<span class='label label label-info' title='If you want to deactive package please click here'>Active</span>",array('onclick'=>"return confirm('Do you want De-Active this record ??')"));
						}
					if($v['status']==1)
						{
							$status = anchor("Customer/Active/".$v['id'],"<span class='label label label-danger' title='If you want to deactive package please click here'>De-Active</span>",array('onclick'=>"return confirm('Do you want Active this record ??')"));
						}
					
					if($v['position']==0)
						{
							$st = "<span class='text-primary'>New</span>";
							$class="style='color:blue'";
						}
					if($v['position']==1)
						{
							$st = "<span class='text-success'>Subscribed</span>";
							$class="style='color:#edbe54'";
						}
					if($v['position']==2)
						{
							$st = "<span class='text-danger'>Cancel</span>";
							$class="style='color:green'";
						}
					$str.='<tr>
					        <td>'.$i.'</td>
							<td>'.$v['date'].'</td>
							<td>'.$v['customer_name'].'</td>
							<td>'.$v['mobile_no'].'</td>
							<td>'.$v['type'].'</td>
							<!--<td>'.$v['address'].'</td>-->
							<td>'.$status.'</td>
							<td '.$class.'>'.$st.'</td>
							<td>'.$v['remarks'].'</td>
							<td>
							'.anchor("Customer/Subscribed/".$v['id'],'<i class="fa fa-check subscribe" aria-hidden="true" title="subscribed"></i>').' 
							| '.anchor("Customer/Cancel/".$v['id'],'<i class="fa fa-ban error" aria-hidden="true" title="cancel"></i>').'
							| '.anchor("Customer/Remarks/".$v['id'],"<i class='fa fa-pencil remark' aria-hidden='true' title='remark'></i>",array('onclick'=>"return confirm('Do you want edit this record ??')")).'
							| '.anchor("Subscription/Add/".$v['id'],"<i class='fa fa-cart-plus cart' aria-hidden='true' title='subscription'></i>",array('onclick'=>"return confirm('Do you want add subscription  ??')")).'
						</td> </tr>';
					$i++;
				 }
				$data['list'] = $str;
				$this->load->view('site/header');
				$this->load->view('customer/customerlist',$data);
				$this->load->view('site/footer');
 		}
	public function Subscribed()
		{
			
			$id = $this->uri->segment(3);
			$this->db->where(array("id"=>$id));
			$update['position'] = "1";
			$this->db->update('tb_customer',$update);
			redirect('Customer');
		}
	public function Cancel()
		{
			$id = $this->uri->segment(3);
			$this->db->where(array("id"=>$id));
			$update['position'] = "2";
			$this->db->update('tb_customer',$update);
			redirect('Customer');
		}
	
	 public function Deactive()
		{
			 $id = $this->uri->segment(3);
			 $this->db->where(array("id"=>$id));
			 $update['status'] = "1";
			 $this->db->update('tb_customer',$update);
			  $this->session->set_flashdata('success', '<div class="alert alert-block alert-danger auto_hide fade in">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Customer De-Active Successfully !!</p>
											</div>');
			 redirect('Customer/');
		}
	 public function Active()
		 {
			 $id = $this->uri->segment(3);
			 $this->db->where(array("id"=>$id));
			 $update['status'] = "0";
			$this->db->update('tb_customer',$update);
			 $this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Customer Active Successfully !!</p>
											</div>');
			 redirect('Customer/');
		 }
	public function Remarks()
		{
			$id = $this->uri->segment(3);
			$this->db->where(array("id"=>$id));
			$details = $this->db->get("tb_customer");
			$data['id'] = $details->row()->id;
			$data['customername'] = $details->row()->customer_name;
			$data['mobile_no'] = $details->row()->mobile_no;
			$data['type'] = $details->row()->type;
			$data['address'] = $details->row()->address;
			$data['office_address'] = $details->row()->office_address;
			$data['gym_address'] = $details->row()->gym_address;
			$data['other_address'] = $details->row()->other_address;
			$data['remarks'] = $details->row()->remarks;
			
			$this->load->view('site/header');
			$this->load->view('customer/remark', $data);
			$this->load->view('site/footer');
			
		}
	public function InsertRemarks()
	 {		
		$id = $this->input->post('id');
		$update['remarks'] = $this->input->post('remarks');
		$this->db->where(array("id"=>$id));
		$this->db->update('tb_customer',$update);
		redirect('Customer/');
	}
	
	
	
	public function Add()
		{
		
			$this->form_validation->set_rules('customer_name','customer_name','required');
			$this->form_validation->set_rules('mobile_no','mobile_no','required');
			$this->form_validation->set_rules('address','address','required');
			
			if($this->form_validation->run()==False)
				{
					$this->load->view('site/header');
					$this->load->view('customer/addcustomer');
					$this->load->view('site/footer');
					
				}
			else
				{
					
					
					$customer_name = ucwords($this->input->post('customer_name'));
					$insert['customer_name'] = $customer_name;
					
					$mobile_no = $this->input->post('mobile_no');
					$insert['mobile_no'] = $mobile_no;
					
					$address = ucwords($this->input->post('address'));
					$insert['address'] = $address;
					$insert['date'] = date('d-m-Y');
					$insert['compare_date'] = strtotime(date('d-m-Y'));
					$this->db->where(array('mobile_no'=>$mobile_no));
					$totalRows = $this->db->count_all_results('tb_customer');
                   
					if($totalRows!=null)
					{
							
				    	$this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in">
										<button data-dismiss="alert" class="close" type="button" data-original-title="">
											x
										</button>
										<p>
										Already Exist !!</p>
										</div>');
					}
					else
					{
					   $this->db->insert('tb_customer',$insert);
					   $this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in">
										<button data-dismiss="alert" class="close" type="button" data-original-title="">
											x
										</button>
										<p>
										Your Data Has Been Added Successfully !!</p>
										</div>');
					}
					
					redirect('Customer/');
				}
		}
	public function Edit()
		{
			
			$catlist=null;
			$this->form_validation->set_rules('customer_name','customer_name','required');
			$this->form_validation->set_rules('mobile_no','mobile_no','required');
			$this->form_validation->set_rules('address','address','required');
			
			if($this->form_validation->run()==False)
				{
						$id = $this->uri->segment(3);
						$this->db->where(array("(id)"=>$id));
						$dd = $this->db->get('tb_customer');
						$edit['id'] = $dd->row()->id;
						$edit['customer_name'] = $dd->row()->customer_name;
						$edit['mobile_no'] = $dd->row()->mobile_no;
						$edit['address'] = $dd->row()->address;
						$this->load->view('site/header');
						$this->load->view('customer/editcustomer',$edit);
						$this->load->view('site/footer');
				}
			else
				{
						
						$id = $this->input->post('id');
						$update['customer_name'] = ucwords($this->input->post('customer_name'));
						$update['mobile_no'] = $this->input->post('mobile_no');
						$update['address'] = ucwords($this->input->post('address'));
						$this->db->where(array("id"=>$id));
						$this->db->update("tb_customer", $update);
						$this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Your Data Has Been Updated Successfully !!</p>
										</div>');
						redirect('Customer/');
				}
		}

}
