
<div class="dashboard-wrapper">
<div class="main-container">
<div class="container-fluid">

					<!-- Spacer starts -->
					<div class="spacer-xs">
						<!-- Row start -->
			      <div class="row no-gutter">
			        <div class="col-md-12 col-sm-12 col-xs-12">
			          <div class="panel panel-default">
			            <div class="panel-heading">
										<h4>Edit Subscription</h4>
										<ul class="links">
											<li>
												<a href="javascript:window.history.go(-1);" title="back""> <i class="fa fa-fast-backward backicon" aria-hidden="true"></i></a>
											</li>
										</ul>
									</div>
			            <div class="panel-body">
			             <?php echo form_open_multipart("Subscription/Edit/".$this->uri->segment(3));?>
						 <input type='hidden' name='id' value='<?php echo $id; ?>'>
			                <div class="form-group col-lg-6 col-md-12">
			                  <label for="package_id" class="required">Package </label>
			                 <select name='package_id' class="form-control">
									<option value=''>Select Your Package</option>
									<?php echo $package;?>
								</select><?php echo form_error('package_id', '<div class="error">', '</div>'); ?>
			                </div>
							
							  <div class="form-group col-lg-6 col-md-12">
			                  <label for="customer_id" class="required">Customer </label>
			                 <select name='customer_id' class="form-control">
									<option value=''>Select Your Customer</option>
									<?php echo $customer;?>
								</select><?php echo form_error('customer_id', '<div class="error">', '</div>'); ?>
			                </div>
							
							
							
			                <button type="submit" class="btn btn-success">Submit</button>
			              </form>
			            </div>
			          </div>
			        </div>
			       
			      </div>
					</div>
					<!-- Spacer ends -->

				</div>
				</div>
				</div>