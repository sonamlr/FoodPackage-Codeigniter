
<div class="dashboard-wrapper">
<div class="main-container">
<div class="container-fluid">

					<!-- Spacer starts -->
					<div class="spacer-xs">
					<?php echo $this->session->flashdata('success');  ?>
						<!-- Row start -->
			      <div class="row no-gutter">
			        <div class="col-12">
			          <div class="panel panel-default">
			            <div class="panel-heading">
										<h4>Add New Subscription</h4>
										<ul class="links">
											<li>
												<a href="javascript:window.history.go(-1);" title="back""> <i class="fa fa-fast-backward backicon" aria-hidden="true"></i></a>
											</li>
										</ul>
									</div>
			            <div class="panel-body">
			             <?php echo form_open_multipart("Subscription/Add");?>
						  <div class="form-group col-lg-3 col-md-12">
			                  <label for="customer_id" class="required">Customer </label>
			                 <select name='customer_id' class="form-control " onchange='GetCustomer(this.value)'>
									<option value=''>Select Your Customer</option>
									<?php echo $customer;?>
								</select><?php echo form_error('customer_id', '<div class="error">', '</div>'); ?>
								<script>
								function GetCustomer(a)
								{
									
									var url='<?php echo base_url('Subscription/Add/');?>'+a;
									
									window.location.replace(url);
								}
								</script>
			                </div>
			                <div class="form-group col-lg-3 col-md-12">
			                  <label for="package_id" class="required">Package </label>
			                 <select name='package_id' class="form-control" onchange='GetPrice(this.value)'>
									<option value=''>Select Your Package</option>
									<?php echo $package;?>
								</select><?php echo form_error('package_id', '<div class="error">', '</div>'); ?>
			                </div>
							
							<div class="form-group col-lg-3 col-md-12" id='price'>
			                 
			                </div>
							<div class="form-group col-lg-3 col-md-12" id='dailyprice'>
			                    
			                </div>
							
							 
						
			                <button type="submit" class="btn btn-success">Submit</button>
			              </form>
						  </div>
						 <div class="">
						 <div class="table-responsive">
			                <table class="table table-condensed table-striped table-bordered table-hover no-margin">
			                  <thead>
			                    <tr> 
								 <th>S.N.</th>
								 <th>Date</th>
								<th>Customer Name</th>
								<th>Mobile No.</th>
								<th>Package Name</th>
								<th>Monthly Price</th>
								<th>Balance</th>
								<th>Status</th>
								<th>Action</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                     <?php echo $list;?>
			                  </tbody>
			                </table>
			              </div>
			            </div>
			          </div>
			        </div>
			       
			      </div>
					</div>
					<!-- Spacer ends -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
					<script>
						function GetPrice(a)
						{
							var url='<?php echo base_url('Subscription/GetPrice')?>/'+a;
							
							$.get( url, function( data ) {
							  $( "#price" ).html( data.price );
							  $( "#dailyprice" ).html( data.daily );
							},"json"); 
							
						}
					</script>

				</div>
				</div>
				</div>
