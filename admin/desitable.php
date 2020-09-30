<?php 
	include("header.php");
?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Tables</a>
							</li>
							<li class="active"></li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>
													
													
												</tr>
											</thead>

											
										</table>
									</div><!-- /.span -->
								</div><!-- /.row -->

								
								

	<!--Employee table start-->					
		

								<div class="row">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue">Designation
										<?php 
											if(!$con){
												echo "Connection failed !";
											}
										?>
										</h3>
										<?php
										if(isset($_GET['msg']))
										{
											
										
													if($_GET['msg']==1)
													{
														echo "<div class='alert alert-info' id='msgbox'>
											<button class='close' data-dismiss='alert'>
												<i class='ace-icon fa fa-times'></i>
											</button>Successfully Inserted</div>";
													}
													if($_GET['msg']==2)
													{
														echo "<div class='alert alert-info' id='msgbox'>
											<button class='close' data-dismiss='alert'>
												<i class='ace-icon fa fa-times'></i>
											</button>Successfully Updated</div>";
													}
													if($_GET['msg']==3)
													{
														echo "<div class='alert alert-info' id='msgbox'>
											<button class='close' data-dismiss='alert'>
												<i class='ace-icon fa fa-times'></i>
											</button>Deleted Successfully</div>";
													}
											} ?>
											<script type="text/javascript">
												setTimeout(function(){
													$("#msgbox").fadeOut(1000);
												},3000);
											</script>
										

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<a href="desiinsert.php" class="btn btn-success">Insert new Designation</a>
										
										<div class="table-header">
											Designation Record
											
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																
																<span class="lbl"></span>
															</label>
														</th>
														
														<th>ID</th>
														
														
														<th>Designation name</th>											

														<th>Status</th>
														<td>action</td>
													</tr>
												</thead>
	<tbody>													
<!-- DUMMY RECORD STARTED -->
												
												
													
										<!-- DUMMY RECORD OVER --><?php 
												$query = "select * from  tbl_designation";
												$res = mysqli_query($con,$query);
												while($result = mysqli_fetch_array($res))
												{		
											
												?>
												<tr>
														<td class="center">
															<label class="pos-rel">
																
																<span class="lbl"></span>
															</label>
														</td>
													
														<td>
															<?php
																echo $result['id'];
															?>														
														</td>
														
														
														<td>
															<?php
																echo $result['desi_name'];
															?>
														</td>
														<td>
														<?php
														if($result['status']==1)
														{
															
													?>
														<span class="label label-success arrowed-in arrowed-in-right">Enable</span>
															<?php
															}
															else{
															
																?>
																<span class="label label-danger arrowed-in arrowed-in-right">Disable</span>
																<?php
															}
																/*echo $res['status'];*/
															?>
														</td>

														

														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="green" href="#">
																	<a href="desiinsert.php?ope=edit&id=<?php echo $result['id']; ?>"><i class="ace-icon fa fa-pencil bigger-130"></i></a>
																</a>

																<a class="red" onclick="return confirm('Are you sure ?')" href="desiinsert.php?ope=delete&id=<?php echo $result['id']; ?>">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>

															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="ace-icon fa fa-search-plus bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>
												<?php 
														}
													
												?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php
			include("footer.php");
			?>