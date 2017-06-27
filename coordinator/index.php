<?php
  include '../header.php';
  if (!($_SESSION['id']) ){
header('location:../index.php');
exit();

}

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
      <?php
        include 'coord-nav.php';
      ?>
      
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">
      <div id="main">
      
        <div class="w3-row-padding">
          <div class="w3-col m12">    
            <?php include 'announce.php'; ?> 
            
         </div>
        </div> 
    <br />
        <div class="w3-row-padding">
          <div class="w3-col m12">     
            <?php include 'coord-dash.php'; ?>
         </div>
        </div> 
        </div>
        
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
