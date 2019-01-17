<!doctype html>
<?php
  include("functions/functions.php");
?>
<html lang="en">
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
    <link rel="stylesheet" href="css/main.css">

  </head>

  <body>

    <section id="header">
      <div id="wrapper">

        <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
          <a class="navbar-brand" href="#">Bun Cha Co Dao</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link" href="#">Entrees</a>
              <a class="nav-item nav-link" href="#">Rice Vermicelli</a>
              <a class="nav-item nav-link" href="#">Noodle</a>
              <a class="nav-item nav-link" href="#">Vegetarian Dishes</a>
              <a class="nav-item nav-link" href="#">Others</a>
              <a class="nav-item nav-link" href="#">Beverages</a>
            </div>
            <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>

      </div>
    </section>


    <div id="content_area">
      <div id="product_box">
        <?php
          getPro();
        ?>
      </div>
    </div>









    <!-- <section id="photos">
      <div class="container">
        <div class="row">

          <div class="col-md-4 col-sm-6">
            <img src="images/springRolls.jpg" alt="entrees" class="img-responsive" style="display:inline">
            <a href="#" data-featherlight="images/springRolls.jpg"><h2>Entrees</h2></a>
          </div>
          <div class="col-md-4 col-sm-6">
            <img src="images/bunCha.jpg" alt="riceVermicelli" class="img-responsive" style="display:inline">
            <a href="#" data-featherlight="images/bunCha.jpg"><h2>Rice Vermicelli</h2></a>
          </div>
          <div class="col-md-4 col-sm-6">
            <img src="images/bunMam.png" alt="noodle" class="img-responsive" style="display:inline">
            <a href="#" data-featherlight="images/bunMam.png"><h2>Noodle</h2></a>
          </div>
          <div class="col-md-4 col-sm-6">
            <img src="images/veganSpringRolls.jpeg" alt="vegetarianDishes" class="img-responsive" style="display:inline">
            <a href="#" data-featherlight="images/veganSpringRolls.jpeg"><h2>Rice Dishes</h2></a>
          </div>
          <div class="col-md-4 col-sm-6">
            <img src="images/xoi.jpg" alt="xoi" class="img-responsive" style="display:inline">
            <a href="#" data-featherlight="images/xoi.jpg"><h2>Others</h2></a>
          </div>
          <div class="col-md-4 col-sm-6">
            <img src="images/drink.jpeg" alt="drinks" class="img-responsive" style="display:inline">
            <a href="#" data-featherlight="images/drink.jpeg"><h2>Drinks</h2></a>
          </div>

        </div>
      </div>
    </section> -->

    <!-- <sec id="form">
      <div class="container">
        <div class="row">

          <div class="col-sm-6 form">
            <h3>BOOKING FORM</h3>
            <p>We are glad to hear from you about everything related to foods, drinks and customer services. Your comment is a very big input for us to delivery you the best experience :)  </p>
            <form action="">
              <div class="form-group">
                <input type="text" class="form-control input-lg" name="name" id="name" placeholder="Name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control input-lg" name="email" id="email" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="number" class="form-control input-lg" name="phone" id="phone" placeholder="Phone Number">
              </div>
              <div class="form-group">
                <input type="text" class="form-control input-lg" name="comment" id="comment" placeholder="Comment">
              </div>
              <button type="submit" class="btn text-center">Submit</button>
            </form>
          </div>

          <div class="col-sm-6 text-center iframe">
            <h3>WE ARE HERE</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.5758942975463!2d144.89752367908363!3d-37.7999777411255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d920ee564bd%3A0xa07c68cf6ed7b9bc!2s83+Nicholson+St%2C+Footscray+VIC+3011!5e0!3m2!1svi!2sau!4v1547601960706" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>

        </div>
      </div>
    </section> -->

    <!-- <footer>
      <div class="container text-center">
        <h4>FOLLOW US</h4>
        <ul class="list-inline">
          <li><a href="#"><i class="fab fa-facebook"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
        </ul>
        <h4 style="text-align:center; padding-top: 30px;">&copy;2019 by Dung Bean</h4>
      </div>
    </footer> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-latest.js"></script>
    <script src="//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
