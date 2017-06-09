<script>
var select_all = document.getElementById("selectall"); //select all checkbox
var checkboxes = document.getElementsByClassName("archive"); //checkbox items

//select all checkboxes
select_all.addEventListener("change", function(e){
    for (i = 0; i < checkboxes.length; i++) { 
        checkboxes[i].checked = select_all.checked;
    }
});


for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener('change', function(e){ //".checkbox" change 
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if(this.checked == false){
            select_all.checked = false;
        }
        //check "select all" if all checkbox items are checked
        if(document.querySelectorAll('.archive:checked').length == checkboxes.length){
            select_all.checked = true;
        }
    });
}

  </script>
<?php
	
	include '../dbcon.php';
	$result = mysqli_query($dbcon, "SELECT * FROM student") or die(mysql_error());
	//$user_row = mysqli_fetch_array($result);

	?>

<div class="w3-container">
<button class="w3-btn w3-blue">Import Students</button> 
	<!-- button class="w3-btn w3-red" name="archive">Archive</button -->

<br /><br />

<div class="w3-card-2">
	
<table class="w3-table w3-hoverable" border="0">
	<thead>
	  <tr class="w3-light-grey">
	  	<!-- th><form action="" method="POST"><input type="checkbox" id="selectall" /></form></th -->
	    <th>Reg. No.</th>
	    <th>Name</th>
	    <th>Group</th>
	    <th>Email</th>
	    <th>Course</th>
	    <th>Actions</th>
	  </tr>
	</thead>
	<?php 
		while ($user_row = mysqli_fetch_array($result)) {		
	?>

	<tr>
	  <!-- td><input type="checkbox" class="archive" name="archive[]" value="<?php echo $user_row['regNo'];  ?>" ></td -->

	  <td><?php echo $user_row['regNo'];  ?></td>
	  <?php $theuser = $user_row['regNo'];  ?>

	  <td><?php echo $user_row['lName'].", ".$user_row['fName']." ".$user_row['mName']; ?></td>
	  <td><?php echo "Group";//$user_row['expertise'] ?></td>
	  <td><?php echo $user_row['email']; ?></td>
	  <td><?php echo $user_row['course']; ?></td>
	  <td>
	  	 <?php echo '<a href="edituser.php?user='.$theuser.'"><button class="w3-btn w3-green" '?>">Edit</button></a>
	  </td>
	</tr>
	<?php } ?>
</table>
<?php 

if (isset($_POST['archive'])) {
	$archivestudent = $_POST['regNo'];
} 

	
?> 
</div>
</div>