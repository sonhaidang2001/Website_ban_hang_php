<main class="container-fluid pl-4 pr-4">
    <h1 class="p-3 text-center">CẬP NHẬT DANH MỤC</h1>
    <!-- <?php echo var_dump($kqone); ?> -->
    <div class="row">
        <div class="card p-2 bg-dark">
            <form action="index.php?act=suadm" method="post" class="mb-2 ">
                <div class="form-group">
                    <label for="my-input" class="text-white">Danh mục:</label>
                    <input id="my-input" class="form-control " type="text" name="tendm"
                        value="<?= $kqone[0]['tendm'] ?>">>
                </div>
                <div class="form-group">
                    <label for="my-input" class="text-white">Ưu tiên:</label>
                    <input id="my-input" class="form-control " type="text" name="uutien"
                        value="<?= $kqone[0]['uutien'] ?>">
                </div>
                <div class="form-group">
                    <label for="my-input" class="text-white">Hiện thị:</label>
                    <input id="my-input" class="form-control " type="text" name="hienthi"
                        value="<?= $kqone[0]['hienthi'] ?>">
                </div>
                <input type="hidden" name="id" value="<?= $kqone[0]['id'] ?>">
                <input type="submit" name="capnhat" value="Cập nhật" class="btn  btn-outline-light col-sm-12">
            </form>
        </div>
        <!-- <form action="index.php?act=suadm" method="post" class="mb-2 ">
            <div class="form-group">
                <label for="my-input">Danh mục:</label>
                <input id="my-input" class="form-control btn-outline-dark" type="text" name="tendm"
                    value="<?= $kqone[0]['tendm'] ?>">
            </div>
            <div class="form-group">
                <label for="my-input">Ưu tiên:</label>
                <input id="my-input" class="form-control btn-outline-dark" type="text" name="uutien"
                    value="<?= $kqone[0]['uutien'] ?>">
            </div>
            <div class="form-group">
                <label for="my-input">Hiện thị:</label>
                <input id="my-input" class="form-control btn-outline-dark" type="text" name="hienthi"
                    value="<?= $kqone[0]['hienthi'] ?>">
            </div>

            <input type="hidden" name="id" value="<?= $kqone[0]['id'] ?>">
            <input type="submit" name="capnhat" value="Cập nhật" class="btn btn-dark col-sm-12">
        </form> -->
        <table class="table table-light w-75 col-sm-9 mx-auto">
            <thead class="thead-dark text-center">
                <tr class="">
                    <th>STT</th>
                    <th>Danh mục</th>
                    <th>Ưu tiên</th>
                    <th>Hiển thị</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <?php
            //  echo var_dump($kq); 
            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $dm) {
                    echo '<tbody class="table table-secondary table-hover">
                        <tr class="text-center">
                            <td>' . $i . '</td>
                            <td>' . $dm['tendm'] . '</td>
                            <td>' . $dm['uutien'] . '</td>
                            <td>' . $dm['hienthi'] . '</td>
                            <td>
                            <a href="index.php?act=suadm&id=' . $dm['id'] . '" style="text-decoration: none;" class="btn btn-dark">Sửa</a>
                            <a href="index.php?act=xoadm&id=' . $dm['id'] . '" class="btn btn-dark">Xóa</a>
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