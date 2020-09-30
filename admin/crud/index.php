<?php 
include("include/connect.php");
if(isset($_SESSION['username']) && $_SESSION['username']!="" )
	{
		header("Location:students.php");
	}
if(isset($_POST['submit']))
{
	$username = addslashes($_POST['username']);
	$password = addslashes($_POST['password']);
	if($username!="" && $password!="")
	{
		$qry = "select * from register where username='".$username."' and password='".$password."'";
		$result = mysqli_query($con,$qry);
		$total = mysqli_num_rows($result);
		$res = mysqli_fetch_array($result);
		if($total>0 && $username==$res['username'] && $password==$res['password'])
		{
			$_SESSION['username'] = $username;
			header("Location:students.php");
		}
		else
		{
			echo "Login fail";
		}
	}
	else
	{
		echo "Please fill username password";
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
<form method="post" >
<table border="1" align="center">
  <tr>
    <td align="center" colspan="2">Login</td>
  </tr>
  <tr>
    <td>Username</td>
    <td><input type="text" name="username"  /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="password" /></td>
  </tr>
  <tr>
    <td align="center" colspan="2"><input type="submit" name="submit" value="Login" /></td>
  </tr>
</table>
</form>
</body>
</html>