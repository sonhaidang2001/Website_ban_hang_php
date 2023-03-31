<?php
// kiểm tra user
function checkuser($user, $pass)
{
    $conn = connectdb();
    //cbi thuc thi va tra 1 doi tuong
    $stmt = $conn->prepare("SELECT * FROM tb_user WHERE user='" . $user . "' AND pass='" . $pass . "' ");
    //thuc thi cau lenh da cbi
    $stmt->execute();

    //Tra 1 mang va luu vao bien kq
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    if (count($kq) > 0) return $kq[0]['role'];
    else return 0;
}

// lấy tất cả tb_user đưa lên admin
function getalluser()
{
    $conn  = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tb_user");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

// lấy một user theo id
function getoneuser($id)
{
    $conn  = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tb_user WHERE id=" . $id);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

// Xóa một user theo id
function deluser($id)
{
    $conn  = connectdb();
    $sql = "DELETE FROM tb_user WHERE id=" . $id;
    $conn->exec($sql);
}

// cập nhật thông tin user
function updateuser($id, $hoten, $sdt, $email, $user, $pass, $role)
{
    $conn  = connectdb();
    $sql = "UPDATE tb_user SET hoten='" . $hoten . "',sdt='" . $sdt . "',email='" . $email . "',user='" . $user . "',pass='" . $pass . "' ,role='" . $role . "'WHERE id=" . $id;

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
}
// thêm thông tin user vào admin - csdl
function inser_user($hoten, $sdt, $email, $user, $pass)
{
    $conn  = connectdb();
    $sql = "INSERT INTO tb_user (hoten, sdt,email, user,pass)
    VALUES ('" . $hoten . "','" . $sdt . "','" . $email . "','" . $user . "','" . $pass . "')";
    // use exec() because no results are returned
    $conn->exec($sql);
}

// lấy thông tin user
function getuserinfo($user, $pass)
{
    $conn = connectdb();
    //cbi thuc thi va tra 1 doi tuong
    $stmt = $conn->prepare("SELECT * FROM tb_user WHERE user='" . $user . "' AND pass='" . $pass . "' ");
    //thuc thi cau lenh da cbi
    $stmt->execute();

    //Tra 1 mang va luu vao bien kq
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}