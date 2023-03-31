<main class="container p-3 mx-auto">

    <h2 class="text-center mb-3">Thông tin khách hàng</h2>
    <div class="card w-50 mx-auto">
        <div class="card-body">
            <?php
            if (isset($kq)) {
            ?>
            <table class="table ">
                <tbody>
                    <tr>
                        <th>Họ tên:</th>
                        <td><?= $kq[0]['hoten']; ?></td>
                    </tr>
                    <tr>
                        <th>Số điện thoại:</th>
                        <td><?= $kq[0]['sdt']; ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?= $kq[0]['email']; ?></td>
                    </tr>
                    <tr>
                        <th>User:</th>
                        <td><?= $kq[0]['user']; ?></td>
                    </tr>
                    <tr>
                        <th>Password:</th>
                        <td><?= $kq[0]['pass']; ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="index.php?act=suauser&id=' . $k1[0]['id'] . '" style="text-decoration: none;"
                class="btn btn-dark">Sửa</a>
            <?php } ?>
        </div>
    </div>
</main>