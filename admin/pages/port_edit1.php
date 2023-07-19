<?php
include('../includes/connection.php');
$zz = $_POST['id'];
$cat_id = $_POST['portCat_id'];
$content = $_POST['port_content'];
$title = $_POST['portdetail_title'];
$innerimg = $_FILES['portdetail_img'];

$imagename1 = $innerimg['name'];
$imagepath1 = $innerimg['tmp_name'];
$imageerror1 = $innerimg['error'];

$image_ext1 = explode('.', $imagename1);

if ($imageerror1 == 0) {
	$imagedesti1 = '../../assets/imgs/portfolio/' . $imagename1;
	move_uploaded_file($imagepath1, $imagedesti1);
}
$inner_content = $_POST['portdetail_content'];
$time = $_POST['time_detail'];
$platform = $_POST['platform_detail'];
$team = $_POST['team_detail'];
$industry = $_POST['industry_detail'];
$image = $_FILES['port_img'];

$imagename = $image['name'];
$imagepath = $image['tmp_name'];
$imageerror = $image['error'];

$image_ext = explode('.', $imagename);

if ($imageerror == 0) {
	$imagedesti = '../../assets/imgs/portfolio/' . $imagename;
	move_uploaded_file($imagepath, $imagedesti);
	$imagedestination1 = 'assets/imgs/portfolio/' . $imagename;
}

$query = "UPDATE `portfolio` SET `portCat_id`='$cat_id',`portdetail_img`='$imagedesti1',`portdetail_title`='$title',`portdetail_content`='$inner_content',`port_img`='$imagedestination1',`port_content`='$content',`time_detail`='$time',`platform_detail`='$platform',`team_detail`='$team',`industry_detail`='$industry' WHERE `portdetail_id`='$zz'";
$result = mysqli_query($db, $query) or die(mysqli_error($db));

?>
<script type="text/javascript">
	// alert("You've Update Customer Successfully.");
	window.location = "portfolio.php";
</script>