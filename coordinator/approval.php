<div class="w3-container">
  <div class="w3-card-2">

    <?php

    	include '../dbcon.php';    
    	$concept = $_GET['concept'];
        
      $studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote ") or die(mysqli_error());
    	$concept_note=mysqli_fetch_array($studentconcept);
    	$approval = $concept_note['approval'];

    	if ($approval =="waiting")
        {
          $approvesql = mysqli_query($dbcon, "UPDATE conceptnote SET approval='approved' WHERE conceptid = '$concept'") or die(mysqli_error($dbcon));
          if($approvesql) { 
            echo "<script type='text/javascript'>alert('Concept approved!');</script>";
            } else { 
              echo "Something went wrong the concept was not approved";                  
            } 
            echo "<script>document.location='viewconcepts.php'</script>";            
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