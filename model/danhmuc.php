<?php
// lấy tất cả danh mục
function getalldm()
{
    $conn  = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tb_danhmuc");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

// lấy một danh mục theo id
function getonedm($id)
{
    $conn  = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tb_danhmuc WHERE id=" . $id);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

// thêm danh mục vào admin và csdl
function adddm($tendm, $uutien, $hienthi)
{
    $conn  = connectdb();
    $sql = "INSERT INTO tb_danhmuc (tendm,uutien,hienthi)
    VALUES ('" . $tendm . "','" . $uutien . "','" . $hienthi . "')";
    // use exec() because no results are returned
    $conn->exec($sql);
}
// xóa một danh mục theo id
function deldm($id)
{
    $conn  = connectdb();
    $sql = "DELETE FROM tb_danhmuc WHERE id=" . $id;
    $conn->exec($sql);
}
// cập nhật danh mục theo id 
function updatedm($id, $tendm, $uutien, $hienthi)
{
    $conn  = connectdb();
    $sql = "UPDATE tb_danhmuc SET tendm='" . $tendm . "',uutien='" . $uutien . "',hienthi='" . $hienthi . "' WHERE id=" . $id;

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
}