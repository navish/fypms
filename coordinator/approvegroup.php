 

<div class="w3-container">
  <div class="w3-card-2">

    <?php

    	include '../dbcon.php';    
    	$groupsugId = $_GET['groupsug'];


		$sqlgrp = mysqli_query($dbcon, "SELECT * FROM `suggestedgroup` WHERE sugId='$groupsugId'") or die(mysqli_error($dbcon));
        $group_row = mysqli_fetch_array($sqlgrp);      
    	$approval = $group_row['approval'];

    	if ($approval =="waiting")
        {
	      		$approvesql = mysqli_query($dbcon, "UPDATE suggestedgroup SET approval='approved' WHERE sugId = '$groupsugId'") or die(mysqli_error($dbcon));
	      		 if($approvesql) { 
	            //echo "Group approved";
	            echo "<script type=\"text/javascript\">	alert(\"Group approved\"); </script>";
	            } else { 
	              //echo "Something went wrong the group was not approved";  
	              echo "<script type=\"text/javascript\">	alert(\"Something went wrong the group was not approved\"); </script>";                
	            }       
    	
     }		
    ?>
  </div>
</div>

<?php
             
	?>

