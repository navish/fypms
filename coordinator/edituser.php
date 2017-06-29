<?php
 error_reporting(0);
  include '../header.php';
    $get_user = $_GET['user'];
?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
    <?php
      include 'coord-nav.php';
    ?>
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">
    
      
      
      <div id="main">


      <div class="w3-row-padding">
        <div class="w3-card-2 "> 
            <div class="w3-container w3-padding">
              <div class="w3-col m12">
              <h3 class="w3-center">UPDATE PASSWORD</h3>
              </div>
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
              <div class="w3-col m3 w3-padding"><input class="w3-input" type="text" name="student" value="<?php echo $get_user;  ?>" placeholder="Username" required> </div>
                <div class="w3-col m3 w3-padding"><input class="w3-input" type="password" name="pass" placeholder="Password" required> </div>
            <div class="w3-col m3 w3-padding"><input class="w3-input" type="password" name="confirmpass" placeholder="Confirm Password" required></div>
            <div class="w3-col m3 w3-padding"><button type="" name="update" class="w3-btn" > Update Password</button></div>
          </form>
          <div class="w3-center">
            <?php
                if(isset($_POST['update']))
                {
                  $student = $_POST['student'];
                  $pass = $_POST['pass'];
                  $confirm = $_POST['confirmpass'];


                  if ($pass == $confirm) {
                    $confirmpass = md5($confirm);

                      $loginsql = mysqli_query($dbcon, "UPDATE `login` SET `passwrd`='$confirmpass' WHERE `user` = '$student'") or die(mysqli_error($dbcon));
                      if ($loginsql) { 
                        echo '<div class="w3-center w3-border-green">Password changed successfully</div>';
                        //echo "$confirmpass";


                        } else { 
                          echo '<div class="w3-center w3-border-red">Something went wrong password was not changed</div>';
                        }
                      
                      } 
                      else {
                      echo '<div class="w3-center w3-border-orange">Passwords don\'t match</div>'; 
                      }
                }
              ?> 
            </div>      
          </div>
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

<script>
  var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("changes").innerHTML = this.responseText;
      }
    };
  function changepass() {
    xhttp.open("GET", "changepass.php", true);
    xhttp.send();
  } 
</script>

<script>
     var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("main").innerHTML = this.responseText;
      }
    };
function loadDoc() {
  xhttp.open("GET", "../supervisor.php", true);
    xhttp.send();
  }


</script>
<!-- Footer -->
<?php
  include '../footer.php';
?>

</body>
</html> 





      