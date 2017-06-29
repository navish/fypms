       <?php

       $get_user = $_GET['user'];
              if(isset($_POST['update']))
            {
              $pass = $_POST['pass'];
              $confirmpass = $_POST['confirmpass'];

              if ($pass == $confirmpass) {
                $password = md5($confirmpass);
                
                  $loginsql = mysqli_query($dbcon, "UPDATE login SET passwrd='$password' WHERE user = '$get_user'") or die(mysqli_error($dbcon));
                  if ($loginsql) { 
                    echo "Password changed successfully";
                     
                  ?>
                      <!--script> alert("Password changed successfully"); </script -->
                      
                  <?php
                    
                    } else { 
                      echo "Something went wrong password was not changed";
                      ?>
                      <!-- script> alert("Something went wrong password was not changed"); </script-->
                  <?php 
                  
                }
                  
              } else {
              echo "Passwords don't match"; 
              ?>
                 <!-- script> alert("Passwords don't match"); </script-->
              <?php
              
                      }
           }
              ?>  