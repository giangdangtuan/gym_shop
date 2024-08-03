<?php
//Kiểm tra nếu hóa đơn đang ở trạng thái đã thanh toán (2) thì không xóa
$ketqua = $hoadon->TimHoadon($id);
$rowHD = $hoadon->data;
if($rowHD==NULL)//if($hoadon->db->pdo_stm->rowCount()==0)
    $thongbao = "Invoice: " . $id . " not exist";
else{
    if($rowHD["status"]==2)
        $thongbao = "Unable to delete because order has been confirmed and delivered";
    else{
        $ketqua = $hoadon->XoaChitietHD($id);
        if($ketqua==FALSE)
            $thongbao = "LỖI XÓA CHI TIẾT HÓA ĐƠN: " . $id ;
        else{
            $ketqua = $hoadon->XoaHoaDon($id);
            if($ketqua==TRUE)
                $thongbao = "Something went wrong " . $id . " ";
            else
                $thongbao = "Error for invoice with id : " . $id ;
        }
    }
}
require("ViewsAdmin/vKetqua.php");
?>