<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends CI_Controller {

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
			$str=null;
			$customers=null;
			
			
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
				
				
				$data['list'] = $str;
			
					$this->load->view('site/header');
					$this->load->view('payment/paymentadd',$data);
					$this->load->view('site/footer');
					
				
				
 		}
	
	public function Add()
		{
			$str=null;
			$customers=null;
			
			
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
				
				 $customerid=$this->uri->segment(3);
				 
					 $i=1;
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
							<td>
							'.anchor("Payment/AddPayment/".$sub['package_id'],"<i class='fa fa-eye eye' aria-hidden='true'></i>",array('onclick'=>"return confirm('Do you want edit this record ??')")).'
						</td> </tr>';
					$i++;
				 }
				
				$data['list'] = $str;
			
					$this->load->view('site/header');
					$this->load->view('payment/paymentadd',$data);
					$this->load->view('site/footer');
					
				
				
 		}
	public function AddPayment()
		{
			$str=null;
			$this->db->order_by('id', 'desc');
			$id = $this->uri->segment(3);
			$this->db->where(array("sub_id"=>$id));
			$get = $this->db->get('tb_ledger');
			$i=1;
			$prev=0;
			 foreach($get->result_array() as $sub)
				 {
					$this->db->where(array('id'=>$sub['customer_id']));
					$customer= $this->db->get('tb_customer');
					$this->db->where(array('id'=>$sub['package_id']));
					$package= $this->db->get('tb_package');
					  $blc = $sub['credit']+$prev-$sub['debit'];	
					  if($sub['payment_type']=='Online')
					  {
						  $img=anchor("payment/".$sub['file'],"<i class='fa fa-file' aria-hidden='true'></i>",array('onclick'=>"return confirm('Do you view this file ??'), target='_blank'")); 
					  }
					  else
					  {
						  $img=null;
					  }
					$str.='<tr>
					        <td>'.$i.'</td>
					        <td>'.$sub['date'].'</td>
							<td>'.$package->row()->name.'</td>
							<td class="edit">'.$sub['credit'].'</td>
							<td class="delete">'.$sub['debit'].'</td>
							<td>'.$blc.'</td>
							<td>'.$sub['payment_type'].'</td>
							<td>'.$img.'</td>
							
							 </tr>';
					$i++;
					$prev = $blc;
				 }
				$this->db->where(array('id'=>$sub['customer_id']));
				$customer= $this->db->get('tb_customer');
				$data['customer_id'] = $customer->row()->id;
				$data['customer_name'] = $customer->row()->customer_name;
				$data['mobile_no'] = $customer->row()->mobile_no;
				$this->db->where(array('id'=>$sub['package_id']));
					$package= $this->db->get('tb_package');
					$data['price'] = $package->row()->price;
				$data['daily_price'] = $package->row()->daily_price;
				$data['package_id'] = $package->row()->id;
				$this->db->where(array('id'=>$sub['sub_id']));
					$subsc= $this->db->get('tb_subscription');
					$data['sub_id'] = $subsc->row()->id;
			
				$data['list'] = $str;
	           $this->load->view('site/header');
				$this->load->view('payment/deductpayment',$data);
			
		}
	
	public function Insert()
	{
		    $this->form_validation->set_rules('debit','debit','required');
			$this->form_validation->set_rules('customer_id','customer_id','required');
		if($this->form_validation->run()==False)
				{
					$this->load->view('site/header');
					$this->load->view('payment/deductpayment',$data);
					$this->load->view('site/footer');
					
				}
			else
				{
					
					$package_id = $this->input->post('package_id');
					$insert['package_id'] = $package_id;
					
					$sub_id = $this->input->post('subsc');
					$insert['sub_id'] = $sub_id;
					$customer_id = $this->input->post('customer_id');
					
					$insert['customer_id'] = $customer_id;
					$debit = $this->input->post('debit');
					$insert['debit'] = $debit;
					$this->db->where(array('id'=>$customer_id));
					$customer=$this->db->get('tb_customer');
					
					$mobile_no = $customer->row()->mobile_no;
					$insert['mobile_no'] = $mobile_no;
					
					$payment_type = $this->input->post('payment_type');
					$insert['payment_type'] = $payment_type;
					if($payment_type=='Online')
					{
						$config['upload_path']   ='./paymentimg/';
						$config['allowed_types'] = 'gif|jpg|jpeg|png';
						$config['max_size'] = '*';
						$config['max_width'] = '*';
						$config['max_height'] = '*';   
							$this->upload->initialize($config);
							 $this->upload->do_upload('file');     
					
					$insert['file'] = str_replace(' ', '_', $_FILES['file']['name']);
					}
					
					$date = date('d-m-Y');
					$insert['date'] = $date;
					$insert['compare_date'] = strtotime($date);
					$this->db->where('debit !=','0');
					$this->db->where(array('date'=>$date));
					$this->db->where(array('package_id'=>$package_id));
					
					$totalRows = $this->db->count_all_results('tb_ledger');
                  
					if($totalRows!=null)
					{
							
				    	$this->session->set_flashdata('success', '<div class="alert alert-block alert-danger auto_hide fade in">
										<button data-dismiss="alert" class="close" type="button" data-original-title="">
											x
										</button>
										<p>
										Amount is already deducted  !!</p>
										</div>');
					}
					else
					{
					    
						$this->db->insert('tb_ledger',$insert);
						
						$this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Your Data Has Been Added Successfully !!</p>
											</div>');
					}
					redirect('Payment/AddPayment/'.$sub_id);
				}
	}

}
