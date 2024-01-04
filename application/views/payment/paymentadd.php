
	<div class="dashboard-wrapper">
			<div class="main-container">
				<div class="top-bar clearfix">
					<div class="page-title">
						<h4><div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>Subscription Payment</h4>
					</div>
					<ul class="right-stats hidden-xs" id="mini-nav-right">
						<!--<li class="reportrange btn btn-success">
							<i class="fa fa-calendar"></i>
							<span></span> <b class="caret"></b>
						</li>-->
						<!--<li>
						<?php echo anchor("SubscriptionBalance/Add/","<i class='fa fa-plus-circle' aria-hidden='true'> Subscription</i>",'class="btn btn-info sb-open-right  sb-close"');?>
						 
						</li>-->
						<!--<li>
						  <?php echo form_open_multipart("SubscriptionBalance/");?>
						<div class="custom-search hidden-sm hidden-xs pull-left">
						  <input type="text" name='search' class="search-query" placeholder="Search here">
							<input type='submit' class="btn btn-xs btn-success btn-rounded" value='Search'></i>
						</div>
						 <?php echo form_close(); ?>
						</li>-->
					</ul>
				</div>  
				
				<div class="container-fluid">
					<div class="spacer-xs">
					<?php echo $this->session->flashdata('success');?>
			      <div class="row no-gutter">
			        <div class="col-md-12 col-sm-12 col-sx-12">
			          <div class="panel panel-default">
			            <div class="panel-heading">
										<h4></h4>
										<ul class="links">
											
										</ul>
									</div>
			            <div class="panel-body">
			              <?php echo form_open_multipart("Subscription/Add");?>
						  <div class="form-group col-lg-3 col-md-12">
			                  <label for="customer_id" class="required">Customer </label>
			                 <select name='customer_id' class="form-control" onchange='GetCustomer(this.value)'>
									<option value=''>Select Your Customer</option>
									<?php echo $customer;?>
								</select><?php echo form_error('customer_id', '<div class="error">', '</div>'); ?>
								<script>
								function GetCustomer(a)
								{
									
									var url='<?php echo base_url('Payment/Add/');?>'+a;
									
									window.location.replace(url);
								}
								</script>
			                </div>
			                
							<div class="form-group col-lg-3 col-md-12" id='price'>
			                 
			                </div>
			              </form>
						   
			            </div>
						<?php if($this->uri->segment(3) !=null)
							{
							?>
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
							<?php }?>
			          </div>
			        </div>
			      </div>
			      </div>
				</div>
			</div> 
		</div> 





