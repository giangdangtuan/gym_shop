<?php
require_once("Model/clsProduct.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=" . $module;
$thongbao ="";
//tạo đối tượng clsSanpham
$sanpham = new clsProduct();
$ketqua = $sanpham->LaySanphamMoiNhat(100);//lấy 3 sản phẩm mới nhất
require_once("ViewsUser/vHome.php");
?>
