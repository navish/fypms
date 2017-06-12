<div class="w3-center">
    <h3>IMPORT STUDENTS</h3>
</div>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" class="" name="upload_excel" >
                    
    <div class="">
            <input type="file" multiple name="filename" id="filename" class="w3-input">
    </div>
                
        <br/>   
                
                 
    <button type="submit" id="submit" name="submit" class="w3-btn " data-loading-text="Loadclass="<i class="fa fa-upload"></i> Upload</button>
    <a href="index.php"><button type="button" class="w3-btn"><i class="fa fa-reply"></i> Back</button></a>

     </form>
<?php
if (isset($_POST['submit'])) 
{
include('../dbcon.php');

    $handle = fopen($_FILES['filename']['tmp_name'], "r");
    $count =0;

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $count++;
        $regnum = $data[0];
        $checkexistingdata = "SELECT * from student WHERE regNo='$regnum'";
        $resultcheckexistingdata = mysqli_query($dbcon, $checkexistingdata);
        $countexistingdata = mysqli_num_rows($resultcheckexistingdata);
        if ($countexistingdata == 0) {
            if ($count > 1) {


                mysqli_query($dbcon, "INSERT into student(regNo, fName ,mName, lName, email, phoneNo, course)
            values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')");

                $newpass = md5($data[3]);

                mysqli_query($dbcon, "INSERT into login(user, passwrd , role)
            values('$data[0]','$newpass','2')");

            }
        }
    }
    fclose($handle);
        echo "<script type='text/javascript'>alert('Successfully imported a students CSV file!');</script>";
        echo "<script>document.location='index.php'</script>";
}

        

 

?>