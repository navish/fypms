
<?php
	
	include '../dbcon.php';
	session_start();

	$supId = $_SESSION['id'];

	$studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote WHERE supervisor = $supId") or die(mysqli_error());
    //var_dump($studentconcept);
    //$concept_num_row = mysqli_num_rows($studentconcept);
     
	?> 
<table class="w3-table w3-hoverable">
	<thead>
	  <tr class="w3-light-grey">
	    <th>Student</th>
	    <th>Proposed Title</th>
	    <th>Expected Output</th>
	    <th>Approval</th>
	  </tr>
	</thead>
	<?php 
		while($concept_note=mysqli_fetch_array($studentconcept)) {
	?>
	<tr>
	  <td><?php echo $concept_note['studentid']; ?></td>
	  <td><a href="<?php echo '../concepts/'; ?>" > <?php echo $concept_note['proposedtitle']; ?></a></td>
	  <td><?php echo $concept_note['expectedoutput'];  ?></td>
	  <td><?php echo $concept_note['approval'];  ?></td>
	</tr>
	<?php } ?>
</table>