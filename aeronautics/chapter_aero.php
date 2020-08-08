<?php
 if (session_status() == PHP_SESSION_NONE) {
  session_start();
}


  $id = $_GET['id'];
  $db = mysqli_connect('localhost', 'id13769560_userpart', 'r$jHF8N4[t]1?4Rs', 'id13769560_part');

  $query = "SELECT * FROM aero_chapter WHERE aero_chapter_id = $id";
  $results = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($results);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style_aero_chapter.css">
    <title>Aeronautika</title>
</head>
<body>
<img id="cover" src="images/background/back.jpg" alt="">
<div class="container">
<a id="top_btn" href="http://part-portal.tk">Natrag na portal</a>
<h1 class="title"><?php echo"" . $row['title'] .  "";?></h1>
    <hr>
    <h2 class="title"><?php echo"" . $row['subtitle'] .  "";?></h2>
    <br>

    <blockquote ><?php echo"" . $row['text_1'] .  "";?></blockquote>
    <div class="row">
        <div class="column">
    <img class="imgcontent" src="images/chapter/<?php echo"" . $row['pict_one_1'] .  "";?>.jpg" alt="">
        </div>
        <div class="column">
    <img class="imgcontent" src="images/chapter/<?php echo"" . $row['pict_one_2'] .  "";?>.jpg" alt="">
        </div>
    </div>
        <p><?php echo"" . $row['pic_desc_1'] .  "";?></p>
    <blockquote><?php echo"" . $row['text_2'] .  "";?></blockquote>
    <div class="row">
        <div class="column">
    <img class="imgcontent" src="images/chapter/<?php echo"" . $row['pict_two_1'] .  "";?>.jpg" alt="">
        </div>
        <div class="column">
    <img class="imgcontent" src="images/chapter/<?php echo"" . $row['pict_two_2'] .  "";?>.jpg" alt="">
        </div>
    </div>
        <p><?php echo"" . $row['pic_desc_2'] .  "";?></p>
    <blockquote ><?php echo"" . $row['text_3'] .  "";?></blockquote>
    <div class="row">
        <div class="column">
    <img class="imgcontent" src="images/chapter/<?php echo"" . $row['pict_three_1'] .  "";?>.jpg" alt="">
        </div>
        <div class="column">
    <img class="imgcontent" src="images/chapter/<?php echo"" . $row['pict_three_2'] .  "";?>.jpg" alt="">
        </div>
    </div>
        <p><?php echo"" . $row['pic_desc_3'] .  "";?></p>
    <blockquote ><?php echo"" . $row['text_4'] .  "";?></blockquote>
    <div class="row">
    <div class="column">
    <a class="btn" href="http://part-portal.tk">Natrag na portal</a>
    </div>
    <div class="column">
    <a class="btn">Pokušaj riješiti kviz!</a>
    </div>
    <div class="column">
    <a class="btn">Sljedeće poglavlje</a>
    </div>
    </div>
</div>
<!-- </body> -->
</body>
</html>