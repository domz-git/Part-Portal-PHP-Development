<?php
 if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

 
 
  $id = $_GET['id'];
  $visitor_ip = $_SERVER['REMOTE_ADDR'];
  $db = mysqli_connect('localhost', 'id13769560_userpart', 'r$jHF8N4[t]1?4Rs', 'id13769560_part');

  $query = "SELECT * FROM article_content WHERE article_content_id = $id";
  $results = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($results);

  

    $query = "INSERT INTO visit_counter (ip_address, count_article_id) VALUES ('$visitor_ip','$id')";
    $results = mysqli_query($db, $query);
  


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
    <link rel="stylesheet" href="style_article_content.css">
    <title>Article</title>
</head>
<body>
    <div id="page-container">
   <div id="content-wrap">
<img id="cover" src="images/article/banners/<?php echo"" . $row['banner'] .  "";?>.jpg" alt="">
<div class="container">
<h1 class="title"><?php echo"" . $row['title'] .  "";?></h1>
    <hr>
    <p class='article_section_date'><?php echo"" . $row['date'] .  "";?></p>
    <h2 class="title"><?php echo"" . $row['subtitle'] .  "";?></h2>
    <br>

    <blockquote ><?php echo"" . $row['text_1'] .  "";?></blockquote>
    <div class="row">
        <div class="column">
    <img class="imgcontent" src="images/article/<?php echo"" . $row['pict_one_1'] .  "";?>.jpg" alt="">
        </div>
        <div class="column">
    <img class="imgcontent" src="images/article/<?php echo"" . $row['pict_one_2'] .  "";?>.jpg" alt="">
        </div>
    </div>
        <p><?php echo"" . $row['pic_desc_1'] .  "";?></p>
    <blockquote><?php echo"" . $row['text_2'] .  "";?></blockquote>
    <div class="row">
        <div class="column">
    <img class="imgcontent" src="images/article/<?php echo"" . $row['pict_two_1'] .  "";?>.jpg" alt="">
        </div>
        <div class="column">
    <img class="imgcontent" src="images/article/<?php echo"" . $row['pict_two_2'] .  "";?>.jpg" alt="">
        </div>
    </div>
        <p><?php echo"" . $row['pic_desc_2'] .  "";?></p>
    <blockquote ><?php echo"" . $row['text_3'] .  "";?></blockquote>
    <div class="row">
        <div class="column">
    <img class="imgcontent" src="images/article/<?php echo"" . $row['pict_three_1'] .  "";?>.jpg" alt="">
        </div>
        <div class="column">
    <img class="imgcontent" src="images/article/<?php echo"" . $row['pict_three_2'] .  "";?>.jpg" alt="">
        </div>
    </div>
        <p><?php echo"" . $row['pic_desc_3'] .  "";?></p>
        <br>
    <div class="iframe-container">
        <br>
    <iframe id="intro_vid" width="100%" src="https://www.youtube.com/embed/GEfuOMzRgXo" allowfullscreen>
    </iframe>
    </div>
    <br>
    <blockquote ><?php echo"" . $row['text_4'] .  "";?></blockquote>
   
</div>
<br>
<!-- FOOTER -------------------------------------------------------------------------------------------------------------->
</div>
   <footer id="footer">
      <div id="footer_content" class="row">
          <div class="column_footer">
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
          <div class="column_footer">
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
          <div class="column_footer">
          <a id="part_ikona" href="index.php">PART</a>
            <p class="credits">Portal za aeronautiku i raketnu tehnologiju</p>
            <p class="credits">Autor stranice: Dominik Filipović</p>
            <p class="credits">Osijek 2020.</p>
          
          </div>
      </div>
   </footer>
 </div>
<!-- FOOTER -------------------------------------------------------------------------------------------------------------->
<!-- </body> -->
</body>
</html>