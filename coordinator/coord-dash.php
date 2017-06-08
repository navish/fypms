<?php 

include '../dbcon.php';

//$role = $_SESSION['role'];
$supId  = $_SESSION['id'];
    $studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote ") or die(mysqli_error());
    $concept_num_row = mysqli_num_rows($studentconcept);
    $concept_array = mysqli_fetch_array($studentconcept);

    $grpsql = mysqli_query($dbcon, "SELECT * FROM grp ") or die(mysqli_error());
    $grouprows = mysqli_num_rows($grpsql) ; 

    $result = mysqli_query($dbcon, "SELECT * FROM student") or die(mysql_error());
  //$user_row = mysqli_fetch_array($result);
    $student_row = mysqli_num_rows($result);

?>


<div class="w3-row-padding">
    <div class="w3-col m6">     
      <div class="w3-card-2  ">

      <header class="w3-center w3-container w3-dark-grey">
        <h6>GENERAL INFORMATION</h6>
      </header>

      <div class="w3-container">
        <?php 
            
          echo "<p>There are ".$grouprows." group(s). </p>";
          echo "<p>".$concept_num_row." concept notes have been submitted. </p>";
          echo "<p>There are ".$student_row." students in the system. </p>";
        ?>
      </div>
        
      </div>
    </div>

    <div class="w3-col m6">     
      <div class="w3-card-2  ">

        <header class="w3-center w3-container w3-dark-grey">
          <h6>PROJECTS</h6>
        </header>

        <div class="w3-container">
          <?php
            
            

            if($concept_num_row > "0") { 
              $reccomendation = $concept_array['reccomended'];
              $approval = $concept_array['reccomended'];

              if (($reccomendation="yes") && ($approval="waiting")) {
                
                echo "<p>There are several concept notes to be reviewed  </p>";
              } else {
                
                echo "<p>All concept notes have been reviewed. </p>";
              }
              
                 
               ;
            } 
            else { 
                echo "<p>There are no submitted concept notes </p>";
            } 
          ?>
        </div>
          
        </div>
    </div>
</div> 
<br />
<!-- SECOND ROW -->
<div class="w3-row-padding">
    <div class="w3-col m6">     
      <div class="w3-card-2  ">

      <header class="w3-center w3-container w3-dark-grey">
        <h6>GROUPS &amp; USERS</h6>
      </header>

      <div class="w3-container">
        <?php 
          $grpsql = mysqli_query($dbcon, "SELECT * FROM grp ") or die(mysqli_error());
          $grouprows = mysqli_num_rows($grpsql) ;   
          echo "<p>There are ".$grouprows." group(s). </p>";
        ?>
      </div>
        
      </div>
    </div>

    <div class="w3-col m6">     
      <div class="w3-card-2  ">

        <header class="w3-center w3-container w3-dark-grey">
          <h6>EVALUATION</h6>
        </header>

        <div class="w3-container">
          <?php
            
                echo "<p>Evaluation Activities havent been scheduled yet. </p>";
            
          ?>
        </div>
          
        </div>
    </div>
</div> 






