
<?php
  include '../dbcon.php';
?>

      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-center">SUBMIT CSV</h6>
            </div>
          </div>
        </div>
      </div>
      <br />
  
   <div class="w3-row-padding">
    <div class="w3-col m12">
      <div class="w3-card-2 w3-white">  
        <div class="w3-container w3-padding"> 
            <form action="uploadtocsv.php" method="post" enctype="multipart/form-data" >
              <br />
              
              <br/>

              <input type="file" name="csvtoupload" class="w3-input" >
              <br/>
              <br />
              <button type="submit" value="upload" class="w3-padding w3-btn-block w3-blue">Submit CSV</button>
            
            </form>
          </div>
        </div>
    </div>
  </div>

