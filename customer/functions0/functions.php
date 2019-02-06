<?php

  $con = mysqli_connect("us-cdbr-iron-east-03.cleardb.net","b28e95b30411f5","","heroku_49a2ff63108d5d8");

  if (mysqli_connect_errno()) {
    echo "Fail to connect to mysql: ".mysqli_connect_error();
  }

  function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
  }

  //Create cart
  function cart() {
    if (isset($_GET['add_cart'])) {
      global $con;
      $ip = getIp();
      $pro_id = $_GET['add_cart'];
      $check_pro = "SELECT * FROM cart WHERE ip_add = '$ip' AND p_id = '$pro_id'";
      $run_check = mysqli_query($con, $check_pro);
      if (mysqli_num_rows($run_check)) {
        echo "";
      }
      else {
        $insert_pro = "INSERT into cart(p_id,ip_add) VALUES ('$pro_id','$ip')";
        $run_pro = mysqli_query($con, $insert_pro);
        echo "<script>window.open('index.php','_self')</script>";
      }
    }
  }

  //Show all items in Cart
  function total_items() {
    if (isset($_GET['add_cart'])) {
      global $con;
      $ip = getIp();
      $get_items = "SELECT * FROM cart WHERE ip_add = '$ip'";
      $run_items = mysqli_query($con, $get_items);
      $count_items = mysqli_num_rows($run_items);
    }
    else {
      global $con;
      $ip = getIp();
      $get_items = "SELECT * FROM cart WHERE ip_add = '$ip'";
      $run_items = mysqli_query($con, $get_items);
      $count_items = mysqli_num_rows($run_items);
    }
    echo $count_items;
  }

  //Getting total price for Cart
  function total_price() {
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
        $values = array_sum($product_price);
        $total += $values;
      }
    }
    echo "$".$total;
  }

  //Getting the categories
  function getCats() {
    global $con;
    $get_cats = "SELECT * FROM categories";
    $run_cats = mysqli_query($con, $get_cats);
    while ($row_cats = mysqli_fetch_array($run_cats)) {
      $cat_id = $row_cats['cat_id'];
      $cat_title = $row_cats['cat_title'];
      echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
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
      echo "<li><a href='index.php?meat=$meat_id'>$meat_title</a></li>";
    }
  }

  function getPro() {
    if (!isset($_GET['cat'])) {
      if (!isset($_GET['meat'])) {
       global $con;
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
              <p><b>Price: $$pro_price</b></p>
              <a href='details.php?pro_id=$pro_id' style='float:left;'>More info</a>
              <a href='index.php?add_cart=$pro_id'><button style='float:right'>Order now</button></a>
            </div>
            ";
        }
      }
    }
  }

  function getCatPro() {
    if (isset($_GET['cat'])) {
      $cat_id = $_GET['cat'];
      global $con;
      $get_cat_pro = "SELECT * FROM products WHERE product_cat = '$cat_id'";
      $run_cat_pro = mysqli_query($con, $get_cat_pro);

        while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
          $pro_id = $row_cat_pro['product_id'];
          $pro_cat = $row_cat_pro['product_cat'];
          $pro_meat = $row_cat_pro['product_meat'];
          $pro_title = $row_cat_pro['product_title'];
          $pro_price = $row_cat_pro['product_price'];
          $pro_desc = $row_cat_pro['product_desc'];
          $pro_image = $row_cat_pro['product_image'];
          echo "
          <div id='single_product'><h3>$pro_title</h3>
            <img src='admin_area/product_images/$pro_image' width='200' height='180' />
            <p><b>$$pro_price</b></p>
            <a href='details.php?pro_id=$pro_id' style='float:left;'>More info</a>
            <a href='index.php?pro_id=$pro_id'><button style='float:right'>Order now</button></a>
          </div>
          ";
        }
      }
    }

    function getMeatPro() {
      if (isset($_GET['meat'])) {
        $meat_id = $_GET['meat'];
        global $con;
        $get_meat_pro = "SELECT * FROM products WHERE product_meat = '$meat_id'";
        $run_meat_pro = mysqli_query($con, $get_meat_pro);

          while ($row_meat_pro = mysqli_fetch_array($run_meat_pro)) {
            $pro_id = $row_meat_pro['product_id'];
            $pro_cat = $row_meat_pro['product_cat'];
            $pro_meat = $row_meat_pro['product_meat'];
            $pro_title = $row_meat_pro['product_title'];
            $pro_price = $row_meat_pro['product_price'];
            $pro_desc = $row_meat_pro['product_desc'];
            $pro_image = $row_meat_pro['product_image'];
            echo "
            <div id='single_product'><h3>$pro_title</h3>
              <img src='admin_area/product_images/$pro_image' width='200' height='180' />
              <p><b>$$pro_price</b></p>
              <a href='details.php?pro_id=$pro_id' style='float:left;'>More info</a>
              <a href='index.php?pro_id=$pro_id'><button style='float:right'>Order now</button></a>
            </div>
            ";
          }
        }
      }

?>
