<?php include_once("header.php"); 

if(!isset($_SESSION['userid']))
{
	?>
	<script>
		window.location = "login.php";
	</script>
	<?php
}

if(isset($_POST['update']))
{
	$id = $_GET['id'];
	$title = $_POST['title'];
	$text = $_POST['text'];
	$comment = $_POST['comment'];
	
	$qu = "update application set application_title = '$title', application_text = '$text', comment = '$comment' where id = $id";
	if($res = mysqli_query($con,$qu))
	{
		$msg = 1;
	}
	else
	{
		$msg = 2;
	}
	
}

?>

<div  style="background-color:#CCC;">
					<br>
                    <h1 align="center" class="col-md-offset-1"> Application list </h1>

                    <table width="783" align="center" border="0px"  class="col-md-offset-3">
                        <tr  style="background: url('img/top.png')" height="45" width="783">
                            <td colspan="8">
                            </td>
                        </tr>
                        <tr style="background: url('img/row.png')" height="135" width="783">
                            <td width="25"></td>
                            
                            
                           <?php
						    $query="SELECT *  FROM application WHERE user_id=".$_SESSION['userid'];
									$r=mysqli_query($con,$query);
									while($res=mysqli_fetch_array($r))
									{ ?>
                            <td background="img/file.png" style="background-repeat:no-repeat">
                                   <div class="vertical" style="margin-bottom: 30px; margin-left: 18px; width: 68px;">
                                      <br><br>
                                           <a href="showapplication.php?id=<?php echo $res['id'] ?>">
                                                <i style="margin-left: 11px; color: rgb(255, 255, 255); font-weight: bold; font-family: sans-serif;"> APP - <?php echo $res['id'] ?></i>
                                           </a>
                                          
                                      
                                    
                                         <?php if($res['application_status']==1) {?>
                                        <br />
                                        <i style="color: red; font-weight: bolder; font-family: 'Comic Sans MS'; font-size: 15px;">Waiting</i>
                                         <?php }?>
                                   
                                       <?php if($res['application_status']==2) {?>
                                             <i style="color: red; font-weight: bolder; font-family: 'Comic Sans MS'; font-size: 15px;">IN Process</i>
                                        <?php }?>
                                         <?php if($res['application_status']==3) {?>
                                       
                                             <i style="color: red; font-weight: bolder; font-family: 'Comic Sans MS'; font-size: 15px;">Rejected</i>
                                         <?php }?>
                                          <?php if($res['application_status']==4) {?>
                                       
                                             <i style="color: red; font-weight: bolder; font-family: 'Comic Sans MS'; font-size: 15px;">Pending</i>
                                        <?php }?>
                                         <?php if($res['application_status']==5) {?>
                                      
                                             <i style="color: red; font-weight: bolder; font-family: 'Comic Sans MS'; font-size: 15px;">Done</i>
                                         <?php }?>
                                </div>
                                </td>
                                <?php } ?>
                          
                           

                        </tr>

                        <tr style="background: url('img/row.png')" height="135" width="783">
                            <td colspan="8"></td>
                        </tr>
                       
                         <tr style="background: url('img/row.png')" height="135" width="783">
                            <td colspan="8"></td>
                        </tr>
                        
                         <tr style="background: url('img/row.png')" height="135" width="783">
                            <td colspan="8"></td>
                        </tr>
                    </table>
					<br>
   </div>        
			
<?php include_once("footer.php") ?>