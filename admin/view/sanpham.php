<main class="container p-3">
    <h1 class="text-center">SẢN PHẨM</h1>
    <div class="container-fluid mb-2">
        <div class="card row p-4 bg-dark">
            <form action="index.php?act=themsp" method="POST" class="mb-2 col-12 mx-auto" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="my-select" class="text-light">Danh mục:</label>
                            <select id="my-select" class="form-control" name="iddm">
                                <option value="0">Chon danh muc</option>
                                <?php
                                if (isset($dsdm)) {
                                    foreach ($dsdm as $dm) {
                                        echo ' <option value="' . $dm['id'] . '">' . $dm['tendm'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="my-select" class="text-light">Tên sản phẩm:</label>
                            <input id="my-input" class="form-control" type="text" name="tensp">
                        </div>
                        <div class="form-group">
                            <label for="my-select" class="text-light">Hình ảnh:</label>
                            <input id="my-input" class="form-control" type="file" name="img">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="my-select" class="text-light">Giá:</label>
                            <input id="my-input" class="form-control" type="text" name="gia">
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="my-select" class="text-light">New:</label>
                                <input id="my-input" class="form-control" type="text" name="new">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="my-select" class="text-light">View:</label>
                                <input id="my-input" class="form-control" type="text" name="view">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="my-select" class="text-light">Đặc biệt:</label>
                            <input id="my-input" class="form-control" type="text" name="db">
                        </div>


                        <input type="submit" name="themmoi" value="Thêm mới"
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
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>New</th>
                    <th>View</th>
                    <th>Đặc biệt</th>
                    <th>Hành động</th>
                </tr>
            </thead>
        </thead>
        <?php
        if (isset($kq) && (count($kq) > 0)) {
            $i = 1;
            foreach ($kq as $sp) {
                echo '<tbody class="table table-secondary table-hover">
                        <tr class="text-center">
                            <td>' . $i . '</td>
                            <td>' . $sp['tensp'] . '</td>
                            <td><img src="' . $sp['img'] . '" width="40px"></td>
                            <td>' . $sp['gia'] . '</td>
                            <td>' . $sp['new'] . '</td>
                            <td>' . $sp['view'] . '</td>
                            <td>' . $sp['db'] . '</td>
                            <td>
                                <a href="index.php?act=suasp&id=' . $sp['id'] . '" class="btn btn-dark">Sửa</a>
                                <a href="index.php?act=xoasp&id=' . $sp['id'] . '" class="btn btn-dark">Xóa</a>
                            </td>
                        </tr>
                    </tbody>';
                $i++;
            }
        }
        ?>
    </table>
</main>