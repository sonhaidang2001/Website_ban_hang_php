<main class="container p-3">
    <h1 class="text-center">CẬP NHẬT KHÁCH HÀNG</h1>
    <div class="container-fluid mb-2">
        <div class="card row p-4 bg-dark">
            <form action="index.php?act=suakh" method="POST" class="mb-2 col-12 mx-auto" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="my-select" class="text-light">Họ tên:</label>
                            <input id="my-input" class="form-control" type="text" name="hoten"
                                value="<?= $kqone[0]['hoten'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="my-select" class="text-light">Số điện thoại:</label>
                            <input id="my-input" class="form-control" type="text" name="sdt"
                                value="<?= $kqone[0]['sdt'] ?>">
                        </div>
                        <div class="form-group ">
                            <label for="my-select" class="text-light">Email:</label>
                            <input id="my-input" class="form-control" type="text" name="email"
                                value="<?= $kqone[0]['email'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group ">
                            <label for="my-select" class="text-light">User:</label>
                            <input id="my-input" class="form-control" type="text" name="user"
                                value="<?= $kqone[0]['user'] ?>">
                        </div>
                        <div class="form-group ">
                            <label for="my-select" class="text-light">Password:</label>
                            <input id="my-input" class="form-control" type="text" name="pass"
                                value="<?= $kqone[0]['pass'] ?>">
                        </div>
                        <div class="form-group ">
                            <label for="my-select" class="text-light">Role:</label>
                            <input id="my-input" class="form-control" type="text" name="role"
                                value="<?= $kqone[0]['role'] ?>">
                        </div>

                        <input type="hidden" name="id" value="<?= $kqone[0]['id'] ?>">

                        <input type="submit" name="capnhat" value="Cập nhật"
                            class="btn btn-outline-light d-block ml-auto">
                    </div>
                </div>


            </form>
        </div>
    </div>

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