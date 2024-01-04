<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subscription extends CI_Controller {

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
			if(!empty($_POST))
				{
					$search= $this->input->post('search');
		            //$sql = "Select * from tb_subscription where mobile_no = ".$search."";
					 $sql="select * from tb_subscription where 
				mobile_no LIKE '%".$search."%'
				or customer_name LIKE '%".$search."%' " ;
					
			         $get  =  $this->db->query($sql);
				}
			else
				{
					$this->db->order_by("id", "desc");
					 $get =  $this->db->get('tb_subscription');
				}
		   
			 foreach($get->result_array() as $sub)
				 {
					 $cus_id=$sub['customer_id'];
					 $pack_id=$sub['package_id'];
					 $this->db->where(array('id'=>$cus_id));
					$customer= $this->db->get('tb_customer');
					$this->db->where(array('id'=>$pack_id));
					$package= $this->db->get('tb_package');
					   if($sub['status']==0)
						{
							$status = anchor("Subscription/Deactive/".$sub['id'],"<span class='label label label-info' title='If you want to deactive package please click here'>Active</span>",array('onclick'=>"return confirm('Do you want De-Active this record ??')"));
						}
					if($sub['status']==1)
						{
							$status = anchor("Subscription/Active/".$sub['id'],"<span class='label label label-danger' title='If you want to deactive package please click here'>De-Active</span>",array('onclick'=>"return confirm('Do you want Active this record ??')"));
						}
					$str.='<tr>
					        <td>'.$i.'</td>
					        <td>'.$sub['date'].'</td>
							<td>'.$package->row()->name.'</td>
							<td>'.$customer->row()->customer_name.'</td>
							<td>'.$customer->row()->mobile_no.'</td>
							<td>'.$customer->row()->address.'</td>
							<td>'.$status.'</td>
							<td>
							<!--'.anchor("Subscription/Edit/".$sub['id'],"<i class='fa fa-pencil-square-o edit' aria-hidden='true'></i>",array('onclick'=>"return confirm('Do you want edit this record ??')")).'
							-->'.anchor("SubscriptionBalance/View/".$sub['package_id'],"<i class='fa fa-eye edit' aria-hidden='true'></i>",array('onclick'=>"return confirm('Do you want edit this record ??')")).'
						</td> </tr>';
					$i++;
				 }
				$data['list'] = $str;
				$this->load->view('site/header');
				$this->load->view('subscription/subscriptionlist',$data);
				$this->load->view('site/footer');
 		}
	
	 public function Deactive()
		{
			 $id = $this->uri->segment(3);
			 $this->db->where(array("id"=>$id));
			 $update['status'] = "1";
			 $this->db->update('tb_subscription',$update);
			 $this->session->set_flashdata('success', '<div class="alert alert-block alert-danger auto_hide fade in">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Subscription De-Active Successfully !!</p>
											</div>');
			 redirect('Subscription/');
		}
	 public function Active()
		 {
			 $id = $this->uri->segment(3);
			 $this->db->where(array("id"=>$id));
			 $update['status'] = "0";
			 $this->db->update('tb_subscription',$update);
			 $this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Subscription Active Successfully !!</p>
											</div>');
			 redirect('Subscription/');
		 }
	
	
	
	public function Add()
		{
				 $str=null;
				 $i=1;
			 $customerid=$this->uri->segment(3);
			 $this->db->where(array("customer_id"=>$customerid));
			 $get =  $this->db->get('tb_subscription');
			 foreach($get->result_array() as $sub)
				 {
					 $cus_id=$sub['customer_id'];
					 $pack_id=$sub['package_id'];
					 $this->db->where(array('id'=>$cus_id));
					$customer= $this->db->get('tb_customer');
					$this->db->where(array('id'=>$pack_id));
					$package= $this->db->get('tb_package');
					
					
					
					$this->db->select('tb_ledger.*');
            $this->db->select('SUM(tb_ledger.credit) as creditTotal');
            $this->db->select('SUM(tb_ledger.debit) as debitTotal');
			$this->db->where(array('package_id'=>$pack_id));
            $this->db->from('tb_ledger');
            $subsc = $this->db->get();
			
					   if($sub['status']==0)
						{
							$status = anchor("Subscription/Deactive/".$sub['id'],"<span class='label label label-info' title='If you want to deactive package please click here'>Active</span>",array('onclick'=>"return confirm('Do you want De-Active this record ??')"));
						}
					if($sub['status']==1)
						{
							$status = anchor("Subscription/Active/".$sub['id'],"<span class='label label label-danger' title='If you want to deactive package please click here'>De-Active</span>",array('onclick'=>"return confirm('Do you want Active this record ??')"));
						}
					$str.='<tr>
					        <td>'.$i.'</td>
					        <td>'.$sub['date'].'</td>
							<td>'.$customer->row()->customer_name.'</td>
							<td>'.$customer->row()->mobile_no.'</td>
							<td>'.$package->row()->name.'</td>
							<td>'.$package->row()->price.'</td>
							<td>'.$package->row()->price-$subsc->row()->debitTotal.'</td>
							<td>'.$status.'</td>
							<td>'.anchor("SubscriptionBalance/View/".$sub['package_id'],"<i class='fa fa-eye eye' aria-hidden='true'></i>",array('onclick'=>"return confirm('Do you want edit this record ??')")).'
						</td> </tr>';
					$i++;
				 }
				$data['list'] = $str;
			$customers=null;
			$packages=null;
			$this->form_validation->set_rules('package_id','package_id','required');
			$this->form_validation->set_rules('customer_id','customer_id','required');
			$this->db->where(array('status'=>'0'));
			$package =  $this->db->get('tb_package');
			foreach($package->result_array() as $pack)
				{
					$packages.='<option value='.$pack['id'].'>'.$pack['name'].'</option>';
				}
				$data['package']=$packages;
				$this->db->where(array('status'=>'0'));
			$customer =  $this->db->get('tb_customer');
			foreach($customer->result_array() as $cus)
				{
					if($cus['id']==$this->uri->segment(3))
					{
						$sel='selected';
					}
					else
					{
						$sel='';
					}
					$customers.='<option value='.$cus['id'].' '.$sel.'>'.$cus['customer_name'].' - '.$cus['mobile_no'].'</option>';
				}
				$data['customer']=$customers;
			if($this->form_validation->run()==False)
				{
					$this->load->view('site/header');
					$this->load->view('subscription/addsubscription',$data);
					$this->load->view('site/footer');
					
				}
			else
				{
					
					$package_id = $this->input->post('package_id');
					$insert['package_id'] = $package_id;
					
					$customer_id = $this->input->post('customer_id');
					$monthly_price = $this->input->post('monthly_price');
					$daily_price = $this->input->post('daily_price');
					$insert['customer_id'] = $customer_id;
					$this->db->where(array('id'=>$customer_id));
					$customer=$this->db->get('tb_customer');
					$insert['customer_name'] = $customer->row()->customer_name;
					$mobile_no = $customer->row()->mobile_no;
					$insert['mobile_no'] = $mobile_no;
					$insert['monthly_price'] = $monthly_price;
					$insert['daily_price'] = $daily_price;
					$insert['date'] = date('d-m-Y');
					$insert['compare_date'] = strtotime(date('d-m-Y'));
					$this->db->where(array('package_id'=>$package_id,'customer_id'=>$customer_id));
					$totalRows = $this->db->count_all_results('tb_subscription');
                   
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
					    
						$this->db->insert('tb_subscription',$insert);
						
						$sub_id = $this->db->insert_id();
						
						$insert1['sub_id'] = $sub_id;
						 $insert1['mobile_no'] = $customer->row()->mobile_no;
						 $package_id = $this->input->post('package_id');
						$this->db->where(array('id'=>$package_id));
					    $package=$this->db->get('tb_package');
					   
						$insert1['credit'] = $package->row()->price;
						$insert1['package_id'] = $package_id;
						$insert1['customer_id'] = $customer_id;
						
						$insert1['date'] = date('d-m-Y');
						$insert1['compare_date'] = strtotime(date('d-m-Y'));
						
						$this->db->insert('tb_ledger',$insert1);
						
						$this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Your Data Has Been Added Successfully !!</p>
											</div>');
					}
					redirect('Subscription/Add/'.$customer_id);
				}
		}
	public function Edit()
		{
			
			$customers=null;
			$packages=null;
			$this->form_validation->set_rules('package_id','package_id','required');
			$this->form_validation->set_rules('customer_id','customer_id','required');
			
			if($this->form_validation->run()==False)
				{
						$id = $this->uri->segment(3);
						$this->db->where(array("(id)"=>$id));
						$dd = $this->db->get('tb_subscription');
						$edit['id'] = $dd->row()->id;
						
						$package =  $this->db->get('tb_package');
						foreach($package->result_array() as $pack)
						{
							if($pack['id']==$dd->row()->package_id)
									{
										$sel='selected';
									}
								else
									{
										$sel='';
									} 
							$packages.='<option value='.$pack['id'].' '.$sel.'>'.$pack['name'].'</option>';
						}
						$edit['package']=$packages;
						$customer =  $this->db->get('tb_customer');
						foreach($customer->result_array() as $cus)
						{
							if($cus['id']==$dd->row()->customer_id)
									{
										$sel1='selected';
									}
								else
									{
										$sel1='';
									} 
							$customers.='<option value='.$cus['id'].' '.$sel1.'>'.$cus['mobile_no'].' - '.$cus['customer_name'].'</option>';
						}
						$edit['customer']=$customers;
						$this->load->view('site/header');
						$this->load->view('subscription/editsubscription',$edit);
						$this->load->view('site/footer');
				}
			else
				{
						
						$id = $this->input->post('id');
						$update['package_id'] = $this->input->post('package_id');
						$update['customer_id'] = $this->input->post('customer_id');
						$this->db->where(array('id'=>$customer_id));
						$customer=$this->db->get('tb_customer');
						$update['customer_name'] = $customer->row()->customer_name;
						$update['mobile_no'] = $customer->row()->mobile_no;
						
						$this->db->where(array("id"=>$id));
						$this->db->update("tb_subscription", $update);
						$this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Your Data Has Been Updated Successfully !!</p>
										</div>');
						redirect('Subscription/');
				}
		}
		
		public function GetPrice()
		{
			    $str1=null;
			    $str2=null;
			    $id = $this->uri->segment(3);
				$this->db->where(array("(id)"=>$id));
				$dd = $this->db->get('tb_package');
				$str1=' <label for="package_id" class="required">Monthly Price </label>
			                 <input name="monthly_price" readonly class="form-control" value='.$dd->row()->price.'>';
							
				$str2=' <label for="package_id" class="required">Daily Price </label>
			                 <input name="daily_price" readonly class="form-control" value='.$dd->row()->daily_price.'>';
							 
					echo json_encode(array("price"=>$str1,"daily"=>$str2)); 
				
		}

}
