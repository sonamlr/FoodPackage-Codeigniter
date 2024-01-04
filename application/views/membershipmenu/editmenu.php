
<div class="dashboard-wrapper">
<div class="main-container">
<div class="container-fluid">

					<!-- Spacer starts -->
					<div class="spacer-xs">
					<?php echo $this->session->flashdata('success');  ?>
			      <div class="row no-gutter">
			        <div class="col-md-12 col-sm-12 col-xs-12">
			          <div class="panel panel-default">
			            <div class="panel-heading">
							<h4>Add Ingredients</h4>
								<ul class="links">
									<li>
										<a href="javascript:window.history.go(-1);" title="back""> <i class="fa fa-fast-backward backicon" aria-hidden="true"></i></a>
									</li>
								</ul>
						</div>
			            <div class="panel-body">
			             <?php echo form_open_multipart("Ingredient/AddIngredient/");?>
						 <input type='hidden' name='item_id' value='<?php echo $this->uri->segment(3);?>'>
			                <div class="form-group col-lg-3 col-md-12">
			                  <label for="ingredient" class="required">Ingredient Name</label>
							  <input type="text" name="ingredient" class="form-control" id="ingredient" placeholder="Enter Name" autocomplete="off" >
							  <?php echo form_error('protein', '<div class="error">', '</div>'); ?>
							 </div>
			                <div class="form-group col-lg-3 col-md-12">
			                  <label for="value" class="required">Value </label>
							   <input type="text" name="value" class="form-control" id="value" placeholder="Enter Value" autocomplete="off" >
			                 <?php echo form_error('carbo', '<div class="error">', '</div>'); ?>
			                </div>
			                <button type="submit" class="btn btn-success" style="margin-top: 25px;">Save</button>
			              </form>
						  
								  <div class="col-md-12 col-sm-12 col-sx-12">
								  <div class="panel panel-default">
									<div class="panel-heading">
													<h4>Table</h4>
													<ul class="links">
														<li>
															<a href="#">
																<i class="fa fa-table"></i>
															</a>
														</li>

													</ul>
												</div>
									<div class="panel-body">
									 <div class="table-responsive">					
									<table class="table table-condensed table-striped table-bordered table-hover no-margin">
										  <thead>
											<tr> 
											 <th>S.N.</th>
											<th>Name</th> 
											<th>Value</th> 
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
			        </div>
			       
			      </div>
				</div>
				</div>
				</div>
				</div>