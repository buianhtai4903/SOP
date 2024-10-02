
<!-- Begin Page Content -->
<div class="container-fluid custom-container">


<?php
    include("../admin/controller/clsproductkh.php");
    $productkh = new Clsproductkh();
?>
            <!-- Spham-->
            <div class="sp row">
    <div class="col-md-8 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm</h6>
            </div>
            <?php 
                isset($_GET['id']);
                $id_product = $_GET['id'];
                $productkh->chitietsanpham("SELECT * FROM product WHERE id_product = '$id_product' limit 1");
                $productkh->thongso("SELECT * FROM product_details_dt WHERE id_product = '$id_product' limit 1");
            ?>
        </div>
    </div>
</div>


</div>