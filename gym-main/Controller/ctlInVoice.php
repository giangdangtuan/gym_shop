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
//gọi các view và các Controllers cấp dưới dựa trên biến act
if($act == "xoa"){
    require("xulyXoaHD.php");
}
else if($act == "trangthai"){
    require("xulyTrangthaiHD.php");
}
else if($act == "chitiet"){
    $ketqua = $hoadon->TimHoadon($id);//lấy bản ghi thông tin hóa đơn theo mahd
    if($ketqua==TRUE)
    {
        $rowHD = $hoadon->data;//lấy dòng hóa đơn (dạng mảng) từ data lưu vào $rowHD
        $tongtien = $hoadon->TongTien($id);
        if($rowHD)
        {
            $ketqua = $hoadon->ChitietHoadon($id);
            require("ViewsAdmin/vChitietHD.php");
        }
        else
        {
            $thongbao = "Invoice not exist";
            require("ViewsAdmin/vKetqua.php");
        }
    }
    else
    {
        $thongbao = "Something went wrong";
        require("ViewsAdmin/vKetqua.php");
    }
}
else{ //hiển thị tất cả hóa đơn
    $ketqua = $hoadon->LayDanhSachHoadon();
    require("ViewsAdmin/vDanhSachHD.php");
}
?>