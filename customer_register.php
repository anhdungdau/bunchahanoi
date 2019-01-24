<!Doctype html>
<?php
  session_start();
  include("functions/functions.php");
  include("includes/db.php");
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

          <?php cart() ?>

          <div id="shopping_cart">
            <span style="float:right; font-size: 18px; padding: 5px; line-height: 40px;">
              Welcome Guest! <b style="color: lightgreen">Shopping Cart</b> - Total items: <?php total_items(); ?> | Total Price: <?php total_price(); ?><a href="cart.php" style="color:lightgreen;"> Go to Cart</a>
            </span>
          </div>


          <form action="customer_register.php" method="POST" enctype="multipart/form-data">

  					<table align="center" width="750">

  						<tr align="center">
  							<td colspan="6"><h1>Create an Account</h1></td>
  						</tr>

  						<tr>
  							<td align="right">Customer Name:</td>
  							<td><input type="text" name="c_name" required/></td>
  						</tr>

  						<tr>
  							<td align="right">Customer Email:</td>
  							<td><input type="text" name="c_email" required/></td>
  						</tr>

  						<tr>
  							<td align="right">Customer Password:</td>
  							<td><input type="password" name="c_pass" required/></td>
  						</tr>

              <tr>
  							<td align="right">Customer Country:</td>
  							<td>
    							<select name="c_country">
    								<option>Select a Country</option>
    								<option>Australia</option>
    								<option>New Zealand</option>
    								<option>Japan</option>
    								<option>China</option>
    								<option>Korea</option>
    								<option>Vietnam</option>
    								<option>United Arab Emirates</option>
    								<option>United States</option>
    								<option>United Kingdom</option>
    							</select>
  							</td>
  						</tr>

              <tr>
  							<td align="right">Customer City:</td>
  							<td><input type="text" name="c_city" required/></td>
  						</tr>

              <tr>
  							<td align="right">Customer Contact:</td>
  							<td><input type="text" name="c_contact" required/></td>
  						</tr>

  						<tr>
  							<td align="right">Customer Image:</td>
  							<td><input type="file" name="c_image" required/></td>
  						</tr>

  						<tr>
  							<td align="right">Customer Address</td>
  							<td><textarea type="textarea" cols="20" rows="5" name="c_address" required></textarea></td>
  						</tr>

    					<tr align="center">
    						<td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
    					</tr>

  					</table>

  				</form>

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

<?php

	if(isset($_POST['register'])) {

		$ip = getIp();

		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
    $c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_address = $_POST['c_address'];

		move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

		$insert_c = "INSERT into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_image,customer_address) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_image','$c_address')";

		$run_c = mysqli_query($con, $insert_c);

		$sel_cart = "SELECT * from cart where ip_add='$ip'";

		$run_cart = mysqli_query($con, $sel_cart);

		$check_cart = mysqli_num_rows($run_cart);

		if($check_cart == 0) {

  		$_SESSION['customer_email']=$c_email;
  		echo "<script>alert('Your account has been created successfully!')</script>";
  		echo "<script>window.open('customer/my_account.php','_self')</script>";

		}

		else {

  		$_SESSION['customer_email']=$c_email;
  		echo "<script>alert('Your account has been created successfully!')</script>";
  		echo "<script>window.open('checkout.php','_self')</script>";

		}
	}

?>
