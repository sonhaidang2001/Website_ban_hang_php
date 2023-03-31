<main class="container p-3">
    <div class="row">
        <div class="col-sm-7 mt-4">
            <a href="index.php" class="btn btn-dark">Tiếp tục mua hàng</a>
            <table class="table table-light mt-2">
                <thead class="thead-light table-dark ">
                    <tr class="text-center ">
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>

                </thead>
                <?php
                if (isset($_SESSION['iddh']) && ($_SESSION['iddh']) > 0) {
                    $getshowcart = showcart($_SESSION['iddh']);
                    if (isset($getshowcart) && (count($getshowcart) > 0)) {
                        $i = 0;
                        $tong = 0;
                        foreach ($getshowcart as $sp) {
                            $tt = $sp['gia'] * $sp['sl'];
                            $tong += $tt;
                            echo '<tbody class="text-center table-secondary ">
                        <tr >
                            <td>' . ($i + 1) . '</td>
                            <td>' . $sp['tensp'] . '</td>
                            <td><img src="./uploads/' . $sp['img'] . '" width="70px"></td>
                            <td>' . $sp['gia'] . '</td>
                            <td>' . $sp['sl'] . '</td>
                            <td>' . $tt . '</td>                           
                        </tr>        
                    </tbody>';
                            $i++;
                        };
                    }
                } else {
                    echo '
                    <p>Giỏ hàng trống!  <a href="index.php" class="btn btn-dark">Tiếp tục mua hàng</a></p>            
                    ';
                }
                ?>
            </table>
        </div>
        <div class="col-sm-5">
            <?php
            if (isset($_SESSION['iddh']) && ($_SESSION['iddh']) > 0) {
                $showinfocart = showinfocart($_SESSION['iddh']);
                if (isset($showinfocart) && count($showinfocart) > 0) {
            ?>

            <h2 class="mb-4 text-center">THÔNG TIN ĐƠN HÀNG</h2>
            <div class="container card p-2">
                <div class="row">
                    <label for="my-input" class="col-sm-5"><b>ID đơn hàng:</b> </label>
                    <p class="col-sm-7"><?= $showinfocart[0]['id']; ?></p>
                </div>
                <div class="row">
                    <label for="my-input" class="col-sm-5"><b>Mã đơn hàng:</b> </label>
                    <p class="col-sm-7"><?= $showinfocart[0]['madh']; ?></p>
                </div>
                <div class="row">
                    <label for="my-input" class="col-sm-5"><b>Họ và tên:</b> </label>
                    <p class="col-sm-7"><?= $showinfocart[0]['hoten']; ?></p>
                </div>
                <div class="row">
                    <label for="my-input" class="col-sm-5"><b>Địa chỉ:</b> </label>
                    <p class="col-sm-7"><?= $showinfocart[0]['diachi']; ?></p>
                </div>
                <div class="row">
                    <label for="my-input" class="col-sm-5"><b>Email:</b> </label>
                    <p class="col-sm-7"><?= $showinfocart[0]['email']; ?></p>
                </div>
                <div class="row">
                    <label for="my-input" class="col-sm-5"><b>Số điện thoại:</b> </label>
                    <p class="col-sm-7"><?= $showinfocart[0]['sdt']; ?></p>
                </div>
                <div class="row">
                    <label for="my-input" class="col-sm-5"><b>Phương thức thanh toán:</b> </label>
                    <p class="col-sm-7">
                        <?php
                                switch ($showinfocart[0]['pttt']) {
                                    case '1':
                                        $pttt = " Thanh toán khi nhận hàng";
                                        break;
                                    case '2':
                                        $pttt = " Thanh toán qua ví momo";
                                        break;
                                    case '3':
                                        $pttt = " Thanh toán qua tài khoản ngân hàng";
                                        break;
                                    case '4':
                                        $pttt = " Thanh toán online";
                                        break;

                                    default:
                                        $pttt = "Bạn chưa chọn phương thức thanh toán";
                                        break;
                                }
                                echo $pttt;
                                ?>
                    </p>

                </div>
                <div class="row">
                    <label for="my-input" class="col-sm-5"><b>Tổng đơn hàng:</b> </label>
                    <p class="col-sm-7"><?= $showinfocart[0]['tongdh']; ?></p>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>


    </div>
</main>