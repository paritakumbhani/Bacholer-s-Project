 <?php include_once("include/connect.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<title>eOffice | Virtual Office, Office Space, Meeting Rooms, Serviced Offices, Conference Venues and Videoconferencing in London and Globally | eOffice</title>
<link rel="icon" href="img/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />


<link rel="stylesheet" type="text/css" href="css/ef1d1eadc66024ca427742fc71edefef_1453130276.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/99ffcfb419d9c9f0feb884b93a05e2c2_1373031233.css" media="print" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/profile.css" />






<div class="wrapper">
<noscript>
<div class="global-site-notice noscript">
  <div class="notice-inner">
    <p> <strong>JavaScript seems to be disabled in your browser.</strong><br />
      You must have JavaScript enabled in your browser to utilize the functionality of this website. </p>
  </div>
</div>
</noscript>
<div class="page">
<div class="pre-main"></div>
<div class="header-container">
  <div class="header">
    <h1 class="logo"><strong>eOffice</strong><a href="index.php" title="eOffice" class="logo"><img  src="img/logo.png" alt="eOffice" /></a></h1>
    <div class="head-right">
      <ul class="links">
        <?php 
					if(isset($_SESSION['userid']))
					{
					?>
        <li class="last">
          <label style="font-size:15px; color:white;" > Welcome, </label>
          <label style="font-size:15px; color:#3399FF;" >
            <?php if(isset($_SESSION['userfirstname'])) { echo $_SESSION['userfirstname']; }   ?>
            <?php if(isset($_SESSION['userlastname'])) { echo $_SESSION['userlastname']; } ?>
          </label>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </li>
        <?php
					}
					?>
        <?php					
						if(isset($_SESSION['userid']))
						{
					?>
					
		
		<li class="first"><a href="myprofile.php"> My Profile </a></li>					
        <li class="first"><a href="application.php"> &nbsp;&nbsp; Application </a></li>
        <li class="first"><a href="myapplication.php">&nbsp;&nbsp; My Application </a></li>
        <li class=" last"><a href="logout.php" > Logout </a></li>
        <?php
						}
					?>
        <?php					
						if(!isset($_SESSION['userid']))
						{
					?>
        <li class="first" ><a href="register.php" title="Sign Up" >Sign Up</a></li>
        <li class=" last" ><a href="login.php" title="Log In" >Log In</a></li>
        <?php
						}
					?>
      </ul>
      <div class="block block-currency"> </div>
       
      
      
      
      <div class="nav-container">
        <ul id="nav" class="megamenu en">
       
		<li  class="level0 nav-1 first last level-top megamenu-item  parent"><a href="circular.php"  class="level-top" ><span>Circular</span></a>
          </li>
        <li  class="level0 nav-1 first last level-top megamenu-item  parent"><a href="faq.php"  class="level-top" ><span>Faq</span></a>
          </li>
        <li onClick=""  class="level0 cms-3 level-top first parent"> <a href="aboutus.php" class="level-top"> <span>About</span> </a>
          </li>
         
          <li class="level0 cms-17 level-top last"> <a href="contactus.php" class="level-top"> <span>Contact us</span> </a> </li>
          <li  class="level0 nav-1 first last level-top megamenu-item  parent"><a href="feedback.php"  class="level-top" ><span>Feedback</span></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Header Content Ends -->