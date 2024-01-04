<style>
.label
{
	cursor:pointer;
}
.flex1
{
	 display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
}

</style>
	<div class="dashboard-wrapper">
			<div class="main-container">
				<div class="top-bar clearfix">
					<div class="page-title">
						<h4><div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>Permission Management</h4>
					</div>
					<ul class="right-stats hidden-xs" id="mini-nav-right">
					<!--<li>
						<?php echo anchor("Permissin/Add/","<i class='fa fa-plus-circle' aria-hidden='true'> Staff</i>",'class="btn btn-info sb-open-right  sb-close" style="margin-bottom: 44px;"');?>
						 
						</li>-->
						
					</ul>
				</div>  
				
				<div class="container-fluid">
					<div class="spacer-xs">
					<?php echo $this->session->flashdata('success');  ?>
			      <div class="row no-gutter">
			        <div class="col-md-12 col-sm-12 col-sx-12">
			          <div class="panel panel-default">
			            <div class="panel-heading">
										<h4><?php echo $staffname;?></h4>
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
						   <?php echo form_open_multipart("Permission/updatePermission/");?>
						   <input type='hidden' name='staff_id' value='<?php echo $this->uri->segment(3);?>'>
			                <table class="table table-condensed table-striped table-bordered table-hover no-margin">
			                  <thead>
			                    <tr> 
									<td class="tdpermis">Package</td>
									<td class="flex1">
										<div class="form-check form-check-inline">
										<?php if($package==0)
											{
												$pack1 = "checked";
											}
										else 
											{
												$pack1 = "";
												
											}
										if($package==1)
											{
												
												$pack2 = "checked";
											}
											
										else
											{
												
												$pack2 = "";
											}
										
										?>
										  <input class="form-check-input" type="radio" name="package" id="active" value="0" <?php echo $pack1;?> >
										  <label class="form-check-label" for="active">Active</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="package" id="deactive" value="1" <?php echo $pack2;?>>
										  <label class="form-check-label" for="deactive">Deactive</label>
										</div>
									</td>
			                    </tr> 
								<tr> 
									<td class="tdpermis">Customer & Subscription</td>
									<?php if($customer_subs==0)
											{
												$cust1 = "checked";
											}
										else 
											{
												$cust1 = "";
												
											}
										if($customer_subs==1)
											{
												
												$cust2 = "checked";
											}
											
										else
											{
												
												$cust2 = "";
											}
										
										?>
									<td class="flex1">
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="customer_subs" id="active" value="0" <?php echo $cust1;?>>
										  <label class="form-check-label" for="active">Active</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="customer_subs" id="deactive" value="1" <?php echo $cust2;?>>
										  <label class="form-check-label" for="deactive">Deactive</label>
										</div>
									</td>
			                    </tr>
								<tr> 
									<?php if($subs_appro_manag==0)
											{
												$appro1 = "checked";
											}
										else 
											{
												$appro1 = "";
												
											}
										if($subs_appro_manag==1)
											{
												
												$appro2 = "checked";
											}
											
										else
											{
												
												$appro2 = "";
											}
										
										?>
									<td class="tdpermis">Subscription Approval</td>
									<td class="flex1">
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="subs_appro_manag" id="active" value="0" <?php echo $appro1;?>>
										  <label class="form-check-label" for="active">Active</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="subs_appro_manag" id="deactive" value="1" <?php echo $appro2;?>>
										  <label class="form-check-label" for="deactive">Deactive</label>
										</div>
									</td>
			                    </tr>	
								<tr>
									<?php if($sub_balance==0)
											{
												$bal1 = "checked";
											}
										else 
											{
												$bal1 = "";
												
											}
										if($sub_balance==1)
											{
												
												$bal2 = "checked";
											}
											
										else
											{
												
												$bal2 = "";
											}
										
										?>
									<td class="tdpermis">Subscription Balance</td>
									<td class="flex1">
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="sub_balance" id="active" value="0" <?php echo $bal1;?>>
										  <label class="form-check-label" for="active">Active</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="sub_balance" id="deactive" value="1" <?php echo $bal2;?>>
										  <label class="form-check-label" for="deactive">Deactive</label>
										</div>
									</td>
			                    </tr>
								<tr> 
								<?php if($subs_payment==0)
											{
												$pay1 = "checked";
											}
										else 
											{
												$pay1 = "";
												
											}
										if($subs_payment==1)
											{
												
												$pay2 = "checked";
											}
											
										else
											{
												
												$pay2 = "";
											}
										
										?>
									<td class="tdpermis">Subscription Payment</td>
									<td class="flex1">
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="subs_payment" id="active" value="0" <?php echo $pay1;?>>
										  <label class="form-check-label" for="active">Active</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="subs_payment" id="deactive" value="1" <?php echo $pay2;?>>
										  <label class="form-check-label" for="deactive">Deactive</label>
										</div>
									</td>
			                    </tr>
								<tr> 
									<td class="tdpermis">Staff</td>
									<td class="flex1">
									<?php if($staff==0)
											{
												$staff1 = "checked";
											}
										else 
											{
												$staff1 = "";
												
											}
										if($staff==1)
											{
												
												$staff2 = "checked";
											}
											
										else
											{
												
												$staff2 = "";
											}
										
										?>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="staff" id="active" value="0" <?php echo $staff1;?>>
										  <label class="form-check-label" for="active">Active</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="staff" id="deactive" value="1" <?php echo $staff2;?>>
										  <label class="form-check-label" for="deactive">Deactive</label>
										</div>
									</td>
			                    </tr>
								
			                  </thead>
			                  <tbody>
			                     
			                  </tbody>
			                </table> <br>
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
		</div> 

<?php 
    echo set_value('trailer', $row->videotype) == 1 ? "checked" : ""; 
?>



