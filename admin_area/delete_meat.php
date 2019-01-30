<?php
	include("includes/db.php");

	if(isset($_GET['delete_meat'])){

	$delete_id = $_GET['delete_meat'];

	$delete_meat = "DELETE from meat where meat_id='$delete_id'";

	$run_delete = mysqli_query($con, $delete_meat);

	if($run_delete){

	echo "<script>alert('A type of meat has been deleted!')</script>";
	echo "<script>window.open('index.php?view_meat','_self')</script>";
	}

	}





?>
