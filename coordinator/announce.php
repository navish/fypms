    
    <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding w3-center">
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

                <input class="w3-input w3-border" type="text" name="title" placeholder="Announcement Title"><br>
                <input class="w3-input w3-border" type="text" name="announcement" placeholder="Make An Announcement">
              
                <br />
                <button type="submit"  class=" w3-btn w3-theme"  name="submit"><i class="fa fa-pencil"></i>  Post</button> 
              </form>
            </div>
          </div>
        </div>
      </div>

<?php 
if (isset($_POST['submit'])) 
              {
                $title = mysqli_real_escape_string($dbcon,$_POST['title']);
                $announcement = mysqli_real_escape_string($dbcon,$_POST['announcement']);

                $save = mysqli_query($dbcon, "INSERT into announcement(`title`, `description`, time) VALUES ('$title','$announcement',now())") or die(mysqli_error($dbcon));
                if ($save) {
                  echo "<script> alert(\"Your announcement has been posted\"); </script>";
                   } else 
                   { 
                    echo "<script> alert(\"Sorry, your announcement post failed\"); </script>";
             
                }
              } 
?>


