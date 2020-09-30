<?php include_once("header.php"); 
$msg="";
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	$query = "insert into contact(name,email,subject,message) values('$name','$email','$subject','$message')";
	if(mysqli_query($con,$query))
	{
		$msg = 1;
		?>
			<script type="text/javascript">
				window.location="contactus.php?msg=<?php echo $msg ?>";
			</script>
		<?php
	}
	else
	{
		$msg = 2;
		?>
			<script type="text/javascript">
				window.location="contactus.php?msg=<?php echo $msg ?>";
			</script>
		<?php
	}
}

?>

<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1>
                    Contact us <small>Feel free to contact us</small></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form method="post" id="contactform">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="contact">
                                Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject" required="required" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" name="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</button>
                    
					<!-- Success message Starts -->
		
		<?php
			if(isset($_GET['msg']))
			{
		?>
				
		<div class="alert alert-danger" style="width:500px;" id="mydiv">
				
				<?php
				if(isset($_GET['msg']))
				{
				?>
				<div>
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php
								if($_GET['msg']==1)
								{
									echo "Message successfully send";
								}
								if($_GET['msg']==2)
								{
									echo "Message sending Failed";
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
		
		<!-- Success message ends -->
					
					</div>
                </div>
                </form>
            </div>
        </div>
				
		
        <div class="col-md-4">
            <form>
            <legend>Our office</legend>
            <address>
                <strong>Address :-</strong><br>
               S. V. Patel,<br>
               Sumul Dairy, Surat, <br>
			   Pincode - 394105 <br>
                <abbr title="Phone">
                    Contact No:</abbr>
                12345 67890
            </address>
            <address>
                <strong>Full Name</strong><br>
                <a href="index.php" target="_blanck">www.eoffice.com</a>
            </address>
            </form>
        </div>
    </div>
</div>


<?php include_once("footer.php"); ?> 

<script type="text/javascript">
$( document ).ready(function() {
	//alert("hello");

	$("#contactform").validate({
			rules: {
				name: "required",
				subject: "required",
				
				email: {
						required: true,
						email: true
					   },
				message: "required",						
			},
			messages: {
				
				name: "Please enter your name",
				message: "please enter your message",
								
				subject: "please enter subject",
				
				email: {
						required: "Please enter Email id",
						email: "Please enter a valid email address"
					   },
					   
				
			},
		});
});		
			
</script>