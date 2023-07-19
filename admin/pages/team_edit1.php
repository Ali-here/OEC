<?php
include('../includes/connection.php');
$zz = $_POST['id'];
$fname = $_POST['team_name'];
$role = $_POST['team_role'];
$content = $_POST['team_content'];
$image = $_FILES['team_img'];

$imagename = $image['name'];
$imagepath = $image['tmp_name'];
$imageerror = $image['error'];

$image_ext = explode('.', $imagename);

if ($imageerror == 0) {
	$imagedesti = '../../assets/imgs/team/' . $imagename;
	move_uploaded_file($imagepath, $imagedesti);
	// $imagedestination = ltrim($imagedesti, '../../');
	$imagedestination = 'assets/imgs/team/' . $imagename;
	// echo $imagedestination;
}



$query = 'UPDATE ourteam set team_name ="' . $fname . '",
					team_role ="' . $role . '", team_content="' . $content . '", team_img="' . $imagedestination . '" WHERE
					team_id ="' . $zz . '"';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

?>
<script type="text/javascript">
	// alert("You've Update Customer Successfully.");
	window.location = "ourteam.php";
</script>