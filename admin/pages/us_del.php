<?php
include '../includes/connection.php';

// if (!isset($_GET['do']) || $_GET['do'] != 1) {

if (isset($_GET['id'])) {

	$query = 'DELETE FROM `users` WHERE  ID = ' . $_GET['id'];
	$result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
	<script type="text/javascript">
		alert("User Successfully Deleted.");
		window.location = "user.php";
	</script>
<?php
	//break;
}
// }
?>