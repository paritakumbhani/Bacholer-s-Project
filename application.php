
<?php include_once("header.php") ?>

<?php
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

// Insert in Aplication Starts

if(isset($_POST['submit']))
{
	
	$title = $_POST['title'];
	//echo $title;
	$text = $_POST['text'];
	//echo $text;
	$comment = $_POST['comment'];
	//echo $comment;
	$userid = $_SESSION['userid'];
	
	$query="select * from tbl_employee where designation=3";
	$res=mysqli_query($con,$query);
	$r=mysqli_fetch_array($res);
	$held_by=$r['id'];
	
	$priority=2;
	$status=1;
	
	$cdate = date('Y/m/d h:i:sa');	
	//echo $cdate;
	$query = "
	INSERT INTO `application` (
	`id` ,
	`user_id` ,
	`application_title` ,
	`application_text` ,
	`application_date` ,
	`held_by` ,
	`comment` ,
	`application_status` ,
	`priority` ,
	`status_date` ,
	`status_review`
	)
	VALUES (
	NULL , '$userid' ,  '$title',  '$text',  '$cdate',  3,  '$comment',  '1',  '2',  '$cdate',  'nothing'
	)
	";
	mysqli_query($con,$query);
	
// Insert in Aplication Ends
	
		

	
	$last = mysqli_insert_id($con);
	//echo $last;
	//print_r($_FILES);
	$prev_handler=$held_by;
	$current_handler=$held_by;
			
	
	
	// Insert In Attachment Starts
	
	
	// File Upload Code Starts	

       foreach($_FILES["gal"]['tmp_name'] as $key => $tmp_name )
       {
        $file_name = rand(111111111,999999999).$_FILES["gal"]['name'][$key];
        $file_size =$_FILES["gal"]['size'][$key];
        $file_tmp =$_FILES["gal"]['tmp_name'][$key];
        $file_type=$_FILES["gal"]['type'][$key];
        
        if(move_uploaded_file($file_tmp,"upload/".$file_name))
        {
			//echo "File uploaded";
		}
        //$image_name[] = $file_name;
        
		$query1 = "insert into attechment(app_id,path) values($last,'$file_name')";
		$qr=mysqli_query($con,$query1);
       }
       //$wh_multi_img = implode($image_name,',');
    
		
	// File upload Ends	
	
	/*$que = "insert into app_track(application_id,prev_handler,current_handler,transfer_date,comment,isread,ihave) values($last,$prev_handler,$current_handler,Now(),'',0,0)";*/
	
	
		// Insert In App_track Starts
	
	if($qr)
	{
		?>
         <script>
				window.location = "application.php?msg=1";
			</script>
         <?php
	}
	else
	{
		?>
         <script>
				window.location = "application.php?msg=2";
			</script>
         <?php	
	}
	
		// Insert In App_track nds
	
}

?>

<div class="container">    
 
    <div  style="margin-top:50px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
	
        <div class="panel panel-info">
			<div class="panel-heading">
			
		<!-- Success message starts -->
			<?php
				if(isset($_GET['msg']))
				{
			?>
			<div class="alert alert-danger" id="mydiv">
				<?php
				if(isset($_GET['msg']))
				{
				?>
				<div>
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php
								if($_GET['msg']==1)
								{
									echo "Your application is successfully sent";
								}
								if($_GET['msg']==2)
								{
									echo "Your application fail";
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
			
            <div class="panel-title" align="center">Application</div>
                
            </div>

			<div class="panel-body" >

<form id="applicationform" method="post" class="form-horizontal" role="form" enctype="multipart/form-data" >

<div class="form-group">
					<label for="title" class="col-md-2 control-label">Application Title</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="title" placeholder="Application Title">
					</div>
				</div>
								
				<div class="form-group">
					<label for="text" class="col-md-2 control-label">Application Text</label>
					<div class="col-md-9">
					<textarea name="text" id="elm1"  class="form-control" > </textarea>
					</div>
				</div><br>
				
				<div class="form-group">
					<label for="comment" class="col-md-2 control-label">Comment</label>
					<div class="col-md-9">
						<textarea class="form-control" name="comment" placeholder="Enter Comment..."></textarea>
					</div>
				</div><br>
  
				<div class="form-group">
					
				<div class="col-md-9 col-md-offset-1">	 
                <span style="font-size:25px">Attechment </span><img style=" bottom: 107px; height: 50px; left: 229px; width: 50px;" class="addme" 
				src="img/add.png" />
            
                           <br />
                         <br />
                         <ul class="uploadme" style="list-style:none">
                         </ul>
                        </p>
				</div>		
					
				</div>
   
				
				<div align="center">
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" style="width:100px; height:40px; border-radius:10px;" />
				
				</div>
</form>

</div> 
		</div>
	</div>
</div>

<?php include_once("footer.php") ?>

<script type="text/javascript">
		
		$(document).ready(function(){
	 
	 $(".addme").click(function(){
				   $(".uploadme").append('<li class="space"><input  type="file" name="gal[]" /></li><br>');
				});
	 });
 // 
 
 
 
		</script>

<script type="text/javascript">
$(document).ready(function(){
	//alert("hello");
	
	$("#applicationform").validate({
			rules: {
		
				title: "required",
				text:  "required",  
				comment:  "required",  
			},
			messages: {
				
				title: "Please Enter Title",
				text:  "Please Enter Text",
				comment:  "Please Enter Comment...",
			},
		});
});
</script>

<script language="javascript" type="text/javascript">
  tinyMCE.init({
    theme : "modern",
    mode: "exact",
    elements : "elm1",
    theme_advanced_toolbar_location : "top",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"
    + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
    + "bullist,numlist,outdent,indent",
    theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"
    +"undo,redo,cleanup,code,separator,sub,sup,charmap",
    theme_advanced_buttons3 : "",
    height:"350px",
    width:"600px"
});

</script>