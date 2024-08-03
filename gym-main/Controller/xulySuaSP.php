<?php
require_once("Public/Tienich.php");
$id = $_REQUEST["id"];
$tensp = $_REQUEST["t1"];
$tacgia = $_REQUEST["t2"];
$gia = $_REQUEST["t3"];
$status =1;
$hinhanh = UploadFile("f1", "image/Product");
if($hinhanh=="")//nếu không chọn ảnh mới thì lấy ảnh hiện taij
    $hinhanh = $_REQUEST["anhHientai"];

$tomtat = $_REQUEST["t4"];
$chitiet = $_REQUEST["t5"];
$trangthai =1;
if(isset($_REQUEST["rTrangthai"]))
    $trangthai = $_REQUEST["rTrangthai"];
$nhomsp = $_REQUEST["s1"];

$ketqua = $sanpham->SuaSanpham($id,$tensp,$tacgia,$gia, $hinhanh,$tomtat,$chitiet,$trangthai,$nhomsp);
if($ketqua==FALSE)
    $thongbao="Something went wrong";
else
    $thongbao ="Update data successfully";

require("ViewsAdmin/vKetqua.php");
?>