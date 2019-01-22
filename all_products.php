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
    <title>BunChaHaNoi</title>

  </head>

  <body>

    <!-- Main container-->
    <div class="main_wrapper">

      <!-- Header-->
      <div class="header_wrapper">
        <a href="index.php"><img id="logo" src="images/logo2.jpg"/></a>
        <img id="banner" src="images/banner.png" />

      </div> <!-- Header ends-->

      <!-- Navigation-->
      <div class="menubar">
        <ul id="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="all_products.php">All Products</a></li>
          <li><a href="customer/my_account.php">My Account</a></li>
          <li><a href="#">Sign Up</a></li>
          <li><a href="cart.php">Shopping Cart</a></li>
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

          <div id="shopping_cart">
            <span style="float:right; font-size: 18px; padding: 5px; line-height: 40px;">
              Welcome Guest! <b style="color: lightgreen">Shopping Cart </b> Total dishes: Total Price: <a href="cart.php" style="color:lightgreen;">Go to Cart</a>
            </span>
          </div>

          <div id="products_box">
            <?php
              $get_pro = "SELECT * FROM products";
              $run_pro = mysqli_query($con, $get_pro);
                while ($row_pro = mysqli_fetch_array($run_pro)) {
                  $pro_id = $row_pro['product_id'];
                  $pro_cat = $row_pro['product_cat'];
                  $pro_meat = $row_pro['product_meat'];
                  $pro_title = $row_pro['product_title'];
                  $pro_price = $row_pro['product_price'];
                  $pro_desc = $row_pro['product_desc'];
                  $pro_image = $row_pro['product_image'];
                  echo "
                  <div id='single_product'><h3>$pro_title</h3>
                    <img src='admin_area/product_images/$pro_image' width='200' height='180' />
                    <p><b>$$pro_price</b></p>
                    <a href='details.php?pro_id=$pro_id' style='float:left;'>More info</a>
                    <a href='index.php?pro_id=$pro_id'><button style='float:right'>Order now</button></a>
                  </div>
                  ";
              }
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
