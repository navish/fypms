<?php
	include '../dbcon.php';
	$grpsql = mysqli_query($dbcon, "SELECT * FROM grp ") or die(mysqli_error());
    $group = mysqli_fetch_array($grpsql);

    $groupNo = $group['grpNo'];

	$repsql = "SELECT report1 FROM progressreport WHERE projectId = (SELECT projectId FROM project WHERE grpNo = '$groupNo')";
	$reportsql = mysqli_query($dbcon,$repsql) or die(mysqli_error($dbcon));

	$report = mysqli_fetch_array($reportsql);

	$reportfile = $report['report1'];
	$fileAddress = "../".$reportfile;
	//echo 'href="'.$fileAddress.'"';

?>
<table class="w3-table w3-hoverable w3-responsive w3-bordered">
	<thead>
	  <tr class="w3-light-grey">
	    <th>Group No.</th>
	    <th>Progress Report 1</th>
	    <!--th>Progress Report 2</th>
	    <th>Final Progress Report </th -->
	   
	  </tr>
	</thead>
	<?php 
		//while($concept_note = mysqli_fetch_array($studentconcept)) {
	?>
	<tr>
	  <td><?php echo $groupNo ?></td>
	  <td><a <?php echo 'href="'.$fileAddress.'"'; ?>> View Report </a></td>
	  <!--td><?php //echo $title ; ?></td>
	  <td><?php //echo $supervisor; ?></td -->
	<?php //} ?>
</table>   