<div class="w3-card-2"> 
<?php

	include '../dbcon.php';    
	$get_user = $_GET['user'];
    
  $roleresult = mysqli_query($dbcon, "SELECT * FROM login WHERE user = $get_user  ") or die(mysql_error());
	$user_role= mysqli_fetch_array($roleresult);
	$role = $user_role['role'];

	if ($role=="1") {
		$upgradesql = mysqli_query($dbcon, "UPDATE login SET role='0' WHERE user = '$get_user'") or die(mysqli_error($dbcon));
        if($upgradesql) { 
          echo "User upgraded successfully";
          echo "<script> window.location = 'manage-supervisor.php'; </script>";
           
          } else { 
            echo "Something went wrong the user was not upgraded";                  
      		} 
				  			
	}//End Upgrade
	 elseif ($role=="0" )  { 
						  		
        $downgradesql = mysqli_query($dbcon, "UPDATE login SET role='1' WHERE user = '$get_user'") or die(mysqli_error($dbcon));
        if ($downgradesql) { 
          echo "User downgraded successfully";
                     
?>
           	<script> window.location = 'manage-supervisor.php'; </script>
                      
        <?php
                    
          } else { 
            echo "Something went wrong the user was not downgraded";
            ?>
                <script> alert("Something went wrong the user was not downgraded"); </script>
        <?php 
                  
      		}
        }//End Downgrade
        ?>  
</div>

