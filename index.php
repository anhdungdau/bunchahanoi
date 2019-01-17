<!Doctype html>
<?php
  include("functions/functions.php");
?>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css" media="all">
    <title>BunChaCoDao</title>

  </head>

  <body>

    <!-- Main container-->
    <div class="main_wrapper">

      <!-- Header-->
      <div class="header_wrapper">
        <img id="logo" src="images/logo2.jpg" />
        <img id="banner" src="images/banner.png" />

      </div> <!-- Header ends-->

      <!-- Navigation-->
      <div class="menubar">
        <ul id="menu">
          <li><a href="#">Home</a></li>
          <li><a href="#">All Products</a></li>
          <li><a href="#">My Account</a></li>
          <li><a href="#">Sign Up</a></li>
          <li><a href="#">Shopping Cart</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
        <div id="form">
          <form method="GET" action="results.php" enctype="multipart/form-data">
            <input type="text" name="user_query" placeholder="Search"/>
            <input type="submit" name="search" value="Search"/>
          </form>
        </div>
      </div> <!-- Navigation ends-->

      <div class="content_wrapper">
        <div id="sidebar">
          <div id="sidebar_title">Categories</div>
          <ul id="cats">
            <?php
              getCats();
            ?>
          </ul>
          <div id="sidebar_title">Meat</div>
          <ul id="cats">
            <?php
              getMeat();
            ?>
          </ul>
        </div>
        <div id="content_area">
          <div id="products_box">
            <?php
              getPro();
            ?>
          </div>
        </div>
        <div id="footer">
          <h4 style="text-align:center; padding-top: 15px;">&copy;2019 by Dung Bean</h4>
        </div>
      </div>

    </div> <!-- Main container ends-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-latest.js"></script>
    <script src="//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
