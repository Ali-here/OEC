<?php
include '../includes/connection.php';
include '../includes/sidebar.php';
?><?php

    $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = ' . $_SESSION['MEMBER_ID'] . '';
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    while ($row = mysqli_fetch_assoc($result)) {
        $Aa = $row['TYPE'];

        if ($Aa == 'User') {

    ?> <script type="text/javascript">
    //then it will be redirected
    // alert("Restricted Page! You will be redirected to POS");
    window.location = "index.php.php";
</script>
<?php   }
    }
?>
<!-- Page Content -->
<div class="col-lg-12">
    <?php
    $cat_id = $_POST['portCat_id'];
    $innerimg = $_FILES['portdetail_img'];

    $imagename1 = $innerimg['name'];
    $imagepath1 = $innerimg['tmp_name'];
    $imageerror1 = $innerimg['error'];

    $image_ext1 = explode('.', $imagename1);

    if ($imageerror1 == 0) {
        $imagedesti1 = '../../assets/imgs/portfolio/' . $imagename1;
        move_uploaded_file($imagepath1, $imagedesti1);
    }

    $title = $_POST['portdetail_title'];
    $innercontent = $_POST['portdetail_content'];
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
        // $imagedestination = ltrim($imagedesti, '../../');
        $imagedestination1 = 'assets/imgs/portfolio/' . $imagename;
    }
    $content = $_POST['port_content'];


    switch ($_GET['action']) {
        case 'add':
            $query = "INSERT INTO `portfolio`(`portCat_id`, `portdetail_img`, `portdetail_title`, `portdetail_content`, `port_img`, `port_content`, `time_detail`, `platform_detail`, `team_detail`, `industry_detail`) VALUES ('$cat_id','$imagedesti1','$title','$innercontent','$imagedestination1','$content','$time','$platform','$team','$industry')";
            mysqli_query($db, $query) or die('Error in updating Database');
            break;
    }
    ?>
    <script type="text/javascript">
        window.location = "portfolio.php";
    </script>
</div>

<?php
include '../includes/footer.php';
?>