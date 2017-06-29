

<?php
	
	include '../dbcon.php';

	$pastprojecttitle = mysqli_query($dbcon, "SELECT * FROM pastproject ") or die(mysqli_error());
    //var_dump($pastprojecttitle);
    //$concept_num_row = mysqli_num_rows($pastprojecttitle);
     
	?> 
	<div class="w3-center"> 
	<h3>PAST PROJECT TITLES</h3>
	</div>

	<div class="w3-container">
	<div class="w3-responsive">


  <div class="w3-clear"></div>
<br />

<table class="w3-table-all">
	<thead>
	  <tr class="w3-light-grey">
	    <th>Proposed Title</th>
	    
	    <th>Document</th>
	    <th>Grad Year</th>
	  </tr>
	</thead>
	<?php 
		while($pastproject=mysqli_fetch_array($pastprojecttitle)) {
	?>
	<tr>
	  
	  <td><?php echo $pastproject['title']; ?></td>
	  
	  <td><a <?php echo 'href="'.$pastproject['pastprojectfile'].'"'; ?>>View Document</a></td>
	  <td><?php echo $pastproject['year']; ?></td>
   
    
	</tr>
	<?php } ?>
</table>
</div>
</div>

