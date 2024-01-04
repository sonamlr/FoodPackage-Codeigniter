
<div class="dashboard-wrapper">
<div class="main-container">
<div class="container-fluid">
					<div class="spacer-xs">
						
			      <div class="row no-gutter">
			        <div class="">
			          <div class="panel panel-default">
			            <div class="panel-heading">
										<h4>Change Password</h4>
										<!--<ul class="links">
											<li>
												<a href="javascript:window.history.go(-1);" title="back""> <i class="fa fa-fast-backward backicon" aria-hidden="true"></i></a>
											</li>
										</ul>-->
									</div>
			            <div class="panel-body">
							<?php echo $this->session->flashdata('message');?>
			             <?php echo form_open_multipart("ChangePassword/Add");?>
			               <div class="form-group col-md-4 col-sm-4">
			                  <label for="old" class="required">Old Password</label>
			                  <input type="password" name="old" value="<?php echo set_value('old'); ?>" class="form-control" id="username" placeholder="Type Here">
								<?php echo form_error('old', '<div class="error">', '</div>'); ?>
							</div>
							<div class="form-group col-md-4 col-sm-4">
			                  <label for="new" class="required">New Password</label>
			                  <input type="password" name="new" value="<?php echo set_value('new'); ?>" class="form-control" id="password" placeholder="Type Here">
								<?php echo form_error('new', '<div class="error">', '</div>'); ?>
							</div>
							<div class="form-group col-md-4 col-sm-4">
			                  <label for="confirm" class="required">Confirm Password</label>
			                  <input type="password" name="confirm" value="<?php echo set_value('confirm'); ?>" class="form-control" id="password" placeholder="Type Here">
								<?php echo form_error('confirm', '<div class="error">', '</div>'); ?>
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