<?php
include '../includes/connection.php';
include '../includes/sidebar.php';
?>

<div class="row show-grid" style="margin-bottom: 19.9rem;">
  <!-- Team -->
  <div class="col-md-3">
    <!-- Team record -->
    <a href="ourteam.php" style="text-decoration: none;">
      <div class="col-md-12 mb-3">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-0">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Our Team</div>
                <div class="h6 mb-0 font-weight-bold text-gray-800">
                  <?php
                  $query = "SELECT COUNT(*) FROM ourteam";
                  $result = mysqli_query($db, $query) or die(mysqli_error($db));
                  while ($row = mysqli_fetch_array($result)) {
                    echo "$row[0]";
                  }
                  ?> Record(s)
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>

    <!-- Services record -->
    <a href="">
      <div class="col-md-12 mb-3">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-0">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Services</div>
                <div class="h6 mb-0 font-weight-bold text-gray-800">
                  <?php
                  $query = "SELECT COUNT(*) FROM services";
                  $result = mysqli_query($db, $query) or die(mysqli_error($db));
                  while ($row = mysqli_fetch_array($result)) {
                    echo "$row[0]";
                  }
                  ?> Record(s)
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-cogs fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Employee record -->
  <div class="col-md-3">
    <!-- Employee record -->
    <div class="col-md-12 mb-3">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-0">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Employees</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">
                <?php
                $query = "SELECT COUNT(*) FROM employee";
                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                while ($row = mysqli_fetch_array($result)) {
                  echo "$row[0]";
                }
                ?> Record(s)
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- User record -->
    <div class="col-md-12 mb-3">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-0">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Registered Accounts</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">
                <?php
                $query = "SELECT COUNT(*) FROM users WHERE TYPE_ID=2";
                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                while ($row = mysqli_fetch_array($result)) {
                  echo "$row[0]";
                }
                ?> Record(s)
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- portfolio ROW -->
  <div class="col-md-3">
    <!-- Portfolio record -->
    <div class="col-md-12 mb-3">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">

            <div class="col mr-0">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Portfolio</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                    <?php
                    $query = "SELECT COUNT(*) FROM portfolio";
                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
                    while ($row = mysqli_fetch_array($result)) {
                      echo "$row[0]";
                    }
                    ?>
                    Record(s)
                  </div>
                </div>
              </div>
            </div>

            <div class="col-auto">
              <i class="fas fa-briefcase fa-2x text-gray-300"></i>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- Client Review -->
    <a href="ourteam.php" style="text-decoration: none;">
      <div class="col-md-12 mb-3">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-0">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Clients Review</div>
                <div class="h6 mb-0 font-weight-bold text-gray-800">
                  <?php
                  $query = "SELECT COUNT(*) FROM clients";
                  $result = mysqli_query($db, $query) or die(mysqli_error($db));
                  while ($row = mysqli_fetch_array($result)) {
                    echo "$row[0]";
                  }
                  ?> Record(s)
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>

  </div>

  <div class="col-md-3">
    <!-- Employee record -->
    <div class="col-md-12 mb-3">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-0">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Category</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">
                <?php
                $query = "SELECT COUNT(*) FROM category";
                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                while ($row = mysqli_fetch_array($result)) {
                  echo "$row[0]";
                }
                ?> Record(s)
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- User record -->
    <!-- <div class="col-md-12 mb-3">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-0">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Registered Accounts</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">
                <?php
                $query = "SELECT COUNT(*) FROM users WHERE TYPE_ID=2";
                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                while ($row = mysqli_fetch_array($result)) {
                  echo "$row[0]";
                }
                ?> Record(s)
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div> -->

  </div>


  <?php
  include '../includes/footer.php';
  ?>