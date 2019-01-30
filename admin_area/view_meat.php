
<table width="795" align="center" bgcolor="pink">


	<tr align="center">
		<td colspan="6"><h2>View All Meat Here</h2></td>
	</tr>

	<tr align="center" bgcolor="skyblue">
		<th>Meat ID</th>
		<th>Meat Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
	include("includes/db.php");

	$get_meat = "SELECT * from meat";

	$run_meat = mysqli_query($con, $get_meat);

	$i = 0;

	while ($row_meat=mysqli_fetch_array($run_meat)){

		$meat_id = $row_meat['meat_id'];
		$meat_title = $row_meat['meat_title'];
		$i++;

	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $meat_title;?></td>
		<td><a href="index.php?edit_meat=<?php echo $meat_id; ?>">Edit</a></td>
		<td><a href="delete_meat.php?delete_meat=<?php echo $meat_id;?>">Delete</a></td>

	</tr>
	<?php } ?>




</table>
