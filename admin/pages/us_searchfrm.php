<?php
include '../includes/connection.php';
include '../includes/sidebar.php';
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
<?php
  }
}
$query2 = 'SELECT ID, e.FIRST_NAME, e.LAST_NAME,  USERNAME, PASSWORD, e.EMAIL, j.JOB_TITLE,  t.TYPE
            FROM users u
            join employee e on u.EMPLOYEE_ID = e.EMPLOYEE_ID
            join job j on e.JOB_ID=j.JOB_ID
            join type t on u.TYPE_ID=t.TYPE_ID
            WHERE ID =' . $_GET['id'];

$result2 = mysqli_query($db, $query2) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result2)) {
  $zz = $row['ID'];
  $a = $row['FIRST_NAME'];
  $b = $row['LAST_NAME'];
  $d = $row['USERNAME'];
  $e = $row['PASSWORD'];
  $f = $row['EMAIL'];
  $g = $row['JOB_TITLE'];
  $l = $row['TYPE'];
}
$id = $_GET['id'];
?>
<center>
  <div class="card shadow mb-4 col-xs-12 col-md-8 " style="border-bottom: 5px solid #072d66;">
    <div class="card-header py-3">
      <h4 class="m-2 font-weight-bold" style="color: #072d66;"><?php echo $a; ?>'s Detail</h4>
    </div>
    <a href="user.php?action=add" type="button" class="btn" style="background:#072d66; color: white;">Back</a>
    <div class="card-body">

      <div class="form-group row text-left">
        <div class="col-sm-3" style="color: #072d66;">
          <h5>
            Full Name<br>
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            : <?php echo $a; ?> <?php echo $b; ?> <br>
          </h5>
        </div>
      </div>
      <div class="form-group row text-left">
        <div class="col-sm-3" style="color: #072d66;">
          <h5>
            Username<br>
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            : <?php echo $d; ?> <br>
          </h5>
        </div>
      </div>
      <div class="form-group row text-left">
        <div class="col-sm-3" style="color: #072d66;">
          <h5>
            Email<br>
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            : <?php echo $f; ?> <br>
          </h5>
        </div>
      </div>
      <!-- Contact # is missing here -->
      <div class="form-group row text-left">
        <div class="col-sm-3" style="color: #072d66;">
          <h5>
            Role<br>
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            : <?php echo $g; ?> <br>
          </h5>
        </div>
      </div>
      <div class="form-group row text-left">
        <div class="col-sm-3" style="color: #072d66;">
          <h5>
            Account Type<br>
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            : <?php echo $l; ?> <br>
          </h5>
        </div>
      </div>
    </div>
  </div>
</center>

<?php
include '../includes/footer.php';
?>