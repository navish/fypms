
<?php
	
	 include '../header.php';
	$result = mysqli_query($dbcon, "SELECT * FROM student") or die(mysql_error());
	//$user_row = mysqli_fetch_array($result);

	?>




<!-- Page Container -->
<div class="w3-container " style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row-padding">
    <!-- Left Column -->
    <div class="w3-col m3 ">
    <?php
      include 'coord-nav.php';
    ?>
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">
      
      <div id="main">


      <div class="w3-row-padding w3-container">
       
		<button onclick="importStudent()" class="w3-btn w3-blue">Import Students</button> 
	<!-- button class="w3-btn w3-red" name="archive">Archive</button href="importstudent.php"-->

		<br /><br />

		<div class="w3-card-2">
			
		<table class="w3-table w3-hoverable" border="0">
			<thead>
			  <tr class="w3-dark-grey">
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
			  <!-- td><input type="checkbox" class="archive" name="archive[]" value="<?php //echo $user_row['regNo'];  ?>" ></td -->

			  <td><?php echo $user_row['regNo'];  ?></td>
			  <?php $theuser = $user_row['regNo'];  ?>

			  <td><?php echo $user_row['lName'].", ".$user_row['fName']." ".$user_row['mName']; ?></td>

			  <td><?php 
			  	$studentgr = mysqli_query($dbcon, "SELECT grpNo FROM members where regNo= '$theuser'") or die(mysql_error()); 
			  	$studentgrpr_row = mysqli_fetch_array($studentgr);
			  	echo $studentgrpr_row['grpNo'];//$user_row['expertise'] ?>
			  	
			  </td>

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
		 
	      <br />
	      
	   </div>
      
    <!-- End Middle Column -->
    </div>
    
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<?php
  include '../footer.php';
?>
<script>

var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("main").innerHTML = this.responseText;
      }
    };
function importStudent() {
  xhttp.open("GET", "importstudent.php", true);
    xhttp.send();
  }
</script>


