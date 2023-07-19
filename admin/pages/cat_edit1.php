<?php
include('../includes/connection.php');
$zz = $_POST['id'];
$fname = $_POST['portCat_name'];




$query = 'UPDATE port_cat set portCat_name ="' . $fname . '" WHERE
					portCat_id ="' . $zz . '"';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

?>
<script type="text/javascript">
	// alert("You've Update Customer Successfully.");
	window.location = "Category.php";
</script>