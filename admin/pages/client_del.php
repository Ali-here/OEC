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

    ?>
<script type="text/javascript">
    //then it will be redirected
    // alert("Restricted Page! You will be redirected to POS");
    window.location = "index.php";
</script>
<?php   }
    }
    // if (!isset($_GET['do']) || $_GET['do'] != 1) {

    if (isset($_GET['id'])) {
        // case 'customer':
        $query = 'DELETE FROM clients WHERE client_id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<script type="text/javascript">
    // alert("Team Member Successfully Deleted.");
    window.location = "clients.php";
</script>
<?php
        //break;
    }
    // }
?>