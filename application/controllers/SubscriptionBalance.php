<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SubscriptionBalance extends CI_Controller {

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
		          
					 $sql="select * from tb_ledger where 
				mobile_no LIKE '%".$search."%'
				or credit LIKE '%".$search."%' " ;
					
			         $get  =  $this->db->query($sql);
					 
				}
			else
				{
					
					// $this->db->group_by("package_id");
					// $this->db->order_by("id", "desc");
					 // $get =  $this->db->get('tb_ledger');
				
			$this->db->select('tb_ledger.*');
            $this->db->select('SUM(tb_ledger.credit) as credit');
            $this->db->select('SUM(tb_ledger.debit) as debit');
			$this->db->group_by("package_id");
			$this->db->order_by("id", "desc");
            $this->db->from('tb_ledger');
            $get = $this->db->get();
					 
				}
		  
			 foreach($get->result_array() as $sub)
				 {
					$this->db->where(array('id'=>$sub['customer_id']));
					$customer= $this->db->get('tb_customer');
					$this->db->where(array('id'=>$sub['package_id']));
					$package= $this->db->get('tb_package');
					 
					$str.='<tr>
					        <td>'.$i.'</td>
					        <td>'.$sub['date'].'</td>
							<td>'.$customer->row()->customer_name.'</td>
							<td>'.$sub['mobile_no'].'</td>
							<td>'.$package->row()->name.'</td>
							<td>'.$sub['credit'].'</td>
							<td>'.$sub['debit'].'</td>
							<td>'.$sub['credit']-$sub['debit'].'</td>
							<td>'.anchor("SubscriptionBalance/View/".$sub['sub_id'],"<i class='fa fa-eye eye' aria-hidden='true'></i>",array('onclick'=>"return confirm('Do you want edit this record ??')")).'</td>
							
							 </tr>';
					$i++;
				 }
				$data['list'] = $str;
				$this->load->view('site/header');
				$this->load->view('subscriptionbalance/subscriptionballist',$data);
				$this->load->view('site/footer');
 		}
		public function View()
		{
			$str=null;
			$id = $this->uri->segment(3);
			$this->db->where(array("sub_id"=>$id));
			$get = $this->db->get('tb_ledger');
			$i=1;
			 foreach($get->result_array() as $sub)
				 {
					$this->db->where(array('id'=>$sub['customer_id']));
					$customer= $this->db->get('tb_customer');
					$this->db->where(array('id'=>$sub['package_id']));
					$package= $this->db->get('tb_package');
					 
					$str.='<tr>
					        <td>'.$i.'</td>
					        <td>'.$sub['date'].'</td>
							<td>'.$package->row()->name.'</td>
							<td class="edit">'.$sub['credit'].'</td>
							<td class="delete">'.$sub['debit'].'</td>
							<td>'.$package->row()->price-$sub['debit'].'</td>
							
							 </tr>';
					$i++;
				 }
				$this->db->where(array('id'=>$sub['customer_id']));
				$customer= $this->db->get('tb_customer');
				$data['customer_name'] = $customer->row()->customer_name;
				$data['mobile_no'] = $get->row()->mobile_no;
				
				$data['list'] = $str;
	           $this->load->view('site/header');
				$this->load->view('subscriptionbalance/subscriptionbalview',$data);
				 $this->load->view('site/footer');
			
		}
	
	


}
