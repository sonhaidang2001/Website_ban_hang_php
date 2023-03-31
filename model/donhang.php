<?php
// lấy tất cả đơn hàng đưa lên admin
function getalldonhang()
{
    $conn = connectdb();
    $sql = "SELECT * FROM tb_donhang WHERE 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
// tạo đơn hàng trên client
function taodonhang($madh, $tongdonhang, $pttt, $hoten, $email, $diachi, $sdt)
{
    $conn  = connectdb();
    $sql = "INSERT INTO tb_donhang (madh,tongdh,pttt, hoten,email,diachi,sdt)
    VALUES ('" . $madh . "','" . $tongdonhang . "','" . $pttt . "','" . $hoten . "','" . $email . "','" . $diachi . "','" . $sdt . "')";
    // use exec() because no results are returned
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    return $last_id;
}
// thêm đơn hàng
function addcart($idsp, $iddh, $tensp, $img, $gia, $sl)
{
    $conn  = connectdb();
    $sql = "INSERT INTO tb_giohang (idsp,iddh,tensp, img,gia,sl)
    VALUES ('" . $idsp . "','" . $iddh . "','" . $tensp . "','" . $img . "','" . $gia . "','" . $sl . "')";
    // use exec() because no results are returned
    $conn->exec($sql);
}

// hiện giỏ hàng theo id đơn hàng
function showcart($iddh)
{
    $conn = connectdb();
    $sql = "SELECT * FROM tb_giohang WHERE iddh=" . $iddh;
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
// hiện đơn hàng theo id đơn hàng
function showinfocart($iddh)
{
    $conn = connectdb();
    $sql = "SELECT * FROM tb_donhang WHERE id=" . $iddh;
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}