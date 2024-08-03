<?php
$id = $_REQUEST["id"];
function xoaHoaDon($mahd){
    $password = "";
    $conn = new mysqli("localhost", "root",$password , "gym_shop");
    $sql = "DELETE FROM hoadon WHERE id=$mahd";
    $conn->query($sql);
}
xoaHoaDon($id);
$thongbao ="Cancel Invoice successfully";
$link_tieptuc = "../" ;
require ('../ViewsAdmin/vKetqua.php');