<?php 

include '../dbcon.php';

//$role = $_SESSION['role'];
$supId  = $_SESSION['id'];

?>


<div class="w3-row-padding">
    <div class="w3-col m6">     
      <div class="w3-card-2  ">

      <header class="w3-center w3-container w3-dark-grey">
        <h6>GENERAL INFORMATION</h6>
      </header>

      <div class="w3-container">
        <?php 
          $grpsql = mysqli_query($dbcon, "SELECT * FROM grp WHERE empId = '$supId'") or die(mysqli_error());
          $grouprows = mysqli_num_rows($grpsql) ;   
          echo "<p>You are supervising ".$grouprows." group(s). </p>";
        ?>
      </div>
        
      </div>
    </div>

    <div class="w3-col m6">     
      <div class="w3-card-2  ">

        <header class="w3-center w3-container w3-dark-grey">
          <h6>ONGOING ACTIVITIES</h6>
        </header>

        <div class="w3-container">
          <?php
            $studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote WHERE supervisor = '$get_user'") or die(mysqli_error());
            $concept_num_row = mysqli_num_rows($studentconcept);

            if($concept_num_row > "0") { 
                 
                echo "<p>You have concept notes to review. </p>";
            } 
            else { 
                echo "You don't have any concept notes to review. <br />";
            } 
          ?>
        </div>
          
        </div>
    </div>
</div> 






