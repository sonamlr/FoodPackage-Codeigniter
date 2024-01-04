<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Package extends CI_Controller {

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
			$this->db->order_by('id','desc');
		    $get =  $this->db->get('tb_package');
			 foreach($get->result_array() as $v)
				 {
					 if($v['status']==0)
						{
							$status = anchor("Package/Deactive/".$v['id'],"<span class='label label label-info' title='If you want to deactive package please click here'>Active</span>",array('onclick'=>"return confirm('Do you want De-Active this record ??')"));
						}
					if($v['status']==1)
						{
							$status = anchor("Package/Active/".$v['id'],"<span class='label label label-danger' title='If you want to deactive package please click here'>De-Active</span>",array('onclick'=>"return confirm('Do you want Active this record ??')"));
						}
					
					$str.='<tr>
					        <td>'.$i.'</td>
							<td><img src="'.base_url().'img/package/'.$v['image'].'" style="width:100px"></td>
							<td>'.$v['name'].'</td>
							<td>'.$v['price'].'</td>
							<td>'.$v['daily_price'].'</td>
							<td>'.$v['type'].'</td>
							<td>'.$status.'</td>
							<td>'.anchor("Package/Edit/".$v['id'],"<i class='fa fa-pencil-square-o edit' title='Edit'  aria-hidden='true'></i>",array('onclick'=>"return confirm('Do you want edit this record ??')")).'
							| '.anchor("MembershipMenu/List/".$v['id'],"<i class='fa fa-bars  eye' title='Menu' aria-hidden='true'></i>",array('onclick'=>"return confirm('Do you want view Menu ??')")).'
						</td> </tr>';
					$i++;
				 }
				$data['list'] = $str;
				$this->load->view('site/header');
				$this->load->view('package/packagelist',$data);
				$this->load->view('site/footer');
 		}
	
	 public function Deactive()
		{
			 $id = $this->uri->segment(3);
			 $this->db->where(array("id"=>$id));
			 $update['status'] = "1";
			 $this->db->update('tb_package',$update);
			  $this->session->set_flashdata('success', '<div class="alert alert-block alert-danger auto_hide fade in ">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Package De-Active Successfully !!</p>
											</div>');
			 redirect('Package/');
		}
	 public function Active()
		 {
			 $id = $this->uri->segment(3);
			 $this->db->where(array("id"=>$id));
			 $update['status'] = "0";
			 $this->db->update('tb_package',$update);
			  $this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in ">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Package Active Successfully !!</p>
											</div>');
			 redirect('Package/');
		 }
	
	
	
	public function Add()
		{
			
			$this->form_validation->set_rules('name','name','required');
			$this->form_validation->set_rules('price','price','required');
			$this->form_validation->set_rules('daily_price','daily_price','required');
			$this->form_validation->set_rules('type','type','required');
			
			if($this->form_validation->run()==False)
				{
					$this->load->view('site/header');
					$this->load->view('package/addpackage');
					$this->load->view('site/footer');
					
				}
			else
				{
					$config['upload_path'] = './img/package/';
					$config['allowed_types'] = 'jpeg|jpg|png';
					$config['max_size'] = '*';
					$config['max_width'] = '*';
					$config['max_height'] = '*';
					$this->upload->initialize($config);
					$this->upload->do_upload('image'); 
					
					$insert['image'] = str_replace(' ', '_', $_FILES['image']['name']);
					$name = ucwords($this->input->post('name'));
					$insert['name'] = $name;
					
					$price = $this->input->post('price');
					$insert['price'] = $price;
					$daily_price = $this->input->post('daily_price');
					$insert['daily_price'] = $daily_price;
					
					$type = $this->input->post('type');
					$insert['type'] = $type;
					$insert['date'] = date('d-m-Y');
					$insert['compare_date'] = strtotime(date('d-m-Y'));
					$this->db->where(array('name'=>$name,'price'=>$price,'type'=>$type));
					$totalRows = $this->db->count_all_results('tb_package');
                   
					if($totalRows!=null)
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
						$this->db->insert('tb_package',$insert);
						//$insetdata['package_id'] =   $this->db->insert_id();
						//$this->db->insert('tb_package_menu',$insetdata);
						$this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in ">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Your Data Has Been Added Successfully !!</p>
											</div>');
					}
					redirect('Package/');
				}
		}
	public function Edit()
		{
			
			$catlist=null;
			$this->form_validation->set_rules('name','name','required');
			$this->form_validation->set_rules('price','price','required');
			$this->form_validation->set_rules('daily_price','daily_price','required');
			$this->form_validation->set_rules('type','type','required');
			
			if($this->form_validation->run()==False)
				{
						$id = $this->uri->segment(3);
						$this->db->where(array("(id)"=>$id));
						$dd = $this->db->get('tb_package');
						$edit['id'] = $dd->row()->id;
						$edit['image']=$dd->row()->image;
						$edit['name'] = $dd->row()->name;
						$edit['price'] = $dd->row()->price;
						$edit['daily_price'] = $dd->row()->daily_price;
						$edit['type'] = $dd->row()->type;
						$this->load->view('site/header');
						$this->load->view('package/editpackage',$edit);
						$this->load->view('site/footer');
				}
			else
				{
						if (!empty($_FILES['image']['name']))
							{
								$config['upload_path'] = './img/package/';
								$config['allowed_types'] = 'jpeg|jpg|png';
							    $config['max_size'] = '*';
								$config['max_width'] = '*';
								$config['max_height'] = '*';
								$this->upload->initialize($config);
								$this->upload->do_upload('image');
								$update['image']= str_replace(' ', '_', $_FILES['image']['name']); 
							}
						
						$id = $this->input->post('id');
						$update['name'] = ucwords($this->input->post('name'));
						$update['price'] = $this->input->post('price');
						$update['daily_price'] = $this->input->post('daily_price');
						$update['type'] = $this->input->post('type');
						$this->db->where(array("id"=>$id));
						$this->db->update("tb_package", $update);
						$this->session->set_flashdata('success', '<div class="alert alert-block alert-success auto_hide fade in ">
											<button data-dismiss="alert" class="close" type="button" data-original-title="">
												x
											</button>
											<p>
											Your Data Has Been Updated Successfully !!</p>
										</div>');
						redirect('Package/');
				}
		}

}
