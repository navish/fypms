<!DOCTYPE html>
<html>
<head>
		<title>CoICT FYPMS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

			<link rel="stylesheet" type="text/css" href="../styles/w3.css">
			<link rel="stylesheet" type="text/css" href="../styles/style.css">
			<link rel="stylesheet" type="text/css" href="../styles/w3-theme-blue-grey.css">
			<link rel="stylesheet" href="../fonts/font-awesome.min.css">
	
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>

</head>
<?php 
  include 'session.php';
  include ('dbcon.php'); 
?>

<body class="w3-theme-l5">
<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-blue w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-opennav w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>

  <!-- RIGHT SIDE -->
   <a href="../logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Logout">Logout</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><img src="/w3images/avatar2.png" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-navblock w3-blue w3-large w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
  <a class="w3-padding-large" href="#"><i class="fa fa-globe"></i> Link 1</a>
  <a class="w3-padding-large" href="#"><i class="fa fa-user"></i> Link 2</a>
  <a class="w3-padding-large" href="#"><i class="fa fa-envelope"> </i>Link 3</a>
  <a class="w3-padding-large" href="#"><i class="fa fa-user"></i> My Profile</a>
  <a class="w3-padding-large" href="../logout.php"><i class="fa fa-user"></i> Logout</a>

</div>
