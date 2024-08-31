<?php
include 'header.php';
include 'conn.php';
$sqlCat = "SELECT * FROM `category`";
$res = mysqli_query($conn, $sqlCat);

if (isset($_POST['prodAdd'])) {
    $pn = $_POST['pn'];
    $pp = $_POST['pp'];
    $pd = $_POST['pd'];
    $cid = $_POST['cid'];

    $imgname = $_FILES['img']['name'];
    $tmpname = $_FILES['img']['tmp_name'];
    $type = $_FILES['img']['type']; // .png .jpg
    $size = $_FILES['img']['size']; // 2mb

    move_uploaded_file($tmpname, 'ProductImages/' . $imgname);

    $sqlProd = "INSERT INTO `products`(`p_name`, `p_price`, `p_img`, `p_desc`, `c_id`) VALUES ('$pn','$pp','$imgname','$pd','$cid')";
    $res2 = mysqli_query($conn, $sqlProd);
    if ($res2) {
        echo "<script>
        window.location.href = 'index.php';
    </script>";
    }
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product form</h4>

                        <form class="forms-sample" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername1"
                                    placeholder="Product Name" name="pn">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Price</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    placeholder="Product Price" name="pp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Product Desc</label>

                                <textarea name="pd" id="" class="form-control"></textarea>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Category</label>

                                <select name="cid" id="" class="form-control">
                                    <?php
                                    while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                        <option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Product Image</label>
                                <input type="file" class="form-control"
                                    id="exampleInputConfirmPassword1" name="img">
                            </div>

                            <button type="submit" class="btn btn-primary mr-2" name="prodAdd">Submit</button>

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