
<form action="" method="post" style="padding:80px;">

<b>Insert New Type of Meat:</b>
<input type="text" name="new_meat" required/>
<input type="submit" name="add_meat" value="Add meat" />

</form>

<?php
include("includes/db.php");

	if(isset($_POST['add_meat'])){
	
	$new_meat = $_POST['new_meat'];

	$insert_meat = "insert into meats (meat_title) values ('$new_meat')";

	$run_meat = mysqli_query($con, $insert_meat);

	if($run_meat){

	echo "<script>alert('New type of meat has been inserted!')</script>";
	echo "<script>window.open('index.php?view_meat','_self')</script>";
	}
	}

?>
