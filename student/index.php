<?php include '../header.php'; 
//$get_user = $_GET['user'];
$get_user = $_SESSION['id'];

#$sql = "SELECT * FROM student WHERE regNo = $get_user";
$result = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$get_user'") or die(mysqli_error());
$user_row = mysqli_fetch_array($result);

$regNo =  $user_row['regNo']; 
//var_dump($regNo);
?>


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      
      
      <!-- Accordion -->
      <?php
      include 'stu-nav.php';
    ?>
      <br />
         
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">
      <div id="main">
        <div class="w3-row-padding">
          <div class="w3-col m12">
            
          </div>
        </div>
              
        <?php include '../functions/announce.php'; ?>
      </div>
    </div>
    <!-- End Middle Column -->
     

    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->


<?php include '..\footer.php'; ?>

