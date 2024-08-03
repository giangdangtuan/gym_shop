<?php
require_once("Model/clsProduct.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=" . $module;
$thongbao ="";
$manhom = 0;
$masp = 0;
//lấy các thông tin từ request nếu có
if(isset($_REQUEST["manhom"]))
    $manhom = $_REQUEST["manhom"];
if(isset($_REQUEST["masp"]))
    $masp = $_REQUEST["masp"];
//tạo đối tượng clsSanpham
$sanpham = new clsProduct();

if($masp > 0)
{
    $ketqua = $sanpham->TimTheoIDSanpham($masp,1);//tìm sp có $masp và status=1
    $sanpham1 = new clsProduct();
    $ketqua1 = $sanpham1->LaySanphamMoiNhat(6);
    require("ViewsUser/vDetail.php");
}
else
{
    $link_tieptuc="indexUser.php";
    $thongbao = "id not valid";
    require("ViewsAdmin/vKetqua.php");
}

?>