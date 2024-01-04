
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
										<h4>Edit Package</h4>
										<ul class="links">
											<li>
												<a href="javascript:window.history.go(-1);" title="back""> <i class="fa fa-fast-backward backicon" aria-hidden="true"></i></a>
											</li>
										</ul>
									</div>
			            <div class="panel-body">
			             <?php echo form_open_multipart("Package/Edit/".$this->uri->segment(3));?>
						 <input type='hidden' name='id' value='<?php echo $id; ?>'>
			                <div class="form-group col-lg-3">
			                  <label for="name" class="required">Package Name</label>
			                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Package Name" value="<?php echo $name;?>">
							  <?php echo form_error('name', '<div class="error">', '</div>'); ?>
			                </div>
							<div class="form-group col-lg-3 col-md-12">
			                  <label for="price" class="required">Monthly Price</label>
			                  <input type="number" name="price" class="form-control" id="price" placeholder="Enter Your Price" value="<?php echo $price;?>">
							  <?php echo form_error('price', '<div class="error">', '</div>'); ?>
			                </div> 
							<div class="form-group col-lg-3 col-md-12">
			                  <label for="daily_price" class="required">Daily Deduct</label>
			                  <input type="number" name="daily_price" class="form-control" id="daily_price" placeholder="Enter Your Price" value="<?php echo $daily_price;?>">
							  <?php echo form_error('daily_price', '<div class="error">', '</div>'); ?>
			                </div> 
							<div class="form-group col-lg-3 col-md-12">
			                  <label for="type" class="required">Type</label>
							   <select name='type' class='form-control'>
							  <option value=''>Select...</option>
							  <?php 
							   if($type=="Veg")
								   {
									   $sel="selected";
								   }
							  else
								   {
									   $sel="";
									  
								   }  
							  if($type=="Non-Veg")
								   {
									   $sel1="selected";
								   }
							   else
								   {
									 
									   $sel1="";
								   } 
								if($type=="Both")
								   {
									   $sel2="selected";
								   }
							    else
								   {
									 
									   $sel2="";
								   }
							  ?>
							  <option value='Veg' <?php echo $sel;?>>Veg</option>
							  <option value='Non-Veg' <?php echo $sel1;?>>Non-Veg</option>
							  <option value='Both' <?php echo $sel2;?>>Both</option>
							  </select>
			                  <?php echo form_error('type', '<div class="error">', '</div>'); ?>
			                </div>
							<div class="form-group col-lg-6">
			                  <label for="image" class="required">Image)</label>
							  <input type="file" name="image" value="<?php echo $image; ?>" class="form-control" id="image" placeholder="Type Here">
							  <img src='<?php echo base_url()."packageimg/".$image;?>' style="width:100px">
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

				</div>
				</div>
				</div>