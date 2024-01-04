<style>
.label
{
	cursor:pointer;
}
</style>
	<div class="dashboard-wrapper">

			<!-- Main Container Start -->
			<div class="main-container">

				<!-- Top Bar Starts -->
				<div class="top-bar clearfix">
					<div class="page-title">
						<h4><div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>Menu Management</h4>
					</div>
					
					<ul class="right-stats hidden-xs" id="mini-nav-right">
					</ul>
				</div>  
				
				<div class="container-fluid">
					<div class="spacer-xs">
					<?php echo $this->session->flashdata('success');  ?>
					<?php echo form_open("MembershipMenu/AddIteam");?>
						<div class="form-group col-lg-3 col-md-12">
							<label for="name" class="required">Item Name</label>
							<input type="text" name="item" placeholder="Enter Item Name" class="form-control" autocomplete="off">
							<input type="hidden" name="pack_id" value="<?php echo $this->uri->segment(3);?>">
						</div>
						<div class="form-group col-lg-3 col-md-12">
							<br/>	
							<input type="submit" name="submit" value="Save" class="btn btn-success" style="line-height: 2;">
						</div> 
					</form>
				
			      <div class="row no-gutter">
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
								<th>Add Ingridenet</th> 
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
			      <!-- Row end --> 
			      </div>
			      <!-- Row end -->

					</div>
					<!-- Spacer ends -->

			</div> 
		</div> 





