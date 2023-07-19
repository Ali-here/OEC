<?php
include('../includes/connection.php');
$zz = $_POST['id'];
$fname = $_POST['client_name'];
$role = $_POST['client_role'];
$content = $_POST['client_msg'];
$image = $_FILES['client_img'];

$imagename = $image['name'];
$imagepath = $image['tmp_name'];
$imageerror = $image['error'];

$image_ext = explode('.', $imagename);

if ($imageerror == 0) {
	$imagedesti = '../../assets/imgs/client/' . $imagename;
	move_uploaded_file($imagepath, $imagedesti);
	// $imagedestination = ltrim($imagedesti, '../../');
	$imagedestination = 'assets/imgs/client/' . $imagename;
	// echo $imagedestination;
}



$query = 'UPDATE clients set client_name ="' . $fname . '",
					client_role ="' . $role . '", client_msg="' . $content . '", client_img="' . $imagedestination . '" WHERE
					client_id ="' . $zz . '"';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

?>
<script type="text/javascript">
	// alert("You've Update Customer Successfully.");
	window.location = "clients.php";
</script>