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
$query = 'SELECT * FROM portfolio WHERE portdetail_id =' . $_GET['id'];
$result = mysqli_query($db, $query) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result)) {
  $zz = $row['portdetail_id'];
  $z = $row['portcat_id'];
  $i = $row['port_img'];
  $a = $row['port_content'];
  $b = $row['portdetail_title'];
  $b2 = $row['portdetail_img'];
  $b3 = $row['portdetail_content'];
  $b4 = $row['time_detail'];
  $b5 = $row['platform_detail'];
  $b6 = $row['team_detail'];
  $b7 = $row['industry_detail'];
}
$id = $_GET['id'];
?>

<center>
  <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
    <div class="card-header py-3">
      <h4 class="m-2 font-weight-bold text-primary">Edit Portfolio</h4>
    </div><a type="button" class="btn btn-primary bg-gradient-primary btn-block" href="portfolio.php"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
    <div class="card-body">

      <form role="form" method="post" action="port_edit1.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $zz; ?>" />
        <div class="form-group row text-left text-warning">
          <div class="col-sm-3" style="padding-top: 5px;">
            Category:
          </div>
          <div class="col-sm-9">
            <div class="col-md-12 p-0">
              <div class="col-md-12">
                <?php
                include('../includes/connection.php');
                $sql = "SELECT DISTINCT portCat_name, portCat_id FROM port_Cat order by portCat_id asc";
                $result = mysqli_query($db, $sql);

                $aaa = "<select class='form-control' name='portCat_id' required>
                            <option disabled selected hidden>Select Category</option>";
                while ($row = mysqli_fetch_assoc($result)) {
                  $aaa .= "<option value='" . $row['portCat_id'] . "'>" . $row['portCat_name'] . "</option>";
                }
                ?>
                <?php
                echo $aaa;
                ?>
                <input type="hidden" name="portcat_id" class="form-control p-0 border-0" placeholder="">
              </div>

            </div>
          </div>
        </div>

        <div class="form-group row text-left text-warning">
          <div class="col-sm-3" style="padding-top: 5px;">
            Image:
          </div>
          <div class="col-sm-9">
            <input type="file" class="form-control" placeholder="Enter Image" name="port_img" value="<?php echo $i; ?>" required>
          </div>
        </div>

        <div class="form-group row text-left text-warning">
          <div class="col-sm-3" style="padding-top: 5px;">
            Main Content:
          </div>
          <div class="col-sm-9">
            <textarea class="form-control" placeholder="Main Section Content" name="port_content" value="" required cols="10" rows="5"><?php echo $a; ?></textarea>
            <!-- <input class="form-control" placeholder="Enter Content" name="team_content" value="" required> -->
          </div>
        </div>

        <div class="form-group row text-left text-warning">
          <div class="col-sm-3" style="padding-top: 5px;">
            Title:
          </div>
          <div class="col-sm-9">
            <input class="form-control" placeholder="Enter Name" name="portdetail_title" value="<?php echo $b; ?>" required>
          </div>
        </div>

        <div class="form-group row text-left text-warning">
          <div class="col-sm-3" style="padding-top: 5px;">
            Inner Img:
          </div>
          <div class="col-sm-9">
            <input type="file" class="form-control" placeholder="Enter Image" name="portdetail_img" value="<?php echo $b2; ?>" required>
          </div>
        </div>
        <div class="form-group row text-left text-warning">
          <div class="col-sm-3" style="padding-top: 5px;">
            In Content:
          </div>
          <div class="col-sm-9">
            <textarea class="form-control" placeholder="Enter Content" name="portdetail_content" value="" required cols="10" rows="5"><?php echo $b3; ?></textarea>
            <!-- <input class="form-control" placeholder="Enter Content" name="team_content" value="" required> -->
          </div>
        </div>

        <div class="form-group row text-left text-warning">
          <div class="col-sm-3" style="padding-top: 5px;">
            Time:
          </div>
          <div class="col-sm-9">
            <input class="form-control" placeholder="Time" name="time_detail" value="<?php echo $b4; ?>" required>
          </div>
        </div>

        <div class="form-group row text-left text-warning">
          <div class="col-sm-3" style="padding-top: 5px;">
            Platform:
          </div>
          <div class="col-sm-9">
            <input class="form-control" placeholder="Platform" name="platform_detail" value="<?php echo $b5; ?>" required>
          </div>
        </div>

        <div class="form-group row text-left text-warning">
          <div class="col-sm-3" style="padding-top: 5px;">
            Team:
          </div>
          <div class="col-sm-9">
            <input class="form-control" placeholder="Team" name="team_detail" value="<?php echo $b6; ?>" required>
          </div>
        </div>

        <div class="form-group row text-left text-warning">
          <div class="col-sm-3" style="padding-top: 5px;">
            Industry:
          </div>
          <div class="col-sm-9">
            <input class="form-control" placeholder="Industry" name="industry_detail" value="<?php echo $b7; ?>" required>
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