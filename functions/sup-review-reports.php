<?php
	include '../dbcon.php';
	session_start();

	$supId = $_SESSION['id'];

	$grpsql = mysqli_query($dbcon, "SELECT * FROM grp WHERE empId = '$supId'") or die(mysqli_error());
    $group = mysqli_fetch_array($grpsql);

    $groupNo = $group['grpNo'];

	$repsql = "SELECT * FROM progressreport WHERE projectId = (SELECT projectId FROM project WHERE grpNo = '$groupNo')";
	$reportsql = mysqli_query($dbcon,$repsql) or die(mysqli_error($dbcon));

	$report = mysqli_fetch_array($reportsql);

	$reviewfile = $report['review'];
	//$fileAddress = "../".$reviewfile;
	/*$sem1_progress = $report['sem1_progress'];
	$sem1_final = $report['sem1_final'];
	$sem2_progress = $report['sem2_progress'];
	$sem2_final = $report['sem2_final'];*/
	
?>
<table class="w3-table w3-hoverable w3-responsive w3-bordered">
	<thead>
	  <tr class="w3-light-grey">
	    <th>Group No.</th>
	    <th>Review Report </th >
	  
	   
	  </tr>
	</thead>
	<?php 
		//while($report = mysqli_fetch_array($reportsql)) {
	?>
	<tr>
	  <td><?php echo $groupNo ?></td>
	  <td><a <?php echo 'href="'.$reviewfile.'"'; ?>> View Report </a></td>
	<?php //} ?>
</table>   