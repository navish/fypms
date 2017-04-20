<?php

  $get_user = $_SESSION['id'];

  $result = mysqli_query($dbcon, "SELECT * FROM supervisor WHERE empId = '$get_user'") or die(mysql_error());
  $user_row = mysqli_fetch_array($result);
?>    
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">Supervisor's Dashboard</h4>
         <p class="w3-center"><img src="../images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p class="w3-center"><!--i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i--> Name: <?php echo $user_row['fName']." ".$user_row['lName'] ?> </p>
         <!--p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?php echo $user_row['empId']; ?></p-->
        </div>
      </div>
      <br />
      
    <!-- ***GRADING*** -->
      <div class="w3-card-2">
        <div class="w3-white">
          <button onclick="panelist()" class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i>Presentation Panelist </button>
          
          </div>
        </div>
        <br />

      <!--Concept Notes -->
      <div class="w3-card-2">
            <div class="w3-white">

            <?php 
            #$conceptsql = "SELECT * FROM conceptnote WHERE student = '$regNo'";
            $studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote ") or die(mysqli_error());

            $concept_note = mysqli_fetch_array($studentconcept);
            $concept_num_row = mysqli_num_rows($studentconcept);
            if($concept_num_row > "0") { ?>
                <button class="w3-btn w3-btn-block w3-blue w3-left-align" onclick="supervisorConcepts()"><i class="fa fa-sticky-note-o   fa-fw w3-margin-right"></i> View Concept Notes</button>
                <?php } 
            else { 
                echo "There are no any submitted concepts. <br />";
            } 
              
            ?> 
      
        </div>
      </div>
      <br />

  

      <!-- ***GROUPS*** -->
      <div class="w3-card-2">
        <div class="w3-white">
          <button onclick="supervisorGroups()" class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i>View Groups </button>
          
          </div>
        </div>
        <br />

      <!-- ***REPORTS*** --> 
      <div class="w3-card-2">
        <div class="w3-white">
          <button onclick="supervisorReview()" class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-file-text fa-fw w3-margin-right"></i> Review Reports</button>
             
        </div>      
      </div>
      <br />

       <!-- ***REPORTS*** --> 
      <div class="w3-card-2">
        <div class="w3-white">
          <button onclick="supervisorReports()" class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-file-text fa-fw w3-margin-right"></i> View Submitted Reports</button>
             
        </div>      
      </div>
      <br />
   