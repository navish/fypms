

<?php
  include '../header.php';

?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
    <?php
      include 'coord-nav.php';
    ?>
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">
    
      
      
      <div id="main">


      <div class="w3-row-padding">
        <div class="w3-card-2 "> 
            <div class="w3-container w3-padding">
              <div class="w3-col m12">
              <h3 class="w3-center">ASSIGN SUPERVISORS</h3>
              
              </div>
            </div>
          </div>

        <div class=" "> 
         <div class="w3-container w3-padding">
         <p class="w3-small w3-right-align">Note assigned groups will appear under the <button onclick="viewGroups()" class="w3-btn w3-blue w3-left-align"><i class="fa fa-users fa-fw "></i>View Groups </button> button</p>    
          <div class="w3-center">
           <?php 
            $sqlgrp = mysqli_query($dbcon, "SELECT * FROM `suggestedgroup` WHERE approval='approved'") or die(mysqli_error($dbcon));
            //$group_row = mysqli_fetch_array($sqlgrp);
            $num_row = mysqli_num_rows($sqlgrp);

            if ($num_row < 0) { 
              echo "There are groups to assign";
              
             }
             else { ?>
               <table class="w3-table w3">
                <thead>
                  <tr class="w3-dark-grey">
                    <th>Approved Group Members</th>
                    <th>Proposed Title</th>
                    <th>Select Supervisor </th>
                    <th>Approve</th>
                  </tr>
                </thead>
                <?php 
                  while($group_row = mysqli_fetch_array($sqlgrp)) {
                            $assignId =  $group_row['sugId'];
                ?>
                <tr>
                  <td>
                  <?php 
                   	$member1 = $group_row['fMember'];
                    $result1 = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$member1'") or die(mysqli_error());
                    $member_row1 = mysqli_fetch_array($result1);
                    echo $member_row1['lName'].", ".$member_row1['fName']." ".$member_row1['mName']." - (".$member1.")<br> ";

                    $member2 =  $group_row['sMember'];
                    $result2 = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$member2'") or die(mysqli_error());
                    $member_row2 = mysqli_fetch_array($result2); 
                    if (!empty($member_row2)) {
                    	echo $member_row2['lName'].", ".$member_row2['fName']." ".$member_row2['mName']." - (".$member2.")<br> ";
                  	}
                    $member3 =  $group_row['tMember']; 
                    $result3 = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$member3'") or die(mysqli_error());
                    $member_row3 = mysqli_fetch_array($result3);
                    if (!empty($member_row3)) {
                    	echo $member_row3['lName'].", ".$member_row3['fName']." ".$member_row3['mName']." - (".$member3.")<br> ";
                    }
                    
                  ?>
                    
                  </td>
                  <td><?php
                   $title="Title";
                   echo $title;
                  
                  ?></td>
                  <td><form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  	<select class="w3-select" name="assignedsupervisor">
                  	<?php
                  		$result = mysqli_query($dbcon, "SELECT * FROM supervisor") or die(mysql_error());
                  		while ($user_row = mysqli_fetch_array($result)) {
                  		$supervisor = $user_row['empId'];
          						echo $user_row['fName']." ".$user_row['lName']; 
          						echo "<option value=".$supervisor.">".$user_row['fName']." ".$user_row['lName']."</option>"; 
          						 } ?>
					</select>
                   </td>
                  	<td> 
                    <button class="w3-padding w3-btn w3-green " type="submit" name="assign"><i class="fa fa-check fa-fw"></i>Assign</button>
                  </form>

                    </td>
                </tr>
                <?php } //End While ?>
                <?php 
                    if (isset($_POST['assign'])) {
                      $assignedsupervisor = $_POST['assignedsupervisor'];
                      $randId = rand(713, 100000);
                      $assignedsup = mysqli_query($dbcon, "INSERT INTO `grp`(`grpId`,`approval`, `empId`) VALUES ('$randId','1','$assignedsupervisor')") or die(mysqli_error($dbcon));

                      $gresult = mysqli_query($dbcon, "SELECT * FROM grp WHERE grpId = '$randId'") or die(mysql_error());
                      $grp_row = mysqli_fetch_array($gresult);
                      $grp = $grp_row['grpNo'];

                      $assignmembersql = "INSERT INTO `members`(`grpNo`, `regNo`) VALUES ('$grp','$member1'),('$grp','$member2'),('$grp','$member3')";
              
                      $approvesql = mysqli_query($dbcon, "UPDATE suggestedgroup SET approval='assigned' WHERE sugId = '$assignId'") or die(mysqli_error($dbcon));
                    if($approvesql) { 

                      $assignedgrp = mysqli_query($dbcon, $assignmembersql) or die(mysqli_error($dbcon));

                      if ($assignedsup && $assignedgrp) {
                        echo "<script type=\"text/javascript\"> alert(\"You have assigned a supervisor\"); </script>";
                      } else {
                        echo "<script type=\"text/javascript\"> alert(\"You have failed to assign a supervisor\"); </script>";
                      }
                     } 
                    } 
                  ?>  
              </table>
             <?php 
             } //End Else
             ?>
            </div>      
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

<!-- Footer -->
<?php
  include '../footer.php';
?>

</body>
</html> 





