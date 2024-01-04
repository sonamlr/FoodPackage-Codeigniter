
<div class="dashboard-wrapper">
<div class="main-container">
<div class="container-fluid">
					<div class="spacer-xs">
					<?php echo $this->session->flashdata('success');  ?>
			      <div class="row no-gutter">
			        <div class="col-12">
			          <div class="panel panel-default">
			            <div class="panel-heading">
							<h4>Add New Staff</h4>
							<ul class="links">
								<li>
									<a href="javascript:window.history.go(-1);" title="back""> <i class="fa fa-fast-backward backicon" aria-hidden="true"></i></a>
								</li>
							</ul>
						</div>
			            <div class="panel-body">
			             <?php echo form_open_multipart("Staff/Add");?>
							<div class="form-group col-lg-3 col-md-12">
			                  <label for="name" class="required">Name </label>
							  <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" autocomplete="off">
							  <?php echo form_error('name', '<div class="error">', '</div>'); ?>
							 </div>
			                <div class="form-group col-lg-3 col-md-12">
			                  <label for="username" class="required">Username </label>
							   <input type="text" name="username" class="form-control" id="name" placeholder="Enter Your Username" autocomplete="off">
			                 <?php echo form_error('username', '<div class="error">', '</div>'); ?>
			                </div>
							
							<div class="form-group col-lg-3 col-md-12" id='price'>
			                 <label for="password" class="required">Password </label>
							 <input type="text" name="password" class="form-control" id="password" placeholder="Enter Your Password" autocomplete="off">
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
