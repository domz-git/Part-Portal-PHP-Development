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



if (isset($_POST['user_register'])) {


  $name = mysqli_real_escape_string($db, $_POST['name']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $role = "user";
  
  //CORRECT INPUT
  if (empty($name)) { array_push($errors, "Ime obavezno!"); }
  if (empty($lastname)) { array_push($errors, "Prezime obavezno!"); }
  if (empty($username)) {array_push($errors, "Korisničko ime obavezno!"); }
  if (empty($email)) { array_push($errors, "Email obavezan!"); }
  if (empty($password)) { array_push($errors, "Lozinka obavezna!"); }




  //USERCHECK
  $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Korisničko ime već postoji!");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email već postoji!");
    }
  }


  if (count($errors) == 0) {

  	$query = "INSERT INTO user (name, lastname, username, email, password, role) 
  			  VALUES('$name', '$lastname', '$username', '$email', '$password', '$role')";
  	mysqli_query($db, $query);
    $_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style_register_login.css">
</head>
<body id="body_register">

<div id="page-container">
   <div id="content-wrap">


<!-- REGISTER FORM -------------------------------------------------------------------------------------------------------------->

<div id="register_div" class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
<h2>Registracija</h2>
<hr>
<form onsubmit="return validateFormRegister()" method="post" action="register.php">
      <?php include('errors.php'); ?>
  <div class="form-group">
    <label for="name" >Ime</label>
    <input placeholder="Unesite ime" type="text" class="form-control" name="name" value="<?php echo $name; ?>">
  </div>
  <div class="form-group">
    <label for="lastname" >Prezime</label>
    <input placeholder="Unesite prezime" type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>">
  </div>
  <div class="form-group">
    <label for="username">Korisničko ime</label>
    <input placeholder="Unesite korisničko ime" type="text" class="form-control" name="username" value="<?php echo $username; ?>">
  </div>
  <div class="form-group">
    <label for="email">E-mail</label>
    <input placeholder="Unesite e-mail" type="email" class="form-control" name="email" value="<?php echo $email; ?>">
  </div>
  <div class="form-group">
    <label for="password">Lozinka</label>
    <input placeholder="Unesite lozinku" type="password" class="form-control" name="password" value="<?php echo $password; ?>">
  </div>
  <button type="submit" class="btn btn-default" name="user_register">Registriraj</button>
  <p>
  		Već si član? <a class="btn" href="login.php">Prijavi se!</a>
    </p>
</form>
</div>


<!-- REGISTER FORM -------------------------------------------------------------------------------------------------------------->

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
 </div>

 <!-- FOOTER -------------------------------------------------------------------------------------------------------------->
<!-- </body> -->
</body>
</html>