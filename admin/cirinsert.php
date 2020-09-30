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
								<a href="#">Forms</a>
							</li>
							<li class="active">Form Elements</li>
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
							<h1>
								Form Elements
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Common form elements and layouts
								</small>
							</h1>
						</div><!-- /.page-header -->
								
						
								<?php 
										
										/*if(!isset($_SESSION['username']) && $_SESSION['username']=="" )
										{
											header("Location:index.php");
										}*/

									if($_POST['submit']=="Update")
									{
										
										$title = $_POST['title'];
										$keyword = $_POST['keyword'];
										$description = $_POST['description'];
										$cyndicate = $_POST['cyndicate'];
										$department = $_POST['department'];
										$issue_date = $_POST['issue_date'];
										$status = $_POST['status'];
										
									if(isset($_GET['ope']) && $_GET['ope']=="edit")
										{
	                                    	if($_FILES['image']['error']==0)
			                                {
			                                  	$imagename = rand(111111111,999999999). $_FILES['image']['name'];
			                                   	$tmpname = $_FILES['image']['tmp_name'];	
				                                move_uploaded_file($tmpname,"upload/".$imagename);
				                                $image = $imagename;
	                                    	}
	                                    	else{
												$image=$_POST['hdnimage'];
											}
											/*if($_FILES['audio']['error']==0)
			                                {
			                                  	$audioname = rand(111111111,999999999). $_FILES['audio']['name'];
			                                   	$tmpname = $_FILES['audio']['tmp_name'];	
				                                move_uploaded_file($tmpname,"upload/".$audioname);
				                                $audio = $audioname;
	                                    	}
	                                    	else{
												$audio=$_POST['hdnaudio'];
											}
											if($_FILES['file']['error']==0)
			                                {
			                                  	$filename = rand(111111111,999999999). $_FILES['file']['name'];
			                                   	$tmpname = $_FILES['file']['tmp_name'];	
				                                move_uploaded_file($tmpname,"upload/".$filename);
				                                $file = $filename;
	                                    	}
	                                    	else{
												$file=$_POST['hdnfile'];
											}
											if($_FILES['video']['error']==0)
			                                {
			                                  	$videoname = rand(111111111,999999999). $_FILES['video']['name'];
			                                   	$tmpname = $_FILES['video']['tmp_name'];	
				                                move_uploaded_file($tmpname,"upload/".$videoname);
				                                $video = $videoname;
	                                    	}
	                                    	else{
												$video=$_POST['hdnvideo'];
											}*/
										
											
											$query = "update tbl_circular set title='".$title."',keyword='".$keyword."',description='".$description."',image='".$image."',cyndicate='".$cyndicate."',department='".$department."',issue_date='".$issue_date."',status='".$status."' where id=".$_GET['id'];
											$res = mysqli_query($con,$query);
											if($res)
											{
												//echo $_FILES['image']['name'];
												
												echo "<script>window.location.href='cirtable.php';</script>";
											}
											else
											{
												
												echo "update Fail";
											}
										}
									}
									if($_POST['submit']=="Insert")
									{
										
										$title = $_POST['title'];
										$keyword = $_POST['keyword'];
										$description = $_POST['description'];
										$image=$_POST['image'];
										$cyndicate = $_POST['cyndicate'];
										$department = $_POST['department'];
										$issue_date = $_POST['issue_date'];
										$status = $_POST['status'];
											$image = "";
		                                    if($_FILES['image']['error']==0)
	                                      	{
			                                 $imagename = rand(111111111,999999999). $_FILES['image']['name'];
			                                 $tmpname = $_FILES['image']['tmp_name'];	
			                                 move_uploaded_file($tmpname,"upload/".$imagename);
			                                $image = $imagename;
		                               		}
		                               		/*$audio = "";
		                                    if($_FILES['audio']['error']==0)
	                                      	{
			                                 $audioname = rand(111111111,999999999). $_FILES['audio']['name'];
			                                 $tmpname = $_FILES['audio']['tmp_name'];	
			                                 move_uploaded_file($tmpname,"upload/".$audioname);
			                                $audio = $audioname;
		                               		}
		                               		$video = "";
		                                    if($_FILES['video']['error']==0)
	                                      	{
			                                 $videoname = rand(111111111,999999999). $_FILES['video']['name'];
			                                 $tmpname = $_FILES['image']['tmp_name'];	
			                                 move_uploaded_file($tmpname,"upload/".$videoname);
			                                $video = $videoname;
		                               		}
		                               		$file = "";
		                                    if($_FILES['file']['error']==0)
	                                      	{
			                                 $filename = rand(111111111,999999999). $_FILES['file']['name'];
			                                 $tmpname = $_FILES['file']['tmp_name'];	
			                                 move_uploaded_file($tmpname,"upload/".$filename);
			                                $file = $filename;
		                               		}*/
											
											$query = "insert into tbl_Rcircular (title,keyword,description,image,cyndicate,department,issue_date,status) values('".$title."','".$keyword."','".$description."','".$image."','".$cyndicate."','".$department."','".$issue_date."','".$status."')";
											$res = mysqli_query($con,$query);
											
										
											if($res)
											{
												print_r($query);
												//echo "<script>window.location.href='cirtable.php';</script>";
											}
											else
											{
												
												echo "Insert Fail";
											}
										
									}
									if(isset($_GET['ope']))
									{
										if($_GET['ope']=="edit")
										{
											$id = $_GET['id'];
											$query = "select * from tbl_circular where id='".$id."'";
											$res = mysqli_query($con,$query);
											$result = mysqli_fetch_array($res);
											//print_r($result);
										}
										if($_GET['ope']=="delete")
										{
											$id = $_GET['id'];
											$qr = "delete from tbl_circular where id='$id'";
											$res = mysqli_query($con,$qr);
											if($res)
											{
												echo "<script>window.location.href='cirtable.php';</script>";
											}
											else
											{
												//echo $qr."<br>";
												echo mysqli_error($con);
												//echo $id;
											}	
										}
									}
										?>

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
									

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Title </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Title" class="col-xs-10 col-sm-5" name="title" 
											 value="<?php if(isset($result)) { echo $result[1];} ?>" />
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> keyword</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="keyword" class="col-xs-10 col-sm-5" name="keyword"
											value="<?php if(isset($result)) { echo $result[2];} ?>" />
											<span class="help-inline col-xs-12 col-sm-7">
												
											</span>
										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> description</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="description" class="col-xs-10 col-sm-5" name="description"
											value="<?php if(isset($result)) { echo $result[3];} ?>" />
											<span class="help-inline col-xs-12 col-sm-7">
												
											</span>
										</div>
									</div>
									<!--<div class="space-4"></div>
									
									<?php if(isset($result)) { ?>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">&nbsp;</label>

										<div class="col-sm-9">
											<input type="hidden" name="hdnaudio" value="<?php echo $result[4]; ?>">
											<!--img src="upload/<?php echo $result[4];?>" height="100px" width="150px"/
											<audio controls>
                                   
                                                           <source src="upload/<?php echo $result[4]; ?>" type="audio/mpeg">
															  Your browser does not support the audio tag.
															</audio>
										</div>
									</div>
									<div class="space-4"></div>
									<?php } ?>
									
									

									<!--<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> audio</label>

										<div class="col-sm-9">
											<input type="file" id="form-field-2" class="col-xs-10 col-sm-5" name="audio" accept="audio/*"
											value="<?php if(isset($result)) { echo $result[4];} ?>" >
											<span class="help-inline col-xs-12 col-sm-7">
												
											</span>
										</div>
									</div>
									
									
									<div class="space-4"></div>
									
									
									<div class="form-group">
										
									<div class="space-4"></div>
									
									

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> video</label>

										<div class="col-sm-9">
											<input type="file" id="form-field-2" class="col-xs-10 col-sm-5" name="video"
											value="<?php if(isset($result)) { echo $result[5];} ?>" />
											<span class="help-inline col-xs-12 col-sm-7">
												
											</span>
										</div>
									</div>
									<div class="space-4"></div>
									
									
									<?php if(isset($result)) { ?>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">&nbsp;</label>

										<div class="col-sm-9">
											<input type="hidden" name="hdnimage" value="<?php echo $result[6]; ?>">
											<img src="upload/<?php echo $result[6];?>" height="100px" width="150px"/>
											
										</div>
										</div>
									<div class="space-4"></div>
									<?php } ?>
									
									-->
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> image</label>

										<div class="col-sm-9">
											<input type="file" id="form-field-2"  class="col-xs-10 col-sm-5" name="image" />
											<span class="help-inline col-xs-12 col-sm-7">
												
											</span>
										</div>
									</div>
									<div class="space-4"></div>
									<?php if(isset($result)) { ?>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">&nbsp;</label>

										<div class="col-sm-9">
											<input type="hidden" name="hdnfile" value="<?php echo $result[7]; ?>">
											<img src="upload/<?php echo $result[4];?>" height="100px" width="150px"/>
											
										</div>
									</div>
									<div class="space-4"></div>
									<?php } ?>

									<!--<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> file</label>

										<div class="col-sm-9">
											<input type="file" id="form-field-2"  class="col-xs-10 col-sm-5" name="file"
											value="<?php if(isset($result)) { echo $result[7];} ?>" />
											<span class="help-inline col-xs-12 col-sm-7">
												
											</span>
										</div>
									</div>-->
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> cyndicate</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="cyndicate" class="col-xs-10 col-sm-5" name="cyndicate"
											value="<?php if(isset($result)) { echo $result[5];} ?>" />
											<span class="help-inline col-xs-12 col-sm-7">
												
											</span>
										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> department</label>

										<div class="col-sm-9">
											<!--<input type="text" id="form-field-2" placeholder="department" class="col-xs-10 col-sm-5" name="department"
											value="<?php if(isset($result)) { echo $result[6];} ?>" />-->
											<select class="form-control" name="department" id="form-field-2">
											
												<?php
													$query = "select * from tbl_department";
													$res = mysqli_query($con,$query);
													while($result = mysqli_fetch_array($res))
													{
													?>
														<option value="<?php echo $result['id']; ?>"> <?php echo $result['dep_name']; ?> </option>
													<?php
													}
													?>		
										</select>
												
											<span class="help-inline col-xs-12 col-sm-7">
												
											</span>
										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> issue_date</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="issue_date" class="col-xs-10 col-sm-5" name="issue_date"
											value="<?php if(isset($result)) { echo $result[7];} ?>" />
											<span class="help-inline col-xs-12 col-sm-7">
												
											</span>
										</div>
									</div>
									<div class="space-4"></div>

								
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Status</label>

										<div class="col-sm-9">
											Disable:<input type="radio" id="form-field-1" name="status" value="0"  <?php if($result[8]==0){echo "checked='checked'";}?> />
											
											<span >
											Enable:<input type="radio" id="form-field-2"  name="status" value="1" <?php if($result[8]==1){echo "checked='checked'";}?> />	
											</span>
										</div>
									</div>

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<?php if(isset($result)) {  
												echo "<input type='submit' class='btn btn-info' type='button' name='submit' value='Update' >";
											 }else{
											 	echo "<input type='submit' class='btn btn-info' type='button' name='submit' value='Insert' >";
											 } ?>
											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
									</form>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php include("footer.php");?>