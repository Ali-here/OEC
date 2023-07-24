<?php
include '../includes/connection.php';
require('session.php');
confirm_logged_in();

$query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = ' . $_SESSION['MEMBER_ID'] . '';
$result = mysqli_query($db, $query);

while ($row = mysqli_fetch_assoc($result)) {
  $Aa = $row['TYPE'];

  if ($Aa == 'User') {

    include '../includes/userSidebar.php';
  } else {
    include '../includes/sidebar.php';
  }
}

$sql = "SELECT DISTINCT TYPE, TYPE_ID FROM type order by TYPE_ID asc";
$result = mysqli_query($db, $sql) or die("Bad SQL: $sql");

$opt = "<select class='form-control' name='type'>
        <option>Select Type</option>";
while ($row = mysqli_fetch_assoc($result)) {
  $opt .= "<option value='" . $row['TYPE_ID'] . "'>" . $row['TYPE'] . "</option>";
}

$opt .= "</select>";
?>
<div class="">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-4">
        <div class="card-header">
          <h4>Research UR Product Insights </h4>
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


  </div>
</div>
<?php
$totalPrice = 0;
$totalshipping_cost = 0;
$totalStockout = 0;
$totalStock = 0;
$totalRating = 0;
$totalShippingCostZero = 0;
$totalWeek1stock = 0;
$week1totalstockout = 0;
$week2totalstockout = 0;
$week3totalstockout = 0;
$week4totalstockout = 0;
$week5totalstockout = 0;
$week6totalstockout = 0;
$week7totalstockout = 0;
$week8totalstockout = 0;


if (isset($_GET['search'])) {
  $filtervalues = $_GET['search'];

  $query =
    "SELECT products.id, products.Title, products.Price, products.Shipping_Cost, products.cat_id, 
    products.Rating, products.url,  products.image, products.1st_week_Stock, products.2nd_week_Stock, products.3rd_week_Stock,
    products.4th_week_Stock, products.5th_week_Stock, products.6th_week_Stock, products.7th_week_Stock,
    products.8th_week_Stock, products.1st_week_stockout, products.2nd_week_stockout, products.3rd_week_stockout,
    products.4th_week_stockout, products.5th_week_stockout, products.6th_week_stockout, products.7th_week_stockout,
    products.8th_week_stockout,
    category.cat_name AS category_title,
    (SELECT MIN(p.price) FROM products p WHERE p.cat_id = products.cat_id AND p.price IS NOT NULL) AS min_price,
    (SELECT MAX(p.price) FROM products p WHERE p.cat_id = products.cat_id AND p.price IS NOT NULL) AS max_price
    FROM products 
    LEFT JOIN category ON products.cat_id = category.cat_id 
    WHERE category.cat_name LIKE '%$filtervalues%' OR products.title LIKE '%$filtervalues%' AND products.cat_id IS NOT NULL;";

  $query_run = mysqli_query($db, $query);

  if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $items) {
      $id = $items['id'];
      $title = $items['Title'];
      $image = $items['image'];
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
      $week1totalstockout += $Week1Stockout;
      $week1Sales = $week1totalstockout * $totalPrice;
      $Week2Stockout = $items['2nd_week_stockout'];
      $week2totalstockout += $Week2Stockout;
      $week2Sales = $week2totalstockout * $totalPrice;
      $Week3Stockout = $items['3rd_week_stockout'];
      $week3totalstockout += $Week3Stockout;
      $week3Sales = $week3totalstockout * $totalPrice;
      $Week4Stockout = $items['4th_week_stockout'];
      $week4totalstockout += $Week4Stockout;
      $week4Sales = $week4totalstockout * $totalPrice;
      $Week5Stockout = $items['5th_week_stockout'];
      $week5totalstockout += $Week5Stockout;
      $week5Sales = $week5totalstockout * $totalPrice;
      $Week6Stockout = $items['6th_week_stockout'];
      $week6totalstockout += $Week6Stockout;
      $week6Sales = $week6totalstockout * $totalPrice;
      $Week7Stockout = $items['7th_week_stockout'];
      $week7totalstockout += $Week7Stockout;
      $week7Sales = $week7totalstockout * $totalPrice;
      $Week8Stockout = $items['8th_week_stockout'];
      $week8totalstockout += $Week8Stockout;
      $week8Sales = $week8totalstockout * $totalPrice;
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
      $avgSoldout = $totalSoldout / $numProducts;
      $totalStock += $Week1Stock + $Week2Stock + $Week3Stock + $Week4Stock + $Week5Stock + $Week6Stock + $Week7Stock + $Week8Stock;
      $sellThrough = $totalStockout / $totalStock * 100;
      $totalRating += $rating;
      $averageRating = $totalRating / $numProducts;
      if ($shipping_cost == 0) {
        $totalShippingCostZero++;
      }
      $freeShipping = $totalShippingCostZero / $numProducts * 100;
    }
?>
    <div class="row show-grid" style="margin-top: 34px;">
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
                      Rs. <?php echo $averagePrice; ?>
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
                      Rs. <?php echo $totalSoldout; ?>
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
                    <?php echo "Rs.$maxPrice  - Rs. $minPrice"; ?>
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
                    <?php echo $totalStock; ?>
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
                        <?php echo $avergeShipping; ?>
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
                      <?php echo $averageRating; ?>
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
                    <?php echo ceil($sellThrough); ?>%
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
                    <?php echo $freeShipping; ?>%
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    // Create arrays to store data for each week
    $weeksData = array();
    for ($i = 1; $i <= 8; $i++) {
      $weeksData[0][] = $i; // Add the week number as the X-axis label
      $weeksData[1][] = $averagePrice; // Sample data for Average Sold Price
      $weeksData[2][] = $week1Sales; // Sample data for Total Sales
      $weeksData[2][] = $week2Sales;
      $weeksData[2][] = $week3Sales;
      $weeksData[2][] = $week4Sales;
      $weeksData[2][] = $week5Sales;
      $weeksData[2][] = $week6Sales;
      $weeksData[2][] = $week7Sales;
      $weeksData[2][] = $week8Sales;
    }
    ?>

    <div class="col-md-12">
      <canvas id="priceRangeChart" style="width: 100%; height: 100%; " height="400"></canvas>
    </div>

    <!-- Previous JavaScript code ... -->

    <!-- Add this JavaScript code to create the Chart.js line graph -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      var ctx = document.getElementById('priceRangeChart').getContext('2d');

      var data = {
        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7', 'Week 8'],
        datasets: [{
            label: 'Average Sold Price',
            data: [<?= implode(',', $weeksData[1]) ?>],
            borderColor: getRandomColor(),
            fill: false
          },
          {
            label: 'Total Sales',
            data: [<?= implode(',', $weeksData[2]) ?>],
            borderColor: getRandomColor(),
            fill: false
          }
        ]
      };

      var options = {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Price Range'
            }
          },
          x: {
            title: {
              display: true,
              text: 'Weeks'
            }
          }
        }
      };

      var priceRangeChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
      });

      function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
          color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
      }
    </script>




    <div class="col-md-12" id="2ndpart">
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
                  Total item sales
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($query_run as $items) {
                $title = $items['Title'];
                $price = $items['Price'];
                $rating = $items['Rating'];
                $image = $items['image'];
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
                $url = $items['url'];

                $totalStockout = $Week1Stockout + $Week2Stockout + $Week3Stockout + $Week4Stockout + $Week5Stockout + $Week6Stockout + $Week7Stockout + $Week8Stockout;
                $totalStock = $Week1Stock + $Week2Stock + $Week3Stock + $Week4Stock + $Week5Stock + $Week6Stock + $Week7Stock + $Week8Stock;
                $sellThrough = ($totalStockout / $totalStock) * 100;

                $minPrice = $items['min_price'];
                $maxPrice = $items['max_price'];
              ?>
                <tr>
                  <td>
                    <div class="row">
                      <div class="col-md-3">
                        <img src="../../assets/img/products/<?= $image ?>" alt="Product Image" style="width: 76px;">
                      </div>
                      <div class="col-md-9">
                        <a href="<?= $url ?>">
                          <?= $title ?>
                        </a>
                      </div>
                    </div>
                  </td>
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
            }
          }
          ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <?php
    // ... The rest of your PHP code ...
    include '../includes/footer.php';
    ?>