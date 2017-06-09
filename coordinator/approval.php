
<div class="w3-container">
  <div class="w3-card-2">

    <?php

    	include '../dbcon.php';    
    	$concept = $_GET['noteId'];
        
      $studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote ") or die(mysqli_error());
    	$concept_note=mysqli_fetch_array($studentconcept);
    	$approval = $concept_note['approval'];

    	if ($approval =="waiting")
        {
          $approvesql = mysqli_query($dbcon, "UPDATE conceptnote SET approval='approved' WHERE conceptid = '$concept'") or die(mysqli_error($dbcon));
          if($approvesql) { 
            echo "Concept approved";
            } else { 
              echo "Something went wrong the concept was not approved";                  
            } 
                        
        }
      elseif ($approval =="approved")  
        { 
               exit();
        }
      elseif ($approval =="disapproved") 
        { 
              exit();
        }
    ?>
  </div>
</div>