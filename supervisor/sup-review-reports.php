<?php
	include '../header.php';

	$supId = $_SESSION['id'];

	$grpsql = mysqli_query($dbcon, "SELECT * FROM grp WHERE empId = '$supId'") or die(mysqli_error());
    $group = mysqli_fetch_array($grpsql);

    $groupNo = $group['grpNo'];

	$repsql = "SELECT * FROM progressreport WHERE projectId = (SELECT projectId FROM project WHERE grpNo = '$groupNo')";
	$reportsql = mysqli_query($dbcon,$repsql) or die(mysqli_error($dbcon));
	
?>

<!-- Page Container -->
<div class="w3-container " style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row-padding">
    <!-- Left Column -->
    <div class="w3-col m3 ">
    <?php
      include 'sup-nav.php';
    ?>
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">
      
      <div id="main">

		<table class="w3-table w3-hoverable w3-responsive w3-bordered">
			<thead>
			  <tr class="w3-dark-grey">
			    <th>Group No.</th>
			    <th>Review Report </th >
			  
			   
			  </tr>
			</thead>
			<?php 
				while($report = mysqli_fetch_array($reportsql)) {
				$reviewfile = $report['review'];
			
			?>
			<tr>
			  <td><?php echo $groupNo ?></td>
			  <td><a <?php echo 'href="'.$reviewfile.'"'; ?>> View Report </a></td>
			<?php } ?>
		</table>   

		</div>
	   </div>
     <!-- End Middle Column -->
    </div>
    
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<?php
  include '../footer.php';
?>

