<?php include_once("header.php"); 

$msg;
if(isset($_POST['feedback']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['feedmessage'];
	
	$query = "insert into feedback(user_name,user_email,user_message,status) values('$name','$email','$message','Enable')";
	if(mysqli_query($con,$query))
	{
		$msg = 1;
	}
	else
	{
		$msg = 2;
	}

}


?>
<div style="background-color:#CCC">	
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">FeedBack</div>
                        
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form method="post" id="feedbackform" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon">User Name</span>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Your Name" />                                     
                            </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;   Email id</span>
                                        <input type="email" class="form-control" name="email" placeholder="Enter Email id" />
                            </div>
                                    
							<div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"> Feedback Message</span>
                                        <textarea class="form-control" name="feedmessage" id="feedmessage" placeholder="Enter Feedback" /> </textarea>
                            </div>
							<div>							
							<?php if(isset($_POST['feedback']))
									{
										if(strlen($message)==0)
										{
											echo "Please enter your feedback";
										}
									}
							?>
							</div>
								
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-md-offset-4 controls">
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="btn-login" type="submit"  name="feedback" class="btn btn-primary">Send feedback  </button>
                                    </div>
                                </div>

							
                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
											<div class="col-md-offset-4 col-md-7">
												<button class="btn btn-primary"> Please Enter Your Feedback  </button>
											</div> 
                                        </div>
                                    </div>
									

                                </div>    
								
<?php
	if(isset($msg))
	{
	?>
		<div class="alert alert-danger" id="mydiv">
				<?php
				if(isset($msg))
				{
				?>
				<div>
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php
								if($msg==1)
								{
									echo "Feedback Successfully Send";
								}
								if($msg==2)
								{
									echo "Sending Failed";
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
		
	
		
		<h1 style="padding-top:10px; width:600px; background-color:#999; border-radius:3px;" class="col-md-offset-1"> Feedback </h1>
		<div style="height:400px;width:600px;border:solid 2px white;overflow:scroll;overflow-x:hidden;overflow-y:scroll;background-color:white; border-radius:5px;" class="col-md-offset-1">
		
		<div>
		<?php
			$query="";
			$query = "select emailid,image from user_master";
			$res1= mysqli_query($con,$query);
			$ro = mysqli_fetch_array($res1);
		
			$query="select * from feedback where status='Enable' order by id desc";
			$r = mysqli_query($con,$query);
			while($res = mysqli_fetch_array($r))
			{
				
				
				?>
		
		
		<?php		
		if($res['user_email']==$ro['emailid'])
		{
			?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img height="60px;" width="60px;" style="border-radius:50px;" alt="feedback"  src="uploads/<?php echo $ro['image']; ?>">
			<?php
		}
		else
		{
		?>	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<img height="50px;" width="50px;" style="border-radius:10px;" alt="feedback"  src="img/favicon.ico">
		<?php } ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label style="font-size:15px;"> <?php if(isset($res)) { echo $res['user_name']; } ?> </label>
		
		<?php $time = date('d-m-Y',strtotime($res['date'])); ?>
		<label style="float:right; color:#999;"> <?php echo $time; ?> </label>   

		
		<p class="col-md-offset-3" style="color:#666; font-size:15px;"> <?php if(isset($res)) { echo $res['user_message']; } ?> </p>
		<hr>    
        <?php } ?>        
		</div>
		</div>
		<br>

</div>
</div>



    
<?php include_once("footer.php"); ?>	

<!-- Jquery Validation  -->
<script type="text/javascript">
$(document).ready(function(){
	//alert("hello");
	//$("#commentForm").validate();
	$("#feedbackform").validate({
			rules: {
		
				email: {
						required: true,
						email: true
					   },
					   
				name: "required",
				feedmessage: "required", 
			},
			messages: {
				
				email: {
						required: "Please Enter Email id",
						email: "Please enter a valid email address",
					   },
				
				name: "Please Enter your Name",
				feedmessage: "Please Enter your feedback",	   
			}
		});
});
</script>