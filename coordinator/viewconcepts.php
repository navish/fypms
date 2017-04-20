
<?php
	
	include '../dbcon.php';
	$studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote ") or die(mysqli_error());
    //var_dump($studentconcept);
    //$concept_num_row = mysqli_num_rows($studentconcept);
     
	?> 
	<div class="w3-center"> 
	<h3>CONCEPT NOTES</h3>
	</div>
<table class="w3-table w3-hoverable">
	<thead>
	  <tr class="w3-light-grey">
	    <th>Student</th>
	    <th>Proposed Title</th>
	    <th>Concept Document</th>
	    <th>Supervisor's Comments</th>
	    <!-- th>Expected Output</th -->
	    <th>Approval</th>
	  </tr>
	</thead>
	<?php 
		while($concept_note=mysqli_fetch_array($studentconcept)) {
	?>
	<tr>
	  <td><?php echo $concept_note['studentid']; ?></td>
	  <td><?php echo $concept_note['proposedtitle']; ?></td>
	  <td><?php //echo $concept_note['problemstatement']; ?></td>
	  <td><?php //echo $concept_note['significance']; ?></td>
	  <!-- td><?php echo $concept_note['expectedoutput'];  ?></td -->
	  <td><?php echo $concept_note['approval'];  ?></td>
	</tr>
	<?php } ?>
</table>