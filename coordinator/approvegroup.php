 

<div class="w3-container">
  <div class="w3-card-2">

    <?php

    	include '../dbcon.php';    
    	$groupsugId = $_GET['groupsug'];
    	$approve = $disapprove = "";
    	$approve = $_POST['approve'];
    	$disapprove = $_POST['disapprove'];


		$sqlgrp = mysqli_query($dbcon, "SELECT * FROM `suggestedgroup` WHERE approval='waiting'") or die(mysqli_error($dbcon));
        $group_row = mysqli_fetch_array($sqlgrp);      
    	$approval = $group_row['approval'];

    	if ($approval =="waiting")
        {
          	if (isset($approve)) {
	      		$approvesql = mysqli_query($dbcon, "UPDATE suggestedgroup SET approval='approved' WHERE sugId = '$groupsugId'") or die(mysqli_error($dbcon));
	      		 if($approvesql) { 
	            echo "Group approved";
	            } else { 
	              echo "Something went wrong the group was not approved";                  
	            } 
            } elseif ($approval =="approved")  
	        { 
	            exit();
	        }        
    	
     		if (isset($disapprove)) {
	      		$disapprovesql = mysqli_query($dbcon, "UPDATE suggestedgroup SET approval='disapproved' WHERE sugId = '$groupsugId'") or die(mysqli_error($dbcon));
	      		 if($disapprovesql) { 
	            echo "Group disapproved";
	            } else { 
	              echo "Something went wrong the group was not disapproved";                  
	            } 
                    
   			} elseif ($approval =="disapproved") 
	        { 
	              exit();
	        }
        
    ?>
  </div>
</div>

<?php
             
	

    
?>