<?php
 if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: index.php");
}

  $db = mysqli_connect('localhost', 'id13769560_userpart', 'r$jHF8N4[t]1?4Rs', 'id13769560_part');

  $query = "SELECT * FROM article ORDER BY article_id DESC";
  $results = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($results);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PART</title>
  <link rel="icon" href="images/speed.svg">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style_index.css">
</head>
<body>
<div class="header">
<h1 class="modern_font">PART</h1>
    <h4 class="modern_font">Portal za aeronautiku i raketnu tehnologiju</h4>
</div>

<nav id="navbar" class="navbar navbar-inverse navbar-static-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a id="navheader" class="navbar-brand" href="index.php">PART</a>
      <input type="text" id="input_one"  onkeyup="search_one()" class="form-control" placeholder="Pretraži ...">

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tvrtke za svemirske letove<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Nasa</a></li>
            <li><a href="#">SpaceX</a></li>
            <li><a href="#">Blue Origin</a></li>
            <li><a href="#">Virgin Galactic</a></li>
            <li><a href="#">Orbital ATK</a></li>
            <li><a href="#">Bigelow Aerospace</a></li>
            <li><a href="#">MirCorp</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tehnologije<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="aeronautics.php"><span class="glyphicon glyphicon-plane"></span> Aeronautika</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-globe"></span> Raketna tehnologija</a></li>
          </ul>
        </li>
        <li><a href="#">O portalu</a></li>
        <li>
            <input type="text" id="input_two" onkeyup="search_two()" class="form-control" placeholder="Pretraži ...">
      </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php  if (isset($_SESSION['username'])) : ?>
      <li><p>Prijavljen/a: </p></li
      ><li><a href="user.php"><strong><?php echo $_SESSION['username']; ?></strong> <span class="glyphicon glyphicon-user"></span></a></li>
      <li><a class="btn" href="index.php?logout='1'"><span class="glyphicon glyphicon-log-in"></span> Odjavi se</a> </li>
    <?php else: ?>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Prijavi se</a></li>
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Registracija</a></li>
      <?php endif ?>
      </ul>
    </div>
  </div>
</nav>
<div id="page-container">
   <div id="content-wrap">

<div class="container" id="content">
  <h4 id="news_title">Novosti</h4>
<?php


  echo "
  <table id='myTable'>
  ";
  while($row = mysqli_fetch_assoc($results))
  {
  echo"
  <tr>
    <td>
    <a href=article.php?id=".$row['article_id'].">
    <img src='https://part-portal.000webhostapp.com/images/article/banners/" . $row['image'] .  ".jpg'>
    </a>
    <h3 class='article_section'>" . $row['article_title'] .  "</h3>
    <blockquote class='article_section'>
    " . $row['article_content'] .  "
    </blockquote>
    <p class='article_section_author'>Autor: " . $row['author'] . "</p>
    <p class='article_section_date'>" . $row['date'] . "</p>
    </td>
  </tr>
  ";
}
echo"</table>";
?>


</div>

<br>
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

window.onscroll = function() {scroll_function()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function scroll_function() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

function search_one() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("input_one");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
function search_two() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("input_two");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
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
