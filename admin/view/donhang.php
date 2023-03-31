<main class="container-fluid pl-4 pr-4">
    <h1 class="p-3 text-center">ĐƠN HÀNG</h1>
    <div class="row">
        <table class="table table-light mx-auto col-sm-12">
            <thead class="thead-dark  align-item-center">
                <tr class="text-center">
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Phương thức TT</th>
                    <th>Tổng đơn hàng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <?php
            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $dh) {
                    echo '<tbody class="table table-secondary table-hover">
                            <tr class="text-center">
                                <td>' . $i . '</td>
                                <td>' . $dh['hoten'] . '</td>
                                <td>' . $dh['email'] . '</td>
                                <td>' . $dh['diachi'] . '</td>
                                <td>' . $dh['sdt'] . '</td>
                                <td>' . $dh['pttt'] . '</td>
                                <td>' . $dh['tongdh'] . '</td>
                                <td>
                                    <a href="index.php?act=suadm&id=' . $dh['id'] . '" style="text-decoration: none;" class="btn btn-dark">Sửa</a>
                                    <a href="index.php?act=xoadh&id=' . $dh['id'] . '" class="btn btn-dark">Xóa</a>
                                </td>
                            </tr>
                        </tbody>';
                    $i++;
                }
            }
            ?>
        </table>
    </div>

</main>