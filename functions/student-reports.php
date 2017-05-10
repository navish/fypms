<?php
	include '../dbcon.php';
	session_start();
	$get_user = $_SESSION['id'];

    $grpsql = mysqli_query($dbcon, "SELECT * FROM members WHERE regNo='$get_user'") or die(mysqli_error());
    $group = mysqli_fetch_array($grpsql);

    $groupNo = $group['grpNo'];
 if ($group != null) {
   	$repsql = "SELECT * FROM progressreport WHERE projectId = (SELECT projectId FROM project WHERE grpNo = '$groupNo')";
	$reportsql = mysqli_query($dbcon,$repsql) or die(mysqli_error($dbcon));

	$report = mysqli_fetch_array($reportsql);

	$reviewfile = $report['review'];
	$sem1_progress = $report['sem1_progress'];
	$sem1_final = $report['sem1_final'];
	$sem2_progress = $report['sem2_progress'];
	$sem2_final = $report['sem2_final'];
?>


<br />
	<h4 class="w3-center">VIEW THE REPORTS YOU HAVE SUBMITTED</h4>
<br />
<table class="w3-table w3-hoverable w3-responsive w3-bordered">
	
	  <tr class="w3-light-grey">
	    <th>Group No.</th>
	    <td><?php echo $groupNo ?></td>
	    </tr>
	    <tr>
	    <th>Review Report </th>
	    <td><a <?php echo 'href="'.$reviewfile.'"'; ?>> View Report </a></td>
	    </tr>
	    <tr>
	    <th>Semester1 Progress</th>
	  <td><a <?php echo 'href="'.$sem1_progress.'"'; ?>> View Report </a></td>
	    </tr>
	    <tr>
	    <th>Semester1 Final Report</th>
	  <td><a <?php echo 'href="'.$sem1_final.'"'; ?>> View Report </a></td>
	    </tr>
	    <tr>
	    <th>Semester2 Progress</th>
	  <td><a <?php echo 'href="'.$sem2_progress.'"'; ?>> View Report </a></td>
	    </tr>
	    <tr>
	    <th>Final Report</th>
	  <td><a <?php echo 'href="'.$sem2_final.'"'; ?>> View Report </a></td>
	    </tr>
	   
	  </tr>
	
	</table>   
<?php 
} else {
	echo "<h4 class='w3-center'> YOU HAVE NOT SUBMITTED ANY REPORTS </h4>";
}


	