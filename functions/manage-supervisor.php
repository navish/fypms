<?php
	
	include '../dbcon.php';
	$result = mysqli_query($dbcon, "SELECT * FROM supervisor") or die(mysql_error());
	//$user_row = mysqli_fetch_array($result);

	?>
	<div class="w3-container"> <button class="w3-btn w3-blue">Add Supervisors</button></div>
	<br />
<table class="w3-table w3-hoverable" border="0">
	<thead>
	  <tr class="w3-light-grey">
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
	?>

	<tr>
	  <td><?php echo $user_row['fName']." ".$user_row['lName']; ?></td>
	  <td><?php echo $user_row['expertise']; ?></td>
	  <td><?php echo $user_row['phoneNo']; ?></td>
	  <td><?php echo $user_row['email']; ?></td>
	  <td><?php echo "ABC" #$user_row['office'];  ?></td>
	  <td>
	  	<button class="w3-btn w3-green">Edit</button>
	  	<button class="w3-btn w3-orange">Upgrade</button>
	  	<button class="w3-btn w3-red">Archive</button>
	  </td>
	</tr>
	<?php } ?>
</table>