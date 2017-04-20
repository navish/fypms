<?php include 'header.php'; 
//$get_user = $_GET['user'];
$get_user = $_SESSION['id'];

#$sql = "SELECT * FROM student WHERE regNo = $get_user";
$result = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$get_user'") or die(mysql_error());
$user_row = mysqli_fetch_array($result);
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
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?php echo $user_row['regNo']; ?></p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> <?php echo $user_row['course']; ?></p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-file fa-fw w3-margin-right"></i>Concept Note</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>Submitted.
            <?php #Check if you have submitted concept note 
            /*if (concepnotesubmitted) {
              echo "You have submitted your concept note";
              if (noteis approved) {
                echo "It has been approved";
              }
              else {
                echo "It is waiting approval";
              }
              if (note is rejected) {
                echo "Your Concept Note has been rejected";
              }
              
            }
            else
              echo "You have not submitted your concept note";*/
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
            #var_dump($group_row);

            #$group_row =;
            echo "<p>Your group number is ". $group_row['grpNo'] . "</p>" ;
             $groupNo = $group_row['grpNo'];

            $supId =  "SELECT * FROM `supervisor` WHERE empId = (SELECT empId FROM grp WHERE grpNo = '$groupNo')";
            $supIdsql = mysqli_query($dbcon,$supId) or die(mysqli_error());
            $sup_row = mysqli_fetch_array($supIdsql);

            $supervisor = $sup_row['fName']." ".$sup_row['lName'];
            echo "Your supervisor is ".$supervisor;


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
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">ANNOUNCEMENTS</h6>
            </div>
          </div>
        </div>
      </div>
      
      <div id="main">
      <?php include 'supervisor.php'; ?>
      
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
        <div class="w3-container">
          <p>Supervisors</p>
          
        </div>
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

<!-- Footer -->
<?php include 'footer.php'; ?>

