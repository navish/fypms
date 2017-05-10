<?php

if (isset($_POST['submit'])) 
{
  $fMember = $_POST['fMember'];
  $sMember = $_POST['sMember'];

  $suggestion = mysqli_query($dbcon, "INSERT into suggestedgroup(fMember, sMember, tMember) VALUES ('$fMember','$sMember','$studentId') ") or die(mysqli_error($dbcon));
  if ($suggestion) {
    ?>
<script> alert("Your grou suggestion has been recorded"); </script>
  <?php  } else { ?>
<script> alert("Sorry, your suggestion failed"); </script>
<?php
  }
}
?>