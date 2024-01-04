
	<div class="dashboard-wrapper">

			<!-- Main Container Start -->
			<div class="main-container">

				<!-- Top Bar Starts -->
				<div class="top-bar clearfix">
					<div class="page-title">
						<h4><div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>Subscription Payment</h4>
					</div>
					<ul class="right-stats hidden-xs" id="mini-nav-right">
						<!--<li class="reportrange btn btn-success">
							<i class="fa fa-calendar"></i>
							<span></span> <b class="caret"></b>
						</li>-->
						<!--<li>
						<?php echo anchor("Payment/Add/","<i class='fa fa-plus-circle' aria-hidden='true'> Subscription</i>",'class="btn btn-info sb-open-right  sb-close"');?>
						 
						</li>-->
						<li>
						  <?php echo form_open_multipart("SubscriptionBalance/");?>
						<div class="custom-search hidden-sm hidden-xs pull-left">
						  <input type="text" name='search' class="search-query" placeholder="Search here">
							<input type='submit' class="btn btn-xs btn-success btn-rounded" value='Search'></i>
						</div>
						 <?php echo form_close(); ?>
						</li>
					</ul>
				</div>  
				
				<div class="container-fluid">
					<div class="spacer-xs">
					<?php echo $this->session->flashdata('success');  ?>
			      <div class="row no-gutter">
			        <div class="col-md-12 col-sm-12 col-sx-12">
			          <div class="panel panel-default">
			            <div class="panel-heading">
										<h4><?php echo $customer_name;?>-<?php echo $mobile_no;?></h4>
										<ul class="links">
											<li>
												<a href="#">
													<i class="fa fa-table"></i>
												</a>
											</li>
										</ul>
									</div>
			            <div class="panel-body">
						 <?php echo form_open_multipart("Payment/Insert");?>
						  <div class="form-group col-lg-3 col-md-12">
			                  <label for="customer_id" class="required">Customer </label>
			                  <input type='hidden' name='customer_id' value='<?php echo $customer_id;?>'>
			                  <input type='hidden' name='subsc' value='<?php echo $sub_id;?>'>
			                  <input type='hidden' name='package_id' value='<?php echo $package_id;?>'>
			                  <input type='text'  value='<?php echo $customer_name;?>-<?php echo $mobile_no;?>' class='form-control' readonly>
							
			                </div>
			                <div class="form-group col-lg-2 col-md-12">
			                  <label for="package_id" class="required">Monthly price </label>
			                 <input type='number'   value='<?php echo $price;?>' class='form-control' readonly>
							 </div>
							 <div class="form-group col-lg-2 col-md-12">
			                  <label for="debit" class="required">Deduct price </label>
			                 <input type='number' name='debit'  value='<?php echo $daily_price;?>' class='form-control' readonly>
							 </div>
							 <div class="form-group col-lg-2 col-md-12">
			                  <label for="type" class="required">Type</label>
			                  <select name='payment_type' class='form-control' onchange='GetType(this.value)'>
							  <option value=''>Select...</option>
							  <option value='Cash'>Cash</option>
							  <option value='Online'>Online</option>
			                  </select>
							</div>
							<script>
							function GetType(a)
							{
								//alert(a);
								if(a=='Online')
								{
									$('#file').show();
								}
								else
								{
									$('#file').hide();
								}
							}
							</script>
							 <div class="form-group col-lg-3 col-md-12" style='display:none;' id='file'>
			                  <label for="debit" class="required">Upload File</label>
			                 <input type='file' name='file'  value='' class='form-control' >
							 </div>
							
			                <button type="submit" class="btn btn-success" style='    margin-top: 25px;'>Submit</button>
			              </form>
						
						</div>
			            <div class="">
			              <div class="table-responsive">
			                <table class="table table-condensed table-striped table-bordered table-hover no-margin">
			                  <thead>
			                    <tr> 
								 <th>S.N.</th>
								 <th>Date</th>
								<th>Package</th>
								<th>Credit</th>
								<th>Debit</th>
								<th>Balance</th>
								<th>Payment Type</th>
								<th>View</th>
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





