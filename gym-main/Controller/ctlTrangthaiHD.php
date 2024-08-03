<?php
$ttht = $_REQUEST["ttht"];
$ttmoi = $_REQUEST["ttmoi"];
$chophep = "";
if($ttht==0||
    ($ttht==1&&($ttmoi==2||$ttmoi==3)) ||
    ($ttht==3&&($ttmoi==1||$ttmoi==2)))
{
    $chophep="OK";
}
if($chophep=="OK")
{
    $ketqua = $hoadon->DoiTrangThaiHoadon($id,$ttmoi);
    if($ketqua==TRUE)
        $thongbao = "Update successfully";
    else
        $thongbao = "Something went wrong";
}
else
{
    $thongbao = "This order has been confirmed and delivered";
}
require("ViewsAdmin/vKetqua.php");
?>