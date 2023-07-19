<?php
include '../includes/connection.php';




$query = "SELECT ID, e.FIRST_NAME, e.LAST_NAME, e.GENDER, USERNAME, PASSWORD, e.EMAIL, PHONE_NUMBER, j.JOB_TITLE, e.HIRED_DATE, t.TYPE, l.PROVINCE, l.CITY
                      FROM users u
                      join employee e on u.EMPLOYEE_ID = e.EMPLOYEE_ID
                      join job j on e.JOB_ID=j.JOB_ID
                      join location l on e.LOCATION_ID=l.LOCATION_ID
                      join type t on u.TYPE_ID=t.TYPE_ID
                      WHERE ID = ID";
$result = mysqli_query($db, $query) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result)) {
    $zz = $row['ID'];
    $a = $row['FIRST_NAME'];
    $b = $row['LAST_NAME'];
    $c = $row['GENDER'];
    $d = $row['USERNAME'];
    $e = $row['PASSWORD'];
    $f = $row['EMAIL'];
    $g = $row['PHONE_NUMBER'];
    $h = $row['JOB_TITLE'];
    $i = $row['HIRED_DATE'];
    $j = $row['PROVINCE'];
    $k = $row['CITY'];
    $l = $row['TYPE'];
}
$id = $_GET['id'];
?>

<div class="card shadow mb-4 col-xs-12 col-md-12 border-bottom-primary">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Forget Password</h4>
    </div>
    <div class="card-body">


        <form role="form" method="post" action="settings_edit.php">
            <input type="hidden" name="id" value="<?php echo $zz; ?>" />

            <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                    Password:
                </div>
                <div class="col-sm-9">
                    <input type="password" class="form-control" placeholder="Password" name="password" value="" required>
                </div>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>
        </form>
    </div>
</div>

<?php
// include '../includes/footer.php';
?>