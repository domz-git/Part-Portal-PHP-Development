<?php
error_reporting(0);
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if ($_SESSION['username'] != 'admin') {
  header('location: index.php');
  
}
if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}
$article_title = "";
$title_chapter="";
$subtitle_chapter="";
$aero_id_id="";
$pict_two1 ="";
$text2="";
$pict_two2="";
$text3="";
$pict_three1="";
$pict_one1="";
$pict_three2="";
$text4="";
$pic_desc2="";
$pict_one2="";
$pic_desc1 = "";
$text1="";
$aero_title="";
$author = "";
$article_content = "";
$pic_desc3="";
$image = "";
$date = "";
$title = "";
$id = "";
$aero_id = "";
$banner = "";
$yt_link = "";
$source1 = "";
$source2 = "";
$source3 = "";

$errors = array(); 

$db = mysqli_connect('localhost', 'id13769560_userpart', 'r$jHF8N4[t]1?4Rs', 'id13769560_part');




/////////////// ADD ARTICLE TABLE ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  if (isset($_POST['add_article'])) {
    // receive all input values from the form
    $article_title = mysqli_real_escape_string($db, $_POST['article_title']);
    $author = mysqli_real_escape_string($db, $_POST['author']);
    $article_content = mysqli_real_escape_string($db, $_POST['article_content']);
    $image = mysqli_real_escape_string($db, $_POST['image']);
    $date = date("d/m/Y");
  
  
  
    $query = "SELECT * FROM article WHERE article_title='$article_title' LIMIT 1";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    
    if ($row) { 
      if ($row['article_title'] === $article_title) {
        array_push($errors, "Naslov članka već postoji");
      }
    }
   
  
    if (empty($article_title)) { array_push($errors, "Naslov obavezan!"); }
    if (empty($author)) { array_push($errors, "Autor obavetan!"); }
    if (empty($article_content)) { array_push($errors, "Sadržaj obavezan!"); }
    if (empty($image)) { array_push($errors, "Slika obavezna!"); }
  
    
    if (count($errors) == 0) {
      $query = "INSERT INTO article (article_title, author, article_content, image, date) VALUES ('$article_title', '$author', '$article_content', '$image', '$date')";
      mysqli_query($db, $query);
      header('location: admin.php');
    }
  
   
  }

/////////////// UPDATE ARTICLE TABLE ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  if (isset($_POST['search_article'])) {

    $item = mysqli_real_escape_string($db, $_POST['item']);
    $query = "SELECT * FROM article WHERE article_id = '$item'";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($results);
    
  }
  

  if (isset($_POST['update_article'])) {
    $id = mysqli_real_escape_string($db, $_POST['article_id']);
    $article_title = mysqli_real_escape_string($db, $_POST['article_title']);
    $author = mysqli_real_escape_string($db, $_POST['author']);
    $article_content = mysqli_real_escape_string($db, $_POST['article_content']);
    $image = mysqli_real_escape_string($db, $_POST['image']);

    $query = "UPDATE article 
              SET article_title='$article_title', author='$author', article_content='$article_content', image='$image'
              WHERE article_id = '$id' ";
              
    mysqli_query($db, $query);
    header('location: admin.php');
  }

/////////// DELETE ARTICLE ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  if (isset($_POST['delete_article'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);
       $query = "DELETE FROM article, article_content USING article JOIN article_content WHERE article.article_id = '$id' AND article_content.article_content_id = '$id'";
              
    mysqli_query($db, $query);
    header('location: admin.php');
  }

/////////// ADD ARTICLE CONTENT ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['add_article_content'])) {
  // receive all input values from the form
  $banner = mysqli_real_escape_string($db, $_POST['banner']);
  $title_chapter = mysqli_real_escape_string($db, $_POST['title_article']);
  $subtitle_chapter = mysqli_real_escape_string($db, $_POST['subtitle_article']);
  $text1 = mysqli_real_escape_string($db, $_POST['text1_article']);
  $pict_one1 = mysqli_real_escape_string($db, $_POST['pict_one1_article']);
  $pict_one2 = mysqli_real_escape_string($db, $_POST['pict_one2_article']);
  $pic_desc1 = mysqli_real_escape_string($db, $_POST['pic_desc1_article']);
  $text2 = mysqli_real_escape_string($db, $_POST['text2_article']);
  $pict_two1 = mysqli_real_escape_string($db, $_POST['pict_two1_article']);
  $pict_two2 = mysqli_real_escape_string($db, $_POST['pict_two2_article']);
  $pic_desc2 = mysqli_real_escape_string($db, $_POST['pic_desc2_article']);
  $text3 = mysqli_real_escape_string($db, $_POST['text3_article']);
  $pict_three1 = mysqli_real_escape_string($db, $_POST['pict_three1_article']);
  $pict_three2 = mysqli_real_escape_string($db, $_POST['pict_three2_article']);
  $pic_desc3 = mysqli_real_escape_string($db, $_POST['pic_desc3_article']);
  $text4 = mysqli_real_escape_string($db, $_POST['text4_article']);
  $yt_link = mysqli_real_escape_string($db, $_POST['yt_link']);
  $source1 = mysqli_real_escape_string($db, $_POST['source1']);
  $source2 = mysqli_real_escape_string($db, $_POST['source2']);
  $source3 = mysqli_real_escape_string($db, $_POST['source3']);
  $date = date("d/m/Y");



  $query = "SELECT * FROM article_content WHERE title='$title_chapter' LIMIT 1";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  
  if ($row) { 
    if ($row['title'] === $title_chapter) {
      array_push($errors, "Naslov poglavlja već postoji!");
    }
  }
 

  if (empty($title_chapter)) { array_push($errors, "Naslov poglavlja obavezan!"); }
  if (empty($subtitle_chapter)) { array_push($errors, "Podnaslov obavezan!"); }
  if (empty($text1)) { array_push($errors, "Tekst 1 obavezan!"); }
  if (empty($pict_one1)) { array_push($errors, "Slika 1 obavezna!"); }
  if (empty($pict_one2)) { array_push($errors, "Slika 2 obavezna!"); }
  if (empty($pic_desc1)) { array_push($errors, "Opis slike 1 i 2 obavezan!"); }
  if (empty($text2)) { array_push($errors, "Tekst 2 obavezan!"); }
  if (empty($pict_two1)) { array_push($errors, "Slika 3 obavezna!"); }
  if (empty($pict_two2)) { array_push($errors, "Slika 4 obavezna!"); }
  if (empty($pic_desc2)) { array_push($errors, "Opis slike 3 i 4 obavezan!"); }
  if (empty($text3)) { array_push($errors, "Tekst 3 obavezan!"); }
  if (empty($pict_three1)) { array_push($errors, "Slika 5 obavezna!"); }
  if (empty($pict_three2)) { array_push($errors, "Slika 6 obavezna!"); }
  if (empty($pic_desc3)) { array_push($errors, "Opis slike 5 i 6 obavezan!"); }
  if (empty($text4)) { array_push($errors, "Tekst 4 obavezan!"); }
  if (empty($yt_link)) { array_push($errors, "YouTube link obavezan!"); }
  if (empty($source1)) { array_push($errors, "Jedan izvor obavezan!"); }
  

  
  if (count($errors) == 0) {
    $query = "INSERT INTO article_content (banner, title, date, subtitle, text_1, pict_one_1, pict_one_2, pic_desc_1, text_2, pict_two_1, pict_two_2, pic_desc_2, text_3, pict_three_1, pict_three_2, pic_desc_3, text_4, yt_link, source1, source2, source3) 
    VALUES ('$banner', '$title_chapter', '$date', '$subtitle_chapter', '$text1', '$pict_one1', '$pict_one2', '$pic_desc1', '$text2', '$pict_two1', '$pict_two2', '$pic_desc2', '$text3', '$pict_three1', '$pict_three2', '$pic_desc3', '$text4', '$yt_link', '$source1', '$source2', '$source3')";
    mysqli_query($db, $query);
    header('location: admin.php');
  }

 
}


/////////////// UPDATE ARTICLE CONTENT ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['search_article_edit'])) {

  $item = mysqli_real_escape_string($db, $_POST['item']);
  $query = "SELECT * FROM article_content WHERE article_content_id = '$item'";
  $results = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($results);
  
}
if (isset($_POST['update_article_content'])) {
  $id = mysqli_real_escape_string($db, $_POST['article_content_id']);
  $banner = mysqli_real_escape_string($db, $_POST['banner']);
  $title_chapter = mysqli_real_escape_string($db, $_POST['title_article']);
  $subtitle_chapter = mysqli_real_escape_string($db, $_POST['subtitle_article']);
  $text1 = mysqli_real_escape_string($db, $_POST['text1_article']);
  $pict_one1 = mysqli_real_escape_string($db, $_POST['pict_one1_article']);
  $pict_one2 = mysqli_real_escape_string($db, $_POST['pict_one2_article']);
  $pic_desc1 = mysqli_real_escape_string($db, $_POST['pic_desc1_article']);
  $text2 = mysqli_real_escape_string($db, $_POST['text2_article']);
  $pict_two1 = mysqli_real_escape_string($db, $_POST['pict_two1_article']);
  $pict_two2 = mysqli_real_escape_string($db, $_POST['pict_two2_article']);
  $pic_desc2 = mysqli_real_escape_string($db, $_POST['pic_desc2_article']);
  $text3 = mysqli_real_escape_string($db, $_POST['text3_article']);
  $pict_three1 = mysqli_real_escape_string($db, $_POST['pict_three1_article']);
  $pict_three2 = mysqli_real_escape_string($db, $_POST['pict_three2_article']);
  $pic_desc3 = mysqli_real_escape_string($db, $_POST['pic_desc3_article']);
  $text4 = mysqli_real_escape_string($db, $_POST['text4_article']);
  $yt_link = mysqli_real_escape_string($db, $_POST['yt_link']);
  $source1 = mysqli_real_escape_string($db, $_POST['source1']);
  $source2 = mysqli_real_escape_string($db, $_POST['source2']);
  $source3 = mysqli_real_escape_string($db, $_POST['source3']);

  $query = "UPDATE article_content 
            SET banner='$banner', title='$title_chapter', subtitle='$subtitle_chapter', text_1='$text1', pict_one_1='$pict_one1', pict_one_2='$pict_one2', pic_desc_1='$pic_desc1', text_2='$text2', pict_two_1='$pict_two1', pict_two_2='$pict_two2', pic_desc_2='$pic_desc2', text_3='$text3', pict_three_1='$pict_three1', pict_three_2='$pict_three2', pic_desc_3='$pic_desc3', text_4='$text4', yt_link='$yt_link', source1='$source1', source2='$source2', source3='$source3'
            WHERE article_content_id = '$id' ";
            
  mysqli_query($db, $query);
  header('location: admin.php');
}

/////////////// ADD AERONAUTIC TABLE ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  if (isset($_POST['add_aero'])) {
    // receive all input values from the form
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $image = mysqli_real_escape_string($db, $_POST['image']);
  
  
  
    $query = "SELECT * FROM aero WHERE title='$title' LIMIT 1";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    
    if ($row) { 
      if ($row['title'] === $title) {
        array_push($errors, "Naslov poglavlja već postoji!");
      }
    }
   
  
    if (empty($title)) { array_push($errors, "Naslov obavezan!"); }
    if (empty($image)) { array_push($errors, "Slika obavezna!"); }
  
    
    if (count($errors) == 0) {
      $query = "INSERT INTO aero (title, image) VALUES ('$title', '$image')";
      mysqli_query($db, $query);
      header('location: admin.php');
    }
   
  }
  
/////////////// UPDATE AERONAUTIC TABLE ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  if (isset($_POST['search_aero'])) {

    $item = mysqli_real_escape_string($db, $_POST['item']);
    $query = "SELECT * FROM aero WHERE aero_id = '$item'";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($results);
    
  }
  if (isset($_POST['update_aero'])) {
    $id = mysqli_real_escape_string($db, $_POST['aero_id']);
    $aero_title = mysqli_real_escape_string($db, $_POST['title']);
    $image = mysqli_real_escape_string($db, $_POST['image']);
  
    $query = "UPDATE aero 
              SET title='$aero_title', image='$image'
              WHERE aero_id = '$id' ";
              
    mysqli_query($db, $query);
    header('location: admin.php');
  }

/////////////// DELETE AERONAUTIC TABLE ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
 if (isset($_POST['delete_aero'])) {
    $id = mysqli_real_escape_string($db, $_POST['aero_id_id']);
    $query = "DELETE FROM aero, aero_chapter USING aero JOIN aero_chapter WHERE aero.aero_id = '$id' AND aero_chapter.aero_chapter_id = '$id'";
              
    mysqli_query($db, $query);
    header('location: admin.php');
  }





/////////// ADD AERONAUTIC CHAPTER ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  if (isset($_POST['add_chapter_aero'])) {
    // receive all input values from the form
    $title_chapter = mysqli_real_escape_string($db, $_POST['title_chapter_aero']);
    $subtitle_chapter = mysqli_real_escape_string($db, $_POST['subtitle_chapter_aero']);
    $text1 = mysqli_real_escape_string($db, $_POST['text1_aero']);
    $pict_one1 = mysqli_real_escape_string($db, $_POST['pict_one1_aero']);
    $pict_one2 = mysqli_real_escape_string($db, $_POST['pict_one2_aero']);
    $pic_desc1 = mysqli_real_escape_string($db, $_POST['pic_desc1_aero']);
    $text2 = mysqli_real_escape_string($db, $_POST['text2_aero']);
    $pict_two1 = mysqli_real_escape_string($db, $_POST['pict_two1_aero']);
    $pict_two2 = mysqli_real_escape_string($db, $_POST['pict_two2_aero']);
    $pic_desc2 = mysqli_real_escape_string($db, $_POST['pic_desc2_aero']);
    $text3 = mysqli_real_escape_string($db, $_POST['text3_aero']);
    $pict_three1 = mysqli_real_escape_string($db, $_POST['pict_three1_aero']);
    $pict_three2 = mysqli_real_escape_string($db, $_POST['pict_three2_aero']);
    $pic_desc3 = mysqli_real_escape_string($db, $_POST['pic_desc3_aero']);
    $text4 = mysqli_real_escape_string($db, $_POST['text4_aero']);
  
  
  
    $query = "SELECT * FROM aero_chapter WHERE title='$title_chapter' LIMIT 1";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    
    if ($row) { 
      if ($row['title'] === $title_chapter) {
        array_push($errors, "Naslov poglavlja već postoji!");
      }
    }
   
  
    if (empty($title_chapter)) { array_push($errors, "Naslov poglavlja obavezan!"); }
    if (empty($subtitle_chapter)) { array_push($errors, "Podnaslov obavezan!"); }
    if (empty($text1)) { array_push($errors, "Tekst 1 obavezan!"); }
    if (empty($pict_one1)) { array_push($errors, "Slika 1 obavezna!"); }
    if (empty($pict_one2)) { array_push($errors, "Slika 2 obavezna!"); }
    if (empty($pic_desc1)) { array_push($errors, "Opis slike 1 i 2 obavezan!"); }
    if (empty($text2)) { array_push($errors, "Tekst 2 obavezan!"); }
    if (empty($pict_two1)) { array_push($errors, "Slika 3 obavezna!"); }
    if (empty($pict_two2)) { array_push($errors, "Slika 4 obavezna!"); }
    if (empty($pic_desc2)) { array_push($errors, "Opis slike 3 i 4 obavezan!"); }
    if (empty($text3)) { array_push($errors, "Tekst 3 obavezan!"); }
    if (empty($pict_three1)) { array_push($errors, "Slika 5 obavezna!"); }
    if (empty($pict_three2)) { array_push($errors, "Slika 6 obavezna!"); }
    if (empty($pic_desc3)) { array_push($errors, "Opis slike 5 i 6 obavezan!"); }
    if (empty($text4)) { array_push($errors, "Tekst 4 obavezan!"); }
  
    
    if (count($errors) == 0) {
      $query = "INSERT INTO aero_chapter (title, subtitle, text_1, pict_one_1, pict_one_2, pic_desc_1, text_2, pict_two_1, pict_two_2, pic_desc_2, text_3, pict_three_1, pict_three_2, pic_desc_3, text_4) 
      VALUES ('$title_chapter', '$subtitle_chapter', '$text1', '$pict_one1', '$pict_one2', '$pic_desc1', '$text2', '$pict_two1', '$pict_two2', '$pic_desc2', '$text3', '$pict_three1', '$pict_three2', '$pic_desc3', '$text4')";
      mysqli_query($db, $query);
      header('location: admin.php');
    }
  
   
  }
  /////////////// UPDATE AERONAUTIC TABLE ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  if (isset($_POST['show_stat'])) {

    $item = mysqli_real_escape_string($db, $_POST['item']);

    $query = "SELECT * FROM comment WHERE article_comment_id = '$item'";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($results);
    $row_num = mysqli_num_rows($results);

    $query2 = "SELECT * FROM visit_counter WHERE count_article_id = '$item'";
    $results2 = mysqli_query($db, $query2);
    $row2 = mysqli_fetch_assoc($results2);
    $row_num2 = mysqli_num_rows($results2); 
    
  }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style_admin.css">
  <title>Admin panel</title>
</head>
<body>

<div class="row">
<a class="btn" href="admin.php?logout='1'"><span class="glyphicon glyphicon-log-in"></span> Odjavi se</a>
<div class="dropdown">
  <button class="dropbtn">Članak</button>
  <div class="dropdown-content">
  <button class ="btn" onclick="show_add_article()">Dodaj novi članak naslovnice</button>
  <button class ="btn" onclick="show_edit_article()">Uredi članak naslovnice</button>
  <button class ="btn" onclick="show_add_article_content()">Dodaj novi članak</button>
  <button class ="btn" onclick="show_edit_article_content()">Uredi članak</button>
  <button class ="btn" onclick="show_remove_article()">Ukloni članak</button>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">Aeronautika</button>
  <div class="dropdown-content">
  <button class ="btn" onclick="show_add_aero()">Dodaj novo poglavlje tablice</button>
  <button class ="btn" onclick="show_edit_aero()">Uredi poglavlje tablice</button>
  <button class ="btn" onclick="show_remove_aero()">Ukloni poglavlje tablice</button>
  <button class ="btn" onclick="show_add_aero_chapter()">Dodaj novo poglavlje</button>
  </div>
</div>
  <button class ="dropbtn" onclick="show_stat()">Statistika</button>
</div>

<hr>
<div class="container">
<?php include('errors.php'); ?>
</div>



<div id="show_add_article" class="container">
  <h2>Dodaj novi članak naslovnice</h2>
  <hr>
  <form method="post">
 <?php include('errors.php'); ?>
      <div class="form-group">
  	  <label>Naslov članka</label>
  	  <input placeholder="Unesi naslov članka" type="text" name="article_title" class="form-control" value="<?php echo $article_title; ?>">
  	</div>
      <div class="form-group">
  	  <label>Autor</label>
  	  <input placeholder="Unesi ime autora" type="text" name="author" class="form-control" value="<?php echo $author; ?>">
  	</div>
  	<div class="form-group">
  	  <label>Kratak opis</label>
  	  <textarea class="form-control" type="text" placeholder="Unesi kratak opis članka" name="article_content" cols="30" rows="10" value="<?php echo $article_content; ?>"></textarea>
	  </div>
	  <div class="form-group">
  	  <label>Slika</label>
  	  <input placeholder="Unesi ime slike" type="text" name="image" class="form-control" value="<?php echo $image; ?>">
    </div>
    <div class="form-group">
  	  <button type="submit" class="btn" name="add_article">Unesi članak naslovnice</button>
  	</div>
  </form>
</div>






<div id="show_edit_article" class="container">
  <h2>Uredi članak naslovnice</h2>
  <hr>
  <form method="post">
<input placeholder="Unesi id članka" type="text" name="item" class="form-control" value="<?php echo $item; ?>">
<br>
<button type="submit" class="btn" name="search_article">Pretraži</button>
</form>
<hr>
  <form method="post">
  <div class="form-group">
  	  <label>Id članka</label>
  	  <input placeholder="id" type="text" name="article_id" class="form-control" readonly value="<?php echo "" . $row['article_id'] . ""?>">
  	</div>
      <div class="form-group">
  	  <label>Naslov članka</label>
  	  <input placeholder="Unesi naslov članka" type="text" name="article_title" class="form-control" value="<?php echo "" . $row['article_title'] . ""?>">
  	</div>
      <div class="form-group">
  	  <label>Autor članka</label>
  	  <input placeholder="Unesi ime autora" type="text" name="author" class="form-control" value="<?php echo "" . $row['author'] . ""?>">
  	</div>
  	<div class="form-group">
  	  <label>Sadržaj članka</label>
  	  <textarea class="form-control" type="text" placeholder="Opis članla" name="article_content" cols="30" rows="10" ><?php echo "" . $row['article_content'] . ""?></textarea>
	  </div>
	  <div class="form-group">
  	  <label>Slika</label>
  	  <input placeholder="Unesi ime slike" type="text" name="image" class="form-control" value="<?php echo "" . $row['image'] . ""?>">
    </div>
    <div class="form-group">
  	  <button type="submit" class="btn" name="update_article">Ažuriraj</button>
  	</div>
  </form>
</div>








<div id="show_remove_article" class="container">
  <h2>Ukloni članak</h2>
  <hr>
  <form method="post" >
  <div class="form-group">
  	  <label>Unesi id članka</label>
  	  <input placeholder="Id članka" type="text" name="id" class="form-control"value="<?php echo $id; ?>">
  	</div>
    <div class="form-group">
  	  <button type="submit" class="btn" name="delete_article">Ukloni</button>
  	</div>
  </form>
  
</div>






<div id="show_add_article_content" class="container">
  <h2>Dodaj novi članak</h2>
  <hr>
  <form method="post">
 <?php include('errors.php'); ?>
 <div class="form-group">
  	  <label>Banner</label>
  	  <input placeholder="Unesi banner" type="text" name="banner" class="form-control" value="<?php echo $banner; ?>">
  	</div>
      <div class="form-group">
  	  <label>Naslov članka</label>
  	  <input placeholder="Unesi naslov članka" type="text" name="title_article" class="form-control" value="<?php echo $title_chapter; ?>">
  	</div>
      <div class="form-group">
  	  <label>Podnaslov</label>
  	  <input placeholder="Unesi podnaslov" type="text" name="subtitle_article" class="form-control" value="<?php echo $subtitle_chapter; ?>">
  	</div>
  	<div class="form-group">
  	  <label>Tekst 1</label>
  	  <textarea class="form-control" type="text" placeholder="Unesi tekst 1" name="text1_article" cols="30" rows="10" value="<?php echo $text1; ?>"></textarea>
	  </div>
	  <div class="form-group">
  	  <label>Slika 1</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_one1_article" class="form-control" value="<?php echo $pict_one1; ?>">
    </div>
    <div class="form-group">
  	  <label>Slika 2</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_one2_article" class="form-control" value="<?php echo $pict_one2; ?>">
    </div>
    <div class="form-group">
  	  <label>Opis slika 1 i 2</label>
  	  <input placeholder="Unesi opis slika 1 i 2" type="text" name="pic_desc1_article" class="form-control" value="<?php echo $pic_desc1; ?>">
    </div>
    <div class="form-group">
  	  <label>Tekst 2</label>
  	  <textarea class="form-control" type="text" placeholder="Unesi tekst 2" name="text2_article" cols="30" rows="10" value="<?php echo $text2; ?>"></textarea>
	  </div>
    <div class="form-group">
  	  <label>Slika 3</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_two1_article" class="form-control" value="<?php echo $pict_two1; ?>">
    </div>
    <div class="form-group">
  	  <label>Slika 4</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_two2_article" class="form-control" value="<?php echo $pict_two2; ?>">
    </div>
    <div class="form-group">
  	  <label>Opis slika 3 i 4</label>
  	  <input placeholder="Unesi opis slika 3 i 4" type="text" name="pic_desc2_article" class="form-control" value="<?php echo $pic_desc2; ?>">
    </div>
    <div class="form-group">
  	  <label>Tekst 3</label>
  	  <textarea class="form-control" type="text" placeholder="Unesi tekst 3" name="text3_article" cols="30" rows="10" value="<?php echo $text3; ?>"></textarea>
	  </div>
    <div class="form-group">
  	  <label>Slika 5</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_three1_article" class="form-control" value="<?php echo $pict_three1; ?>">
    </div>
    <div class="form-group">
  	  <label>Slika 6</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_three2_article" class="form-control" value="<?php echo $pict_three2; ?>">
    </div>
    <div class="form-group">
  	  <label>Opis slika 5 i 6</label>
  	  <input placeholder="Unesi opis slika 5 i 6" type="text" name="pic_desc3_article" class="form-control" value="<?php echo $pic_desc3; ?>">
    </div>
    <div class="form-group">
  	  <label>Tekst 4</label>
  	  <textarea class="form-control" type="text" placeholder="Unesi tekst 4" name="text4_article" cols="30" rows="10" value="<?php echo $text4; ?>"></textarea>
	  </div>
    <div class="form-group">
  	  <label>YouTube link</label>
  	  <input placeholder="Unesi YouTube link" type="text" name="yt_link" class="form-control" value="<?php echo $yt_link; ?>">
    </div>
    <div class="form-group">
  	  <label>Izvor 1</label>
  	  <input placeholder="Unesi Izvor" type="text" name="source1" class="form-control" value="<?php echo $source1; ?>">
    </div>
    <div class="form-group">
  	  <label>Izvor 2</label>
  	  <input placeholder="Unesi Izvor" type="text" name="source2" class="form-control" value="<?php echo $source2; ?>">
    </div>
    <div class="form-group">
  	  <label>Izvor 3</label>
  	  <input placeholder="Unesi Izvor" type="text" name="source3" class="form-control" value="<?php echo $source3; ?>">
    </div>
    <div class="form-group">
  	  <button type="submit" class="btn" name="add_article_content">Unesi članak</button>
  	</div>
  </form>
</div>





<div id="show_edit_article_content" class="container">
  <h2>Uredi članak</h2>
  <hr>
  <form method="post">
<input placeholder="Unesi id članka" type="text" name="item" class="form-control" value="<?php echo $item; ?>">
<br>
<button type="submit" class="btn" name="search_article_edit">Pretraži</button>
</form>
<hr>
  <form method="post">
  <div class="form-group">
  	  <label>Id članka</label>
  	  <input placeholder="id" type="text" name="article_content_id" class="form-control" readonly value="<?php echo "" . $row['article_content_id'] . ""?>">
  	</div>
    <div class="form-group">
  	  <label>Banner</label>
  	  <input placeholder="Unesi banner" type="text" name="banner" class="form-control" value="<?php echo "" . $row['banner'] . ""?>">
  	</div>
    <div class="form-group">
  	  <label>Naslov članka</label>
  	  <input placeholder="Unesi naslov članka" type="text" name="title_article" class="form-control" value="<?php echo "" . $row['title'] . ""?>">
  	</div>
      <div class="form-group">
  	  <label>Podnaslov</label>
  	  <input placeholder="Unesi podnaslov" type="text" name="subtitle_article" class="form-control" value="<?php echo "" . $row['subtitle'] . ""?>">
  	</div>
  	<div class="form-group">
  	  <label>Tekst 1</label>
  	  <textarea class="form-control" type="text" placeholder="Unesi tekst 1" name="text1_article" cols="30" rows="10"><?php echo "" . $row['text_1'] . ""?></textarea>
	  </div>
	  <div class="form-group">
  	  <label>Slika 1</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_one1_article" class="form-control" value="<?php echo "" . $row['pict_one_1'] . ""?>">
    </div>
    <div class="form-group">
  	  <label>Slika 2</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_one2_article" class="form-control" value="<?php echo "" . $row['pict_one_2'] . ""?>">
    </div>
    <div class="form-group">
  	  <label>Opis slika 1 i 2</label>
  	  <input placeholder="Unesi opis slika 1 i 2" type="text" name="pic_desc1_article" class="form-control" value="<?php echo "" . $row['pic_desc_1'] . ""?>">
    </div>
    <div class="form-group">
  	  <label>Tekst 2</label>
  	  <textarea class="form-control" type="text" placeholder="Unesi tekst 2" name="text2_article" cols="30" rows="10"><?php echo "" . $row['text_2'] . ""?></textarea>
	  </div>
    <div class="form-group">
  	  <label>Slika 3</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_two1_article" class="form-control" value="<?php echo "" . $row['pict_two_1'] . ""?>">
    </div>
    <div class="form-group">
  	  <label>Slika 4</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_two2_article" class="form-control" value="<?php echo "" . $row['pict_two_2'] . ""?>">
    </div>
    <div class="form-group">
  	  <label>Opis slika 3 i 4</label>
  	  <input placeholder="Unesi opis slika 3 i 4" type="text" name="pic_desc2_article" class="form-control" value="<?php echo "" . $row['pic_desc_2'] . ""?>">
    </div>
    <div class="form-group">
  	  <label>Tekst 3</label>
  	  <textarea class="form-control" type="text" placeholder="Unesi tekst 3" name="text3_article" cols="30" rows="10"><?php echo "" . $row['text_3'] . ""?></textarea>
	  </div>
    <div class="form-group">
  	  <label>Slika 5</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_three1_article" class="form-control" value="<?php echo "" . $row['pict_three_1'] . ""?>">
    </div>
    <div class="form-group">
  	  <label>Slika 6</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_three2_article" class="form-control" value="<?php echo "" . $row['pict_three_2'] . ""?>">
    </div>
    <div class="form-group">
  	  <label>Opis slika 5 i 6</label>
  	  <input placeholder="Unesi opis slika 5 i 6" type="text" name="pic_desc3_article" class="form-control" value="<?php echo "" . $row['pic_desc_3'] . ""?>">
    </div>
    <div class="form-group">
  	  <label>Tekst 4</label>
  	  <textarea class="form-control" type="text" placeholder="Unesi tekst 4" name="text4_article" cols="30" rows="10"><?php echo "" . $row['text_4'] . ""?></textarea>
	  </div>
    <div class="form-group">
  	  <label>YouTube link</label>
  	  <input placeholder="Unesi YouTube link" type="text" name="yt_link" class="form-control" value="<?php echo "" . $row['yt_link'] . ""?>">
    </div>
    <div class="form-group">
  	  <label>Izvor 1</label>
  	  <input placeholder="Unesi Izvor" type="text" name="source1" class="form-control" value="<?php echo "" . $row['source1'] . ""?>">
    </div>
    <div class="form-group">
  	  <label>Izvor 2</label>
  	  <input placeholder="Unesi Izvor" type="text" name="source2" class="form-control" value="<?php echo "" . $row['source2'] . ""?>">
    </div>
    <div class="form-group">
  	  <label>Izvor 3</label>
  	  <input placeholder="Unesi Izvor" type="text" name="source3" class="form-control" value="<?php echo "" . $row['source3'] . ""?>">
    </div>
    <div class="form-group">
  	  <button type="submit" class="btn" name="update_article_content">Ažuriraj</button>
  	</div>
  </form>
</div>








<div id="show_add_aero" class="container">
  <h2>Dodaj novo poglavlje aeronautike u tablicu</h2>
  <hr>
  <form method="post" >
      <?php include('errors.php'); ?>
      <div class="form-group">
  	  <label>Naslov poglavlja</label>
  	  <input placeholder="Unesi naslov poglavlja" type="text" name="title" class="form-control" value="<?php echo $title; ?>">
  	</div>
  	<div class="form-group">
  	  <label>Slika</label>
        <input placeholder="Unesi ime slike" type="text" name="image" class="form-control" value="<?php echo $image; ?>">	  </div>
    <div class="form-group">
  	  <button type="submit" class="btn" name="add_aero">Unesi poglavlje tablice</button>
  	</div>
  </form>
</div>









<div id="show_edit_aero" class="container">
  <h2>Uredi poglavlje tablice</h2>
  <hr>
  <form method="post">
<input placeholder="Unesi id poglavlja" type="text" name="item" class="form-control" value="<?php echo $item; ?>">
<br>
<button type="submit" class="btn" name="search_aero">Pretraži</button>
</form>
<hr>
  <form method="post">
  <div class="form-group">
  	  <label>Id poglavlja</label>
  	  <input placeholder="id" type="text" name="aero_id" class="form-control" readonly value="<?php echo "" . $row['aero_id'] . ""?>">
  	</div>
      <div class="form-group">
  	  <label>Naslov poglavlja</label>
  	  <input placeholder="Unesi naslov članka" type="text" name="title" class="form-control" value="<?php echo "" . $row['title'] . ""?>">
	  <div class="form-group">
  	  <label>Slika</label>
  	  <input placeholder="Unesi ime slike" type="text" name="image" class="form-control" value="<?php echo "" . $row['image'] . ""?>">
    </div>
    <div class="form-group">
  	  <button type="submit" class="btn" name="update_aero">Ažuriraj</button>
  	</div>
  </form>
    </div>
</div>



<div id="show_remove_aero" class="container">
  <h2>Ukloni poglavlje tablice</h2>
  <hr>
  <form method="post" >
  <div class="form-group">
  	  <label>Unesi id poglavlja</label>
  	  <input placeholder="Id poglavlja" type="text" name="aero_id_id" class="form-control">
  	</div>
    <div class="form-group">
  	  <button type="submit" class="btn" name="delete_aero">Ukloni</button>
  	</div>
  </form>
  
</div>








<div id="show_add_aero_chapter" class="container">
  <h2>Dodaj novo poglavlje aeronautike</h2>
  <hr>
  <form method="post">
 <?php include('errors.php'); ?>
      <div class="form-group">
  	  <label>Naslov poglavlja</label>
  	  <input placeholder="Unesi naslov poglavlja" type="text" name="title_chapter_aero" class="form-control" value="<?php echo $title_chapter; ?>">
  	</div>
      <div class="form-group">
  	  <label>Podnaslov</label>
  	  <input placeholder="Unesi podnaslov" type="text" name="subtitle_chapter_aero" class="form-control" value="<?php echo $subtitle_chapter; ?>">
  	</div>
  	<div class="form-group">
  	  <label>Tekst 1</label>
  	  <textarea class="form-control" type="text" placeholder="Unesi tekst 1" name="text1_aero" cols="30" rows="10" value="<?php echo $text1; ?>"></textarea>
	  </div>
	  <div class="form-group">
  	  <label>Slika 1</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_one1_aero" class="form-control" value="<?php echo $pict_one1; ?>">
    </div>
    <div class="form-group">
  	  <label>Slika 2</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_one2_aero" class="form-control" value="<?php echo $pict_one2; ?>">
    </div>
    <div class="form-group">
  	  <label>Opis slika 1 i 2</label>
  	  <input placeholder="Unesi opis slika 1 i 2" type="text" name="pic_desc1_aero" class="form-control" value="<?php echo $pic_desc1; ?>">
    </div>
    <div class="form-group">
  	  <label>Tekst 2</label>
  	  <textarea class="form-control" type="text" placeholder="Unesi tekst 2" name="text2_aero" cols="30" rows="10" value="<?php echo $text2; ?>"></textarea>
	  </div>
    <div class="form-group">
  	  <label>Slika 3</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_two1_aero" class="form-control" value="<?php echo $pict_two1; ?>">
    </div>
    <div class="form-group">
  	  <label>Slika 4</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_two2_aero" class="form-control" value="<?php echo $pict_two2; ?>">
    </div>
    <div class="form-group">
  	  <label>Opis slika 3 i 4</label>
  	  <input placeholder="Unesi opis slika 3 i 4" type="text" name="pic_desc2_aero" class="form-control" value="<?php echo $pic_desc2; ?>">
    </div>
    <div class="form-group">
  	  <label>Tekst 3</label>
  	  <textarea class="form-control" type="text" placeholder="Unesi tekst 3" name="text3_aero" cols="30" rows="10" value="<?php echo $text3; ?>"></textarea>
	  </div>
    <div class="form-group">
  	  <label>Slika 5</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_three1_aero" class="form-control" value="<?php echo $pict_three1; ?>">
    </div>
    <div class="form-group">
  	  <label>Slika 6</label>
  	  <input placeholder="Unesi ime slike" type="text" name="pict_three2_aero" class="form-control" value="<?php echo $pict_three2; ?>">
    </div>
    <div class="form-group">
  	  <label>Opis slika 5 i 6</label>
  	  <input placeholder="Unesi opis slika 5 i 6" type="text" name="pic_desc3_aero" class="form-control" value="<?php echo $pic_desc3; ?>">
    </div>
    <div class="form-group">
  	  <label>Tekst 4</label>
  	  <textarea class="form-control" type="text" placeholder="Unesi tekst 4" name="text4_aero" cols="30" rows="10" value="<?php echo $text4; ?>"></textarea>
	  </div>
    <div class="form-group">
  	  <button type="submit" class="btn" name="add_chapter_aero">Unesi poglavlje</button>
  	</div>
  </form>
</div>






<div id="show_stat" class="container">
  <h2>Statistika</h2>
  <hr>
  <form method="post">
<input placeholder="Unesi id članka" type="text" name="item" class="form-control" value="<?php echo $item; ?>">
<br>
<button type="submit" class="btn" name="show_stat">Pretraži</button>
</form>
  
</div>















<script>
var someVarName = localStorage.getItem("someVarKey");
if(someVarName == "show_add_article"){
    var x = document.getElementById("show_add_article");
    x.style.display = "block";
}
if(someVarName == "show_edit_article"){
    var x = document.getElementById("show_edit_article");
    x.style.display = "block";
}
if(someVarName == "show_remove_article"){
    var x = document.getElementById("show_remove_article");
    x.style.display = "block";
}
if(someVarName == "show_add_aero"){
    var x = document.getElementById("show_add_aero");
    x.style.display = "block";
}
if(someVarName == "show_edit_aero"){
    var x = document.getElementById("show_edit_aero");
    x.style.display = "block";
}
if(someVarName == "show_remove_aero"){
    var x = document.getElementById("show_remove_aero");
    x.style.display = "block";
}
if(someVarName == "show_add_aero_chapter"){
    var x = document.getElementById("show_add_aero_chapter");
    x.style.display = "block";
}
if(someVarName == "show_add_article_content"){
    var x = document.getElementById("show_add_article_content");
    x.style.display = "block";
}
if(someVarName == "show_edit_article_content"){
    var x = document.getElementById("show_edit_article_content");
    x.style.display = "block";
}

function show_add_article() {
    
var someVarName = localStorage.getItem("someVarKey");


var x = document.getElementById("show_add_article");
var y = document.getElementById("show_edit_article");
var z = document.getElementById("show_remove_article");
var x1 = document.getElementById("show_add_aero");
var x2 = document.getElementById("show_edit_aero");
var x3 = document.getElementById("show_remove_aero");
var x4 = document.getElementById("show_add_aero_chapter");
var x5 = document.getElementById("show_add_article_content");
var x6 = document.getElementById("show_edit_article_content");

  x.style.display = "block";
  y.style.display = "none";
  z.style.display = "none";
  x1.style.display = "none";
  x2.style.display = "none";
  x3.style.display = "none";
  x4.style.display = "none";
  x5.style.display = "none";
  x6.style.display = "none";
  window.scrollBy(0, -1000);
  
  someVarName = "show_add_article";
  localStorage.setItem("someVarKey", someVarName);
}
function show_edit_article() {
    
var someVarName = localStorage.getItem("someVarKey");


var x = document.getElementById("show_edit_article");
var y = document.getElementById("show_add_article");
var z = document.getElementById("show_remove_article");
var x1 = document.getElementById("show_add_aero");
var x2 = document.getElementById("show_edit_aero");
var x3 = document.getElementById("show_remove_aero");
var x4 = document.getElementById("show_add_aero_chapter");
var x5 = document.getElementById("show_add_article_content");
var x6 = document.getElementById("show_edit_article_content");

  x.style.display = "block";
  y.style.display = "none";
  z.style.display = "none";
  x1.style.display = "none";
  x2.style.display = "none";
  x3.style.display = "none";
  x4.style.display = "none";
  x5.style.display = "none";
  x6.style.display = "none";
  window.scrollBy(0, -1000);
  
  someVarName = "show_edit_article";
localStorage.setItem("someVarKey", someVarName);

}
function show_remove_article() {
    
var someVarName = localStorage.getItem("someVarKey");


var x = document.getElementById("show_remove_article");
var y = document.getElementById("show_add_article");
var z = document.getElementById("show_edit_article");
var x1 = document.getElementById("show_add_aero");
var x2 = document.getElementById("show_edit_aero");
var x3 = document.getElementById("show_remove_aero");
var x4 = document.getElementById("show_add_aero_chapter");
var x5 = document.getElementById("show_add_article_content");
var x6 = document.getElementById("show_edit_article_content");

  x.style.display = "block";
  y.style.display = "none";
  z.style.display = "none";
  x1.style.display = "none";
  x2.style.display = "none";
  x3.style.display = "none";
  x4.style.display = "none";
  x5.style.display = "none";
  x6.style.display = "none";
  window.scrollBy(0, -1000);
  
  someVarName = "show_remove_article";
localStorage.setItem("someVarKey", someVarName);
  
}


function show_add_aero(){

var someVarName = localStorage.getItem("someVarKey");

  var x = document.getElementById("show_add_aero");
  var y = document.getElementById("show_remove_article");
  var z = document.getElementById("show_add_article");
  var x1 = document.getElementById("show_edit_article");
  var x2 = document.getElementById("show_edit_aero");
  var x3 = document.getElementById("show_remove_aero");
  var x4 = document.getElementById("show_add_aero_chapter");
  var x5 = document.getElementById("show_add_article_content");
  var x6 = document.getElementById("show_edit_article_content");

  x.style.display = "block";
  y.style.display = "none";
  z.style.display = "none";
  x1.style.display = "none";
  x2.style.display = "none";
  x3.style.display = "none";
  x4.style.display = "none";
  x5.style.display = "none";
  x6.style.display = "none";
  window.scrollBy(0, -1000);
  
  someVarName = "show_add_aero";
localStorage.setItem("someVarKey", someVarName);
}

function show_edit_aero() {
    
    var someVarName = localStorage.getItem("someVarKey");
    
  var x = document.getElementById("show_edit_aero");
  var y = document.getElementById("show_remove_article");
  var z = document.getElementById("show_add_article");
  var x1 = document.getElementById("show_edit_article");
  var x2 = document.getElementById("show_add_aero");
  var x3 = document.getElementById("show_remove_aero");
  var x4 = document.getElementById("show_add_aero_chapter");
  var x5 = document.getElementById("show_add_article_content");
  var x6 = document.getElementById("show_edit_article_content");

  x.style.display = "block";
  y.style.display = "none";
  z.style.display = "none";
  x1.style.display = "none";
  x2.style.display = "none";
  x3.style.display = "none";
  x4.style.display = "none";
  x5.style.display = "none";
  x6.style.display = "none";
  window.scrollBy(0, -1000);
  
   someVarName = "show_edit_aero";
localStorage.setItem("someVarKey", someVarName);
}

function show_remove_aero() {
    
    var someVarName = localStorage.getItem("someVarKey");
    
  var x = document.getElementById("show_remove_aero");
  var y = document.getElementById("show_remove_article");
  var z = document.getElementById("show_add_article");
  var x1 = document.getElementById("show_edit_article");
  var x2 = document.getElementById("show_add_aero");
  var x3 = document.getElementById("show_edit_aero");
  var x4 = document.getElementById("show_add_aero_chapter");
  var x5 = document.getElementById("show_add_article_content");
  var x6 = document.getElementById("show_edit_article_content");

  x.style.display = "block";
  y.style.display = "none";
  z.style.display = "none";
  x1.style.display = "none";
  x2.style.display = "none";
  x3.style.display = "none";
  x4.style.display = "none";
  x5.style.display = "none";
  x6.style.display = "none";
  window.scrollBy(0, -1000);
  
    someVarName = "show_remove_aero";
localStorage.setItem("someVarKey", someVarName);
}

function show_add_aero_chapter() {
    
 var someVarName = localStorage.getItem("someVarKey");
    
  var x = document.getElementById("show_add_aero_chapter");
  var y = document.getElementById("show_remove_article");
  var z = document.getElementById("show_add_article");
  var x1 = document.getElementById("show_edit_article");
  var x2 = document.getElementById("show_add_aero");
  var x3 = document.getElementById("show_edit_aero");
  var x4 = document.getElementById("show_remove_aero");
  var x5 = document.getElementById("show_add_article_content");
  var x6 = document.getElementById("show_edit_article_content");

  x.style.display = "block";
  y.style.display = "none";
  z.style.display = "none";
  x1.style.display = "none";
  x2.style.display = "none";
  x3.style.display = "none";
  x4.style.display = "none";
  x5.style.display = "none";
  x6.style.display = "none";
  window.scrollBy(0, -1000);
  
  
   someVarName = "show_add_aero_chapter";
localStorage.setItem("someVarKey", someVarName);
}
function show_add_article_content() {
    
 var someVarName = localStorage.getItem("someVarKey");
    
  var x = document.getElementById("show_add_article_content");
  var y = document.getElementById("show_remove_article");
  var z = document.getElementById("show_add_article");
  var x1 = document.getElementById("show_edit_article");
  var x2 = document.getElementById("show_add_aero");
  var x3 = document.getElementById("show_edit_aero");
  var x4 = document.getElementById("show_remove_aero");
  var x5 = document.getElementById("show_add_aero_chapter");
  var x6 = document.getElementById("show_edit_article_content");

  x.style.display = "block";
  y.style.display = "none";
  z.style.display = "none";
  x1.style.display = "none";
  x2.style.display = "none";
  x3.style.display = "none";
  x4.style.display = "none";
  x5.style.display = "none";
  x6.style.display = "none";
  window.scrollBy(0, -1000);
  
   someVarName = "show_add_article_content";
localStorage.setItem("someVarKey", someVarName);
}
function show_edit_article_content() {
    
     var someVarName = localStorage.getItem("someVarKey");
    
  var x = document.getElementById("show_edit_article_content");
  var y = document.getElementById("show_remove_article");
  var z = document.getElementById("show_add_article");
  var x1 = document.getElementById("show_edit_article");
  var x2 = document.getElementById("show_add_aero");
  var x3 = document.getElementById("show_edit_aero");
  var x4 = document.getElementById("show_remove_aero");
  var x5 = document.getElementById("show_add_aero_chapter");
  var x6 = document.getElementById("show_add_article_content");

  x.style.display = "block";
  y.style.display = "none";
  z.style.display = "none";
  x1.style.display = "none";
  x2.style.display = "none";
  x3.style.display = "none";
  x4.style.display = "none";
  x5.style.display = "none";
  x6.style.display = "none";
  window.scrollBy(0, -1000);
  
  someVarName = "show_edit_article_content";
localStorage.setItem("someVarKey", someVarName);
}

</script>



<!-- </body> -->
 </body>
</html>