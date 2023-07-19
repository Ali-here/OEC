<!-- Employee select and script -->
<?php
$sqlforjob = "SELECT DISTINCT JOB_TITLE, JOB_ID FROM job order by JOB_ID asc";
$result = mysqli_query($db, $sqlforjob) or die("Bad SQL: $sqlforjob");

$job = "<select class='form-control' name='jobs' required>
        <option value='' disabled selected hidden>Select Job</option>";
while ($row = mysqli_fetch_assoc($result)) {
  $job .= "<option value='" . $row['JOB_ID'] . "'>" . $row['JOB_TITLE'] . "</option>";
}

$job .= "</select>";
?>
<script>
  window.onload = function() {

    // ---------------
    // basic usage
    // ---------------
    var $ = new City();
    $.showProvinces("#province");
    $.showCities("#city");

    // ------------------
    // additional methods 
    // -------------------

    // will return all provinces 
    console.log($.getProvinces());

    // will return all cities 
    console.log($.getAllCities());

    // will return all cities under specific province (e.g Batangas)
    console.log($.getCities("Batangas"));

  }
</script>
<!-- end of Employee select and script -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"><?php echo  $_SESSION['FIRST_NAME']; ?> are you sure do you want to logout?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</div>
<!-- Log out Model End -->

<!-- Our Team Modal-->
<div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Team Member</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="team_addition.php?action=add" enctype="multipart/form-data">
          <div class="form-group">
            <input type="file" class="form-control" name="team_img" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Enter Name" name="team_name" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Enter Role" name="team_role" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Enter Content" name="team_content" required>
          </div>
          <hr>
          <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
          <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Team Model End  -->

<!-- Our client Modal-->
<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Client Review</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="client_addition.php?action=add" enctype="multipart/form-data">
          <div class="form-group">
            <input type="file" class="form-control" name="client_img" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Enter Name" name="client_name" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Enter Role" name="client_role" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Enter Content" name="client_msg" required>
          </div>
          <hr>
          <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
          <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- client Model End  -->

<!-- Category Modal-->
<div class="modal fade" id="catModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="cat_addition.php?action=add" enctype="multipart/form-data">
          <div class="form-group">
            <input class="form-control" placeholder="Enter Name" name="portCat_name" required>
          </div>
          <hr>
          <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
          <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Category Model End  -->


<!-- portfolio Modal-->
<div class="modal fade" id="portfolioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Porfolio</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="port_addition.php?action=add" enctype="multipart/form-data">
          <div class="form-group mb-4">
            <label class="col-md-12 p-0">Category</label>
            <div class="col-md-12 border-bottom p-0">
              <div class="col-md-12 border-bottom">
                <?php
                include('connection.php');
                $sql = "SELECT DISTINCT portCat_name, portCat_id FROM port_Cat order by portCat_name asc";
                $result = mysqli_query($db, $sql) or die("Bad SQL: $sql");

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
          <div class="form-group">
            <input type="file" class="form-control" name="port_img" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" placeholder="Enter Outer Section Content" name="port_content" id="" cols="40" rows="5"></textarea>
            <!-- <input class="form-control" placeholder="Enter Content" name="team_content" required> -->
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Enter Title" name="portdetail_title" required>
          </div>
          <div class="form-group">
            <input type="file" class="form-control" name="portdetail_img" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" placeholder="Enter inner Section Content" name="portdetail_content" id="" cols="40" rows="5"></textarea>
            <!-- <input class="form-control" placeholder="Enter Content" name="team_content" required> -->
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Enter Time" name="time_detail" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Enter plateforms" name="platform_detail" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Enter Team No" name="team_detail" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Enter Industry" name="industry_detail" required>
          </div>
          <hr>
          <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
          <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- PortfolioModel End -->

<!-- Employee Modal-->
<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="emp_transac.php?action=add">
          <div class="form-group">
            <input class="form-control" placeholder="First Name" name="firstname" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Last Name" name="lastname" required>
          </div>
          <div class="form-group">
            <select class='form-control' name='gender' required>
              <option value="" disabled selected hidden>Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Email" name="email" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Phone Number" name="phonenumber" required>
          </div>
          <div class="form-group">
            <?php
            echo $job;
            ?>
          </div>
          <div class="form-group">
            <input placeholder="Hired Date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="FromDate" name="hireddate" class="form-control" />
          </div>
          <div class="form-group">
            <select class="form-control" id="province" placeholder="Province" name="province" required></select>
          </div>
          <div class="form-group">
            <select class="form-control" id="city" placeholder="City" name="city" required></select>
          </div>
          <hr>
          <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
          <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Delete Modal-->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="DeleteModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Are you sure do you want to delete?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger btn-ok">Delete</a>
      </div>
    </div>
  </div>
</div>
<script>
  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

    $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
  });
</script>