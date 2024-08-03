<?php
require_once("Models/clsInvoice.php");
$act = "";
$id = "";
$link_tieptuc ="?module=" . $module;
$thongbao = "";
//lấy các thông tin từ request nếu có
if(isset($_REQUEST["act"]))
    $act = $_REQUEST["act"];
if(isset($_REQUEST["id"]))
    $id = $_REQUEST["id"];
//tạo đối tượng clsHoadon
$hoadon = new clsInVoice();

    $ketqua = $hoadon->TimHoadon($id);//lấy bản ghi thông tin hóa đơn theo mahd
    if($ketqua==TRUE)
    {
        $rowHD = $hoadon->data;//lấy dòng hóa đơn (dạng mảng) từ data lưu vào $rowHD
        $tongtien = $hoadon->TongTien($id);

    $ketqua = $hoadon->LayDanhSachHoadon();
    require("Views/vDanhSachHD.php");
}
?>