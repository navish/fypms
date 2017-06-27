<?php
  include '../header.php';
    if (!($_SESSION['id']) ){
    header('location:../index.php');
    exit();

    }

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
            
          </div>
        </div>
              
        <?php include '../functions/announcements.php'; ?>
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

