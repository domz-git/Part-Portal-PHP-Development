<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

$name = "";
$lastname = "";
$username = "";
$email = "";
$password = "";
$role = "";
$errors = array(); 
$db = mysqli_connect('localhost', 'id13769560_userpart', 'r$jHF8N4[t]1?4Rs', 'id13769560_part');


if (isset($_POST['user_login'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
      array_push($errors, "Korisničko ime obavezno!");
  }
  if (empty($password)) {
      array_push($errors, "Lozinka obavezna!");
  }

  if (count($errors) == 0) {
     
      $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
      $results = mysqli_query($db, $query);
      $user = mysqli_fetch_assoc($results);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        $_SESSION['success'] = "You are now logged in";
        if($user['role'] == "user"){
          header('location: index.php');
          }if($user['role'] == "admin"){
          header('location: admin.php');
          }
      }else {
          array_push($errors, "Pogrešno korisničko ime ili lozinka!");
      }
      
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style_register_login.css">
</head>
<body>
<div id="page-container">
   <div id="content-wrap">
<!-- LOGIN FORM -------------------------------------------------------------------------------------------------------------->

<div id="login_div" class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
<h2>Prijava</h2>
<hr>
<form onsubmit="return validateFormLogin()" method="post" action="login.php">
	  <?php include('errors.php'); ?>
  	<div class="form-group">
  		<label>Korisničko ime</label>
  		<input placeholder="Unesi korisničko ime"type="text" class="form-control" name="username" >
  	</div>
  	<div class="form-group">
  		<label>Lozinka</label>
  		<input placeholder="Unesi lozinku" type="password" class="form-control" name="password">
  	</div>
  	<div class="form-group">
  		<button type="submit" class="btn" name="user_login">Prijavi se</button>
  	</div>
  	<p>
  		Još nisi član? <a class="btn" href="register.php">Registriraj se!</a>
  	</p>
</form>
</div>
<!-- LOGIN FORM -------------------------------------------------------------------------------------------------------------->

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
            <p class="credits">FERIT Osijek 2020.</p>
          
          </div>
      </div>
   </footer>
 </div>
<!-- FOOTER -------------------------------------------------------------------------------------------------------------->
<!-- </body> -->
</body>
</html>