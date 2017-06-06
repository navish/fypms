<?php  
  include('session.php'); 
  include('nav-header.php'); 
?>

    <div class="w3-center ">
      <h1 class="w3-padding">Final Year Project Management System</h1>
      <h3>College Of Information and Communication Technologies</h3>
    </div>

    <div class=" login-box">
      <div class="box-header w3-center">
        <h3>Log In</h3>
      </div>

      <div class="w3-container w3-center">
      <form method="POST" action="">
        <input class="w3-input" type="text" name="username" placeholder="Username">
        <input class="w3-input" type="password" name="password" placeholder="Password">
        <br/>
        <button class="w3-btn" type="submit" name="submit">Log In</button>
        <br/>
          <!--a href="#"><p class="small">Forgot your password?</p></a-->
      </form>
    <?php
        if (isset($_POST['submit'])){
                
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $password = md5($pass);
        
        
        $query = "SELECT * FROM login WHERE user='$username' AND passwrd='$password'";
        $result = mysqli_query($dbcon,$query)or die(mysqli_error());
        $num_row = mysqli_num_rows($result);
          $user_row=mysqli_fetch_array($result);

            $role = $user_row['role'];
            #var_dump($role);
          if( $num_row > 0 ) {
            $_SESSION['id'] = $username;
            $_SESSION['role'] = $role;

            if ($role == 2) 
            {
               header('location:student/');
            } 

            else if($role == 1) 
            {
               header('location:supervisor/');
            }

            else if($role == 0) 
            {
               header('location:coordinator/');
            }
            

        #$_SESSION['id'] = $username;
           
                    
          }
          else{ ?>
        <div class="alert alert-danger">Access Denied</div>   
        <?php
        }}
        ?>    
      </div>
    </div>



<?php include('footer.php'); ?>