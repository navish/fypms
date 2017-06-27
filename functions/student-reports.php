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

    <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-white">
            <div class="w3-container w3-padding">
              <h3 class="w3-center">VIEW THE REPORTS YOU HAVE SUBMITTED</h3>
            </div>
          </div>
        </div>
    </div>
    <br />

<div class="w3-row-padding w3-container">
<div class="w3-card-2">
	<table class="w3-table w3-hoverable w3-responsive w3-bordered">
		
		  <tr class="w3-dark-grey">
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
	?>	
</div>
</div>

	