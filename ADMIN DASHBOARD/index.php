<?php
session_start();
include 'header.php';
include 'conn.php';
$sqlSelectProd = "SELECT * FROM `products`,category WHERE category.c_id = products.c_id";
$res = mysqli_query($conn,$sqlSelectProd);
$sqlProdCount = "SELECT COUNT(*) FROM `products`";
$res2 = mysqli_query($conn,$sqlProdCount);
$ProdCount=mysqli_fetch_array($res2);
if(!$_SESSION['e']){
  echo "<script>
    window.location.href = 'pages/samples/login.php';
  </script>";
}else{
?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome <?php echo  $_SESSION['n']; ?></h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span
                      class="text-primary">3 unread alerts!</span></h6>
                </div>
                <div class="col-12 col-xl-4">
                  <div class="justify-content-end d-flex">
                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                      <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                        <a class="dropdown-item" href="#">January - March</a>
                        <a class="dropdown-item" href="#">March - June</a>
                        <a class="dropdown-item" href="#">June - August</a>
                        <a class="dropdown-item" href="#">August - November</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-4 stretch-card transparent">
              <div class="card card-tale">
                <div class="card-body">
                  <p class="mb-4">Total Products</p>
                  <p class="fs-30 mb-2"><?php echo $ProdCount[0]; ?></p>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">Total Bookings</p>
                  <p class="fs-30 mb-2">61344</p>
                  <p>22.00% (30 days)</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
              <div class="card card-light-blue">
                <div class="card-body">
                  <p class="mb-4">Number of Meetings</p>
                  <p class="fs-30 mb-2">34040</p>
                  <p>2.00% (30 days)</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
              <div class="card card-light-danger">
                <div class="card-body">
                  <p class="mb-4">Number of Clients</p>
                  <p class="fs-30 mb-2">47033</p>
                  <p>0.22% (30 days)</p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">All Products</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                        <th>Product Image</th>
                          <th>Product Name</th>
                          <th>Product Price</th>
                          <th>Product Desc</th>
                          <th>Product Category</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php
                          while($row = mysqli_fetch_array($res)){
                      ?>
                        <tr>
                        <td>
                          <img src="<?php echo 'ProductImages/'.$row[3]; ?>" alt="" width="50" height="50">
                          </td>
                          <td><?php echo $row[1]; ?></td>
                          <td class="font-weight-bold">Rs <?php echo $row[2]; ?></td>
                          <td><?php echo substr($row[4],0,15).'...';  ?></td>
                          <td><?php echo $row[7]; ?></td>
                        </tr>
                       <?php
                          }
                       ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
    <?php
include 'footer.php';
                        }
?>