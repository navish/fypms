<?php
include '../dbcon.php';

include '../header.php';

	$get_user = $_SESSION['id'];
	$project = $_GET['id'];

	$projectsql = mysqli_query($dbcon, "SELECT * FROM project WHERE projectId = '$project'") or die(mysqli_error());
 	$project_row = mysqli_fetch_array($projectsql);

	$title = $project_row['projectTitle'];
?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:60px"> 
	<!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
    <?php
      include '../supervisor/sup-nav.php';
    ?>
    
    </div>
    <!-- End Left Column -->

    <!-- Begin Middle Column -->
	<div class="w3-col m9">
    <div id="main">
      <div class="w3-row-padding">
        <div class="w3-col m12">
         <span id="notification"></span> <br />
     
      <?php 
			echo "This is the Title: ".$title;

				//Supervisor
				//Students
				//Reports
				//

       ?>
       <p>Here are the project details.</p>
       </div>
      </div> 
      </div>
    <!-- End Middle Column -->
    </div>
<!-- End The Grid -->
</div>
<!-- End Page Container -->
</div>
<br />

	<?php
include '../footer.php';
	?>