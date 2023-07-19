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
?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-2 font-weight-bold text-primary">Portfolio&nbsp;<a href="#" data-toggle="modal" data-target="#portfolioModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="3">
        <thead>
          <tr>
            <th>ID</th>
            <th>Cat ID</th>
            <th>Main Image</th>
            <th>Main Content</th>
            <th>Title</th>
            <th>Inner Image</th>
            <th>Inner Content</th>
            <th>Time</th>
            <th>Team</th>
            <th>Industry</th>
            <th>Plateform</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = 'SELECT * FROM portfolio ';
          $result = mysqli_query($db, $query) or die(mysqli_error($db));

          while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['portdetail_id'] . '</td>';
            echo '<td>' . $row['portcat_id'] . '</td>';
            echo '<td><img src="' . '../../' . $row['port_img'] . '" alt="image" width="50px"</td>';
            echo '<td>' . substr($row['port_content'], 0, 40) . '</td>';
            echo '<td>' . $row['portdetail_title'] . '</td>';
            echo '<td><img src="' . $row['portdetail_img'] . '" alt="image" width="50px"</td>';
            echo '<td>' . substr($row['portdetail_content'], 0, 40) . '</td>';
            echo '<td>' . $row['time_detail'] . '</td>';
            echo '<td>' . $row['team_detail'] . '</td>';
            echo '<td>' . $row['industry_detail'] . '</td>';
            echo '<td>' . $row['platform_detail'] . '</td>';
            echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="port_searchfrm.php?action=edit&id=' . $row['portdetail_id'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="port_edit.php?action=edit&id=' . $row['portdetail_id'] . '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="port_del.php?action=delete&id=' . $row['portdetail_id'] . '">
                                    <i class="fas fa-fw fa-trash"></i> Delete
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
            echo '</tr> ';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
include '../includes/footer.php';
?>