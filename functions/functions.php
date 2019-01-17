<?php

  $con = mysqli_connect("localhost","root","","ecommerce");

  //Getting the categories
  function getCats() {
    global $con;
    $get_cats = "SELECT * FROM categories";
    $run_cats = mysqli_query($con, $get_cats);
    while ($row_cats = mysqli_fetch_array($run_cats)) {
      $cat_id = $row_cats['cat_id'];
      $cat_title = $row_cats['cat_title'];
      echo "<li><a href='#'>$cat_title</a></li>";
    }
  }

  //Getting the Meat
  function getMeat() {
    global $con;
    $get_meat = "SELECT * FROM meat";
    $run_meat = mysqli_query($con, $get_meat);
    while ($row_meat = mysqli_fetch_array($run_meat)) {
      $meat_id = $row_meat['meat_id'];
      $meat_title = $row_meat['meat_title'];
      echo "<li><a href='#'>$meat_title</a></li>";
    }
  }

  function getPro() {
    global $con;
    $get_pro = "SELECT * FROM product order by RAND() LIMIT 0,6";
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
        <img src='admin_area/product_images/$pro_image' width='180' height='180' />
        <p><b>$$pro_price</b></p>
        <a href='details.php' style='float:left;'>Details</a>
        <a href='index.php'><button style='float:right'>Add to Cart</button></a>
      </div>
      ";
    }
  }

?>
