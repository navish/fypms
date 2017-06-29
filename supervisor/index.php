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
      include 'sup-nav.php';
    ?>
    
    </div>
    <!-- End Left Column -->

    <!-- Middle Column -->
    <div class="w3-col m9">
    <div id="main">

      <div class="w3-row-padding">
        <div class="w3-col m12">     
          <?php include 'sup-dash.php'; ?>
       </div>
      </div> 
<br /><br />
      <!--div class="w3-row-padding">
        <div class="w3-col m12">     
          <?php //include '../functions/announcements.php'; ?>
       </div>
      </div--> 
      </div>
    <!-- End Middle Column -->
    </div>

    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br />

<!-- Footer -->
<?php
  include '../footer.php';
?>

