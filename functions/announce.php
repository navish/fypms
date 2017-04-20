<?php 

include '../dbcon.php';

$role = $_SESSION['role'];


  if ($role == 0){
    ?>
    <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding w3-align-right">
              <p contenteditable="true" class="w3-border w3-padding">Make an Announcement</p>
              <button type="button" class=" w3-btn w3-theme" onclick="postAnnouncement()"><i class="fa fa-pencil"></i>  Post</button> 
            </div>
          </div>
        </div>
      </div>
<br />
<?php } ?>
<div class="w3-container w3-card-2 w3-blue w3-btn-block ">
	<h6>ANNOUNCEMENTS</h6>
</div>
<?php 

$sql = "SELECT * FROM announcement";

$result = mysqli_query($dbcon,$sql) or die(mysqli_error());;
$row = mysqli_fetch_array($result);

#$num_rows = mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result)) {
	# code...


?>

<div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>

        <span class="w3-right w3-opacity"><?php echo "Posted at ".$row['time'] ;?></span>
        <h4><?php echo $row['title'];?></h4>
        <p><?php echo $row['description']; 
        ?></p>
        <button type="button" class="w3-btn w3-theme-d1 w3-margin-bottom">More Details</button> 
 </div>
 <?php } ?>