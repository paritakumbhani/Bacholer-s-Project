<?php include_once("header.php"); 
$msg="";
$query="";
if(!isset($_SESSION['userid']))
{
	?>
	<script>
		window.location = "login.php";
	</script>
	<?php
}

$query = "select u.*, c.*, s.* from tbl_user as u
join tbl_city as c 
on u.city=c.id
join tbl_security as s 
on u.security_question=s.id where u.id = ".$_SESSION['userid'];

$res = mysqli_query($con,$query);
$r = mysqli_fetch_array($res);
?>

<?php


if(isset($_POST['update1']))
{
	//print_r($_POST);die();
	$image = $_POST['image'];
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$lastname = $_POST['lastname'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$gender = $_POST['gender'];
	$contact = $_POST['contact'];
	$birthdate = $_POST['dob'];
	$question = $_POST['question'];
	$answer = $_POST['answer'];
	
	
		$query = "update tbl_user set firstname='$firstname', middlename='$middlename', lastname='$lastname', address='$address', city='$city', gender='$gender', contact='$contact', birthdate='$birthdate', security_question='$question', security_answer='$answer' where id= ".$_SESSION['userid'];
		
		if(mysqli_query($con,$query))
		{
			$msg = 1;
			?>
			<script>
				window.location = "myprofile.php?msg=<?php echo $msg ?>";
			</script>
		<?php
		}
		else
		{
			$msg = 2;
		}
	
}

if(isset($_GET['operation']))
{
	
	if($_GET['operation']=="update")
	{
		
		$query = "select * from tbl_user where id = ".$_SESSION['userid'];
		$res = mysqli_query($con,$query);
		$row = mysqli_fetch_array($res);
	}
}
?>


<div class="col-lg-10 col-sm-6 col-md-offset-1">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="img/download.jpg">
        </div>
        <div class="useravatar">
            <img alt="" src="upload/<?php if(isset($r)) { echo $r['image']; } ?>">
        </div>
        <div class="card-info"> <span class="card-title"><?php echo $r['firstname']; ?> <?php echo $r['lastname']; ?></span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab">
                <div class="hidden-xs">My Profile</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab">
                <div class="hidden-xs">Change Profile Pic</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab">
                <div class="hidden-xs">Change Password</div>
            </button>
        </div>
    </div>

        <div class="well">
			<div class="tab-content">
			
			



<!-- Display user Personal Detail Starts  -->


<div class="tab-pane fade in active" id="tab1">
					<div class="panel-body" >


					
			
			<?php
				if(!$_GET['operation']=="update")
				{
			?>
			
			
			
			<!--  Sucess Message Starts  -->
					
<?php
			if(isset($_GET[msg]))
				{
				?>
	<div class="alert alert-info" id="mydiv">
				<?php
				if(isset($_GET[msg]))
				{
				?>
				<div>
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php
								if($_GET['msg']==1)
								{
									echo "Record Successfully Updated";
								}
								if($_GET['msg']==2)
								{
									echo "Update Failed !";
								}
							?>
                </div>
				<?php
				}
				?>
	</div>
				<?php
				}
				?>
				
				
<!--  Sucess Message Ends  -->
			
			
			
			<div class="row">
    <div class="box col-md-10 col-md-offset-1">
        <div class="box-inner">
            
                
				
<h1 style="font-size:30px;" align="center"> Personal Detail </h1>
<hr>
            <br><br>  
            
            <div class="box-content">
             
                    <div class="form-group">
                        <label style="font-size:15px;"> First Name :-</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         <?php if(isset($r)) {echo $r['firstname'];} ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						 
						  <label style="font-size:15px;"> Middle Name :-</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         <?php if(isset($r)) {echo $r['middlename'];} ?>  
						 
						 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						 
						  <label style="font-size:15px;"> Last Name :-</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         <?php if(isset($r)) {echo $r['lastname'];} ?>  
                    </div>
					<hr>
					
					 <div class="form-group">
                        <label style="font-size:15px;"> Address </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         <?php if(isset($r)) {echo $r['address'];} ?> 
                    </div>
					<hr>
					
					<div class="form-group">
                        <label style="font-size:15px;"> City </label> 
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         <?php if(isset($r)) {echo $r['city_name'];} ?>  
                    </div>
					<hr>
					
					
					<div class="form-group">
                        <label style="font-size:15px;"> Gender </label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php
														if($r['gender']==1)
														{
															
													?>
														<span>Male</span>
															<?php
															}
															else{
															
																?>
																<span>Female</span>
																<?php
															}
																/*echo $res['status'];*/
															?>
						<!--?php if(isset($r)) {echo $r['gender'];} ?-->
                    </div>
					<hr>
					
					<div class="form-group">
                        <label style="font-size:15px;"> Contact No </label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php if(isset($r)) {echo $r['contact'];} ?>
                    </div>
					<hr>
					
					<div class="form-group">
                        <label style="font-size:15px;"> Birth Date </label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php if(isset($r)) {echo $r['birthdate'];} ?>
                    </div>
					<hr>
					
					<div class="form-group">
                        <label style="font-size:15px;"> Security Question </label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php if(isset($r)) {echo $r['security_question'];} ?>
                    </div>
					<hr>
					
					<div class="form-group">
                        <label style="font-size:15px;"> Security Answer </label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php if(isset($r)) {echo $r['security_answer'];} ?>
                    </div>
					<hr>
					
					<div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-5 col-md-9">
                                        <a href="myprofile.php?operation=update&id=<?php echo $r['id'];?>"> <button  type="button"  name="updatedata"  class="btn btn-primary col-md-2">Update</button></a>  &nbsp;&nbsp;&nbsp;
                                    </div><br/><br/><br/><br/>
								
                    </div>
					
				
			</div>		
		</div>			
	</div>
</div>	
			
			
			
			
		<?php
		}
		?>		    
                         </div>
				</div>
				
				
<!-- Display user Personal Detail Starts  -->				
		
				
				
				
				
<!-- Update Personal Details Starts  -->




<?php
if($_GET['operation']=="update")
{
?>
	
<div class="container">    
        
        <div  style="margin-top:50px" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
		
		
		
                        <div class="panel-heading">
                            <div class="panel-title">Personal Information</div>						
                        </div>  
                        <div class="panel-body" >
                            <form id="updateform" method="post" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
								
								                     
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name :-</label>
                                    <div class="col-md-9">
                                        <input type="text" name="firstname" class="form-control" value="<?php if(isset($row)) { echo $row['firstname']; } ?>" />
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label for="middlename" class="col-md-3 control-label">Middle Name :-</label>
                                    <div class="col-md-9">
                                        <input type="text" name="middlename" class="form-control" value="<?php if(isset($row)) { echo $row['middlename']; } ?>" />
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name :-</label>
                                    <div class="col-md-9">
                                        <input type="text" name="lastname" class="form-control" value="<?php if(isset($row)) { echo $row['lastname']; } ?>" />
                                    </div>
                                </div>
                                
								<div class="form-group">
                                    <label for="address" class="col-md-3 control-label">Address :-</label>
                                    <div class="col-md-9">
                                        <input type="text" name="address" class="form-control" value="<?php if(isset($row)) { echo $row['address']; } ?>" />
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label for="city" class="col-md-3 control-label">City :-</label>
                                    <div class="col-md-9">
                                        
										<select class="form-control" name="city" placeholder="Select City" >
										
												<?php
													$query = "select * from tbl_city";
													$res = mysqli_query($con,$query);
													while($ro = mysqli_fetch_array($res))
													{
													?>
														<option <?php if(isset($row)) { if($row['city']==$ro['id']) echo "selected"; } ?> value="<?php echo $ro['id']; ?>"> <?php echo $ro['city_name']; ?> </option>
													<?php
													}
													?>		
										</select>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label for="gender" class="col-md-3 control-label">Gender :-</label>
                                    <div class="col-md-9">
                                       
									   <select class="form-control" name="gender" >
											<option <?php if(isset($row)) { if($row['gender']==1) echo "selected"; } ?> value="1"> Male </option>
											<option <?php if(isset($row)) { if($row['gender']==0) echo "selected"; } ?> value="0"> Female </option>
										</select>
                                    </div>
                                </div>
								 
                                                                 
                                <div class="form-group">
                                    <label for="contact" class="col-md-3 control-label">Contact No :-</label>
                                    <div class="col-md-9">
                                        <input type="text" name="contact" class="form-control" value="<?php if(isset($row)) { echo $row['contact']; } ?>" />
                                    </div>
                                </div>
								 
                                <div class="form-group">
                                    <label for="dob" class="col-md-3 control-label">Birth Date :-</label>
                                    <div class="col-md-9">
                                        <input type="text" name="dob" id="datepicker" class="form-control" value="<?php if(isset($row)) { echo $row['birthdate']; } ?>" />
                                    </div>
                                </div>
								 
                               								
								<div class="form-group">
                                    <label for="question" class="col-md-3 control-label">Security Question :-</label>
                                    <div class="col-md-9">
                                       
										<select class="form-control" name="question" placeholder="Select Security Question" >
										
											<?php
												$query = "select * from tbl_security";
												$res = mysqli_query($con,$query);
												while($ro = mysqli_fetch_array($res))
												{
												?>
													<option <?php if(isset($row)) { if($row['security_question']==$ro['id']) echo "selected"; } ?> value="<?php echo $ro['id']; ?>"> <?php echo $ro['security_question']; ?> </option>
												<?php
												}
												?>	
										</select>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label for="answer" class="col-md-3 control-label">Security Answer :-</label>
                                    <div class="col-md-9">
                                        <input type="text" name="answer" class="form-control" value="<?php if(isset($row)) { echo $row['security_answer']; } ?>" />
                                    </div>
                                </div>
								
								<br/>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-5 col-md-9">
                                        <input type="submit" name="update1" class="btn btn-primary col-md-2" value="Update" />
									<a href="myprofile.php?id=">	<input value="Cancle" class="btn btn-primary col-md-2 col-md-offset-1"></a>
                                    </div>
									
                                </div>
                                
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-7">
                                        <button class="btn btn-primary"> If you want to update your data click on update button  </button>
                                    </div>    
																		
                                        
                                </div>
                          
                            </form>
                         </div>
                    </div>
 </div> 
    </div><br/>
<?php
}
?>


<!-- Update Personal Details Ends -->
				


				
				
		
<!-- Change Profile Photo Starts  -->				
				
<div class="tab-pane fade in" id="tab2">
				
				
				
<?php		
$msg="";
$query="";

$query="select image from tbl_user where id=".$_SESSION['userid'];
$res = mysqli_query($con,$query);
$im = mysqli_fetch_array($res);


// Image upload Code Starts

if(isset($_FILES['image']))
{
    $file_name = rand(111111111,999999999).$_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $name=$_POST['name'];
    $codes=$_POST['code'];	
    
	$extensions = array("jpeg","jpg","png");   

	$file_ext=explode('.',$_FILES['image']['name'])	;
	$file_ext=end($file_ext);  

	$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));  
 
	if(in_array($file_ext,$extensions ) === false)
	{
		$errors[]="extension not allowed";
	}    
	
	if($file_size > 2097152)
	{
		$errors[]='File size must be less tham 2 MB';
	}
	
	if(empty($errors)==true)
	{
		move_uploaded_file($file_tmp,"upload/".$file_name);
	}
	else
	{
		
	}	
}
// Image upload Code ends


if(isset($_POST['updateimage']))
{
	$image = $_POST['image'];	
	$query = "update tbl_user set image = '$file_name' where id=".$_SESSION['userid'];
	$msg=3;
	
	?>
		<script>
			window.location = "myprofile.php?id=tab2&msg=<?php echo $msg ?>";
		</script>
	<?php
	
	if(mysqli_query($con,$query))
	{	
		$query="select image from tbl_user where id=".$_SESSION['userid'];
		$res = mysqli_query($con,$query);
		$im = mysqli_fetch_array($res);
	}
	else
	{
		$msg=4;
		?>
			<script>
				window.location = "myprofile.php?id=tab2&msg=<?php echo $msg ?>";
			</script>
		<?php
	}
}

?>





<div class="container">    

        <div  style="margin-top:50px" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
					
<!--  Sucess Message Starts  -->
					
<?php
			if(isset($_GET[msg]))
				{
				?>
	<div class="alert alert-info" id="mydiv">
				<?php
				if(isset($_GET[msg]))
				{
				?>
				<div>
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php
								if($_GET['msg']==3)
								{
									echo "Profile Photo Successfully Changed";
								}
								if($_GET['msg']==4)
								{
									echo "Profile Photo Changed Failed !";
								}
							?>
                </div>
				<?php
				}
				?>
	</div>
				<?php
				}
				?>
				
				
<!--  Sucess Message Ends  -->
						
						<div class="panel-heading">
						
                            <div class="panel-title">Change Profile Photo</div>
                            
                        </div>  
                        <div class="panel-body" >
                            <form id="changephotoform" method="post" class="form-horizontal" enctype="multipart/form-data">
                                
                        
								
								<div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Profile Picture :-</label>
                                    <div class="col-md-9">
                                        <img height=100 width=100 src="upload/<?php if(isset($im)) { echo $im['image']; } ?>" title="Image" name="image" />
                                    </div>
                                </div>
                                                               
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Change Image :-</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" class="form-control" />
                                    </div>
                                </div>
								
															
								<br/>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input type="submit"  name="updateimage" value="Change Image" class="btn btn-primary" />  &nbsp;&nbsp;&nbsp;
                                    </div><br/><br/><br/><br/>
                                </div>
                                
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="button" class="btn btn-primary"> Please Select Your New Photo to change Profile photo  </button>
                                    </div>                                           
                                        
                                </div>
                                
                                
                                
                            </form>
                         </div>
                    </div>
 </div> </div>
				</div>
				
	
<!-- Change Profile Photo Ends  -->			





<!-- Change Password Starts  -->						
				
<div class="tab-pane fade in" id="tab3">
				
				
				
<?php
//$msg="";
//$query="select image from user_master where id=".$_SESSION['userid'];
//$res = mysqli_query($con,$query);
//$im = mysqli_fetch_array($res);

if(isset($_POST['update']))
{
	$oldpassword = $_POST['oldpassword'];
	$newpassword = $_POST['newpassword'];
	$confirmpassword = $_POST['confirmpassword'];
	
	$query = "select * from tbl_user where id=".$_SESSION['userid'];
	$res = mysqli_query($con,$query);
	
	if(mysqli_num_rows($res)>0)
	{ 
		$result = mysqli_fetch_array($res);
		if($oldpassword==$result['confirmpassword'])
		{
			$query = "update tbl_user set confirmpassword = '".$confirmpassword."' where id='".$_SESSION['userid']."'";
			$r = mysqli_query($con,$query);
			$msg=5;
			?>
			<script>
				window.location = "myprofile.php?id=tab3&msg=<?php echo $msg ?>";
			</script>
		<?php
		}
		else
		{
			$msg=6;
			?>
			<script>
				window.location = "myprofile.php?id=tab3&msg=<?php echo $msg ?>";
			</script>
		<?php
		}
	}
}


?>



<div class="container">    

        <div  style="margin-top:50px" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
					
						
						<div class="panel-heading">
						
                            <div class="panel-title">Change Password</div>
                            
                        </div>  
                        <div class="panel-body" >
                            <form id="changepasswordform" method="post" class="form-horizontal" role="form">
                                                                                            
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Old Password :-</label>
                                    <div class="col-md-9">
                                        <input type="password" name="oldpassword" class="form-control" placeholder="Enter Old password" />
                                    </div>
                                </div>
								
								 <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">New Password :-</label>
                                    <div class="col-md-9">
                                        <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="Enter New password" />
                                    </div>
                                </div>
								
								 <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Confirm Password :-</label>
                                    <div class="col-md-9">
                                        <input type="password" name="confirmpassword" class="form-control" placeholder="Enter Confirm password" />
                                    </div>
                                </div>
								
								
								
								<br/>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-4 col-md-9">
                                        <input type="submit"  name="update" value="Change Password" class="btn btn-primary" />  &nbsp;&nbsp;&nbsp;
									<a href="myprofile.php" > 	<input name="cancle" value="Cancle" class="btn btn-primary" style="width:100px;"> </a>
                                    </div><br/><br/><br/><br/>
                                </div>
                                
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i> Please Enter Your Old password to change a password  </button>
                                    </div>                                           
                                        
                                </div>
                                
<!--  Sucess Message Starts  -->
					
<?php
if(isset($_GET[msg]))
{
?>
	<div class="alert alert-info" id="mydiv">
				<?php
				if(isset($_GET[msg]))
				{
				?>
				<div>
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php
								if($_GET['msg']==5)
								{
									echo "Password Successfully Changed";
								}
								if($_GET['msg']==6)
								{
									echo "Your Old Password is Wrong";
								}
							?>
                </div>
				<?php
				}
				?>
</div>
<?php
}
?>
				
				
<!--  Sucess Message Ends  -->
                                
                            </form>
                         </div>
                    </div>
 </div> </div>
				</div>
			</div>
		</div>
    
</div>

            
    
	
<?php include_once("footer.php"); ?>



<script type="text/javascript">
$( document ).ready(function() {
	//alert("hello");
	
	$("#changephotoform").validate({
			rules: {
				image: "required",
			},
			messages: {
				
				image: "Please select your image",
			},
		});
	});
</script>	

<script type="text/javascript">
$( document ).ready(function() {
	
	$("#changepasswordform").validate({
			rules: {
				oldpassword: {
								required: true,
								minlength: 6
							}, 
				
				newpassword:   {
								required: true,
								minlength: 6
							}, 
				confirmpassword: {
					required: true,
					minlength: 6,
					equalTo: "#newpassword"
				},
						
			},
			messages: {
				
				oldpassword: {
							required: "Please enter old Password",
							minlength: "Your password must be at least 6 characters long"
						  },
				
				newpassword: {
							required: "Please enter a Password",
							minlength: "Your password must be at least 6 characters long"
						  },
				confirmpassword: {
					required: "Please provide a password",
					minlength: "Your password must be at least 6 characters long",
					equalTo: "Please enter the same password as above"
				},
			},
		});
	});
</script>	

	
<script type="text/javascript">
$( document ).ready(function() {
	
	$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '1950:2001',
			 dateFormat: 'yy-mm-dd',
			 defaultDate: '2001-01-01'
		});
	
$("#updateform").validate({
			rules: {
				firstname: "required",
				middlename: "required",
				lastname: "required",
				address: "required",
				city: "required",
				gender: "required",
				dob: "required",
				image: "required",
				question: "required",
				answer: "required",
			
				contact: {				
						required: true,
						minlength: 10,
						maxlength: 10
				},				
			},
			messages: {
				
				firstname: "Please enter your Firstname",
				middlename: "Please enter your Middlename",
				lastname: "Please enter your Lastname",
				address: "please enter address...",
				city: "Please select your city",
				gender: "Please select your gender",
				dob: "Please select your Birth date",
				image: "Please select your image",
				question: "Please select your security question",
				answer: "Please enter your security answer",
								
				contact: {
						required: "Please enter your contact no",
						contact: "Your contact no must be at least 10 characters long",
					   },
			},
		});
});
</script>			
	