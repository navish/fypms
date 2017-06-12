<?php
  include '../header.php';
 
 $studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote ") or die(mysqli_error());
?>

<!-- Page Container -->
<div class="w3-container " style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
    <?php include 'coord-nav.php';   ?>
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">
      
	  <div id="main">

	    <div class="w3-row-padding w3-container w3-center">
			<div id="approval" class="w3-card-2 "> </div>
			
			
			<h3>CONCEPT NOTES</h3>
			  <div class="w3-card-2">
				<table class="w3-table w3-hoverable" border="0">
				<thead>
				  <tr class="w3-light-grey">
				    <th colspan="">Student</th>
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
						$noteId = $concept_note['conceptid'];
						$approval = $concept_note['approval'];
				?>
				<tr>
				  <td><?php echo $concept_note['studentid']; ?></td>
				  <td><?php echo $concept_note['proposedtitle']; ?></td>
				  <td><?php echo '<a href="'.$concept_note['conceptfile'].'">View Document</a>'; ?></td>
				  <td><?php echo $concept_note['supervisor']; ?></td>
			      <td><?php echo $concept_note['reccomended']; ?></td>
			      <td>
			      <?php

					if ($approval =="waiting") {
				         echo '<a href="approval.php?concept='.$noteId.'"><button class="w3-padding w3-btn w3-green w3-left-align" ><i class="fa fa-check fa-fw"></i></button> </a>'; 

				         echo '<a href="disapproval.php?concept='.$noteId.'"><button class="w3-padding w3-btn w3-red w3-left-align" ><i class="fa fa-remove fa-fw"></i></button> </a>'; 
				      		  			
					
					} elseif ($approval =="approved")  
			        { 
			               echo "Approved";
			        }
			      elseif ($approval =="disapproved") 
			        { 
			              echo "Disapproved";
			        }  
			      ?>
				  </td>
				</tr>
				<?php } ?>
				</table>
			
				</div>
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




