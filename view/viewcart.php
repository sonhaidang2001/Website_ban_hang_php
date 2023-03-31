<main class="container p-3">
    <div class="row">
        <div class="col-sm-8 mt-4">
            <a href="index.php" class="btn btn-dark">Tiếp tục mua hàng</a>
            <a href="index.php?act=delcart" class="btn btn-dark">Xóa giỏ hàng</a>
            <a href="index.php?act=thanhtoan" class="btn btn-dark">Đơn hàng</a>
            <!-- <h1 class="text-center">GIỎ HÀNG</h1> -->
            <!-- <?php echo var_dump($_SESSION['giohang']); ?> -->
            <table class="table table-light mt-2">
                <thead class="thead-light table-dark ">
                    <tr class="text-center ">
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Hành động</th>
                    </tr>

                </thead>
                <?php
                if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                    $i = 0;
                    $tong = 0;
                    foreach ($_SESSION['giohang'] as $sp) {
                        $tt = $sp[3] * $sp[4];
                        $tong += $tt;
                        echo '<tbody class="text-center table-secondary ">
                        <tr >
                            <td>' . ($i + 1) . '</td>
                            <td>' . $sp[1] . '</td>
                            <td><img src="./uploads/' . $sp[2] . '" width="70px"></td>
                            <td>' . $sp[3] . '</td>
                            <td>' . $sp[4] . '</td>
                            <td>' . $tt . '</td>
                            <td>
                                <a href="index.php?act=delcart&id=' . $i . '" class="btn btn-dark">Xóa</a>
                            </td>
                        </tr>        
                    </tbody>';
                        $i++;
                    }
                    echo '  <tfoot id="tong">
                        <tr>
                            <th colspan="7">Tổng: ' . $tong . '</th>
                        </tr>
                    </tfoot>';
                }
                ?>
            </table>
        </div>
        <div class="col-sm-4">
            <h2>THÔNG TIN ĐẶT HÀNG</h2>
            <form action="index.php?act=thanhtoan" method="post">
                <div class="form-group mb-2">
                    <label for="my-input">Họ và tên:</label>
                    <input id="my-input" class="form-control" type="text" name="hoten">
                </div>
                <div class="form-group mb-2">
                    <label for="my-input">Địa chỉ:</label>
                    <input id="my-input" class="form-control" type="text" name="diachi">
                </div>
                <div class="form-group mb-2">
                    <label for="my-input">Email:</label>
                    <input id="my-input" class="form-control" type="text" name="email">
                </div>
                <div class="form-group mb-2">
                    <label for="my-input">Số điện thoại:</label>
                    <input id="my-input" class="form-control" type="text" name="sdt">
                </div>
                <h5>Phương thức thanh toán</h5>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="pttt" id="" value="1">
                        Thanh toán khi nhận hàng
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="pttt" id="" value="2">
                        Thanh toán qua ví momo
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="pttt" id="" value="3">
                        Thanh toán qua tài khoản ngân hàng
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="pttt" id="" value="4">
                        Thanh toán online
                    </label>
                </div>
                <input type="submit" value="Đặt hàng" class="btn btn-dark" name="thanhtoan">
                <input type="hidden" name="tongdonhang" value="<?= $tong ?>">
            </form>
        </div>
    </div>
</main>