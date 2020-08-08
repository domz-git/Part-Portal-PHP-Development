<?php
 
 if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

    $db = mysqli_connect('localhost', 'id13769560_userpart', 'r$jHF8N4[t]1?4Rs', 'id13769560_part');


  $query = "SELECT * FROM aero";
  $results = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($results);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/speed.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style_aero.css">
    <title>Aeronautika</title>
</head>
<body>
<!-- NAVBAR -------------------------------------------------------------------------------------------------------------->
<div class="topnav" id="myTopnav">
<a id="navheader_aero" class="navbar-brand">Aeronautika</a>
<a id="navheader" class="navbar-brand" href="index.php">PART</a>

  <a class="navbar-brand" href="rocket_science.php">Raketna tehnologija</a>
  <a href="javascript:void(0);" class="icon" onclick="fu()">
    <i class="fa fa-bars"></i>
  </a>
</div>
     <!-- NAVBAR -------------------------------------------------------------------------------------------------------------->
    


     
<!-- TABLE -------------------------------------------------------------------------------------------------------------->
<div id="page-container">
   <div id="content-wrap">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Traži poglavlje...">
<?php
echo "
  <table id='myTable'>
  ";
  while($row = mysqli_fetch_assoc($results))
  {
  echo"
  <tr>
    <td>" . $row['title'] .  "</td>
    <td><a href=aeronautics/chapter_aero.php?id=".$row['aero_id']."><img src='https://part-portal.000webhostapp.com/images/aeronautics/table/" . $row['image'] .  ".png' width='420px' height='250px'></a></td>
  </tr>
  ";
}
echo"</table>";
?>
<!-- TABLE -------------------------------------------------------------------------------------------------------------->


<!-- FOOTER -------------------------------------------------------------------------------------------------------------->

</div>
   <footer id="footer">
      <div id="footer_content" class="row">
          <div class="column">
          <blockquote>
                <h4>Portal</h4>
                <hr>
              <ul>
              <li>
                <a href="">Prijedlozi i pitanja</a>
                </li>
                <li>
                <a href="">O portalu</a>
                </li>
                <li>
                <a href="">Dodatne informacije</a>
                </li>
              </ul>
              </blockquote>
          </div>
          <div class="column">
            <blockquote>
                <h4>Tvrtke za svemirske letove</h4>
                <hr>
                <ul>
                <li>
                <a href="">Nasa</a>
                </li>
                <li>
                <a href="">SpaceX</a>
                </li>
                <li>
                <a href="">Blue Origin</a>
                </li>
                <li>
                <a href="">Virgin Galactic</a>
                </li>
                <li>
                <a href="">Orbital ATK</a>
                </li>
                <li>
                <a href="">Bigelow Aerospace</a>
                </li>
                <li>
                <a href="">MirCorp</a>
                </li>
              </ul>

              <h4>Tehnologije</h4>
              <hr>
                <ul>
                <li>
                <a href="">Aeronautika</a>
                </li>
                <li>
                <a href="">Raketna tehnologija</a>
                </li>
              </ul>
              </blockquote>
          </div>
          <div class="column">
          <a id="part_ikona" href="index.php">PART</a>
            <p class="credits">Portal za aeronautiku i raketnu tehnologiju</p>
            <p class="credits">Autor stranice: Dominik Filipović</p>
            <p class="credits">Osijek 2020.</p>
          
          </div>
      </div>
   </footer>
 </div>
 </div>
 </div>
 <!-- FOOTER -------------------------------------------------------------------------------------------------------------->


<script>
function fu() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
function myFunction() {
  var input, filter, table, tr, td, td1, td2, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td1 = tr[i].getElementsByTagName("td")[0];
    td2 = tr[i].getElementsByTagName("td")[1];
    if (td1 && td2) {
      txtValue = td1.textContent + td1.innerText + td2.textContent + td2.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<!-- </body> -->
</body>
</html>