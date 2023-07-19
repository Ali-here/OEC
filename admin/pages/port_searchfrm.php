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
  window.location = "index.php";
</script>
<?php   }
  }
  $query = 'SELECT * FROM portfolio WHERE portdetail_id =' . $_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
  while ($row = mysqli_fetch_array($result)) {
    $zz = $row['team_id'];
    $i = $row['team_img'];
    $a = $row['team_name'];
    $b = $row['team_role'];
    $b2 = $row['team_content'];
  }
  $id = $_GET['id'];
?>

<center>
  <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
    <div class="card-header py-3">
      <h4 class="m-2 font-weight-bold text-primary">Team's Detail</h4>
    </div>
    <a href="ourteam.php" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
    <div class="card-body">


      <div class="form-group row text-left">

        <div class="col-sm-9">
          <h5>
            <img class="card-img-top img-fluid d-flex" src="<?php echo $i; ?>" alt="Card image" style="width: 148px;">
            <br>
          </h5>
        </div>

      </div>

      <div class="form-group row text-left">

        <div class="col-sm-3 text-primary">
          <h5>
            Full Nam<ebr>
          </h5>
        </div>

        <div class="col-sm-9">
          <h5>
            : <?php echo $a; ?> <br>
          </h5>
        </div>

      </div>

      <div class="form-group row text-left">

        <div class="col-sm-3 text-primary">
          <h5>
            Role<br>
          </h5>
        </div>

        <div class="col-sm-9">
          <h5>
            : <?php echo $b; ?> <br>
          </h5>
        </div>

      </div>
    </div>
  </div>

  <?php
  include '../includes/footer.php';
  ?>