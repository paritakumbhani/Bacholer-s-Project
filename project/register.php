<?php include_once("header.php");

if(isset($_POST['submit']))
{
	//echo "work";
	$emailid=$_POST['email'];
	$query = "SELECT email_id FROM tbl_user LIMIT 1";
	$qsel = mysqli_query($con,$query);
	if($qsel == $emailid){
		?>
		<div class="alert alert-danger"> email id already registered</div>
	<?php	
	}	
	
	$firstname=$_POST['firstname'];
	$middlename=$_POST['middlename'];
	$lastname=$_POST['lastname'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$gender=$_POST['gender'];
	
	//$password=$_POST['password'];
	$confirmpassword=$_POST['confirmpassword'];
    $contactno=$_POST['contact'];
	$birthdate=$_POST['birthdate'];
	
	$security_question=$_POST['question'];
	$security_answer=$_POST['answer'];
	
	
	/*if(isset($_POST['image'])){
		echo "image get";
	}else{
		echo "image not get";
	}*/
		if($_FILES['image']['error']==0)
	  	{
			  $imagename = rand(111111111,999999999).$_FILES['image']['name'];
			  $tmpname = $_FILES['image']['tmp_name'];	
			  move_uploaded_file($tmpname,"upload/".$imagename);
			  $image = $imagename;
		}
	
		$query = "insert into tbl_user (firstname,middlename,lastname,address,city,gender,email_id,confirmpassword,contact,birthdate,image,security_question,security_answer) values('".$firstname."','".$middlename."','".$lastname."','".$address."','".$city."','".$gender."','".$emailid."','".$confirmpassword."','".$contactno."','".$birthdate."','".$image."','".$security_question."','".$security_answer."')";
		$res = mysqli_query($con,$query);
		if($res)
		{
			//echo "Inserted";
			?>
				
			<script>window.location.href='index.php';</script>
			<!--header("Location:index.php");-->
			<?php
		}
		else
		{
			
			echo mysqli_error($con);
			echo "not worked";
		}	
	
		
	
}else{
	echo "not get";
}
?>
<link rel="stylesheet" href="css/signinup.css">


  


    <div class="container">    
        
        <div  style="margin-top:50px" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div  style="float:right; font-size: 120%; position: relative; top:-25px"><a href="login.php">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                        <form id="signupform" method="post" class="form-horizontal" action="" enctype="multipart/form-data">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                                               
                                <div class="form-group">
                                    <label for="firstname" class="col-md-2 col-md-offset-1 text-left">First Name:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label for="middlename" class="col-md-2 col-md-offset-1  text-left">Middle Name:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="middlename" placeholder="Middle Name" required>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label for="lastname" class="col-md-2 col-md-offset-1   text-left">Last Name:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                                    </div>
                                </div>
                                
								<div class="form-group">
                                    <label for="address" class="col-md-2 col-md-offset-1  ">Address:</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="address" placeholder="Enter Address..." required></textarea>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label for="city" class="col-md-2 col-md-offset-1  ">City:</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="city" id="city" required>
											<option>  </option>
												<?php
													$query = "select * from tbl_city";
													$res = mysqli_query($con,$query);
													while($r = mysqli_fetch_array($res))
													{
													?>
														<option value="<?php echo $r['id']; ?>"> <?php echo $r['city_name']; ?> </option>
													<?php
													}
													?>		
										</select>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label for="gender" class="col-md-2 col-md-offset-1  ">Gender:</label>
                                    <div class="col-md-9">
                                        <input type="radio"  name="gender" value="1" selected= "selected" >Male
										<input type="radio"  name="gender" value="0" >Female
                                    </div>
                                </div>
								 
                                <div class="form-group">
                                    <label for="email" class="col-md-2 col-md-offset-1  ">Email Id:</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email" id="emailadd" placeholder="Email Address" required>
                                        <p style="display:none;color:red" id="alrdy">Email already exits try anotherone</p>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label for="password" class="col-md-2 col-md-offset-1  ">Password:</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                    </div>
                                </div>
                                
								<div class="form-group">
                                    <label for="confirmpassword" class="col-md-2 col-md-offset-1  ">Confirm Password:</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="confirmpassword" placeholder="Enter confirm password" required>
                                    </div>
                                </div>
                                 
                                <div class="form-group">
                                    <label for="contact" class="col-md-2 col-md-offset-1  ">Contact:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="contact" placeholder="Contact No" required>
                                    </div>
                                </div>
								 
                                <div class="form-group">
                                    <label for="dob" class="col-md-2 col-md-offset-1  ">Birth Date:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="datepicker" name="birthdate" placeholder="Select Date">
                                    </div>
                                </div>
								 
                                <div class="form-group">
                                    <label for="image" class="col-md-2 col-md-offset-1  ">Image:</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label for="question" class="col-md-2 col-md-offset-1 ">Security Question:</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="question" placeholder="Select Security Question" >
										<option>  </option>
											<?php
												$query = "select * from tbl_security";
												$res = mysqli_query($con,$query);
												while($result = mysqli_fetch_array($res))
												{
												?>
													<option value="<?php echo $result['id']; ?>"> <?php echo $result ['security_question']; ?> </option>
												<?php
												}
												?>	
										</select>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label for="answer" class="col-md-2 col-md-offset-1  ">Security Answer:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="answer" placeholder="Enter Security Answer" required >
                                    </div>
                                </div>
								
								<br/>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-5 col-md-9">
                                        <button  type="submit" id="registerbutton" name="submit"  class="btn btn-info">Sign Up</button>
                                        
                                    </div>
                                </div>
                                
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i> After Signup Enter Email Id And Password For Login  </button>
                                    </div>                                           
                                        
                                </div>
                                
                                
                                
                            </form>
                         </div>
                    </div>
 </div> 
    </div><br/>
<?php include_once("footer.php") ?>

<script type="text/javascript">
$( document ).ready(function() {
	//alert("hello");
	//$("#commentForm").validate();
	$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '1950:2001',
			 dateFormat: 'yy-mm-dd',
			 defaultDate: '2001-01-01'
		});
		

	$("#signupform").validate({
			rules: {
				firstname: "required",
				middlename: "required",
				lastname: "required",
				dob: "required",
				gender: "required",
				image: "required",
				question: "required",
				answer: "required",
				city: "required",
				address: "required",
								
				contact: {				
						required: true,
						minlength: 10,
						maxlength: 10
				},
				email: {
						required: true,
						email: true
					   },
				password:   {
								required: true,
								minlength: 6
							}, 
				confirmpassword: {
					required: true,
					minlength: 6,
					equalTo: "#password"
				},
						
			},
			messages: {
				
				firstname: "Please enter your Firstname",
				middlename: "Please enter your Middlename",
				lastname: "Please enter your Lastname",
				dob: "Please select your Birth date",
				gender: "Please select your gender",
				city: "Please select your city",
				image: "Please select your image",
				question: "Please select your security question",
				answer: "Please enter your security answer",
				address: "please enter address...",
				city: "please select city",
				question: "Please select question",
				
				contact: {
						required: "Please enter your contact no",
						contact: "Your contact no must be at least 10 characters long",
					   },
				
				email: {
						required: "Please enter Email id",
						email: "Please enter a valid email address"
					   },
				password: {
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
		
	$("#registerbutton").click(function(){
		if($("#signupform").valid())
		{
			//alert("yes");
			checkuseremail();
			//$("#signupform").submit();
		}
		else
		{
			$("#signupform").submit();
		}
	});
	function checkuseremail()
	{
		
			 var emailadd = $("#emailadd").val();
			 $.ajax({
				type:"POST",
				data:"checkuseremail=yes&email="+emailadd,
				url: "functions.php", 
				/*beforeSend: function(){
					alert("data is ready to go");
				},*/
				success: function(d){
					if($.trim(d)=="1")
					{
						$("#alrdy").show();
						$("#emailadd").focus();
						//alert("Email Already exist try another");
					}
					else
					{
						$("#signupform").submit();
					}
				}
			});
		
	}


});
</script>