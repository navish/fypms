<?php include '../header.php'; 
//$get_user = $_GET['user'];
$get_user = $_SESSION['id'];

#$sql = "SELECT * FROM student WHERE regNo = $get_user";
$result = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$get_user'") or die(mysqli_error());
$user_row = mysqli_fetch_array($result);

$regNo =  $user_row['regNo']; var_dump($regNo);
?>


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><img src="../images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> <?php echo $user_row['lName'].", ".$user_row['fName']." ".$user_row['mName'] ?> </p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?php echo $user_row['regNo'];  ?></p>

         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> <?php echo $user_row['course']; ?></p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-file fa-fw w3-margin-right"></i>Concept Note</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>

            <?php 
            #$conceptsql = "SELECT * FROM conceptnote WHERE student = '$regNo'";
            $studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote WHERE studentid = '$regNo'") or die(mysqli_error());

            $concept_note = mysqli_fetch_array($studentconcept);
            $concept_num_row = mysqli_num_rows($studentconcept);
            if($concept_num_row > "0") {
              echo "You submitted a concept note. <br />";

                $approval = $concept_note['approval'];

                if($approval == 'approved') {
                  echo "It has been APPROVED.";
                }
                else if ($approval == 'disapproved') {
                  echo "It has been REJECTED";
                ?>
                  <br />
                  <button class="w3-btn w3-btn-block w3-grey" onclick="submitConcept()">Submit Another Concept</button>
                  <br 
              <?php
                 }
                else
                {
                  echo "It is waiting approval";
                }
                

            } else {  ?>
              <br />
              <button class="w3-btn w3-btn-block w3-grey" onclick="submitConcept()">Submit Concept</button>
              <br />
            <?php } 
              
            ?> 

            </p>
          </div>
        </div>
      </div>
      <br />
      <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo2')" class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Group </button>
          <div id="Demo2" class="w3-hide w3-container">
            <?php 
            #$sqlgroup = "SELECT grpNo FROM members WHERE regNo='$get_user'";
            $sqlgrp = mysqli_query($dbcon, "SELECT grpNo FROM members WHERE regNo='$get_user'") or die(mysqli_error());
            $group_row = mysqli_fetch_array($sqlgrp);
            $num_row = mysqli_num_rows($sqlgrp);
            $groupNo = $group_row['grpNo'];


            if ($num_row > 0) {
              #var_dump($group_row);

              #$group_row =;
              echo "<p>Your group number is ". $group_row['grpNo'] . "</p>" ;
               $groupNo = $group_row['grpNo'];

              $supId =  "SELECT * FROM `supervisor` WHERE empId = (SELECT empId FROM grp WHERE grpNo = '$groupNo')";
              $supIdsql = mysqli_query($dbcon,$supId) or die(mysqli_error());
              $sup_row = mysqli_fetch_array($supIdsql);

              $supervisor = $sup_row['fName']." ".$sup_row['lName'];
              echo "Your supervisor is ".$supervisor;
            } 
            else { ?>
              <br />
              <button onclick="suggestGroup()" class="w3-btn w3-btn-block w3-grey">Suggest Group</button>
              <br />
            <?php } 
            
           



            ?>
              
            
          </div>
        </div>
      </div>
      <br />
      <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo3')" class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-file-text fa-fw w3-margin-right"></i> Reports</button>
          <div id="Demo3" class="w3-hide w3-container">

              <p><a
              <?php

              $repsql = "SELECT report1 FROM progressreport WHERE projectId = (SELECT projectId FROM project WHERE grpNo = '$groupNo')";
              $reportsql = mysqli_query($dbcon,$repsql) or die(mysqli_error($dbcon));

              $report = mysqli_fetch_array($reportsql);

              $reportfile = $report['report1'];
              $fileAddress = "../".$reportfile;
              echo 'href="'.$fileAddress.'"';

              ?>>
              <button class="w3-btn-block w3-grey w3-left-align"><i class="fa fa-save fa-fw w3-margin-right"></i> View Submitted Report </button></a></p>

              

              <p><a><button class="w3-btn-block w3-grey w3-left-align"><i class="fa fa-upload fa-fw w3-margin-right"></i> Upload New Report </button></a></p>
          </div>
        </div>      
      </div>
      <br />
         
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    <div id="main">
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">ANNOUNCEMENTS</h6>
            </div>
          </div>
        </div>
      </div>
      
      
      <?php include '../announce.php'; ?>
      
      </div>
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <h4 ><strong> REMINDERS</strong> </h4>
          
          <p><strong>Presentation</strong></p>
          <p>Friday, 17th at 0800hrs</p>
          <p><button class="w3-btn w3-btn-block w3-theme-l4">Info</button></p>
        </div>
      </div>
      <br>
      
      <div class="w3-card-2 w3-round w3-white w3-center">
        
          <a href="../supervisors.php"><button class="w3-btn-block w3-blue "> SUPERVISORS </button></a>
       
      </div>
      <br>
      
      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Past Projects</p>
        </div>
      </div>
      <br>
      
     
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>
<script>
     var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("main").innerHTML = this.responseText;
      }
    };
function loadDoc() {
  xhttp.open("GET", "../supervisor.php", true);
    xhttp.send();
  }

function submitConcept() {
  xhttp.open("GET", "conceptnote.php", true);
    xhttp.send();
  }
function suggestGroup() {
  xhttp.open("GET", "suggestgroup.php", true);
    xhttp.send();
  }
  </script>
<!-- Footer -->
<?php include '..\footer.php'; ?>

