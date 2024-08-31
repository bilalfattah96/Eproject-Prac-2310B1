<?php
include 'header.php';
include 'conn.php';
if (isset($_POST['addCat'])) {
    $cn = $_POST['catName'];
    $sql = "INSERT INTO `category`( `c_name`) VALUES ('$cn')";
    $res =  mysqli_query($conn, $sql);
    if ($res) {
        // header('location: add_product.php');
        echo "<script>
    window.location.href = 'add_product.php';
</script>";
    }
}

if (isset($_POST['addBrand'])) {
    
}
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category</h4>

                        <form class="forms-sample" method="post">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Category Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername1"
                                    placeholder="Category Name" name="catName">
                            </div>


                            <button type="submit" class="btn btn-primary mr-2" name="addCat">Add Category</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Brands</h4>

                        <form class="forms-sample" method="post">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Brands Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername1"
                                    placeholder="Category Name" name="catName">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Category</label>

                                <select name="cid" id="" class="form-control">
                                   <option value="">Cosmetic</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2" name="addBrand">Add Category</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller --> Bootstrap admin template

<!-- plugins:js -->
<?php
include 'script.php';
?>
</body>

</html>