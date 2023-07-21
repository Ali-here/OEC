<?php
include '../includes/connection.php';
include '../includes/sidebar.php';
?>


<div class="">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-4">
        <div class="card-header">
          <h4>How to make Search box & filter data in HTML Table from Database in PHP MySQL </h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-7">

              <form action="" method="GET">
                <div class="input-group mb-3">
                  <input type="text" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                      echo $_GET['search'];
                                                                    } ?>" class="form-control" placeholder="Search data">
                  <button type="submit" class="btn btn-primary">Search</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="card mt-4">
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Listing</th>
                <th>
                  Avg sold price
                </th>
                <th>
                  Sold price range
                </th>
                <th>
                  Avg Shipping
                </th>
                <th>
                  Total Sold
                </th>
                <th>
                  Sell-through
                </th>
                <th>
                  Total Listings
                </th>
                <th>
                  Total item sales
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../includes/connection.php';
              $totalPrice = 0;
              $totalshipping_cost = 0;
              $totalStockout = 0;
              $totalStock = 0;
              $totalRating = 0;
              $totalShippingCostZero = 0;


              if (isset($_GET['search'])) {
                $filtervalues = $_GET['search'];

                $query =
                  "SELECT products.id, products.Title, products.Price, products.Shipping_Cost, products.cat_id, 
                    products.Rating, products.1st_week_Stock, products.2nd_week_Stock, products.3rd_week_Stock,
                    products.4th_week_Stock, products.5th_week_Stock, products.6th_week_Stock, products.7th_week_Stock,
                    products.8th_week_Stock, products.1st_week_stockout, products.2nd_week_stockout, products.3rd_week_stockout,
                    products.4th_week_stockout, products.5th_week_stockout, products.6th_week_stockout, products.7th_week_stockout,
                    products.8th_week_stockout,
                    category.cat_name AS category_title,
                    (SELECT MIN(p.price) FROM products p WHERE p.cat_id = products.cat_id AND p.price IS NOT NULL) AS min_price,
                    (SELECT MAX(p.price) FROM products p WHERE p.cat_id = products.cat_id AND p.price IS NOT NULL) AS max_price
                    FROM products 
                    LEFT JOIN category ON products.cat_id = category.cat_id 
                    WHERE category.cat_name LIKE '%$filtervalues%' AND products.cat_id IS NOT NULL;";




                $query_run = mysqli_query($db, $query);

                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $items) {
                    $id = $items['id'];
                    $title = $items['Title'];
                    $price = $items['Price'];
                    $rating = $items['Rating'];
                    $shipping_cost = $items['Shipping_Cost'];
                    $Week1Stock = $items['1st_week_Stock'];
                    $Week2Stock = $items['2nd_week_Stock'];
                    $Week3Stock = $items['3rd_week_Stock'];
                    $Week4Stock = $items['4th_week_Stock'];
                    $Week5Stock = $items['5th_week_Stock'];
                    $Week6Stock = $items['6th_week_Stock'];
                    $Week7Stock = $items['7th_week_Stock'];
                    $Week8Stock = $items['8th_week_Stock'];
                    $Week1Stockout = $items['1st_week_stockout'];
                    $Week2Stockout = $items['2nd_week_stockout'];
                    $Week3Stockout = $items['3rd_week_stockout'];
                    $Week4Stockout = $items['4th_week_stockout'];
                    $Week5Stockout = $items['5th_week_stockout'];
                    $Week6Stockout = $items['6th_week_stockout'];
                    $Week7Stockout = $items['7th_week_stockout'];
                    $Week8Stockout = $items['8th_week_stockout'];
                    $category = $items['category_title'];
                    $minPrice = $items['min_price'];
                    $maxPrice = $items['max_price'];
                    $totalPrice += $price;
                    $totalshipping_cost += $shipping_cost;
                    $numProducts = mysqli_num_rows($query_run);
                    $averagePrice = $totalPrice / $numProducts;
                    $avergeShipping = $totalshipping_cost / $numProducts;
                    $totalStockout += $Week1Stockout + $Week2Stockout + $Week3Stockout + $Week4Stockout + $Week5Stockout + $Week6Stockout + $Week7Stockout + $Week8Stockout;
                    $totalSoldout = $totalStockout * $totalPrice;
                    $totalStock += $Week1Stock + $Week2Stock + $Week3Stock + $Week4Stock + $Week5Stock + $Week6Stock + $Week7Stock + $Week8Stock;
                    $sellThrough = $totalStockout / $totalStock * 100;
                    $totalRating += $rating;
                    $averageRating = $totalRating / $numProducts;
                    if ($shipping_cost == 0) {
                      $totalShippingCostZero++;
                    }
                    $freeShipping = $totalShippingCostZero / $numProducts * 100;



              ?>
                    <tr>
                      <td><?= $title ?></td>
                      <td>Rs.<?= $price; ?></td>
                      <td>Rs.<?= $price; ?></td>
                      <td>Rs.<?= $shipping_cost; ?></td>
                      <td>Rs.<?= $shipping_cost; ?></td>
                      <td>Rs.<?= $shipping_cost; ?></td>
                      <td>Rs.<?= $shipping_cost; ?></td>
                      <td>Rs.<?= $shipping_cost ?></td>
                      <td>Rs.<?= $totalPrice; ?></td>



                    </tr>
                  <?php
                  }
                } else {
                  ?>
                  <tr>
                    <td colspan="4">No Record Found</td>
                  </tr>
              <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

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
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Average Sold Price</div>
                <div class="h6 mb-0 font-weight-bold text-gray-800">
                  Rs. <?php

                      echo $averagePrice;

                      ?>
                </div>
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
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Sales</div>
                <div class="h6 mb-0 font-weight-bold text-gray-800">
                  Rs. <?php
                      echo $totalSoldout;
                      ?>
                </div>
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
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sold price range</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">
                <?php
                echo "Rs.$maxPrice  - Rs. $minPrice";
                ?>
              </div>
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
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Listings</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">
                <?php
                echo $totalStock;
                ?>
              </div>
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
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Average Shipping Cost</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                    <?php
                    echo $avergeShipping;
                    ?>
                  </div>
                </div>
              </div>
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
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Average Rating</div>
                <div class="h6 mb-0 font-weight-bold text-gray-800">
                  <?php
                  echo $averageRating;
                  ?>
                </div>
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
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sell Through</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">
                <?php
                $roundedUpValue = ceil($sellThrough);
                echo $roundedUpValue;
                ?>%
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12 mb-3">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-0">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Free Shipping</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">
                <?php
                echo $freeShipping;
                ?>%
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php
  include '../includes/footer.php';
  ?>