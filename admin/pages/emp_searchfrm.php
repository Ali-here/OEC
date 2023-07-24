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
$query = 'SELECT EMPLOYEE_ID, FIRST_NAME, LAST_NAME, EMAIL,  j.JOB_TITLE FROM employee e  join job j on j.JOB_ID=e.JOB_ID WHERE e.EMPLOYEE_ID =' . $_GET['id'];
$result = mysqli_query($db, $query) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result)) {
  $zz = $row['EMPLOYEE_ID'];
  $i = $row['FIRST_NAME'];
  $ii = $row['LAST_NAME'];
  $a = $row['EMAIL'];
  $c = $row['JOB_TITLE'];
}
$id = $_GET['id'];
?>
<center>
  <div class="card shadow mb-4 col-xs-12 col-md-8" style="border-bottom: 5px solid #072d66;">
    <div class="card-header py-3">
      <h4 class="m-2 font-weight-bold" style="color:#072d66;">Seller's Detail</h4>
    </div>
    <a href="employee.php" type="button" class="btn btn-block" style="background: #072d66; color:white;"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
    <div class="card-body">



      <div class="form-group row text-left">
        <div class="col-sm-3" style="color: #072d66;">
          <h5>
            Full Name<br>
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            : <?php echo $i; ?> <?php echo $ii; ?> <br>
          </h5>
        </div>
      </div>
      <div class="form-group row text-left">
        <div class="col-sm-3" style="color:#072d66;">
          <h5>
            Email<br>
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            : <?php echo $a; ?> <br>
          </h5>
        </div>
      </div>
      <div class="form-group row text-left">
        <div class="col-sm-3" style="color: #072d66;">
          <h5>
            Role<br>
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            : <?php echo $c; ?> <br>
          </h5>
        </div>
      </div>

    </div>
  </div>

  </div>
  </div>

  <?php
  include '../includes/footer.php';
  ?>