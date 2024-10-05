<?php 
    function showcart ()
    {
        if(isset($_SESSION['cart']) && (is_array($_SESSION['cart'])))
        {
            $sum_price = 0;
            for($i = 0 ;$i < sizeof($_SESSION['cart']); $i++)
            {
                $sum_price = +$_SESSION['cart'][$i][2];
                echo '<tr></tr><td>'.($i+1).'</td>
                      <td><img src="../img/'.$_SESSION['cart'][$i][1].'" alt="" width="30px" height="30px"></td>
                      <td>'.$_SESSION['cart'][$i][0].'</td>
                      <td>'.number_format($_SESSION['cart'][$i][2], 0, ',', '.').' VNĐ</td>';
                echo '<td>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="item_index" value="' . $i . '">
                            <input type="submit" name="btn-delete" value="Xóa" class="btn btn-danger btn-sm">
                        </form>
                    </td></tr>';
            }
            echo '<tfoot>
                    <tr>
                        <th colspan="4"><div>Tổng tiền</div></th>
                        <th>'.number_format($sum_price,0,',','.').'VNĐ</th>
                    </tr>
                </tfoot>';
        }
        else
        {
            echo 'Bạn chưa lựa gì à';
        }
    }
?>
<!-- Begin Page Content -->
<div class="container-fluid d-flex justify-content-center">
<?php
    include("../admin/controller/clsproduct.php");
    $product = new Clsproduct();

    if (isset($_POST['btn-delete'])) {
        $item_index = $_POST['item_index'];
        if (isset($_SESSION['cart'][$item_index])) {
            unset($_SESSION['cart'][$item_index]); 
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo '<script>alert("Sản phẩm đã được xóa khỏi giỏ hàng.");</script>';
        }
    }
?>
<div class="card shadow mb-4" style="width: 60%;">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Giỏ hàng của bạn</h6>
        <form action="" method="post">
            <input class="btn btn-success" type="submit" name="btn-buy" id="btn-buy" value="đặt hàng online">
        </form>
    </div>

    <div class="card-body" >
            <div class="table-responsive ">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Ảnh</th>
                            <th>Tên</th>
                            <th>Giá tiền</th>
                            <th>Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>         
                    <?php 
                        showcart();
                        if (isset($_GET['message'])) {
                            echo '<div>' . htmlspecialchars($_GET['message']) . '</div>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>
</div>
<!-- /.container-fluid -->