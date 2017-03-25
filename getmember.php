<?php
include 'dbcon.php';
$memberNo = $_GET['q'];

$membersql = mysqli_query($dbcon,"SELECT * FROM student WHERE regNo= '$memberNo'");
$member = mysqli_fetch_array($membersql);

echo "Suggested member is:  ".$member['lName'].", ".$member['fName']." ".$member['mName'];




?>