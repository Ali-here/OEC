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
$query = 'SELECT * FROM ourteam WHERE team_id =' . $_GET['id'];
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
      <h4 class="m-2 font-weight-bold text-primary">Edit Team</h4>
    </div><a type="button" class="btn btn-primary bg-gradient-primary btn-block" href="ourteam.php?"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
    <div class="card-body">

      <form role="form" method="post" action="team_edit1.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $zz; ?>" />
        <div class="form-group row text-left text-warning">
          <div class="col-sm-3" style="padding-top: 5px;">
            Image:
          </div>
          <div class="col-sm-9">
            <input type="file" class="form-control" placeholder="Enter Image" name="team_img" value="<?php echo $i; ?>" required>
          </div>
        </div>
        <div class="form-group row text-left text-warning">
          <div class="col-sm-3" style="padding-top: 5px;">
            Name:
          </div>
          <div class="col-sm-9">
            <input class="form-control" placeholder="Enter Name" name="team_name" value="<?php echo $a; ?>" required>
          </div>
        </div>
        <div class="form-group row text-left text-warning">
          <div class="col-sm-3" style="padding-top: 5px;">
            Role:
          </div>
          <div class="col-sm-9">
            <input class="form-control" placeholder="Role" name="team_role" value="<?php echo $b; ?>" required>
          </div>
        </div>
        <div class="form-group row text-left text-warning">
          <div class="col-sm-3" style="padding-top: 5px;">
            Content:
          </div>
          <div class="col-sm-9">
            <textarea class="form-control" placeholder="Enter Content" name="team_content" value="" required cols="10" rows="5"><?php echo $b2; ?></textarea>
            <!-- <input class="form-control" placeholder="Enter Content" name="team_content" value="" required> -->
          </div>
        </div>
        <hr>

        <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>
      </form>
    </div>
  </div>

  <?php
  include '../includes/footer.php';
  ?>