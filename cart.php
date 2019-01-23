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

          <?php cart() ?>

          <div id="shopping_cart">
            <span style="float:right; font-size: 18px; padding: 5px; line-height: 40px;">
              Welcome Guest! <b style="color: lightgreen">Shopping Cart</b> - Total items: <?php total_items(); ?> | Total Price: <?php total_price(); ?><a href="cart.php" style="color:lightgreen;"> Go to Cart</a>
            </span>
          </div>

          <div id="products_box">
            <form action="" method="POST" enctype="multipart/form-data">
              <table align="center" width="720" bgcolor="#ccffff">

                <tr align="center">
                  <th>Remove</th>
                  <th>Dish</th>
                  <th>Quantity</th>
                  <th>Total Price</th>
                </tr>

                  <?php
                    $total = 0;
                    global $con;
                    $ip = getIp();
                    $sel_price = "SELECT * FROM cart WHERE ip_add = '$ip'";
                    $run_price = mysqli_query($con, $sel_price);

                    while ($p_price = mysqli_fetch_array($run_price)) {
                      $pro_id = $p_price['p_id'];
                      $pro_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
                      $run_pro_price = mysqli_query($con,$pro_price);

                      while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                        $product_price = array($pp_price['product_price']);
                        $product_title = $pp_price['product_title'];
                        $product_image = $pp_price['product_image'];
                        $single_price = $pp_price['product_price'];
                        $values = array_sum($product_price);
                        $total += $values;
                  ?>

                  <tr align="center">
                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/></td>
                    <td><?php echo $product_title; ?><br>
                      <img src="admin_area/product_images/<?php echo $product_image; ?>" width="50" height="45"/></td>
                    <td><input type="text" size="4" name="qty" /></td>
                    <td><?php echo "$".$single_price; ?></td>
                  </tr>

                <?php } } ?>
                <tr align="right">
                  <td colspan="4"><b>Sub Total: </b></td>
                  <td colspan="4"><?php echo "$".$total;?></td>
                </tr>
                <tr>
                  <td colspan="3"><input type="submit" name="update_cart" value="Update Cart" /></td>
                  <td><input type="submit" name="continue" value="Buying More" /></td>
                  <td><button><a href="checkout.php" style="text-decoration: none; color:black">Checkout</a></button></td>
                </tr>
              </table>
            </form>

            <?php
              $ip = getIp();
              if (isset($_POST['update_cart'])) {
                foreach ($_POST['remove'] as $remove_id) {
                  $delete_product = "DELETE FROM cart WHERE p_id ='$remove_id' AND ip_add ='$ip'";
                  $run_delete = mysqli_query($con, $delete_product);
                  if ($run_delete) {
                    echo "<script>window.open('cart.php','_self')</script>";
                  }
                }
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
