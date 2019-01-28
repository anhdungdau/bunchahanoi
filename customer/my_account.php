<!Doctype html>
<?php
  session_start();
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
        <a href="../index.php"><img id="logo" src="images/logo2.jpg"/></a>
        <img id="banner" src="images/banner.png" />

      </div> <!-- Header ends-->

      <!-- Navigation-->
      <div class="menubar">
        <ul id="menu">
          <li><a href="../index.php">Home</a></li>
          <li><a href="../all_products.php">All Products</a></li>
          <li><a href="../customer/my_account.php">My Account</a></li>
          <li><a href="#">Sign Up</a></li>
          <li><a href="../cart.php">Shopping Cart</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
        <div id="form">
          <form method="GET" action="../results.php" enctype="multipart/form-data">
            <input type="text" name="user_query" placeholder="Search"/>
            <input type="submit" name="search" value="Search"/>
          </form>
        </div>
      </div> <!-- Navigation ends-->

      <div class="content_wrapper">

				<div id="sidebar">

					<div id="sidebar_title">My Account</div>

					<ul id="cats">

					<?php

						$user = $_SESSION['customer_email'];

						$get_img = "SELECT * from customers where customer_email='$user'";

						$run_img = mysqli_query($con, $get_img);

						$row_img = mysqli_fetch_array($run_img);

						$c_image = $row_img['customer_image'];

						$c_name = $row_img['customer_name'];

						echo "<p style='text-align:center;padding-top:10px;'><img src='customer_images/$c_image' width='150' height='150'/></p>";

					?>
					<li><a href="my_account.php?my_orders">My Orders</a></li>
					<li><a href="my_account.php?edit_account">Edit Account</a></li>
					<li><a href="my_account.php?change_pass">Change Password</a></li>
					<li><a href="my_account.php?delete_account">Delete Account</a></li>
					<li><a href="logout.php">Logout</a></li>

					<ul>

					</div>

        <div id="content_area">

          <?php cart() ?>

          <div id="shopping_cart">
            <span style="float:right; font-size:17px; padding:5px; line-height:40px;">

	  					<?php
	    					if(isset($_SESSION['customer_email'])){
	    					  echo "<b>Welcome </b>" . $_SESSION['customer_email'] ;
	    					}
	  					?>

	  					<?php
		  					if(!isset($_SESSION['customer_email'])) {
		  						echo "<a href='../checkout.php' style='color:orange;'>Login</a>";
		  					}
		  					else {
		  						echo "<a href='logout.php' style='color:orange;'>Logout</a>";
		  					}
	  					?>

  					</span>
          </div>

					<div id="products_box">

					<?php
					if(!isset($_GET['my_orders'])) {
						if(!isset($_GET['edit_account'])) {
							if(!isset($_GET['change_pass'])) {
								if(!isset($_GET['delete_account'])) {

					echo "
					<h2 style='padding:20px;'>Welcome:  $c_name </h2>

					<b>You can see your orders cart by clicking this <a href='my_account.php?my_orders'>link</a></b>";
								}
							}
						}
					}
					?>

					<?php

						if(isset($_GET['edit_account'])){
							include("edit_account.php");
						}
						if(isset($_GET['change_pass'])){
							include("change_pass.php");
						}
						if(isset($_GET['delete_account'])){
							include("delete_account.php");
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
