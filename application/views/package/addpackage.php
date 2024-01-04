
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
										<h4>Add New Package</h4>
										<ul class="links">
											<li>
												<a href="javascript:window.history.go(-1);" title="back""> <i class="fa fa-fast-backward backicon" aria-hidden="true"></i></a>
											</li>
										</ul>
									</div>
			            <div class="panel-body">
			             <?php echo form_open_multipart("Package/Add");?>
						 
			                <div class="form-group col-lg-3 col-md-12">
			                  <label for="name" class="required">Name</label>
			                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Package Name">
							  <?php echo form_error('name', '<div class="error">', '</div>'); ?>
			                </div>
							<div class="form-group col-lg-3 col-md-12">
			                  <label for="price" class="required">Monthly Price</label>
			                  <input type="number" name="price" class="form-control" id="price" placeholder="Enter Your Price">
							  <?php echo form_error('price', '<div class="error">', '</div>'); ?>
			                </div> 
							<div class="form-group col-lg-3 col-md-12">
			                  <label for="daily_price" class="required">Daily Deduct</label>
			                  <input type="number" name="daily_price" class="form-control" id="daily_price" placeholder="Enter Your Price">
							  <?php echo form_error('daily_price', '<div class="error">', '</div>'); ?>
			                </div> 
							
							<div class="form-group col-lg-3 col-md-12">
			                  <label for="type" class="required">Type</label>
			                  <select name='type' class='form-control'>
							  <option value=''>Select...</option>
							  <option value='Veg'>Veg</option>
							  <option value='Non-Veg'>Non-Veg</option>
							  <option value='Both'>Both</option>
							  </select>
							  <?php echo form_error('type', '<div class="error">', '</div>'); ?>
			                </div>
							<div class="form-group col-lg-3 col-md-12">
			                  <label for="image" class="required">Image</label>
			                  <input type="file" name="image" class="form-control" id="image" placeholder="Image">
								<?php echo form_error('image', '<div class="error">', '</div>'); ?>
							</div>
			                <button type="submit" style="margin-top: 25px;" class="btn btn-success">Submit</button>
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
