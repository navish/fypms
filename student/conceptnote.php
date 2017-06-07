<?php include '../header.php'; 
  $get_user = $_SESSION['id'];

  $result = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$get_user'") or die(mysqli_error());
  $user_row = mysqli_fetch_array($result);

  $regNo =  $user_row['regNo']; 
?>


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">

    <!-- Left Column -->
    <div class="w3-col m3">
      <?php include 'stu-nav.php';     ?>
      <br />
    </div>    
    <!-- End Left Column -->
    
    
    <!-- Middle Column -->
    <div class="w3-col m9">
      <div id="main">
              
          <div class="w3-row-padding">
            <div class="w3-col m12">
              <div class="w3-card-2 w3-white">
                <div class="w3-container w3-padding">
                  <h5 class="w3-center">SUBMIT CONCEPT NOTE</h5>
                </div>
              </div>
            </div>
          </div>
        <br />
      
       <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-white">  
            <div class="w3-container w3-padding"> 

            <form action=""<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"" method="POST" enctype="multipart/form-data" >
              <br />

              <div class="w3-row">
                <div class="w3-col m4">Proposed Title   </div>
                <div class="w3-col m8">
                  <input type="text" name="title" class="w3-input" placeholder="Proposed Title" >
                </div>
              </div><br />

              <div class="w3-row">
                <div class="w3-col m4">Expected Output   </div>
                <div class="w3-col m8">
                      <input type="text" name="exout" class="w3-input" placeholder="Expected Output eg. Mobile app, Web app etc" >
                </div>
              </div><br />

              <div class="w3-row">
                <div class="w3-col m4">Propose A Supervisor </div>
                <div class="w3-col m8">
                  <select class="w3-select" name="propsup">
                    <?php
                      $result = mysqli_query($dbcon, "SELECT * FROM supervisor") or die(mysql_error());
                      while ($user_row = mysqli_fetch_array($result)) {
                      $supervisor = $user_row['empId'];
                      $expertise = $user_row['expertise'];

                      echo $user_row['fName']." ".$user_row['lName']; 
                      echo "<option value=".$supervisor.">".$user_row['fName']." ".$user_row['lName']."</option>"; 
                    } ?>
                  </select>
                </div>
              </div><br />

              <div class="w3-row">
                <div class="w3-col m4">Concept Note </div>
                <div class="w3-col m8">
                    <input type="file" name="concept" class="w3-input" >
                </div>
              </div><br />

              <div class="w3-center">
                <button type="submit" name="submit" class="w3-padding w3-btn w3-blue">Submit Concept Note</button>
              </div>            
            </form>
            </div>
          </div>
        </div>
      </div>
<?php
if (isset($_POST['submit'])) {

  $propsupervisor = $_POST['propsup'];
  $proptitle = $_POST['title'];
  $concept = $_POST['concept'];
  $proptitle = $_POST['title'];

    include '../upload.php';

    $sql = "UPDATE `conceptnote` SET conceptfile = '$target_file' WHERE projectId = $projectId";
    $insert = mysqli_query($dbcon, $sql);

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
        function readURL(inp

      </div>
    </div>
    <!-- End Middle Column -->
  </div> 
  <!-- End Grid -->
</div>  
  
<!-- End Page Container -->


<br>

<!-- Footer -->


<?php include '..\footer.php'; ?>

