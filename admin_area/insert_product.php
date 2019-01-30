<!DOCTYPE>

<?php

include("includes/db.php");

?>
<html>
	<head>
		<title>Inserting Product</title>

<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
	</head>

<body bgcolor="skyblue">


	<form action="insert_product.php" method="post" enctype="multipart/form-data">

		<table align="center" width="795" border="2" bgcolor="#187eae">

			<tr align="center">
          <td colspan="7"><h2>Inserting form for new food or beverage</h2></td>
        </tr>

  			<tr>
  				<td align="right"><b>Product Title:</b></td>
  				<td><input type="text" name="product_title" size="60" required/></td>
  			</tr>

  			<tr>
  				<td align="right"><b>Product Category:</b></td>
  				<td>
  				<select name="product_cat" >
  					<option>Select a Category</option>
  					<?php
  		$get_cats = "select * from categories";

  		$run_cats = mysqli_query($con, $get_cats);

  		while ($row_cats=mysqli_fetch_array($run_cats)){

  		$cat_id = $row_cats['cat_id'];
  		$cat_title = $row_cats['cat_title'];

  		echo "<option value='$cat_id'>$cat_title</option>";


  	}

  					?>
  				</select>


  				</td>
  			</tr>

        <tr>
          <td align="right">Product Meat</td>
          <td>
            <select name="product_meat" required>
              <option>Select a meat</option>
                <?php
                  $get_meat = "SELECT * FROM meat";
                  $run_meat = mysqli_query($con, $get_meat);
                  while ($row_meat = mysqli_fetch_array($run_meat)) {
                    $meat_id = $row_meat['meat_id'];
                    $meat_title = $row_meat['meat_title'];
                    echo "<option value='$meat_id'>$meat_title</option>";
                  }
                ?>
            </select>
          </td>
        </tr>

        <tr>
          <td align="right">Product Title</td>
          <td><input type="text" name="product_title" size="50" required/></td>
        </tr>

        <tr>
          <td align="right">Product Price</td>
          <td><input type="text" name="product_price" required/></td>
        </tr>

        <tr>
          <td align="right">Product Description</td>
          <td>
            <textarea name="product_desc" cols="40" rows="10"></textarea>
          </td>
        </tr>

        <tr>
          <td align="right">Product Image</td>
          <td><input type="file" name="product_image" required/></td>
        </tr>
        <tr>
          <td align="right">Product Keywords</td>
          <td><input type="text" name="product_keywords" size="50" required/></td>
        </tr>
        <tr align="center">
          <td colspan="8"><input type="submit" name="insert_post" value="Insert food or beverage now"/></td>
        </tr>
      </table>
    </form>
  </body>

</html>

<?php
  if(isset($_POST['insert_post'])) {

     //Getting the text data from the fields

     $product_cat = $_POST['product_cat'];
     $product_meat = $_POST['product_meat'];
     $product_title = $_POST['product_title'];
     $product_price = $_POST['product_price'];
     $product_desc = $_POST['product_desc'];
     $product_keywords = $_POST['product_keywords'];

     //Getting the image from the field

     $product_image = $_FILES['product_image']['name'];
     $product_image_tmp = $_FILES['product_image']['tmp_name'];

     move_uploaded_file($product_image_tmp,"product_images/$product_image");

     $insert_product = "INSERT into products(product_cat,product_meat,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_meat','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
     $insert_pro = mysqli_query($con, $insert_product);

     if($insert_pro) {
       echo "<script>alert('Food or beverage has been inserted!')</script>";
       echo "<script>window.open('insert_product.php','_self')</script>";
     }
  }
?>
