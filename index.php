<?php
session_start();
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
ob_start();
// Các model
include "model/connect.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/user.php";
include "model/donhang.php";

// lấy danh sách các danh mục
$dsdm = getalldm();
// lấy danh sách các sản phẩm mới
$dssphome_new = getallsp_new(1);
//lấy danh sách các sản phẩm có nhiều lượt xem
$dssphome_view = getallsp_view(1);
// lấy một sản phẩm đặc biệt
$sphome_special = getonesp_special();

include "view/header.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        case 'lienhe':
            include "view/lienhe.php";
            break;
        case 'allsanpham':
            if ((isset($_GET['id'])) && ($_GET['id']) > 0) {
                $id = $_GET['id'];
                // lấy danh sách sản phẩm theo id
                $dssp = getallsp($id);
            } else {
                // lấy danh sách sản phẩm
                $dssp = getallsp();
            }
            include "view/allsanpham.php";
            break;
        case 'spct':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                // lấy một sản phẩm chi tiết theo id
                $kq = getonesp($id);
            }
            include "view/spct.php";
            break;
        case 'dangki':
            include "view/dangki.php";
            break;
        case 'dangkiuser':
            if (isset($_POST['dangki']) && ($_POST['dangki'])) {
                $hoten = $_POST['hoten'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                inser_user($hoten, $sdt, $email, $user, $pass);
            }
            include "view/dangkithanhcong.php";
            break;
        case 'dangnhap':
            include "view/dangnhap.php";
            break;
        case 'dangnhapuser':
            if ((isset($_POST['dangnhap'])) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                // lấy thông tin một user để so sánh là admin hay client
                $kq = getuserinfo($user, $pass);
                $role = $kq[0]['role'];
                if ($role == 1) {
                    $_SESSION['role'] = $role;
                    header('location: admin/index.php');
                    break;
                } else {

                    $_SESSION['role'] = $role;
                    $_SESSION['iduser'] = $kq[0]['id'];
                    $_SESSION['username'] = $kq[0]['user'];
                    header('location: index.php');
                    break;
                }
            }
        case 'thongtinuser':
            // hiện 1 thông tin user 
            $kq =  getoneuser($_SESSION['iduser']);
            include "view/capnhatuser.php";
            break;
        case 'suauser':
            // lấy một user theo id để sửa
            $kq =  getoneuser($_SESSION['iduser']);
            include "view/capnhatuserform.php";
            break;
        case 'capnhatuser':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $hoten = $_POST['hoten'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $role = 0;
                updateuser($id, $hoten, $sdt, $email, $user, $pass, $role);
                $kq =  getoneuser($_SESSION['iduser']);
                include "view/capnhatuser.php";
            }
            break;
            // thoát khỏi quá trình đăng nhập(đăng xuất)
        case 'thoat':
            unset($_SESSION['role']);
            unset($_SESSION['iduser']);
            unset($_SESSION['username']);
            header('location: index.php');
            break;
        case 'viewcart':
            include "view/viewcart.php";
            break;
        case 'addcart':
            if ((isset($_POST['addcart'])) && ($_POST['addcart'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $img = $_POST['img'];
                $gia = $_POST['gia'];
                if (isset($_POST['sl']) && ($_POST['sl'] > 0)) {
                    $sl = $_POST['sl'];
                } else {
                    $sl = 1;
                }
                $i = 0;
                $fg = 0;

                foreach ($_SESSION['giohang'] as $sp) {
                    if ($sp[1] == $tensp) {
                        $slnew = $sl + $sp[4];
                        $_SESSION['giohang'][$i][4] = $slnew;
                        $fg = 1;
                        break;
                    }
                    $i++;
                }

                if ($fg == 0) {
                    $item = array($id, $tensp, $img, $gia, $sl);
                    $_SESSION['giohang'][] = $item;
                }
            }
            header('location: index.php?act=viewcart');
            break;
        case 'delcart':
            if (isset($_SESSION['giohang'])) {
                if (isset($_GET['id'])) {
                    array_splice($_SESSION['giohang'], $_GET['id'], 1);
                } else {
                    unset($_SESSION['giohang']);
                }
            }
            include "view/viewcart.php";
            break;

        case 'thanhtoan':
            if ((isset($_POST['thanhtoan'])) && ($_POST['thanhtoan'])) {
                $madh = "Sneaker" . rand(0, 999999);
                $tongdonhang = $_POST['tongdonhang'];
                $pttt = $_POST['pttt'];
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $sdt = $_POST['sdt'];
                //    tạo đơn hàng và xuất id đơn hàng
                $iddh = taodonhang($madh, $tongdonhang, $pttt, $hoten, $email, $diachi, $sdt);
                $_SESSION['iddh'] =  $iddh;
                // Them thong tin vao gio hang
                if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                    foreach ($_SESSION['giohang'] as $item) {
                        addcart($item[0], $iddh, $item[1], $item[2], $item[3], $item[4]);
                    }
                    unset($_SESSION['giohang']);
                }
            }
            include "view/donhang.php";
            break;

        default:
            include "view/home.php";
            break;
    }
} else {

    include "view/home.php";
}
include "view/footer.php";