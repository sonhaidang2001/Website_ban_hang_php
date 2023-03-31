<?php
session_start();
ob_start();
// các model
include "../model/connect.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/user.php";
include "../model/donhang.php";

include "view/header.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'danhmuc':
            // lấy tất cả danh mục
            $kq = getalldm();
            include "view/danhmuc.php";
            break;
        case 'themdm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $_tendm = $_POST['tendm'];
                $_uutien = $_POST['uutien'];
                $_hienthi = $_POST['hienthi'];
                // chèn danh mục vào admin và csdl
                adddm($_tendm, $_uutien, $_hienthi);
            }
            // hiện lại lại danh mục 
            $kq = getalldm();
            include "view/danhmuc.php";
            break;
        case 'xoadm':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                // xóa một một danh mục theo
                deldm($id);
            }
            $kq = getalldm();
            include "view/danhmuc.php";
            break;
        case 'suadm':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                // //Lấy 1 phần tử
                $kqone = getonedm($id);
                //Lấy all phần tử
                $kq = getalldm();
                include "view/danhmucform.php";
            }
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $tendm = $_POST['tendm'];
                $uutien = $_POST['uutien'];
                $hienthi = $_POST['hienthi'];
                // cập nhât danh mục theo id
                updatedm($id, $tendm, $uutien, $hienthi);
                $kq = getalldm();
                include "view/danhmuc.php";
            }
            break;

        case 'sanpham':
            //lay dsdm
            $dsdm = getalldm();
            //lay ds san pham
            $kq = getallsp();
            include "view/sanpham.php";
            break;
        case 'themsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $gia = $_POST['gia'];
                $new = $_POST['new'];
                $view = $_POST['view'];
                $db = $_POST['db'];

                //upload file ảnh
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                $img = $target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    $uploadOk = 0;
                }
                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                // thêm sản phẩm 
                inser_product($iddm, $tensp, $gia, $img, $new, $view, $db);
            }
            $dsdm = getalldm();
            //hiện lại danh sách sản phẩm sau khi thêm sản phẩm hoàn tất
            $kq = getallsp();
            include "view/sanpham.php";
            break;
        case 'xoasp':
            // lấy danh sách danh mục
            $dsdm = getalldm();
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                // xóa sản phẩm theo id
                delsp($id);
                $kq = getallsp();
                include "view/sanpham.php";
                break;
            }
        case 'suasp':
            // lấy danh sách danh mục
            $dsdm = getalldm();
            if (isset($_GET['id'])) {
                $kqone = getonesp($_GET['id']);
                $kq = getallsp();
                include "view/sanphamform.php";
                break;
            }
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $gia = $_POST['gia'];
                $iddm = $_POST['iddm'];
                $new = $_POST['new'];
                $view = $_POST['view'];
                $db = $_POST['db'];
                if ($_FILES["img"]["name"] != "") {
                    $target_dir = "../uploads/";
                    $target_file =  $target_dir . basename($_FILES["img"]["name"]);
                    $img = $target_file;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    if (
                        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif"
                    ) {
                        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                } else {
                    $img = "";
                }
                // cập nhật sản phẩm theo id
                updatesp($id, $tensp, $img, $gia, $iddm, $new, $view, $db);
                $kq = getallsp();
                include "view/sanpham.php";
                break;
            }

        case 'donhang':
            $kq = getalldonhang();
            include "view/donhang.php";
            break;
        case 'khachhang':
            // lấy danh sách khách hàng
            $kq = getalluser();
            include "view/khachhang.php";
            break;
        case 'xoakh':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                // xóa khách hàng theo id
                deluser($id);
            }
            // hiện  lại danh sách khách hàng sau khi xóa
            $kq = getalluser();
            include "view/khachhang.php";
            break;
        case 'suakh':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                // lấy thông tin một khách hàng theo id
                $kqone = getoneuser($id);
                //Lấy danh sách khách hàng
                $kq = getalluser();
                include "view/khachhangform.php";
            }
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $hoten = $_POST['hoten'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $role = $_POST['role'];
                // cập nhật khách hàng
                updateuser($id, $hoten, $sdt, $email, $user, $pass, $role);
                // lấy danh sách khách hàng để hiện sau khi cập nhật
                $kq = getalluser();
                include "view/khachhang.php";
            }
            break;
        case 'thongke':
            include "view/thongke.php";
            break;
        case 'thoat':
            // đăng xuất khi đăng nhập vào tài khoản admin
            if (isset($_SESSION['role'])) unset($_SESSION['role']);
            header('location: ../index.php');

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";