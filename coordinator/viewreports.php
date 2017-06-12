

<?php
	
	 include '../header.php';
	$result = mysqli_query($dbcon, "SELECT * FROM student") or die(mysql_error());
	//$user_row = mysqli_fetch_array($result);

	?>


<!-- Page Container -->
<div class="w3-container " style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row-padding">
    <!-- Left Column -->
    <div class="w3-col m3 ">
    <?php
      include 'coord-nav.php';
    ?>
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">
      
      <div id="main">


      <div class="w3-row-padding ">
       
	<div class="w3-center"> 
	<?php
		$grpsql = mysqli_query($dbcon, "SELECT * FROM grp ") or die(mysqli_error());
	    $group = mysqli_fetch_array($grpsql);

	    $groupNo = $group['grpNo'];

		$repsql = "SELECT * FROM progressreport WHERE projectId = (SELECT projectId FROM project WHERE grpNo = '$groupNo')";
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
			 
	      <br />
	      
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




