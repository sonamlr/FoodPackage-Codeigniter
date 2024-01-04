<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Document extends CI_Controller {

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
					 if($sub['approval']==0)
					 {
						 $sta="<span class='text-danger'>Pending</span>";
						$action=anchor("Document/Approval/".$sub['sub_id'],"<i class='fa fa-check-circle edit' title='Approve' aria-hidden='true'></i>",array('onclick'=>"return confirm('Do you want approve this record ??')"));
							 
					 } 
					if($sub['approval']==1)
					 {
						 $sta="<span class='text-success'>Approved</span>";
						 $action=null;
						
					 }
					if($sub['approval']==2)
					 {
						 $sta="<span class='text-danger'>Rejected</span>";
						  $action=null;
					 }
					
					$str.='<tr>
					        <td>'.$i.'</td>
					        <td>'.$sub['date'].'</td>
							<td>'.$customer->row()->customer_name.'</td>
							<td>'.$sub['mobile_no'].'</td>
							<td>'.$package->row()->name.'</td>
							<td>'.$package->row()->price.'</td>
							<td>'.$sub['debit'].'</td>
							<td>'.$package->row()->price-$sub['debit'].'</td>
							<td>'.$sta.'</td>
							<td>'.$action.'
							</td>
							
							 </tr>';
					$i++;
				 }
				$data['list'] = $str;
				$this->load->view('site/header');
				$this->load->view('document/docapproval',$data);
				$this->load->view('site/footer');
 		}
		
	
	 public function Approval()
		 {
			 $id = $this->uri->segment(3);
			 $this->db->where(array("id"=>$id));
			 $update['approval'] = "1";
			 $this->db->update('tb_subscription',$update);
			  $this->db->where(array("sub_id"=>$id));
			 $this->db->update('tb_ledger',$update);
			 $this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Subscription Active Successfully !!</p>
											</div>');
			 redirect('Document/');
		 }
 public function Reject()
		 {
			 $id = $this->uri->segment(3);
			 $this->db->where(array("id"=>$id));
			 $update['approval'] = "2";
			 $this->db->update('tb_subscription',$update);
			  $this->db->where(array("sub_id"=>$id));
			 $this->db->update('tb_ledger',$update);
			 $this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Subscription Active Successfully !!</p>
											</div>');
			 redirect('Document/');
		 }


}
