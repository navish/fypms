
<?php
  include '../dbcon.php';

?>

      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-white">
            <div class="w3-container w3-padding">
              <h3 class="w3-center">SUBMIT CONCEPT NOTE</h3>
            </div>
          </div>
        </div>
      </div>
      <br />
  
   <div class="w3-row-padding">
    <div class="w3-col m12">
      <div class="w3-card-2 w3-white">  
        <div class="w3-container w3-padding"> 
            <form action="" method="POST" class="">
              <br />
              <input type="text" name="propTitle" class="w3-input" placeholder="Proposed Title" >
              <br />
              <textarea name="probStatement" class="w3-input" placeholder="Statement of the Problem"></textarea>
              <br />
              <textarea name="significance" class="w3-input" placeholder="Significance"></textarea>
              <br />
              <input type="" name="expectOutput" class="w3-input" placeholder="Expected Output" >
              <br />
              <input type="" name="propSupervisor" class="w3-input" placeholder="Proposed Supervisor" >
              <br /> <!-- This should be a list fetched from the database -->

              <br />
              <button type="submit" name="submit" class="w3-padding w3-btn-block w3-blue">Submit Concept</button>
            </form>
          </div>
        </div>
    </div>
  </div>

<?php
/*if (isset($_POST['submit'])) {

  $proposedTitle = $_POST['propTitle'];
  $probStatement = $_POST['probStatement'];
  $significance = $_POST['significance'];
  $expectedOutput = $_POST['expectOutput'];
  $propSupervisor = $_POST['propSupervisor'];
  $approval = "waiting";


$insert = mysqli_query($dbcon,"INSERT INTO conceptnote (studentid, proposedtitle,problemstatement, significance, expectedoutput, approval) VALUES ('$regNo', '$proposedtitle', '$probStatement','$significance','$expectedOutput','$propSupervisor','$approval'  )");

if ($insert) {
    echo "Concept Successfully Submitted";
  } else {
    echo "Something went wrong your concept was not submitted";

  }
}
*/

  ?>

