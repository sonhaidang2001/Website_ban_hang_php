<?php
// lấy danh sách sản phẩm theo danh mục
function getallsp($iddm = 0)
{
    $conn = connectdb();
    $sql = "SELECT * FROM tb_sanpham WHERE 1";
    if ($iddm > 0) $sql .= " AND iddm=" . $iddm;
    $sql .= " order by id DESC ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

// lấy một sản phẩm theo id
function getonesp($id)
{
    $conn  = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tb_sanpham WHERE id=" . $id);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

// thêm sản phẩm vào client và admin - cơ sở dữ liệu
function inser_product($iddm, $tensp, $gia, $img, $new, $view, $db)
{
    $conn  = connectdb();
    $sql = "INSERT INTO tb_sanpham (iddm, tensp,gia, img,new,view,db)
    VALUES ('" . $iddm . "','" . $tensp . "','" . $gia . "','" . $img . "','" . $new . "','" . $view . "','" . $db . "')";
    // use exec() because no results are returned
    $conn->exec($sql);
}

// xóa một sản phẩm theo id
function delsp($id)
{
    $conn  = connectdb();
    $sql = "DELETE FROM tb_sanpham WHERE id=" . $id;
    $conn->exec($sql);
}

// cập nhật sản phẩm theo id
function updatesp($id, $tensp, $img, $gia, $iddm, $new, $view, $db)
{
    $conn  = connectdb();
    if ($img == "") {
        $sql = "UPDATE tb_sanpham SET tensp='" . $tensp . "', gia='" . $gia . "', iddm='" . $iddm . "', new='" . $new . "' , view='" . $view . "' , db='" . $db . "' WHERE id=" . $id;
    } else {
        $sql = "UPDATE tb_sanpham SET tensp='" . $tensp . "', gia='" . $gia . "', img='" . $img . "', iddm='" . $iddm . "', new='" . $new . "' , view='" . $view . "' , db='" . $db . "' WHERE id=" . $id;
    }

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
}

// Hiện danh sách sản phẩm
function showproduct($ds)
{
    foreach ($ds as $sp) {
        echo ' <div class="col mb-5">
                    <div class="card h-100">
                       <form action="index.php?act=addcart" method="post">
                            <!-- Product image-->
                            <a href="index.php?act=spct&id=' . $sp['id'] . '">
                            <img class="card-img-top" src="./uploads/' . $sp['img'] . '" alt="..." />
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">' . $sp['tensp'] . '</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    ' . $sp['gia'] . '
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><input class="btn btn-outline-dark mt-auto" type="submit" value="Add to cart" name="addcart"> </div>
                            </div>
                            
                            <input type="hidden" name="id"  id="" value="' . $sp['id'] . '">
                            <input type="hidden" name="tensp"  id="" value="' . $sp['tensp'] . '">
                            <input type="hidden" name="img"  id="" value="' . $sp['img'] . '">
                            <input type="hidden" name="gia"  id="" value="' . $sp['gia'] . '">
                       </form>
                    </div>
   </div>';
    }
}

// lấy một sản phẩm đặc biệt
function getonesp_special()
{
    $conn  = connectdb();
    $sql = "SELECT * FROM tb_sanpham WHERE db=1 order by id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
// lấy danh sách có nhiều lượt xem
function getallsp_view($view)
{
    $conn = connectdb();
    $sql = "SELECT * FROM tb_sanpham WHERE view=" . $view;
    if ($view == 1)
        $sql .= " order by view  limit 4";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
// lấy danh sách sản phẩm mới
function getallsp_new($new)
{
    $conn = connectdb();
    $sql = "SELECT * FROM tb_sanpham WHERE new=" . $new;
    if ($new == 1)
        $sql .= " order by new  limit 4";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}