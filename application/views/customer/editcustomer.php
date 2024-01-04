
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
										<h4>Edit Customer</h4>
										<ul class="links">
											<li>
												<a href="javascript:window.history.go(-1);" title="back""> <i class="fa fa-fast-backward backicon" aria-hidden="true"></i></a>
											</li>
										</ul>
									</div>
			            <div class="panel-body">
			             <?php echo form_open_multipart("Customer/Edit/".$this->uri->segment(3));?>
						 <input type='hidden' name='id' value='<?php echo $id; ?>'>
			                <div class="form-group col-lg-6 col-md-12">
			                  <label for="customer_name" class="required">Customer Name</label>
			                  <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="Enter Your Customer Name" value="<?php echo $customer_name;?>">
							  <?php echo form_error('customer_name', '<div class="error">', '</div>'); ?>
			                </div>
							<div class="form-group col-lg-6 col-md-12">
			                  <label for="mobile_no" class="required">Mobile No.</label>
			                  <input type="text"  name="mobile_no" class="form-control" id="mobile_no" onkeyup='Getno(this.value)' placeholder="Enter Your Mobile No" value="<?php echo $mobile_no;?>">
							  <?php echo form_error('mobile_no', '<div class="error">', '</div>'); ?>
							   <script>
							  function Getno(a)
								  {
									   var get_value = a;
													if($.isNumeric( get_value )  && get_value.length < 11)
													{ 
														 $("#mobile_no").val(get_value);
													}
													else
													{ 
														get_value = get_value.slice(0, -1);
														 $("#mobile_no").val(get_value);
													} 
								  }
								   
								
							  </script>
			                </div> 
							<div class="form-group col-lg-12 col-md-12">
			                  <label for="address" class="required">Type</label>
							    <textarea name='address' class='form-control'  id="address"><?php echo $address;?></textarea>
			                  <?php echo form_error('address', '<div class="error">', '</div>'); ?>
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