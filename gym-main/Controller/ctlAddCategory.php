<?php
$tennhomsp = $_REQUEST["t1"];
$trangthai =1;
if(isset($_REQUEST["rTrangthai"]))
    $trangthai = $_REQUEST["rTrangthai"];
$ketqua = $Nhomsanpham->ThemNhomSanpham($tennhomsp, $trangthai);
if($ketqua==FALSE)
    $thongbao="Something went wrong";
else
    $thongbao ="Add data successfully";
    require("ViewsAdmin/vKetqua.php");;
?>