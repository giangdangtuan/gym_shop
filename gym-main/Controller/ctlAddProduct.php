<?php
require_once("Public/Tienich.php");
$tensp = $_REQUEST["t1"];
$brand = $_REQUEST["t2"];
$price = $_REQUEST["t3"];

$image = UploadFile("f1", "image/Product");
$description = $_REQUEST["t4"];
$content = $_REQUEST["t5"];
$status =1;
if(isset($_REQUEST["rTrangthai"]))
    $trangthai = $_REQUEST["rTrangthai"];
$nhomsp = $_REQUEST["s1"];
try {
    $ketqua = $sanpham->ThemSanpham($tensp, $brand, $price, $image, $description, $content, $status, $nhomsp);
    if(!$ketqua) {
        $thongbao = "Error";
        require("ViewsAdmin/vKetqua.php");
    }
    else{
        $thongbao ="Add data successfully";
        require("ViewsAdmin/vKetqua.php");}
}catch(Exception $e){
    $thongbao = "Category not exist";
    require("ViewsAdmin/vKetqua.php");
}
?>