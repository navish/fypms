<?php

$output=null;
$output2=null;
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'dbcon.php';
 
// Check connection
if($dbcon === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$term = mysqli_real_escape_string($dbcon, $_REQUEST['term']);
 
if(isset($term)){
    // Attempt select query execution
    $sql = "SELECT * FROM project WHERE projectTitle LIKE '" . $term . "%'";
	$sql2 = "SELECT * FROM pastproject WHERE title LIKE '" . $term . "%'";
    if($result = mysqli_query($dbcon, $sql)){
        if(mysqli_num_rows($result) > 0){
			
			$output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Current Project Title</th>
     <th>Description</th>
     <th>Output</th>
     <th>Group Number</th>
    </tr>
 ';
			
            while($row = mysqli_fetch_array($result)){
                $output .= '
   <tr>
    <td>'.$row["projectTitle"].'</td>
    <td>'.$row["description"].'</td>
    <td>'.$row["output"].'</td>
    <td>'.$row["grpNo"].'</td>
   </tr>
  ';
            }
			echo $output;
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "<p>No matches found for current project</p>";
        }
    }

if($result2 = mysqli_query($dbcon, $sql2)){
        if(mysqli_num_rows($result2) > 0){
			
			$output2 .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Past Project Title</th>
     <th>Description</th>
     <th>Output</th>
     <th>Year</th>
	 <th>Group</th>
    </tr>
 ';
			
            while($row = mysqli_fetch_array($result2)){
                $output2 .= '
   <tr>
    <td>'.$row["title"].'</td>
    <td>'.$row["description"].'</td>
    <td>'.$row["output"].'</td>
	<td>'.$row["students"].'</td>
	<td>'.$row["year"].'</td>
   </tr>
  ';
            }
			echo $output2;
            // Close result set
            mysqli_free_result($result2);
        } else{
            echo "<p>No matches found for Past Projects</p>";
        }
    }
	

	else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbcon);
    }
}
 
// close connection
mysqli_close($dbcon);
?>