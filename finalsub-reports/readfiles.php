<?php
header("Content-type:application/pdf");

// It will be called downloaded.pdf
//header("Content-Disposition:attachment;filename='the-richest-man-in-babylon.pdf'");

// The PDF source is in original.pdf
readfile("the-richest-man-in-babylon.pdf");
?>

<html>
<body>