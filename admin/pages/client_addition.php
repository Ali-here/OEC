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
  window.location = "pos.php";
</script>
<?php   }
  }
?>
<!-- Page Content -->
<div class="col-lg-12">
  <?php
  $name = $_POST['client_name'];
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
  }


  switch ($_GET['action']) {
    case 'add':
      $query = "INSERT INTO clients(client_img, client_name, client_msg, client_role) VALUES('$imagedestination', '$name', '$content', '$role')";
      mysqli_query($db, $query) or die('Error in updating Database');
      break;
  }
  ?>
  <script type="text/javascript">
    window.location = "clients.php";
  </script>
</div>

<?php
include '../includes/footer.php';
?>