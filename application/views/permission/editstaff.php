
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
							<h4>Edit Staff</h4>
								<ul class="links">
									<li>
										<a href="javascript:window.history.go(-1);" title="back""> <i class="fa fa-fast-backward backicon" aria-hidden="true"></i></a>
									</li>
								</ul>
						</div>
			            <div class="panel-body">
			             <?php echo form_open_multipart("Staff/Edit/".$this->uri->segment(3));?>
						 <input type='hidden' name='id' value='<?php echo $id; ?>'>
			               <div class="form-group col-lg-3 col-md-12">
			                  <label for="name" class="required">Name </label>
							  <input type="text" name="name" class="form-control" id="name" value="<?php echo $name;?>" placeholder="Enter Your Name">
							  <?php echo form_error('name', '<div class="error">', '</div>'); ?>
							 </div>
			                <div class="form-group col-lg-3 col-md-12">
			                  <label for="username" class="required">Username </label>
							   <input type="text" name="username" class="form-control" id="name" value="<?php echo $username;?>" placeholder="Enter Your Username">
			                 <?php echo form_error('username', '<div class="error">', '</div>'); ?>
			                </div>
							
							<div class="form-group col-lg-3 col-md-12" id='price'>
			                 <label for="password" class="required">Password </label>
							 <input type="text" name="password" class="form-control" value="<?php echo $password;?>" id="password" placeholder="Enter Your Password">
							 <?php echo form_error('password', '<div class="error">', '</div>'); ?>
			                </div>
							
							
			                <button type="submit" class="btn btn-success">Submit</button>
			              </form>
			            </div>
			          </div>
			        </div>
			       
			      </div>
				</div>
				</div>
				</div>
				</div>