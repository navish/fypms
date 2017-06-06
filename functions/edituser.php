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
         <h4 class="w3-center">Coordinator's Dashboard</h4>
         <hr>
         <p><!--i class="fa fa-person fa-fw w3-margin-right w3-text-theme"></i--> Name: <?php echo "Cosmas Mushi" ?></p>
         <!-- p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> <?php //echo "ID: ".$user_row['empId']; ?></p -->
        </div>
      </div>
      <br>
      

      <!-- Manage Users -->
       <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo3')" class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Manage Users</button>
          <div id="Demo3" class="w3-hide w3-container">
            <div class="w3-padding">
              <button class="w3-padding w3-btn-block w3-light-grey w3-left-align" onclick="manageStudents()"><i class="fa fa-users fa-fw w3-margin-right"></i>Students </button>
            </div>
            <div class="w3-padding">
              <button class="w3-margin-center w3-btn-block w3-light-grey w3-left-align" onclick="manageSupervisors()"><i class="fa fa-users fa-fw w3-margin-right"></i>Supervisors </button>
            </div>
          </div>
        </div>      
      </div>
      <br />
      <!--Concept Notes -->
      <div class="w3-card-2 w3-round">
            <div class="w3-white">

            <?php 
            #$conceptsql = "SELECT * FROM conceptnote WHERE student = '$regNo'";
            $studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote ") or die(mysqli_error());

            $concept_note = mysqli_fetch_array($studentconcept);
            $concept_num_row = mysqli_num_rows($studentconcept);
            if($concept_num_row > "0") { ?>
                <button class="w3-btn w3-btn-block w3-blue w3-left-align" onclick="viewConcepts()"><i class="fa fa-file-text fa-fw w3-margin-right"></i> View Concept Notes</button>
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
              <button onclick="" class="w3-btn w3-btn-block w3-blue w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Approve Groups</button>
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

      
      <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <button id="" class="w3-btn-block w3-blue w3-left-align" onclick="loadProjects()"><i class="fa fa-file-text fa-fw w3-margin-right"></i>Past Projects</button>
        </div>
      </div>
      <br>   
      
      
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">
    
      
      
      <div id="main">
      
      <?php
  include '../dbcon.php';
  $get_user = $GET_['user'];

  $query = "SELECT * FROM login";
    $result = mysqli_query($dbcon,$query)or die(mysqli_error());
    $num_row = mysqli_num_rows($result);
        $user_row=mysqli_fetch_array($result);

        $role = $user_row['role'];


  if ($role == 2) 
    {
      
        $result = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$get_user'") or die(mysqli_error());
        $student_row = mysqli_fetch_array($result);

        $regNo =  $student_row['regNo'];

   
    $sqlgrp = mysqli_query($dbcon, "SELECT * FROM members WHERE regNo='$get_user'") or die(mysqli_error());
        $group_row = mysqli_fetch_array($sqlgrp);
        $num_row = mysqli_num_rows($sqlgrp);
        $groupNo = $group_row['grpNo'];

    $supId =  "SELECT * FROM `supervisor` WHERE empId = (SELECT empId FROM grp WHERE grpNo = '$groupNo')";
        $supIdsql = mysqli_query($dbcon,$supId) or die(mysqli_error());
        $sup_row = mysqli_fetch_array($supIdsql);
    $supervisor = $sup_row['fName']." ".$sup_row['lName'];
              
        
  ?>
  <div class="w3-row-padding">
        
        <div class="w3-card-2 w3-white">
          <div class="w3-container w3-padding">
            <div class="w3-col m12">
              <h3 class="w3-center">ACCOUNT DETAILS</h3>
            </div>

         <hr>
         <div class="w3-col m3">Name:</div>
         <div class="w3-col m9">
         <i class="fa fa-fw w3-margin-right w3-text-theme"></i><?php echo $student_row['lName'].", ".$student_row['fName']." ".$student_row['mName'] ?>
         </div>
        <br />
         <div class="w3-col m3">Registartion Number:</div>
         <div class="w3-col m9">
         <i class="fa fa-fw w3-margin-right w3-text-theme"></i><?php echo $regNo;  ?>
         </div>
    <br />
         <div class="w3-col m3">Course:</div>
         <div class="w3-col m9">
         <i class="fa fa-fw w3-margin-right w3-text-theme"></i><?php echo $student_row['course']; ?>
         </div>
         <br />
         <div class="w3-col m3">Project Title</div>
         <div class="w3-col m9">
         <i class="fa fa-fw w3-margin-right w3-text-theme"></i><?php echo "TITLE OF THE PROJECT";  ?>
         </div>
         <br />
         <div class="w3-col m3">Group</div>
         <div class="w3-col m9">
         <i class="fa fa-fw w3-margin-right w3-text-theme"></i><?php if($num_row < 0) {echo "None"; } else echo $groupNo;  ?>
         </div>
         <br />
         <div class="w3-col m3">Supervisor:</div>
         <div class="w3-col m9">
         <i class="fa fa-fw w3-margin-right w3-text-theme"></i><?php echo $supervisor;  ?>
         </div>
         <br />
         <div class="w3-col m3">Group Members:</div>
         <div class="w3-col m9">
         <i class="fa fa-fw w3-margin-right w3-text-theme"></i>
         <?php
          if ($num_row > 0) {

            $membersql = mysqli_query($dbcon,"SELECT * FROM members WHERE grpNo = $groupNo") or die(mysqli_error());
        
      while($member = mysqli_fetch_array($membersql)) {
        var_dump($member); 
      $memberNo = $member['regNo'];
          if(!($get_user = $memberNo))
          {
            $studentsql = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$memberNo'") or die(mysqli_error());
            $student = mysqli_fetch_array($studentsql);
            echo $student['lName'].", ".$student['fName']." ".$student['mName'];
          } 
          else
          {         
            echo " ";
        }
        }
              
            } 
            else { 
              echo "<br />You are working alone";
            }             
         ?>
         </div>
         
          </div>
        </div>
      </div>
      <br />
<?php
    }
    else if($role == 1) 
    {
      echo "I am a supervisor";
        $supervisor_result = mysqli_query($dbcon, "SELECT * FROM supervisor WHERE empId = '$get_user'") or die(mysqli_error());
        $supervisor_row = mysqli_fetch_array($supervisor_result); 
    }

    else if($role == 0) 
    {
      echo "I am a coordinator";
        $coordinator_result = mysqli_query($dbcon, "SELECT * FROM supervisor WHERE empId = '$get_user'") or die(mysqli_error());
        $coordinator_row = mysqli_fetch_array($coordinator_result);
    }
    

  ?>

      <div class="w3-row-padding">
        <div class="w3-card-2 "> 
            <div class="w3-container w3-padding">
              <div class="w3-col m12">
              <h3 class="w3-center">UPDATE PASSWORD</h3>
              </div>
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="w3-col m4 w3-padding"><input class="w3-input" type="password" name="pass" placeholder="Password"> </div>
            <div class="w3-col m4 w3-padding"><input class="w3-input" type="password" name="confirmpass" placeholder="Confirm Password"></div>
            <div class="w3-col m4 w3-padding"><button name="update" class="w3-btn"> Update Password</button></div>
          </form> 

              <?php
              if(isset($_POST['update']))
            {
              $pass = $_POST['pass'];
              $confirmpass = $_POST['confirmpass'];
              if ($pass == $confirmpass) {
                  $loginsql = mysqli_query($dbcon, "UPDATE login SET passwrd='$confirmpass' WHERE user = '$get_user'") or die(mysqli_error($dbcon));
                  if ($loginsql) { 
                     if($role == 2) {
                      header('location:../student/'); 
                    }
                    else if($role == 1) 
                      {
                        header('location:../supervisor/');   
                      }

                      else if($role == 0) 
                      {
                       header('location:../coordinator/'); 
                      }
                    
                  ?>
                      <script> alert("Password changed successfully"); </script>
                  <?php
                    
                    } else { ?>
                      <script> alert("Something went wrong password was not changed"); </script>
                  <?php 
                  
                }
                  
              } else { ?>
                 <script> alert("Passwords don't match"); </script>
              <?php
              if($role == 2) {
                      header('location:../student/'); 
                    }
                    else if($role == 1) 
                      {
                        header('location:../supervisor/');   
                      }

                      else if($role == 0) 
                      {
                       header('location:../coordinator/'); 
                      }
               } 

            }
              ?>             
            </div>
        </div>
      </div>
      <br />
      
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
    xhttp.open("GET", "../functions/groups.php", true);
    xhttp.send();
  }
  function viewReports() {
    xhttp.open("GET", "../functions/viewreports.php", true);
    xhttp.send();
  }
   function manageSupervisors() {
    xhttp.open("GET", "../functions/manage-supervisor.php", true);
    xhttp.send();
  }
  function uploadCSVstudent() {
    xhttp.open("GET", "../functions/uploadcsv-student.php", true);
    xhttp.send();
  }
  function uploadCSVsupervisor() {
    xhttp.open("GET", "../functions/uploadcsv-supervisor.php", true);
    xhttp.send();
  }


function manageStudents() {
    xhttp.open("GET", "../functions/manage-student.php", true);
    xhttp.send();
  }
</script>
<!-- Footer -->
<?php
  include '../footer.php';
?>

</body>
</html> 





      