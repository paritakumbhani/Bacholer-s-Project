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

									if(isset($_POST['submit']))
									{
										
										//$cms_id=$_GET['cms_id'];
										$news_date=$_POST['news_date'];
										$news_title = $_POST['news_title'];
										$news_content = $_POST['news_content'];
										$status = $_POST['status'];
										
									if(isset($_GET['ope']) && $_GET['ope']=="edit")
										{
											
											$query = "update tbl_news set news_date='".$news_date."', news_title='".$news_title."',news_content='".$news_content."',status='".$status."' where id=".$_GET['id'];
											
											$res = mysqli_query($con,$query);
											if($res)
											{
											
												 echo "<script>window.location.href='newstable.php?msg=2';</script>";
												//echo $res;
											}
											else
											{
												
												echo "update Fail";
												
											}
										}
										else
										{
											
											
											$query = "insert into tbl_news (news_date,news_title,news_content,status) values('".$news_date."','".$news_title."','".$news_content."','".$status."')";
											//print_r($query);
											$res = mysqli_query($con,$query);
											if($res)
											{
												
												echo "<script>window.location.href='newstable.php?msg=1';</script>";
												//echo $res;
											}
											else
											{
												
												echo "Insert Fail";
											}
										}
									}
									if(isset($_GET['ope']))
									{
										if($_GET['ope']=="edit")
										{
											$id = $_GET['id'];
											$query = "select * from tbl_news where id=".$id;
											$res = mysqli_query($con,$query);
											$result = mysqli_fetch_array($res);
											//print_r($query);
										}
										if($_GET['ope']=="delete")
										{
											$id = $_GET['id'];
											$query = "delete from tbl_news  where id=".$id;
											$res = mysqli_query($con,$query);
											if($res)
											{
												echo "<script>window.location.href='newstable.php?msg=3';</script>";
											}
											else
											{
												
												echo "Delete Fail";
											}	
										}
									}
										?>

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action="" method="post" id="testform" name="registration" >
								
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> News Date: </label>

										<div class="col-sm-9">
											<input type="date" placeholder="date" class="col-xs-10 col-sm-5"
											id="date" name="news_date" 
											 value="<?php if(isset($result[1])) { echo $result[1];} ?>"/>
										</div>
									</div>
							
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Title: </label>

										<div class="col-sm-9">
											<input type="text" placeholder="Title" class="col-xs-10 col-sm-5"
											id="title" name="news_title" 
											 value="<?php if(isset($result[2])) { echo $result[2];} ?>" required/>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> content:</label>

										<div class="col-sm-9">
											<textarea id="desc" class="col-xs-10 col-sm-5" placeholder="content"  name="news_content" required><?php if(isset($result[2])) { echo $result[3];} ?></textarea>
											<span class="help-inline col-xs-12 col-sm-7">
												
											</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Status:</label>
										<div class="col-sm-9">
											Disable:<input type="radio" id="form-field-3" name="status" value="0"  <?php if($result[4]==0){echo "checked='checked'";}?> />
											
											<span >
											Enable:<input type="radio" id="form-field-3"  name="status" value="1" <?php if($result[4]==1){echo "checked='checked'";}?> />	
											</span>
										</div>
									</div>


									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<input type="submit" class="btn btn-info" type="button" name="submit" value="submit" >
												
												
											</input>

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

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
			<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<style>
	label.error {
    color: #FB3A3A;
    
}
</style>
<script type="text/javascript">
/*
$(function() {
  $("form[name='datain']").validate({
    // Specify validation rules
    rules: {
      title: "required",
      $news_contentcontent: "required"
    },
    // Specify validation error messages
    messages: {
      title: "Please enter title",
      content: "Please enter content"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
	*/
	
	$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='registration']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      news_date: "required",
      news_title: "required",
      news_content: "required",
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      password: {
        required: true,
        minlength: 5
      }
    },
    // Specify validation error messages
    messages: {
    	news_date:"Please enter news date",
      news_title: "Please enter news title",
      news_content: "Please enter news content ",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      email: "Please enter a valid email address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
	
	
	
	
</script>
<?php include("footer.php");?>
			