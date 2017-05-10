
<?php
  include '../dbcon.php';
  include '../session.php';
  $student = $_SESSION['id'];

?>

      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-white">
            <div class="w3-container w3-padding">
              <h3 class="w3-center">SUBMIT REPORT</h3>
            </div>
          </div>
        </div>
      </div>
      <br />
  
   <div class="w3-row-padding">
    <div class="w3-col m12">
      <div class="w3-card-2 w3-white">  
        <div class="w3-container w3-padding" id="reportsub"> 
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="" enctype="multipart/form-data">
              <br />
              <input type="file" name="report" class="w3-input" placeholder="Choose File" onchange="readURL(this)" required>
              <span id="reportname" class="w3-hide"></span>
              <br />

              <label class="w3-label"><input type="radio" name="report_type" value="review" class="" required> Submit Report for Review</label> 
              <br />

              <label class="w3-label"><input type="radio" name="report_type" value="semester1-progress" class=""> Semester 1 - Progress Report </label>
              <br />

              <label class="w3-label"><input type="radio" name="report_type" value="semester1-final" class="" > Semester 1 - Final Submission</label> 
              <br />

              <label class="w3-label"><input type="radio" name="report_type" value="semester2-progress" class="" > Semester 2 - Progress Report </label>
              <br />

              <label class="w3-label"><input type="radio" name="report_type" value="semester2-final" class="" > Semester 2 - Final Submission</label> 
              <br />

              <br />
              <button type="" name="submit" onclick="" class="w3-padding w3-btn-block w3-blue">Submit Report</button>
            </form>
          </div>
        </div>
    </div>
  </div>

<?php
if (isset($_POST['submit'])) {

  //$report = $_POST['report'];
  $report_type = $_POST['report_type'];

//Fetch the project Id for insertion
  $groupsql = mysqli_query($dbcon, "SELECT grpNo FROM members WHERE regNo = '$student'");
  $groupArray = mysqli_fetch_array($groupsql);
  $groupNo = $groupArray['grpNo'];

  $projectsql = mysqli_query($dbcon, "SELECT projectId FROM project WHERE grpNo = '$groupNo'"); 
  $projectArray = mysqli_fetch_array($projectsql);
  $projectId = $projectArray['projectId'];

  if ($report_type == "review") {
  	include '../functions/review-reports.php';

  	$sql = "UPDATE `progressreport` SET review = '$target_file' WHERE projectId = $projectId";
  	$insert = mysqli_query($dbcon, $sql);

  } 
  else 
  {
  	include '../functions/finalsub-reports.php';

  	if ($report_type == "semester1-progress") {
  		$sql = "UPDATE `progressreport` SET sem1_progress = '$target_file' WHERE projectId = '$projectId'";
  	} 
  	if ($report_type == "semester1-final") {
		$sql = "UPDATE `progressreport` SET sem1_final = '$target_file' WHERE projectId = '$projectId'";
  	}
  	if ($report_type == "semester2-progress") {
  		$sql = "UPDATE `progressreport` SET sem2_progress = '$target_file' WHERE projectId = '$projectId'";
  	} 
  	if ($report_type == "semester2-final") {
		$sql = "UPDATE `progressreport` SET sem2_final = '$target_file' WHERE projectId = '$projectId'";
  	}

  	$insert = mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));
  	
  }
 
if (($insert = true) && ($uploadOk == 1)) { ?>
    <script>
    alert('Report Successfully Submitted.');
   window.location = 'index.php';
    </script>
  <?php 
  } else { var_dump($insert); var_dump($uploadOk); ?>
    
    <script>
    alert('Something went wrong your report was not submitted.');
  window.location = 'index.php';
    </script>    
  <?php
 
      }

    } //isset Submit

  ?>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#reportname').attr('src', e.target.result);
                    $('#reportname').addClass("w3-show")
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

