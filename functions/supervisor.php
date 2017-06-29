<?php
	
	include '../dbcon.php';
	$result = mysqli_query($dbcon, "SELECT * FROM supervisor") or die(mysql_error());
	//$user_row = mysqli_fetch_array($result);

	?>

<div class="w3-row-padding w3-container">
 <div class="w3-card-2">
	<table class="w3-table w3-hoverable" border="0">
		<thead>
		  <tr class="w3-dark-grey">
		    <th>Name</th>
		    <th>Expertise</th>
		    <th>Phone Number</th>
		    <th>Email</th>
		    <th>Office</th>
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
		  <td><?php echo $user_row['office'];  ?></td>
		</tr>
		<?php } ?>
	</table>
</div>
</div>