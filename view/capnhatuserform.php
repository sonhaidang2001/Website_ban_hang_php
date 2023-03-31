<main class="container p-3 mx-auto">
    <h2 class="text-center mb-3">Cập nhật thông tin khách hàng</h2>
    <div class="card w-50 mx-auto">
        <div class="card-body ">
            <?php
            if (isset($kq)) {
            ?>
            <form action="index.php?act=capnhatuser" method="POST">
                <div class="form-group mb-2">
                    <label for="my-input"><b>Họ tên:</b></label>
                    <input id="my-input" class="form-control" type="text" name="hoten" value="<?= $kq[0]['hoten']; ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="my-input"><b>Số điện thoại:</b></label>
                    <input id="my-input" class="form-control" type="text" name="sdt" value="<?= $kq[0]['sdt']; ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="my-input"><b>Email:</b></label>
                    <input id="my-input" class="form-control" type="text" name="email" value="<?= $kq[0]['email']; ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="my-input"><b>User:</b></label>
                    <input id="my-input" class="form-control" type="text" name="user" value="<?= $kq[0]['user']; ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="my-input"><b>Password:</b></label>
                    <input id="my-input" class="form-control" type="text" name="pass" value="<?= $kq[0]['pass']; ?>">
                </div>
                <input type="hidden" name="id" value="<?= $kq[0]['id'] ?>">
                <input type="submit" name="capnhat" value="Cập nhật" class="btn btn-dark">
            </form>
            <?php } ?>
        </div>
    </div>
</main>