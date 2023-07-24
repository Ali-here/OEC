<?php
require('session.php');
confirm_logged_in();

include '../includes/connection.php';
$query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = ' . $_SESSION['MEMBER_ID'] . '';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
  $Aa = $row['TYPE'];

  if ($Aa == 'User') {
    include '../includes/userSidebar.php';
  } else {
    include '../includes/sidebar.php';
  }
}

// JOB SELECT OPTION TAB
$sql = "SELECT DISTINCT TYPE, TYPE_ID FROM type";
$result = mysqli_query($db, $sql) or die("Bad SQL: $sql");

$opt = "<select class='form-control' name='type'>";
while ($row = mysqli_fetch_assoc($result)) {
  $opt .= "<option value='" . $row['TYPE_ID'] . "'>" . $row['TYPE'] . "</option>";
}

$opt .= "</select>";

$query = "SELECT ID, e.FIRST_NAME, e.LAST_NAME, USERNAME, PASSWORD, e.EMAIL,  j.JOB_TITLE,  t.TYPE
                      FROM users u
                      join employee e on u.EMPLOYEE_ID = e.EMPLOYEE_ID
                      join job j on e.JOB_ID=j.JOB_ID
                      join type t on u.TYPE_ID=t.TYPE_ID
                      WHERE ID =" . $_SESSION['MEMBER_ID'];
$result = mysqli_query($db, $query) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result)) {
  $zz = $row['ID'];
  $a = $row['FIRST_NAME'];
  $b = $row['LAST_NAME'];
  $d = $row['USERNAME'];
  $e = $row['PASSWORD'];
  $f = $row['EMAIL'];
  $h = $row['JOB_TITLE'];
  $l = $row['TYPE'];
}
$id = $_GET['id'];
?>

<div class="card shadow mb-4 col-xs-12 col-md-12 border-bottom-primary">
  <div class="card-header py-3">
    <h4 class="m-2 font-weight-bold text-primary">Edit Account Info</h4>
  </div>
  <div class="card-body">


    <form role="form" method="post" action="settings_edit.php">
      <input type="hidden" name="id" value="<?php echo $zz; ?>" />

      <div class="form-group row text-left text-primary">
        <div class="col-sm-3" style="padding-top: 5px;">
          First Name:
        </div>
        <div class="col-sm-9">
          <input class="form-control" placeholder="First Name" name="firstname" value="<?php echo $a; ?>" required>
        </div>
      </div>
      <div class="form-group row text-left text-primary">
        <div class="col-sm-3" style="padding-top: 5px;">
          Last Name:
        </div>
        <div class="col-sm-9">
          <input class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $b; ?>" required>
        </div>
      </div>
      <div class="form-group row text-left text-primary">
        <div class="col-sm-3" style="padding-top: 5px;">
          Username:
        </div>
        <div class="col-sm-9">
          <input class="form-control" placeholder="Username" name="username" value="<?php echo $d; ?>" required>
        </div>
      </div>
      <div class="form-group row text-left text-primary">
        <div class="col-sm-3" style="padding-top: 5px;">
          Password:
        </div>
        <div class="col-sm-9">
          <input type="password" class="form-control" placeholder="Password" name="password" value="" required>
        </div>
      </div>
      <div class="form-group row text-left text-primary">
        <div class="col-sm-3" style="padding-top: 5px;">
          Email:
        </div>
        <div class="col-sm-9">
          <input class="form-control" placeholder="Email" name="email" value="<?php echo $f; ?>" required>
        </div>
      </div>
      <div class="form-group row text-left text-primary">
        <div class="col-sm-3" style="padding-top: 5px;">
          Role:
        </div>
        <div class="col-sm-9">
          <input class="form-control" placeholder="Role" name="role" value="<?php echo $h; ?>" readonly>
        </div>
      </div>
      <div class="form-group row text-left text-primary">
        <div class="col-sm-3" style="padding-top: 5px;">
          Account Type:
        </div>
        <div class="col-sm-9">
          <input class="form-control" placeholder="Account Type" name="type" value="<?php echo $l; ?>" readonly>
        </div>
      </div>
      <hr>

      <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>
    </form>
  </div>
</div>

<?php
include '../includes/footer.php';
?>