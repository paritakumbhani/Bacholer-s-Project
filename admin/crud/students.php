<?php 
	include("include/connect.php");
	/*if(!isset($_SESSION['username']) && $_SESSION['username']=="" )
	{
		header("Location:index.php");
	}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="alert">
<?php 
if(isset($_GET['msg']))
{
	if($_GET['msg']==1)
	{
		echo "Successfully Inserted";
	}
	if($_GET['msg']==2)
	{
		echo "Successfully Updated";
	}
	if($_GET['msg']==3)
	{
		echo "Deleted Successfully";
	}
}
?>
</div>
<br />
welcome,
<br />
<a href="logout.php">Logout</a>
<br />
<a href="newstudents.php">Add New record</a>
<br />
<table align="center" border="1">
	<tr>
    	<th>Profile Pic</th>
    	<th>Name</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    
	<?php
		// for select
		$query = "select * from students";
		$res = mysqli_query($con,$query);
		while($result = mysqli_fetch_array($res))
		{
			?>
            <tr>
            	<td><img  alt="image here" height="100" width="100" src="upload/<?php echo $result['image']; ?>"  /></td>
            	<td><?php echo $result['sname']; ?></td>
                <td><?php echo $result['address']; ?></td>
                <td><?php echo $result['mobile']; ?></td>
                <td><a href="newstudents.php?ope=edit&id=<?php echo $result['sid']; ?>">Edit</a></td>
                <td><a onclick="return confirm('Are you sure ?')" href="newstudents.php?ope=delete&id=<?php echo $result['sid']; ?>">Delete</a></td>
            </tr>
            <?php
			
	
		}
	?>
    
    
</table>
</body>
<script type="text/javascript">
	setInterval(function(){
		document.getElementById("alert").style.display="none";	
	},3000);
</script>

</html>