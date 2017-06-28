<?php

if (!($_SESSION['id']) ){
header('location:../index.php');
exit();

}
?>

<div class="w3-card-2 w3-round w3-white">
        <div class="w3-center w3-container">
         <h4 class="">Coordinator's Dashboard</h4>
         <hr>
         <p><i class="fa fa-person fa-fw "></i> Name: <?php echo "Cosmas Mushi" ?></p>
        </div>
      </div>
      <br>
      

      <!-- Manage Users -->
       <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo3')" class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Manage Users</button>
          <div id="Demo3" class="w3-hide w3-container">
            <div class="w3-padding">
              <a href="manage-student.php"><button class="w3-padding w3-btn-block w3-light-grey w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i>Students </button></a>
            </div>
            <div class="w3-padding">
              <a href="manage-supervisor.php"><button class="w3-margin-center w3-btn-block w3-light-grey w3-left-align" ><i class="fa fa-users fa-fw w3-margin-right"></i>Supervisors </button></a>
            </div>
          </div>
        </div>      
      </div>
      <br />
      <!--Concept Notes -->
      <div class="w3-card-2 w3-round">
            <div class="w3-white">

            <?php 
            $studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote ") or die(mysqli_error());

            $concept_note = mysqli_fetch_array($studentconcept);
            $concept_num_row = mysqli_num_rows($studentconcept);
            if($concept_num_row > "0") { ?>
                <a href="viewconcepts.php"><button class="w3-btn w3-btn-block w3-blue w3-left-align"><i class="fa fa-file-text fa-fw w3-margin-right"></i> View Concept Notes</button></a>
                <?php } 
            else { 
                echo "There are no any submitted concepts. <br />";
            } 
              
            ?> 
      
        </div>
      </div>
      <br />
        <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <a href="groups.php"><button class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i>View Groups </button></a>
          
          </div>
        </div>
        <br />
        <div class="w3-card-2 w3-round">
        <div class="w3-white">  
              <a href="approve-groups.php"><button  class="w3-btn w3-btn-block w3-blue w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Approve Groups</button></a>            
        </div>
      </div>
      <br />
      <div class="w3-card-2 w3-round">
        <div class="w3-white">
               <a href="assign-supervisor.php"><button class="w3-btn w3-btn-block w3-blue w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Assign Supervisors</button></a>
        </div>
      </div>
      <br /> 

      <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <a href="viewreports.php"><button class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-file-text fa-fw w3-margin-right"></i> View Submitted Reports</button></a>
             
        </div>      
      </div>
      <br />

      
      <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <a href="../search-projects.php"><button id="" class="w3-btn-block w3-blue w3-left-align" ><i class="fa fa-file-text fa-fw w3-margin-right"></i> Project Archieve</button></a>
        </div>
      </div>
      <br>   

