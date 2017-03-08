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