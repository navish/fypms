<footer class="w3-container w3-theme-d5 w3-center">
      <div class="w3-container">
        <p>&copy<?php $yr=getdate(date("U")); echo "$yr[year]";   ?> CoICT-UDSM - All Rights Reserved. </p>
      </div>
</footer>
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

<!-- Index Page -->

<script type="text/javascript">
var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("main").innerHTML = this.responseText;
      }
    };


function loadUser() {
  xhttp.open("GET", "../functions/account-details.php", true);
    xhttp.send();
  }

 function supervisorConcepts() {
    xhttp.open("GET", "../functions/supervisor-concepts.php", true);
    xhttp.send();
  }
  function supervisorGroups() {
    xhttp.open("GET", "../functions/supervisor-groups.php", true);
    xhttp.send();
  }
  function viewReports() {
    xhttp.open("GET", "../functions/viewreports.php", true);
    xhttp.send();
  }
  
  function supervisorReports() {
    xhttp.open("GET", "../functions/supervisor-reports.php", true);
    xhttp.send();
  }
  function supervisorReview() {
    xhttp.open("GET", "../functions/sup-review-reports.php", true);
    xhttp.send();
  }
  function viewConcepts() {
    xhttp.open("GET", "viewconcepts.php", true);
    xhttp.send();
  }
  function viewGroups() {
    xhttp.open("GET", "../functions/groups.php", true);
    xhttp.send();
  }
  function viewReports() {
    xhttp.open("GET", "../functions/viewreports.php", true);
    xhttp.send();
  }
  
  

</script>

<script>
(function(){
  // add multiple select / deselect functionality
  $("#selectall").click(function () {
      $('.archive').attr('checked', this.checked);
  });

  // if all checkbox are selected, check the selectall checkbox
  // and viceversa
  $(".archive").click(function(){

    if($(".archive").length == $(".archive:checked").length) {
      $("#selectall").attr("checked", "checked");
    } else {
      $("#selectall").removeAttr("checked");
    }

  });
});

  </script>
</body>
</html>