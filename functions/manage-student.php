<?php
	
	include '../dbcon.php';
	$result = mysqli_query($dbcon, "SELECT * FROM student") or die(mysql_error());
	//$user_row = mysqli_fetch_array($result);

	?>
<div class="w3-container"> <button class="w3-btn w3-blue">Add Students</button></div>
<br />
<table class="w3-table w3-hoverable" border="0">
	<thead>
	  <tr class="w3-light-grey">
	    <th>Reg. No.</th>
	    <th>Name</th>
	    <th>Group</th>
	    <th>Email</th>
	    <th>Course</th>
	    <th>Actions</th>
	  </tr>
	</thead>
	<?php 
		while ($user_row = mysqli_fetch_array($result)) {		
	?>

	<tr>

	  <td><?php echo $user_row['regNo'];  ?></td>
	  <td><?php echo $user_row['lName']." ".$user_row['fName']." ".$user_row['mName']; ?></td>
	  <td><?php echo "Group"//$user_row['expertise']; ?></td>
	  <td><?php echo $user_row['email']; ?></td>
	  <td><?php echo $user_row['course']; ?></td>
	  <td>
	  	<button class="w3-btn w3-green">Edit</button>
	  	<button class="w3-btn w3-red">Archive</button>
	  </td>
	</tr>
	<?php } ?>
</table>