<?php
  include '../header.php';

$get_user = $_SESSION['id'];

#$sql = "SELECT * FROM student WHERE regNo = $get_user";
$result = mysqli_query($dbcon, "SELECT * FROM supervisor WHERE empId = '$get_user'") or die(mysqli_error());
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
         <h4 class="w3-center"></h4>
         <p class="w3-center"><img src="../images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> <?php echo $user_row['fName']." ".$user_row['lName']; ?></p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> <?php echo "ID: ".$user_row['empId']; ?></p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
            <div class="w3-white">

            <?php 
            #$conceptsql = "SELECT * FROM conceptnote WHERE student = '$regNo'";
            $studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote ") or die(mysqli_error());

            $concept_note = mysqli_fetch_array($studentconcept);
            $concept_num_row = mysqli_num_rows($studentconcept);
            if($concept_num_row > "0") { ?>
                <button class="w3-btn w3-btn-block w3-blue" onclick="viewConcepts()">View Concept Notes</button>
                <?php } 
            else { 
                echo "There are no any submitted concepts. <br />";
            } 
              
            ?> 
         <!--button onclick="myFunction('Demo1')" class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-file fa-fw w3-margin-right"></i>Concept Note</button>
          <div id="Demo1" class="w3-hide w3-container">
            
          </div-->
        </div>
      </div>
      <br />
        <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <button onclick="viewGroups()" class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i>View Groups </button>
          
          </div>
        </div>
        <br />
        <div class="w3-card-2 w3-round">
        <div class="w3-white">  
          <!--button onclick="myFunction('Demo2')" class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Group </button>
          <div id="Demo2" class="w3-hide w3-container" -->
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
              <button onclick="" class="w3-btn w3-btn-block w3-blue">Approve Group</button>
              <br />
            <?php } 
            
           



            ?>
              
            
          <!--/div -->
        </div>
      </div>
      <br />
      <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <button onclick="viewReports()" class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-file-text fa-fw w3-margin-right"></i> View Submitted Reports</button>
             
        </div>      
      </div>
      <br />

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
        
          <button id="supervisors" class="w3-btn-block w3-blue" onclick="loadDoc()"> SUPERVISORS </button>
       
      </div>
      <br>
      
      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Past Projects</p>
        </div>
      </div>
      <br>   
      
      
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">COORDINATOR</h6>
              <p contenteditable="true" class="w3-border w3-padding">Make an Announcement</p>
              <button type="button" class="w3-btn w3-theme" onclick="postAnnouncement()"><i class="fa fa-pencil"></i>  Post</button> 
            </div>
          </div>
        </div>
      </div>

      
      <div id="main">
      <?php include '../announce.php'; ?>
      
      </div>
      
    <!-- End Middle Column -->
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
    
  function viewConcepts() {
    xhttp.open("GET", "viewconcepts.php", true);
    xhttp.send();
  }

  function viewGroups() {
    xhttp.open("GET", "../groups.php", true);
    xhttp.send();
  }
  function viewReports() {
    xhttp.open("GET", "viewreports.php", true);
    xhttp.send();
  }

</script>
<!-- Footer -->
<?php
  include '../footer.php';
?>

</body>
</html> 
