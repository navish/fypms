<?php
	
	include '../dbcon.php';
	$result = mysqli_query($dbcon, "SELECT * FROM supervisor") or die(mysql_error());
	//$user_row = mysqli_fetch_array($result);

	?>
	<div id="hiihapa" class="w3-container">
		<button onclick="uploadCSVsupervisor()" class="w3-btn w3-blue"><i class="fa fa-users fa-fw w3-margin-right"></i>Add Supervisors</button>
		<button class="w3-btn w3-red">Archive</button>
	 </div>

	<br />
<table class="w3-table w3-hoverable" border="0">
	<thead>
	  <tr class="w3-light-grey">
	  	<th><input type="checkbox" id="selectall" /></th>
	    <th>Name</th>
	    <th>Expertise</th>
	    <th>Phone Number</th>
	    <th>Email</th>
	    <th>Office</th>
	    <th>Actions</th>
	  </tr>
	</thead>
	<?php 
		while ($user_row = mysqli_fetch_array($result)) {

	  	$theuser = $user_row['empId']; 	
	?>

	<tr>
	  <td><input type="checkbox" class="archive" name="archive" value="" ></td>
	  <td><?php echo $user_row['fName']." ".$user_row['lName']; ?></td>
	  <td><?php echo $user_row['expertise']; ?></td>
	  <td><?php echo $user_row['phoneNo']; ?></td>
	  <td><?php echo $user_row['email']; ?></td>
	  <td><?php echo "ABC" #$user_row['office'];  ?></td>
	  <td>
	  	<?php echo '<a href="edituser.php?user='.$theuser.'"><button class="w3-btn w3-green" '?>">Edit</button></a>
	  	<?php echo '<a href="upgradeuser.php?user='.$theuser.'"><button class="w3-btn w3-orange"'?>">Upgrade</button>
	  </td>
	</tr>
	<?php } ?>
</table>

<script>

	function uploadCSVsupervisor() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("hiihapa").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "uploadcsv-supervisor.php", true);
  xhttp.send();
}

  </script>