<!DOCTYPE html>
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

<body class="w3-theme-l5" onload="">
<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-blue w3-left-align w3-large w3-padding">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-opennav w3-right w3-padding-small w3-hover-white w3-large " href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i></a>

  <!-- RIGHT SIDE -->
    <a href="../logout.php" title="Logout"><button class="w3-bar-item w3-btn w3-small w3-hide-small w3-right w3-hover-white">Logout</button></a>
  <span onclick="loadUser()" class="w3-bar-item w3-button w3-hide-small w3-right w3-margin-right w3-hover-light-grey" title="My Account"><img src="../images/avatar.png" class="w3-circle" style="height:30px;width:30px" alt="Account" title="My Account"></span>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-navblock w3-blue w3-large w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
<ul class="w3-ul">
  <li onclick="loadUser()" class="w3-hover-white" title="My Account">My Account</li>
  <li class="w3-hover-white"><a class="" href="../logout.php"><i class="fa fa-user"></i> Logout</a></li>
</ul>
</div>

