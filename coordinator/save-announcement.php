<?php  
	
              if (isset($_POST['submit'])) 
              {
                $title = mysqli_real_escape_string($dbcon,$_POST['title']);
                $announcement = mysqli_real_escape_string($dbcon,$_POST['announcement']);

                $save = mysqli_query($dbcon, "INSERT into announcement(`title`, `description`, time) VALUES ('$title','$announcement',now() ") or die(mysqli_error($dbcon));
                if ($save) {
                  ?>
              <script> alert("Your announcement has been posted"); </script>
                <?php  } else { ?>
              <script> alert("Sorry, your announcement post failed"); </script>
              <?php
                }
              }
?>