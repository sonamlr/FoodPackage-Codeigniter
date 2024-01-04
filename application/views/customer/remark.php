
<div class="dashboard-wrapper">
<div class="main-container">
<div class="container-fluid">

					<!-- Spacer starts -->
					<div class="spacer-xs">
						<!-- Row start -->
			      <div class="row no-gutter">
			        <div class="col-12">
			          <div class="panel panel-default">
			            <div class="panel-heading">
										<h4>Customer Remarks</h4>
										<ul class="links">
											<li>
												<a href="javascript:window.history.go(-1);" title="back""> <i class="fa fa-fast-backward backicon" aria-hidden="true"></i></a>
											</li>
										</ul>
									</div>
			            <div class="panel-body">
			             <?php echo form_open_multipart("Customer/InsertRemarks/".$this->uri->segment(3));?>
						  <input type='hidden' name='id' value='<?php echo $id;?>'>
			                <div class="form-group col-lg-4 col-md-12">
			                  <label for="customer_name" class="required">Name</label>
			                  <input type="text" name="customer_name" class="form-control" id="customer_name" readonly  value="<?php echo $customername;?>">
							  <?php echo form_error('customer_name', '<div class="error">', '</div>'); ?>
			                </div>
							<div class="form-group col-lg-4 col-md-12">
			                  <label for="mobile_no" class="required">Mobile No.</label>
			                  <input type="text" name="mobile_no" class="form-control" id="mobile_no"  readonly value="<?php echo $mobile_no;?>">
							  <?php echo form_error('mobile_no', '<div class="error">', '</div>'); ?>
							</div> 
							
							<div class="form-group col-lg-4 col-md-12">
			                  <label for="type" class="required">Type</label>
			                  <input type="text" name="type" class="form-control" id="type"  readonly value="<?php echo $type;?>">
							  <?php echo form_error('type', '<div class="error">', '</div>'); ?>
							</div> 
							
							<div class="form-group col-lg-12 col-md-12">
			                  <label for="address" class="required">Home Address</label>
			                  <textarea name='address' class='form-control'  id="address" readonly><?php echo $address;?></textarea>
							  <?php echo form_error('address', '<div class="error">', '</div>'); ?>
			                </div>
							<div class="form-group col-lg-12 col-md-12">
			                  <label for="address" class="required">Office Address</label>
			                  <textarea name='address' class='form-control'  id="address" readonly><?php echo $office_address;?></textarea>
							  <?php echo form_error('address', '<div class="error">', '</div>'); ?>
			                </div>
							<div class="form-group col-lg-12 col-md-12">
			                  <label for="address" class="">GYM Address (optional)</label>
			                  <textarea name='address' class='form-control'  id="address" readonly><?php echo $gym_address;?></textarea>
							  <?php echo form_error('address', '<div class="error">', '</div>'); ?>
			                </div>
							<div class="form-group col-lg-12 col-md-12">
			                  <label for="address" class="">Other Address (optional)</label>
			                  <textarea name='address' class='form-control'  id="address" readonly><?php echo $other_address;?></textarea>
							  <?php echo form_error('address', '<div class="error">', '</div>'); ?>
			                </div>
							<div class="form-group col-lg-12 col-md-12">
			                  <label for="remark" class="required">Remark</label>
			                  <textarea name='remarks' class='form-control'  id="remarks" required ><?php echo $remarks;?></textarea>
							  <?php echo form_error('remark', '<div class="error">', '</div>'); ?>
			                </div>
						
			                <button type="submit" class="btn btn-success">Submit</button>
			              </form>
			            </div>
			          </div>
			        </div>
			       
			      </div>
					</div>
					<!-- Spacer ends -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
					<script>
						function cat(a,b)
						{
							
							 id ="#description_"+b;
							if(a==null || a=="")
								{ 
									$(id).val("");
									$(id).prop("disabled", true);
									
									
								}
								else
								{ 
									$(id).prop("disabled", false);
								}  
						}
					</script>

				</div>
				</div>
				</div>
