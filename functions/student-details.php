<?php
	include 'dbcon.php';
	session_start();


	$get_user = $_SESSION['id'];

	$result = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$get_user'") or die(mysqli_error());
	$user_row = mysqli_fetch_array($result);

	$regNo =  $user_row['regNo'];

	 
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

          <p class="w3-center"><img src="../images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <div class="w3-col m3">Name:</div>
         <div class="w3-col m9">
         <i class="fa fa-fw w3-margin-right w3-text-theme"></i><?php echo $user_row['lName'].", ".$user_row['fName']." ".$user_row['mName'] ?>
         </div>
        <br />
         <div class="w3-col m3">Registartion Number:</div>
         <div class="w3-col m9">
         <i class="fa fa-fw w3-margin-right w3-text-theme"></i><?php echo $regNo;  ?>
         </div>
		<br />
         <div class="w3-col m3">Course:</div>
         <div class="w3-col m9">
         <i class="fa fa-fw w3-margin-right w3-text-theme"></i><?php echo $user_row['course']; ?>
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

      <div class="w3-row-padding">
        <div class="w3-card-2 "> 
            <div class="w3-container w3-padding">
              <div class="w3-col m12">
              <h3 class="w3-center">UPDATE PASSWORD</h3>
              </div>
              <form action="" method="POST">
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
                  $loginsql = mysqli_query($dbcon, "UPDATE login SET passwrd='$confirmpass' WHERE user = '$regNo'") or die(mysqli_error($dbcon));
                  if ($loginsql) { ?>
                      <script> alert("Password changed successfully"); </script>
                  <?php } else { ?>
                      <script> alert("Something went wrong password was not changed"); </script>
                  <?php }
                  
              } else { ?>
                 <script> alert("Passwords don't match"); </script>
              <?php } 

            }
              ?>             
            </div>
        </div>
      </div>
      <br />

      