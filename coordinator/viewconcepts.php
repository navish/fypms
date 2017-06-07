

<?php
	
	include '../dbcon.php';

	$studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote ") or die(mysqli_error());
     
	?> 
	<div class="w3-center"> 
	<h3>CONCEPT NOTES</h3>
	</div>

	<div class="w3-container">
	<div class="w3-responsive">
<table class="w3-table-all">
	<thead>
	  <tr class="w3-light-grey">
	    <th>Student</th>
	    <th>Proposed Title</th>
	    <th>Concept </th>
	    <th>Proposed Supervisor </th>
	    <th>Recommended </th>
	    <th>Approval </th>
	    <th></th>
	  </tr>
	</thead>
	<?php 
		while($concept_note=mysqli_fetch_array($studentconcept)) {
	?>
	<tr>
	  <td><?php echo $concept_note['studentid']; ?></td>
	  <td><?php echo $concept_note['proposedtitle']; ?></td>
	  <td><a href="">View Document</a></td>
	  <td><?php echo $concept_note['supervisor']; ?></td>
      <td><?php echo $concept_note['reccomended']; ?></td>
      <td> <button class="w3-padding w3-btn w3-green w3-left-align" onclick="approveConcept()"><i class="fa fa-check fa-fw"></i></button>
      <button class="w3-padding w3-btn w3-red w3-left-align" onclick="disapproveConcept()"><i class="fa fa-remove fa-fw"></i></button></td>
	</tr>
	<?php } ?>
</table>
</div>
</div>
