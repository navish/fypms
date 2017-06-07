<?php
  include '../header.php';
?>

<br />
He
<br />

Test<br />

<br />


        <div class="w3-card-2 w3-round">
        <div class="w3-white">  
         
            <?php 
            $sqlgrp = mysqli_query($dbcon, "SELECT * FROM `suggestedgroup` ") or die(mysqli_error($dbcon));
            $group_row = mysqli_fetch_array($sqlgrp);

             var_dump($sqlgrp);
             //$num_row = mysqli_num_rows($sqlgrp);
            $approval = $group_row['approval'];
            var_dump($approval);

            if ($approval=='waiting') { ?>
              <a href="approve-groups.php"><button  class="w3-btn w3-btn-block w3-blue w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Approve Groups</button></a>            
        </div>
      </div>
      <br />
      
                   
            <?php }
            elseif($approval=='approved') { 
              ?>
        <div class="w3-card-2 w3-round">
          <div class="w3-white">  
               <a href="assign-supervisor.php"><button class="w3-btn w3-btn-block w3-blue w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Assign Supervisors</button></a>
     

            <?php } ?>
            
        </div>
      </div>
      <br /> 
       
