<?php 
	include("include/connect.php");
	/*if(!isset($_SESSION['username']) && $_SESSION['username']=="" )
	{
		header("Location:index.php");
	}*/

if(isset($_POST['submit']))
{
	
	$sname = $_POST['sname'];
	$address = $_POST['address'];
	$mobile = $_POST['mobile'];
	
	if(isset($_GET['ope']) && $_GET['ope']=="edit")
	{
		$image = $_POST['hdnimage'];
		if($_FILES['image']['error']==0)
		{
			$imagename = rand(111111111,999999999). $_FILES['image']['name'];
			$tmpname = $_FILES['image']['tmp_name'];	
			move_uploaded_file($tmpname,"upload/".$imagename);
			$image = $imagename;
		}
		
		$query = "update students set sname='".$sname."',address='".$address."',mobile='".$mobile."',image='".$image."' where sid=".$_GET['id'];
		$res = mysqli_query($con,$query);
		if($res)
		{
			header("Location:students.php?msg=2");
		}
		else
		{
			
			echo "update Fail";
		}
	}
	else
	{
		
		$image = "";
		if($_FILES['image']['error']==0)
		{
			$imagename = rand(111111111,999999999). $_FILES['image']['name'];
			$tmpname = $_FILES['image']['tmp_name'];	
			move_uploaded_file($tmpname,"upload/".$imagename);
			$image = $imagename;
		}
		$query = "insert into students (sname,address,mobile,image) values('".$sname."','".$address."','".$mobile."','".$image."')";
		$res = mysqli_query($con,$query);
		if($res)
		{
			header("Location:students.php?msg=1");
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
		$query = "select * from students  where sid=".$id;
		$res = mysqli_query($con,$query);
		$result = mysqli_fetch_array($res);
		//print_r($result);
	}
	if($_GET['ope']=="delete")
	{
		$id = $_GET['id'];
		$query = "delete from students  where sid=".$id;
		$res = mysqli_query($con,$query);
		if($res)
		{
			header("Location:students.php?msg=3");
		}
		else
		{
			
			echo "Delete Fail";
		}	
	}
}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form method="post" enctype="multipart/form-data" id="testform" >
<table align="center" border="1">
	<tr>
    	<td align="center" colspan="2">Stduents CRUD</td>
    </tr>
    <tr>
    	<td>Students name</td>
        <td><input type="text" name="sname" value="<?php if(isset($result)) { echo $result['sname'];} ?>"  /></td>
    </tr>
    <tr>
    	<td>Address</td>
        <td><textarea name="address" ><?php if(isset($result)) { echo $result['address'];} ?></textarea></td>
    </tr>
    <tr>
    	<td>Mobile</td>
        <td>
        	<select name="mobile">
            	<option <?php if(isset($result)) { if($result['mobile']=="999999999") { echo "selected";} } ?>  value="999999999">999999999</option>
                <option <?php if(isset($result)) { if($result['mobile']=="888888888") { echo "selected";} } ?>  value="888888888">888888888</option>
               
            </select>
        </td>
       
    </tr>
    <tr>
    	<td>Profile Image</td>
        <td><input type="file" name="image"  />
        <?php 
			if(isset($result)) 
			{ 
				?>
        <br />
        <img src="upload/<?php echo $result['image']?>" height="150" width="150"  />
        <?php
			}
		?>
        </td>
    </tr>
    <tr>
        <?php 
			if(isset($result)) 
			{ 
				?>
                <input type="hidden" name="hdnimage" value="<?php echo $result['image']?>" />
                <?php
			} 
		?>
    	<td align="center" colspan="2"><input type="submit" name="submit" value="Save" /></td>
    </tr>
</table>
</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<style>
	label.error {
    color: #FB3A3A;
    
}
</style>
<script>
	$(document).ready(function(){
		//https://jqueryvalidation.org/files/demo/
		 $("#testform").validate({
                rules: {
                    sname: "required",
                    image: "required",
                    address: "required"
                },
                messages: {
                    sname: "Please enter your student name",
                    image : "Please select image",
                    address: "Please enter your Address"
                }
            });
	});
</script>
</body>

</html>