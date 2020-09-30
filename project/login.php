<?php include_once("header.php");?>

 
         <!--?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['emailid']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['emailid'] == 'pmkumbhani@gmail.com' && 
                  $_POST['password'] == '123456') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['emailid'] = 'tutorialspoint';
                  
                  echo 'You have entered valid use name and password';
               }else {
                  $msg = 'Wrong username or password';
               }
            }
         ?-->
         <?php
//Login Code Starts

$query ="";
$msg="";
if(isset($_POST['login']))
{	
	$id = $_POST['id'];
	$emailid = addslashes($_POST['emailid']);
	$password = addslashes($_POST['password']);
	
	$query =  "select * from tbl_user where email_id='".$emailid."' and confirmpassword='".$password."'";
	if($c = mysqli_query($con,$query))
	{
		$no=mysqli_num_rows($c);
		if($no>0)
		{
			$res = mysqli_fetch_array($c);
			if($res['vstatus']==1)
			{
				if($res['status']==1)
				{
					if($res['email_id']==$emailid && $res['confirmpassword']==$password)
					{
						session_start();
						$_SESSION['userid'] = $res['id'];
						$_SESSION['userfirstname'] = $res['firstname'];
						$_SESSION['userlastname'] = $res['lastname'];
						?>
						<script type="text/javascript">
							window.location.href="myprofile.php";
						</script>

					<?php
					}
					else
					{
						$msg = 3;
						?>
							<script type="text/javascript">
								window.location="login.php?msg=<?php echo $msg ?>";
							</script>						
						<?php
					}
				}
				else
				{
						$msg = 4;
						?>
							<script type="text/javascript">
								window.location="login.php?msg=<?php echo $msg ?>";
							</script>						
						<?php
				}
			}
			else
			{
					$msg = 5;
						?>
							<script type="text/javascript">
								window.location="login.php?msg=<?php echo $msg ?>";
							</script>						
						<?php
			}
		}
		else
		{
			$msg = 6;
						?>
							<script type="text/javascript">
								window.location="login.php?msg=<?php echo $msg ?>";
							</script>						
						<?php
		}
	}
	else
	{
		$msg = 7;
		echo $query;
						?>
							<script type="text/javascript">
								window.location="login.php?msg=<?php echo $msg ?>";
							</script>						
						<?php
	}
}

// Login Code Ends
?>


<link rel="stylesheet" href="css/signinup.css">
  

  


    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 100%; position: relative; top:-20px"><a href="forgotpassword.php">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form method="post" id="loginform" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="email" class="form-control" name="emailid" placeholder="email Id" >                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password" >
                                    </div>
                                    
								
                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>

								
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <button id="btn-login"  name="login" class="btn btn-success">Login  </button>
                                    </div>
                                </div>

							
                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account ! 
                                        <a href="register.php">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
									

                                </div>    
								
<?php
if(isset($_GET['msg']))
{
?>
				
		<div class="alert alert-danger">
				
				<?php
				if(isset($_GET['msg']))
				{
				?>
				<div>
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php
								if($_GET['msg']==1)
								{
									echo "You are successfully Register now check your email for verification";
								}
								if($_GET['msg']==2)
								{
									echo "Registration Failed";
								}
								if($_GET['msg']==3)
								{
									echo "Email id and password not match !";
								}
								if($_GET['msg']==4)
								{
									echo "You are blocked by admin please contact us";
								}
								if($_GET['msg']==5)
								{
									echo "You are not verify please check your email";
								}
								if($_GET['msg']==6)
								{
									echo "User not found";
								}
								if($_GET['msg']==7)
								{
									echo "Invalid";
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
		
			</form>     
            </div>                     
        </div>  
    </div>
</div>
    
<?php include_once("footer.php"); ?>	



<!-- Jquery Validation  -->
<script type="text/javascript">
$(document).ready(function(){
	//alert("hello");
	//$("#commentForm").validate();
	$("#loginform").validate({
			rules: {
		
				email: {
						required: true,
						email: true
					   },
				password:   {
								required: true,
								minlength: 6
							},   
			},
			messages: {
				
				email: {
						required: "Please Enter Email id",
						email: "Please enter a valid email address",
					   },
				password: {
							required: "Please Enter a Password",
							minlength: "Your password must be at least 6 characters long"
						  },	   
			}
		});
});
</script>