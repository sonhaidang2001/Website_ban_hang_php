<main class="container p-3">
    <h1 class="text-center">KHÁCH HÀNG</h1>


    <table class="table table-light">
        <thead class="thead-light">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>User</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Hành động</th>
                </tr>
            </thead>
        </thead>
        <?php
        if (isset($kq) && (count($kq) > 0)) {
            $i = 1;
            foreach ($kq as $kh) {
                echo '<tbody class="table table-secondary table-hover">
                        <tr class="text-center">
                            <td>' . $i . '</td>
                            <td>' . $kh['hoten'] . '</td>
                            <td>' . $kh['sdt'] . '</td>
                            <td>' . $kh['email'] . '</td>
                            <td>' . $kh['user'] . '</td>
                            <td>' . $kh['pass'] . '</td>
                            <td>' . $kh['role'] . '</td>
                            <td>
                                <a href="index.php?act=suakh&id=' . $kh['id'] . '" class="btn btn-dark">Sửa</a>
                                <a href="index.php?act=xoakh&id=' . $kh['id'] . '" class="btn btn-dark">Xóa</a>
                            </td>
                        </tr>
                    </tbody>';
                $i++;
            }
        }
        ?>
    </table>
</main>