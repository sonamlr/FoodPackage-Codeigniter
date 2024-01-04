
<div class="dashboard-wrapper">
<div class="main-container">
<div class="container-fluid">
					<div class="spacer-xs">
					<?php echo $this->session->flashdata('success');  ?>
			      <div class="row no-gutter">
			        <div class="col-12">
			          <div class="panel panel-default">
			            <div class="panel-heading">
							<h4>Add New Menu</h4>
							<ul class="links">
								<li>
									<a href="javascript:window.history.go(-1);" title="back""> <i class="fa fa-fast-backward backicon" aria-hidden="true"></i></a>
								</li>
							</ul>
						</div>
			            <div class="panel-body">
			             <?php echo form_open_multipart("MembershipMenu/List");?>
						 <input type="hidden" value="<?php echo $this->uri->segment(3);?>">
							<div class="form-group col-lg-3 col-md-12">
			                  <label for="protein" class="required">Protein </label>
							  <input type="text" name="protein" class="form-control" id="protein" placeholder="" autocomplete="off">
							  <?php echo form_error('protein', '<div class="error">', '</div>'); ?>
							 </div>
			                <div class="form-group col-lg-3 col-md-12">
			                  <label for="carbo" class="required">Carbohydrate </label>
							   <input type="text" name="carbo" class="form-control" id="carbo" placeholder="" autocomplete="off">
			                 <?php echo form_error('carbo', '<div class="error">', '</div>'); ?>
			                </div>
							
							<div class="form-group col-lg-3 col-md-12" id='price'>
			                 <label for="sugar" class="required">Sugar </label>
							 <input type="text" name="sugar" class="form-control" id="sugar" placeholder="" autocomplete="off">
							 <?php echo form_error('sugar', '<div class="error">', '</div>'); ?>
			                </div>
							<div class="form-group col-lg-3 col-md-12" id='price'>
			                 <label for="fiber" class="required">Fiber </label>
							 <input type="text" name="fiber" class="form-control" id="fiber" placeholder="" autocomplete="off">
							 <?php echo form_error('fiber', '<div class="error">', '</div>'); ?>
			                </div>
							<div class="form-group col-lg-3 col-md-12" id='price'>
			                 <label for="fat" class="required">Fat </label>
							 <input type="text" name="fat" class="form-control" id="fat" placeholder="" autocomplete="off">
							 <?php echo form_error('fat', '<div class="error">', '</div>'); ?>
			                </div>
							<div class="form-group col-lg-3 col-md-12" id='price'>
			                 <label for="cholesterol" class="required">Cholesterol </label>
							 <input type="text" name="cholesterol" class="form-control" id="cholesterol" placeholder="" autocomplete="off">
							 <?php echo form_error('cholesterol', '<div class="error">', '</div>'); ?>
			                </div>
							<div class="form-group col-lg-3 col-md-12" id='price'>
			                 <label for="sodium" class="required">Sodium </label>
							 <input type="text" name="sodium" class="form-control" id="sodium" placeholder="" autocomplete="off">
							 <?php echo form_error('sodium', '<div class="error">', '</div>'); ?>
			                </div>
						  <button type="submit" class="btn btn-success" style=" margin-top: 25px;">Submit</button>
			              </form>
						 </div>
						
			          </div>
			        </div>
			       
			      </div>
					</div>
				</div>
				</div>
				</div>
